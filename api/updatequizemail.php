<?php

include 'db_config.php';

$email_checkout = getIfSet($_POST['email_checkout']);
$email_checkout = strtolower($email_checkout);
$email_quiz = getIfSet($_POST['email_quiz']);
$email_quiz = strtolower($email_quiz);

if(!$email_checkout || !$email_quiz) {
    $final_result = array('status' => 'failure', 'message' => 'No email inputed');
    echo json_encode($final_result);
    return;
}

file_put_contents("email_change_log.txt", json_encode($_POST) . PHP_EOL, FILE_APPEND);

if(checkEmailChangeExisted($email_quiz, $conn)) {
    if($email_quiz == $email_checkout) {
        $sql = "DELETE FROM email_change_history WHERE email_quiz = '" . $email_quiz . "'";
    } else {
        $sql = "UPDATE email_change_history SET email_checkout='" . $email_checkout . "' WHERE email_quiz='" . $email_quiz . "'";
    }    
} else {
    if($email_quiz != $email_checkout) {
        $sql = "INSERT INTO email_change_history (email_quiz, email_checkout) VALUES('" . $email_quiz . "', '" . $email_checkout . "')";
    } else {
        return;
    }   
}

$result = $conn->query($sql);
if ($result) {
    $final_result = array('status' => 'success');
} else {
    $final_result = array('status' => $conn->error, 'sql' => $sql);
}

echo json_encode($final_result);


$conn->close();
return;

function checkEmailChangeExisted($email_quiz, $conn) {
    $returnVal = false;
    $sql = "SELECT * FROM email_change_history WHERE email_quiz='" . $email_quiz . "'";
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