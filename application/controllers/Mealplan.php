<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class MealPlan extends CI_Controller {

    public function index() {
        $this->load->model('mealplan_model');
        $this->load->model('checkout_model');
        $this->load->model('comment_model');

        $uid = array_key_exists('uid', $_GET) ? $_GET['uid'] : 0;
        $page = array_key_exists('page', $_GET) ? $_GET['page'] : "mealplan";
        $subpage = array_key_exists('subpage', $_GET) ? $_GET['subpage'] : "";
        
        $obj_customer_info = $this->checkout_model->get_customer_info_by_uid($uid);

        $first_name = $obj_customer_info->first_name;
        $customer_id = $obj_customer_info->customer_id;
        $obj_mealplan = $this->mealplan_model->get_mealplan_by_customer_id($customer_id);
        $purchased_products = $this->checkout_model->get_purchased_products_by_customer_id($customer_id);
        
//      $this->mealplan_model->update_visit($customer_id);
        
        $comments = array();
        $comments = $this->comment_model->get_comment_all();
        $comments_like = array();
        $comments_like = $this->comment_model->get_comment_like_all();


        $parameters = array(
            'uid' => $uid,
            'page' => $page,
            'subpage' => $subpage,
            'first_name' => $first_name,
            'obj_mealplan' => $obj_mealplan,
            'purchased_products' => $purchased_products,
            'comments' => $comments,
            'comments_like' => $comments_like
        );

        $this->load->view('header', array('page' => $page));
        $this->load->view('mealplan', $parameters);
        $this->load->view('footer.php');
    }

    function file_download() {
        $file_name = $this->input->get('file_name');
        $this->load->helper('download');
        $file_name = "/home/smplk3t0systm/ebooks/" . $file_name;
        $data = file_get_contents($file_name);
        force_download($file_name, NULL); //will get the file name for you
    }

}
