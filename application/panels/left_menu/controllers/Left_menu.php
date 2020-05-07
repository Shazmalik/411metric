<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Left_menu extends MY_Controller {

	public function admin(){
		$page_name= $this->uri->segment(1);
		$function_name=$this->uri->segment(2);
		$data=array(
			"page_name"=>$page_name,
			"function_name"=>$function_name,
		);
		$this->load->view('admin_left_menu',$data);
	}
}
?>