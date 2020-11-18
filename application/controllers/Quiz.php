<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Quiz extends CI_Controller {

    public function index() {
        $this->load->view('header');
        $this->load->view('quiz');
        $this->load->view('footer.php');
    }

}
