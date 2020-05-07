
<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Header extends MY_Controller {

	public function login_header(){
		$data['error_message']=$this->session->flashdata('error_message');
		$data['success_message']=$this->session->flashdata('success_message');
		$data['user_add_data']=$this->session->flashdata('user_add_data');
      $this->load->view("login_header_content",$data);
	}

	public function admin_header(){
		$data['error_message']=$this->session->flashdata('error_message');
		$data['success_message']=$this->session->flashdata('success_message');
		$data['user_add_data']=$this->session->flashdata('user_add_data');
       $this->load->view("admin_header_content",$data);
	}
}?>
