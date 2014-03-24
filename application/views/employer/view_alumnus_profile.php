
  <div id="viewInternProfileDiv" class="col-lg-10 col-lg-offset-1">
    <legend>Intern Profile</legend>

    <!-- PERSONAL INFORMATION -->
    <div class="panel panel-info">
      <div class="panel-heading"><h3 class="panel-title">Personal Information</h3></div>
      <div class="panel-body">
        <table class="tg">
          <tr>
            <td class="td-fields">Full Name</td>
            <td class="td-values"><?php echo $myAlumnus->firstName;?> <?php echo $myAlumnus->middleName;?> <?php echo $myAlumnus->lastName;?></td>
          </tr>
          <tr>
            <td class="td-fields">Address</td>
            <td class="td-values"><?php echo $myAlumnus->address;?></td>
          </tr>
          <tr>
            <td class="td-fields">Verified</td>
            <td class="td-values">
              <?php if ($myAlumnus->isVerified==1) echo 'Yes'; else echo 'No'; ?>
            </td>
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
            <td class="td-values"><?php echo $myAlumnus->landline;?></td>
          </tr>
          <tr>
            <td class="td-fields">Mobile</td>
            <td class="td-values"><?php echo $myAlumnus->mobile;?></td>
          </tr>
          <tr>
            <td class="td-fields">Email</td>
            <td class="td-values"><?php echo $myAlumnus->emailAddress;?></td>
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
            <td class="td-values"><?php echo $courses[$myAlumnus->courseID];?></td>
          </tr>
          <tr>
            <td class="td-fields">Internship Status</td>
            <td class="td-values"><?php echo $status[$myAlumnus->statusID];?></td>
          </tr>
          <tr>
            <td class="td-fields">Current Company</td>
            <td class="td-values"><?php echo $myAlumnus->companyName;?></td>
          </tr>
        </table>
      </div>
    </div>
    <!-- END STUDENT INFORMATION -->
 
</body>
</html>