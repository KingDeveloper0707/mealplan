<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Checkin_model extends CI_Model {

//    protected $_tablename = 'quiz';

    function __construct() {
        parent::__construct();
    }

    function get_by_customer_id($customer_id) {
        $query = $this->db->select('test_answer_checkin.id, test_answer_checkin.choice_id, test_answer_checkin.value, test_choice.value as choice_value, test_choice.name, test_answer_checkin_history.create_time')
                ->from('test_answer_checkin')
                ->join('test_answer_checkin_history', 'test_answer_checkin.history_id = test_answer_checkin_history.id', 'left')
                ->join('test_choice', 'test_answer_checkin.choice_id = test_choice.id', 'left')
                ->where('test_answer_checkin_history.customer_id', $customer_id)
                ->order_by('test_answer_checkin_history.create_time', 'desc')
                ->limit(1)
                ->get();
        return $query->result();
    }
    
    function get_json_answers($obj_answers) {
        $answer = null;
        foreach ($obj_answers as $obj_answer) {
            $answer[$obj_answer->name] = $obj_answer->value ? $obj_answer->value : $obj_answer->choice_value;
        }
        return $answer;
    }

    function insert($customer_id, $obj_answers) {
        //update/insert test_answer_checkin_history
        $this->db->set('customer_id', $customer_id);
        $this->db->insert('test_answer_checkin_history');
        $history_id = $this->db->insert_id();

        $this->insert_inner($history_id, $obj_answers);
    }

    function insert_inner($history_id, $obj_answers) {
        $CI = & get_instance();
        $CI->load->model('choice_model');
        $editable_keys = $this->choice_model->get_editable_choice_name();

        foreach ($obj_answers as $key => $value) {
            $isEditable = in_array($key, $editable_keys);
            if ($choice_id = $this->choice_model->get_id_by_name_value($key, $isEditable ? null : $value)) {
                $this->db->set('history_id', $history_id);
                $this->db->set('choice_id', $choice_id);
                $this->db->set('value', $isEditable ? $value : null);
                $this->db->insert('test_answer_checkin');
            }
        }
    }

    function get_diff_day_from_last_checkin_by_customer_id($customer_id) {
        
        $val_return = null;
        $query = $this->db->select('DATEDIFF(NOW(), create_time) as days')
                ->from('test_answer_checkin_history')
                ->where('customer_id', $customer_id)
                ->order_by('create_time', 'DESC')
                ->limit(1)
                ->get();
        $row = $query->row();
        if (isset($row)) {
            $val_return = $row->days;
        }
        return $val_return;
    }

    function delete($id) {
        $this->db->delete('test_answer_checkin', array('id' => $id));
    }

}

?>