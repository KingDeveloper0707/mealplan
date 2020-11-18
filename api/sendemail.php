<?php

require_once('meal-plan-email-class.php');
$emailcontrol = new MealplanEmailInterface();

include 'db_config.php';


$email = getIfSet($_POST['email']);
$email = strtolower($email);
$first_name = getIfSet($_POST['first_name']);
$last_name = getIfSet($_POST['last_name']);
$first_name = mysqli_real_escape_string($conn, $first_name);
$last_name = mysqli_real_escape_string($conn, $last_name);
$orderid = getIfSet($_POST['orderid']);

if (!$email || !$orderid || !$first_name || !$last_name ) {
    $final_result = array('status' => 'failure', 'message' => 'No email or orderid / first_last_name inputed', 'email' => $email);
    echo json_encode($final_result);
    return;
}


$name = $first_name . " " . $last_name;
$uid = getUidWithOrderId($email, $orderid, $conn);

$final_result = array();
$emaildata = array(
            'name' => $name,
            'apikey' => '123456789',
            'email' => strtolower($email),
            'status' => 'customer',
            'action' => 'add',
            'link' => 'https://simpleketosystem.com/mealplan?uid=' . $uid
        );
$result_email = $emailcontrol->process_user($emaildata);
if($result_email == "ok") {
    updateEmailSent($email, $orderid, $conn);
}
//    var_dump($result);


$final_result = array('status' => 'success', 'uid' => $uid, 'emailing-status' => $result_email);
echo json_encode($final_result);
return;

function getIfSet(&$value, $default = 0) {
    return isset($value) ? $value : $default;
}

function updateEmailSent($email, $orderid, $conn) {
    $returnVal = false;
    
    $emailsent = 1;
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