<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // Your own constructor code
        $this->load->model('customer_model');
        $this->load->model('checkout_model');
        $this->load->library('session');
    }

    public function index() {
        /*
          Error List:
          0 - No Error
          1 - Too Many Login Attempts
          2 - Bad Credentials
         */

        $data["error"] = 0;

        if ($this->input->post()) {
            $postData = $this->input->post();
            $auth = $this->customer_model->customerLogin($postData);

            if ($auth['status'] == 'success') {
                redirect(base_url() . "mealplan_update", "auto");
            } else {
                if (!$loginattempts = $this->session->userdata('loginattempts')) {
                    $this->session->set_userdata("loginattempts", 1);
                    $loginattempts = 1;
                } else {
                    $loginattempts++;
                    $this->session->set_userdata('loginattempts', $loginattempts);
                }

                if ($loginattempts > 3) {
                    $data['error'] = 'too many login attempts';
                } else {
                    $data["error"] = $auth['message'];
                }

                $this->load->view('mealplan_update/header_auth', $data);
                $this->load->view('mealplan_update/login', $data);
                $this->load->view('mealplan_update/footer_auth', $data);
            }
        } else {
            $uid = $this->input->get('uid');
            if ($uid) {
                $obj_customer = $this->checkout_model->get_customer_info_by_uid($uid);
                if ($obj_customer) {                    
                    $data['email'] = $obj_customer->email;
                }
            }
            $this->load->view('mealplan_update/header_auth', $data);
            $this->load->view('mealplan_update/login', $data);
            $this->load->view('mealplan_update/footer_auth', $data);
        }
    }

    public function validate_password() {
        $resp = array();
        $postData = $this->input->post();
        $auth = $this->customer_model->validate_password($postData);
        if ($auth === true) {
            $resp = array('status' => 'success');
        } else {
            $resp = array('status' => 'failure');
        }
        echo json_encode($resp);
        return;
    }

}
