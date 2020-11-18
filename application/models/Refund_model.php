<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Refund_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function get_all() {
        $this->db->get('test_refund');
    }

    function get($id) {
        $this->db->get_where('test_refund', array('id' => $id));
    }

    function insert($refund_id, $checkout_id) {
        
        $query = $this->db->select('*')
                ->from('test_refund')
                ->where('refund_id', $refund_id)
                ->where('checkout_id', $checkout_id)
                ->get();
        if($query->num_rows() > 0) {
            echo "insert failure1 \n";
            return false;
        }
        $data = array(
            'refund_id' => $refund_id,
            'checkout_id' => $checkout_id
        );
        $this->db->insert('test_refund', $data);
        
        if($this->db->insert_id()) {
            return true;
        } else {
            echo "insert failure2 \n";
            return false;
        }
//        return $this->db->insert_id();
    }

    function delete($id) {
        $this->db->delete('test_refund', array('id' => $id));
    }

    function refund($customer_id, $product_id, $ch_order_id, $recharge_parent_id = null) {
        echo "\nhere is refund\n";

        $query = $this->db->select('weeknum')->from('test_product')->where('id', $product_id)->get();
        $row = $query->row();
        $weeknum = $row->weeknum;

        $deleted_num = $weeknum * 7 * 4;
        $this->db->where('customer_id', $customer_id)->order_by('day', 'DESC')->limit($deleted_num)->delete('test_mealplan');

//        $this->db->set('refund', '1')
//                ->where('customer_id', $customer_id)
//                ->where('product_id', $product_id)
//                ->where('ch_order_id', $ch_order_id)
//                ->where('recharge_parent_id', $recharge_parent_id)
//                ->where('refund', '0')
//                ->update('test_checkout');
        return;
    }

}

?>