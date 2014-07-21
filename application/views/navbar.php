<nav class="navbar navbar-inverse navbar-fixed-top navbar-font-property" role="navigation">
  <div class="container">
   
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
	
	<a class="navbar-brand"  href="#"><img  style="margin-top: -20px;" width="120%" src="logo/aces2.png" class="logo"></a>
      
    </div>
      <div class="text-right">
          <p> 
            <?php 
            if($this->session->userdata['username'])
            {
            echo "Welcome ".$this->session->userdata['username'];
            } 
          ?>
          </p>
      </div>
 
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      
     		
      <ul class="nav navbar-nav pull-right">
        	
       		<li><a href="#" class="scroll-link" data-id="home">Home</a></li>
                <li><a href="#" class="scroll-link" data-id="about">About</a></li>
                <li><a href="#" class="scroll-link" data-id="services">Services</a></li>
                <li><a href="#" class="scroll-link" data-id="contact">Contact</a> </li>
                <li style="padding-right: 10px;"><a href="<?php echo 'logincontroller';  ?>"  data-id="#"><strong>Logout</strong></a></li>
                
      </ul>
    </div>
	
  </div>
	
</nav>

<div class="clearfix"></div>