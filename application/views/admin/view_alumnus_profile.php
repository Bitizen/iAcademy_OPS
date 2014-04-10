
  <div class="col-lg-10 col-lg-offset-1">
    <a id="editAlumnusProfile" class="btn btn-info">Edit Profile</a>
  </div>

  <div id="viewInternProfileDiv" class="col-lg-10 col-lg-offset-1">
    <legend>Alumnus Profile</legend>

    <ul class="nav nav-tabs" style="margin-bottom: 15px;">
      <li class="active"><a href="#personal_information" data-toggle="tab">Personal Information</a></li>
      <li><a href="#career_details" data-toggle="tab">Career Details</a></li>
    </ul>
    <div id="myTabContent" class="tab-content">
      <!-- PERSONAL INFORMATION -->
      <div class="tab-pane fade active in" id="personal_information">
      <?php $courses = unserialize (COURSE_LIST); ?>
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
              <td class="td-fields">Course</td>
              <td class="td-values"><?php echo $courses[$myAlumnus->courseID];?></td>
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
      </div>
      <!-- END CONTACT DETAILS -->

      <!-- CAREER DETAILS -->
      <div class="tab-pane fade" id="career_details">
      <?php $status = unserialize (ALUMNUS_EMPLOYMENT_STATUS); ?>
      <div class="panel panel-info">
        <div class="panel-heading"><h3 class="panel-title">Career Details</h3></div>
        <div class="panel-body">
          <table class="tg">
            <tr>
              <td class="td-fields">Internship Status</td>
              <td class="td-values"><?php echo $status[$myAlumnus->statusID];?></td>
            </tr>
            <tr>
              <td class="td-fields">Availability</td>
              <td class="td-values"><?php echo $myAlumnus->availability;?></td>
            </tr>
            <tr>
              <td class="td-fields">Resume</td>
              <td class="td-values">
                <?php if (strlen($myAlumnus->resumePath) != 0) {

                      $image_properties = array(
                                'src' => base_url().$myAlumnus->resumePath,
                                'alt' => $myAlumnus->lastName.'_'.$myAlumnus->firstName.'_Resume',
                                'class' => '',
                                'width' => '100',
                                'height' => '150',
                                'title' => $myAlumnus->lastName.'_'.$myAlumnus->firstName.'_Resume'
                      );

                      echo img($image_properties);
                    }
                ?>
                <?php //if(strlen($uploadErrorSEC != 0)) echo $uploadErrorSEC;?>
                <?php echo form_open_multipart('administrator_controller/uploadResume');?>
                  <input type="file" name="userfile" size="20" />
                  <br/>
                  <input type="submit" class="btn btn-default" value="Upload Resume" />
                </form>
              </td>
            </tr>
          </table>
        </div>
      </div>

      <div class="panel panel-info">
        <div class="panel-heading"><h3 class="panel-title">Company Details</h3></div>
        <div class="panel-body">
          <table class="tg">
            <tr>
              <td class="td-fields">Company</td>
              <td class="td-values">
                <a href="<?php echo base_url();?>index.php/administrator_controller/viewEmployer?eID=<?php echo $myAlumnus->currentEmployerID;?>" target="_blank" >
                  <?php echo $myAlumnus->companyName;?>
                </a>
              </td>
            </tr>
            <?php if($myEmployerContacts['first']->first_name != null && $myEmployerContacts['first']->first_name != "") { ?>
            <tr>
              <td class="td-fields">Mailing Address</td>
              <td class="td-values"><?php echo $myAlumnus->completeMailingAddress;?></td>
            </tr>
            <tr>
              <td class="td-fields">Representative</td>
              <td class="td-values"><?php echo $myEmployerContacts['first']->first_name;?> <?php echo $myEmployerContacts['first']->middle_name;?> <?php echo $myEmployerContacts['first']->last_name;?>, <?php echo $myEmployerContacts['first']->position;?></td>
            </tr>
            <tr>
              <td class="td-fields">Telephone Number</td>
              <td class="td-values"><?php echo $myEmployerContacts['first']->landline;?></td>
            </tr>
            <tr>
              <td class="td-fields">Mobile Number</td>
              <td class="td-values"><?php echo $myEmployerContacts['first']->mobile;?></td>
            </tr>
            <tr>
              <td class="td-fields">Email</td>
              <td class="td-values"><?php echo $myEmployerContacts['first']->email;?></td>
            </tr>
            <?php } ?>
          </table>
        </div>
      </div>

      </div>
      <!-- END CAREER DETAILS -->

    </div>

    <!-- UPDATE ALUMNUS -->
    <div class="modal" id="dialog-edit-alumnus-profile" >
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title">Profile Editor</h4>
          </div>
          <div class="modal-body">
      
        <!-- PERSONAL INFORMATION -->
        <form class="form-horizontal" action="<?php echo base_url();?>index.php/administrator_controller/updateAlumnus?sID=<?php echo $myAlumnus->studentID;?>" method="POST">
        <fieldset>
          
        <div class="panel panel-info">
          <div class="panel-heading">
            <h3 class="panel-title">Personal Information</h3>
          </div>
          <div class="panel-body">
            <div class="form-group">
              <div class="col-lg-10">
                <label for="inputCompanyName" class="">First Name</label>
                <input type="text" value="<?php echo $myAlumnus->firstName; ?>" class="editbox form-control" name="iFirstName" size="20" />
              </div>
            </div>
            <div class="form-group">
              <div class="col-lg-10">
                <label for="inputCompanyName" class="">Middle Name</label>
                <input type="text" value="<?php echo $myAlumnus->middleName; ?>" class="editbox form-control" name="iMiddleName" size="20" />
              </div>
            </div>
            <div class="form-group">
              <div class="col-lg-10">
                <label for="inputCompanyName" class="">Last Name</label>
                <input type="text" value="<?php echo $myAlumnus->lastName; ?>" class="editbox form-control" name="iLastName" size="20" />
              </div>
            </div>
            <div class="form-group">
              <div class="col-lg-10">
                <label for="inputCompanyName" class="">Address</label>
                <input type="text" value="<?php echo $myAlumnus->address; ?>" class="editbox form-control" name="iAddress" size="20" />
              </div>
            </div>
            <div class="form-group">
              <div class="col-lg-10">
              <label for="inputHiring" class="">Verified</label>
              <div class="radio">
                <label>
                  <input type="radio" name="iIsVerified" id="iVerifiedYes" class="editbox" value = 1 <? if ($myAlumnus->isVerified == 1) echo "checked";?> required /><span id="iVYes" class="">Yes</span>
                </label>
              </div>
              <div class="radio">
                <label>
                  <input type="radio" name="iIsVerified" id="iVerifiedNo" class="editbox" value = 0 <? if ($myAlumnus->isVerified == 0) echo "checked";?> required /><span id="iVNo" class="">No</span>
                </label>
              </div>
              </div>
            </div>
          </div>
        </div>
        <!-- END PERSONAL INFORMATION -->

        <!-- CONTACT DETAILS -->
        <div class="panel panel-info">
          <div class="panel-heading">
            <h3 class="panel-title">Contact Details</h3>
          </div>
          <div class="panel-body">
            <div class="form-group">
            <div class="col-lg-10">
              <label for="inputCompanyName" class="">Telephone Number</label>
              <input type="text" value="<?php echo $myAlumnus->landline; ?>" class="editbox form-control" name="iLandline" size="20" />
              </div>
            </div>
            <div class="form-group">
            <div class="col-lg-10">
              <label for="inputCompanyName" class="">Mobile Number</label>
              <input type="text" value="<?php echo $myAlumnus->mobile; ?>" class="editbox form-control" name="iMobile" size="20" />
              </div>
            </div>
            <div class="form-group">
            <div class="col-lg-10">
              <label for="inputCompanyName" class="">Email</label>
              <input type="text" value="<?php echo $myAlumnus->emailAddress; ?>" class="editbox form-control" name="iEmail" size="20" />
              </div>
            </div>
          </div>
        </div>
        <!-- END CONTACT DETAILS -->  

        <!-- STUDENT INFORMATION -->
        <div class="panel panel-info">
          <div class="panel-heading">
            <h3 class="panel-title">Student Information</h3>
          </div>
          <div class="panel-body">
            <div class="form-group">
              <div class="col-lg-10">
              <label for="inputCourse" class="">Course</label>
              <select id="iCourseID" name="iCourseID" class="editbox form-control" required>
                <?php 
                  $i=0;
                  foreach ($courses as $course) { ?>
                  <option value = <? echo $i;?> <? if ($myAlumnus->courseID == $i) echo "selected='selected'";?>> <? echo $courses[$i];?> </option>
                <?php $i++; } ?></select>
              </div>
            </div>
            <div class="form-group">
              <div class="col-lg-10">
              <label for="inputStatus" class="">Employment Status</label>
              <select id="iStatusID" name="iStatusID" class="editbox form-control" required>
                <?php 
                  $i=0;
                  foreach ($status as $stat) { ?>
                  <option value = <? echo $i;?> <? if ($myAlumnus->statusID == $i) echo "selected='selected'";?>> <? echo $status[$i];?> </option>
                <?php $i++; } ?>
              </select>
              </div>
            </div>
            <div class="form-group">
              <div class="col-lg-10">
              <label for="inputCompany" class="">Current Company</label> 
              <select id="iCurrentCompanyID" name="iCurrentCompanyID" class="editbox form-control">
              <?php foreach ($myCompanyNames as $company) { ?><? echo $company->companyName;?>
                <option value = <? echo $company->employerID; ?> <? if ($myAlumnus->currentEmployerID == $company->employerID) echo "selected='selected'";?>> <? echo $company->companyName;?> </option>
              <? } ?>
              </select>
              </div>
            </div>
            <div class="form-group">
            <div class="col-lg-10">
              <label for="inputCompanyName" class="">Availability</label>
              <input type="text" value="<?php echo $myAlumnus->availability; ?>" class="editbox form-control" name="iAvailability" size="20" />
              </div>
            </div>
          </div>
        </div>
        <!-- END STUDENT INFORMATION -->

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
    <!-- END UPDATE ALUMNUS -->


</body>
</html>