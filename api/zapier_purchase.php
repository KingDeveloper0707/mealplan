<?php

require_once('meal-plan-email-class.php');
$emailcontrol = new MealplanEmailInterface();

include 'db_config.php';

$email = getIfSet($_POST['email']);
$email = strtolower($email);
$tags = getIfSet($_POST['tags']);
$first_name = getIfSet($_POST['first_name']);
$last_name = getIfSet($_POST['last_name']);
$first_name = mysqli_real_escape_string($conn, $first_name);
$last_name = mysqli_real_escape_string($conn, $last_name);
$total_price = getIfSet($_POST['total_price']);
$line_items_title = getIfSet($_POST['line_items_title']);
$line_items_price = getIfSet($_POST['line_items_price']);


$final_result = array();

file_put_contents("zapier_purchase_log.txt", json_encode($_POST) . PHP_EOL, FILE_APPEND);
//saveTestStr(json_encode($_POST), $conn);



if (!$email || !$tags) {
    $final_result = array('status' => 'failure', 'message' => 'no email or tags');
    echo json_encode($final_result);
    return;
}

$orderid = "";
$matches = array();
preg_match('/(\w*ch_id_\w*)/', $tags, $matches);
if (count($matches) > 0) {
    if (substr($matches[0], 0, strlen('ch_id_')) == 'ch_id_') {
        $orderid = substr($matches[0], strlen('ch_id_'));
    }
}
if (strlen($orderid) == 0) {
    $final_result = array('status' => 'failure', 'message' => 'No carthook id');
    echo json_encode($final_result);
    return;
}

