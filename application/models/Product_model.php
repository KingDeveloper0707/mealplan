<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Product_model extends CI_Model {

//    protected $_tablename = 'quiz';

    function __construct() {
        parent::__construct();
    }

    function get_all_products() {
        $this->db->get('test_product');
    }

    function get_product($id) {
        $this->db->get_where('test_product', array('id' => $id));
    }

    function get_product_by_title($title) {
        $query = $this->db->get_where('test_product', array('title' => $title));
        return $query->row();
    }

    function get_products_by_line_items_title($line_items_title) {
        $query = $this->db->where('FIND_IN_SET(title,"' . $line_items_title . '")')->order_by('is_upsell')->get('test_product');
        return $query->result();
    }

    function insert_product($data) {
        $this->db->insert('test_product', $data);
    }

    function delete_product($id) {
        $this->db->delete('test_product', array('id' => $id));
    }

    function get_product_titles($weeknum_existed = true, $is_orderbump = false, $is_upsell = false, $is_subscription = false) {
        
        $titles = array();

        $this->db->select('title')->from('test_product');

        if ($weeknum_existed) {
            $this->db->where('weeknum > 0');
        }
        if ($is_orderbump) {
            $this->db->where('is_orderbump', 1);
        }
        if ($is_upsell) {
            $this->db->where('is_upsell', 1);
        }
        if ($is_subscription) {
            $this->db->where('is_subscription', 1);
        }
        $query = $this->db->get();
        
        foreach ($query->result() as $row) {
            array_push($titles, $row->title);
        }
        return $titles;
    }

}

?>