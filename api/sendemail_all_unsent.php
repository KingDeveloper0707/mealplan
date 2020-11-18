<?php
ini_set('max_execution_time', 0);

require_once('meal-plan-email-class.php');
$emailcontrol = new MealplanEmailInterface();

include 'db_config.php';


$sql = "SELECT mp.email, mp.uid, mp.emailsent, ch.first_name, ch.last_name, ch.weeknum, ch.orderid FROM mealplan as mp LEFT JOIN checkout AS ch ON ch.email = mp.email AND ch.orderid = mp.orderid WHERE mp.emailsent = '0'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $name = $row['first_name'] . " " . $row['last_name'];
        $email = $row['email'];
        $uid = $row['uid'];
        $orderid = $row['orderid'];
        $weeknum = $row['weeknum'];
        
        $emaildata = array(
            'name' => $name,
            'apikey' => '123456789',
            'email' => strtolower($email),
            'status' => 'customer',
            'action' => 'add',
            'link' => 'https://simpleketosystem.com/mealplan?uid=' . $uid
        );
        
        //var_dump($emaildata);
        
        $result_email = $emailcontrol->process_user($emaildata);
        var_dump($emaildata);
        var_dump($result_email);
        if($result_email == "ok") {
            updateEmailSent($email, $orderid, $weeknum, $conn);
        }
    }
}


$final_result = array('status' => 'success');
echo json_encode($final_result);
return;

function getIfSet(&$value, $default = 0) {
    return isset($value) ? $value : $default;
}

function updateEmailSent($email, $orderid, $weeknum, $conn) {
    $returnVal = false;
    $emailsent = 0;
    if($weeknum == 4) {
        $emailsent = 1;
    } else if ($weeknum == 30 || $weeknum == 56 || $weeknum == 12) {
        $emailsent = 2;
    }
    $sql = "UPDATE mealplan SET emailsent='" . $emailsent . "' WHERE email='" . $email . "' AND orderid='". $orderid ."'";
    
    if ($conn->query($sql) === TRUE) {
        $returnVal = true;
    } else {
        
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

?>