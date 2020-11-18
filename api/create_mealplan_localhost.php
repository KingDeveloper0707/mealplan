<?php

include 'db_config.php';

$email = getIfSet($_POST['email']);
$email = strtolower($email);
$weeknum = isset($_POST['weeknum']) ? $_POST['weeknum'] : 4;

if (!$email) {
    $final_result = array('status' => 'failure', 'message' => 'No email inputed', 'email' => $email);
    echo json_encode($final_result);
    return;
}

$final_result = array();

$str_quiz = getQuiz($email, $conn);

$quiz = array();
$quiz = json_decode($str_quiz, true);

$mealplan = createMealPlan($quiz, $conn, $weeknum);

$orderid = getOrderIdFromEmail($email, $conn);

$uid = saveMealPlan($mealplan, $email, $orderid, $conn);

$final_result = array('status' => 'success');
echo json_encode($final_result);

$conn->close();
return;

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


function getUidWithOrderId($email, $orderid, $conn) {
    $returnVal = "";
    $sql = "SELECT uid FROM mealplan WHERE email='" . $email . "' AND orderid='" . $orderid . "' LIMIT 1";

    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $returnVal = $row['uid'];
        }
    } else {
        $returnVal = -1;
    }
    //return $sql;
    return $returnVal;
}

function getIfSet(&$value, $default = 0) {
    return isset($value) ? $value : $default;
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



function checkMealPlanExisted($email, $conn) {
    $returnVal = false;
    $sql = "SELECT * FROM mealplan WHERE email='" . $email . "'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $returnVal = true;
    }
    return $returnVal;
}

function getQuiz($email, $conn) {
    $returnVal = "";
    $sql = "SELECT quiz FROM quiz WHERE email='" . $email . "' LIMIT 1";

    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $returnVal = $row['quiz'];
        }
    }
    return $returnVal;
}

function saveMealPlan($mealplan, $email, $orderid, $conn) {
    $returnVal = false;
    $mealplan = json_encode($mealplan);
    $uid = $orderid;


    if (checkMealPlanExisted($email, $conn)) {
        $sql = "UPDATE mealplan SET mealplan='" . $mealplan . "' WHERE email='" . $email . "'";
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
        //        if (!$quiz['dairy'])
        //        $sql .= " AND dairy = " . $quiz['dairy'];///+++
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
?>