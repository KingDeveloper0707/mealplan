<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Email_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        // Your own constructor code
    }

    public function get_all($only_sent = false) {
        if ($only_sent) {
            $arr_deleted_emails = array();
            $query_deleted_emails = $this->db->select('email_id')
                    ->from('mealplan_email_action')
                    ->where('customer_id', $this->session->userdata('customer_id'))
                    ->where('action', 2)
                    ->get();
            foreach ($query_deleted_emails->result() as $row) {
                array_push($arr_deleted_emails, $row->email_id);
            }

            $query = $this->db->select('mealplan_email.*, mealplan_email_action.action')
                    ->from('mealplan_email')
                    ->join('mealplan_email_action', 'mealplan_email.id = mealplan_email_action.email_id and mealplan_email_action.customer_id = ' . $this->session->userdata('customer_id'), 'left')
                    ->where('mealplan_email.send_time < NOW()')
                    ->where_not_in('mealplan_email.id', count($arr_deleted_emails) ? $arr_deleted_emails : NULL)
                    ->order_by('mealplan_email.create_time', 'DESC')
                    ->get();
        } else {
            $query = $this->db->order_by('create_time', 'DESC')->get('mealplan_email');
        }

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return array();
        }
    }

    public function get_by_id($id) {
        $query = $this->db->select('*')
                ->from('mealplan_email')
                ->where('id', $id)
                ->limit(1)
                ->get();

        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return null;
        }
    }

    public function update_email_manager($postData = null, $action = null) {
        if ($action == 'add') {
            $this->db->set('title', $postData['title'])
                    ->set('content', $postData['content'])
                    ->set('send_time', $postData['send_time'])
                    ->insert('mealplan_email');
        } else if ($action == 'edit') {
            $this->db->set('title', $postData['title'])
                    ->set('content', $postData['content'])
                    ->set('send_time', $postData['send_time'])
                    ->where('id', $postData['id'])
                    ->update('mealplan_email');
        } else if ($action == 'delete') {
            $this->db->where('id', $postData['id'])
                    ->delete('mealplan_email');
        }
    }

    public function add_email_action($customer_id, $email_id, $action = 1) {//action_1 : read, 2 : deleted
        $query = $this->db->select('id')
                ->from('mealplan_email_action')
                ->where('customer_id', $customer_id)
                ->where('email_id', $email_id)
                ->where('action', $action)
                ->get();
        if ($query->num_rows() == 0) {
            $this->db->set('customer_id', $customer_id)
                    ->set('email_id', $email_id)
                    ->set('action', $action)
                    ->insert('mealplan_email_action');
        }
    }

    public function get_unread_messages_num() {
        $query = $this->db->select('mealplan_email.id')
                ->from('mealplan_email')
//                ->join('mealplan_email_action', 'mealplan_email.id = mealplan_email_action.email_id')
                ->join('mealplan_email_action', 'mealplan_email.id = mealplan_email_action.email_id and mealplan_email_action.customer_id = ' . $this->session->userdata('customer_id'), 'left')
//                ->where('mealplan_email_action.customer_id', $this->session->userdata('customer_id'))
                ->where('mealplan_email.send_time < NOW()')
                ->where('mealplan_email_action.id IS NULL', null, false)
                ->get();       
       
        return $query->num_rows();
    }

}
