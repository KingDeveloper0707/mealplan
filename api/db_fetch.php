<?php

set_time_limit(0);
ini_set('memory_limit', '-1');

include 'db_config.php';

//echo date('Y-m-d H:i:s') . "<br />";

//$sql = "select quiz.*, checkout.first_name, checkout.last_name from quiz LEFT JOIN checkout ON quiz.email = checkout.email AND checkout.refund = '0' where quiz.update_time between CURDATE() - INTERVAL 30 DAY AND CURDATE() order by quiz.update_time desc";
$sql = "select quiz.*, checkout.first_name, checkout.last_name, checkout.total_price from quiz LEFT JOIN checkout ON quiz.email = checkout.email AND checkout.refund = '0' where quiz.update_time between CURDATE() - INTERVAL 30 DAY AND CURDATE() order by quiz.update_time DESC";

$result = $conn->query($sql);


//Setup the filename that our CSV will have when it is downloaded.
$fileName = 'mysql-export.csv';

//Set the Content-Type and Content-Disposition headers to force the download.
header('Content-Type: application/excel');
header('Content-Disposition: attachment; filename="' . $fileName . '"');

//Open up a file pointer
$fp = fopen('php://output', 'w');

//Start off by writing the column names to the file.
$columnNames = array('User', 'User email', 'User Name', 'City', 'State', 'Q1', 'Q2', 'Q3', 'Q4', 'Q5', 'Q6', 'Q7', 'Q8', 'Q9', 'Q10', 'Height US', 'Height Metric', 'Age', 'Current Weight US', 'Goal Weight US', 'Current Weight Metric', 'Goal Weight Metric', 'Purchased Meal Plan (1/0)', 'Upsell 1 (1/0)', 'Upsell 2 (1/0)', 'Upsell 3 (1/0)', 'Total Transaction');
fputcsv($fp, $columnNames);

