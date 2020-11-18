<?php
ini_set('memory_limit', '-1');

$weeknums = array(
    'Custom Keto Meal Plan' => 4,
    'Custom Keto Meal Plan - 1 Month Auto Renew' => 4,
    'Custom Keto Meal Plan with Special Add-On Offer' => 4,
    'Custom Keto Meal Plan - 2 month' => 9,
    'Custom Keto Meal Plan - 12 Month' => 56,
    'Custom Keto Meal Plan - 12 Week' => 16,
    'Meal Plan 12 Week Upgrade' => 16,
    'Meal Plan 6 Month Upgrade' => 30,
    'Meal Plan 12 Month Upgrade' => 56,
    'Custom Keto Meal Plan - UPGRADE SPECIAL To 12 Month Auto Renew' => 52,
    'Custom Keto Meal Plan - UPGRADE SPECIAL To 3 Month Auto Renew' => 12
);

$product_orderbump = array(
    'Keto Video Coaching with Ido',
    'Easy Keto Treats eBook',
    'EZ Grocery List eBook',
    'Fat Burning Desserts eBook',
    'How To Stay On Your Plan When Dining Out eBook',
    'Interrmittent Fasting Guide eBook',
    'Keto Comfort Foods eBook',
    'The Holiday Cookbook eBook',    
    'Workout At Home eBook'
);

include 'db_config.php';

$uid = getIfSet($_POST['uid']);
$visit = getIfSet($_POST['visit']);

if (!$uid) {
    $final_result = array('status' => 'failure', 'message' => 'No uid inputed');
    echo json_encode($final_result);
    return;
}

$sql = "";
if(strlen($uid) > 17) {
    $sql = "SELECT mealplan.* FROM mealplan LEFT JOIN checkout ON mealplan.email = checkout.email WHERE checkout.orderid = '" . $uid . "' LIMIT 1";
} else {
    $sql = "SELECT mealplan.* FROM mealplan WHERE uid='" . $uid . "' LIMIT 1";    
}

$result = $conn->query($sql);
$strMealPlan = "";
$type_array = array();
$mealplan_result = array();
$final_result = array();
$email = '';
$create_time = "";

if ($result->num_rows > 0) {

    while ($row = $result->fetch_assoc()) {
        $strMealPlan = $row['mealplan'];
        $email = $row['email'];
        $create_time = $row['create_time'];
    }
    $mealplanObject = json_decode($strMealPlan, true);
    for ($type = 1; $type <= 4; $type++) {
        $type_array = array();
        $type_array = $mealplanObject[$type];
        $type_result = array();
        for ($day = 0; $day < count($type_array); $day++) {
            $mealId = $type_array[$day];

            $sql = "SELECT * FROM meals WHERE id='" . $mealId . "' LIMIT 1";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $row['name'] = htmlspecialchars($row['name']);
                    $type_result[] = $row;
                }
            }
        }

        $mealplan_result[$type] = $type_result;
    }
}

if(!$visit || ($visit && $visit != "admin")) {
    updateVisit($email, $conn);
}

$final_result['mealplan'] = $mealplan_result;
//$final_result['quiz'] = getQuiz($email, $conn);

$objQuiz = json_decode(getQuiz($email, $conn), true);
$objQuiz['create_time'] = $create_time;
$final_result['quiz'] = json_encode($objQuiz);

$final_result['first_name'] = getFirstName($uid, $conn);
$final_result['orderbump'] = getOrderBump($email, $conn);
$final_result['orderbump_unlocked_ebooks'] = json_encode(getOrderBumpSeparated($email, $product_orderbump, $conn));

$quiz = array();
$quiz = json_decode($final_result['quiz'], true);
//$final_result['sql'] = getQuizSQL($quiz, $conn);
$final_result['product_title'] = getProductTitle($email, $weeknums, $conn);

echo json_encode($final_result);

$conn->close();
return;

function getIfSet(&$value, $default = 0) {
    return isset($value) ? $value : $default;
}

function updateVisit($email, $conn) {
    $sql = "UPDATE mealplan SET visit = visit + 1 WHERE email = '" . $email . "'";
    $result = $conn->query($sql);
}

function getProductTitle($email, $product_weeknums, $conn) {
    $returnVal = "";
    
    $product_titles = array_keys($product_weeknums);
    $product_titles_str = "'" . implode("','", $product_titles) . "'";
    
    $sql = "SELECT product_title FROM checkout WHERE email='" . $email . "' AND refund='0' AND product_title IN ($product_titles_str) ORDER BY create_time DESC LIMIT 1";

    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $returnVal = $row['product_title'];
        }
    }    

    return $returnVal;
}

