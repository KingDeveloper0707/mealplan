<?php

require_once('meal-plan-email-class.php');
$emailcontrol = new MealplanEmailInterface();

include 'db_config.php';


$email = getIfSet($_POST['email']);
$email = strtolower($email);
$tags = getIfSet($_POST['tags']);
$line_items_title = getIfSet($_POST['refunds_refund_line_items_line_item_title']);
$line_items_price = getIfSet($_POST['refunds_refund_line_items_line_item_price']);
$financial_status = getIfSet($_POST['financial_status']);
$refunds_transactions_amount = getIfSet($_POST['refunds_transactions_amount']);
$refunds_id = getIfSet($_POST['refunds_id']);


if(!$line_items_title) {
    $line_items_title = getIfSet($_POST['line_items_title']);
    $line_items_price = getIfSet($_POST['line_items_price']);
}

//ob check start
$line_items_title_test = getIfSet($_POST['line_items_title']);
$line_items_title_array_test =  explode(',', $line_items_title_test);
$orderbump_index_test = array_search("Custom Keto Meal Plan with Special Add-On Offer", $line_items_title_array_test);
if(
    $financial_status && $financial_status == "partially_refunded" && 
    $orderbump_index_test !== false) {
    $line_items_title = $line_items_title_test;
    $line_items_price = $refunds_transactions_amount;
}
//ob check end

file_put_contents("zapier_refund_log.txt",json_encode($_POST) . PHP_EOL, FILE_APPEND);
//saveTestStr(json_encode($_POST), $conn);

if (!$email || !$tags) {
    $final_result = array('status' => 'failure', 'message' => 'no email or tags');
    echo json_encode($final_result);
    return;
}


$matches = array();
preg_match('/(\w*ch_id_\w*)/', $tags, $matches);
if (count($matches) > 0) {
    if (substr($matches[0], 0, strlen('ch_id_')) == 'ch_id_') {
        $ch_order_id = substr($matches[0], strlen('ch_id_'));
    }
}


preg_match('/(\w*Subscription Recurring Order\w*)/', $tags, $matches);
if (count($matches) > 0) {
    $ch_order_id = getOrderIdFromEmailInCheckout($email, $conn);
}

