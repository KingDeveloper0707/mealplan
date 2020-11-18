<?php

require_once('meal-plan-email-class.php');
$emailcontrol = new MealplanEmailInterface();

$email = getIfSet($_POST['email']);
$email = strtolower($email);
$name = getIfSet($_POST['name']);
$uid = getIfSet($_POST['uid']);

if (!$email || !$name || !$uid ) {
    $final_result = array('status' => 'failure', 'message' => 'No email or name or uid inputed', 'email' => $email);
    echo json_encode($final_result);
    return;
}



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
//    var_dump($result);


$final_result = array('status' => 'success', 'uid' => $uid, 'emailing-status' => $result_email);
echo json_encode($final_result);
return;

function getIfSet(&$value, $default = 0) {
    return isset($value) ? $value : $default;
}

?>