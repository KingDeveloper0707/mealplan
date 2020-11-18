<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Summary extends CI_Controller {

    function __construct() {
        parent::__construct();

        $this->load->model('Quiz_model');
    }

    public function index() {
        if (isset($_GET['email'])) {
            $email = $_GET['email'];
            $quiz = $this->Quiz_model->getQuiz($email);

            $quiz = json_decode($quiz[0]['quiz'], true);            

            $this->load->view('header');
            $this->load->view('summary_1', array(
                'quiz' => $quiz
            ));
            $this->load->view('footer.php');
        } else {
            $this->load->view('header');
            $this->load->view('summary');
            $this->load->view('footer.php');
        }
    }

}
