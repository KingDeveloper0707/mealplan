<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Question_model extends CI_Model {

//    protected $_tablename = 'quiz';

    function __construct() {
        parent::__construct();
    }

    function getAllQuestions() {        
        $this->db->get(TBL_QUESTION);        
    }
    
    function getQuestion($id) {
        $this->db->get_where(TBL_QUESTION, array('id'=>$id));
    }
    
    function insertQuestion($data) {        
        $this->db->insert(TBL_QUESTION, $data);
    }
    
    function deleteQuestion($id) {        
        $this->db->delete(TBL_QUESTION, array('id'=>$id));
    }
    
    
    

}

?>