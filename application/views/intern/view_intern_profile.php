
  <div id="viewInternProfileDiv" class="col-lg-10 col-lg-offset-1">
    <legend>Alumnus Profile</legend>

    <!-- PERSONAL INFORMATION -->
    <div class="panel panel-info">
      <div class="panel-heading"><h3 class="panel-title">Personal Information</h3></div>
      <div class="panel-body">
        <table class="tg">
          <tr>
            <td class="td-fields">Full Name</td>
            <td class="td-values"><?php echo $myIntern->firstName;?> <?php echo $myIntern->middleName;?> <?php echo $myIntern->lastName;?></td>
          </tr>
        </table>
      </div>
    </div>
    <!-- END PERSONAL INFORMATION -->

    <!-- CONTACT DETAILS 

          <tr>
            <td class="td-fields">Address</td>
            <td class="td-values"><?php echo $myIntern->address;?></td>
          </tr>

    <div class="panel panel-info">
      <div class="panel-heading"><h3 class="panel-title">Contact Details</h3></div>
      <div class="panel-body">
        <table class="tg">
          <tr>
            <td class="td-fields">Landline</td>
            <td class="td-values"><?php echo $myIntern->landline;?></td>
          </tr>
          <tr>
            <td class="td-fields">Mobile</td>
            <td class="td-values"><?php echo $myIntern->mobile;?></td>
          </tr>
          <tr>
            <td class="td-fields">Email</td>
            <td class="td-values"><?php echo $myIntern->emailAddress;?></td>
          </tr>
        </table>
      </div>
    </div>
    <!-- END CONTACT DETAILS -->

    <!-- STUDENT INFORMATION -->
    <?php $courses = unserialize (COURSE_LIST); ?>
    <?php $status = unserialize (INTERN_STATUS); ?>
    <div class="panel panel-info">
      <div class="panel-heading"><h3 class="panel-title">Student Information</h3></div>
      <div class="panel-body">
        <table class="tg">
          <tr>
            <td class="td-fields">Course</td>
            <td class="td-values"><?php echo $courses[$myIntern->courseID];?></td>
          </tr>
          <tr>
            <td class="td-fields">Internship Status</td>
            <td class="td-values"><?php echo $status[$myIntern->statusID];?></td>
          </tr>
          <tr>
            <td class="td-fields">Current Company</td>
            <td class="td-values">
              <a href="<?php echo base_url();?>index.php/intern_controller/viewEmployer?eID=<?php echo $myIntern->currentEmployerID;?>">
                <?php echo $myIntern->companyName;?>
              </a>
            </td>
          </tr>
        </table>
      </div>
    </div>
    <!-- END STUDENT INFORMATION -->
 
</body>
</html>