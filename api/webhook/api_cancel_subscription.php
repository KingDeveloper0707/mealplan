<?php

$sid = $_GET['sid'];

$curl = curl_init();
curl_setopt_array($curl, [
    CURLOPT_POST => 1,
    CURLOPT_RETURNTRANSFER => 1,
    CURLOPT_URL => 'https://api.rechargeapps.com/subscriptions/' . $sid . '/cancel',
    CURLOPT_HTTPHEADER => array(
    'X-Recharge-Access-Token: 7ab227591d205f353d30cbb0ef586450708b94f4d9e355036cdef355',
    'Accept: application/json',
    'Content-Type: application/json'),
    CURLOPT_POSTFIELDS => '{"cancellation_reason":"other reason"}'
]);
$resp = curl_exec($curl);
echo $resp;
curl_close($curl);

?>