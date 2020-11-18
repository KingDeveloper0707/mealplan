<?php

include 'db_config.php';

$email_checkout = getIfSet($_POST['email_checkout']);
$email_checkout = strtolower($email_checkout);

if(!$email_checkout) {
    $final_result = array('status' => 'failure', 'message' => 'No email inputed');
    echo json_encode($final_result);
    return;
}

$mealplanExisted = checkMealPlanExisted($email_checkout, $conn);
$final_result = array('status' => $mealplanExisted);

echo json_encode($final_result);


$conn->close();
return;

function checkMealPlanExisted($email, $conn) {
    $returnVal = false;
    $sql = "SELECT * FROM mealplan WHERE email='" . $email . "'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $returnVal = true;
    }
    return $returnVal;
}

function getIfSet(&$value, $default = 0) {
    return isset($value) ? $value : $default;
}


?>