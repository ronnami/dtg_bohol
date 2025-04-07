<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth_model extends CI_Model
{

    public function register_user($data)
    {
        return $this->db->insert('users', $data);
    }

    public function check_existing_username($username, $id = null)
    {
        $this->db->where('username', $username);

        // Exclude current user from the check during update
        if ($id !== null) {
            $this->db->where('id !=', $id);
        }

        $query = $this->db->get('users');
        return $query->num_rows() > 0;
    }



    public function insert_user($data)
    {
        return $this->db->insert('users', $data);
    }

    public function check_duplicate_username($username)
    {
        $this->db->where('username', $username);
        $query = $this->db->get('users');

        return $query->num_rows() > 0;
    }
    // Fetch all users
    public function get_users()
    {
        return $this->db->get('users')->result_array();
    }

    // Get user by ID
    public function get_user_by_id($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('users');
        return $query->num_rows() > 0 ? $query->row_array() : false;
    }

    // Update user
    public function update_user($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update('users', $data);
    }

    public function delete_user($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('users');
    }


    public function get_all_users()
    {
        return $this->db->get('users')->result_array();
    }

    public function get_user($username)
    {
        $this->db->where('username', $username);
        $query = $this->db->get('users'); 
        return $query->row_array(); 
    }

    public function get_user_by_username($username)
    {
        $this->db->where('username', $username);
        $query = $this->db->get('users');
        return $query->row(); 
    }

    public function get_user_by_user_id($user_id)
    {
        $this->db->where('id', $user_id);
        $query = $this->db->get('users');
        return $query->row();
    }



    public function add_like($user_id)
    {
        $data = [
            'user_id' => $user_id,
            'created_at' => date('Y-m-d H:i:s')
        ];
        $this->db->insert('likes', $data);
    }

    // Get total like count
    public function get_like_count()
    {
        return $this->db->count_all('likes');
    }

    // Add feedback
    public function add_feedback($user_id, $rating, $comment)
    {
        $data = [
            'user_id' => $user_id,
            'rating' => $rating,
            'comment' => $comment,
            'created_at' => date('Y-m-d H:i:s')
        ];
        $this->db->insert('feedback', $data);
    }

    // Get all feedback with user names
    public function get_all_feedback()
    {
        $this->db->select('f.comment, f.rating, u.name, f.created_at');
        $this->db->from('feedback f');
        $this->db->join('users u', 'f.user_id = u.id', 'left');
        $this->db->order_by('f.id', 'DESC');
        return $this->db->get()->result_array();
    }


    public function get_user_by_users_id($user_id)
    {
        return $this->db->where('id', $user_id)->get('users')->row();
    }

    public function update_password($user_id, $new_password)
    {
        $this->db->set('password', $new_password);
        $this->db->where('id', $user_id);
        return $this->db->update('users');
    }


}