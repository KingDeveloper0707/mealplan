<?php

include 'db_config.php';

require_once('meal-plan-email-class.php');
$emailcontrol = new MealplanEmailInterface();

file_put_contents("carthook_purchase_log.txt", json_encode($_POST) . PHP_EOL, FILE_APPEND);

$email = getIfSet($_POST['email']);
$email = strtolower($email);
$first_name = getIfSet($_POST['first_name']);
$last_name = getIfSet($_POST['last_name']);
$first_name = mysqli_real_escape_string($conn, $first_name);
$last_name = mysqli_real_escape_string($conn, $last_name);
$total_price = getIfSet($_POST['total_price']);
$orderid = getIfSet($_POST['orderid']);
/* $weeknum = getIfSet($_POST['weeknum']); */
$product_title = getIfSet($_POST['product_title'], "Custom Keto Meal Plan");
$page = getIfSet($_POST['page']);


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


if (!$email) {
    $final_result = array('status' => 'failure', 'message' => 'No email inputed', 'email' => $email);
    echo json_encode($final_result);
    return;
}


if (
    !array_key_exists($product_title, $weeknums) && 
    !($page && $page === "thank you") &&
    !in_array($product_title, $product_orderbump)
        ) {
    echo "Wrong product title!";
    return;
}
/*
  if(!$weeknum) {
  $weeknum = 4;
  }
 */
$final_result = array();


/*
if (!checkExistedInCheckout($email, $orderid, $product_title, $conn) && 
        !($page && $page === "thank you")) {*/
if (!checkExistedInCheckout($email, $orderid, $product_title, $conn) && !($product_title == "Custom Keto Meal Plan - 1 Month Auto Renew" && $page == "thank you")) {
    if($product_title == "Custom Keto Meal Plan with Special Add-On Offer") {
        $orderbump = 1;
        $sql = "INSERT INTO checkout (email, orderid, first_name, last_name, total_price, product_title, orderbump) VALUES('" . $email . "', '" . $orderid . "', '" . $first_name . "', '" . $last_name . "', '" . $total_price . "', '" . $product_title . "', '" . $orderbump . "')";    
    } else {
        $sql = "INSERT INTO checkout (email, orderid, first_name, last_name, total_price, product_title) VALUES('" . $email . "', '" . $orderid . "', '" . $first_name . "', '" . $last_name . "', '" . $total_price . "', '" . $product_title . "')";    
    }
    

    if ($conn->query($sql) === TRUE) {
        
        if(in_array($product_title, $product_orderbump)) {
            $uid = getUidFromEmail($email, $conn);
            $final_result = array('status' => 'success', 'uid' => $uid);
            echo json_encode($final_result);
            return;
        }
        
        updateQuizEmail($email, $conn);
        $str_quiz = getQuiz($email, $conn);
        
        if(!$str_quiz || strlen($str_quiz) == 0) {
            send_blank_notif($email, $orderid, $conn);
        }
        
        $quiz = array();
        $quiz = json_decode($str_quiz, true);

        if($product_title === "Custom Keto Meal Plan - 1 Month Auto Renew") {
            $prev_paid_num = 0;
            $count = 10;
            $mealplan = createMealPlan($quiz, $conn, $weeknums[$product_title], $prev_paid_num, $count);
        } else if($product_title === "Custom Keto Meal Plan - UPGRADE SPECIAL To 12 Month Auto Renew" || $product_title === "Custom Keto Meal Plan - UPGRADE SPECIAL To 3 Month Auto Renew") {
            $prev_paid_num = intval($weeknums[$product_title]) / 4;
            $count = 10;
            $cycle = intval($weeknums[$product_title]) / 4;//52/4 = 13
            $prevMealPlan = array("1"=>array(),"2"=>array(),"3"=>array(),"4"=>array());
            
            for($i = 0 ; $i < $cycle ; $i++) {
                $mealplan = createMealPlan($quiz, $conn, $weeknums['Custom Keto Meal Plan - 1 Month Auto Renew'], $i, $count);
                $prevMealPlan = mergeMealPlan($mealplan, $prevMealPlan);
            }
            $mealplan = $prevMealPlan;
        } else {
            $mealplan = createMealPlan($quiz, $conn, $weeknums[$product_title]);
        }

        $uid = saveMealPlan($mealplan, $email, $orderid, $conn);
        //$final_result = array('status' => 'success', 'mealplan' => $mealplan);

        $result_email = -1;
        /* if($weeknum == 30 || $weeknum == 56 || $weeknum == 12 || $subscription_frequency > 0 ) { */
        if (
                $product_title === "Meal Plan 12 Week Upgrade" ||
                $product_title === "Meal Plan 6 Month Upgrade" ||
                $product_title === "Meal Plan 12 Month Upgrade" ||
                $product_title === "Custom Keto Meal Plan - 1 Month Auto Renew" ||
                $product_title === "Custom Keto Meal Plan - 12 Month" ||
                $product_title === "Custom Keto Meal Plan - UPGRADE SPECIAL To 12 Month Auto Renew" ||
                $product_title === "Custom Keto Meal Plan - UPGRADE SPECIAL To 3 Month Auto Renew"
        ) {
            //TO CHANGE IT TO A CUSTOMER AND PUSH A LINK INTO THE EMAIL SYSTEM CALL IT AGAIN:
            $emaildata = array();
            
            if ($product_title === "Meal Plan 12 Week Upgrade") {
                $emaildata = array(
                    'name' => $first_name . " " . $last_name,
                    'apikey' => '123456789',
                    'email' => strtolower($email),
                    'status' => 'customer',
                    'action' => '12weekupsell',
                    'link' => 'https://simpleketosystem.com/mealplan?uid=' . $uid,
                );
            } else {
                $emaildata = array(
                    'name' => $first_name . " " . $last_name,
                    'apikey' => '123456789',
                    'email' => strtolower($email),
                    'status' => 'customer',
                    'action' => 'add',
                    'link' => 'https://simpleketosystem.com/mealplan?uid=' . $uid,
                );
            }

            //result is either 'ok' for success or returns error text
            $result_email = $emailcontrol->process_user($emaildata);
            if ($result_email == "ok") {
                updateEmailSent($email, $orderid, $conn);
            }
        }
        
        if( $product_title === "Custom Keto Meal Plan - UPGRADE SPECIAL To 12 Month Auto Renew" ||
            $product_title === "Custom Keto Meal Plan - UPGRADE SPECIAL To 3 Month Auto Renew") {
            $subscription_id = subscriptionCreated($email, $conn);
            
            if( strlen($subscription_id) > 0) {
                file_get_contents("https://simpleketosystem.com/api/webhook/api_update_product.php?sid=" . $subscription_id . "&product_title=" . urlencode($product_title));
                updateSubscriptionProductTitle($subscription_id, $product_title, $conn);
            }
        }

        //    var_dump($result);


        $final_result = array('status' => 'success', 'uid' => $uid, 'emailing-status' => $result_email);
    } else {
        $final_result = array('status' => $conn->error, 'sql' => $sql);
    }
} else {
    $existingUid = getUidWithOrderId($email, $orderid, $conn);
    $final_result = array('status' => 'success', 'uid' => $existingUid, 'emailing-status' => 'order duplicate');
    
    if ($page === "thank you" && getEmailSent($email, $orderid, $conn) == 0) {
        $emaildata = array(
            'name' => $first_name . " " . $last_name,
            'apikey' => '123456789',
            'email' => strtolower($email),
            'status' => 'customer',
            'action' => 'add',
            'link' => 'https://simpleketosystem.com/mealplan?uid=' . $existingUid,
        );
        //result is either 'ok' for success or returns error text
        $result_email = $emailcontrol->process_user($emaildata);
        if ($result_email == "ok") {
            updateEmailSent($email, $orderid, $conn);
        }
    }
}


