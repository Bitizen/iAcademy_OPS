<!doctype html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <title>iAcademy Online Placement System</title>
  
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
  <link rel="stylesheet" href="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/themes/smoothness/jquery-ui.css" />
  <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/jquery-ui.min.js"></script>

  <script type="text/javascript" src="<?php echo base_url();?>assets/js/default.js"></script>
  <link rel="stylesheet" href="<?php echo base_url();?>assets/css/style.css" type="text/css" media="all"/>
  
  <link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet">
  <script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
</head>
<body>


<!-- NAVIGATION BAR -->
<div class="navbar navbar-default">
  <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand" href="#">iACADEMY Online Placement System</a>
  </div>
  <div class="navbar-collapse collapse navbar-responsive-collapse">
    <ul class="nav navbar-nav">
            
      <li class="dropdown">
        <a href="<?php echo base_url();?>index.php/admincontroller/index" class="dropdown-toggle" data-toggle="dropdown">Admin <b class="caret"></b></a>
        <ul class="dropdown-menu">
          <li><a href="#">View Users</a></li>
          <li class="divider"></li>
          <li class="dropdown-header">Manage Users</li>
          <li><a href="#">Add User</a></li>
          <li><a href="#">Update User</a></li>
          <li><a href="#">Disable User</a></li>
        </ul>
      </li>
      <li class="active"><a href="#">My Account</a></li>
      <li><a href="<?php echo base_url();?>index.php/employer_controller/viewEmployer">Employer</a></li>
      <li><a href="#">Alumni</a></li>
      <li><a href="#">Interns</a></li>
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Careers <b class="caret"></b></a>
        <ul class="dropdown-menu">
          <li><a href="#">View Careers</a></li>
          <li class="divider"></li>
          <li class="dropdown-header">Manage Careers</li>
          <li><a href="#">Add Job Opening</a></li>
          <li><a href="#">Update Job Opening</a></li>
          <li><a href="#">Remove Job Opening</a></li>
        </ul>
      </li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="<?php echo base_url();?>index.php/auth/logout">[<?php echo $this->ion_auth->user()->row()->username; ?>]Logout</a></li>
    </ul>
  </div>
</div>
<!-- END NAVIGATION BAR -->

  <div id="empViewMyProfileDiv">
    <legend>My Account <img id="editMyProfile" src="<?php echo base_url();?>assets\images\edit.png" alt="Edit Company Profile" width="25" height="25" /></legend>

    <!-- PERSONAL INFORMATION -->
    <div class="panel panel-info">
      <div class="panel-heading"><h3 class="panel-title">Personal Information</h3></div>
      <div class="panel-body">
        <table class="tg">
          <tr>
            <td class="td-fields">Full Name</td>
            <td class="td-values"><?php echo $myRepresentative->first_name;?> <?php echo $myRepresentative->middle_name;?> <?php echo $myRepresentative->last_name;?></td>
          </tr>
          <tr>
            <td class="td-fields">Position</td>
            <td class="td-values"><?php echo $myRepresentative->position;?></td>
          </tr>
          <tr>
            <td class="td-fields">Date Of Birth</td>
            <td class="td-values"><?php echo $myRepresentative->date_of_birth;?></td>
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
            <td class="td-values"><?php echo $myRepresentative->landline;?></td>
          </tr>
          <tr>
            <td class="td-fields">Mobile</td>
            <td class="td-values"><?php echo $myRepresentative->mobile;?></td>
          </tr>
          <tr>
            <td class="td-fields">Email</td>
            <td class="td-values"><?php echo $myRepresentative->email;?></td>
          </tr>
        </table>
      </div>
    </div>
    <!-- END CONTACT DETAILS -->

    <!-- UPDATE MY PROFILE DIALOG -->
    <form class="form-horizontal" action="<?php echo base_url();?>index.php/employer_controller/updateRepresentative" method="POST">
    <fieldset>
      
    <div class="modal" id="dialog-edit-company-profile" >
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title">Profile Editor</h4>
          </div>
          <div class="modal-body">
          <div class="validateTips alert alert-dismissable alert-warning">
          <button type="button" class="close" data-dismiss="alert">×</button>
          <strong>Note : </strong> All form fields are required.</div><br/>
      
        <!-- PERSONAL INFORMATION -->
        <div class="panel panel-primary">
          <div class="panel-heading">
            <h3 class="panel-title">Personal Information</h3>
          </div>
          <div class="panel-body">
            <div class="form-group">
              <div class="col-lg-10">
                <label for="inputCompanyName" class="control-label">First Name</label>
                <input type="text" value="<?php echo $myRepresentative->first_name; ?>" class="editbox form-control" name="iFirstName" size="20" />
              </div>
            </div>
            <div class="form-group">
              <div class="col-lg-10">
                <label for="inputCompanyName" class="control-label">Middle Name</label>
                <input type="text" value="<?php echo $myRepresentative->middle_name; ?>" class="editbox form-control" name="iMiddleName" size="20" />
              </div>
            </div>
            <div class="form-group">
              <div class="col-lg-10">
                <label for="inputCompanyName" class="control-label">Last Name</label>
                <input type="text" value="<?php echo $myRepresentative->last_name; ?>" class="editbox form-control" name="iLastName" size="20" />
              </div>
            </div>
            <div class="form-group">
              <div class="col-lg-10">
                <label for="inputCompanyName" class="control-label">Position</label>
                <input type="text" value="<?php echo $myRepresentative->position; ?>" class="editbox form-control" name="iPosition" size="20" />
              </div>
            </div>
            <div class="form-group">
              <div class="col-lg-10">
              <label for="inputDateOfBirth" class="control-label">Date Of Birth</label>
              <div class="input-group date">
                <input type="text" id="trigger-datepicker" name="iDateOfBirth" class="form-control" value="<?php echo $myRepresentative->date_of_birth; ?>"><span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
              </div>
              </div>
            </div>
          </div>
        </div>
        <!-- END PERSONAL INFORMATION -->

        <!-- CONTACT DETAILS -->
        <div class="panel panel-primary">
          <div class="panel-heading">
            <h3 class="panel-title">Contact Details</h3>
          </div>
          <div class="panel-body">
            <div class="form-group">
            <div class="col-lg-10">
              <label for="inputCompanyName" class="control-label">Telephone Number</label>
              <input type="text" value="<?php echo $myRepresentative->landline; ?>" class="editbox form-control" name="iLandline" size="20" />
              </div>
            </div>
            <div class="form-group">
            <div class="col-lg-10">
              <label for="inputCompanyName" class="control-label">Mobile Number</label>
              <input type="text" value="<?php echo $myRepresentative->mobile; ?>" class="editbox form-control" name="iMobile" size="20" />
              </div>
            </div>
            <div class="form-group">
            <div class="col-lg-10">
              <label for="inputCompanyName" class="control-label">Email</label>
              <input type="text" value="<?php echo $myRepresentative->email; ?>" class="editbox form-control" name="iEmail" size="20" />
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