
  <div id="viewInternProfileDiv" class="col-lg-10 col-lg-offset-1">
    <legend>Alumnus Profile <img id="editAlumnusProfile" src="<?php echo base_url();?>assets\images\edit.png" alt="Edit Intern Profile" width="25" height="25" /></legend>

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

    <!-- UPDATE STUDENT PROFILE DIALOG -->
    <div class="modal" id="dialog-edit-alumnus-profile" >
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
        <form class="form-horizontal" action="<?php echo base_url();?>index.php/administrator_controller/updateAlumnus?sID=<?php echo $myAlumnus->studentID;?>" method="POST">
        <fieldset>
          
        <div class="panel panel-primary">
          <div class="panel-heading">
            <h3 class="panel-title">Personal Information</h3>
          </div>
          <div class="panel-body">
            <div class="form-group">
              <div class="col-lg-10">
                <label for="inputCompanyName" class="control-label">First Name</label>
                <input type="text" value="<?php echo $myAlumnus->firstName; ?>" class="editbox form-control" name="iFirstName" size="20" />
              </div>
            </div>
            <div class="form-group">
              <div class="col-lg-10">
                <label for="inputCompanyName" class="control-label">Middle Name</label>
                <input type="text" value="<?php echo $myAlumnus->middleName; ?>" class="editbox form-control" name="iMiddleName" size="20" />
              </div>
            </div>
            <div class="form-group">
              <div class="col-lg-10">
                <label for="inputCompanyName" class="control-label">Last Name</label>
                <input type="text" value="<?php echo $myAlumnus->lastName; ?>" class="editbox form-control" name="iLastName" size="20" />
              </div>
            </div>
            <div class="form-group">
              <div class="col-lg-10">
                <label for="inputCompanyName" class="control-label">Address</label>
                <input type="text" value="<?php echo $myAlumnus->address; ?>" class="editbox form-control" name="iAddress" size="20" />
              </div>
            </div>
            <div class="form-group">
              <div class="col-lg-10">
              <label for="inputHiring" class="control-label">Verified</label>
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
        <div class="panel panel-primary">
          <div class="panel-heading">
            <h3 class="panel-title">Contact Details</h3>
          </div>
          <div class="panel-body">
            <div class="form-group">
            <div class="col-lg-10">
              <label for="inputCompanyName" class="control-label">Telephone Number</label>
              <input type="text" value="<?php echo $myAlumnus->landline; ?>" class="editbox form-control" name="iLandline" size="20" />
              </div>
            </div>
            <div class="form-group">
            <div class="col-lg-10">
              <label for="inputCompanyName" class="control-label">Mobile Number</label>
              <input type="text" value="<?php echo $myAlumnus->mobile; ?>" class="editbox form-control" name="iMobile" size="20" />
              </div>
            </div>
            <div class="form-group">
            <div class="col-lg-10">
              <label for="inputCompanyName" class="control-label">Email</label>
              <input type="text" value="<?php echo $myAlumnus->emailAddress; ?>" class="editbox form-control" name="iEmail" size="20" />
              </div>
            </div>
          </div>
        </div>
        <!-- END CONTACT DETAILS -->  

        <!-- STUDENT INFORMATION -->
        <div class="panel panel-primary">
          <div class="panel-heading">
            <h3 class="panel-title">Student Information</h3>
          </div>
          <div class="panel-body">
            <div class="form-group">
              <div class="col-lg-10">
              <label for="inputCourse" class="control-label">Course</label>
              <select id="iCourseID" name="iCourseID" class="editbox form-control" required>
                <!--<option value = 0 <? if ($myAlumnus->courseID == 0) echo "selected='selected'";?>> <? echo $courses[0];?> </option>-->
                <option value = 1 <? if ($myAlumnus->courseID == 1) echo "selected='selected'";?>> <? echo $courses[1];?> </option>
                <option value = 2 <? if ($myAlumnus->courseID == 2) echo "selected='selected'";?>> <? echo $courses[2];?> </option>
                <option value = 3 <? if ($myAlumnus->courseID == 3) echo "selected='selected'";?>> <? echo $courses[3];?> </option>
                <option value = 4 <? if ($myAlumnus->courseID == 4) echo "selected='selected'";?>> <? echo $courses[4];?> </option>
                <option value = 5 <? if ($myAlumnus->courseID == 5) echo "selected='selected'";?>> <? echo $courses[5];?> </option>
                <option value = 6 <? if ($myAlumnus->courseID == 6) echo "selected='selected'";?>> <? echo $courses[6];?> </option>
                <option value = 7 <? if ($myAlumnus->courseID == 7) echo "selected='selected'";?>> <? echo $courses[7];?> </option>
                <option value = 8 <? if ($myAlumnus->courseID == 8) echo "selected='selected'";?>> <? echo $courses[8];?> </option>
              </select>
              </div>
            </div>
            <div class="form-group">
              <div class="col-lg-10">
              <label for="inputStatus" class="control-label">Internship Status</label>
              <select id="iStatusID" name="iStatusID" class="editbox form-control" required>
                <!--<option value = 0 <? if ($myAlumnus->statusID == 0) echo "selected='selected'";?>> <? echo $status[0];?> </option>-->
                <option value = 1 <? if ($myAlumnus->statusID == 1) echo "selected='selected'";?>> <? echo $status[1];?> </option>
                <option value = 2 <? if ($myAlumnus->statusID == 2) echo "selected='selected'";?>> <? echo $status[2];?> </option>
                <option value = 3 <? if ($myAlumnus->statusID == 3) echo "selected='selected'";?>> <? echo $status[3];?> </option>
                <option value = 4 <? if ($myAlumnus->statusID == 4) echo "selected='selected'";?>> <? echo $status[4];?> </option>
                <option value = 5 <? if ($myAlumnus->statusID == 5) echo "selected='selected'";?>> <? echo $status[5];?> </option>
              </select>
              </div>
            </div>
            <div class="form-group">
              <div class="col-lg-10">
              <label for="inputCompany" class="control-label">Current Company</label>
              <select id="iCurrentCompanyID" name="iCurrentCompanyID" class="editbox form-control">
              <?php foreach ($myCompanyNames as $company) { ?>
                <option value = <? echo $company->employerID; ?> <? if ($myAlumnus->currentEmployerID == $company->employerID) echo "selected='selected'";?>> <? echo $company->companyName;?> </option>
              <?php } ?>
              </select>
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