$product_weeknums = array(
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




$line_items_title_array = explode(',', $line_items_title);
$line_items_price_array = explode(',', $line_items_price);

$line_items_existed = false;
foreach ($product_weeknums as $product_title => $weeknum) {
    if (in_array($product_title, $line_items_title_array)) {
        $line_items_existed = true;
        break;
    }
}
if (!$line_items_existed) {
    $final_result = array('status' => 'failure', 'message' => 'No line items from Zapier');
    echo json_encode($final_result);
    return;
}


$weeknum = 0;
$order_duplicate = 0;

$mainProduct = getMainProduct($product_weeknums, $line_items_title, $line_items_price);
$upgradeProduct = getUpgradeProduct($product_weeknums, $line_items_title, $line_items_price);

if (!empty($mainProduct)) {
    $weeknum = $product_weeknums[$mainProduct['product_title']];
    if (!checkExistedInCheckout($email, $orderid, $mainProduct['product_title'], $conn)) {
        if($product_title == "Custom Keto Meal Plan with Special Add-On Offer") {
            $orderbump = 1;
            $sql = "INSERT INTO checkout (email, orderid, first_name, last_name, total_price, product_title, orderbump) VALUES('" . $email . "', '" . $orderid . "', '" . $first_name . "', '" . $last_name . "', '" . $mainProduct['product_price'] . "', '" . $mainProduct['product_title'] . "', '" . $orderbump . "')";    
        } else {
            $sql = "INSERT INTO checkout (email, orderid, first_name, last_name, total_price, product_title) VALUES('" . $email . "', '" . $orderid . "', '" . $first_name . "', '" . $last_name . "', '" . $mainProduct['product_price'] . "', '" . $mainProduct['product_title'] . "')";
        }
        $conn->query($sql);
    } else {
        $order_duplicate = 1;
    }
}
if (!empty($upgradeProduct)) {
    $weeknum = $product_weeknums[$upgradeProduct['product_title']];
//    $total_price = $price_upgrade;
    if (!checkExistedInCheckout($email, $orderid, $upgradeProduct['product_title'], $conn)) {
        $sql = "INSERT INTO checkout (email, orderid, first_name, last_name, total_price, product_title) VALUES('" . $email . "', '" . $orderid . "', '" . $first_name . "', '" . $last_name . "', '" . $upgradeProduct['product_price'] . "', '" . $upgradeProduct['product_title'] . "')";
        $conn->query($sql);
    } else {
        $order_duplicate = 2;
    }
}

if (
        (!empty($mainProduct) && empty($upgradeProduct) && $order_duplicate == 1) ||
        (empty($mainProduct) && !empty($upgradeProduct) && $order_duplicate == 2) ||
        (!empty($mainProduct) && !empty($upgradeProduct) && $order_duplicate == 2)
) {
    $existingUid = getUidWithOrderId($email, $orderid, $conn);
    $final_result = array('status' => 'success', 'uid' => $existingUid, 'emailing-status' => 'order duplicate');

    if (!empty($mainProduct) && empty($upgradeProduct)) {
        $emailsent = getEmailSent($email, $orderid, $conn);
        if ($emailsent == 0) {
            $emaildata = array(
                'name' => $first_name . " " . $last_name,
                'apikey' => '123456789',
                'email' => strtolower($email),
                'status' => 'customer',
                'action' => 'add',
                'link' => 'https://simpleketosystem.com/mealplan?uid=' . $existingUid
            );
            $result_email = $emailcontrol->process_user($emaildata);
            if ($result_email == "ok") {
                updateEmailSent($email, $orderid, $conn);
            }
        }
    }

    echo json_encode($final_result);
    $conn->close();
    return;
}

updateQuizEmail($email, $conn);
$str_quiz = getQuiz($email, $conn);

if(!$str_quiz || strlen($str_quiz) == 0) {
    send_blank_notif($email, $orderid, $conn);
}

$quiz = array();
$quiz = json_decode($str_quiz, true);

$mealplan = createMealPlan($quiz, $conn, $weeknum);

$uid = saveMealPlan($mealplan, $email, $orderid, $conn);
//$final_result = array('status' => 'success', 'mealplan' => $mealplan);

$result_email = -1;

$emailsent = getEmailSent($email, $orderid, $conn);
if ($emailsent == 0) {
    //TO CHANGE IT TO A CUSTOMER AND PUSH A LINK INTO THE EMAIL SYSTEM CALL IT AGAIN:
    $emaildata = array(
        'name' => $first_name . " " . $last_name,
        'apikey' => '123456789',
        'email' => strtolower($email),
        'status' => 'customer',
        'action' => 'add',
        'link' => 'https://simpleketosystem.com/mealplan?uid=' . $uid,
    );
    //result is either 'ok' for success or returns error text
    $result_email = $emailcontrol->process_user($emaildata);

    if ($result_email == "ok") {
        updateEmailSent($email, $orderid, $conn);
    }
}
//    var_dump($result);


$final_result = array('status' => 'success', 'uid' => $uid, 'emailing-status' => $result_email);



echo json_encode($final_result);

$conn->close();
return;

function getMainProduct($product_weeknums, $line_items_title, $line_items_price) {

    $line_items_title_array = explode(',', $line_items_title);
    $line_items_price_array = explode(',', $line_items_price);


    $mainProduct = array();
    foreach ($product_weeknums as $product_title => $weeknum) {
        $index = array_search($product_title, $line_items_title_array);
        if ($index !== false &&
                strpos($product_title, 'Custom Keto Meal Plan') !== false &&
                strpos($product_title, 'Upgrade') === false) {

            $mainProduct = array('product_title' => $product_title, 'product_price' => $line_items_price_array[$index]);
            break;
        }
    }
    return $mainProduct;
}

function getUpgradeProduct($product_weeknums, $line_items_title, $line_items_price) {

    $line_items_title_array = explode(',', $line_items_title);
    $line_items_price_array = explode(',', $line_items_price);


    $upgradeProduct = array();
    foreach ($product_weeknums as $product_title => $weeknum) {
        $index = array_search($product_title, $line_items_title_array);
        if ($index !== false &&
                ((strpos($product_title, 'Custom Keto Meal Plan') === false && strpos($product_title, 'Upgrade') !== false) ||
                $product_title === "Custom Keto Meal Plan - UPGRADE SPECIAL To 12 Month Auto Renew" || 
                $product_title === "Custom Keto Meal Plan - UPGRADE SPECIAL To 3 Month Auto Renew")) {

            $upgradeProduct = array('product_title' => $product_title, 'product_price' => $line_items_price_array[$index]);

            break;
        }
    }
    return $upgradeProduct;
}

function getEmailSent($email, $orderid, $conn) {
    $returnVal = 0;
    $sql = "SELECT emailsent FROM mealplan WHERE email='" . $email . "' AND orderid='" . $orderid . "' LIMIT 1";

    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $returnVal = $row['emailsent'];
        }
    } else {
        $returnVal = 0;
    }
    //return $sql;
    return $returnVal;
}

