<?php 

	class Site extends CI_Controller{
		
			public function index(){
				
					$this->load->view("header");
                                        $this->load->view("navbar");
					$this->load->view("carousel_view");
					$this->load->view("home_view");
					$this->load->view("about_view");
					$this->load->view("services_view");
					$this->load->view("contact_view");
					$this->load->view("footer");

				}
                       
				
		}

?>