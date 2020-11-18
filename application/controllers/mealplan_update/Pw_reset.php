<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class pw_reset extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // Your own constructor code
        $this->load->model('customer_model');
        $this->load->library('session');
    }

    public function index() {
        /*
          Error List:
          0 - No Error
          1 - Too Many Login Attempts
          2 - Bad Credentials
         */

        if ($this->input->post()) {
            if ($this->input->post('email')) {
                $customer_id = $this->customer_model->get_id_by_email($this->input->post('email'));
                if (!$customer_id) {
                    $data["error"] = 'incorrect email';
                    $this->load->view('mealplan_update/header_auth', $data);
                    $this->load->view('mealplan_update/pw_reset_send_email', $data);
                    $this->load->view('mealplan_update/footer_auth', $data);
                    return;
                }
                $token = bin2hex(random_bytes(50));
                $this->customer_model->send_pw_reset_email($customer_id, $this->input->post('email'), $token);
                $data = array();
                $data['email'] = $this->input->post('email');
                $this->load->view('mealplan_update/header_auth', $data);
                $this->load->view('mealplan_update/pw_reset_sent_email', $data);
                $this->load->view('mealplan_update/footer_auth', $data);
            } else if ($this->input->post('token')) {
                $customer_id = $this->customer_model->get_customer_id_by_token($this->input->post('token'));
                $this->customer_model->update_password($customer_id, $this->input->post('password'));
                redirect(base_url() . "mealplan_update", "auto");
            }
        } else if ($this->input->get('token')) {
            $data = array();
            $data['token'] = $this->input->get('token');
             
            $this->load->view('mealplan_update/header_auth', $data);
            $this->load->view('mealplan_update/pw_reset', $data);
            $this->load->view('mealplan_update/footer_auth', $data);
        } else {
            $data = array();
            $this->load->view('mealplan_update/header_auth', $data);
            $this->load->view('mealplan_update/pw_reset_send_email', $data);
            $this->load->view('mealplan_update/footer_auth', $data);
        }
    }

}
