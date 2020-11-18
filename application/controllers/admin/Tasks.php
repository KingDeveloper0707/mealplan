<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Tasks extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // Your own constructor code
        $this->load->model('Admin_model');
        $this->load->library('session');
    }

    public function index() {
        if ($this->Admin_model->verifyUser()) {
            redirect(base_url() . "admin", 'auto');
        }
    }

    public function quiz() {
        if ($this->Admin_model->verifyUser()) {
            $this->load->view('admin/header');
            if ($this->session->userdata("limitation") != "2") {
                $this->load->view('admin/tasks/quiz');
            }
            $this->load->view('admin/footer');
        }
    }

    public function recover() {
        if ($this->Admin_model->verifyUser()) {
            $this->load->view('admin/header');
            $this->load->view('admin/tasks/recover');
            $this->load->view('admin/footer');
        }
    }

    public function survey() {
        if ($this->Admin_model->verifyUser()) {
            $this->load->model('Variable_model');

            if ($this->input->post()) {
                $this->Variable_model->set_variable('survey', $this->input->post('survey_enable'));
            }
            $survey_enabled = $this->Variable_model->get_variable('survey');
            $data = array('survey_enabled' => $survey_enabled);
            $this->load->view('admin/header');
            $this->load->view('admin/tasks/survey', $data);
            $this->load->view('admin/footer');
        }
    }

    public function purchase_date() {
        if ($this->Admin_model->verifyUser()) {
            $this->load->view('admin/header');
            $this->load->view('admin/tasks/purchase_date');
            $this->load->view('admin/footer');
        }
    }

    public function email_manager($page = null, $email_manager_id = 0) {
        $this->load->model('Email_model');

        if ($this->Admin_model->verifyUser()) {
            if ($this->input->post()) {
                $postData = $this->input->post();
                $this->Email_model->update_email_manager($postData, $postData["action"]);
            }

            if ($page == "add") {
                $this->load->view('admin/header');
                $this->load->view('admin/tasks/email_manager_add');
                $this->load->view('admin/footer');
            } else if ($page == "edit") {
                if ($email_manager_id == null) {
                    redirect(base_url(), 'auto');
                }

                $data["result"] = $this->Email_model->get_by_id($email_manager_id);
                $this->load->view('admin/header');
                $this->load->view('admin/tasks/email_manager_edit', $data);
                $this->load->view('admin/footer');
            } else {
                $data = array();
                $data['emails'] = $this->Email_model->get_all($only_sent = false);

                $this->load->view('admin/header');
                $this->load->view('admin/tasks/email_manager', $data);
                $this->load->view('admin/footer');
            }
        }
    }

    public function faq_comment($page = null, $comment_id = 0) {
        $this->load->model('Comment_model');
        if ($this->Admin_model->verifyUser()) {

            if ($this->input->post()) {
                $postData = $this->input->post();
                $this->Comment_model->updateComment($postData, $postData["action"]);
            }
            if ($page == 'add') {
                if ($comment_id == null) {
                    redirect(base_url(), 'auto');
                }
                $data = null;
                $data['result'] = $this->Comment_model->get_comment($comment_id);
                $this->load->view('admin/header');
                $this->load->view('admin/tasks/faq_comment_add', $data);
                $this->load->view('admin/footer');
            } else if ($page == 'edit') {
                if ($comment_id == null) {
                    redirect(base_url(), 'auto');
                }
                $data = null;
                $data['result'] = $this->Comment_model->get_comment($comment_id);
                $this->load->view('admin/header');
                $this->load->view('admin/tasks/faq_comment_edit', $data);
                $this->load->view('admin/footer');
            } else {
                $this->load->view('admin/header');
                $comments = $this->Comment_model->get_comment_all();
                $this->load->view('admin/tasks/faq_comment', array('comments' => $comments));
                $this->load->view('admin/footer');
            }
        }
    }

    public function non_customer() {
        if ($this->Admin_model->verifyUser()) {
            $this->load->view('admin/header');
            if ($this->session->userdata("limitation") != "1") {
                $this->load->view('admin/tasks/non_customer');
            }
            $this->load->view('admin/footer');
        }
    }

    public function download_non_customer() {
        if ($this->Admin_model->verifyUser()) {
            if ($this->session->userdata("limitation") != "1") {
                $this->load->helper('download');
                $file_name = "/home/smplk3t0systm/public_html/api/noncustomers.csv";
                $data = file_get_contents($file_name);
                force_download($file_name, NULL); //will get the file name for you
            }
        }
    }

}
