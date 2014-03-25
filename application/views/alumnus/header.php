<!doctype html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <title>iAcademy Online Placement System</title>
  
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
  <link rel="stylesheet" href="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/themes/smoothness/jquery-ui.css" />

  <script type="text/javascript" src="<?php echo base_url();?>assets/js/default.js"></script>
  <link rel="stylesheet" href="<?php echo base_url();?>assets/css/style.css" type="text/css" media="all"/>
  
  <link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet">
  <script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>

  <link href="<?php echo base_url();?>assets/css/datepicker.css" rel="stylesheet">
  <script src="http://eternicode.github.io/bootstrap-datepicker/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>

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
    <a class="navbar-brand" href="<?php echo base_url();?>index.php/alumnus_controller">iACADEMY Online Placement System</a>
  </div>
  <div class="navbar-collapse collapse navbar-responsive-collapse">
    <ul class="nav navbar-nav">
      <li><a href="<?php echo base_url();?>index.php/alumnus_controller/viewMyAccount">My Account</a></li>
      <li><a href="<?php echo base_url();?>index.php/alumnus_controller/viewMyEmployer">Employer</a></li>
      <li><a href="<?php echo base_url();?>index.php/alumnus_controller/viewInterns">Alumni</a></li>
      <li><a href="<?php echo base_url();?>index.php/alumnus_controller/viewCareers">Careers</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="<?php echo base_url();?>index.php/auth/logout">[<?php echo $this->ion_auth->user()->row()->username; ?>] Logout</a></li>
    </ul>
  </div>
</div>

