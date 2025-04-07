<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_Ctrl extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Auth_model');
        $this->load->model('Admin_model');
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->library('upload');
        $this->load->library('session');
        $this->load->helper('url');

    }

    //private session per user 
    private function check_log($user_select = [])
    {
        $user_id = $this->session->userdata("dgt_user");
        log_message('debug', 'Session user ID: ' . $user_id);

        if (isset($user_id)) {
            $user = $this->Auth_model->get_user_by_user_id($user_id);

            if (!$user) {
                log_message('error', 'User not found in database.');
                $this->session->unset_userdata('dgt_user');
                redirect('Auth_ctrl/login_view');
            }

            log_message('debug', 'User role: ' . $user->role);

            $user_types_allow = ["Admin", "Municipal Tourism Officer", "Department Of Tourism", "Tourist", "Business Owner"];

            if (!in_array($user->role, $user_types_allow)) {
                log_message('error', 'Unauthorized access attempt by: ' . $user->role);
                $this->session->unset_userdata('dgt_user');
                redirect('Auth_ctrl/login_view');
            }

            // If the user is a "Tourist" or "Business Owner", redirect them to Admin_Ctrl/images
            if ($user->role === "Tourist" || $user->role === "Business Owner") {
                redirect('Admin_Ctrl/images');
            }

            $user_select = (array) $user_select;

            if (!empty($user_select) && $user->role !== "Admin") {
                if (!in_array($user->role, $user_select)) {
                    log_message('error', 'User role not allowed: ' . $user->role);
                    redirect('Admin_Ctrl/dashboard');
                }
            }
        } else {
            log_message('error', 'No session user ID found.');
            redirect('Auth_ctrl/login_view');
        }
    }






    // dashboard
    public function dashboard()
    {
        $this->check_log();
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('template/dashboard');
        $this->load->view('template/footer');

    }

    // add user list ni sija
    public function Admin()
    {
        $user_id = $this->session->userdata("dgt_user");
        if (!isset($user_id)) {
            redirect('Auth_Ctrl/Login_view');
            return;
        }

        $data['users'] = $this->Auth_model->get_users();
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('Admin/admin', $data);
        $this->load->view('template/footer');
    }

    public function View_details($id)
    {
        $data['spot'] = $this->Admin_model->get_spot_by_id($id);

        if (empty($data['spot'])) {
            show_404();
        }

        $data['comments'] = $this->Admin_model->get_comments_by_spot_id($id);
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('dtg_view/view_details', $data);
        $this->load->view('template/footer');
    }

    public function team()
    {
        $user_id = $this->session->userdata("dgt_user");
        if (!isset($user_id)) {
            redirect('Auth_Ctrl/Login_view');
            return;
        }
        $data['team_members'] = $this->Admin_model->get_all_teams();
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('template/team', $data);
        $this->load->view('template/footer');

    }



    public function Images()
    {
        $user_id = $this->session->userdata("dgt_user");
        if (!isset($user_id)) {
            redirect('Auth_Ctrl/Login_view');
            return;
        }

        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('dtg_view/images');
        $this->load->view('template/footer');
    }

    public function User_views()
    {
        $data['spots'] = $this->Admin_model->get_spot();
        $this->load->view('template/user_template/user_header');
        $this->load->view('template/user_template/user_sidebar', $data);
        $this->load->view('template/user_template/user_footer');

    }
    public function tourist()
    {

        $data['spots'] = $this->Admin_model->get_spot();
        $this->load->view('tourist/sidebar', $data);
    }

    public function User_details_view($id)
    {
        $data['spot'] = $this->Admin_model->get_spot_by_id($id);

        if (empty($data['spot'])) {
            show_404();
        }

        $data['comments'] = $this->Admin_model->get_comments_by_spot_id($id);
        $this->load->view('template/user_template/user_header');
        // $this->load->view('template/user_template/user_sidebar');
        $this->load->view('template/user_template/user_views', $data);
        $this->load->view('template/user_template/user_footer');
    }



    public function Business()
    {
        $user_id = $this->session->userdata("dgt_user");
        if (!isset($user_id)) {
            redirect('Auth_Ctrl/Login_view');
            return;
        }
        $data['businesses'] = $this->Admin_model->get_filtered_businesses(); // Get filtered businesses
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('dtg_view/business', $data);
        $this->load->view('template/footer');
    }


    public function View_business()
    {
        $user_id = $this->session->userdata("dgt_user");
        if (!isset($user_id)) {
            redirect('Auth_Ctrl/Login_view');
            return;
        }


        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('dtg_view/view_business');
        $this->load->view('template/footer');
    }

    public function dtg_upload()
    {
        $user_id = $this->session->userdata("dgt_user");
        if (!isset($user_id)) {
            redirect('Auth_Ctrl/Login_view');
            return;
        }


        $data['spots'] = $this->Admin_model->get_spots();

        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('dtg_view/dtg_upload', $data);
        $this->load->view('template/footer');
    }

    public function add_business()
    {
        $data['businesses'] = $this->Admin_model->get_businesses();


        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('dtg_view/add_business', $data);
        $this->load->view('template/footer');
    }

    public function addUser()
    {
        $upload_path = './assets/image/';

        if (!is_dir($upload_path)) {
            mkdir($upload_path, 0777, true);
        }

        $photo = '';
        if (!empty($_FILES['userPhoto']['name'])) {
            $config['upload_path'] = $upload_path;
            $config['allowed_types'] = '*';
            $config['max_size'] = 10240;
            $config['file_name'] = time() . '_' . $_FILES['userPhoto']['name'];

            $this->upload->initialize($config);

            if ($this->upload->do_upload('userPhoto')) {
                $photo = 'assets/image/' . $this->upload->data('file_name');
            } else {
                echo json_encode(['status' => 'error', 'message' => $this->upload->display_errors()]);
                return;
            }
        }

        $username = $this->input->post('username');

        if ($this->Auth_model->check_duplicate_username($username)) {
            echo json_encode(['status' => 'error', 'message' => 'Username already exists!']);
            return;
        }

        $data = [
            'name' => $this->input->post('name'),
            'username' => $username,
            'password' => password_hash('143', PASSWORD_BCRYPT), // ag password 143
            'role' => $this->input->post('role'),
            'photo' => $photo
        ];

        $inserted = $this->Auth_model->insert_user($data);

        if ($inserted) {
            echo json_encode(['status' => 'success', 'message' => 'User added successfully!']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Failed to add user.']);
        }
    }

    // end add user list 

    public function get_user_by_id()
    {
        $id = $this->input->post('id');
        $user = $this->Auth_model->get_user_by_id($id);

        if ($user) {
            echo json_encode(['status' => 'success', 'data' => $user]);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'User not found']);
        }
    }

    public function delete_users()
    {
        $id = $this->input->post('id');
        if ($id) {
            $this->db->where('id', $id);
            if ($this->db->delete('users')) {
                echo json_encode(['status' => 'success']);
            } else {
                echo json_encode(['status' => 'error']);
            }
        } else {
            echo json_encode(['status' => 'error']);
        }
    }



    // Update user details
    public function update_user()
    {
        $id = $this->input->post('id');

        $user = $this->Auth_model->get_user_by_id($id);
        if (!$user) {
            echo json_encode(['status' => 'error', 'message' => 'User not found']);
            return;
        }

        $username = $this->input->post('username');

        if ($this->Auth_model->check_existing_username($username, $id)) {
            echo json_encode(['status' => 'error', 'message' => 'Username already exists']);
            return;
        }

        $data = [
            'name' => $this->input->post('name'),
            'username' => $username,
            'role' => $this->input->post('role')
        ];

        if (!empty($_FILES['photo']['name'])) {
            $config['upload_path'] = './assets/images/';
            $config['allowed_types'] = '*';
            $config['max_size'] = 10240;
            $config['file_name'] = time() . '_' . $_FILES['photo']['name'];

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('photo')) {
                $uploadData = $this->upload->data();
                $data['photo'] = 'uploads/users/' . $uploadData['file_name'];
            } else {
                echo json_encode(['status' => 'error', 'message' => $this->upload->display_errors()]);
                return;
            }
        }

        if ($this->Auth_model->update_user($id, $data)) {
            echo json_encode(['status' => 'success', 'message' => 'User updated successfully!']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Failed to update user.']);
        }
    }



    // Like a post
    public function like()
    {
        $user_id = $this->session->userdata("dgt_user");

        if (!$user_id) {
            echo json_encode(['status' => 'error', 'message' => 'User not logged in']);
            return;
        }

        $this->Auth_model->add_like($user_id);
        $like_count = $this->Auth_model->get_like_count();
        echo json_encode(['status' => 'success', 'like_count' => $like_count]);
    }

    // Get total like count
    public function get_like_count()
    {
        $like_count = $this->Auth_model->get_like_count();
        echo json_encode(['like_count' => $like_count]);
    }

    public function feedback()
    {
        $user_id = $this->session->userdata("dgt_user");
        $rating = $this->input->post('rating');
        $comment = $this->input->post('comment');

        if (!$user_id || !$rating) {
            echo json_encode(['status' => 'error', 'message' => 'Invalid data']);
            return;
        }

        $this->Auth_model->add_feedback($user_id, $rating, $comment);
        $feedbacks = $this->Auth_model->get_all_feedback();

        echo json_encode(['status' => 'success', 'message' => 'Feedback submitted successfully', 'feedbacks' => $feedbacks]);
    }

    public function get_feedbacks()
    {
        $feedbacks = $this->Auth_model->get_all_feedback();
        echo json_encode(['feedbacks' => $feedbacks]);
    }



    public function add_team()
    {
        $this->form_validation->set_rules('team_name', 'Team Name', 'required');
        $this->form_validation->set_rules('full_name', 'Full Name', 'required');
        $this->form_validation->set_rules('position', 'Position', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('add_team_view');
        } else {
            $config['upload_path'] = './assets/images/';
            $config['allowed_types'] = '*';
            $config['max_size'] = 20480;
            $this->upload->initialize($config);

            if ($this->upload->do_upload('photo')) {
                $file_data = $this->upload->data();
                $photo_path = 'assets/images/' . $file_data['file_name'];
            } else {
                $photo_path = NULL;
            }

            $data = array(
                'team_name' => $this->input->post('team_name'),
                'full_name' => $this->input->post('full_name'),
                'position' => $this->input->post('position'),
                'photo' => $photo_path
            );

            $this->Admin_model->insert_team($data);

            $this->session->set_flashdata('success', 'Team member added successfully!');

            redirect('Admin_Ctrl/team');
        }
    }

    public function delete_team_member()
    {
        $member_id = $this->input->post('id');

        if (!$member_id) {
            echo json_encode(['success' => false, 'message' => 'Invalid member ID']);
            return;
        }

        $result = $this->Admin_model->delete_team_member($member_id);

        if ($result) {
            echo json_encode(['success' => true]);
        } else {
            echo json_encode(['success' => false, 'message' => 'Failed to delete member']);
        }
    }







    public function update()
    {
        $id = $this->input->post('id'); // Get the ID from the form
        if (!$id) {
            echo json_encode(['status' => 'error', 'message' => 'ID is missing']);
            return;
        }

        // Collecting data from the form
        $data = [
            'title' => $this->input->post('title'),
            'details' => $this->input->post('details'),
            'municipality' => $this->input->post('municipality'),
            'barangay' => $this->input->post('barangay'),
            'street' => $this->input->post('street'),
            'category' => $this->input->post('category'),
            'entry' => $this->input->post('entry'),
            'contact' => $this->input->post('contact'),
            'opening_hrs' => $this->input->post('opening_hrs'),
            'links_web' => $this->input->post('links_web'),
            'latitude' => $this->input->post('latitude'),
            'longitude' => $this->input->post('longitude'),
            'hidden_gem' => $this->input->post('hidden_gem'),
            'others' => $this->input->post('others'),
            'link_map' => $this->input->post('link_map')
        ];

        // Update the spot in the database
        $update = $this->Admin_model->update_spot($id, $data);

        // Check the result and respond accordingly
        if ($update) {
            echo json_encode(['status' => 'success']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Failed to update spot.']);
        }
    }












    public function add_comment()
    {
        $user_id = $this->session->userdata("dgt_user");
        if (!isset($user_id)) {
            redirect('Auth_Ctrl/Login_view');
            return;
        }

        $spot_id = $this->input->post('spot_id');
        $comment = $this->input->post('comment');
        $rating = $this->input->post('rating');

        $data = [
            'user_id' => $user_id,
            'spot_id' => $spot_id,
            'comment' => $comment,
            'rating' => $rating,
        ];

        $this->Admin_model->save_comment($data);

        // Set SweetAlert success message
        $this->session->set_flashdata('success', 'Your comment has been posted successfully!');

        redirect('Admin_ctrl/View_details/' . $spot_id);
    }


    public function fetch_spot_data()
    {
        $id = $this->input->post('id');
        $spot_data = $this->Admin_model->get_spot_data_by_id($id);

        if ($spot_data) {
            echo json_encode($spot_data);
        } else {
            echo json_encode(['status' => 'error']);
        }
    }


    public function Delete_details($id)
    {
        if (!is_numeric($id)) {
            $this->session->set_flashdata('error', 'Invalid spot ID.');
            redirect('Admin_Ctrl/dtg_upload');
        }

        $this->db->trans_start();

        $this->db->where('spot_id', $id);
        $this->db->delete('feedback');

        $this->db->where('id', $id);
        $this->db->delete('spots_details');

        $this->db->trans_complete();

        if ($this->db->trans_status() === FALSE) {
            $this->session->set_flashdata('error', 'Failed to delete the spot and associated feedback.');
        } else {
            $this->session->set_flashdata('success', 'Spot and associated feedback deleted successfully.');
        }

        redirect('Admin_Ctrl/dtg_upload');
    }




    public function add_spot_details()
    {
        $upload_path = './assets/image/';

        if (!is_dir($upload_path)) {
            mkdir($upload_path, 0777, true);
        }

        $photo = '';
        if (!empty($_FILES['photo']['name'])) {
            $config['upload_path'] = $upload_path;
            $config['allowed_types'] = '*';
            $config['max_size'] = 10240;
            $config['file_name'] = time() . '_' . $_FILES['photo']['name'];

            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            if ($this->upload->do_upload('photo')) {
                $photo = 'assets/image/' . $this->upload->data('file_name');
            } else {
                echo json_encode(['status' => 'error', 'message' => strip_tags($this->upload->display_errors())]);
                return;
            }
        }


        $entry = $this->input->post('entry');
        $custom_entry = $this->input->post('custom_entry');

        if ($entry === 'Custom' && !empty($custom_entry)) {
            $entry = $custom_entry;
        }

        $street = $this->input->post('street');
        $custom_street = $this->input->post('custom_street');

        if ($street === 'Others' && !empty($custom_street)) {
            $street = $custom_street;
        }

        $category = $this->input->post('category');
        $custom_category = $this->input->post('custom_category');

        if ($category === 'Other_category' && !empty($custom_category)) {
            $category = $custom_category;
        }

        $title = $this->input->post('title');
        $custom_name = $this->input->post('custom_name');

        if ($title === 'Other_name' && !empty($custom_name)) {
            $title = $custom_name;
        }
        $data = [
            'photo' => $photo,
            'title' => $title,
            'details' => $this->input->post('details'),
            'municipality' => $this->input->post('municipality'),
            'barangay' => $this->input->post('barangay'),
            'street' => $street,
            'contact' => $this->input->post('contact'),
            'category' => $category,
            'entry' => $entry,
            'opening_hrs' => $this->input->post('opening_hrs'),
            'others' => $this->input->post('others'),
            'links_web' => $this->input->post('links_web'),
            'latitude' => $this->input->post('latitude'),
            'longitude' => $this->input->post('longitude'),
            'hidden_gem' => $this->input->post('hidden_gem'),
            'link_map' => $this->input->post('link_map')


        ];

        $insert = $this->Admin_model->insert_spot($data);

        if ($insert) {
            echo json_encode(['status' => 'success', 'message' => 'Details added successfully!']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Failed to add details.']);
        }
    }



    public function update_spot()
    {
        $spot_id = $this->input->post('id');
        $title = $this->input->post('title');
        $details = $this->input->post('details');
        $municipality = $this->input->post('municipality');
        $barangay = $this->input->post('barangay');
        $street = $this->input->post('street');
        $contact = $this->input->post('contact');
        $category = $this->input->post('category');
        $entry = $this->input->post('entry');
        $opening_hrs = $this->input->post('opening_hrs');
        $others = $this->input->post('others');
        $links_web = $this->input->post('links_web');
        $latitude = $this->input->post('latitude');
        $longitude = $this->input->post('longitude');
        $link_map = $this->input->post('link_map');
        $hidden_gem = $this->input->post('hidden_gem');
        // $existing_photo = $this->input->post('existing_photo');

        // $upload_path = './assets/image/';
        // $photo = $existing_photo;

        // if (!empty($_FILES['photo']['name'])) {
        //     $config['upload_path'] = $upload_path;
        //     $config['allowed_types'] = '*';
        //     $config['max_size'] = 10240;
        //     $config['file_name'] = time() . '_' . $_FILES['photo']['name'];

        //     $this->load->library('upload', $config);
        //     $this->upload->initialize($config);

        //     if ($this->upload->do_upload('photo')) {
        //         $uploadData = $this->upload->data();
        //         $photo = 'assets/image/' . $uploadData['file_name'];

        //         if (!empty($existing_photo) && file_exists($existing_photo)) {
        //             unlink($existing_photo);
        //         }
        //     } else {
        //         echo json_encode(['status' => 'error', 'message' => strip_tags($this->upload->display_errors())]);
        //         return;
        //     }
        // }

        $data = [
            'title' => $title,
            'details' => $details,
            'municipality' => $municipality,
            'barangay' => $barangay,
            'street' => $street,
            'contact' => $contact,
            'category' => $category,
            'entry' => $entry,
            'opening_hrs' => $opening_hrs,
            'others' => $others,
            'links_web' => $links_web,
            'latitude' => $latitude,
            'longitude' => $longitude,
            'link_map' => $link_map,
            'hidden_gem' => $hidden_gem,
            // 'photo' => $photo
        ];

        $this->Admin_model->update_spot($spot_id, $data);

        // Set a flashdata message for success
        $this->session->set_flashdata('success_message', 'Spot updated successfully!');

        redirect('Admin_Ctrl/dtg_upload');
    }









    public function insert()
    {
        $this->form_validation->set_rules('business_name', 'Business Name', 'required');
        $this->form_validation->set_rules('business_desc', 'Business Description', 'required');
        $this->form_validation->set_rules('category', 'Category', 'required');

        if ($this->form_validation->run() == TRUE) {
            if ($_FILES['photo']['name']) {
                $config['upload_path'] = './assets/image/';
                $config['allowed_types'] = '*';
                $config['max_size'] = 20480;
                $config['file_name'] = time() . '_' . $_FILES['photo']['name'];

                $this->upload->initialize($config);

                if ($this->upload->do_upload('photo')) {
                    $upload_data = $this->upload->data();
                    $photo_path = 'assets/image/' . $upload_data['file_name'];
                } else {
                    $photo_path = '';
                    $this->session->set_flashdata('error', $this->upload->display_errors());
                    redirect('Admin_Ctrl/Business');
                }
            } else {
                $photo_path = '';
            }

            $entry_fee = $this->input->post('entry_fee');
            $entry_fee_json = (!empty($entry_fee)) ? json_encode($entry_fee) : null;

            $data = [
                'business_name' => $this->input->post('business_name'),
                'business_desc' => $this->input->post('business_desc'),
                'category' => $this->input->post('category'),
                'municipality' => $this->input->post('municipality'),
                'barangay' => $this->input->post('barangay'),
                'street' => $this->input->post('street'),
                'contact_no' => $this->input->post('contact_no'),
                'website' => $this->input->post('website'),
                'facebook_link' => $this->input->post('facebook_link'),
                'instagram_link' => $this->input->post('instagram_link'),
                'opening_hours' => $this->input->post('opening_hours'),
                'entry_fee' => $entry_fee_json,
                'photo' => $photo_path
            ];

            if ($this->Admin_model->insert_business($data)) {
                $this->session->set_flashdata('success', 'Business added successfully!');
            } else {
                $this->session->set_flashdata('error', 'Failed to add business.');
            }
        } else {
            $this->session->set_flashdata('error', 'Please fill in all required fields.');
        }

        redirect('Admin_Ctrl/Business');
    }


    public function add_your_business()
    {
        $upload_path = 'assets/images/';
        $config = [
            'upload_path' => $upload_path,
            'allowed_types' => '*',
            'max_size' => 20480,
            'encrypt_name' => TRUE
        ];

        $this->upload->initialize($config);
        if (!empty($_FILES['mayors_permit']['name'])) {
            if (!$this->upload->do_upload('mayors_permit')) {
                $mayors_permit = NULL;
                $error = $this->upload->display_errors();
            } else {
                $mayors_permit = $this->upload->data('file_name');
            }
        } else {
            $mayors_permit = NULL;
        }

        $photos = [];
        if (!empty($_FILES['photos']['name'][0])) {
            foreach ($_FILES['photos']['name'] as $key => $image) {
                $_FILES['file']['name'] = $_FILES['photos']['name'][$key];
                $_FILES['file']['type'] = $_FILES['photos']['type'][$key];
                $_FILES['file']['tmp_name'] = $_FILES['photos']['tmp_name'][$key];
                $_FILES['file']['error'] = $_FILES['photos']['error'][$key];
                $_FILES['file']['size'] = $_FILES['photos']['size'][$key];

                if ($this->upload->do_upload('file')) {
                    $photos[] = $this->upload->data('file_name');
                }
            }
        }

        $data = array(
            'business_name' => $this->input->post('business_name'),
            'business_type' => $this->input->post('business_type'),
            'description' => $this->input->post('description'),
            'municipality' => $this->input->post('municipality'),
            'barangay' => $this->input->post('barangay'),
            'street' => $this->input->post('street'),
            'contact_info' => $this->input->post('contact_info'),
            'opening_day' => $this->input->post('opening_day'),
            'close_day' => $this->input->post('close_day'),
            'opening_hours' => $this->input->post('opening_hours'),
            'close_hours' => $this->input->post('close_hours'),
            'social_media_links' => $this->input->post('social_media_links'),
            'website_url' => $this->input->post('website_url'),
            'pricing' => $this->input->post('pricing'),
            'mayors_permit' => $mayors_permit,
            'photos' => implode(',', $photos)
        );

        $this->Admin_model->add_your_business($data);

        redirect('Admin_Ctrl/add_business');
    }

    public function approve_business()
    {
        $business_id = $this->input->post('id');

        if ($business_id) {
            $this->db->where('id', $business_id);
            $this->db->update('business_table', ['status' => 'Done']);

            echo json_encode(['status' => 'success']);
        } else {
            echo json_encode(['status' => 'error']);
        }
    }


    public function update_business()
    {
        $id = $this->input->post('id');
        $business_data = array(
            'business_name' => $this->input->post('business_name'),
            'business_type' => $this->input->post('business_type'),
            'description' => $this->input->post('description'),
            'municipality' => $this->input->post('municipality'),
            'barangay' => $this->input->post('barangay'),
            'street' => $this->input->post('street'),
            'contact_info' => $this->input->post('contact_info'),
            'opening_day' => $this->input->post('opening_day'),
            'close_day' => $this->input->post('close_day'),
            'opening_hours' => $this->input->post('opening_hours'),
            'close_hours' => $this->input->post('close_hours'),
            'social_media_links' => $this->input->post('social_media_links'),
            'website_url' => $this->input->post('website_url'),
            'pricing' => $this->input->post('pricing')
        );

        $this->Admin_model->update_business($id, $business_data);

        $this->session->set_flashdata('success', 'Business updated successfully.');
        redirect('Admin_Ctrl/add_business'); // Adjust as needed
    }

    public function user_side_bar()
    {

        $this->load->view("template/user_timplate");
    }


    public function about_us()
    {

        $this->check_log();
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('template/about');
        $this->load->view('template/footer');
    }

    public function business_reports()
    {

        $user_id = $this->session->userdata("dgt_user");
        if (!isset($user_id)) {
            redirect('Auth_Ctrl/Login_view');
            return;
        }
        $data['businesses'] = $this->Admin_model->get_filtered_businesses(); // Get filtered businesses
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('reports/business_reports', $data);
        $this->load->view('template/footer');
    }

    public function get_businesses_print()
    {
        $filters = $this->input->post(); // Retrieve filters from POST data
        $data['businesses'] = $this->Admin_model->get_businesses_for_print($filters);

        echo json_encode(['data' => $data['businesses']]);
    }

    public function Hidden_gem_reports()
    {

        $user_id = $this->session->userdata("dgt_user");
        if (!isset($user_id)) {
            redirect('Auth_Ctrl/Login_view');
            return;
        }
        $data['spots'] = $this->Admin_model->get_hidden_gem_spots();

        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('reports/hidden_gem_reports', $data);
        $this->load->view('template/footer');
    }

    public function get_hidden_gem_print()
    {

        $data = $this->Admin_model->get_hidden_gem_spots_print();

        if (empty($data)) {
            echo json_encode(['data' => []]);
        } else {
            echo json_encode(['data' => $data]);
        }
    }

    public function User_list_reports()
    {

        $user_id = $this->session->userdata("dgt_user");
        if (!isset($user_id)) {
            redirect('Auth_Ctrl/Login_view');
            return;
        }
        $data['users'] = $this->Auth_model->get_users();

        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('reports/user_list_reports', $data);
        $this->load->view('template/footer');
    }

    public function get_user_report()
    {
        $role = $this->input->post('role');
        $users = $this->Admin_model->get_users_by_role($role);

        if ($users) {
            echo json_encode(['data' => $users]);
        } else {
            echo json_encode(['data' => []]);
        }
    }


    public function municipality_spots_reports()
    {

        $user_id = $this->session->userdata("dgt_user");
        if (!isset($user_id)) {
            redirect('Auth_Ctrl/Login_view');
            return;
        }
        $data['residents'] = $this->Admin_model->get_all_spots_details();
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('reports/municipality_spots_reports', $data);
        $this->load->view('template/footer');
    }

    public function get_spots_report()
    {
        $municipality = $this->input->post('municipality'); // Get the selected municipality

        // Fetch all spots if no municipality is selected
        $data = $this->Admin_model->get_filtered_spots($municipality); // Fetch filtered data based on municipality or all if null

        echo json_encode(['data' => $data]);
    }


    public function fetch_spots_data()
    {
        $municipality = $this->input->get('municipality');  // Get the selected municipality

        // Pass the municipality filter to the model
        $data = $this->Admin_model->get_spots_data($municipality);

        echo json_encode($data);
    }


}
