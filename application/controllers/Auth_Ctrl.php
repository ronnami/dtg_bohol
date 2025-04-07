<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth_Ctrl extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Auth_model');
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->library('upload');
        $this->load->library('session');

    }
    // private function check_log for session per user ni dapit
    private function check_log()
    {
        $user_id = $this->session->userdata("dgt_user");
        if (isset($user_id)) {
            $user = $this->Auth_model->get_user_by_user_id($user_id);
            if ($user && $user->role == 'Admin') {
                redirect('Admin_Ctrl/dashboard');
            } else {
                redirect('Admin_Ctrl/dashboard');
            }
        }
    }

    // login view
    public function Login_view()
    {
        $this->check_log("");
        $this->load->view('template/login_view');
    }


    // register user  
    public function register_view()
    {
        $this->check_log();
        $this->load->view('template/register_view');
    }

    public function process_register()
    {
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('role', 'Name', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('register_view');
        } else {
            $username = $this->input->post('username');

            $this->load->model('Auth_model');
            if ($this->Auth_model->check_existing_username($username)) {
                $this->session->set_flashdata('error', 'Username already exists. Choose another one.');
                redirect('Auth_Ctrl/register_view');
            } else {
                $data = array(
                    'name' => $this->input->post('name'),
                    'username' => $username,
                    'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                    'role' => $this->input->post('role'),
                );

                $insert = $this->Auth_model->register_user($data);

                if ($insert) {
                    $this->session->set_flashdata('success', 'Registration successful! You can now log in.');
                    redirect('Auth_Ctrl/register_view');
                } else {
                    $this->session->set_flashdata('error', 'Something went wrong. Try again.');
                    redirect('Auth_Ctrl/register_view');
                }
            }
        }
    }
    // end  register user  




    // login key
    public function login()
    {
        $username = $this->input->post('username', true);
        $password = $this->input->post('password', true);

        $user = $this->Auth_model->get_user_by_username($username);

        if ($user && password_verify($password, $user->password)) {
            $this->session->set_userdata('dgt_user', $user->id);
            $this->session->set_userdata('name', $user->name);
            $this->check_log();
        } else {
            $this->session->set_flashdata('error', 'Invalid username or password');
            redirect('Auth_Ctrl/login_view');
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('Auth_Ctrl/Login_view');
    }


    public function Settings()
    {
        $user_id = $this->session->userdata("dgt_user");
        if (!isset($user_id)) {
            redirect('Auth_Ctrl/Login_view');
            return;
        }
        $user = $this->Auth_model->get_user_by_user_id($user_id);

        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('template/settings', compact('user')); // Pass user data to view
        $this->load->view('template/footer');
    }


    public function change_password()
    {
        // Check if user is logged in
        $user_id = $this->session->userdata("dgt_user");
        if (!$user_id) {
            $this->session->set_flashdata('error', 'Unauthorized access.');
            redirect('login'); // Redirect to login page if user is not logged in
        }

        // Set validation rules
        $this->form_validation->set_rules('current_password', 'Old Password', 'required');
        $this->form_validation->set_rules('password', 'New Password', 'required|min_length[3]');
        $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|matches[password]');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', validation_errors());
            redirect('Auth_Ctrl/Settings'); // Redirect back to profile or password change page
        } else {
            $current_password = $this->input->post('current_password');
            $new_password = $this->input->post('password');

            // Get user details from database
            $user = $this->Auth_model->get_user_by_users_id($user_id);
            if (!$user) {
                $this->session->set_flashdata('error', 'User not found.');
                redirect('Auth_Ctrl/Settings');
            }

            // Verify old password
            if (!password_verify($current_password, $user->password)) {
                $this->session->set_flashdata('error', 'Old password is incorrect.');
                redirect('Auth_Ctrl/Settings');
            }

            // Hash new password
            $hashed_password = password_hash($new_password, PASSWORD_BCRYPT);

            // Update password in database
            $update_status = $this->Auth_model->update_password($user_id, $hashed_password);

            if ($update_status) {
                $this->session->set_flashdata('success', 'Password changed successfully.');
            } else {
                $this->session->set_flashdata('error', 'Failed to change password.');
            }

            redirect('Auth_Ctrl/Settings'); // Redirect to profile page
        }
    }







}
