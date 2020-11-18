<?php

set_time_limit(200);
ini_set('memory_limit', '-1');



include 'db_config.php';

$sql = "DROP TABLE `mealplan_new`;";
$conn->query($sql);
$sql = "CREATE TABLE mealplan_new LIKE mealplan_old";
$conn->query($sql);
$sql = "INSERT mealplan_new SELECT * FROM mealplan_old;";
$conn->query($sql);


$match_table = [];
$sql = "SELECT meals_old.id as oid, meals_new.id as nid FROM meals_old LEFT JOIN meals_new ON meals_old.name = meals_new.name";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $match_table[$row['oid']] = $row['nid'];
    }
}
echo json_encode($match_table) . "<br />";

$sql = "SELECT id, mealplan FROM mealplan_new";
$result = $conn->query($sql);
if ($result->num_rows > 0) {

    while ($row = $result->fetch_assoc()) {
        $mealplan_id = $row['id'];
//        echo "old_" . $mealplan_id . " :<br/>" . $row['mealplan'] . "<br /><br />";
        $mealplan = json_decode($row['mealplan'], true);
        $new_mealplan = [];
        for ($type = 1; $type <= 4; $type++) {
            foreach ($mealplan[$type] as &$meal) {
                $meal = $match_table[$meal];
            }
            $new_mealplan[$type] = $mealplan[$type];
        }
        $new_mealplan = json_encode($new_mealplan);
//        echo "new:<br />" . $new_mealplan . "<br /><br /><br />";

        $sql_update = "UPDATE mealplan_new SET mealplan='" . $new_mealplan . "' WHERE id='" . $mealplan_id . "'";
        if ($conn->query($sql_update) === TRUE) {            
        } else {
            echo "error: " . $mealplan_id . "<br />";
        }
    }
    echo "All Done!";
}



return;
?>
