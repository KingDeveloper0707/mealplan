<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class MealPlan extends CI_Controller {

    public function index() {        
        $this->load->view('header');
        $this->load->view('mealplan');
        $this->load->view('footer.php');
    }

}
