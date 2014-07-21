<?php

    class Regcontroller extends CI_Controller{
        
        public function _construct(){
            
            parent::__construct();
            $this->load->model('model_users');
        }

        public function index(){
            
            $this->load->view('header');
             $this->load->view('registration');
        }
        
        public function register_user(){
            
            $this->form_validation->set_rules('firstname','First Name','trim|required|min_length[3]|max_length[14]|');
            $this->form_validation->set_rules('lastname','Last Name','trim|required|min_length[3]|max_length[14]|');
            $this->form_validation->set_rules('country','Country','required');
            $this->form_validation->set_rules('username','Email Address','trim|valid_email|required|min_length[3]|max_length[29]|is_unique[users.username]');
            $this->form_validation->set_rules('password','Password','trim|required|matches[conf_password]');
            $this->form_validation->set_rules('conf_password','Password Confirmation','trim|required');
            
            if($this->form_validation->run()==FALSE)
            {
                $this->load->view('header');
                $this->load->view('registration');
            }
            else
            {
                $this->load->model('model_users');
                
                $result=$this->model_users->insert_users();
                
                if($result){
                    $this->load->view('regsuccess',array("firstname"=>$result));
                }
                else {
                    echo 'sorry there is problem with registration';
                }
            }
        }
        
        public function validate_email($email_address,$email_code){
            
            $email_code=trim($email_code);
            
            $validated=$this->model_users->validate_email($email_address,$email_code);
            
            if($validated===true)
            {
                $this->load->view('email_activated',array('email_address'=>$email_address));
                
            }
            else{
                echo 'error giving email activated confirmation .please contact'.$this->config->item('admin_email');
            }
            
            
        }
    }


?>