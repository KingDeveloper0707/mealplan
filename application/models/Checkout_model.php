<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

//define('TIMEZONE', 'America/New_York');
define('TIMEZONE', 'UTC');
date_default_timezone_set(TIMEZONE);

class Checkout_model extends CI_Model {

//    protected $_tablename = 'quiz';

    function __construct() {
        parent::__construct();
    }

    function getAllCheckouts() {
        $this->db->get('test_checkout');
    }

    function getCheckout($id) {
        $this->db->get_where('test_checkout', array('id' => $id));
    }

    function getCheckoutWithEmail($email) {
        $this->db->get_where('test_checkout', array('email' => $email));
    }

    function get_current_day($customer_id) {
        $val_return = null;
        $query = $this->db->select('test_checkout.create_time, test_product.weeknum')
                ->from('test_checkout')
                ->join('test_product', 'test_checkout.product_id = test_product.id', 'left')
                ->join('test_refund', 'test_refund.checkout_id = test_checkout.id', 'left')
                ->where('test_checkout.customer_id', $customer_id)
                ->where('test_refund.id', null)
                ->where('test_product.weeknum > ', 0)
                ->order_by('test_checkout.create_time')
                ->get();

        $last_calculated_checkout_date = null;
        $expire_date = null;
        $days = 0;
        $today = date("Y-m-d H:i:s");

        foreach ($query->result() as $row) {
            if (!$expire_date || ($expire_date && $row->create_time >= $expire_date)) {
                $expire_date = Date('Y-m-d H:i:s', strtotime($row->create_time . "+" . $row->weeknum . " week"));
                log_message('error', 'expire_date1 = ' . $expire_date);
            } else {
                $expire_date = Date('Y-m-d H:i:s', strtotime($expire_date . "+" . $row->weeknum . " week"));
                log_message('error', 'expire_date2 = ' . $expire_date);
            }

            if ($today > $row->create_time && $today < $expire_date) {
                log_message('error', "today = " . $today . ", create_time = " . $row->create_time . ", expire_date = " . $expire_date);
                $date_create_time = new DateTime($row->create_time);
                $now = new DateTime();
                $date_diff = $date_create_time->diff($now)->format("%d days, %h hours and %i minuts");
                $day_diff = intval($date_create_time->diff($now)->format("%d")) + 1 + $days;
                $val_return = $day_diff;
                log_message('error', 'date_diff = ' . $date_diff);
                break;
            } else {
                log_message('error', "111_today = " . $today . ", create_time = " . $row->create_time . ", expire_date = " . $expire_date);
            }

            $days += $row->weeknum * 7;
        }



//        log_message('error', 'expire_date = ' . $expire_date);
        return $val_return;
    }

    function get_diff_day_from_last_purchase_by_customer_id($customer_id) {
        $val_return = null;
        $query = $this->db->select('DATEDIFF(NOW(), test_checkout.create_time) as days')
                ->from('test_checkout')
                ->join('test_product', 'test_checkout.product_id = test_product.id', 'left')
                ->join('test_refund', 'test_refund.checkout_id = test_checkout.id', 'left')
                ->where('test_checkout.customer_id', $customer_id)
                ->where('test_refund.id', null)
                ->where('test_product.weeknum > ', 0)
                ->order_by('test_checkout.create_time', 'DESC')
                ->limit(1)
                ->get();
        if ($row = $query->row()) {
            $val_return = $row->days;
        }
        return $val_return;
    }

    function get_purchased_products_by_customer_id($customer_id) {
        $query = $this->db->select('test_product.*')
                ->from('test_checkout')
                ->join('test_product', 'test_checkout.product_id = test_product.id', 'left')
                ->join('test_refund', 'test_refund.checkout_id = test_checkout.id', 'left')
                ->where('test_checkout.customer_id', $customer_id)
                ->where('test_refund.id', null)
                ->order_by('test_checkout.create_time', 'DESC')
                ->get();
        return $query->result();
    }

