<?php /**
 * Description of uploader
 *
 * @author Rana
 */
class Fileuploader {
    var $config;
    public function __construct() {
        $this->ci =& get_instance();
    }
    

public function do_upload($folder,$file_name,$file_index_name,$type = null){
    		
		if($type == "resume"){
			$type = 'doc|docx|pdf|csv';
		}
		else
		{
			$type = 'jpeg|jpg|png|gif|tif';
		}
		
		
    	$this->ci->load->library('upload');
		$new_file_name= time().rand(100,999);
		$exploded=explode(".", $file_name);
		$fileExt = array_pop($exploded);
		$filewext=time()."-".$new_file_name;
		$new_convert_file_name = $filewext.".".$fileExt;
		
		$this->config = array(
			 'upload_path'=>dirname($_SERVER["SCRIPT_FILENAME"])."/uploads"."/".$folder."/",
			 'upload_url'=>"http://".$_SERVER['HTTP_HOST']."/uploads"."/".$folder,
			 'allowed_types'=>$type,
			 'overwrite'=>FALSE,
			 'file_name'=>$new_convert_file_name,	
			 'file_post_name'=>$file_index_name,
			 'max_size' => '3072'	
		);  
			
		 $this->ci->upload->initialize($this->config);
	   	 $this->ci->data['status'] = new stdClass;
		
		 $response = array();
		
		if($this->ci->upload->do_upload($this->config['file_post_name']))
		{
			$response['status'] = "Success";	
			$response['message'] = "File Uploaded Successfully"; 
			$uploaded_file = $this->ci->upload->data();
			$response['file_name'] = $uploaded_file['file_name']; 
			$response['file_ext'] = str_replace(".", "", $uploaded_file['file_ext']); 
			$response['client_name'] = $uploaded_file['client_name'];
			$response['upload_path']=$this->config['upload_path']; 
			$this->ci->upload->initialize($this->config);
			$file =$this->config['upload_path'].$this->config['file_name'];
			chmod($file,0777);
		}else{
				
			$response['status'] ="Failure";	
			$response['message'] = $this->ci->upload->display_errors();;	
		}	
			
		return $response;
    }
}
?>