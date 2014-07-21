<?php

class Loginmodel extends CI_Controller{
    public function login($name,$pass){
        
        $this->db->select('name','pass');
        $this->db->from('members');
        $this->db->where('name',$name);
        $this->db->where('pass',$pass);
        
        $query=  $this->db->get();
        
        if($query->num_rows()==1)
        {
            $this->session->set_userdata('username', $name);
            return true;
        }
        else
        {
            return false;
        }
    }
}
