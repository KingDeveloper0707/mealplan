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
    CURLOPT_POSTFIELDS => '{"address":"https://simpleketosystem.com/api/webhook/w_subscription_created.php", "topic":"subscription/created"}'
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
    CURLOPT_POSTFIELDS => '{"address":"https://simpleketosystem.com/api/webhook/w_subscription_updated.php", "topic":"subscription/updated"}'
]);

$resp = curl_exec($curl);
echo "webhook subscription/updated has been created<br />" . $resp . "<br />";
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
    CURLOPT_POSTFIELDS => '{"address":"https://simpleketosystem.com/api/webhook/w_subscription_activated.php", "topic":"subscription/activated"}'
]);
$resp = curl_exec($curl);
echo "webhook subscription/activated has been created<br />" . $resp . "<br />";
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
    CURLOPT_POSTFIELDS => '{"address":"https://simpleketosystem.com/api/webhook/w_charge_created.php", "topic":"charge/created"}'
]);
$resp = curl_exec($curl);
echo "webhook charge/created has been created<br />" . $resp . "<br />";
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
    CURLOPT_POSTFIELDS => '{"address":"https://simpleketosystem.com/api/webhook/w_charge_paid.php", "topic":"charge/paid"}'
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
    CURLOPT_POSTFIELDS => '{"address":"https://simpleketosystem.com/api/webhook/w_charge_updated.php", "topic":"charge/updated"}'
]);
$resp = curl_exec($curl);
echo "webhook charge/updated has been created<br />" . $resp . "<br />";
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
    CURLOPT_POSTFIELDS => '{"address":"https://simpleketosystem.com/api/webhook/w_checkout_completed.php", "topic":"checkout/completed"}'
]);
$resp = curl_exec($curl);
echo "webhook checkout/completed has been created<br />" . $resp . "<br />";
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
    CURLOPT_POSTFIELDS => '{"address":"https://simpleketosystem.com/api/webhook/w_order_created.php", "topic":"order/created"}'
]);
$resp = curl_exec($curl);
echo "webhook order/created has been created<br />" . $resp . "<br />";
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
    CURLOPT_POSTFIELDS => '{"address":"https://simpleketosystem.com/api/webhook/w_order_processed.php", "topic":"order/processed"}'
]);
$resp = curl_exec($curl);
echo "webhook order/processed has been created<br />" . $resp . "<br />";
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
    CURLOPT_POSTFIELDS => '{"address":"https://simpleketosystem.com/api/webhook/w_order_updated.php", "topic":"order/updated"}'
]);
$resp = curl_exec($curl);
echo "webhook order/updated has been created<br />" . $resp . "<br />";
curl_close($curl);


?>