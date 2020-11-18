<?php

$curl = curl_init();
curl_setopt_array($curl, [
    CURLOPT_POST => 1,
    CURLOPT_RETURNTRANSFER => 1,
    CURLOPT_URL => 'https://api.rechargeapps.com/webhooks',
    CURLOPT_HTTPHEADER => array(
        'X-Recharge-Access-Token: 7ab227591d205f353d30cbb0ef586450708b94f4d9e355036cdef355',
        'Accept: application/json',
        'Content-Type: application/json'
        ),
    CURLOPT_POSTFIELDS => '{"address":"https://simpleketosystem.com/internal/api/w_subscription_created", "topic":"subscription/created"}'
]);

$resp = curl_exec($curl);
echo "webhook subscription/created has been created<br />" . $resp . "<br />";
curl_close($curl);


$curl = curl_init();
curl_setopt_array($curl, [
    CURLOPT_POST => 1,
    CURLOPT_RETURNTRANSFER => 1,
    CURLOPT_URL => 'https://api.rechargeapps.com/webhooks',
    CURLOPT_HTTPHEADER => array(
        'X-Recharge-Access-Token: 7ab227591d205f353d30cbb0ef586450708b94f4d9e355036cdef355',
        'Accept: application/json',
        'Content-Type: application/json'
        ),
    CURLOPT_POSTFIELDS => '{"address":"https://simpleketosystem.com/internal/api/w_subscription_cancelled", "topic":"subscription/cancelled"}'
]);
$resp = curl_exec($curl);
echo "webhook charge/paid has been created<br />" . $resp . "<br />";
curl_close($curl);


$curl = curl_init();
curl_setopt_array($curl, [
    CURLOPT_POST => 1,
    CURLOPT_RETURNTRANSFER => 1,
    CURLOPT_URL => 'https://api.rechargeapps.com/webhooks',
    CURLOPT_HTTPHEADER => array(
        'X-Recharge-Access-Token: 7ab227591d205f353d30cbb0ef586450708b94f4d9e355036cdef355',
        'Accept: application/json',
        'Content-Type: application/json'
        ),
    CURLOPT_POSTFIELDS => '{"address":"https://simpleketosystem.com/internal/api/w_charge_paid", "topic":"charge/paid"}'
]);
$resp = curl_exec($curl);
echo "webhook charge/paid has been created<br />" . $resp . "<br />";
curl_close($curl);





?>