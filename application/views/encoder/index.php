
  <div id="empViewMyProfileDiv" class="col-lg-10 col-lg-offset-1">
    <legend>My Account <img id="editMyProfile" src="<?php echo base_url();?>assets\images\edit.png" alt="Edit Personal Profile" width="25" height="25" /></legend>

    <!-- PERSONAL INFORMATION -->
    <div class="panel panel-info">
      <div class="panel-heading"><h3 class="panel-title">Personal Information</h3></div>
      <div class="panel-body">
        <table class="tg">
          <tr>
            <td class="td-fields">Full Name</td>
            <td class="td-values"><?php echo $user->first_name;?> <?php echo $user->middle_name;?> <?php echo $user->last_name;?></td>
          </tr>
          <tr>
            <td class="td-fields">Date Of Birth</td>
            <td class="td-values"><?php echo $user->date_of_birth;?></td>
          </tr>
        </table>
      </div>
    </div>
    <!-- END PERSONAL INFORMATION -->

    <!-- CONTACT DETAILS -->
    <div class="panel panel-info">
      <div class="panel-heading"><h3 class="panel-title">Contact Details</h3></div>
      <div class="panel-body">
        <table class="tg">
          <tr>
            <td class="td-fields">Landline</td>
            <td class="td-values"><?php echo $user->landline;?></td>
          </tr>
          <tr>
            <td class="td-fields">Mobile</td>
            <td class="td-values"><?php echo $user->mobile;?></td>
          </tr>
          <tr>
            <td class="td-fields">Email</td>
            <td class="td-values"><?php echo $user->email;?></td>
          </tr>
        </table>
      </div>
    </div>
    <!-- END CONTACT DETAILS -->

    <!-- UPDATE MY PROFILE DIALOG -->
    <form class="form-horizontal" action="<?php echo base_url();?>index.php/encoder_controller/updateUser" method="POST">
    <fieldset>
      
    <div class="modal" id="dialog-edit-company-profile" >
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title">Update Contact Details</h4>
          </div>
          <div class="modal-body">
          <!--
          <div class="validateTips alert alert-dismissable alert-warning">
          <button type="button" class="close" data-dismiss="alert">×</button>
          <strong>Note : </strong> All form fields are required.</div><br/>-->
      
        <!-- PERSONAL INFORMATION
        <div class="panel panel-primary">
          <div class="panel-heading">
            <h3 class="panel-title">Personal Information</h3>
          </div>
          <div class="panel-body">
            <div class="form-group">
              <div class="col-lg-10">
                <label for="inputCompanyName" class="control-label">First Name</label>
                <input type="text" value="<?php echo $user->first_name; ?>" class="editbox form-control" name="iFirstName" size="20" disabled="<?php echo $user->first_name; ?>" />
              </div>
            </div>
            <div class="form-group">
              <div class="col-lg-10">
                <label for="inputCompanyName" class="control-label">Middle Name</label>
                <input type="text" value="<?php echo $user->middle_name; ?>" class="editbox form-control" name="iMiddleName" size="20"  disabled=""/>
              </div>
            </div>
            <div class="form-group">
              <div class="col-lg-10">
                <label for="inputCompanyName" class="control-label">Last Name</label>
                <input type="text" value="<?php echo $user->last_name; ?>" class="editbox form-control" name="iLastName" size="20"  disabled=""/>
              </div>
            </div>
            <div class="form-group">
              <div class="col-lg-10">
                <label for="inputCompanyName" class="control-label">Position</label>
                <input type="text" value="<?php echo $user->position; ?>" class="editbox form-control" name="iPosition" size="20"  disabled=""/>
              </div>
            </div>
            <div class="form-group">
              <div class="col-lg-10">
              <label for="inputDateOfBirth" class="control-label">Date Of Birth</label>
              <div class="input-group date">
                <input type="text" id="trigger-datepicker" name="iDateOfBirth" class="form-control" value="<?php echo $user->date_of_birth; ?>" disabled=""><span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
              </div>
              </div>
            </div>
          </div>
        </div>
         END PERSONAL INFORMATION -->

        <!-- CONTACT DETAILS -->
        <div class="panel panel-primary">
          <div class="panel-heading">
            <h3 class="panel-title"></h3>
          </div>
          <div class="panel-body">
            <div class="form-group">
            <div class="col-lg-10">
              <label for="inputCompanyName" class="control-label">Telephone Number</label>
              <input type="text" value="<?php echo $user->landline; ?>" class="editbox form-control" name="iLandline" size="20" />
              </div>
            </div>
            <div class="form-group">
            <div class="col-lg-10">
              <label for="inputCompanyName" class="control-label">Mobile Number</label>
              <input type="text" value="<?php echo $user->mobile; ?>" class="editbox form-control" name="iMobile" size="20" required />
              </div>
            </div>
            <div class="form-group">
            <div class="col-lg-10">
              <label for="inputCompanyName" class="control-label">Email</label>
              <input type="text" value="<?php echo $user->email; ?>" class="editbox form-control" name="iEmail" size="20" required />
              </div>
            </div>
          </div>
        </div>
        <!-- END CONTACT DETAILS -->

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Update</button>
          </div>
        </div>
      </div>
    </div>

    </fieldset>
    </form>
    <!-- END UPDATE COMPANY PROFILE DIALOG -->

 
</body>
</html>