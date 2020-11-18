<?php

// $sid = $_GET['sid'];//51164032 Test345_swap
// $shopify_variant_id = $_GET['shopify_variant_id'];//22472713568374 "KSC:SHAKE: 1 CHOC $10 Off  AUTO RENEW"
// $next_charge_scheduled_at = $_GET['next_charge_scheduled_at'];//2019-09-28T00:00:00
// $order_interval_frequency = $_GET['order_interval_frequency'];//28
// $order_interval_unit = $_GET['order_interval_unit'];//day
// $charge_interval_frequency = $order_interval_frequency;//28

$sid = $_GET['sid'];
$next_charge_scheduled_at = $_GET['next_charge_scheduled_at'];


$today = date('Y-m-d H:i:s');



$order_interval_unit = 'day'; //day

$product_title = 'Custom Keto Meal Plan - 1 Month Auto Renew';
$variant_title = 'Default Title'; //optional
$shopify_variant_id = '29462149300342';//'22500030775414';
$next_charge_scheduled_at = Date('Y-m-d H:i:s', strtotime("+28 days", strtotime($next_charge_scheduled_at)));
$order_interval_frequency = '28';
$price = '39.00'; //
$sku = 'KCMP1'; //    
$charge_interval_frequency = $order_interval_frequency;


$data = array(
    'shopify_variant_id' => $shopify_variant_id,
    'next_charge_scheduled_at' => $next_charge_scheduled_at,
    'next_charge_scheduled_at' => $next_charge_scheduled_at,
    'order_interval_frequency' => $order_interval_frequency,
    'order_interval_unit' => $order_interval_unit,
    'charge_interval_frequency' => $charge_interval_frequency,
    'product_title' => $product_title,
//    'variant_title' => $variant_title,
    'price' => $price,
    'sku' => $sku,
);
$strData = json_encode($data);

//echo "\n<br />";


$curl = curl_init();
curl_setopt_array($curl, [
    //CURLOPT_PUT => 1,
    CURLOPT_CUSTOMREQUEST => "PUT",
    CURLOPT_RETURNTRANSFER => 1,
    CURLOPT_URL => 'https://api.rechargeapps.com/subscriptions/' . $sid,
    CURLOPT_HTTPHEADER => array(
        'X-Recharge-Access-Token: 7ab227591d205f353d30cbb0ef586450708b94f4d9e355036cdef355',
        'Accept: application/json',
        'Content-Type: application/json'
    ),
    CURLOPT_POSTFIELDS => $strData
]);

$resp = curl_exec($curl);
echo "Subscription Swap has been called successfully<br />" . $resp . "<br />";
curl_close($curl);
?>