    function get_id_by_product_id($customer_id, $ch_order_id, $product_id) {
        $checkout_id = null;
        $query = $this->db->select('id')
                ->from('test_checkout')
                ->where('customer_id', $customer_id)
                ->where('ch_order_id', $ch_order_id)
                ->where('product_id', $product_id)
                ->order_by('test_checkout.create_time', 'DESC')
                ->limit(1)
                ->get();
        if ($row = $query->row()) {
            $checkout_id = $row->id;
        }
        return $checkout_id;
    }

    function get_duplicated_row($customer_id, $product_id, $ch_order_id) {
        $duplicated_row = null;
        $query = $this->db->select("id")
                ->where("customer_id", $customer_id)
                ->where("product_id", $product_id)
                ->where('ch_order_id', $ch_order_id)
                ->get('test_checkout');
        if ($query->num_rows() > 0) {
            $duplicated_row = $query->row();
        }

        return $duplicated_row;
    }

    function get_duplicated_rows($customer_id, $line_items_title, $ch_order_id) {
        $duplicated_row = array();
        $query = $this->db->select("test_checkout.id, test_product.is_upsell")
                ->join('test_product', 'test_checkout.product_id = test_product.id')
                ->where("test_checkout.customer_id", $customer_id)
                ->where('test_checkout.ch_order_id', $ch_order_id)
                ->where('FIND_IN_SET(test_product.title,"' . $line_items_title . '")')
                ->get('test_checkout');
        if ($query->num_rows() > 0) {
            $duplicated_row = $query->result();
        }

        return $duplicated_row;
    }

    function check_free_trial_existed_fs($customer_id) {
        $val_return = false;
        $query = $this->db->select('test_checkout.id')
                ->join('test_product', 'test_checkout.product_id = test_product.id', 'left')
                ->join('test_refund', 'test_refund.checkout_id = test_checkout.id', 'left')
                ->where('test_checkout.customer_id', $customer_id)
                ->where('test_product.is_subscription', true)
                ->where('test_product.is_upsell', false)
                ->where('test_refund.refund_id', null)
                ->get();
        if ($query->num_rows() > 0) {
            $val_return = true;
        }
        return $val_return;
    }

    function check_prev_checkout_existed($customer_id) {
        $val_return = false;
        $query = $this->db->select('test_checkout.id')
                ->from('test_checkout')
                ->join('test_product', 'test_checkout.product_id = test_product.id', 'left')
                ->join('test_refund', 'test_refund.checkout_id = test_checkout.id', 'left')
                ->where('test_checkout.customer_id', $customer_id)
                ->where('test_product.is_subscription', false)
                ->where('test_product.is_upsell', false)
                ->where('test_refund.refund_id', null)
                ->get();
        if ($query->num_rows() > 0) {
            $val_return = true;
        }
        return $val_return;
    }

    function get_customer_info_by_uid($uid) {
        $obj_customer_info = null;

        $query = null;
        if (strlen($uid) > 17) {
            $query = $this->db->select('test_customer.id as customer_id, test_customer.email, test_customer.first_name')
                    ->from('test_customer')
                    ->join('test_checkout', 'test_customer.id = test_checkout.customer_id', 'left')
                    ->where('test_checkout.ch_order_id', $uid)
                    ->get();
        } else {
            $query = $this->db->select('test_customer.id as customer_id, test_customer.email, test_customer.first_name')
                    ->from('test_customer')
                    ->join('test_old_uid', 'test_customer.id = test_old_uid.customer_id', 'left')
                    ->where('test_old_uid.old_uid', $uid)
                    ->get();
        }
        $obj_customer_info = $query->row();
        return $obj_customer_info;
    }

    function insert($customer_id, $product_id, $ch_order_id, $recharge_parent_id = null) {

        if (!$ch_order_id && !$recharge_parent_id) {
            echo "Error: no ch_order_id and recharge_parent_id";
            return;
        }

        $this->db->set('customer_id', $customer_id)
                ->set('product_id', $product_id)
                ->set('ch_order_id', $ch_order_id)
                ->set('recharge_parent_id', $recharge_parent_id)
                ->insert('test_checkout');
        return $this->db->insert_id();
    }

