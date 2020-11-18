<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Start extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // Your own constructor code
        $this->load->model('Admin_model');
        $this->load->library('session');
    }

    public function index() {

        if ($this->Admin_model->verifyUser()) {
            $this->load->view('admin/header');
            if ($this->session->userdata("limitation") == "0" ||
                    $this->session->userdata("limitation") == "2") {
                $this->load->view('admin/dashboard');
            }
            $this->load->view('admin/footer');
        }
    }

}
