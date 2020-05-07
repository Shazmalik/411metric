<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Footer extends MY_Controller {

	public function homepage(){
		$this->load->view('homepage_footer');
	}
}
