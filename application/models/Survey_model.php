<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Survey_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        // Your own constructor code
    }

    public function add($customer_id, $mood_id, $note) {
        $val_return = false;

        $this->db->set('customer_id', $customer_id)
                ->set('mood_id', $mood_id)
                ->set('note', $note)
                ->insert('mealplan_survey');

        if ($this->db->affected_rows() == 1) {
            $val_return = true;
        }
        return $val_return;
    }

    public function check_survey_again($customer_id) {
        $val_return = false;

        $query_survey_enabled = $this->db->select('update_time')->from('variables')->where('name', 'survey')->where('value', 1)->limit(1)->get();
        if ($query_survey_enabled->num_rows() > 0) {
            $survey_enabled_time = $query_survey_enabled->row('update_time');
            $query = $this->db->select('id')
                            ->from('mealplan_survey')
                            ->where('customer_id', $customer_id)
                            ->where('create_time > "' . $survey_enabled_time . '"', NULL, FALSE)
                            ->order_by('create_time', 'DESC')
                            ->limit(1)->get();
            if ($query->num_rows() > 0) {
                $val_return = false;
            } else {
                $val_return = true;
            }
        } else {
            $val_return = false;
        }
        return $val_return;
    }

}
