<section>
    <div class="container" style="padding-top: 10%;padding-bottom: 10%">
    <div class="row">
        <div class="col-md-4 col-md-offset-4 well" style="color: black">
            <h1 class="text-center">Login</h1>
           <?php
            if(validation_errors() != false) {
              echo "<div id='errors'>" . validation_errors() . "</div>" ;
            }
           
          ?>
           
            <?php echo form_open('logincontroller/checkLogin'); ?>
           
             <div class="form-group">
                <label>Username</label>
               
                <input name="username" type="email" class="form-control" id="uname" placeholder="Enter user name">
              </div>
            
              <div class="form-group">
                <label>Password</label>
                
                <input name="password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
              </div>
            
                <button type="submit" class="btn btn-default">Submit</button>
                
                <div style="padding-top: 10px">
                <a href="<?php echo "regcontroller";?>">Not registered?</a>
                </div>
            </form>
        </div>
    </div>
</div>
</section>