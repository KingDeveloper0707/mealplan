<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Signup extends CI_Controller {

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

        $data["error"] = "";

        if ($this->input->post()) {
            if ($this->session->userdata("loginattempts")) {
                $postData = $this->input->post();
                $loginattempts = $this->session->userdata("loginattempts");
                if ($loginattempts > 4) {
                    $data["error"] = "overfailure";
                    $this->load->view('mealplan_update/header_auth', $data);
                    $this->load->view('mealplan_update/signup', $data);
                    $this->load->view('mealplan_update/footer_auth', $data);
                } else {
                    $auth = $this->customer_model->customerSignup($postData);
                    if ($auth['status'] == 'success') {
                        redirect(base_url() . "mealplan_update", "auto");
                    } else {
                        $data["error"] = $auth['message'];
                        $this->load->view('mealplan_update/header_auth', $data);
                        $this->load->view('mealplan_update/signup', $data);
                        $this->load->view('mealplan_update/footer_auth', $data);
                    }
                }
            } else {
                $this->session->set_userdata("loginattempts", 0);
                $postData = $this->input->post();
                $auth = $this->customer_model->customerSignup($postData);
                
                if ($auth['status'] == 'success') {
                    redirect(base_url() . "mealplan_update", "auto");
                } else {
                    $data["error"] = $auth['message'];
                    $this->load->view('mealplan_update/header_auth', $data);
                    $this->load->view('mealplan_update/signup', $data);
                    $this->load->view('mealplan_update/footer_auth', $data);
                }
            }
        } else {
            $uid = $this->input->get('uid');
            $email = null;
            if (!$uid) {
                $data = array();
                echo "no uid";
                return;
            } else {
                $obj_customer = $this->checkout_model->get_customer_info_by_uid($uid);

                if (!$obj_customer) {
                    echo "entered uid is not existed";
                    return;
                }
                $data['email'] = $obj_customer->email;
                $data['first_name'] = $obj_customer->first_name;
            }            
            $this->load->view('mealplan_update/header_auth', $data);
            $this->load->view('mealplan_update/signup', $data);
            $this->load->view('mealplan_update/footer_auth', $data);            
        }
    }

}
