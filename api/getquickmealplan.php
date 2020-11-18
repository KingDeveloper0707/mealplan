<?php

include 'db_config.php';


$gender = getIfSet($_POST['gender']);

$_POST['chicken'] = getIfSet($_POST['chicken']);
$_POST['pork'] = getIfSet($_POST['pork']);
$_POST['beef'] = getIfSet($_POST['beef']);
$_POST['fish'] = getIfSet($_POST['fish']);
$_POST['bacon'] = getIfSet($_POST['bacon']);
$_POST['dairy'] = getIfSet($_POST['dairy']);
$_POST['broccoli'] = getIfSet($_POST['broccoli']);
$_POST['mushroom'] = getIfSet($_POST['mushroom']);
$_POST['zuccini'] = getIfSet($_POST['zuccini']);
$_POST['cauliflower'] = getIfSet($_POST['cauliflower']);
$_POST['asparagus'] = getIfSet($_POST['asparagus']);
$_POST['avocado'] = getIfSet($_POST['avocado']);
$_POST['egg'] = getIfSet($_POST['egg']);
$_POST['nut'] = getIfSet($_POST['nut']);
$_POST['cheese'] = getIfSet($_POST['cheese']);
$_POST['butter'] = getIfSet($_POST['butter']);
$_POST['coconut'] = getIfSet($_POST['coconut']);
$_POST['brussel_sprout'] = getIfSet($_POST['brussel_sprout']);
$_POST['no_meat'] = getIfSet($_POST['no_meat']);

$weeknum = getIfSet($_POST['weeknum']);

//$_POST['goal_0'] = getIfSet($_POST['goal_0']);
//$_POST['goal_1'] = getIfSet($_POST['goal_1']);
//$_POST['goal_2'] = getIfSet($_POST['goal_2']);
//$_POST['goal_3'] = getIfSet($_POST['goal_3']);
//$_POST['goal_4'] = getIfSet($_POST['goal_4']);
//$_POST['goal_5'] = getIfSet($_POST['goal_5']);
//$_POST['goal_6'] = getIfSet($_POST['goal_6']);
//$_POST['goal_7'] = getIfSet($_POST['goal_7']);
//$_POST['goal_8'] = getIfSet($_POST['goal_8']);

$email = getIfSet($_POST['email']);
$email = strtolower($email);

if (!$email) {
    $email = "test@test.com";
    //$final_result = array('status' => 'failure', 'message' => 'No email inputed');
    //echo json_encode($final_result);
    //return;
}

//save quiz
$str_quiz = json_encode($_POST);
if (checkExisted($email, $conn)) {
    $sql = "UPDATE quiz SET quiz='" . $str_quiz . "' WHERE email='" . $email . "'";
} else {
    $sql = "INSERT INTO quiz(email, quiz) VALUES('" . $email . "', '" . $str_quiz . "')";
}
$result = $conn->query($sql);
//create mealplan and save it
$orderid = getOrderIdFromEmail($email, $conn);
$mealplan = createMealPlan($_POST, $conn, $weeknum);
$uid = saveMealPlan($mealplan, $email, $orderid, $conn);
$final_result = array('status' => 'success', 'uid' => $uid);
echo json_encode($final_result);
return;

function getIfSet(&$value, $default = 0) {
    return isset($value) ? $value : $default;
}

function getOrderIdFromEmail($email, $conn) {
    $returnVal = "";
    $sql = "SELECT orderid FROM checkout WHERE email='" . $email . "' ORDER BY create_time DESC LIMIT 1";
    $result = $conn->query($sql);
    if($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $returnVal = $row['orderid'];
        }
    }
    return $returnVal;
}

function saveMealPlan($mealplan, $email, $orderid, $conn) {
    $returnVal = false;
    $mealplan = json_encode($mealplan);
    
    
    if(strlen($orderid) == 0) {
        $orderid = uniqid();
    }
    $uid = $orderid;

    if (checkMealPlanExisted($email, $conn)) {
        $sql = "UPDATE mealplan SET mealplan='" . $mealplan . "', orderid='" . $orderid . "' WHERE email='" . $email . "'";
        $uid = getUidFromEmail($email, $conn);
    } else {
        $sql = "INSERT INTO mealplan (email, orderid, uid, mealplan) VALUES('" . $email . "', '" . $orderid . "', '" . $uid . "', '" . $mealplan . "')";
    }
    if ($conn->query($sql) === TRUE) {
        
    } else {
        $uid = -1;
    }


    return $uid;
}

