<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Quiz_model extends CI_Model {

    protected $_tablename = 'quiz';

    function __construct() {
        parent::__construct();
    }

    function getQuizList() {
        $tbl = TBL_QUESTION;
        $this->db->select();
        
    }
    
    function getQuiz($email) {        
        $tbl = TBL_QUIZ;

        $sql = $tbl . ".quiz";
        $this->db->select($sql);

        $this->db->from($tbl);
        $this->db->where($tbl . ".email", $email);
        $this->db->limit(1);
        $query = $this->db->get();
        if ($query->num_rows() == 0)
            return false;
        return $query->result_array();
//        return $query->row();
    }

    function saveQuiz() {
        
    }

    function listBlogs() {
        $tbl = TABLE_BLOG;
        $lang = $this->input->post('lang');
        if ($lang == 'fr')
            $tbl = TABLE_BLOG_FR;
        else if ($lang == 'spa')
            $tbl = TABLE_BLOG_SPA;

        $sql = $tbl . ".*," .
                TABLE_USER . ".full_name," .
                TABLE_USER . ".name as user_name," .
                TABLE_USER . ".image," .
                TABLE_MEDIA . ".url," .
                TABLE_MEDIA . ".thumbnail," .
                TABLE_MEDIA . ".medium," .
                TABLE_MEDIA . ".small";
        $this->db->select($sql);
        $lang = $this->input->post('lang');

        $this->db->from($tbl);
        $this->db->join(TABLE_USER, $tbl . '.user_id=' . TABLE_USER . '.id');
        $this->db->join(TABLE_MEDIA, $tbl . '.featured_image=' . TABLE_MEDIA . '.id', 'left outer');
        $this->db->order_by($tbl . ".create_date", "ASC");
        $query = $this->db->get();
        if ($query->num_rows() == 0)
            return false;
        return $query->result_array();
    }

}

?>