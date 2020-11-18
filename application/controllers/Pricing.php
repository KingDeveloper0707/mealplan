<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Pricing extends CI_Controller {

    public function index() {        
        $vid = array_key_exists('vid', $_GET) ? $_GET['vid'] : 0;
        $this->load->library('user_agent');

        $this->load->view('header');
        $this->load->view('pricing', array('vid' => $vid, 'is_mobile' => $this->agent->is_mobile()));
        $this->load->view('footer.php');
    }

}
