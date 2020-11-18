<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Choice_model extends CI_Model {

//    protected $_tablename = 'quiz';

    function __construct() {
        parent::__construct();
    }

    function getAllChoices() {
        $this->db->get(TBL_CHOICE);
    }

    function getChoice($id) {
        $this->db->get_where(TBL_CHOICE, array('id' => $id));
    }

    function insertChoice($data) {
        $this->db->insert(TBL_CHOICE, $data);
    }

    function deleteChoice($id) {
        $this->db->delete(TBL_CHOICE, array('id' => $id));
    }

    function get_editable_choice_name() {
        $arr_return = array();
        $query = $this->db->select('name')
                ->from('test_choice')
                ->where('value', null)
                ->get();
        foreach ($query->result() as $row) {
            array_push($arr_return, $row->name);
        }
        return $arr_return;
    }

    function get_id_by_name_value($name, $value) {
        $val_return = null;
        $query = $this->db->select('id')
                ->from('test_choice')
                ->where('name', $name)
                ->where('value', $value)
                ->limit(1)
                ->get();
        $row = $query->row();
        if (isset($row)) {
            $val_return = $row->id;
        }
        return $val_return;
    }

}

?>