function createMealPlan($quiz, $conn, $weeknum = 4) {

    $gender = $quiz['gender'];
    $q_time = $quiz['q_time'];
    //$q_activity = $quiz['q_activity'];
    //$q_recent_changes = $quiz['q_recent_changes'];
    
    $period = $weeknum * 7;

    $final_result = array();
    $type_result = array();

    for ($type = 1; $type <= 4; $type++) {

        $type_result = array();

        $sql = "SELECT * FROM meals";
        $sql .= " WHERE type = " . $type;

        /*
          if ($q_time == 0) {
          $sql .= " AND prep_mins >= 0 AND prep_mins <= 30 ";
          } else if ($q_time == 3) {
          $sql .= " AND prep_mins >= 0 AND prep_mins <= 20 ";
          }
         */

        if (!$quiz['chicken']) // if chicken is not selected, the meals that has chicken must NOT be contained in the meal plan.
            $sql .= " AND chicken = " . $quiz['chicken'];
        if (!$quiz['pork'])
            $sql .= " AND pork = " . $quiz['pork'];
        if (!$quiz['beef'])
            $sql .= " AND beef = " . $quiz['beef'];
        if (!$quiz['fish'])
            $sql .= " AND fish = " . $quiz['fish'];
        if (!$quiz['bacon'])
            $sql .= " AND bacon = " . $quiz['bacon'];
        if (!$quiz['broccoli'])
            $sql .= " AND broccoli = " . $quiz['broccoli'];
        if (!$quiz['mushroom'])
            $sql .= " AND mushroom = " . $quiz['mushroom'];
        if (!$quiz['zuccini'])
            $sql .= " AND zuccini = " . $quiz['zuccini'];
        if (!$quiz['cauliflower'])
            $sql .= " AND cauliflower = " . $quiz['cauliflower'];
        if (!$quiz['asparagus'])
            $sql .= " AND asparagus = " . $quiz['asparagus'];
        if (!$quiz['avocado'])
            $sql .= " AND avocado = " . $quiz['avocado'];
        if ($quiz['egg'])
            $sql .= " AND egg = 0";
        if ($quiz['nut'])
            $sql .= " AND nut = 0";
        if ($quiz['cheese'])
            $sql .= " AND cheese = 0";
        if ($quiz['butter'])
            $sql .= " AND butter = 0";
        if ($quiz['coconut'])
            $sql .= " AND coconut = 0";
        if ($quiz['brussel_sprout'])
            $sql .= " AND brussel_sprout = 0";
        if ($quiz['chicken'] || $quiz['pork'] || $quiz['beef'] || $quiz['fish'] || $quiz['bacon']) {
            $sql .= " AND tofu = 0";
        }
        if($quiz['cheese'] && $quiz['butter']) {
            $sql .= " AND dairy = 0";
        }
        if (($quiz['no_meat'] || (!$quiz['chicken'] && !$quiz['pork'] && !$quiz['beef'] && !$quiz['fish'] && !$quiz['bacon'])) &&
                $quiz['cheese'] && $quiz['butter']) {
            $sql .= " AND vegetarian = 1";
        }
        $sql .= "  ORDER BY priority";

        //echo "sql = " . $sql . "</br>";

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {

            $day = 0;
            
            while ($day < $period) {
                $result->data_seek(0);
                while ($row = $result->fetch_assoc()) {
                    $type_result[] = $row['id'];
                    $day++;

                    if ($day >= $period) {
                        break;
                    }
                }
                if ($day >= $period) {
                    break;
                }
            }
            
        }
        
        $final_result[$type] = $type_result;

    }
    return $final_result;
}

function checkMealPlanExisted($email, $conn) {
    $returnVal = false;
    $sql = "SELECT * FROM mealplan WHERE email='" . $email . "'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $returnVal = true;
    }
    return $returnVal;
}

function checkExisted($email, $conn) {
    $returnVal = false;
    $sql = "SELECT * FROM quiz WHERE email='" . $email . "'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $returnVal = true;
    }
    return $returnVal;
}


function getUidFromEmail($email, $conn) {
    $returnVal = "";
    $sql = "SELECT uid FROM mealplan WHERE email='" . $email . "' LIMIT 1";

    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $returnVal = $row['uid'];
        }
    }
    return $returnVal;
}


?>