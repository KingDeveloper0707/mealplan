<?php

include 'db_config.php';

$email = getIfSet($_POST['email']);
$email = strtolower($email);

if(!$email) {
    $final_result = array('status' => 'failure', 'message' => 'No email inputed');
    echo json_encode($final_result);
    return;
}

$final_result['uid'] = getUidFromEmail($email, $conn);

echo json_encode($final_result);

$conn->close();
return;

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