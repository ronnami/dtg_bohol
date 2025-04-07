<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_model extends CI_Model
{

    public function insert_spot($data)
    {
        return $this->db->insert('spots_details', $data);
    }

    public function get_spots()
    {
        return $this->db->get('spots_details')->result_array();
    }
    public function delete_spot($id)
    {
        return $this->db->where('id', $id)->delete('spots_details');
    }




    public function update_spot($spot_id, $data)
    {
        $this->db->where('id', $spot_id);
        return $this->db->update('spots_details', $data);
    }


    public function get_spot_data_by_id($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('spots_details');

        if ($query->num_rows() > 0) {
            return $query->row_array();
        }
        return false;
    }

    public function insert_business($data)
    {
        return $this->db->insert('add_business', $data);
    }



    public function get_all_businesses()
    {
        return $this->db->get('add_business')->result_array();
    }
    public function get_business_by_id($id)
    {
        return $this->db->get_where('add_business', ['id' => $id])->row();
    }




    public function insert_team($data)
    {
        $this->db->insert('team', $data);
    }

    public function get_all_teams()
    {
        return $this->db->get('team')->result_array();
    }


    public function delete_team_member($member_id)
    {
        return $this->db->delete('team', ['id' => $member_id]);
    }


    public function get_spot_by_id($id)
    {
        return $this->db->where('id', $id)->get('spots_details')->row_array();
    }

    public function save_comment($data)
    {
        return $this->db->insert('feedback', $data);
    }

    public function get_comments_by_spot_id($spot_id)
    {
        $this->db->select('f.*, u.name, u.photo'); // Fetch user name and photo
        $this->db->from('feedback f');
        $this->db->join('users u', 'u.id = f.user_id', 'left'); // Join with users table
        $this->db->where('f.spot_id', $spot_id);
        $this->db->order_by('f.created_at', 'DESC');

        return $this->db->get()->result_array();
    }




    public function get_spot_by_spot($id)
    {
        $query = $this->db->get_where('spots_details', array('id' => $id));
        return $query->row_array();
    }

    public function update_spot_by($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update('spots_details', $data);
    }


    public function add_your_business($data)
    {
        $this->db->insert('business_table', $data);
    }

    public function get_businesses()
    {
        $query = $this->db->get('business_table');
        return $query->result();
    }

    public function get_business_id($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('business_table');
        return $query->row();
    }

    public function update_business($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update('business_table', $data);
    }

    public function get_spot()
    {
        $query = $this->db->get('spots_details');
        return $query->result_array(); // Return results as an array
    }

    public function get_filtered_businesses()
    {
        $this->db->where('status !=', 'pending'); // Exclude 'pending' status
        $this->db->where('status !=', NULL);      // Exclude NULL status
        $this->db->where('status !=', '');        // Exclude empty string status
        $query = $this->db->get('business_table'); // Fetch data from 'business_table'
        return $query->result(); // Return the result as an array of objects
    }

    public function get_businesses_for_print($filters)
    {
        $this->db->where('status !=', NULL);
        $this->db->where('status !=', ''); // Exclude businesses with empty or null status

        // Apply filters to the query if they are present
        if (!empty($filters['business_name'])) {
            $this->db->like('business_name', $filters['business_name']);
        }

        if (!empty($filters['municipality'])) {
            $this->db->where('municipality', $filters['municipality']);
        }

        if (!empty($filters['barangay'])) {
            $this->db->where('barangay', $filters['barangay']);
        }

        if (!empty($filters['status'])) {
            $this->db->where('status', $filters['status']);
        }

        $query = $this->db->get('business_table');
        return $query->result();
    }


    public function get_hidden_gem_spots()
    {
        $this->db->select('*');
        $this->db->from('spots_details');
        $this->db->where('hidden_gem', "Yes, it's a hidden gem");
        $query = $this->db->get();
        return $query->result();
    }
    public function get_hidden_gem_spots_print()
    {
        $this->db->where('hidden_gem', "Yes, it's a hidden gem");
        $query = $this->db->get('spots_details');
        return $query->result_array();
    }

    public function get_users_by_role($role = NULL)
    {
        if ($role) {
            $this->db->where('role', $role);
        }

        $this->db->select('name, username, role');
        $query = $this->db->get('users');
        return $query->result_array();
    }

    public function get_all_spots_details()
    {
        $query = $this->db->get('spots_details');
        return $query->result();
    }
    public function get_filtered_spots($municipality = null)
    {
        $this->db->select('*');
        $this->db->from('spots_details');

        if ($municipality) {
            $this->db->where('municipality', $municipality);
        }

        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_spots_data($municipality = null)
    {
        $this->db->select('*');
        $this->db->from('spots_details');

        // Apply municipality filter if it's set
        if ($municipality) {
            $this->db->where('municipality', $municipality);
        }

        $query = $this->db->get();
        return $query->result();
    }







}