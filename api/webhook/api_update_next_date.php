<?php

$sid = $_GET['sid']; //51184137 Test350

$curl = curl_init();
curl_setopt_array($curl, [
    CURLOPT_POST => 1,
    CURLOPT_RETURNTRANSFER => 1,
    CURLOPT_URL => 'https://api.rechargeapps.com/subscriptions/' . $sid . '/set_next_charge_date',
    CURLOPT_HTTPHEADER => array(
        'X-Recharge-Access-Token: 7ab227591d205f353d30cbb0ef586450708b94f4d9e355036cdef355',
        'Accept: application/json',
        'Content-Type: application/json'
        ),
    CURLOPT_POSTFIELDS => '{"datetime":"2019-11-27T15:30:44"}'
]);

$resp = curl_exec($curl);
echo "Subscription next date has been updated successfully<br />" . $resp . "<br />";
curl_close($curl);
?>