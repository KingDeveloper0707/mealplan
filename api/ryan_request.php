<?php
include 'db_config.php';

$email_checkouts = array();
$handle = fopen("email_change_log.txt", "r");
if ($handle) {
    while (($line = fgets($handle)) !== false) {
        // process the line read.
        $line = preg_replace('/\n$/','',$line);
        $line_object = json_decode($line ,true);
        if($line_object['email_checkout'] != $line_object['email_quiz']) {
            array_push($email_checkouts, $line_object['email_checkout']);
        } else {
            
        }
    }

    fclose($handle);
    array_unique($email_checkouts);
    
    
    
    //echo "fake checkout: " . count($email_checkouts) . "<br />";
     for($i = 0 ; $i < count($email_checkouts); $i++) {
        $sql = "select * from checkout where email = '" . $email_checkouts[$i] . "' limit 1";
        $result = $conn->query($sql);
        if ($result->num_rows == 0) {
            unset($email_checkouts[$i]);
        }
    }
    $change_num = count($email_checkouts);
    //echo "real checkout " . $change_num . "<br />";
    
    $sql = "select * from checkout where create_time >= '2019-10-21 16:18:44' group by email;";
    $result = $conn->query($sql);
    $total = $result->num_rows;
    $change_percentage = intval($change_num)/intval($total) * 100;
    $change_percentage = round($change_percentage, 1);
    $unchange_percentage = (intval($total) - intval($change_num))/intval($total) * 100;
    $unchange_percentage = round($unchange_percentage, 1);
    echo "Total Customers : " . $total . ", Percentage: 100%" . "<br/>";
    echo "Total Customers who tried to change email: " . $change_num . ", Percentage: " . $change_percentage . "%<br/>";
    echo "Total Customers who did NOT change email: " . (intval($total) - intval($change_num)) . ", Percentage: " . $unchange_percentage . "%<br/>";
    
    
} else {
    // error opening the file.
} 


?>