<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Variable_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        // Your own constructor code
    }
    
    public function set_variable($name, $value) {
        $query = $this->db->select('id')->from('variables')->where('name', $name)->get();
        if($query->num_rows() > 0) {
            $this->db->set('value', $value)->where('id', $query->row('id'))->update('variables');
        } else {
            $this->db->set('name', $name)->set('value', $value)->insert('variables');
        }
    }
    
    public function get_variable($name) {
        $val_return = null;
        $query = $this->db->select('value')->from('variables')->where('name', $name)->get();
        if($query->num_rows() > 0) {
            $val_return = $query->row('value');
        }
        return $val_return;
    }

}
