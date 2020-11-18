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


    $encoded_data = "- charge/paid" . " at " . date('Y-m-d H:i:s') . "\n";
    $data = file_get_contents('php://input');
    $data = json_decode($data, true);
    $data = $data['charge'];
    
    $encoded_data .= json_encode($data);
    $encoded_data .= "\n";
    file_put_contents('./subscription_logs.txt', $encoded_data, FILE_APPEND);
    
    
    
    
    $product_weeknums = array(
        'Custom Keto Meal Plan' => 4,
        'Custom Keto Meal Plan - 1 Month Auto Renew' => 4,
        'Custom Keto Meal Plan with Special Add-On Offer' => 4,
        'Custom Keto Meal Plan - 2 month' => 9,
        'Custom Keto Meal Plan - 12 Month' => 56,
        'Meal Plan 12 Week Upgrade' => 16,
        'Meal Plan 6 Month Upgrade' => 30,
        'Meal Plan 12 Month Upgrade' => 56,
        'Custom Keto Meal Plan - UPGRADE SPECIAL To 12 Month Auto Renew' => 52,
        'Custom Keto Meal Plan - UPGRADE SPECIAL To 3 Month Auto Renew' => 12
    );
    
    $constant_title = 'Custom Keto Meal Plan - 1 Month Auto Renew';
    
    
    $email = getIfSet($data['email']);
    $first_name = getIfSet($data['first_name']);
    $last_name = getIfSet($data['last_name']);
    $first_name = mysqli_real_escape_string($conn, $first_name);
    $last_name = mysqli_real_escape_string($conn, $last_name);
    
    $orderNumData = getOrderIdAndPrevPaidNumFromEmail($email, $constant_title, $conn);
    $orderid = $orderNumData['orderid'];
    $prev_paid_num = $orderNumData['prev_paid_num'];
    $prev_paid_week = $product_weeknums[$constant_title] * $prev_paid_num;
    $product_title = "";
    $total_price = 0;
    $subscription_id = "";
    
    foreach($data['line_items'] as $line_item) {
        if(
            $line_item['title'] == 'Custom Keto Meal Plan - 1 Month Auto Renew' ||
            $line_item['title'] == 'Custom Keto Meal Plan - UPGRADE SPECIAL To 12 Month Auto Renew' ||
            $line_item['title'] == 'Custom Keto Meal Plan - UPGRADE SPECIAL To 3 Month Auto Renew'
        ) {
            $product_title = $line_item['title'];
            $total_price = $line_item['price'];
            $subscription_id = $line_item['subscription_id'];
            break;
        }
    }
    
    if(strlen($product_title) == 0) {
        echo "no this product";
        return;
    }
    
    
    $sql = "INSERT INTO checkout (email, orderid, first_name, last_name, total_price, product_title) VALUES('" . $email . "', '" . $orderid . "', '" . $first_name . "', '" . $last_name . "', '" . $total_price . "', '" . $product_title . "')";

    if ($conn->query($sql) === TRUE) {
        
        $prev_mealplan = getPrevMealPlan($email, $orderid, $conn);
    //    echo json_encode($prev_mealplan);
        if (strlen($prev_mealplan) > 0) {
            $str_quiz = getQuiz($email, $conn);
    
            $quiz = array();
            $quiz = json_decode($str_quiz, true);
    
    //        $newWeekNum = intval($product_weeknums[$product_title]) + intval($prev_paid_week);        
            $count = 10;
            if($product_title == "Custom Keto Meal Plan - UPGRADE SPECIAL To 12 Month Auto Renew" || 
                $product_title == "Custom Keto Meal Plan - UPGRADE SPECIAL To 3 Month Auto Renew") {
                $prev_paid_num = intval($product_weeknums[$product_title]) / 4;
            }
            $mealplan = createMealPlan($quiz, $conn, $product_weeknums[$product_title], intval($prev_paid_num), intval($count));
    
            $updatedMealPlan = updateMealPlan($mealplan, $email, $orderid, $prev_paid_week, $conn);
    
            $uid = saveMealPlan($updatedMealPlan, $email, $orderid, $conn);
            //$final_result = array('status' => 'success', 'mealplan' => $mealplan);
    
            $result_email = -1;
            //    var_dump($result);
            $final_result = array('status' => 'success', 'uid' => $uid, 'emailing-status' => $result_email);
        } else {
            $final_result = array('status' => 'failure', 'error' => 'Previous mealplan is not existed. maybe refunded.');
        }
    } else {
        $final_result = array('status' => $conn->error, 'sql' => $sql);
    }
    
    echo json_encode($final_result);
    return;
    
    
    function getUidWithOrderId($email, $orderid, $conn) {
        $returnVal = "";
        $sql = "SELECT uid FROM mealplan WHERE email='" . $email . "' AND orderid='" . $orderid . "' LIMIT 1";
    
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $returnVal = $row['uid'];
            }
        } else {
            $returnVal = -1;
        }
        //return $sql;
        return $returnVal;
    }
    
    function getIfSet(&$value, $default = 0) {
        return isset($value) ? $value : $default;
    }
    // find order id and uid
    function getOrderIdAndPrevPaidNumFromEmail($email, $constant_title, $conn) {
        $returnVal = [];
        $orderid = "";
        $prev_paid_num = 0;
        $sql = "SELECT orderid FROM checkout WHERE email='" . $email . "' AND product_title='" . $constant_title . "' ORDER BY create_time DESC";
        $result = $conn->query($sql);
        $prev_paid_num = $result->num_rows;
        if ($prev_paid_num > 0) {
            while ($row = $result->fetch_assoc()) {
                $orderid = $row['orderid'];
            }
        }
    
        $returnVal['orderid'] = $orderid;
        $returnVal['prev_paid_num'] = $prev_paid_num;
        
        return $returnVal;
    }
    
    function checkMealPlanExisted($email, $conn) {
        $returnVal = false;
        $sql = "SELECT * FROM mealplan WHERE email='" . $email . "'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $returnVal = true;
        }
        return $returnVal;
    }
    
    function getQuiz($email, $conn) {
        $returnVal = "";
        $sql = "SELECT quiz FROM quiz WHERE email='" . $email . "' LIMIT 1";
    
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $returnVal = $row['quiz'];
            }
        }
        return $returnVal;
    }
    
    function saveMealPlan($mealplan, $email, $orderid, $conn) {
        $returnVal = false;
        $mealplan = json_encode($mealplan);
        $existingUid = getUidWithOrderId($email, $orderid, $conn);
        if ($existingUid > 0) {
            $uid = $existingUid;
        } else {
            $uid = $orderid;
        }
        
        if (checkMealPlanExisted($email, $conn)) {
            $sql = "UPDATE mealplan SET uid='" . $uid . "', mealplan='" . $mealplan . "', orderid='" . $orderid . "' WHERE email='" . $email . "'";
        } else {
            $sql = "INSERT INTO mealplan (email, orderid, uid, mealplan) VALUES('" . $email . "', '" . $orderid . "', '" . $uid . "', '" . $mealplan . "')";
        }
        if ($conn->query($sql) === TRUE) {
            
        } else {
            $uid = -1;
        }
    
    
        return $uid;
    }
    
    function updateMealPlan($mealplan, $email, $orderid, $prev_paid_week, $conn) {
        $mealplanObjectNew = array();
    
        $prevMealPlanStr = getPrevMealPlan($email, $orderid, $conn);
        $prevMealPlan = json_decode($prevMealPlanStr, true);
    
        $testArray = [];   
    
        for ($type = 1; $type <= 4; $type++) {
            $type_array = array();
            $type_array = $mealplan[$type];
    
            $mealplanObjectNew[$type] = array_merge($prevMealPlan[$type], $mealplan[$type]);
        }
    
        return $mealplanObjectNew;
    }
    
    function getPrevMealPlan($email, $orderid, $conn) {
        $returnVal = "";
        $sql = "SELECT * FROM mealplan WHERE email='" . $email . "' AND orderid='" . $orderid . "' LIMIT 1";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $returnVal = $row['mealplan'];
            }
        }
    
        return $returnVal;
    }
    
    function createMealPlan($quiz, $conn, $weeknum = 4, $prev_paid_num = -1, $count = -1) {

    $gender = $quiz['gender'];
//    $q_time = $quiz['q_time'];
    //$q_activity = $quiz['q_activity'];
    //$q_recent_changes = $quiz['q_recent_changes'];

    $period = $weeknum * 7;

    $final_result = array();
    $type_result = array();

    for ($type = 1; $type <= 4; $type++) {

        $type_result = array();

        $sql = "SELECT * FROM meals";
        $sql .= " WHERE type = " . $type;

        /*
          if ($q_time == 0) {
          $sql .= " AND prep_mins >= 0 AND prep_mins <= 30 ";
          } else if ($q_time == 3) {
          $sql .= " AND prep_mins >= 0 AND prep_mins <= 20 ";
          }
         */

        if (!$quiz['chicken']) // if chicken is not selected, the meals that has chicken must NOT be contained in the meal plan.
            $sql .= " AND chicken = " . $quiz['chicken'];
        if (!$quiz['pork'])
            $sql .= " AND pork = " . $quiz['pork'];
        if (!$quiz['beef'])
            $sql .= " AND beef = " . $quiz['beef'];
        if (!$quiz['fish'])
            $sql .= " AND fish = " . $quiz['fish'];
        if (!$quiz['bacon'])
            $sql .= " AND bacon = " . $quiz['bacon'];
        //        if (!$quiz['dairy'])
        //        $sql .= " AND dairy = " . $quiz['dairy'];///+++
        if (!$quiz['broccoli'])
            $sql .= " AND broccoli = " . $quiz['broccoli'];
        if (!$quiz['mushroom'])
            $sql .= " AND mushroom = " . $quiz['mushroom'];
        if (!$quiz['zuccini'])
            $sql .= " AND zuccini = " . $quiz['zuccini'];
        if (!$quiz['cauliflower'])
            $sql .= " AND cauliflower = " . $quiz['cauliflower'];
        if (!$quiz['asparagus'])
            $sql .= " AND asparagus = " . $quiz['asparagus'];
        if (!$quiz['avocado'])
            $sql .= " AND avocado = " . $quiz['avocado'];
        if ($quiz['egg'])
            $sql .= " AND egg = 0";
        if ($quiz['nut'])
            $sql .= " AND nut = 0";
        if ($quiz['cheese'])
            $sql .= " AND cheese = 0";
        if ($quiz['butter'])
            $sql .= " AND butter = 0";
        if ($quiz['coconut'])
            $sql .= " AND coconut = 0";
        if ($quiz['brussel_sprout'])
            $sql .= " AND brussel_sprout = 0";
        if ($quiz['chicken'] || $quiz['pork'] || $quiz['beef'] || $quiz['fish'] || $quiz['bacon']) {
            $sql .= " AND tofu = 0";
        }
        if ($quiz['cheese'] && $quiz['butter']) {
            $sql .= " AND dairy = 0";
        }
        if (($quiz['no_meat'] || (!$quiz['chicken'] && !$quiz['pork'] && !$quiz['beef'] && !$quiz['fish'] && !$quiz['bacon'])) &&
                $quiz['cheese'] && $quiz['butter']) {
            $sql .= " AND vegetarian = 1";
        }

        $sql .= "  ORDER BY priority";

        if ($prev_paid_num >= 0 && $count >= 0) {
            $result = $conn->query($sql);
            $total_num = $result->num_rows;
            $used_num = $prev_paid_num * $count;           

            if ($total_num >= $used_num + $count) {                
                $sql .= " LIMIT " . $used_num . ", " . $count;
            } else if ($total_num <= $count) {
                
            } else if ($total_num > $count && (($used_num + $count) % $total_num) < $count && (($used_num + $count) % $total_num) > 0) {
                $diff_first = $count - ($used_num + $count) % $total_num;
                $original_sql = $sql;
                $sql = "(" . $original_sql . " LIMIT " . ($used_num % $total_num) . ", " . $diff_first . ")";
                $sql .= " UNION (" . $original_sql . " LIMIT 0, " . (intval($count) - intval($diff_first)) . ")";                
            } else if ($total_num > $count) {
                $sql .= " LIMIT " . ($used_num % $total_num) . ", " . $count;                
            }
        }


        $result = $conn->query($sql);

        if ($result->num_rows > 0) {

            $day = 0;

            while ($day < $period) {
                $result->data_seek(0);
                while ($row = $result->fetch_assoc()) {
                    $type_result[] = $row['id'];
                    $day++;

                    if ($day >= $period) {
                        break;
                    }
                }
                if ($day >= $period) {
                    break;
                }
            }
        }

        $final_result[$type] = $type_result;
    }
    return $final_result;
}
?>