if (strlen($ch_order_id) == 0) {
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
$refunds_transactions_amount_array = explode(',', $refunds_transactions_amount);
$refunds_id_array = explode(',', $refunds_id);


$diff_size = count($line_items_title_array) - count($refunds_id_array);
if($diff_size >= 0) {
    $last_refund_id = end($refunds_id_array);
    for($i = 0 ; $i < $diff_size ; $i++) {
        array_push($refunds_id_array, $last_refund_id);
    }
} else {
    $diff_size = $diff_size * (-1);
    $last_line_item_title = end($line_items_title_array);
    for($i = 0 ; $i < $diff_size ; $i++) {
        array_push($line_items_title_array, $last_line_item_title);
    }
}


//new
foreach ($line_items_title_array as $key => $line_item_title) {
    if (!array_key_exists($line_item_title, $product_weeknums)) {
        unset($line_items_title_array[$key]);
        unset($refunds_id_array[$key]);
    } else {
        if(addRefund($refunds_id_array[$key], $line_items_title_array[$key], $conn) == false) {
            unset($line_items_title_array[$key]);
            unset($refunds_id_array[$key]);
        }
    }
}



if(count($line_items_title_array) == 0) {
    $final_result = array('status' => 'failure', 'message' => 'No line items');
    echo json_encode($final_result);
    return;
}
//echo json_encode($line_items_title_array);


//refund order bump
$orderbump_index = array_search("Custom Keto Meal Plan with Special Add-On Offer", $line_items_title_array);
if(
    $financial_status && $financial_status == "partially_refunded" && 
    $orderbump_index !== false) {

    $orderbump_price_array = array('19.00');
    $orderbump_refund = false;
    for($i = 0 ; $i < count($refunds_transactions_amount_array) ; $i++) {
        if(array_search($refunds_transactions_amount_array[$i], $orderbump_price_array) !== false) {
               $orderbump_refund = true;
        }
    }
    if($orderbump_refund) {
        
        $refund_result = refundOrderBump($email, $ch_order_id, $conn);
        if($refund_result) {
            if(count($refunds_transactions_amount_array) > 1) {
                unset($line_items_title_array[$orderbump_index]);
            } else {
                $final_result = array('status' => 'success');
                echo json_encode($final_result);
                $conn->close();
                return;            
            }
        }
    }
}

//coupon refunding preventing
if($financial_status && $financial_status == "partially_refunded") {
    $coupon_array = array('19.50');
    for($i = 0 ; $i < count($refunds_transactions_amount_array) ; $i++) {
        if(array_search($refunds_transactions_amount_array[$i], $coupon_array) !== false) {
            $final_result = array('status' => 'failure', 'message' => 'coupon refunding');
            echo json_encode($final_result);
            return;
        }
    }
}



if (refund($email, $ch_order_id, $line_items_title_array, $product_weeknums, $conn)) {
    $final_result = array('status' => 'success');
}

echo json_encode($final_result);


$conn->close();
return;



function getIfSet(&$value, $default = 0) {
    return isset($value) ? $value : $default;
}
function getPrevPlan($email, $orderid, $product_title, $product_weeknums, $conn) {
    $returnVal = "";
    $sql = "SELECT * FROM checkout WHERE email = '" . $email . "' AND orderid='" . $orderid . "' AND product_title = '" . $product_title . "' AND refund = '0'";
    $result = $conn->query($sql);
    if ($result->num_rows == 1) {
        $sql = "SELECT * FROM checkout WHERE email = '" . $email . "' AND orderid='" . $orderid . "' AND product_title != '" . $product_title . "' AND refund = '0' ORDER BY create_time DESC LIMIT 1";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $returnVal = $row['product_title'];
            }
        }
    }
    return $returnVal;
}
function refundOrderBump($email, $orderid, $conn) {
    $returnVal = false;
    $sql = "UPDATE checkout SET orderbump='0' WHERE email='" . $email . "' AND orderid='" . $orderid . "' AND product_title = 'Custom Keto Meal Plan with Special Add-On Offer' LIMIT 1";
    
    if ($conn->query($sql) === TRUE) {
        $returnVal = true;
    }
    return $returnVal;
}
/*
function refundOrderBump($email, $orderid, $new_price, $old_price, $conn) {
    $returnVal = false;
    $sql = "UPDATE checkout SET total_price='" . $new_price . "',  product_title = 'Custom Keto Meal Plan' WHERE email='" . $email . "' AND orderid='" . $orderid . "' AND (total_price ='58' || total_price = '58.00') AND product_title = 'Custom Keto Meal Plan with Special Add-On Offer' LIMIT 1";
    
    if ($conn->query($sql) === TRUE) {
        $returnVal = true;
    }
    return $returnVal;
}
*/
function refund($email, $orderid, $line_items_title_array, $product_weeknums, $conn) {    

    foreach ($line_items_title_array as $key => $line_item_title) {
        
        
        if (array_key_exists($line_item_title, $product_weeknums)) {
            
            $sql = "SELECT mealplan FROM mealplan WHERE email='" . $email . "' AND orderid='" . $orderid . "' LIMIT 1";
            
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    
                    $strMealPlan = $row['mealplan'];
                    $mealplanObject = json_decode($strMealPlan, true);
                    $mealplanObjectNew = array();
                    
                    $prevPlanTitle = getPrevPlan($email, $orderid, $line_item_title, $product_weeknums, $conn);
                    $prevPlanWeek = strlen($prevPlanTitle) > 0 ? $product_weeknums[$prevPlanTitle] : 0;
                        
                    if (count($mealplanObject["1"]) >= 28 && count($mealplanObject["1"]) > $product_weeknums[$line_item_title] * 7 - $prevPlanWeek * 7) {
                        for ($type = 1; $type <= 4; $type++) {
                            $type_array = array();
                            $type_array = $mealplanObject[$type];
                            $mealplanObjectNew[$type] = array_slice($type_array, 0, count($type_array) - $product_weeknums[$line_item_title]*7  + $prevPlanWeek*7);
                        }
                        $strMealPlan = json_encode($mealplanObjectNew);
                        $sql = "UPDATE mealplan SET mealplan='" . $strMealPlan . "' WHERE email='" . $email . "' AND orderid='" . $orderid . "'";
                        
                        if ($conn->query($sql) === TRUE) {
                            
                        }
                    } else {
                        
                        //remove mealplan at all
                        $sql = "DELETE FROM mealplan WHERE email='" . $email . "' AND orderid='" . $orderid . "' LIMIT 1";
                        if ($conn->query($sql) === TRUE) {
                            $sql = "UPDATE checkout SET refund='1' WHERE product_title LIKE '%Meal Plan%' AND email='" . $email . "' AND orderid='" . $orderid . "' AND refund='0' LIMIT 1";
                            $conn->query($sql);
                        }
                        ///+++ subscription downgrade and remove logic
                        if($line_item_title == "Custom Keto Meal Plan - UPGRADE SPECIAL To 12 Month Auto Renew" || 
                            $line_item_title == "Custom Keto Meal Plan - UPGRADE SPECIAL To 3 Month Auto Renew" || 
                            $line_item_title == "Custom Keto Meal Plan - 1 Month Auto Renew") {
                            $subscription_id = getSubscriptionId($email, $conn);
                            file_get_contents("https://simpleketosystem.com/api/webhook/api_cancel_subscription.php?sid=" . $subscription_id);    
                        }
                        ///---
                    }
                    ///+++ subscription downgrade and remove logic
                    if(
                        $line_item_title == "Custom Keto Meal Plan - UPGRADE SPECIAL To 12 Month Auto Renew" ||
                        $line_item_title == "Custom Keto Meal Plan - UPGRADE SPECIAL To 3 Month Auto Renew"
                    ) {
                        $sql = "SELECT * FROM checkout WHERE product_title='" . $line_item_title . "' AND email='" . $email . "' AND orderid='" . $orderid . "' AND refund='0'";
                        $result_sub1 = $conn->query($sql);
                        $result_num = $result_sub1->num_rows;
                        
                        $subscription_id = getSubscriptionId($email, $conn);
                        if ($result_num == 1) {//check if initial upgrade
                            //get create_time
                            $next_charge_scheduled_at = "";
                            $sql = "SELECT create_time FROM checkout WHERE product_title = 'Custom Keto Meal Plan - 1 Month Auto Renew' AND orderid = '" . $orderid . "' AND email = '" . $email . "' ORDER BY create_time DESC LIMIT 1";
                            $result_sub2 = $conn->query($sql);
                            
                            if ($result_sub2->num_rows > 0) {
                                while ($row = $result_sub2->fetch_assoc()) {
                                    $next_charge_scheduled_at = $row['create_time'];
                                }
                            }
                            if($next_charge_scheduled_at && strlen($next_charge_scheduled_at) > 0) {
                                file_get_contents("https://simpleketosystem.com/api/webhook/api_downgrade_product.php?sid=" . $subscription_id . "&next_charge_scheduled_at=" . urlencode($next_charge_scheduled_at));    
                            }
                        } else if($result_num > 1){
                              file_get_contents("https://simpleketosystem.com/api/webhook/api_cancel_subscription.php?sid=" . $subscription_id);    
                        }
                    } else if($line_item_title == "Custom Keto Meal Plan - 1 Month Auto Renew") {
                        $subscription_id = getSubscriptionId($email, $conn);
                        echo file_get_contents("https://simpleketosystem.com/api/webhook/api_cancel_subscription.php?sid=" . $subscription_id);    
                    }
                    ///---
                    
                    //flag refund to 1 for the item
                    $sql = "UPDATE checkout SET refund='1' WHERE product_title='" . $line_item_title . "' AND email='" . $email . "' AND orderid='" . $orderid . "' AND refund='0' LIMIT 1";
                    
                    if ($conn->query($sql) === TRUE) {
                        
                    }
                }
            }
        }
    }
    return true;
}

