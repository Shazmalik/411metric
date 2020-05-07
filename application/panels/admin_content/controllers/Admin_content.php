<?php
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Admin_content extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        // $this->checklogin();
    }

    public function admins_user_view()
    {
        $this->load->model('Admin_content_model');
        $this->load->library("pagination");
        $offset = ($this->uri->segment(3) != '' ? $this->uri->segment(3) : 1);
        $per_page = 10;
        $totalUser = $this->Admin_content_model->get_all_user_count();
        $url = $this->config->base_url() . "admin/view";
        $pagination_detail = $this->pagination->pagination($totalUser, $per_page, $offset, $url);
        $data['paginglinks'] = $pagination_detail['paginationLinks'];
        $data['pagermessage'] = $pagination_detail['paginationMessage'];
        $data['total'] = $totalUser;
        $data['all_user'] = $this->Admin_content_model->get_all_user($offset, $per_page);
        $dayQuery = $this->db->query("SELECT DAYNAME(created_at) as y, COUNT(id) as a  FROM users WHERE date(created_at) > DATE_SUB(NOW(), INTERVAL 1 WEEK) AND MONTH(created_at) = '" . date('m') . "' AND YEAR(created_at) = '" . date('Y') . "' GROUP BY DAYNAME(created_at)");

        $record = $dayQuery->result();

        $data['day_wise'] = json_encode($record);
        // var_dump($data['day_wise']);exit;
        $this->load->view('admins_view_content', $data);
    }

    public function user_delete()
    {
        $this->load->model('Admin_content_model');
        $userid = $this->input->get('id');
        $data = $this->Admin_content_model->user_delete($userid);
        if ($data) {
            $this->session->set_flashdata('success_message', 'Entry Deleted Successfully.');
            header("Location:" . $this->config->base_url() . "admin/display");
            exit;
        } else {
            $this->session->set_flashdata('error_message', 'Entry Not Deleted Successfully.');
            header("Location:" . $this->config->base_url() . "admin/display");
            exit;
        }
    }
    public function user_login()
    {
        $this->load->model('Admin_content_model');

        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $checkdata = $this->Admin_content_model->checklogin($username, $password);

        if (!empty($checkdata)) {
            var_dump($checkdata);
            $userinfo = array(
                'username' => $checkdata->username,
                'uid' => $checkdata->id,
                'user_logged' => true,
            );

            $this->session->set_userdata($userinfo);

            redirect('admin/display');

        } else {
            $this->session->set_flashdata('error_message', "Something wrong.Please try again.");
            header("Location:" . $_SERVER['HTTP_REFERER']);
            $this->load->view('login');
        }
    }

    public function logout() {

		$this->session->sess_destroy();
		redirect('admin', 'refresh');
        $this->load->view('login');
	}

    public function admins_user_edit()
    {
        $this->load->model('Admin_content_model');
        $this->load->helper('admin_content/admin_content');
        $user_id = $this->input->get('id');
        $check = $this->Admin_content_model->get_user_data_by_id($user_id);
        if ($check == false) {
            header("Location:" . $this->config->base_url() . "admin/display");
            exit;
        } else {
            $data['result'] = $this->Admin_content_model->get_user_data_by_id($user_id);
            $this->load->view('admins_update_content', $data);
        }
    }

    public function admin_user_add()
    {
        $this->load->view('admins_add_content');
    }

    public function admin_create_user_submit()
    {
        $this->load->model('Admin_content_model');
        $this->load->helper('admin_content/admin_content');
        $validation = admin_add_validation();
        if ($validation) {
            $result = $this->Admin_content_model->insert_user_data();
            if ($result) {
                $this->session->set_flashdata('success_message', 'Added Successfully.');
                header("Location:" . $this->config->base_url() . "admin/display");
                exit;
            } else {
                $this->session->set_flashdata('error_message', 'Entry Not Added Successfully.');
                header("Location:" . $_SERVER['HTTP_REFERER']);
                exit;
            }
        } else {
            header("Location:" . $_SERVER['HTTP_REFERER']);exit;
        }
    }
    public function admin_entry_update()
    {

        $this->load->model('Admin_content_model');
        $this->load->helper('admin_content/admin_content');
        $validation = admin_update_validation();
        if ($validation) {
            $result = $this->Admin_content_model->update_user_entry();
            if ($result) {
                $this->session->set_flashdata('success_message', 'Updated Successfully.');
                header("Location:" . $this->config->base_url() . "admin/display");
                exit;
            } else {
                $this->session->set_flashdata('error_message', 'Not Updated Successfully.');
                header("Location:" . $_SERVER['HTTP_REFERER']);
                exit;
            }
        } else {
            $this->session->set_flashdata('error_message', "Something wrong.Please try again.");
            header("Location:" . $_SERVER['HTTP_REFERER']);
            exit;
        }
    }
}
