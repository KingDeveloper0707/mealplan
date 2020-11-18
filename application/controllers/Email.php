<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Email extends CI_Controller {

    public function index() {
        
        $this->load->view('header');
        $this->load->view('email');
        $this->load->view('footer.php');
    }

}
