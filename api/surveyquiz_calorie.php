<?php
set_time_limit(200);
ini_set("memory_limit","50M");
include 'db_config.php';

$survey = array();



 $sql = "SELECT quiz.*, checkout.create_time as sale_date FROM quiz JOIN checkout ON quiz.email = checkout.email WHERE quiz.email NOT LIKE '%test%' AND checkout.create_time between date_sub(now(),INTERVAL 3 DAY) and now() ORDER BY sale_date DESC ";
 $result = $conn->query($sql);
 
if ($result->num_rows > 0) {
    
    while ($row = $result->fetch_assoc()) {        
        $strquiz = $row['quiz'];
        $quiz = array();
        $quiz = json_decode($row['quiz'], true);
        
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
        $item = array($row['email'], $gender, $age, $height, $weight, $weight_goal, $activity, $row['sale_date'], $cal);
        
//        $item = ["111", "222"];
        array_push($survey, $item);
    }
}

//echo json_encode($survey);

// foreach($survey as $key => $value) {
//   echo "-- $key <br />";
//   echo json_encode($value);
//   echo "<br />";
// }


$filename = $name='report_quiz_'.date('Y-m-d_hia').'.csv';
array_to_csv_download($survey, $filename);

return;

function array_to_csv_download($array, $filename = "export.csv", $delimiter=",") {
    // open raw memory as file so no temp files needed, you might run out of memory though
    $f = fopen('php://memory', 'w'); 
    // loop over the input array
    
    fputcsv($f, array("No", "email", "gender", "age", "height", "curr weight", "goal weight", "activity", "sale date", "calorie"), $delimiter);//first line
    
    foreach ($array as $key=>$line) { 
        // generate csv lines from the inner arrays
        array_unshift($line, $key);
        fputcsv($f, $line, $delimiter);
    }
    // reset the file pointer to the start of the file
    fseek($f, 0);
    // tell the browser it's going to be a csv file
    header('Content-Type: application/csv');
    // tell the browser we want to save it instead of displaying it
    header('Content-Disposition: attachment; filename="'.$filename.'";');
    // make php send the generated csv lines to the browser
    fpassthru($f);
} 

function checkPaid($email, $conn) {
    $returnVal = 0; //unpaid: 0, paid: 1, refunded: -1
    $sql = "SELECT * FROM checkout WHERE email='" . $email . "' LIMIT 1";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            if($row['refund'] == 1) {
                $returnVal = -1;
            } else {
                $returnVal = 1;
            }
        }
    } else {
        $returnVal = 0;
    }
    return $returnVal;
}


?>
