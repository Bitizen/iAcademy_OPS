<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <title>iAcademy Online Placement System</title>

  <!--<script src="<?php echo base_url();?>assets/tableSortReqs/js/jquery-latest.js"></script> -->
  <script type="text/javascript" language="javascript" src="<?php echo base_url();?>assets/js/jquery-1.7.2.js"></script>
  <script type="text/javascript" language="javascript" src="<?php echo base_url();?>assets/js/bootstrap.js"></script>
  <!--<script src="<?php echo base_url();?>assets/js/bootstrap-datepicker.js"></script>-->
  <!--<script src="http://eternicode.github.io/bootstrap-datepicker/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>-->
  <script type="text/javascript" language="javascript" src="<?php echo base_url();?>assets/js/default.js" ></script>

  <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.css" type="text/css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/css/style.css" type="text/css" media="all"/>

</head>
<body>

                <!--   
GROUPS            ACCESSIBLE MODULES

1 - admin         myaccount, admin, employer, intern, alumnus, career
2 - employer      myaccount, employer, intern, alumnus, career
3 - encoder       myaccount, intern, alumnus, career
4 - alumnus       myaccount, alumnus, employer, career
5 - intern        myaccount, intern, employer, career
                -->

<?php 
  // refer to above for number equivalents
  $myaccount_module = array(1,2,3,4,5);
  $admin_module = array(1);
  $employer_module = array(1,2,4,5);
  $alumnus_module = array(1,2,3,4);
  $intern_module = array(1,2,3,5);

  $controller_name = '';

  if( $this->ion_auth->in_group(1) ){
    $controller_name = 'administrator_controller';
  }elseif( $this->ion_auth->in_group(2) ){
    $controller_name = 'employer_controller';
  }elseif( $this->ion_auth->in_group(3) ){
    $controller_name = 'encoder_controller';
  }elseif( $this->ion_auth->in_group(4) ){
    $controller_name = 'alumnus_controller';
  }elseif( $this->ion_auth->in_group(5) ){
    $controller_name = 'intern_controller';
  }
?>

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

        <?php    echo '<li' . ($this->uri->segment(2) == "viewMyAccount" ? ' class="active"' : '') . '>';    ?>
        <?php echo anchor("$controller_name/viewMyAccount/", 'My Account') ;?></li>

      <?php if ($this->ion_auth->in_group($admin_module) ): ?>          
          <?php    echo '<li' . ($this->uri->segment(2) == "viewUsers" ? ' class="active"' : '') . '>';    ?>
          <?php echo anchor("$controller_name/viewUsers/", 'Admin') ;?></li>      
      <?php endif ?>          


      <?php if ($this->ion_auth->in_group($employer_module) ): ?>          
          <?php    echo '<li' . ($this->uri->segment(2) == "viewEmployers" ? ' class="active"' : '') . '>';    ?>
          <?php echo anchor("$controller_name/viewEmployers/", 'Employers') ;?></li>
      <?php endif ?>          

      <?php if ($this->ion_auth->in_group($alumnus_module) ): ?>          
          <?php    echo '<li' . ($this->uri->segment(2) == "viewAlumni" ? ' class="active"' : '') . '>';    ?>
          <?php echo anchor("$controller_name/viewAlumni/", 'Alumni') ;?></li>
      <?php endif ?>          

      <?php if ($this->ion_auth->in_group($intern_module) ): ?>          
          <?php    echo '<li' . ($this->uri->segment(2) == "viewInterns" ? ' class="active"' : '') . '>';    ?>
          <?php echo anchor("$controller_name/viewInterns/", 'Interns') ;?></li>
      <?php endif ?>   

          <?php    echo '<li' . ($this->uri->segment(2) == "viewCareers" ? ' class="active"' : '') . '>';    ?>
          <?php echo anchor("$controller_name/viewCareers/", 'Careers') ;?></li>
    
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="<?php echo base_url();?>index.php/auth/logout">[<?php echo $this->ion_auth->user()->row()->username; ?>] Logout</a></li>
    </ul>
  </div>
</div>
