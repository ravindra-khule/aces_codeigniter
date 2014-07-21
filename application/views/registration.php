<section >
    <div class="container" style="padding-top: 3%;">
    <div class="row">
        <div class="col-md-4 col-md-offset-4 well" style="color: black">
            <h1 class="text-center">Registration</h1>
           <?php
            if(validation_errors() != false) {
              echo "<div id='errors'>" . validation_errors() . "</div>" ;
            }
           ?>
           
            <?php echo form_open('regcontroller/register_user'); ?>
           
                
             <div class="form-group">
                <label>First Name</label>
               
                <input name="firstname" type="text" class="form-control" id="fname" placeholder="Enter first name">
              </div>
            
             <div class="form-group">
                <label>Last Name</label>
               
                <input name="lastname" type="text" class="form-control" id="lname" placeholder="Enter last name">
              </div>
             <div class="form-group">
                 
                 <label for="country">Select Country</label>
               
                 <select name="country"  class="form-control" id="country">
                     <option value="" selected="Select country">Select Country</option>
                     <option value="Indian" >Indian</option>
                     <option value="USA">USA</option>
                    <option value="China">China</option>
                    <option value="German">German</option>
                    <option value="Brazil" >Brazil</option>
                    
                </select>
                
              </div>
             <div class="form-group">
                <label>Enter email for Username</label>
               
                <input name="username" type="email" class="form-control" id="uname" placeholder="Enter email id">
              </div>
            
              <div class="form-group">
                <label>Password</label>
                
                <input name="password" type="password" class="form-control" id="exampleInputPassword1">
              </div>
            
            <div class="form-group">
                <label>Confirm Password</label>
                
                <input name="conf_password" type="password" class="form-control" id="exampleInputPassword1" >
              </div>
            
                       
                <button type="submit" class="btn btn-default">Submit</button>
            </form>
        </div>
    </div>
</div>
</section>