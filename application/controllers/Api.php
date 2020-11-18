<?php

ini_set("memory_limit", "-1");
set_time_limit(0);

use chriskacerguis\RestServer\RestController;

defined('BASEPATH') OR exit('No direct script access allowed');

//require(APPPATH . '/libraries/RestController.php');
//use chriskacerguis\RestServer\RestController;
//use Restserver\Libraries\RESTController;


require APPPATH . 'libraries/RestController.php';
require APPPATH . 'libraries/Format.php';

class Api extends RestController {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
    }

    public function index() {
        
    }

    public function users_get() {
        // Users from a data store e.g. database
        $users = [
            ['id' => 0, 'name' => 'John', 'email' => 'john@example.com'],
            ['id' => 1, 'name' => 'Jim', 'email' => 'jim@example.com'],
        ];

        $id = $this->get('id');

        if ($id === null) {
            // Check if the users data store contains users
            if ($users) {
                // Set the response and exit
                $this->response($users, 200);
            } else {
                // Set the response and exit
                $this->response([
                    'status' => false,
                    'message' => 'No users were found'
                        ], 404);
            }
        } else {
            if (array_key_exists($id, $users)) {
                $this->response($users[$id], 200);
            } else {
                $this->response([
                    'status' => false,
                    'message' => 'No such user found'
                        ], 404);
            }
        }
    }

    public function convert_db_post() {
        $this->load->model('customer_model');
        $this->load->model('answer_model');

//        ******** delete duplicated email rows *********
//         delete test_customer_temp
//   from test_customer_temp
//  inner join (
//     select max(id) as lastId, email
//       from test_customer_temp
//      group by email
//     having count(*) > 1) duplic on duplic.email = test_customer_temp.email
//  where test_customer_temp.id < duplic.lastId;


        $editable_keys = array("height_ft", "height_in", "age_imperial", "height_cm", "age_metric", "curr_weight_po", "goal_weight_po", "curr_weight_kg", "goal_weight_kg");
        $sql = "INSERT INTO test_answer(customer_id, choice_id, value) VALUES ";
        $firstsql = "INSERT INTO test_answer(customer_id, choice_id, value) VALUES ";
//        $fp = fopen("test.sql","w");
//        fwrite($fp, $sql);
        $inserted = false;


        $query = $this->db->select('id, quiz')->from('test_customer_temp')->where('id > 2000000')->where('id <= 3000000')->order_by('id', 'ASC')->get();

        $counter = 0;
        foreach ($query->result() as $row) {
            if ($counter % 100 == 0) {
                log_message('error', $counter);
                if ($counter != 0) {
                    $this->db->query($sql);
                    $sql = $firstsql;
                    $inserted = false;
                }
            }
            $counter++;

            $obj_answers = json_decode($row->quiz, true);
            $customer_id = $row->id;
//            $this->answer_model->insert($row->id, $obj_answers);
            if ($obj_answers) {
                foreach ($obj_answers as $key => $value) {
                    $isEditable = in_array($key, $editable_keys);
                    $tempval = $isEditable ? '' : $value;
                    $subquery = $this->db->select('id')->from('test_choice')->where('name', $key)->where('value', $tempval)->get();
                    if ($subquery->num_rows() > 0) {

                        $row_sub = $subquery->row();
                        $choice_id = $row_sub->id;


                        if (!$isEditable) {
                            $sql .= $inserted ? ", " : "";
                            $sql .= "('" . $customer_id . "'," . $choice_id . "," . 'DEFAULT' . ")";
//                            fwrite($fp, $sql);
                            $inserted = true;
                        } else {
                            if (!$value || ($value && strlen($value) == 0)) {
                                continue;
                            }
                            $sql .= $inserted ? ", " : "";
                            $sql .= "('" . $customer_id . "'," . $choice_id . "," . $this->db->escape($value) . ")";
//                            fwrite($fp, $sql);
                            $inserted = true;
                        }
                    }
                }
            }
        }
        log_message('error', "ready to query");
        $query = $this->db->query($sql);
//        fclose($fp);
        log_message('error', "finshed query");
    }

    public function answer_post() {
        $this->load->model('customer_model');
        $this->load->model('answer_model');
        $this->load->model('checkout_model');

        $obj_post = $this->input->post();
        $obj_answers = $obj_post['obj_answers'];
        $obj_additional = $obj_post['obj_additional'];
        $obj_answers['email'] = strtolower($obj_answers['email']);

        $returnVal = $this->customer_model->insert_customer($obj_answers, $obj_additional);
        if ($returnVal['status'] == "success") {
            //if ($this->checkout_model->check_prev_checkout_existed($returnVal['customer_id']) == false) //don't allow quiz again for purchased customer.
            $this->answer_model->insert($returnVal['customer_id'], $obj_answers);

            $this->response($returnVal['customer_id'], 200);
        } else {
            $this->response($returnVal['message'], 422);
        }
    }

    public function update_answer_preference_post() {
        $this->load->model('customer_model');
        $this->load->model('answer_model');

        if ($this->customer_model->verifyUser()) {
            $customer_id = $this->session->userdata('customer_id');
            $this->answer_model->update_answer_preference($customer_id, $this->input->post());
            $this->response('success', 200);
        } else {
            $this->response('failure', 400);
        }
    }
    
    public function update_input_term_post() {
        $this->load->model('customer_model');
        $this->load->model('answer_model');

        if ($this->customer_model->verifyUser()) {
            $customer_id = $this->session->userdata('customer_id');
            $this->answer_model->update_input_term($customer_id, $this->input->post());
            $this->response('success', 200);
        } else {
            $this->response('failure', 400);
        }
    }

    public function checkout_post() {
        $this->load->model('checkout_model');
        $this->load->model('product_model');
        $this->load->model('customer_model');
        $this->load->model('answer_model');
        $this->load->model('mealplan_model');

        $obj_checkout = array();
        $is_fastspring = false;
        $customer_id = null;
        $product_id = null;
        $is_zapier = false;

        if ($fs_order_id = $this->input->post('fs_order_id')) {
            $is_fastspring = true;
            $remote_url = "https://api.fastspring.com/orders/" . $fs_order_id;
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

            //echo $response;
            $response = json_decode($response, true);

            $email = $response['customer']['email'];
            if (strpos($email, '+test') === false) {
                return;
            }
            $first_name = $response['customer']['first'];
            $last_name = $response['customer']['last'];
            $first_name = $this->db->escape($first_name);
            $last_name = $this->db->escape($last_name);
            $orderid = $fs_order_id;
            $product_display_name = $response['items'][0]['product'];
            $product_title = $this->checkout_model->get_product_title_by_fs_display_name($product_display_name);
            $page = 0;

            $obj_checkout['email'] = $email;
            $obj_checkout['first_name'] = $first_name;
            $obj_checkout['last_name'] = $last_name;
            $obj_checkout['orderid'] = $orderid;
            $obj_checkout['product_title'] = $product_title;
            $obj_checkout['page'] = $page;

            $obj_checkout['subscription'] = $page;
            $obj_checkout['page'] = $page;

            $obj_checkout['line_items_title'] = $obj_checkout['product_title'];
        } else {
            $obj_checkout = $this->input->post();
            $obj_checkout['email'] = strtolower($obj_checkout['email']);

            if ($tags = $this->input->post('tags')) {
                $is_zapier = true;
                $orderid = "";
                $matches = array();
                preg_match('/(\w*ch_id_\w*)/', $tags, $matches);
                if (count($matches) > 0) {
                    if (substr($matches[0], 0, strlen('ch_id_')) == 'ch_id_') {
                        $orderid = substr($matches[0], strlen('ch_id_'));
                    }
                }
                $obj_checkout['orderid'] = $orderid;
            } else {
                $obj_checkout['line_items_title'] = $obj_checkout['product_title'];
            }
        }

        $arr_products = $this->product_model->get_products_by_line_items_title($obj_checkout['line_items_title']);

        if (count($arr_products) == 0) {
            echo "can not find product";
            return;
        }

        if (!$customer_id = $this->customer_model->get_id_by_email($obj_checkout['email'])) {
            $this->customer_model->update_email_by_history($obj_checkout['email']);
            if (!$customer_id = $this->customer_model->get_id_by_email($obj_checkout['email'])) {
                echo "can not find customer id";
                return;
            }
        }

        if ($fs_order_id = $this->input->post('fs_order_id')) {
            if ($product_title == "Custom Keto Meal Plan - 1 Month Auto Renew") {
                $subscription_id = $response['items'][0]['subscription'];
                $fs_account_id = $response['account'];
                addSubscription_fs($email, $subscription_id, $fs_account_id, $product_title, $conn);
//                function insert($subscription_id, $customer_id, $product_id, $fs_account_id = NULL) {
                $this->subscription_model->insert_subscription($subscription_id, $customer_id);
                $subscription_id = $this->subscription_model->insert_subscription($subscription_id, $customer_id, $product_id);
            }
        }

        $arr_duplicated_checkouts = $this->checkout_model->get_duplicated_rows($customer_id, !$is_zapier ? $obj_checkout['product_title'] : $obj_checkout['line_items_title'], $obj_checkout['orderid']);
        if (count($arr_duplicated_checkouts)) {
            if (!$is_zapier) {
                if (isset($obj_checkout['page']) && $obj_checkout['page'] === "thank you") {
                    $this->mealplan_model->send_mealplan_email($obj_checkout['first_name'], $obj_checkout['last_name'], $obj_checkout['email'], $status = 'customer', $action = 'add', $obj_checkout['orderid'], $customer_id);
                }
            } else {
                $main_product_existed = false;
                $upsell_product_existed = false;
                foreach ($arr_duplicated_checkouts as $duplicated_checkout) {
                    if ($duplicated_checkout->is_upsell) {
                        $upsell_product_existed = true;
                    } else {
                        $main_product_existed = true;
                    }
                }
                if ($main_product_existed && !$upsell_product_existed) {
                    $this->mealplan_model->send_mealplan_email($obj_checkout['first_name'], $obj_checkout['last_name'], $obj_checkout['email'], $status = 'customer', $action = 'add', $obj_checkout['orderid'], $customer_id);
                }
            }
            $final_result = array('status' => 'success', 'uid' => $obj_checkout['orderid'], 'emailing-status' => 'order duplicate');
            $this->response($final_result, 200);
            return;
        }

        $obj_product = null;
        foreach ($arr_products as $obj_product_element) {
            $this->checkout_model->insert($customer_id, $obj_product_element->id, $obj_checkout['orderid']);
            $obj_product = $obj_product_element;
        }

        $this->customer_model->update_customer_name($obj_checkout['first_name'], $obj_checkout['last_name']);

        if (($obj_product->is_orderbump || $obj_product->is_subscription) && $obj_product->weeknum == 0) {
            $final_result = array('status' => 'success', $obj_checkout['orderid']);
            $this->response($final_result, 200);
            return;
        }

        $obj_answers = $this->answer_model->get_by_customer_id($customer_id);
        if (!$obj_answers) {
            $this->mealplan_model->send_blank_notif($obj_checkout['email'], $obj_checkout['orderid']);
            return;
        }
        $json_answers = $this->answer_model->get_json_answers($obj_answers);
        $obj_mealplan = null;
        $max_day = $this->mealplan_model->get_max_day($customer_id);
        $this->mealplan_model->create_mealplan($customer_id, $json_answers, $start_day = $max_day + 1, $weeknum = 1);

        if ($obj_product->is_upsell == 1) {
            $action = 'add';
            if ($obj_product->title == "Meal Plan 12 Week Upgrade") {
                $action = '12weekupsell';
            }
            $this->mealplan_model->send_mealplan_email(
                    $obj_checkout['first_name'], $obj_checkout['last_name'], $obj_checkout['email'], $status = 'customer', $action, $obj_checkout['orderid'], $customer_id
            );
        }

        if ($obj_product->is_subscription && $obj_product->is_upsell) {
            $this->load->model('subscription_model');
            $subscription_id = $this->subscription_model->get_id_by_customer_id($customer_id);
            if ($subscription_id) {
                echo "calling api_update_product.php now...subscription_id = " . $subscription_id . ", product_title = " . $obj_product->title . "\n";
                $this->subscription_model->upgrade($subscription_id, $obj_product->title);
                $this->subscription_model->update_product_id($subscription_id, $product_id);
            }
        }

        $final_result = array('status' => 'success', 'uid' => $obj_checkout['orderid']);
        $this->response($final_result, 200);
    }

    public function check_duplicated_fs() {
        $this->load->model('checkout_model');
        $this->load->model('customer_model');

        $obj_post = $this->input->post();
        $obj_post['email'] = strtolower($obj_post['email']);
        $customer_id = $this->customer_model->get_id_by_email($obj_post['email']);
        $free_trial_existed = 0;
        if ($customer_id) {
            $free_trial_existed = $this->checkout_model->check_free_trial_existed_fs($customer_id);
        }
        $obj_return = array('status' => 'success', 'duplicated' => $free_trial_existed);
        $this->response($obj_return, 200);
    }

    public function w_charge_paid_post() {
        $this->load->model('customer_model');
        $this->load->model('product_model');
        $this->load->model('checkout_model');
        $this->load->model('mealplan_model');
        $this->load->model('answer_model');

        $data = file_get_contents('php://input');

//        $encoded_data = "- charge/paid" . " at " . date('Y-m-d H:i:s') . "\n";
//        $log .= $data . "\n";
//        file_put_contents('./subscription_logs.txt', $log, FILE_APPEND);

        $data = json_decode($data, true);
        $obj_charge = $data['charge'];

        if (strpos($obj_charge['email'], '+test') === false) {
            return;
        }

        if (!$customer_id = $this->customer_model->get_id_by_email($obj_charge['email'])) {
            echo "can not find customer id";
            return;
        }

        $obj_product = null;
        foreach ($obj_charge['line_items'] as $line_item) {

            $product_title = $line_item['title'];
            $total_price = $line_item['price'];
            $subscription_id = $line_item['subscription_id'];

            $obj_product_temp = $this->product_model->get_product_by_title($line_item['title']);
            if ($obj_product_temp->id && $obj_product_temp->is_subscription) {
                $obj_product = $obj_product_temp;
                break;
            }
        }
        if (!$obj_product) {
            echo "can not find product";
            return;
        }

        $recharge_parent_id = $this->checkout_model->get_recharge_parent_id($customer_id, $obj_product->id);
        $number_of_prev_recharged = 1 + $this->checkout_model->get_number_of_prev_recharged($customer_id, $obj_product->id);
        $prev_paid_week = $obj_product->weeknum * $number_of_prev_recharged;

        $checkout_id = $this->checkout_model->insert($customer_id, $obj_product->id, $ch_order_id = null, $recharge_parent_id);
        $obj_answers = $this->answer_model->get_by_customer_id($customer_id);
        $json_answers = $this->answer_model->get_json_answers($obj_answers);

        $count = 10; //number of recipes that can be fetched in a cycle.
        if ($obj_product->is_subscription && $obj_product->is_upsell) {
            $number_of_prev_recharged = intval($obj_product->weeknum) / 4;
        }
        $base_weeknum = 4;
        if ($obj_product->is_subscription) {
            $max_day = $this->mealplan_model->get_max_day($customer_id);
            $this->mealplan_model->create_mealplan($customer_id, $json_answers, $start_day = $max_day + 1, $weeknum = 1);
        }

        $final_result = array('status' => 'success');
        $this->response($final_result, 200);
    }

    public function w_subscription_created_post() {
        $this->load->model('product_model');
        $this->load->model('checkout_model');
        $this->load->model('customer_model');
        $this->load->model('subscription_model');

        $log = "- subscription/created" . " at " . date('Y-m-d H:i:s') . "\n";
        $data = file_get_contents('php://input');
        $log .= $data . "\n";
        file_put_contents('./subscription_logs.txt', $log, FILE_APPEND);

        $data = json_decode($data, true);
        $data = $data['subscription'];
        $subscription_id = $data['id'];
        $recharge_customer_id = $data['customer_id'];
        $product_title = $data['product_title'];

        if (
                $product_title !== 'Custom Keto Meal Plan - 1 Month Auto Renew' &&
                $product_title !== 'Custom Keto Meal Plan - UPGRADE SPECIAL To 12 Month Auto Renew' &&
                $product_title !== 'Custom Keto Meal Plan - UPGRADE SPECIAL To 3 Month Auto Renew' &&
                $product_title !== 'Custom Keto Meal Plan - Subscription Upgrade Auto renew'
        ) {
            echo "no product_title";
            return;
        }
        $email = "";
        $str_customer_info = $this->subscription_model->get_recharge_customer($recharge_customer_id);
        $arr_customer_info = json_decode($str_customer_info, true);
        if (array_key_exists('customer', $arr_customer_info) && array_key_exists('email', $arr_customer_info['customer'])) {
            $email = $arr_customer_info['customer']['email'];
        } else {
            echo "no customer or customer email";
            return;
        }

        if (strpos($email, '+test') === false) {
            return;
        }

        echo $email;
        if (!$customer_id = $this->customer_model->get_id_by_email($email)) {
            echo "can not find customer id";
            return;
        }

        $obj_product = $this->product_model->get_product_by_title($product_title);
        if (!$product_id = $obj_product->id) {
            echo "can not find product id";
            return;
        }

        if ($data['status'] == "ACTIVE") {
            $status_id = 1;
        } else if ($data['status'] == "CANCELLED") {
            $status_id = 2;
        } else if ($data['status'] == "EXPIRED") {
            $status_id = 3;
        }
        $next_charge_scheduled_at = $data['next_charge_scheduled_at'];

        $subscription_inserted = $this->subscription_model->insert_subscription($subscription_id, $customer_id, $product_id, $recharge_customer_id, $status_id, $next_charge_scheduled_at);
        echo "subscription id = " . $subscription_id . "\n";

        if ($subscription_inserted) {
            echo "success1";
        } else {
            echo "addSubscription failure";
            return;
        }

        $last_purchased_subscription_upsell_id = $this->checkout_model->get_last_purchased_product_id($customer_id, true, true);
        echo "last_purchased_subscription_upsell_id = " . $last_purchased_subscription_upsell_id . "\n";
        if ($last_purchased_subscription_upsell_id) {
            $this->subscription_model->upgrade($subscription_id, $obj_product->title);
            $this->subscription_model->update_product_id($subscription_id, $last_purchased_subscription_upsell_id);
            echo "success2";
        } else {
            echo "still not upgraded in checkout";
        }

        if ($obj_product->is_subscription && $obj_subscription->weeknum == 0) {//$1 dynamic upgrade
            $obj_upgrade = get_upgrade_obj_by_customer_id($customer_id);
            $product_title = 'Custom Keto Meal Plan - 1 Month Auto Renew';
            $this->subscription_model->upgrade($subscription_id, $product_title, $obj_upgrade->upgrade_date);
            $this->subscription_model->update_product_id($subscription_id, 2);
        }
    }

    public function w_subscription_cancelled_post() {
        $this->load->model('subscription_model');

        $log = "- subscription/cancelled" . " at " . date('Y-m-d H:i:s') . "\n";
        $data = file_get_contents('php://input');
        $log .= $data . "\n";
        file_put_contents('./subscription_logs.txt', $log, FILE_APPEND);

        $data = json_decode($data, true);
        $data = $data['subscription'];
        $subscription_id = $data['id'];
        $this->subscription_model->update_status($subscription_id, 2);

        $final_result = array('status' => 'success');
        $this->response($final_result, 200);
    }

    public function send_email_post() {
        $this->load->model('customer_model');
        $this->load->model('mealplan_model');

        $obj_checkout = $this->input->post();
        $obj_checkout['email'] = strtolower($obj_checkout['email']);
        if (strpos($obj_checkout['email'], '+test') === false) {
            return;
        }

        if (!$customer_id = $this->customer_model->get_id_by_email($obj_checkout['email'])) {
            echo "can not find customer id";
            return;
        }

        $this->mealplan_model->send_mealplan_email(
                $obj_checkout['first_name'], $obj_checkout['last_name'], $obj_checkout['email'], $status = 'customer', $action = 'add', $obj_checkout['orderid'], $customer_id
        );

        $final_result = array('status' => 'success', 'uid' => $obj_checkout['orderid']);
        $this->response($final_result, 200);
    }

    public function change_email_post() {
        $obj_change_email = $this->input->post();
        $email_quiz = strtolower($obj_change_email['email_quiz']);
        $email_checkout = strtolower($obj_change_email['email_checkout']);

        if (!isset($email_quiz) || !isset($email_checkout)) {
            $final_result = array('status' => 'failure', 'message' => 'No email entered');
            $this->response($final_result, 200);
            return;
        }

        $query = $this->db->select('id')->from('email_change_history')->where('email_quiz', $email_quiz)->get();
        if ($query->num_rows() > 0) {
            if ($email_quiz == $email_checkout) {
                $this->db->where('email_quiz', $email_quiz)->delete('email_change_history');
            } else {
                $this->db->set('email_checkout', $email_checkout)->where('email_quiz', $email_quiz)->update('email_change_history');
            }
        } else {
            if ($email_quiz != $email_checkout) {
                $this->db->insert('email_change_history', array('email_quiz' => $email_quiz, 'email_checkout' => $email_checkout));
            }
        }
        $final_result = array('status' => 'success');
        $this->response($final_result, 200);
    }

    public function refund_post() {

        $this->load->model('refund_model');
        $this->load->model('checkout_model');
        $this->load->model('customer_model');
        $this->load->model('product_model');
        $this->load->model('subscription_model');


        $obj_refund = $this->input->post();

        $email = strtolower($obj_refund['email']);
        if (strpos($email, '+test') === false) {
            return;
        }
        $tags = $obj_refund['tags'];
        $line_items_title = $obj_refund['line_items_title'];
        $refunds_line_items_title = $obj_refund['refunds_refund_line_items_line_item_title'];
        $refunds_line_items_price = $obj_refund['refunds_refund_line_items_line_item_price'];
        $tax_lines_rate = isset($obj_refund['tax_lines_rate']) ? $obj_refund['tax_lines_rate'] : null;
        $refunds_line_items_tax_lines_rate = isset($obj_refund['refunds_refund_line_items_line_item_tax_lines_rate']) ? $obj_refund['refunds_refund_line_items_line_item_tax_lines_rate'] : null;
        $financial_status = $obj_refund['financial_status'];
        $refunds_transactions_amount = $obj_refund['refunds_transactions_amount'];
        $refunds_id = $obj_refund['refunds_id'];


        $line_items_title_array = explode(',', $line_items_title);
        $refunds_line_items_title_array = explode(',', $refunds_line_items_title);
        $refunds_line_items_price_array = explode(',', $refunds_line_items_price);
        $refunds_line_items_tax_lines_rate_array = $refunds_line_items_tax_lines_rate ? explode(',', $refunds_line_items_tax_lines_rate) : array();
        $refunds_transactions_amount_array = explode(',', $refunds_transactions_amount);
        $refunds_id_array = explode(',', $refunds_id);

        file_put_contents("zapier_refund_log.txt", json_encode($_POST) . PHP_EOL, FILE_APPEND);

        //check exceptions
        if (!$email || !$tags) {
            $final_result = array('status' => 'failure', 'message' => 'no email or tags');
            echo json_encode($final_result);
            return;
        }

        $customer_id = $this->customer_model->get_id_by_email($email);

        $matches = array();
        preg_match('/(\w*ch_id_\w*)/', $tags, $matches);
        if (count($matches) > 0) {
            if (substr($matches[0], 0, strlen('ch_id_')) == 'ch_id_') {
                $ch_order_id = substr($matches[0], strlen('ch_id_'));
            }
        }
        preg_match('/(\w*Subscription Recurring Order\w*)/', $tags, $matches);
        if (count($matches) > 0) {
            $ch_order_id = $this->checkout_model->get_last_ch_order_id_by_customer_id($customer_id);
        }
        if (strlen($ch_order_id) == 0) {
            $final_result = array('status' => 'failure', 'message' => 'No carthook id');
            echo json_encode($final_result);
            return;
        }
        //tax adjust start
        echo "h_1 = " . json_encode($refunds_line_items_tax_lines_rate_array) . "\n";
        $refunds_line_items_tax_lines_rate_array_zero_filled = array();
//        if (count($refunds_line_items_tax_lines_rate_array) == 0 && $refunds_line_items_tax_lines_rate_array[0] == "null") {
//            $refunds_line_items_tax_lines_rate_array = array();
//        }
        echo "h_2 = " . json_encode($refunds_line_items_tax_lines_rate_array) . "\n";

        $product_titles_main = $this->product_model->get_product_titles($weeknum_existed = true, $is_orderbump = false, $is_upsell = false, $is_subscription = false);
        $product_titles_orderbump = $this->product_model->get_product_titles($weeknum_existed = false, $is_orderbump = true, $is_upsell = false, $is_subscription = false);

        echo "count 1 = " . count($refunds_line_items_title_array) . "\n";
        echo "count 2 = " . count($refunds_line_items_tax_lines_rate_array) . "\n";

        if (count($refunds_line_items_title_array) > count($refunds_line_items_tax_lines_rate_array)) {
            $last_get_tax_index = 0;
            for ($i = 0; $i < count($refunds_line_items_title_array); $i++) {
                if ((in_array($refunds_line_items_title_array[$i], $product_titles_main) ||
                        in_array($refunds_line_items_title_array[$i], $product_titles_orderbump)) &&
                        count($refunds_line_items_tax_lines_rate_array) > 0) {
                    array_push($refunds_line_items_tax_lines_rate_array_zero_filled, $refunds_line_items_tax_lines_rate_array[$last_get_tax_index]);
                    echo "asdf_1\n";
                    $last_get_tax_index++;
                } else {
                    echo "asdf_2\n";
                    array_push($refunds_line_items_tax_lines_rate_array_zero_filled, "0.00");
                }
                echo "refunds_line_items_tax_lines_rate_array_zero_filled = " . json_encode($refunds_line_items_tax_lines_rate_array_zero_filled) . "\n";
            }
        }
        $refunds_line_items_tax_lines_rate_array = $refunds_line_items_tax_lines_rate_array_zero_filled;
        echo "refunds_line_items_tax_lines_rate_array = " . json_encode($refunds_line_items_tax_lines_rate_array) . "\n";
        //tax adjust end

        $orderid = $ch_order_id;
        $orderbump_title = "Only OrderBump";
        $orderbump_price = 19.00;
        $total_sub_line_items_title_array = array();

        for ($i = 0; $i < count($refunds_id_array); $i++) {
            $refund_id = $refunds_id_array[$i];
//    $refund_transaction_amount = round(floatval($refunds_transactions_amount_array[$i]) / (1.00 + floatval($tax_lines_rate)), 2);
            $refund_transaction_amount = $refunds_transactions_amount_array[$i];
            echo "tax_lines_rate = " . $tax_lines_rate . "\n";
            echo "refund_transaction_amount = " . $refund_transaction_amount . "\n";
            $sub_line_items_title_array = array();

            $found_index = false;
            for ($j = 0; $j < count($refunds_line_items_price_array); $j++) {
                if (floatval($refund_transaction_amount) == round(floatval($refunds_line_items_price_array[$j]) * (1.00 + floatval($refunds_line_items_tax_lines_rate_array[$j])), 2)) {
                    $found_index = $j;
                }
            }
            if ($found_index !== false) {
                echo "9\n";
                array_push($sub_line_items_title_array, $refunds_line_items_title_array[$found_index]);
            } else {
                echo "10\n";
                if (
                        floatval($refund_transaction_amount) == round($orderbump_price * (1.00 + floatval($tax_lines_rate)), 2) &&
                        array_search("Custom Keto Meal Plan with Special Add-On Offer", $line_items_title_array) !== false
                ) {
                    echo "11\n";
                    array_push($sub_line_items_title_array, $orderbump_title);
                } else {
                    echo "12\n";
                    $start_index = -1;
                    $end_index = -1;
                    echo "12_0 count = " . count($refunds_line_items_price_array) . "\n";
                    for ($j = 0; $j < count($refunds_line_items_price_array) - 1; $j++) {
                        $sum = round(floatval($refunds_line_items_price_array[$j]) * (1.00 + floatval($refunds_line_items_tax_lines_rate_array[$j])), 2);
                        echo "curr1_sum = " . $sum . "\n";
                        if (array_search($orderbump_title, $total_sub_line_items_title_array) !== false &&
                                $refunds_line_items_title_array[$j] == "Custom Keto Meal Plan with Special Add-On Offer") {
                            $sum = $sum - round(($orderbump_price * (1.00 + floatval($tax_lines_rate))), 2);
                            echo "curr1_sum_a = " . $sum . "\n";
                        }
                        echo "12_1\n";
                        for ($k = $j + 1; $k < count($refunds_line_items_price_array); $k++) {
                            $sum += round(floatval($refunds_line_items_price_array[$k]) * (1.00 + floatval($refunds_line_items_tax_lines_rate_array[$k])), 2);
                            echo "curr2_sum = " . $sum . "\n";
                            echo "aaa_total_sub_line_items_title_array = " . json_encode($total_sub_line_items_title_array) . "\n";
                            echo "aaa_refunds_line_items_title_array_k = " . $refunds_line_items_title_array[$k] . "\n";
//                    echo "aaa_array_search = " . array_search($orderbump_title, $total_sub_line_items_title_array) . "\n";
//                    echo "aaa_compare = " . ($refunds_line_items_title_array[$k] == "Custom Keto Meal Plan with Special Add-On Offer") . "\n";
                            if (array_search($orderbump_title, $total_sub_line_items_title_array) !== false &&
                                    $refunds_line_items_title_array[$k] == "Custom Keto Meal Plan with Special Add-On Offer") {
                                $sum = $sum - round(($orderbump_price * (1.00 + floatval($tax_lines_rate))), 2);
                                echo "curr2_sum_a = " . $sum . "\n";
                            }
                            echo "sum = " . $sum . "\n";
                            echo "---refund_transaction_amount ---" . $refund_transaction_amount . "\n";
                            $sum_val = round($sum, 2);
                            $refund_transaction_amount_val = round(floatval($refund_transaction_amount), 2);
                            if ($sum_val == $refund_transaction_amount_val) {
                                $start_index = $j;
                                $end_index = $k;
                                echo "SSSSS\n";
                            } else {
                                echo "TTTTT\n";
                            }
                        }
                    }
                    if ($start_index >= 0 && $end_index >= 0) {
                        for ($j = $start_index; $j <= $end_index; $j++) {
                            array_push($sub_line_items_title_array, $refunds_line_items_title_array[$j]);
                        }
                    } else {
                        echo "start_index -1, end_index -1\n";
                        $last_line_item_title = end($total_sub_line_items_title_array);
                        echo "last_line_item_title = " . $last_line_item_title . "\n";
                        if ($last_line_item_title == $orderbump_title && count($total_sub_line_items_title_array) > 1) {
                            $last_line_item_title = $total_sub_line_items_title_array[count($total_sub_line_items_title_array) - 2];
                        }
                        if ($last_line_item_title && $last_line_item_title != $orderbump_title) {
                            $found_index_1 = array_search($last_line_item_title, $refunds_line_items_title_array);
                            if ($found_index_1 !== false &&
                                    count($refunds_line_items_title_array) >= $found_index_1 + 2) {
                                array_push($sub_line_items_title_array, $refunds_line_items_title_array[$found_index_1 + 1]);
                            }
                        } else {
                            array_push($sub_line_items_title_array, $refunds_line_items_title_array[0]);
                        }
                    }
                }
            }

            $total_sub_line_items_title_array = array_merge($total_sub_line_items_title_array, $sub_line_items_title_array);

            echo "refund_id = " . $refund_id . ", sub_line_items = " . json_encode($sub_line_items_title_array) . "\n";

            for ($j = 0; $j < count($sub_line_items_title_array); $j++) {
                $line_item_title = $sub_line_items_title_array[$j];

                if (in_array($line_item_title, $product_titles_main) ||
                        in_array($line_item_title, $product_titles_orderbump) ||
                        $line_item_title == $orderbump_title) {

                    $obj_product = $this->product_model->get_product_by_title($line_item_title);
                    $product_id = $obj_product->id;
                    $checkout_id = $this->checkout_model->get_id_by_product_id($customer_id, $ch_order_id, $product_id);
//                    if ($this->refund_model->addRefund($refund_id, $line_item_title) == true) {
                    if ($this->refund_model->insert($refund_id, $checkout_id) == true) {
                        echo "refund_id = " . $refund_id . " success in addRefund\n";

                        $this->refund_model->refund($customer_id, $product_id, $ch_order_id);
//                        if ($line_item_title == $orderbump_title) {
//                            $this->mealplan_model->refundOrderBump($email, $orderid);
//                        } else if (in_array($line_item_title, $product_orderbump)) {
//                            refund_ebook_videos($email, $orderid, $line_item_title, $conn);
//                        } else {
//                            refund($email, $orderid, $line_item_title, $product_titles_main, $conn);
//                        }


                        if ($obj_product->is_subscription) {
                            $subscription_id = $this->subscription_model->get_id_by_customer_id($customer_id);
                            preg_match('/(\w*Subscription First Order\w*)/', $tags, $matches_first_sub_order);
                            preg_match('/(\w*Subscription Recurring Order\w*)/', $tags, $matches_recurring_sub_order);
                            if (count($matches_first_sub_order) > 0 && $obj_product->is_upsell) {
                                $this->subscription_model->downgrade($subscription_id);
                            } else if (count($matches_recurring_sub_order) > 0) {
                                $this->subscription_model->cancel($subscription_id);
                            }
                        }
                    } else {
                        echo "refund_id = " . $refund_id . " failure in addRefund\n";
                    }
                } else {
                    echo "it's not our product : " . array_key_exists($line_item_title, $product_titles_main) . "," . $line_item_title == $orderbump_title . "\n";
                }
            }
        }
    }

    public function download_grocery_list_get() {

        $this->load->model('checkout_model');
        $this->load->model('grocery_model');

        $obj_post = $this->input->get();
        $uid = $obj_post['uid'];
        $i_week = $obj_post['i_week'];

        if (!$uid) {
            $final_result = array('status' => 'failure', 'message' => 'No uid in URL');
            echo json_encode($final_result);
            return;
        }

        $obj_customer_info = $this->checkout_model->get_customer_info_by_uid($uid);
        $customer_id = $obj_customer_info->customer_id;
        $meals = $this->grocery_model->get_by_i_week($customer_id, $i_week);
        $html = $this->grocery_model->create_html_by_meals($meals, $i_week);
        $this->grocery_model->download_pdf_by_html($html);
    }

    public function get_customer_info_post() {

        $this->load->model('checkout_model');
        $this->load->model('mealplan_model');
        $this->load->model('answer_model');

        $obj_post = $this->input->post();

        $uid = $obj_post['uid'];
        $day = isset($obj_post['day']) ? $obj_post['day'] : 1;
        $type = isset($obj_post['type']) ? $obj_post['type'] : 1;

        if (!$uid) {
            $final_result = array('status' => 'failure', 'message' => 'No uid inputed');
            echo json_encode($final_result);
            return;
        }

        $final_result = array();

        $obj_customer_info = $this->checkout_model->get_customer_info_by_uid($uid);
        $customer_id = $obj_customer_info->customer_id;
        $obj_mealplan_details = $this->mealplan_model->get_mealplan_details_by_option($customer_id, $day);

        $obj_return = new stdClass();
        $obj_return->email = $obj_customer_info->email;
        $obj_return->first_name = $obj_customer_info->first_name;


        $obj_answers = $this->answer_model->get_by_customer_id($customer_id);
        $json_answers = $this->answer_model->get_json_answers($obj_answers);
        $obj_return->gender = array_key_exists('gender', $json_answers) ? $json_answers['gender'] : "0";
        $obj_return->goal_cal = $this->answer_model->get_goal_cal($json_answers);

        $total_cal = 0.0;
        $day_cals = array();

        foreach ($obj_mealplan_details as $obj_mealplan_detail) {
            if ($obj_mealplan_detail->type == $type) {
                $obj_return->serving_advice = $obj_mealplan_detail->serving_advice;
                array_push($day_cals, $obj_mealplan_detail->calories);
                $total_cal += $obj_mealplan_detail->calories;
            }
        }
        $obj_return->protip = $this->answer_model->get_protip($day);
        $total_cal = (string) round($total_cal, 2);
        $obj_return->total_cal = $total_cal;

        //get BLSD servings
        $day_servings = array();
        $ranges = array(50.0, 100.0);

        for ($i = 0; $i < count($ranges); $i++) {
            $range = $ranges[$i];
            //echo "range = " . $range . "\n";
            if ($goal_cal - $total_cal <= $range) {
                $day_servings = array("B" => 1, "L" => 1, "S" => 1, "D" => 1);
            } else if ($goal_cal - $total_cal > $range) {

                $max_iterate = 5;
                for ($l = 0; $l <= $max_iterate; $l++) {
                    for ($b = 0; $b <= $max_iterate; $b++) {
                        for ($s = 0; $s <= $max_iterate; $s++) {
                            for ($d = 0; $d <= $max_iterate; $d++) {
                                if (abs($goal_cal - $total_cal - $day_cals[0] * $b - $day_cals[1] * $l - $day_cals[2] * $s - $day_cals[3] * $d) <= $range) {
                                    $day_servings = array('B' => ($b + 1), 'L' => ($l + 1), 'S' => ($s + 1), 'D' => ($d + 1));
                                }
                                if (array_key_exists('B', $day_servings)) {
                                    //echo "aaa = " . ($goal_cal - $total_cal - $day_cals[0] * $b - $day_cals[1] * $l - $day_cals[2] * $s - $day_cals[3] * $d) . "\n";
                                    break;
                                }
                            }
                            if (array_key_exists('B', $day_servings)) {
                                break;
                            }
                        }
                        if (array_key_exists('B', $day_servings)) {
                            break;
                        }
                    }
                    if (array_key_exists('B', $day_servings)) {
                        break;
                    }
                }
            }

            if (array_key_exists('B', $day_servings)) {
                break;
            }
        }

        if (!array_key_exists('B', $day_servings)) {
            $day_servings = array('B' => 1, 'L' => 1, 'S' => 1, 'D' => 1);
        }

        if ($type == "1") {
            $obj_return->serving = $day_servings['B'];
        } else if ($type == "2") {
            $obj_return->serving = $day_servings['L'];
        } else if ($type == "3") {
            $obj_return->serving = $day_servings['S'];
        } else if ($type == "4") {
            $obj_return->serving = $day_servings['D'];
        }

        return $obj_return;
    }

    //survey
    public function survey_post() {
        $this->load->model('survey_model');
        $added = $this->survey_model->add($this->input->post('customer_id'), $this->input->post('mood_id'), $this->input->post('note'));
        $final_result = array('status' => 'success');
        $this->response($final_result, 200);
    }

    public function check_survey_again_get() {
        $this->load->model('survey_model');
        $survey_again = $this->survey_model->check_survey_again($this->input->get('customer_id'));
        $final_result = array('status' => 'success', 'survey_again' => $survey_again);
        $this->response($final_result, 200);
    }

    //admin's checkout date simulator
    public function update_checkout_create_time_post() {
        $this->load->model('customer_model');
        $this->load->model('checkout_model');

        $val_return = array('status' => 'success');

        if (!$customer_id = $this->customer_model->get_id_by_email($this->input->post('email'))) {
            $val_return = array('status' => 'failure', 'message' => 'no customer id');
            $this->response($val_return, 200);
            return;
        }
        $create_time = $this->input->post('create_time');
        $this->checkout_model->update_create_time($customer_id, $create_time);

        $this->response($val_return, 200);
    }

    //inbox email read/delete actions
    public function email_action_post() { //action_1 : read, 2 : deleted
        $val_return = array('status' => 'success');
        $this->load->model('email_model');
        $customer_id = $this->input->post('customer_id');
        $email_id = $this->input->post('email_id');
        $action = $this->input->post('action');
        $this->email_model->add_email_action($customer_id, $email_id, $action);
        $this->response($val_return, 200);
    }

}
