<?php
class Admin_content_model extends MY_Model {
	public function __construct() {
		parent::__construct();
	}

	public function checklogin($username, $password)
    {
         if(!empty ($username) && !empty($password)){
			$query = $this -> db
           -> select('*')
		   -> where('username', $username)
		   -> where('password', $password)
           -> limit(1)
           -> get('user_login');

			if($query->num_rows() > 0){
				$row = $query->row();
                    return  $row;  
            }else{
                $this->session->set_flashdata('error_message', "Something wrong.Please try again.");
            	header("Location:" . $_SERVER['HTTP_REFERER']);
            exit;
            }
        }
        else{
            return NULL;
        }
	}

 	public function get_user_data_by_id($userid){
		$result = $this->findOneBy(array(
			"id" => $userid
		),'users');
		if($result){
			return $result;
		}else{
			return false;
		}
	}
	
	public function insert_user_data(){
		$insert_option=array(
			'first_name'=>$this->input->post('first_name'),  
			'last_name'=>$this->input->post('last_name'),  
			'email'=>$this->input->post('email'),  
			'created_at'=>date('Y-m-d H:i:s')
			);
		$result_inserted=$this->insert($insert_option,'users');
		return $result_inserted;

	}
 	public function get_all_user($offsets,$limit){
 		$params=array(
			'select'=>"*",
			'from'=> "users",
			"order_by" =>"id desc",
			"page" => $offsets,
        	"limit" => $limit,
			);	
		$result=$this->find($params);
		if($result){
        	return $result;
    	}else{	
			return false;
	    }
 	}

 	public function user_delete($userid) {
		$result=$this->delete("id = '".$userid."'","users");
		return $result;
	}

 	public function get_all_user_count(){
		$where="";
 		$result = $this->count($where,"users");
 		if($result) {
 			return $result;
 		}else{
 			return false;
 		}
 	}
 	
 	public function update_user_entry(){
 		$user_id=$this->input->post('user_id');
 		$userid=$this->custom_escape($user_id);
 		$update=array(
   			'first_name'=>$this->input->post('first_name'),
   			'last_name'=>$this->input->post('last_name'),
   			'email'=>$this->input->post('email'),
   			'updated_at'=>date('Y-m-d H:i:s')
			);
	 	$where = "id = $userid";
	 	$result=$this->update($update,$where,"users");
		if($result) {
 			return $result;
 		}else{
 			return false;
 		}
 	}
	
}

 	

