<?php

$data = array(
    'shopify_variant_id' => '31047834009718',
    'next_charge_scheduled_at' => '2020-02-19 02:08:35',
    'order_interval_frequency' => '84',
    'order_interval_unit' => 'day',
    'charge_interval_frequency' => '84',
    'customer_adjust_frequency_rule' => 'test_rule',
    'product_title' => 'Custom Keto Meal Plan - UPGRADE SPECIAL To 3 Month Auto Renew',
//    'variant_title' => $variant_title,
    'price' => '68.00',
    'sku' => 'KCMP3U',
);
$strData = json_encode($data);
//echo $strData;
//echo "\n<br />";


$curl = curl_init();
curl_setopt_array($curl, [
    //CURLOPT_PUT => 1,
    CURLOPT_CUSTOMREQUEST => "PUT",
    CURLOPT_RETURNTRANSFER => 1,
    CURLOPT_URL => 'https://api.rechargeapps.com/subscriptions/' . '55454605',
    CURLOPT_HTTPHEADER => array(
        'X-Recharge-Access-Token: 7ab227591d205f353d30cbb0ef586450708b94f4d9e355036cdef355',
        'Accept: application/json',
        'Content-Type: application/json'
    ),
    CURLOPT_POSTFIELDS => $strData
]);

$resp = curl_exec($curl);
//echo "Subscription Swap has been called successfully<br />" . $resp . "<br />";
echo $resp;
curl_close($curl);
?>