echo json_encode($final_result);

$conn->close();
return;

function mergeMealPlan($mealplan, $prevMealPlan) {
        $mealplanObjectNew = array();
    
        for ($type = 1; $type <= 4; $type++) {
            $type_array = array();
            $type_array = $mealplan[$type];
    
            $mealplanObjectNew[$type] = array_merge($prevMealPlan[$type], $mealplan[$type]);
        }
    
        return $mealplanObjectNew;
    }

function subscriptionCreated($email, $conn) {
    $returnVal = "";
    $product_title = "Custom Keto Meal Plan - 1 Month Auto Renew";
    $sql = "SELECT * FROM subscription WHERE email = '" . $email . "' AND product_title = '" . $product_title . "' ORDER BY update_time DESC LIMIT 1";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $returnVal = $row['subscription_id'];
        }
    }
    
    return $returnVal;
}

function updateSubscriptionProductTitle($subscription_id, $product_title, $conn) {
    $returnVal = false;    
    $sql = "UPDATE subscription SET product_title='" . $product_title . "' WHERE subscription_id='" . $subscription_id . "'";
    if ($conn->query($sql) === TRUE) {
        $returnVal = true;
    } else {
        $returnVal = false;
        echo $conn->error;
    }
    return $returnVal;
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

function createMealPlan($quiz, $conn, $weeknum = 4, $prev_paid_num = -1, $count = -1) {

    $gender = $quiz['gender'];
//    $q_time = $quiz['q_time'];
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
        //        if (!$quiz['dairy'])
        //        $sql .= " AND dairy = " . $quiz['dairy'];///+++
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
        
        if ($prev_paid_num >= 0 && $count >= 0) {
            $result = $conn->query($sql);
            $total_num = $result->num_rows;
            $used_num = $prev_paid_num * $count;           

            if ($total_num >= $used_num + $count) {                
                $sql .= " LIMIT " . $used_num . ", " . $count;
            } else if ($total_num <= $count) {
                
            } else if ($total_num > $count && (($used_num + $count) % $total_num) < $count && (($used_num + $count) % $total_num) > 0) {
                $diff_first = $count - ($used_num + $count) % $total_num;
                $original_sql = $sql;
                $sql = "(" . $original_sql . " LIMIT " . ($used_num % $total_num) . ", " . $diff_first . ")";
                $sql .= " UNION (" . $original_sql . " LIMIT 0, " . (intval($count) - intval($diff_first)) . ")";                
            } else if ($total_num > $count) {
                $sql .= " LIMIT " . ($used_num % $total_num) . ", " . $count;                
            }
        }

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
    
    $sql = "UPDATE quiz INNER JOIN email_change_history as ech ON ech.email_quiz = quiz.email SET quiz.email = ech.email_checkout WHERE ech.email_checkout = '" . $email_checkout . "';";
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