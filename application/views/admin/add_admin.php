<div class='col-lg-10 col-lg-offset-1'>

<legend>Add Admin</legend><br>

<form action="<?php echo base_url();?>index.php/administrator_controller/addAdmin" method="post" 
      class="form-horizontal" accept-charset="utf-8" onSubmit="return confirm('Are you sure?')">
      <fieldset>

      <div class="panel panel-info">
        <div class="panel-heading">
          <h3 class="panel-title">Basic Info</h3>
        </div>
        <div class="panel-body">
                 <!--<div class="form-group">
                        <label for="administrator_id" class="col-lg-2 control-label">Administrator ID: </label>
                  <div class="col-lg-3">    
                        <input type="text" name="administratorID" value="" id="administratorID" class="form-control input-sm" required />
                  </div>
                </div>-->

                 <div class="form-group">
                  <label for="first_name" class="col-lg-2 control-label">First Name:</label>
                  <div class="col-lg-3">
                  <input type="text" name="first_name" value="" id="first_name" class="form-control input-sm" required />
                   </div>
                </div>

                  <div class="form-group">     
                  <label for="last_name" class="col-lg-2 control-label">Last Name:</label>            <div class="col-lg-3">
        
                  <input type="text" name="last_name" value="" id="last_name"  class="form-control input-sm"required />    
                   </div>
                </div>

                  <div class="form-group">   
                  <label for="middle_name" class="col-lg-2 control-label">Middle Name:</label>            <div class="col-lg-3">

                  <input type="text" name="middle_name" value="" id="middle_name" class="form-control input-sm" required />
                  </div>
                </div>

                 <div class="form-group">
                  <label for="position" class="col-lg-2 control-label">Position:</label>            <div class="col-lg-3">

                  <input type="text" name="position" value="" id="position" class="form-control input-sm" required/>     
                   </div>
                </div>


                 <div class="form-group">
                  <label for="landline" class="col-lg-2 control-label">Phone:</label>            <div class="col-lg-3">

                  <input type="text" name="landline" value="" id="landline" class="form-control input-sm"  required/>    
                  </div>
                </div>      

                 <div class="form-group">
                  <label for="mobile" class="col-lg-2 control-label">Mobile:</label>            <div class="col-lg-3">

                  <input type="text" name="mobile" value="" id="mobile" class="form-control input-sm" />
                  </div>
                </div> 
       </div>
      </div>

      <div class="panel panel-info">
        <div class="panel-heading">
          <h3 class="panel-title">Account info</h3>
        </div>
        <div class="panel-body">
           <div class="form-group">
            <label for="email" class="col-lg-2 control-label">Email:</label>            <div class="col-lg-3">

            <input type="text" name="email" value="" id="email" class="form-control input-sm"  required/>   
            </div>
          </div>

           <div class="form-group">
            <label for="username" class="col-lg-2 control-label">Username:</label>            <div class="col-lg-3">

            <input type="text" name="username" value="" id="username" class="form-control input-sm" required/>
            </div>
          </div>

           <div class="form-group">
            <label for="password" class="col-lg-2 control-label">Password:</label>            <div class="col-lg-3">

            <input type="text" name="password" value="" id="password" class="form-control input-sm" required/>
            </div>
          </div>

           <div class="form-group">
            <label for="password_confirm" class="col-lg-2 control-label">Confirm Password:</label>            <div class="col-lg-3">

            <input type="text" name="password_confirm" value="" id="password_confirm" class="form-control input-sm" required/>
            </div>
          </div>
       </div>
      </div>

           <div class="form-group">
            <label for="password_confirm" class="col-lg-2 control-label"></label>            
            <div class="col-lg-3">
                  <input type="submit" name="submit"  class="btn btn-primary" value="Add Admin"  />
                  <input type="button" name="submit"  class="btn btn-default" value="Cancel" />            
            </div>
          </div>

      
  
</fieldset>
</form>

</div>