function updateEmailSent($email, $orderid, $conn) {
    $returnVal = false;
    $emailsent = 1;
    $sql = "UPDATE mealplan SET emailsent='" . $emailsent . "' WHERE email='" . $email . "' AND orderid='" . $orderid . "'";

    if ($conn->query($sql) === TRUE) {
        $returnVal = true;
    } else {
        
    }
    return $returnVal;
}

function saveTestStr($str, $conn) {
    $sql = "INSERT INTO zapiertest(str) VALUES('" . $str . "')";
    if ($conn->query($sql) === TRUE) {
        
    }
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

function checkExistedInCheckout($email, $orderid, $product_title, $conn) {
    $returnVal = false;
    $sql = "SELECT * FROM checkout WHERE email='" . $email . "' AND orderid = '" . $orderid . "' AND product_title = '" . $product_title . "'";


    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $returnVal = true;
    }
    return $returnVal;
}

function checkMealPlanExisted($email, $conn) {
    $returnVal = false;
    $sql = "SELECT * FROM mealplan WHERE email='" . $email . "'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $returnVal = true;
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

function saveMealPlan($mealplan, $email, $orderid, $conn) {
    $returnVal = false;
    $mealplan = json_encode($mealplan);
    $existingUid = getUidWithOrderId($email, $orderid, $conn);
    if ($existingUid > 0) {
        $uid = $existingUid;
    } else {
        $uid = $orderid;
    }

    if (checkMealPlanExisted($email, $conn)) {
        $sql = "UPDATE mealplan SET uid='" . $uid . "', mealplan='" . $mealplan . "', orderid='" . $orderid . "' WHERE email='" . $email . "'";
    } else {
        $sql = "INSERT INTO mealplan (email, orderid, uid, mealplan) VALUES('" . $email . "', '" . $orderid . "', '" . $uid . "', '" . $mealplan . "')";
    }
    if ($conn->query($sql) === TRUE) {
        
    } else {
        $uid = -1;
    }


    return $uid;
}

function createMealPlan($quiz, $conn, $weeknum = 4) {

    $gender = $quiz['gender'];

    //$q_activity = $quiz['q_activity'];
    //$q_recent_changes = $quiz['q_recent_changes'];

    $period = $weeknum * 7;

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

        //echo "sql = " . $sql . "</br>";

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {

            $day = 0;
            
            while ($day < $period) {
                $result->data_seek(0);
                while ($row = $result->fetch_assoc()) {
                    $type_result[] = $row['id'];
                    $day++;

                    if ($day >= $period) {
                        break;
                    }
                }
                if ($day >= $period) {
                    break;
                }
            }
        }

        $final_result[$type] = $type_result;
    }
    return $final_result;
}

function updateQuizEmail($email_checkout, $conn) {
    $returnVal = false;
    $emailsent = 1;
    $sql .= "UPDATE quiz INNER JOIN email_change_history as ech ON ech.email_quiz = quiz.email SET quiz.email = ech.email_checkout WHERE ech.email_checkout = '" . $email_checkout . "';";
    $result = $conn->query($sql);

    if ($conn->query($sql) === TRUE) {
        $sql = "DELETE FROM email_change_history WHERE email_checkout = '" . $email_checkout . "'";
        $result = $conn->query($sql);
        $returnVal = true;
    } else {
        
    }
    return $returnVal;
}

?>