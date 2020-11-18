<?php
    //local server
    /*
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "mealplan";
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
    
    
    
    $encoded_data = "- subscription/created" . " at " . date('Y-m-d H:i:s') . "\n";
    //$data .= json_encode(file_get_contents('php://input'));
    //$data .= "\n";
    //file_put_contents('./subscription_logs.txt', $data, FILE_APPEND);
    //echo "success";
    
    $data = file_get_contents('php://input');
    $encoded_data .= json_encode($data);
    $encoded_data .= "\n";
    
    file_put_contents('./subscription_logs.txt', $encoded_data, FILE_APPEND);
    $data = json_decode($data, true);
    $data = $data['subscription'];
    $subscription_id = $data['id'];
    $customer_id = $data['customer_id'];
    $product_title = $data['product_title'];
    
    if (
        $product_title !== 'Custom Keto Meal Plan - 1 Month Auto Renew' &&
        $product_title !== 'Custom Keto Meal Plan - UPGRADE SPECIAL To 12 Month Auto Renew' && 
        $product_title !== 'Custom Keto Meal Plan - UPGRADE SPECIAL To 3 Month Auto Renew'
    ) {
        echo "no product_title";
        return;
    }
    $email = "";
    $str_customer_info = file_get_contents("https://simpleketosystem.com/api/webhook/api_list_customer.php?cid=" . $customer_id);
    $arr_customer_info = json_decode($str_customer_info, true);
    if(array_key_exists('customer', $arr_customer_info) && array_key_exists('email', $arr_customer_info['customer'])) {
        $email = $arr_customer_info['customer']['email'];
    } else {
        echo "no customer or customer email";
        return;
    }
    
    if(addSubscription($email, $subscription_id, $product_title, $conn)) {
        echo "success1";
    } else {
        echo "addSubscription failure";
        return;
    }
    
    $upgraded_product_title = upgradedInCheckout($email, $conn);
    if (strlen($upgraded_product_title) > 0) {
        file_get_contents("https://simpleketosystem.com/api/webhook/api_update_product.php?sid=" . $subscription_id . "&product_title=" . urlencode($upgraded_product_title));
        updateSubscriptionProductTitle($subscription_id, $upgraded_product_title, $conn);
        echo "success2";
    } else {
        echo "still not upgraded in checkout";
    }
    
    
    
    
    function addSubscription($email, $subscription_id, $product_title, $conn) {
        $returnVal = false;
        $sql = "INSERT INTO subscription (email, subscription_id, product_title) VALUES('" . $email . "', '" . $subscription_id . "', '" . $product_title . "')";
        if($conn->query($sql) === TRUE) {
            $returnVal = true;
        }
        return $returnVal;
    }
    
    function upgradedInCheckout($email, $conn) {
        $returnVal = "";
        $product_title_12m = 'Custom Keto Meal Plan - UPGRADE SPECIAL To 12 Month Auto Renew';
        $product_title_3m = 'Custom Keto Meal Plan - UPGRADE SPECIAL To 3 Month Auto Renew';
        $sql = "SELECT * FROM checkout WHERE email = '" . $email . "' AND (product_title = '" . $product_title_12m . "' OR product_title = '" . $product_title_3m . "') AND refund = '0' ORDER BY create_time DESC LIMIT 1";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {        
            while ($row = $result->fetch_assoc()) {
                $returnVal = $row['product_title'];
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
    
    
?>