    function get_last_purchased_product_id($customer_id, $is_upsell = false, $is_subscription = false) {
        $product_id = null;

        $query = $this->db->select('test_checkout.product_id')
                ->from('test_checkout')
                ->join('test_product', 'test_product.id = test_checkout.product_id', 'left')
                ->join('test_refund', 'test_refund.checkout_id = test_checkout.id', 'left')
                ->where('test_checkout.customer_id', $customer_id)
                ->where('test_product.is_upsell', $is_upsell)
                ->where('test_product.is_subscription', $is_subscription)
                ->where('test_refund.refund_id', null)
                ->order_by('test_checkout.create_time', 'DESC')
                ->limit(1)
                ->get();

        if ($row = $query->row()) {
            $product_id = $row['product_id'];
        }
        return $product_id;
    }

    function get_last_purchased_checkout_id($customer_id) {
        $val_return = null;

        $query = $this->db->select('test_checkout.id')
                ->from('test_checkout')
                ->join('test_refund', 'test_refund.checkout_id = test_checkout.id', 'left')
                ->where('test_checkout.customer_id', $customer_id)
                ->where('test_refund.refund_id', null)
                ->order_by('test_checkout.create_time', 'DESC')
                ->limit(1)
                ->get();

        if ($row = $query->row()) {
            $val_return = $row->id;
        }
        return $val_return;
    }

    function get_recharge_parent_id($customer_id, $product_id) {
        $recharge_parent_id = null;
        $query = $this->db->select('test_checkout.id')
                ->from('test_checkout')
                ->join('test_refund', 'test_refund.checkout_id = test_checkout.id', 'left')
                ->where('test_checkout.customer_id', $customer_id)
                ->where('test_checkout.product_id', $product_id)
                ->where('test_checkout.recharge_parent_id', null)
                ->where('test_refund.refund_id', null)
                ->order_by('test_checkout.create_time', 'DESC')
                ->limit(1)
                ->get();

        if ($row = $query->row()) {
            $recharge_parent_id = $row->id;
        }
        return $recharge_parent_id;
    }

    function get_number_of_prev_recharged($customer_id, $product_id) {
        $query = $this->db->select('test_checkout.id')
                ->from('test_checkout')
                ->join('test_refund', 'test_refund.checkout_id = test_checkout.id')
                ->where('test_checkout.customer_id', $customer_id)
                ->where('test_checkout.product_id', $product_id)
                ->where('test_checkout.recharge_parent_id IS NOT NULL')
                ->where('test_refund.refund_id', null)
                ->order_by('test_checkout.create_time', 'DESC')
                ->get();
        $number_of_prev_recharged = $query->num_rows();
        return $number_of_prev_recharged;
    }

    function get_last_ch_order_id_by_customer_id($customer_id) {
        $ch_order_id = null;
        $query = $this->db->select('ch_order_id')
                ->from('test_checkout')
                ->where('email', $customer_email)
                ->order_by('create_time', 'DESC')
                ->get();
        if ($row = $query->row()) {
            $ch_order_id = $row->ch_order_id;
        }
        return $ch_order_id;
    }

    function get_product_title_by_fs_display_name($display_name) {
        $product_title = null;
        if ($display_name == "custom-keto-meal-plan-1-month-auto-renew") {
            $product_title = "Custom Keto Meal Plan - 1 Month Auto Renew";
        } else if ($display_name == "custom-keto-meal-plan-upgrade-special-to-12-month-auto-renew") {
            $product_title = "Custom Keto Meal Plan - UPGRADE SPECIAL To 12 Month Auto Renew";
        } else if ($display_name == "custom-keto-meal-plan-upgrade-special-to-3-month-auto-renew") {
            $product_title = "Custom Keto Meal Plan - UPGRADE SPECIAL To 3 Month Auto Renew";
        }
        return $product_title;
    }

    public function update_create_time($customer_id, $create_time) {
        $checkout_id = $this->get_last_purchased_checkout_id($customer_id);
        if ($checkout_id) {
            $this->db->set('create_time', $create_time)
                    ->where('id', $checkout_id)
                    ->update('test_checkout');
        }
    }

}

?>