<!doctype html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <title>iAcademy Online Placement System</title>

  <!--<script src="<?php echo base_url();?>assets/tableSortReqs/js/jquery-latest.js"></script> -->
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
  <script src="<?php echo base_url();?>assets/js/jquery-ui-1.10.4.custom.min.js"></script>
  <script src="<?php echo base_url();?>assets/js/bootstrap.js"></script>
  <script src="<?php echo base_url();?>assets/js/bootstrap-datepicker.js"></script>
  <script src="http://eternicode.github.io/bootstrap-datepicker/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
  <script src="<?php echo base_url();?>assets/js/default.js" type="text/javascript" ></script>

  <link rel="stylesheet" href="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/themes/smoothness/jquery-ui.css" />
  <link href="<?php echo base_url();?>assets/css/bootstrap.css" rel="stylesheet">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/css/style.css" type="text/css"/>

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
    <a class="navbar-brand" href="<?php echo base_url();?>index.php/administrator_controller">iACADEMY Online Placement System</a>
  </div>
  <div class="navbar-collapse collapse navbar-responsive-collapse">
    <ul class="nav navbar-nav">
      <li><a href="<?php echo base_url();?>index.php/administrator_controller/viewMyAccount">My Account</a></li>
      <li class="dropdown">
        <a href="<?php echo base_url();?>index.php/administrator_controller" class="dropdown-toggle" data-toggle="dropdown">Admin <b class="caret"></b></a>
        <ul class="dropdown-menu">
          <li><a href="<?php echo base_url();?>index.php/administrator_controller/viewUsers">View Users</a></li>
          <li><a href="<?php echo base_url();?>index.php/administrator_controller/viewAdministrators">View Admins</a></li>
          <li class="divider"></li>
          <li class="dropdown-header">Manage Users</li>
          <li><a href="<?php echo base_url();?>index.php/administrator_controller/loadAddAdminView">Add Admin</a></li>
          <li><a href="<?php echo base_url();?>index.php/administrator_controller/loadAddEncoderView">Add Encoder</a></li>
        </ul>
      </li>
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Employers <b class="caret"></b></a>
        <ul class="dropdown-menu">
          <li><a href="<?php echo base_url();?>index.php/administrator_controller/viewEmployers">View Employers</a></li>
          <li><a href="<?php echo base_url();?>index.php/administrator_controller/viewNoSECEmployers">View Employers with No SEC Registration</a></li>
          <li class="divider"></li>
          <li class="dropdown-header">Manage Employers</li>
          <li><a href="<?php echo base_url();?>index.php/administrator_controller/loadAddEmployerView">Add Employer</a></li>
          <li><a href="<?php echo base_url();?>index.php/administrator_controller/loadAddRepresentative">Add Representative</a></li>
           <li><a href="<?php echo base_url();?>index.php/administrator_controller/loadAddEvaluationView">Add Evaluation</a></li>
        </ul>
      </li>
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Alumni <b class="caret"></b></a>
        <ul class="dropdown-menu">
          <li><a href="<?php echo base_url();?>index.php/administrator_controller/viewAlumni">View Alumni</a></li>
          <li class="divider"></li>
          <li class="dropdown-header">Manage Alumni</li>
          <li><a href="<?php echo base_url();?>index.php/administrator_controller/loadAddAlumnusView">Add Alumnus</a></li>
          <li><a href="<?php echo base_url();?>index.php/administrator_controller/loadAddAlumniByBulk">Add Alumni By Bulk</a></li>
        </ul>
      </li>
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Interns <b class="caret"></b></a>
        <ul class="dropdown-menu">
          <li><a href="<?php echo base_url();?>index.php/administrator_controller/viewInterns">View Interns</a></li>
          <li class="divider"></li>
          <li class="dropdown-header">Manage Interns</li>
          <li><a href="<?php echo base_url();?>index.php/administrator_controller/loadAddInternView">Add Intern</a></li>
          <li><a href="<?php echo base_url();?>index.php/administrator_controller/loadAddInternsByBulk">Add Interns By Bulk</a></li>
          <li><a href="<?php echo base_url();?>index.php/administrator_controller/updateInternToAlumnus">Update Intern Status to Alumnus</a></li>
        </ul>
      </li>
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Careers <b class="caret"></b></a>
        <ul class="dropdown-menu">
          <li><a href="<?php echo base_url();?>index.php/administrator_controller/viewCareers">View Careers</a></li>
          <li class="divider"></li>
          <li class="dropdown-header">Manage Careers</li>
          <li><a href="<?php echo base_url();?>index.php/administrator_controller/addCareer">Add Job Opening</a></li>
        </ul>
      </li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="<?php echo base_url();?>index.php/auth/logout">[<?php echo $this->ion_auth->user()->row()->username; ?>] Logout</a></li>
    </ul>
  </div>
</div>

