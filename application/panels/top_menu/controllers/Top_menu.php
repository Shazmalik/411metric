<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Top_menu extends MY_Controller {
	
	public function admin(){
		$this->load->view('admin_top_menu');
	}
}
?>