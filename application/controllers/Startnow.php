<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Startnow extends CI_Controller {

    public function index() {        
        $this->load->view('header');
        $this->load->view('startnow');
        $this->load->view('footer.php');
    }

}