function getOrderBump($email, $conn) {
    $returnVal = 0;
    $sql = "SELECT * FROM checkout WHERE email='" . $email . "' AND orderbump = '1' AND product_title = 'Custom Keto Meal Plan with Special Add-On Offer'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $returnVal = 1;
    }
    return $returnVal;
}

function getOrderBumpSeparated($email, $product_orderbump, $conn) {
    $returnVal = array();
    $product_orderbump_str = "'" . implode("','", $product_orderbump) . "'";
    $sql = "SELECT * FROM checkout WHERE email='" . $email . "' AND product_title IN ($product_orderbump_str)";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            array_push($returnVal, $row['product_title']);
        }
    }
    return $returnVal;
}

function getFirstName($uid, $conn) {
    $returnVal = "";
    $sql = "SELECT ch.first_name FROM checkout as ch LEFT JOIN mealplan as mp ON ch.email = mp.email AND ch.orderid = mp.orderid WHERE mp.uid = '" . $uid . "' ORDER BY ch.create_time DESC LIMIT 1";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $returnVal = $row['first_name'];
        }
    }
    if(strlen($returnVal) == 0) {
        $sql = "SELECT ch.first_name FROM checkout as ch LEFT JOIN mealplan as mp ON ch.email = mp.email WHERE mp.uid = '" . $uid . "' ORDER BY ch.create_time DESC LIMIT 1";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $returnVal = $row['first_name'];
            }
        }   
    }
    return $returnVal;
}

function getQuiz($email, $conn) {
    $returnVal = "";
    $sql = "SELECT quiz FROM quiz WHERE email='" . $email . "' LIMIT 1";

    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $returnVal = $row['quiz'];
        }
    }
    return $returnVal;
}

function getQuizSQL($quiz, $conn) {

    $gender = $quiz['gender'];
    $q_time = $quiz['q_time'];
    //$q_activity = $quiz['q_activity'];
    //$q_recent_changes = $quiz['q_recent_changes'];


    $final_result = array();
    $type_result = array();

    for ($type = 1; $type <= 4; $type++) {

        $type_result = array();

        $sql = "SELECT * FROM meals";
        $sql .= " WHERE type = " . $type;

        /*
          if ($q_time == 0) {
          $sql .= " AND prep_mins >= 0 AND prep_mins <= 30 ";
          } else if ($q_time == 3) {
          $sql .= " AND prep_mins >= 0 AND prep_mins <= 20 ";
          }
         */

        if (!$quiz['chicken']) // if chicken is not selected, the meals that has chicken must NOT be contained in the meal plan.
            $sql .= " AND chicken = " . $quiz['chicken'];
        if (!$quiz['pork'])
            $sql .= " AND pork = " . $quiz['pork'];
        if (!$quiz['beef'])
            $sql .= " AND beef = " . $quiz['beef'];
        if (!$quiz['fish'])
            $sql .= " AND fish = " . $quiz['fish'];
        if (!$quiz['bacon'])
            $sql .= " AND bacon = " . $quiz['bacon'];
        if (!$quiz['broccoli'])
            $sql .= " AND broccoli = " . $quiz['broccoli'];
        if (!$quiz['mushroom'])
            $sql .= " AND mushroom = " . $quiz['mushroom'];
        if (!$quiz['zuccini'])
            $sql .= " AND zuccini = " . $quiz['zuccini'];
        if (!$quiz['cauliflower'])
            $sql .= " AND cauliflower = " . $quiz['cauliflower'];
        if (!$quiz['asparagus'])
            $sql .= " AND asparagus = " . $quiz['asparagus'];
        if (!$quiz['avocado'])
            $sql .= " AND avocado = " . $quiz['avocado'];
        if ($quiz['egg'])
            $sql .= " AND egg = 0";
        if ($quiz['nut'])
            $sql .= " AND nut = 0";
        if ($quiz['cheese'])
            $sql .= " AND cheese = 0";
        if ($quiz['butter'])
            $sql .= " AND butter = 0";
        if ($quiz['coconut'])
            $sql .= " AND coconut = 0";
        if ($quiz['brussel_sprout'])
            $sql .= " AND brussel_sprout = 0";
        if ($quiz['chicken'] || $quiz['pork'] || $quiz['beef'] || $quiz['fish'] || $quiz['bacon']) {
            $sql .= " AND tofu = 0";
        }
        if($quiz['cheese'] && $quiz['butter']) {
            $sql .= " AND dairy = 0";
        }
        if (($quiz['no_meat'] || (!$quiz['chicken'] && !$quiz['pork'] && !$quiz['beef'] && !$quiz['fish'] && !$quiz['bacon'])) &&
                $quiz['cheese'] && $quiz['butter']) {
            $sql .= " AND vegetarian = 1";
        }
        $sql .= "  ORDER BY priority";

        $final_result[$type] = $sql;
    }
    return $final_result;
}

?>