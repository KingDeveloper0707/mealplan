<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Startnow_1 extends CI_Controller {

    public function index() {        
        $this->load->view('header');
        $this->load->view('startnow_1');
        $this->load->view('footer.php');
    }

}