//Then, loop through the rows and write them to the CSV file.
//foreach ($rows as $row) {
//    fputcsv($fp, $row);
//}
while ($row = $result->fetch_assoc()) {
    $newrow = array();
    array_push($newrow, "");
    array_push($newrow, $row['email']);
    $name = $row['first_name'] && $row['last_name'] ? $row['first_name'] . " " . $row['last_name'] : "";
    array_push($newrow, $name);
    array_push($newrow, "");//city
    array_push($newrow, "");//state
    $quiz = $row['quiz'];
    $quiz = json_decode($quiz, true);
    if($quiz['gender'] && $quiz['gender'] == 1) {
        array_push($newrow, "Male");
    } else{
        array_push($newrow, "Female");
    }
    array_push($newrow, array_key_exists("q_familiar", $quiz) ? $quiz['q_familiar'] : "");
    array_push($newrow, "");//quiz 3
    
    $meat = array();
    if($quiz['chicken'] && $quiz['chicken'] == 1) {
        array_push($meat, "chicken");
    } if ($quiz['bacon'] && $quiz['bacon'] == 1) {
        array_push($meat, "bacon");
    } if ($quiz['pork'] && $quiz['pork'] == 1) {
        array_push($meat, "pork");
    } if ($quiz['fish'] && $quiz['fish'] == 1) {
        array_push($meat, "fish");
    } if ($quiz['beef'] && $quiz['beef'] == 1) {
        array_push($meat, "beef");
    } if ($quiz['no_meat'] && $quiz['no_meat'] == 1) {
        array_push($meat, "no_meat");
    }
    $str_meat = implode(",", $meat);    
    array_push($newrow, $str_meat);//quiz 4
    
    $veg = array();
    if($quiz['broccoli'] && $quiz['broccoli'] == 1) {
        array_push($veg, "broccoli");
    } if ($quiz['mushroom'] && $quiz['mushroom'] == 1) {
        array_push($veg, "mushroom");
    } if ($quiz['zuccini'] && $quiz['zuccini'] == 1) {
        array_push($veg, "zuccini");
    } if ($quiz['cauliflower'] && $quiz['cauliflower'] == 1) {
        array_push($veg, "cauliflower");
    } if ($quiz['asparagus'] && $quiz['asparagus'] == 1) {
        array_push($veg, "asparagus");
    } if ($quiz['avocado'] && $quiz['avocado'] == 1) {
        array_push($veg, "avocado");
    }
    $str_veg = implode(",", $veg);    
    array_push($newrow, $str_veg);
    
    $avoid = array();
    if($quiz['egg'] && $quiz['egg'] == 1) {
        array_push($avoid, "egg");
    } if ($quiz['nut'] && $quiz['nut'] == 1) {
        array_push($avoid, "nut");
    } if ($quiz['cheese'] && $quiz['cheese'] == 1) {
        array_push($avoid, "cheese");
    } if ($quiz['butter'] && $quiz['butter'] == 1) {
        array_push($avoid, "butter");
    } if ($quiz['coconut'] && $quiz['coconut'] == 1) {
        array_push($avoid, "coconut");
    } if ($quiz['brussel_sprout'] && $quiz['brussel_sprout'] == 1) {
        array_push($avoid, "brussel_sprout");
    }
    $str_avoid = implode(",", $avoid);    
    array_push($newrow, $str_avoid);
    
    array_push($newrow, array_key_exists("q_activity", $quiz) ? $quiz['q_activity'] : "");
    array_push($newrow, array_key_exists("q_tired", $quiz) ? $quiz['q_tired'] : "");
    array_push($newrow, array_key_exists("q_recent_changes", $quiz) ? $quiz['q_recent_changes'] : "");
    
    
    $goal = array();
    if(array_key_exists("goal_0", $quiz) && $quiz['goal_0'] == 1) {
        array_push($goal, 0);
    } if (array_key_exists("goal_1", $quiz) && $quiz['goal_1'] == 1) {
        array_push($goal, 1);
    } if (array_key_exists("goal_2", $quiz) && $quiz['goal_2'] == 1) {
        array_push($goal, 2);
    } if (array_key_exists("goal_3", $quiz) && $quiz['goal_3'] == 1) {
        array_push($goal, 3);
    } if (array_key_exists("goal_4", $quiz) && $quiz['goal_4'] == 1) {
        array_push($goal, 4);
    } if (array_key_exists("goal_5", $quiz) && $quiz['goal_5'] == 1) {
        array_push($goal, 5);
    } if (array_key_exists("goal_6", $quiz) && $quiz['goal_6'] == 1) {
        array_push($goal, 6);
    } if (array_key_exists("goal_7", $quiz) && $quiz['goal_7'] == 1) {
        array_push($goal, 7);
    } if (array_key_exists("goal_8", $quiz) && $quiz['goal_8'] == 1) {
        array_push($goal, 8);
    }
    $str_goal = implode(",", $goal);    
    array_push($newrow, $str_goal);
    
    
    $height_metric = array_key_exists("height_ft", $quiz) ? $quiz['height_ft'] : 0;
    $height_metric .= "ft ";
    $height_metric .= array_key_exists("height_in", $quiz) ? $quiz['height_in'] : 0;
    $height_metric .= "in";
    array_push($newrow, $height_metric);//Height US
    array_push($newrow, array_key_exists("height_cm", $quiz) ? $quiz['height_cm'] : "");//Height Metric
    $age = $quiz['input_term'] == "imperial" ? $quiz['age_imperial'] : $quiz['age_metric'];
    array_push($newrow, $age);//Age
    array_push($newrow, array_key_exists("curr_weight_po", $quiz) ? $quiz['curr_weight_po'] : "");//Curr Weight US
    array_push($newrow, array_key_exists("goal_weight_po", $quiz) ? $quiz['goal_weight_po'] : "");//Goal Weight US
    array_push($newrow, array_key_exists("curr_weight_kg", $quiz) ? $quiz['curr_weight_kg'] : "");//Curr Weight metric
    array_push($newrow, array_key_exists("goal_weight_kg", $quiz) ? $quiz['goal_weight_kg'] : "");//Goal Weight metric
    
    $purchased = 0;
    if(strlen($name) > 0) {
        $purchased = 1;
    }
    array_push($newrow, $purchased);//purchased;
    array_push($newrow, "");//upsell 1
    array_push($newrow, "");//upsell 2
    array_push($newrow, "");//upsell 3
    array_push($newrow, $row['total_price']);//total price
    
    
    fputcsv($fp, $newrow);
}

//Close the file pointer.
fclose($fp);

//echo date('Y-m-d H:i:s') . "<br />";
//echo "All Done";
return;
?>
