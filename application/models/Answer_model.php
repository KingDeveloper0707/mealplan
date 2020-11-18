<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Answer_model extends CI_Model {

//    protected $_tablename = 'quiz';

    function __construct() {
        parent::__construct();
    }

    function get_by_customer_id($customer_id) {
        $query = $this->db->select('test_answer_main.id, test_answer_main.choice_id, test_answer_main.value, test_choice.value as choice_value, test_choice.name')
                ->from('test_answer_main')
                ->join('test_answer_main_history', 'test_answer_main.history_id = test_answer_main_history.id', 'left')
                ->join('test_choice', 'test_answer_main.choice_id = test_choice.id', 'left')
                ->where('test_answer_main_history.customer_id', $customer_id)
                ->where('test_answer_main.active', true)
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
        unset($obj_answers['email']);
        unset($obj_answers['first_name']);

        //update/insert test_answer_main_history
        $history_id = null;
        $query = $this->db->select('id')
                ->from('test_answer_main_history')
                ->where('customer_id', $customer_id)
                ->get();
        $this->db->set('customer_id', $customer_id);
        if ($query->num_rows() > 0) {
            $history_id = $query->row('id');
            $this->db->set('customer_id', $customer_id)
                    ->set('update_time', 'CURRENT_TIMESTAMP', false)
                    ->where('id', $history_id)
                    ->update('test_answer_main_history');
        } else {
            $this->db->insert('test_answer_main_history');
            $history_id = $this->db->insert_id();
        }

        //make all answers inactive
        $this->db->set('active', false)->where('history_id', $history_id)->update('test_answer_main');
        $this->insert_inner($history_id, $obj_answers);
    }

    function update_answer_preference($customer_id, $obj_answers) {
        $query = $this->db->select('test_choice.id')
                ->from('test_choice')
                ->join('test_question', 'test_choice.question_id = test_question.id', 'left')
                ->where('test_question.updatable', true)
                ->get();
        $updatable_choice_ids = array();
        foreach ($query->result() as $item) {
            array_push($updatable_choice_ids, $item->id);
        }
        $this->db->set('active', false)
                ->where_in('choice_id', $updatable_choice_ids)
                ->update('test_answer_main');

        $history_id = $this->get_history_id_by_customer_id($customer_id);
        $this->insert_inner($history_id, $obj_answers);
    }
    
    function update_input_term($customer_id, $obj_answers) {
        $query = $this->db->select('test_choice.id')
                ->from('test_choice')
                ->where('test_choice.name', 'input_term')                
                ->get();
        $updatable_choice_ids = array();
        foreach ($query->result() as $item) {
            array_push($updatable_choice_ids, $item->id);
        }
        $this->db->set('active', false)
                ->where_in('choice_id', $updatable_choice_ids)
                ->update('test_answer_main');

        $history_id = $this->get_history_id_by_customer_id($customer_id);
        $this->insert_inner($history_id, $obj_answers);
    }

    function insert_inner($history_id, $obj_answers) {
        $CI = & get_instance();
        $CI->load->model('choice_model');
        $editable_keys = $this->choice_model->get_editable_choice_name();

        //find all inactive answers
        $query = $this->db->select('id')
                ->from('test_answer_main')
                ->where('history_id', $history_id)
                ->where('active', false)
                ->get();
        $existing_rows = $query->result();

        $index = 0;
        foreach ($obj_answers as $key => $value) {
            $isEditable = in_array($key, $editable_keys);
            if ($choice_id = $this->choice_model->get_id_by_name_value($key, $isEditable ? null : $value)) {
                $this->db->set('history_id', $history_id);
                $this->db->set('choice_id', $choice_id);
                $this->db->set('active', true);
                $this->db->set('value', $isEditable ? $value : null);

                if ($index < count($existing_rows)) {
                    $this->db->where('id', $existing_rows[$index]->id);
                    $this->db->update('test_answer_main');
                } else {
                    $this->db->insert('test_answer_main');
                }
            }
            $index++;
        }
    }

    function get_history_id_by_customer_id($customer_id) {
        $val_return = null;
        $query = $this->db->select('id')
                ->from('test_answer_main_history')
                ->where('customer_id', $customer_id)
                ->limit(1)
                ->get();
        $row = $query->row();
        if (isset($row)) {
            $val_return = $row->id;
        }
        return $val_return;
    }

    function get_goal_cal($json_answers) {
        $curr_weight = $json_answers['curr_weight']; //pound
        $goal_weight = $json_answers['goal_weight']; //pound
        $height = $json_answers['height']; //inches
        $age = $json_answers['age'];        
        $gender = $json_answers['gender'];
        $activity = $json_answers['q_activity'];

        $baseline = 646.0;
        $diff_age = (100 - $age) * 4.5;
        $diff_weight = ($curr_weight - 100) * 4;
        $diff_height = ($height - 48) * 14;

        $cal = $baseline + $diff_age + $diff_weight + $diff_height;

        if ($gender == 0) {
            $cal = $cal * (100 - 11) / 100;
        }
        if ($activity == 1) {
            $cal = $cal * (100 + 12) / 100;
        } else if ($activity == 2) {
            $cal = $cal * (100 + 20) / 100;
        } else if ($activity == 3) {
            $cal = $cal * (100 + 45) / 100;
        }

        $curr_cal = $cal;
        $goal_cal = $curr_cal * $goal_weight / $curr_weight;
        $goal_cal = (string) round($goal_cal, 2);
        if ($goal_cal < 1250) {
            $goal_cal = $curr_cal * 0.8;
            if ($goal_cal < 1250) {
                $goal_cal = $curr_cal * 0.9;
            }
        }
        return $goal_cal;
    }

    function delete($id) {
        $this->db->delete('test_answer_main', array('id' => $id));
    }

}

?>