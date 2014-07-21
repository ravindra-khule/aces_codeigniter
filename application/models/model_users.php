<?php

class Model_users extends CI_Model{
    
    private $email_code;


    public function insert_users(){
        
        $firstname=  $this->input->post('firstname');
        $lastname=  $this->input->post('lastname');
        $country=  $this->input->post('country');
        $username=  $this->input->post('username');
        $password= sha1($this->input->post('password'));
        
        
        $this->db->set('firstname', $firstname);
        $this->db->set('lastname', $lastname);
        $this->db->set('country', $country);
        $this->db->set('name', $username);
        $this->db->set('pass', $password);
        $this->db->insert('members'); 
        
         if($this->db->affected_rows()===1)
         {
             $this->set_session($firstname,$lastname,$country,$username);
             
             $this->send_validation_email();
             
            
             
             return $firstname;
         }
         else{
             
             return FALSE;
         }
        
        
        
    }
    public function set_session($firstname,$lastname,$country,$username){
        
        $sql="SELECT id,reg_time FROM members WHERE  name='".$username."' LIMIT 1";
        $result=$this->db->query($sql);
        $row=$result->row();
        
        $session_data=array(
            
            "id"=>$row->id,
            "firstname"=>$firstname,
            "lastname"=>$lastname,
            "country"=>$country,
            "username"=>$username,
            "loged_in"=>0
        );
        
        $this->email_code= md5((string)$row->reg_time);
        
        $this->session->set_userdata($session_data);
        
    }
    private function send_validation_email(){
        
        
//           $config = Array(
//			  'protocol' => 'smtp',
//			  'smtp_host' => 'ssl://smtp.googlemail.com',
//			  'smtp_port' => 465,
//			  'smtp_user' => 'ravikhule1990@gmail.com', // change it to yours
//			  'smtp_pass' => 'shreyash123', // change it to yours
//			  'charset' => 'iso-8859-1',
//			  'wordwrap' => TRUE
//		);
        
        $this->load->library('email');
        $email=$this->session->userdata('username');
        $email_code=  $this->email_code;
        
        $this->email->set_mailtype('html');
        $this->email->from($this->config->item('ravi_email'),'ravindra khule');
        $this->email->to('ravickhule1990@gmail.com');
        $this->email->subject('please activate your account on aces webtech');
         
        $message='<!doctype html> <head></head><body>';
        
        $message .='<p> Dear ' .$this->session->userdata('firstname').',</p>';
       
        $message .='Thanks for registered with aces webtech please <strong><a href="'.base_url().'regcontroller/validate_email/'.$email.'/'.$email_code.'">click here</a></strong> '
                . 'to activate your account. After you have activated your account , you will be able to login on '
                . 'aces webtech';
        $message .='<p>Thank you</p>';
        $message .='<p>The team at aces webtech</p>';
        $message .='</body></html>';
        
        $this->email->message($message);
        $this->email->send();
        echo $this->email->print_debugger();
                
               
        
    }
    
    public function validate_email($email_address,$email_code){
        
        $sql='SELECT username,reg_time,firstname FROM members WHERE username="{$email_address}" LIMIT 1';
        $result=  $this->db->query($sql);
        $row=$result->row();
        
        if($result->num_rows()===1&&$row->firstname)
        {
            if(md5((string)$row->reg_time)===$email_code)
            {
                $result=  $this->activate_account($email_address);
            }
            else {
                $result=FALSE;
            }
            if($result=== TRUE)
            {
                return true;
            }
            
        }
    }
    public function activate_account($email_address){
        $sql='UPDATE members SET activated=1 WHERE username="'.$email_address.'"';
        $this->db->query($sql);
        if($this->db->affected_rows()===1)
        {
            return TRUE;
            
        }
        else{
            echo 'Error when activating your account in database .please contact'.$this->config->item('admin_email');
            return FALSE;
        }        
    }
    
    
}
?>