
  <div class="col-lg-10 col-lg-offset-1">
    <a id="editInternProfile" class="btn btn-info">Edit Profile</a>
  </div>

  <div id="viewInternProfileDiv" class="col-lg-10 col-lg-offset-1">
    <legend>Intern Profile</legend>

    <ul class="nav nav-tabs" style="margin-bottom: 15px;">
      <li class="active"><a href="#personal_information" data-toggle="tab">Personal Information</a></li>
      <li><a href="#internship_details" data-toggle="tab">Internship Details</a></li>
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
              <td class="td-values"><?php echo $myIntern->firstName;?> <?php echo $myIntern->middleName;?> <?php echo $myIntern->lastName;?></td>
            </tr>
            <tr>
              <td class="td-fields">Address</td>
              <td class="td-values"><?php echo $myIntern->address;?></td>
            </tr>
            <tr>
              <td class="td-fields">Course</td>
              <td class="td-values"><?php echo $courses[$myIntern->courseID];?></td>
            </tr>
            <tr>
              <td class="td-fields">Verified</td>
              <td class="td-values">
                <?php if ($myIntern->isVerified==1) echo 'Yes'; else echo 'No'; ?>
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
      </div>
      <!-- END CONTACT DETAILS -->

      <!-- STUDENT INFORMATION -->
      <div class="tab-pane fade" id="internship_details">
      <?php $courses = unserialize (COURSE_LIST); ?>
      <?php $status = unserialize (INTERN_STATUS); ?>
      <div class="panel panel-info">
        <div class="panel-heading"><h3 class="panel-title">Intern Details</h3></div>
        <div class="panel-body">
          <table class="tg">
            <tr>
              <td class="td-fields">Employment Status</td>
              <td class="td-values"><?php echo $status[$myIntern->statusID];?></td>
            </tr>
            <tr>
              <td class="td-fields">Availability</td>
              <td class="td-values"><?php echo $myIntern->availability;?></td>
            </tr>
            <tr>
              <td class="td-fields">Resume</td>
              <td class="td-values">
                <?php if (strlen($myIntern->resumePath) != 0) {
                ?>
                      <a href="<?=base_url('index.php/administrator_controller/viewResume?sID='.$this->input->get('sID', TRUE));?>" target="_blank">View <?= $myIntern->firstName;?>'s Resume</a>
                <?
                    }
                ?>
                <?php //if(strlen($uploadErrorResume != '')) echo $uploadErrorResume;?>

                <?php echo form_open_multipart('administrator_controller/uploadInternResume?sID='.$this->input->get('sID', TRUE));?>
                  <br/>
                  <input type="file" name="userfile" size="20" />
                  <br/>
                  <input type="submit" class="btn btn-default" value="Upload Resume" />
                </form>
              </td>
            </tr>
          </table>
        </div>
      </div>
      <!-- END STUDENT INFORMATION -->

      <!-- COMPANY DETAILS -->
      <div class="panel panel-info">
        <div class="panel-heading"><h3 class="panel-title">Company Details</h3></div>
        <div class="panel-body">
          <table class="tg">
            <tr>
              <td class="td-fields">Company</td>
              <td class="td-values">
                <a href="<?php echo base_url();?>index.php/administrator_controller/viewEmployer?eID=<?php echo $myIntern->currentEmployerID;?>" target="_blank" >
                  <?php echo $myIntern->companyName;?>
                </a>
              </td>
            </tr>
            <?php if($myEmployerContacts['first']->first_name != null && $myEmployerContacts['first']->first_name != "") { ?>
            <tr>
              <td class="td-fields">Mailing Address</td>
              <td class="td-values"><?php echo $myIntern->completeMailingAddress;?></td>
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
      <!-- END COMPANY DETAILS -->

    </div>

    <!-- UPDATE MY PROFILE DIALOG -->
    <div class="modal" id="dialog-edit-intern-profile" >
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title">Profile Editor</h4>
          </div>
          <div class="modal-body">
      
        <!-- PERSONAL INFORMATION -->
        <form class="form-horizontal" action="<?php echo base_url();?>index.php/administrator_controller/updateIntern?sID=<?php echo $myIntern->studentID;?>" method="POST">
        <fieldset>
          
        <div class="panel panel-info">
          <div class="panel-heading">
            <h3 class="panel-title">Personal Information</h3>
          </div>
          <div class="panel-body">
            <div class="form-group">
              <div class="col-lg-10">
                <label for="inputCompanyName" class="">First Name</label>
                <input type="text" value="<?php echo $myIntern->firstName; ?>" class="editbox form-control" name="iFirstName" size="20" />
              </div>
            </div>
            <div class="form-group">
              <div class="col-lg-10">
                <label for="inputCompanyName" class="">Middle Name</label>
                <input type="text" value="<?php echo $myIntern->middleName; ?>" class="editbox form-control" name="iMiddleName" size="20" />
              </div>
            </div>
            <div class="form-group">
              <div class="col-lg-10">
                <label for="inputCompanyName" class="">Last Name</label>
                <input type="text" value="<?php echo $myIntern->lastName; ?>" class="editbox form-control" name="iLastName" size="20" />
              </div>
            </div>
            <div class="form-group">
              <div class="col-lg-10">
                <label for="inputCompanyName" class="">Address</label>
                <input type="text" value="<?php echo $myIntern->address; ?>" class="editbox form-control" name="iAddress" size="20" />
              </div>
            </div>
            <div class="form-group">
              <div class="col-lg-10">
              <label for="inputHiring" class="">Verified</label>
              <div class="radio">
                <label>
                  <input type="radio" name="iIsVerified" id="iVerifiedYes" class="editbox" value = 1 <? if ($myIntern->isVerified == 1) echo "checked";?> required /><span id="iVYes" class="">Yes</span>
                </label>
              </div>
              <div class="radio">
                <label>
                  <input type="radio" name="iIsVerified" id="iVerifiedNo" class="editbox" value = 0 <? if ($myIntern->isVerified == 0) echo "checked";?> required /><span id="iVNo" class="">No</span>
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
              <input type="text" value="<?php echo $myIntern->landline; ?>" class="editbox form-control" name="iLandline" size="20" />
              </div>
            </div>
            <div class="form-group">
            <div class="col-lg-10">
              <label for="inputCompanyName" class="">Mobile Number</label>
              <input type="text" value="<?php echo $myIntern->mobile; ?>" class="editbox form-control" name="iMobile" size="20" />
              </div>
            </div>
            <div class="form-group">
            <div class="col-lg-10">
              <label for="inputCompanyName" class="">Email</label>
              <input type="text" value="<?php echo $myIntern->emailAddress; ?>" class="editbox form-control" name="iEmail" size="20" />
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
                  <option value = <? echo $i;?> <? if ($myIntern->courseID == $i) echo "selected='selected'";?>> <? echo $courses[$i];?> </option>
                <?php $i++; } ?></select>
              </div>
            </div>
            <div class="form-group">
              <div class="col-lg-10">
              <label for="inputStatus" class="">Internship Status</label>
              <select id="iStatusID" name="iStatusID" class="editbox form-control" required>
                <?php 
                  $i=0;
                  foreach ($status as $stat) { ?>
                  <option value = <? echo $i;?> <? if ($myIntern->statusID == $i) echo "selected='selected'";?>> <? echo $status[$i];?> </option>
                <?php $i++; } ?>
              </select>
              </div>
            </div>
            <div class="form-group">
              <div class="col-lg-10">
              <label for="inputCompany" class="">Current Company</label> 
              <select id="iCurrentCompanyID" name="iCurrentCompanyID" class="editbox form-control">
              <?php foreach ($myCompanyNames as $company) { ?><? echo $company->companyName;?>
                <option value = <? echo $company->employerID; ?> <? if ($myIntern->currentEmployerID == $company->employerID) echo "selected='selected'";?>> <? echo $company->companyName;?> </option>
              <? } ?>
              </select>
              </div>
            </div>
            <div class="form-group">
            <div class="col-lg-10">
              <label for="inputCompanyName" class="">Availability</label>
              <input type="text" value="<?php echo $myIntern->availability; ?>" class="editbox form-control" name="iAvailability" size="20" />
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
    <!-- END UPDATE COMPANY PROFILE DIALOG -->

</body>
</html>