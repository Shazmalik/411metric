<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
if ( ! function_exists('admin_update_validation')){
        function admin_update_validation(){
            
        $CI =& get_instance();
        ////////////////form validation ///////////////////////
       
        $CI->load->helper(array('form', 'url','file'));
        $CI->load->library('form_validation');
        $CI->form_validation->set_rules('first_name','First Name','required');
        $CI->form_validation->set_rules('last_name','Last Name','required');
        $CI->form_validation->set_rules('email','Email','required');
        if($CI->form_validation->run() == FALSE){ 
            $data = array( 
                'first_name' => set_value('first_name'),
                'last_name' => set_value('last_name'),
                'email' => set_value('email'),
                'valid'=>0,
                'error_message' => validation_errors()
            );
            $CI->session->set_flashdata('error_message', "Field insertion error");
        }
        else{
            $data = array(
                'valid' => 1,
                'error_message' => "no validation error",
            );
        }
        $CI->session->set_flashdata('user_add_data', $data);

        return $data['valid'];
    }
}

if ( ! function_exists('admin_add_validation')){
        function admin_add_validation(){
            
        $CI =& get_instance();
        ////////////////form validation ///////////////////////
       
        $CI->load->helper(array('form', 'url','file')); 

        $CI->load->library('form_validation');
        $CI->form_validation->set_rules('first_name','First Name','required');
        $CI->form_validation->set_rules('last_name','Last Name','required');
        $CI->form_validation->set_rules('email','Email','required');
        
        if($CI->form_validation->run() == FALSE){ 
            $data = array( 
                'first_name' => set_value('first_name'),
                'last_name' => set_value('last_name'),
                'email' => set_value('email'),
                'valid'=>0,
                'error_message' => validation_errors()
            );
            $CI->session->set_flashdata('error_message', "Field insertion error");
        }
        else{
            $data = array(
                'valid' => 1,
                'error_message' => "no validation error",
            );
        }
        $CI->session->set_flashdata('user_add_data', $data);

        return $data['valid'];
    }
}
?>