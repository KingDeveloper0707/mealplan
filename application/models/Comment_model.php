<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Comment_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        // Your own constructor code
    }

    public function get_comment($id) {
        $query = $this->db->select('id, name, email, comment, create_time, approved')
                ->from('comment')
                ->where('id', $id)
                ->limit(1)
                ->get();

        return $query->row();
    }

    public function get_comment_all() {
        $query = $this->db->select('id, email, name, comment, parent_id, approved, create_time')
                ->from('comment')
                ->order_by('create_time', 'DESC')
                ->get();

        return $query->result();
    }

    public function get_comment_like_all() {
        $query = $this->db->select('comment_id,  COUNT(comment_id) as total_count')
                ->from('comment_like')
                ->group_by('comment_id')
                ->get();

        return $query->result();
    }

    public function save_comment($email, $name, $comment, $parent_id) {
        $this->db->set('email', $email)
                ->set('name', $name)
                ->set('comment', $comment)
                ->set('parent_id', $parent_id);
        $result = $this->db->insert('comment');
        // $insert_id = $this->insert_id();
        if ($result) {
            echo "true";
        } else {
            echo "false";
        }
    }

    public function updateComment($postData = null, $action = null) {
        if ($action == 'add') {
            $this->db->set('name', $postData['name'])
                    ->set('email', $postData['email'])
                    ->set('comment', $postData['comment'])
                    ->set('approved', $postData['approved'])
                    ->set('parent_id', $postData['parent_id'])
                    ->insert('comment');
        } else if ($action == 'edit') {
            $this->db->set('name', $postData['name'])
                    ->set('email', $postData['email'])
                    ->set('comment', $postData['comment'])
                    ->set('approved', $postData['approved'])
                    ->where('id', $postData['id'])
                    ->update('comment');
        } else if ($action == 'delete') {
            $this->db->where('id', $postData['id'])
                    ->delete('comment');
        }
    }

    private function like_counts($comment_id) {
        $query = $this->db->select('id')
                ->from('comment_like')
                ->where('comment_id', $comment_id)
                ->get();

        $like_count = $query->num_rows();
        if ($query->num_rows() == 0) {
            return $like_count;
        } else {
            return $like_count;
        }
    }

    public function save_like_count($comment_id, $uid) {

        $query = $this->db->select('id')
                ->from('comment_like')
                ->where('comment_id', $comment_id)
                ->where('uid', $uid)
                ->get();


        if ($query->result()) {
            return "";
        } else {
            $this->db->set('uid', $uid)
                    ->set('comment_id', $comment_id);
            $result = $this->db->insert('comment_like');

            if ($result) {
                return $this->like_counts($comment_id);
            } else {
                return "";
            }
        }
    }

}
