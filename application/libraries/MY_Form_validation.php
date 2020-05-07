<?php if (!defined('BASEPATH')) exit('No direct script access allowed.');
class MY_Form_validation extends CI_Form_validation {

public function __construct() {
    parent::__construct();
  }
  
  public function check_edit_email($str){
      $CI =& get_instance();
      $userid=Null;
      
      $CI->load->model('users_content/users_content_model');
      $email=$CI->input->post('email');
      $id=$CI->input->post('user_id');
      
      $count_email=$CI->users_content_model->check_edit_email($email,$id);
      
      if ($count_email){ 
          $this->set_message('check_edit_email', 'Please use Unique Email Address');
          return false;
      }
      return True;
      
  }
  
  
   public function check_unique_email_user_in_system_on_update(){
    $CI =& get_instance();
    $CI->load->model('profile_setting_content/profile_setting_content_model');
    $email=$CI->input->post('email');
    $count_result=$CI->Profile_setting_content_model->check_unique_email_in_system($email);
    if ($count_result >= 1){
      $this->set_message('check_unique_email_user_in_system_on_update', 'Email Already Exist in database Enter Valid Email.');
      return false;
    }
    return True;
  }
   
	
  public function check_unique_user_name($str){
  
  	$CI =& get_instance();
  	$userid=Null;
  
  	$CI->load->model('users_content/users_content_model');
  	$username=$CI->input->post('username');
  
  	$count_user_name=$CI->users_content_model->check_unique_user_name($username);
  
  	if ($count_user_name > 0){
  		$this->set_message('check_unique_user_name', 'Please use Unique User Name.');
  		return false;
  	}
  	return True;
  
  }
  
	public function check_unique_email_in_system(){
		$CI =& get_instance();
		$CI->load->model('signup_content/signup_content_model');
		$email=$CI->input->post('email');		
		$count_result=$CI->signup_content_model->checkuniqueemailinsystem($email);
		if ($count_result > 0){
  		$this->set_message('check_unique_email_in_system', 'Please use Unique And valid Email.');
  		return false;
	  	}
	  	return True;
	}
	public function check_unique_edit_user_email(){
		$CI =& get_instance();
		$CI->load->model('users_content/users_content_model');
		$email=$CI->input->post('email');		
		$user_id=$CI->input->post('user_id');		
		$count_result=$CI->users_content_model->checkuniqueemailinsystem($email,$user_id);
		if ($count_result > 0){
  		$this->set_message('check_unique_edit_user_email', 'Please use Unique Username.');
  		return false;
	  	}
	  	return True;
	}
  
    public function check_password_match(){
      $CI =& get_instance();
      $password = hash('sha256',$CI->input->post('password'));
      $confirm_password = hash('sha256',$CI->input->post('confirm_password'));

      $count=0;
      if($password != $confirm_password){
        $count = 1;
      }
      if ($count){
          $this->set_message('check_password_match','Enter Valid Password.');
          return false;
      }
      return True;
    }

    public function check_company_name_in_system(){
      $CI =& get_instance();
      $CI->load->model('company_details_content/company_details_content_model');
      $company_name=$CI->input->post('company_name');    
      $count_result=$CI->company_details_content_model->checkuniquecompanyinsystem($company_name);
      if ($count_result > 1){
        $this->set_message('check_company_name_in_system', 'Please use Unique Company Name.');
        return false;
        }
        return True;
    }

    public function check_campaign_name_in_system(){
      $CI =& get_instance();
      $CI->load->model('campaign_details_content/campaign_details_content_model');
      $campaign_name=$CI->input->post('campaign_name'); 
      $count_result=$CI->campaign_details_content_model->checkuniquecampaigninsystem($campaign_name); 
      if ($count_result >= 1){
        $this->set_message('check_campaign_name_in_system', 'Please use Unique Campaign Name.');
        return false;
        }
        return True;
    }
    
}//class ends
?>
