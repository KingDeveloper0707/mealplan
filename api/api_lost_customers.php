<?php

ini_set('memory_limit', '-1');
ini_set('max_execution_time', 0);

/*
//local server
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "smplk3t0_mealplan";
*/

  // live server
  $servername = "localhost";
  $username = "smplk3t0_taras";
  $password = "zaq12wsxcde3";
  $dbname = "smplk3t0_mealplan";


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "select checkout.email, checkout.first_name, checkout.last_name, checkout.create_time from `checkout` 
left join `subscription` on `checkout`.`email` = `subscription`.`email` 
WHERE subscription.id IS NULL 
AND checkout.product_title = 'Custom Keto Meal Plan - 1 Month Auto Renew' 
AND checkout.refund = 0 
AND checkout.email NOT IN (SELECT email FROM checkout WHERE product_title = 'Custom Keto Meal Plan - UPGRADE SPECIAL To 12 Month Auto Renew') 
AND checkout.create_time >= '2020-02-06 17:18:10' AND checkout.create_time <= '2020-02-13 16:50:41' 
ORDER BY `checkout`.`create_time` DESC LIMIT 30;";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $email = $row['email'];
        $first_name = $row['first_name'];
        $last_name = $row['last_name'];
        $create_time = $row['create_time'];
        
        echo "---" . $email . "---<br />";
        
        $username='199125e0f70240ec33ec9dfd529373ba';
        $password='f514ec6441db4fb6bda5f4116e020e17';
        $URL="https://konsciousketo.myshopify.com/admin/customers/search.json?query=email:" . urlencode($email) . ";";
        
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL,$URL);
        curl_setopt($curl, CURLOPT_TIMEOUT, 30); //timeout after 30 seconds
        curl_setopt($curl, CURLOPT_RETURNTRANSFER,1);
        curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
        curl_setopt($curl, CURLOPT_USERPWD, "$username:$password");
        $resp = curl_exec($curl);
        
        $obj_shopify_customer = json_decode($resp, true);
        if(count($obj_shopify_customer['customers']) == 0) {
            echo ">>>>>>> no customer data >>>>>>><br />";
            continue;
        }
        $obj_address = $obj_shopify_customer['customers'][0]['addresses'][0];
        

        //create customer
        $obj_customer = array(
            'email' => $email,
            'first_name' => $first_name,
            'last_name' => $last_name,
            'billing_first_name' => $first_name,
            'billing_last_name' => $last_name,
            'billing_address1' => $obj_address['address1'],
            'billing_address2' => $obj_address['address2'],
            'billing_zip' => $obj_address['zip'],
            'billing_city' => $obj_address['city'],
            'billing_province' => $obj_address['province'],
            'billing_country' => $obj_address['country']
        );
        $curl = curl_init();
        curl_setopt_array($curl, [
            CURLOPT_POST => 1,
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => 'https://api.rechargeapps.com/customers',
            CURLOPT_HTTPHEADER => array(
                'X-Recharge-Access-Token: 7ab227591d205f353d30cbb0ef586450708b94f4d9e355036cdef355',
                'Accept: application/json',
                'Content-Type: application/json'
            ),
            CURLOPT_POSTFIELDS => json_encode($obj_customer)
        ]);
        
        $resp = curl_exec($curl);
        $obj_resp = json_decode($resp, true);
        $customer_id = $obj_resp['customer']['id'];
        echo "customer_id = ". $customer_id . "<br />";
        if(!$customer_id || ($customer_id && strlen($customer_id) == 0)) {
            continue;
        }
        

        //create address
        curl_setopt_array($curl, [
            CURLOPT_POST => 1,
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => 'https://api.rechargeapps.com/customers/' . $customer_id . '/addresses',
            CURLOPT_HTTPHEADER => array(
                'X-Recharge-Access-Token: 7ab227591d205f353d30cbb0ef586450708b94f4d9e355036cdef355',
                'Accept: application/json',
                'Content-Type: application/json'
            ),
            CURLOPT_POSTFIELDS => json_encode($obj_address)
        ]);
        $resp = curl_exec($curl);
        $obj_resp = json_decode($resp, true);
        $address_id = $obj_resp['address']['id'];
        echo "address_id = ".$address_id . "<br />";
        

        //create subscription
        $product_title = 'Custom Keto Meal Plan - 1 Month Auto Renew';
        $next_charge_scheduled_at = Date('Y-m-d H:i:s', strtotime("+28 days", strtotime($create_time)));
        $obj_subscription = array(
            'address_id' => $address_id,
            'next_charge_scheduled_at' => $next_charge_scheduled_at,
            'shopify_variant_id' => '29462149300342',
            'quantity' => 1,
            'order_interval_unit' => 'day',
            'order_interval_frequency' => '28',
            'charge_interval_frequency' => '28',
            'customer_id' => $customer_id,
            'product_title' => $product_title
        );
        
        curl_setopt_array($curl, [
            CURLOPT_POST => 1,
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => 'https://api.rechargeapps.com/subscriptions',
            CURLOPT_HTTPHEADER => array(
                'X-Recharge-Access-Token: 7ab227591d205f353d30cbb0ef586450708b94f4d9e355036cdef355',
                'Accept: application/json',
                'Content-Type: application/json'
            ),
            CURLOPT_POSTFIELDS => json_encode($obj_subscription)
        ]);
        $resp = curl_exec($curl);
        $obj_resp = json_decode($resp, true);
        curl_close($curl);
        $subscription_id = $obj_resp['subscription']['id'];
        echo "subscription_id = ".$subscription_id . "<br />";
        /*
        //insert into subscription
        $sql_insert = "INSERT INTO subscription (email, subscription_id, product_title) VALUES('" . $email . "', '" . $subscription_id . "', '" . $product_title . "')";
        if($conn->query($sql_insert) === TRUE) {
            echo $email . " has been inserted into db";
        }*/
    }
}
?>