function getSubscriptionId($email, $conn) {
    $returnVal = "";
    $sql = "SELECT * FROM subscription WHERE email = '" . $email . "' ORDER BY update_time DESC LIMIT 1";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $returnVal = $row['subscription_id'];
        }
    }
    return $returnVal;
}

function saveTestStr($str, $conn) {
    $sql = "INSERT INTO zapiertest(str, isrefund) VALUES('" . $str . "', '1')";
    if ($conn->query($sql) === TRUE) {
    }
    
}
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

function getMainProductTitle($email, $orderid, $conn) {
    $returnValue = null;
    $sql = "SELECT product_title FROM checkout WHERE product_title LIKE '%Custom Keto Meal Plan%' AND product_title NOT LIKE '%Upgrade%' ORDER BY `create_time` DESC LIMIT 1";
    
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $returnValue = $row['product_title'];
        }
    }
    return $returnValue;
}

function getOrderIdFromEmailInCheckout($email, $conn) {
    $returnVal = "";
    $sql = "SELECT orderid FROM checkout WHERE email='" . $email . "' ORDER BY create_time DESC LIMIT 1";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $returnVal = $row['orderid'];
        }
    }
    return $returnVal;
}

function addRefund($refund_id, $product_title, $conn) {
    $returnValue = false;
    $sql = "SELECT * FROM zapier_refund WHERE refund_id = '" . $refund_id . "' AND product_title = '" . $product_title . "'";
    $result = $conn->query($sql);
    if($result->num_rows > 0) {
        $returnValue = false;
    } else {
        $sql = "INSERT INTO zapier_refund(refund_id, product_title) VALUES('" . $refund_id . "', '" . $product_title . "')";
        if ($conn->query($sql) === TRUE) {
            $returnValue = true;
        }      
    }
    return $returnValue;
}
?>