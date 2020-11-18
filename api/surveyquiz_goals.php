<?php
ini_set("memory_limit", "-1");
set_time_limit(-1);
include 'db_config.php';

 $survey = array();
 $sql = "SELECT * FROM `quiz` WHERE update_time between date_sub(now(), INTERVAL 30 DAY) and now() ORDER BY update_time DESC;";
 $result = $conn->query($sql);
 echo "Total In 30 Days :" . $result->num_rows . "<br />";
 
 $sql = "SELECT * FROM `quiz` WHERE `quiz` LIKE '%\"goal_0\":\"1\"%' AND update_time between date_sub(now(), INTERVAL 30 DAY) and now() ORDER BY update_time DESC;";
 $result = $conn->query($sql);
 echo "goal_0 :" . $result->num_rows . "<br />";
 
 $sql = "SELECT * FROM `quiz` WHERE `quiz` LIKE '%\"goal_0\":\"1\"%' AND `quiz` LIKE '%\"gender\":\"0\"%' AND update_time between date_sub(now(), INTERVAL 30 DAY) and now() ORDER BY update_time DESC;";
 $result = $conn->query($sql);
 echo "goal_0 female:" . $result->num_rows . "<br />";
 
 $sql = "SELECT * FROM `quiz` WHERE `quiz` LIKE '%\"goal_0\":\"1\"%' AND `quiz` LIKE '%\"gender\":\"1\"%' AND update_time between date_sub(now(), INTERVAL 30 DAY) and now() ORDER BY update_time DESC;";
 $result = $conn->query($sql);
 echo "goal_0 male:" . $result->num_rows . "<br />";
 
 $sql = "SELECT * FROM `quiz` WHERE `quiz` LIKE '%\"goal_1\":\"1\"%' AND update_time between date_sub(now(), INTERVAL 30 DAY) and now() ORDER BY update_time DESC;";
 $result = $conn->query($sql);
 echo "goal_1 :" . $result->num_rows . "<br />";
 
 $sql = "SELECT * FROM `quiz` WHERE `quiz` LIKE '%\"goal_0\":\"1\"%' AND `quiz` LIKE '%\"gender\":\"0\"%' AND update_time between date_sub(now(), INTERVAL 30 DAY) and now() ORDER BY update_time DESC;";
 $result = $conn->query($sql);
 echo "goal_1 female:" . $result->num_rows . "<br />";
 
 $sql = "SELECT * FROM `quiz` WHERE `quiz` LIKE '%\"goal_0\":\"1\"%' AND `quiz` LIKE '%\"gender\":\"1\"%' AND update_time between date_sub(now(), INTERVAL 30 DAY) and now() ORDER BY update_time DESC;";
 $result = $conn->query($sql);
 echo "goal_1 male:" . $result->num_rows . "<br />";
 
 $sql = "SELECT * FROM `quiz` WHERE `quiz` LIKE '%\"goal_2\":\"1\"%' AND update_time between date_sub(now(), INTERVAL 30 DAY) and now() ORDER BY update_time DESC;";
 $result = $conn->query($sql);
 echo "goal_2 :" . $result->num_rows . "<br />";
 
 $sql = "SELECT * FROM `quiz` WHERE `quiz` LIKE '%\"goal_0\":\"1\"%' AND `quiz` LIKE '%\"gender\":\"0\"%' AND update_time between date_sub(now(), INTERVAL 30 DAY) and now() ORDER BY update_time DESC;";
 $result = $conn->query($sql);
 echo "goal_2 female:" . $result->num_rows . "<br />";
 
 $sql = "SELECT * FROM `quiz` WHERE `quiz` LIKE '%\"goal_0\":\"1\"%' AND `quiz` LIKE '%\"gender\":\"1\"%' AND update_time between date_sub(now(), INTERVAL 30 DAY) and now() ORDER BY update_time DESC;";
 $result = $conn->query($sql);
 echo "goal_2 male:" . $result->num_rows . "<br />";
 
 $sql = "SELECT * FROM `quiz` WHERE `quiz` LIKE '%\"goal_3\":\"1\"%' AND update_time between date_sub(now(), INTERVAL 30 DAY) and now() ORDER BY update_time DESC;";
 $result = $conn->query($sql);
 echo "goal_3 :" . $result->num_rows . "<br />";
 
 $sql = "SELECT * FROM `quiz` WHERE `quiz` LIKE '%\"goal_0\":\"1\"%' AND `quiz` LIKE '%\"gender\":\"0\"%' AND update_time between date_sub(now(), INTERVAL 30 DAY) and now() ORDER BY update_time DESC;";
 $result = $conn->query($sql);
 echo "goal_3 female:" . $result->num_rows . "<br />";
 
 $sql = "SELECT * FROM `quiz` WHERE `quiz` LIKE '%\"goal_0\":\"1\"%' AND `quiz` LIKE '%\"gender\":\"1\"%' AND update_time between date_sub(now(), INTERVAL 30 DAY) and now() ORDER BY update_time DESC;";
 $result = $conn->query($sql);
 echo "goal_3 male:" . $result->num_rows . "<br />";
 
 $sql = "SELECT * FROM `quiz` WHERE `quiz` LIKE '%\"goal_4\":\"1\"%' AND update_time between date_sub(now(), INTERVAL 30 DAY) and now() ORDER BY update_time DESC;";
 $result = $conn->query($sql);
 echo "goal_4 :" . $result->num_rows . "<br />";
 
 $sql = "SELECT * FROM `quiz` WHERE `quiz` LIKE '%\"goal_0\":\"1\"%' AND `quiz` LIKE '%\"gender\":\"0\"%' AND update_time between date_sub(now(), INTERVAL 30 DAY) and now() ORDER BY update_time DESC;";
 $result = $conn->query($sql);
 echo "goal_4 female:" . $result->num_rows . "<br />";
 
 $sql = "SELECT * FROM `quiz` WHERE `quiz` LIKE '%\"goal_0\":\"1\"%' AND `quiz` LIKE '%\"gender\":\"1\"%' AND update_time between date_sub(now(), INTERVAL 30 DAY) and now() ORDER BY update_time DESC;";
 $result = $conn->query($sql);
 echo "goal_4 male:" . $result->num_rows . "<br />";
 
 $sql = "SELECT * FROM `quiz` WHERE `quiz` LIKE '%\"goal_5\":\"1\"%' AND update_time between date_sub(now(), INTERVAL 30 DAY) and now() ORDER BY update_time DESC;";
 $result = $conn->query($sql);
 echo "goal_5 :" . $result->num_rows . "<br />";
 
 $sql = "SELECT * FROM `quiz` WHERE `quiz` LIKE '%\"goal_0\":\"1\"%' AND `quiz` LIKE '%\"gender\":\"0\"%' AND update_time between date_sub(now(), INTERVAL 30 DAY) and now() ORDER BY update_time DESC;";
 $result = $conn->query($sql);
 echo "goal_5 female:" . $result->num_rows . "<br />";
 
 $sql = "SELECT * FROM `quiz` WHERE `quiz` LIKE '%\"goal_0\":\"1\"%' AND `quiz` LIKE '%\"gender\":\"1\"%' AND update_time between date_sub(now(), INTERVAL 30 DAY) and now() ORDER BY update_time DESC;";
 $result = $conn->query($sql);
 echo "goal_5 male:" . $result->num_rows . "<br />";
 
 $sql = "SELECT * FROM `quiz` WHERE `quiz` LIKE '%\"goal_6\":\"1\"%' AND update_time between date_sub(now(), INTERVAL 30 DAY) and now() ORDER BY update_time DESC;";
 $result = $conn->query($sql);
 echo "goal_6 :" . $result->num_rows . "<br />";
 
 $sql = "SELECT * FROM `quiz` WHERE `quiz` LIKE '%\"goal_0\":\"1\"%' AND `quiz` LIKE '%\"gender\":\"0\"%' AND update_time between date_sub(now(), INTERVAL 30 DAY) and now() ORDER BY update_time DESC;";
 $result = $conn->query($sql);
 echo "goal_6 female:" . $result->num_rows . "<br />";
 
 $sql = "SELECT * FROM `quiz` WHERE `quiz` LIKE '%\"goal_0\":\"1\"%' AND `quiz` LIKE '%\"gender\":\"1\"%' AND update_time between date_sub(now(), INTERVAL 30 DAY) and now() ORDER BY update_time DESC;";
 $result = $conn->query($sql);
 echo "goal_6 male:" . $result->num_rows . "<br />";
 
 $sql = "SELECT * FROM `quiz` WHERE `quiz` LIKE '%\"goal_7\":\"1\"%' AND update_time between date_sub(now(), INTERVAL 30 DAY) and now() ORDER BY update_time DESC;";
 $result = $conn->query($sql);
 echo "goal_7 :" . $result->num_rows . "<br />";
 
 $sql = "SELECT * FROM `quiz` WHERE `quiz` LIKE '%\"goal_0\":\"1\"%' AND `quiz` LIKE '%\"gender\":\"0\"%' AND update_time between date_sub(now(), INTERVAL 30 DAY) and now() ORDER BY update_time DESC;";
 $result = $conn->query($sql);
 echo "goal_7 female:" . $result->num_rows . "<br />";
 
 $sql = "SELECT * FROM `quiz` WHERE `quiz` LIKE '%\"goal_0\":\"1\"%' AND `quiz` LIKE '%\"gender\":\"1\"%' AND update_time between date_sub(now(), INTERVAL 30 DAY) and now() ORDER BY update_time DESC;";
 $result = $conn->query($sql);
 echo "goal_7 male:" . $result->num_rows . "<br />";
 
 $sql = "SELECT * FROM `quiz` WHERE `quiz` LIKE '%\"goal_8\":\"1\"%' AND update_time between date_sub(now(), INTERVAL 30 DAY) and now() ORDER BY update_time DESC;";
 $result = $conn->query($sql);
 echo "goal_8 :" . $result->num_rows . "<br />";
 
 $sql = "SELECT * FROM `quiz` WHERE `quiz` LIKE '%\"goal_0\":\"1\"%' AND `quiz` LIKE '%\"gender\":\"0\"%' AND update_time between date_sub(now(), INTERVAL 30 DAY) and now() ORDER BY update_time DESC;";
 $result = $conn->query($sql);
 echo "goal_8 female:" . $result->num_rows . "<br />";
 
 $sql = "SELECT * FROM `quiz` WHERE `quiz` LIKE '%\"goal_0\":\"1\"%' AND `quiz` LIKE '%\"gender\":\"1\"%' AND update_time between date_sub(now(), INTERVAL 30 DAY) and now() ORDER BY update_time DESC;";
 $result = $conn->query($sql);
 echo "goal_8 male:" . $result->num_rows . "<br />";
 
 

//echo json_encode($survey);
/*
foreach($survey as $key => $value) {
  echo "-- $key <br />";
  echo json_encode($value);
  echo "<br />";
}
*/

//$filename = $name='report_quiz_'.date('Y-m-d_hia').'.csv';
//array_to_csv_download($survey, $filename);

return;

function array_to_csv_download($array, $filename = "export.csv", $delimiter=",") {
    // open raw memory as file so no temp files needed, you might run out of memory though
    $f = fopen('php://memory', 'w'); 
    // loop over the input array
    
    fputcsv($f, array("name", "total", "paid", "refunded"), $delimiter);//first line
    
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
