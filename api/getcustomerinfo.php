<?php
ini_set('memory_limit', '-1');


include 'db_config.php';

$uid = getIfSet($_POST['uid']);
$day = getIfSet($_POST['day'], 0);
$type = getIfSet($_POST['type'], 1);

if (!$uid) {
    $final_result = array('status' => 'failure', 'message' => 'No uid inputed');
    echo json_encode($final_result);
    return;
}

if($day > 0) {
    $day = $day - 1;
}

$final_result = array();


$final_result = getResult($uid, $day, $type, $conn);

echo json_encode($final_result);

$conn->close();
return;

function getIfSet(&$value, $default = 0) {
    return isset($value) ? $value : $default;
}


function getResult($uid, $day, $type, $conn) {
    
    $returnVal = array();
    $sql = "SELECT quiz.quiz, mealplan.mealplan, checkout.email, checkout.first_name FROM quiz JOIN checkout ON quiz.email = checkout.email JOIN mealplan ON quiz.email = mealplan.email WHERE mealplan.uid='" . $uid . "' ORDER BY checkout.create_time DESC LIMIT 1";    
    $result = $conn->query($sql);
 
    if ($result->num_rows > 0) {
        
        while ($row = $result->fetch_assoc()) {
            
            $strquiz = $row['quiz'];
            $quiz = array();
            $quiz = json_decode($row['quiz'], true);
            
            $returnVal['first_name'] = $row['first_name'];
            $returnVal['email'] = $row['email'];
            $returnVal['gender'] = array_key_exists('gender', $quiz) ? $quiz['gender'] : "0";
            
            
            $input_term = $quiz['input_term'];
            $weight = 0.0;//pound
            $weight_goal = 0.0;//pound
            $height = 0.0;//inches
            $age = 0;
            if($input_term == "imperial") {
                $age = $quiz['age_imperial'];
                $weight = $quiz['curr_weight_po'];
                $weight_goal = $quiz['goal_weight_po'];
                $height = (int)$quiz['height_ft'] * 12 + (int)$quiz['height_in'];
            } else {
                $age = $quiz['age_metric'];
                $weight = $quiz['curr_weight_kg'] * 0.453592;
                $weight_goal = $quiz['goal_weight_kg'] * 0.453592;
                $height = $quiz['height_cm'] * 0.393701;
            }
            $gender = $quiz['gender'];
            $activity = $quiz['q_activity'];
            
            $baseline = 646.0;
            $diff_age = (100 - $age) * 4.5;
            $diff_weight = ($weight - 100) * 4;
            $diff_height = ($height - 48) * 14;
            
            $cal = $baseline + $diff_age + $diff_weight + $diff_height;
            
            if($gender == 0) {
                $cal = $cal * (100 - 11) / 100;
            }
            if($activity == 1) {
                $cal = $cal * (100 + 12) / 100;
            } else if($activity == 2) {
                $cal = $cal * (100 + 20) / 100;
            } else if($activity == 3) {
                $cal = $cal * (100 + 45) / 100;
            }
            
            $curr_cal = $cal;
            $goal_cal = $curr_cal * $weight_goal / $weight;
            $goal_cal = (string)round($goal_cal, 2);
            if($goal_cal < 1250) {
                $goal_cal = $curr_cal * 0.8;
                if($goal_cal < 1250) {
                    $goal_cal = $curr_cal * 0.9;
                }
            }
            $returnVal['goal_cal'] = $goal_cal;
            
            
            
            $strMealPlan = $row['mealplan'];
            $mealplanObject = json_decode($strMealPlan, true);
            
            //get serving_advice
            $returnVal['serving_advice'] = getServingAdvice($mealplanObject[$type][$day], $conn);
            //get pro_tip
            $returnVal['protip'] = getProTip(($day+1), $conn);
            
            //get total_cal and cal_array
            $total_cal = 0.0;
            $day_cals = array();
            
            for($type_iter = 1 ; $type_iter <=4 ; $type_iter++) {
                $mealId = $mealplanObject[$type_iter][$day];
                
                $sql = "SELECT calories FROM ingredients WHERE meal_id = '" . $mealId . "' AND name = 'Total Per Serving' LIMIT 1";
                $result_meal = $conn->query($sql);
                while($row = $result_meal->fetch_assoc()) {
                    $meal_cal = $row['calories'];
                    array_push($day_cals, $meal_cal);
                    $total_cal += $meal_cal;
                }
            }
            
            $total_cal = (string)round($total_cal, 2);
            $returnVal['total_cal'] = $total_cal;
            
            //echo "day_cals = " . json_encode($day_cals) . "\n";
            
            //get BLSD servings
            $day_servings = array();
            $ranges = array(50.0, 100.0);
            
            for($i = 0 ; $i < count($ranges) ; $i++) {
                $range = $ranges[$i];
                //echo "range = " . $range . "\n";
                if($goal_cal - $total_cal <= $range) {
                    $day_servings = array("B" => 1,"L" => 1,"S" => 1, "D" => 1);
                } else if ($goal_cal - $total_cal > $range) {
                    
                    $max_iterate = 5;
                    for( $l = 0 ; $l <= $max_iterate ; $l++ ) {
                        for( $b = 0 ; $b <= $max_iterate ; $b++ ) {
                            for( $s = 0 ; $s <= $max_iterate ; $s++ ) {
                                for( $d = 0 ; $d <= $max_iterate ; $d++ ) {            
                                    if(abs($goal_cal - $total_cal - $day_cals[0] * $b - $day_cals[1] * $l - $day_cals[2] * $s - $day_cals[3] * $d) <= $range) {
                                        $day_servings = array('B'=>($b+1), 'L'=>($l+1), 'S'=>($s+1), 'D'=>($d+1));
                                    }
                                    if(array_key_exists('B', $day_servings)) {
                                        //echo "aaa = " . ($goal_cal - $total_cal - $day_cals[0] * $b - $day_cals[1] * $l - $day_cals[2] * $s - $day_cals[3] * $d) . "\n";
                                        break;
                                    }
                                }
                                if(array_key_exists('B', $day_servings)) {
                                    break;
                                }
                            }
                            if(array_key_exists('B', $day_servings)) {
                                break;
                            }
                        }
                        if(array_key_exists('B', $day_servings)) {
                            break;
                        }
                    }
                }
                
                if(array_key_exists('B', $day_servings)) {
                    break;
                }
            }
            
            if(!array_key_exists('B', $day_servings)) {
                $day_servings = array('B'=>1, 'L'=>1, 'S'=>1, 'D'=>1);
            }
            
            if($type == "1") {
                $returnVal['serving'] = $day_servings['B'];
            } else if($type == "2") {
                $returnVal['serving'] = $day_servings['L'];
            } else if($type == "3") {
                $returnVal['serving'] = $day_servings['S'];
            } else if($type == "4") {
                $returnVal['serving'] = $day_servings['D'];
            } 
        }
    }
    
    return $returnVal;
}


function getServingAdvice($meal_id, $conn) {
    $returnVal = '';
    $sql = "SELECT serving_advice FROM meals WHERE id = '". $meal_id . "' LIMIT 1";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $returnVal = $row['serving_advice'];
        }
    }
    return $returnVal;
}

function getProTip($day, $conn) {
    $returnVal = '';
    $sql = "SELECT protip FROM protips WHERE id = '". $day . "' LIMIT 1";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $returnVal = $row['protip'];
        }
    }
    return $returnVal;
}

?>