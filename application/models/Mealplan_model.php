<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once APPPATH . 'libraries/meal-plan-email-class.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/phpmailer/Exception.php';
require 'vendor/phpmailer/PHPMailer.php';
require 'vendor/phpmailer/SMTP.php';

class Mealplan_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function get_all_mealplans() {
        $this->db->get('test_mealplan');
    }

    function get_mealplan($id) {
        $this->db->get_where('test_mealplan', array('id' => $id));
    }

    function update_visit($customer_id) {

        $query = $this->db->get_where('test_mp_visit', array('customer_id' => $customer_id));
        if ($query->num_rows() > 0) {
            $this->db->set('visit', 'visit + 1')
                    ->where('customer_id', $customer_id)
                    ->update('test_mp_visit');
        } else {
            $data = array(
                'customer_id' => $customer_id
            );
            $this->db->insert('test_mp_visit', $data);
        }
    }

    function get_mealplan_by_customer_id($customer_id) {
        $query = "";
//        if (strlen($uid) > 17) {
        $query = $this->db->select('meals.id, meals.name, meals.img_link, meals.blog_link, meals.type, test_mealplan.day')
                ->from('test_mealplan')
                ->join('meals', 'test_mealplan.meal_id = meals.id', 'left')
                ->where('test_mealplan.customer_id', $customer_id)
                ->order_by('test_mealplan.day', 'ASC')
                ->order_by('meals.type', 'ASC')
                ->get();
        $result = $query->result();
        return $result;
//        }
    }

    function get_mealplan_details_by_option($customer_id, $day, $type) {
        $query = $this->db->select('test_mealplan.meal_id, meals.type, meals.serving_advice, ingredients.calories')
                ->from('test_mealplan')
                ->join('meals', 'test_mealplan.meal_id = meals.id', 'left')
                ->join('ingredients', 'test_mealplan.meal_id = ingredients.meal_id', 'left')
                ->where('test_mealplan.customer_id', $customer_id)
                ->where('test_mealplan.day', $day)
                ->where('ingredients.name', 'Total Per Serving')
                ->order_by('meals.types')
                ->get();
        $result = $query->result();
        return $result;
    }

    function get_protip($day) {
        $query = $this->db->select('protip')
                ->from('protips')
                ->where('id', $day)
                ->limit(1)
                ->get();
        $row = $query->row();
        return $row->id;
    }

    function insert_mealplan($data) {
        $this->db->insert('test_mealplan', $data);
    }

    function delete_mealplan($id) {
        $this->db->delete('test_mealplan', array('id' => $id));
    }

    function delete_mealplan_by_customer_id($customer_id) {
        $this->db->delete('test_mealplan', array('customer_id' => $customer_id));
    }

    function get_max_day($customer_id) {
        $max_day = 0;
        $query = $this->db->select_max('day')->where('customer_id', $customer_id)->get('test_mealplan');
        if ($query->num_rows() > 0) {
            $max_day = $query->row()->day;
        }
        return $max_day;
    }

    function create_mealplan($customer_id, $json_answers, $start_day, $weeknum) {
        $final_result = array();
        $insert_data = array();

        for ($type = 1; $type <= 4; $type++) {
            $this->db->select('meals.id')
                    ->from('meals')
                    ->join('(SELECT meal_id, COUNT(meal_id) AS cnt FROM test_mealplan WHERE customer_id = ' . $customer_id . ' GROUP BY meal_id) AS subquery', 'subquery.meal_id = meals.id', 'left')
                    ->where('meals.type', $type);

            $arr_ingre = array('chicken', 'pork', 'beef', 'fish', 'bacon', 'broccoli', 'mushroom', 'zuccini', 'cauliflower', 'asparagus', 'avocado');
            $arr_ingre_reversed = array('egg', 'nut', 'cheese', 'butter', 'coconut', 'brussel_sprout');
            foreach ($arr_ingre as $ingre) {
                if (!array_key_exists($ingre, $json_answers)) {
                    $this->db->where('meals.' . $ingre, 0);
                }
            }
            foreach ($arr_ingre_reversed as $ingre) {
                if (array_key_exists($ingre, $json_answers)) {
                    $this->db->where('meals.' . $ingre, 0);
                }
            }
            if (array_key_exists('chicken', $json_answers) ||
                    array_key_exists('pork', $json_answers) ||
                    array_key_exists('beef', $json_answers) ||
                    array_key_exists('fish', $json_answers) ||
                    array_key_exists('bacon', $json_answers)) {
                $this->db->where('meals.tofu', 0);
            }
            if (array_key_exists('cheese', $json_answers) &&
                    array_key_exists('butter', $json_answers)) {
                $this->db->where('meals.dairy', 0);
            }
            if (
                    (array_key_exists('no_meat', $json_answers) ||
                    (!array_key_exists('chicken', $json_answers) &&
                    !array_key_exists('pork', $json_answers) &&
                    !array_key_exists('beef', $json_answers) &&
                    !array_key_exists('fish', $json_answers) &&
                    !array_key_exists('bacon', $json_answers))) &&
                    array_key_exists('cheese', $json_answers) &&
                    array_key_exists('butter', $json_answers)) {
                $this->db->where('meals.vegetarian', 1);
            }
            $this->db->order_by('cnt ASC, meals.priority ASC');
            $query = $this->db->get();
            $meal_ids = array();
            foreach ($query->result() as $row) {
                array_push($meal_ids, $row->id);
            }

            $days = $weeknum * 7;
            log_message('error', 'day = ' . $days);
            $day = $start_day;
            if ($query->num_rows() > 0) {
                while ($day < $start_day + $days) {
                    foreach ($query->result() as $row) {
                        array_push($insert_data, array(
                            'customer_id' => $customer_id,
                            'meal_id' => $row->id,
                            'day' => $day
                        ));
                        $day++;
                        if ($day >= $start_day + $days) {
                            break;
                        }
                    }
                }
            }
            /*
            usort($insert_data, function($a, $b) {
                if ($a['day'] == $b['day']) {
                    return $a['type'] - $b['type'];
                }
                return $a['day'] - $b['day'];
            });             
             */
        }
        $this->db->insert_batch('test_mealplan', $insert_data);
    }

    function send_mealplan_email($first_name, $last_name, $email, $status = 'customer', $action = 'add', $orderid, $customer_id) {
        $emailcontrol = new MealplanEmailInterface();

        $query = $this->db->select('id')->from('test_mp_email_sent')->where('customer_id', $customer_id)->get();
        if (!$query->num_rows()) {
            /*
              $emaildata = array(
              'name' => $first_name . " " . $last_name,
              'apikey' => '123456789',
              'email' => strtolower($email),
              'status' => $status,
              'action' => $action,
              'link' => 'https://simpleketosystem.com/mealplan?uid=' . $orderid,
              );
              //result is either 'ok' for success or returns error text
              $result_email = $emailcontrol->process_user($emaildata);

              if ($result_email == "ok") {

             */
            $this->db->insert('test_mp_email_sent', array("customer_id" => $customer_id));
            //}
        }
    }

    function send_blank_notif($email, $orderid) {
        $sql = "SELECT blanknotifsent FROM mealplan WHERE email = '" . $email . "' AND orderid='" . $orderid . "' AND blanknotifsent = '1' LIMIT 1";
        $result = $conn->query($sql);
        if ($result->num_rows == 0) {//notification not sent yet.
            try {
                // Instantiation and passing `true` enables exceptions
                $mail = new PHPMailer(true);
                //Server settings
                //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
                $mail->isSMTP();                                            // Send using SMTP
                $mail->Host = 'mail.simpleketosystem.com';                    // Set the SMTP server to send through
                $mail->SMTPAuth = true;                                   // Enable SMTP authentication
                $mail->Username = 'sksalerts@simpleketosystem.com';                     // SMTP username
                $mail->Password = '0R=S5zpA$tJ4';                               // SMTP password
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
                $mail->Port = 587;                                    // TCP port to connect to //465:secure, 587: non_secure
                //Recipients
                $mail->setFrom('sksalerts@simpleketosystem.com', 'SKS Alert');
                $mail->addAddress('tarasprystavskyj@hotmail.com', 'Taras Prystavskyj');     // Add a recipient
                $mail->addAddress('hello@konsciousketo.com', 'Kristen Kowalski');     // Add a recipient
                $mail->addAddress('matt@konsciousketo.com', 'Matt Konig');     // Add a recipient
                // Content
                $mail->isHTML(true);                                  // Set email format to HTML
                $mail->Subject = 'Blank Meal Plan Notification';
                $mail->Body = '<p>A blank mealplan has been created for customer <a href="mailto:' . $email . '">' . $email . '</a>.</p>';
                $mail->Body .= '<p>You can have a look at her mealplan URL:</p>';
                $mail->Body .= '<p><a href="https://simpleketosystem.com/mealplan?uid=' . $orderid . '&visit=admin">https://simpleketosystem.com/mealplan?uid=' . $orderid . '&visit=admin</a></p>';


                $mail->send();
//            echo 'Message has been sent';
                $sql = "UPDATE mealplan SET blanknotifsent='1' WHERE email='" . $email . "'";
                /*
                  if ($conn->query($sql) === TRUE) {
                  } else {
                  }
                 */
            } catch (Exception $e) {
//            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }
        }
    }

    function get_fs_account_id($email, $conn) {
        $returnVal = "";
        $sql = "SELECT fs_account_id FROM subscription WHERE email='" . $email . "' ORDER BY update_time DESC LIMIT 1";

        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $returnVal = $row['fs_account_id'];
            }
        }
        return $returnVal;
    }

    function get_auth_account_url($fs_account_id) {
        $remote_url = 'https://api.fastspring.com/accounts/' . $fs_account_id . '/authenticate';
        // Create a stream
        $opts = array(
            'http' => array(
                'method' => "GET",
                'header' => "Authorization: Basic " . base64_encode("2Z0TQKH_TGCE2VEX7AYUVA:8cX_-pFDSpCjYrFmKD0J5Q")
            )
        );
        $context = stream_context_create($opts);
        // Open the file using the HTTP headers set above
        $response = file_get_contents($remote_url, false, $context);
        $response = json_decode($response, true);
        $url = $response['accounts'][0]['url'];
        return $url;
    }

}

?>