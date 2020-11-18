<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Start extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // Your own constructor code
        $this->load->model('customer_model');
        $this->load->model('email_model');
        $this->load->model('checkout_model');
        $this->load->model('subscription_model');
        $this->load->model('mealplan_model');
        $this->load->model('answer_model');
        $this->load->model('checkin_model');
        $this->load->library('session');
    }

    public function index() {
        $uid = null;
        $uid = $this->input->get('uid');

        if ($this->customer_model->verifyUser($uid)) {
            $customer_id = $this->session->userdata('customer_id');
            $obj_customer = $this->customer_model->get($customer_id);
            $first_name = $obj_customer->first_name;
            $current_day = $this->checkout_model->get_current_day($customer_id);
            log_message('error', 'expire_day_final = ' . $current_day);

            $header_data = array(
                'unread_messages_num' => $this->email_model->get_unread_messages_num(),
                'upgradable' => $this->subscription_model->check_upgradable_by_customer_id($customer_id),
                'obj_mealplan' => $this->mealplan_model->get_mealplan_by_customer_id($customer_id),
                'diff_day_checkout' => $this->checkout_model->get_diff_day_from_last_purchase_by_customer_id($customer_id),
                'diff_day_checkin' => $this->checkin_model->get_diff_day_from_last_checkin_by_customer_id($customer_id),
                'curr_day' => $current_day,
                'first_name' => $first_name
            );
            $this->load->view('mealplan_update/header', $header_data);
            $this->load->view('mealplan_update/mealplan');
            $this->load->view('mealplan_update/footer');
        }
    }

    public function inbox() {
        if ($this->customer_model->verifyUser()) {
            $customer_id = $this->session->userdata('customer_id');
            $header_data = array(
                'unread_messages_num' => $this->email_model->get_unread_messages_num(),
                'upgradable' => $this->subscription_model->check_upgradable_by_customer_id($customer_id),
                'emails' => $this->email_model->get_all($only_sent = true)
            );
            $this->load->view('mealplan_update/header', $header_data);
            $this->load->view('mealplan_update/inbox');
            $this->load->view('mealplan_update/footer');
        }
    }

    public function chart() {
        if ($this->customer_model->verifyUser()) {
            $customer_id = $this->session->userdata('customer_id');
            $header_data = array(
                'unread_messages_num' => $this->email_model->get_unread_messages_num(),
                'upgradable' => $this->subscription_model->check_upgradable_by_customer_id($customer_id)
            );
            $this->load->view('mealplan_update/header', $header_data);
            $this->load->view('mealplan_update/chart');
            $this->load->view('mealplan_update/footer');
        }
    }

    public function shop() {
        if ($this->customer_model->verifyUser()) {
            $customer_id = $this->session->userdata('customer_id');
            $header_data = array(
                'unread_messages_num' => $this->email_model->get_unread_messages_num(),
                'upgradable' => $this->subscription_model->check_upgradable_by_customer_id($customer_id)
            );
            $this->load->view('mealplan_update/header', $header_data);
            $this->load->view('mealplan_update/shop');
            $this->load->view('mealplan_update/footer');
        }
    }

    public function upgrade() {
        if ($this->customer_model->verifyUser()) {
            $customer_id = $this->session->userdata('customer_id');
            $upgradable = $this->subscription_model->check_upgradable_by_customer_id($customer_id);
            $header_data = array(
                'unread_messages_num' => $this->email_model->get_unread_messages_num(),
                'upgradable' => $upgradable,
            );
            if ($upgradable) {
                $obj_upgrade = $this->subscription_model->get_upgrade_obj_by_customer_id($customer_id);
                $header_data['obj_upgrade'] = $obj_upgrade;
            }
            $this->load->view('mealplan_update/header', $header_data);
            $this->load->view('mealplan_update/upgrade');
            $this->load->view('mealplan_update/footer');
        }
    }

    public function account() {
        if ($this->customer_model->verifyUser()) {
            $customer_id = $this->session->userdata('customer_id');
            $obj_answers = $this->answer_model->get_by_customer_id($customer_id);
            $json_answers = $this->answer_model->get_json_answers($obj_answers);

            $header_data = array(
                'unread_messages_num' => $this->email_model->get_unread_messages_num(),
                'upgradable' => $this->subscription_model->check_upgradable_by_customer_id($customer_id),
                'json_answers' => $json_answers
            );
            $this->load->view('mealplan_update/header', $header_data);
            $this->load->view('mealplan_update/account');
            $this->load->view('mealplan_update/footer');
        }
    }

    public function checkin() {
        if ($this->customer_model->verifyUser()) {

            $customer_id = $this->session->userdata('customer_id');
            $obj_answers = $this->answer_model->get_by_customer_id($customer_id);
            $json_answers = $this->answer_model->get_json_answers($obj_answers);
            
            if (!$this->input->post()) {
                $header_data = array(
                    'input_term' => $json_answers['input_term'],
                    'subpage' => 'answer'
                );

                $this->load->view('mealplan_update/checkin', $header_data);
            } else {
                $this->checkin_model->insert($customer_id, $this->input->post());

                $max_day = $this->mealplan_model->get_max_day($customer_id);
                $diff_day_checkout = $this->checkout_model->get_diff_day_from_last_purchase_by_customer_id($customer_id);
                $diff_day_checkin = $this->checkin_model->get_diff_day_from_last_checkin_by_customer_id($customer_id);
                $this->mealplan_model->create_mealplan($customer_id, $json_answers, $start_day = $max_day + 1, $weeknum = 1);

                $header_data = array('subpage' => 'thankyou');
                $this->load->view('mealplan_update/checkin', $header_data);
            }
        }
    }

}
