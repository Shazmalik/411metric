<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//
class MY_Controller extends MX_Controller {
    
  
    public function  __construct(){   
        parent::__construct();
    }

    public function checklogin()
    {
          if(!$this->session->userdata('user_logged'))
        {
            redirect('admin'); 
        }
    }
    
    protected function no_cache(){
		header("Expires: Thu, 19 Nov 1981 08:52:00 GMT");     
		header('Cache-Control: no-store, no-cache, must-revalidate');
		header('Cache-Control: post-check=0, pre-check=0',false);
		header('Pragma: no-cache'); 
	}
}

