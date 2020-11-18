<?php

$curl = curl_init();
$webhook_id = 63614;
curl_setopt_array($curl, [
    CURLOPT_CUSTOMREQUEST => 'DELETE',
    CURLOPT_RETURNTRANSFER => 1,
    CURLOPT_URL => 'https://api.rechargeapps.com/webhooks/' . $webhook_id,
    CURLOPT_HTTPHEADER => array(
    'X-Recharge-Access-Token: 7ab227591d205f353d30cbb0ef586450708b94f4d9e355036cdef355'),
]);
$resp = curl_exec($curl);
echo $resp;
curl_close($curl);

$curl = curl_init();
$webhook_id = 63615;
curl_setopt_array($curl, [
    CURLOPT_CUSTOMREQUEST => 'DELETE',
    CURLOPT_RETURNTRANSFER => 1,
    CURLOPT_URL => 'https://api.rechargeapps.com/webhooks/' . $webhook_id,
    CURLOPT_HTTPHEADER => array(
    'X-Recharge-Access-Token: 7ab227591d205f353d30cbb0ef586450708b94f4d9e355036cdef355'),
]);
$resp = curl_exec($curl);
echo $resp;
curl_close($curl);


?>