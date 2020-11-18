<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Logout extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // Your own constructor code
        $this->load->model('Admin_model');
        $this->load->library('session');
    }

    public function index() {
        $this->Admin_model->logout();
        redirect(base_url() . "admin", 'auto');
    }

}
