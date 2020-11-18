<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Upsell extends CI_Controller {

    public function index() {
        $this->load->view('upsell');
    }
    public function upsell12week() {
        $this->load->view('upsell12week');
    }

}
