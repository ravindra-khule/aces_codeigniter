<?php
class Logincontroller extends CI_Controller{
    
    public function index() {
                            $this->session->unset_userdata('username');
                            $this->load->view('header');
                            $this->load->view('login');
                          
       
        
    }
    public function checkLogin() {
        $this->form_validation->set_rules('username','Username','required|valid_email');
        $this->form_validation->set_rules('password','Password','required|callback_verifyUser');
        
        if($this->form_validation->run()==FALSE){
           
             $this->load->view('login');
        
        }
        else {
            redirect('site');
           
        }
    }
    public function verifyUser(){
        $name=$this->input->post('username');
        $pass=$this->input->post('password');
        
        $this->load->model('loginmodel');
       
        if($this->loginmodel->login($name,$pass)){
            return true;
        }
        else {
            $this->form_validation->set_message('verifyUser','Incorrect email or password Please Try again');
            
            return false;
        }
        
    }
    
}
