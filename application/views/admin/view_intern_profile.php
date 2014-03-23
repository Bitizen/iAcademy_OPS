
  <div id="viewInternProfileDiv">
    <legend>Intern Profile <img id="editInternProfile" src="<?php echo base_url();?>assets\images\edit.png" alt="Edit Intern Profile" width="25" height="25" /></legend>

    <!-- PERSONAL INFORMATION -->
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
            <td class="td-values"><?php echo $myIntern->companyName;?></td>
          </tr>
        </table>
      </div>
    </div>
    <!-- END STUDENT INFORMATION -->

    <!-- UPDATE MY PROFILE DIALOG -->
    <div class="modal" id="dialog-edit-intern-profile" >
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
        <form class="form-horizontal" action="<?php echo base_url();?>index.php/SuperAdminController/updateIntern" method="POST">
        <fieldset>
          
        <div class="panel panel-primary">
          <div class="panel-heading">
            <h3 class="panel-title">Personal Information</h3>
          </div>
          <div class="panel-body">
            <div class="form-group">
              <div class="col-lg-10">
                <label for="inputCompanyName" class="control-label">First Name</label>
                <input type="text" value="<?php echo $myIntern->firstName; ?>" class="editbox form-control" name="iFirstName" size="20" />
              </div>
            </div>
            <div class="form-group">
              <div class="col-lg-10">
                <label for="inputCompanyName" class="control-label">Middle Name</label>
                <input type="text" value="<?php echo $myIntern->middleName; ?>" class="editbox form-control" name="iMiddleName" size="20" />
              </div>
            </div>
            <div class="form-group">
              <div class="col-lg-10">
                <label for="inputCompanyName" class="control-label">Last Name</label>
                <input type="text" value="<?php echo $myIntern->lastName; ?>" class="editbox form-control" name="iLastName" size="20" />
              </div>
            </div>
            <div class="form-group">
              <div class="col-lg-10">
                <label for="inputCompanyName" class="control-label">Address</label>
                <input type="text" value="<?php echo $myIntern->address; ?>" class="editbox form-control" name="iAddress" size="20" />
              </div>
            </div>
            <div class="form-group">
              <div class="col-lg-10">
              <label for="inputHiring" class="control-label">Verified</label>
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
        <div class="panel panel-primary">
          <div class="panel-heading">
            <h3 class="panel-title">Contact Details</h3>
          </div>
          <div class="panel-body">
            <div class="form-group">
            <div class="col-lg-10">
              <label for="inputCompanyName" class="control-label">Telephone Number</label>
              <input type="text" value="<?php echo $myIntern->landline; ?>" class="editbox form-control" name="iLandline" size="20" />
              </div>
            </div>
            <div class="form-group">
            <div class="col-lg-10">
              <label for="inputCompanyName" class="control-label">Mobile Number</label>
              <input type="text" value="<?php echo $myIntern->mobile; ?>" class="editbox form-control" name="iMobile" size="20" />
              </div>
            </div>
            <div class="form-group">
            <div class="col-lg-10">
              <label for="inputCompanyName" class="control-label">Email</label>
              <input type="text" value="<?php echo $myIntern->emailAddress; ?>" class="editbox form-control" name="iEmail" size="20" />
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
                <!--<option value = 0 <? if ($myIntern->courseID == 0) echo "selected='selected'";?>> <? echo $courses[0];?> </option>-->
                <option value = 1 <? if ($myIntern->courseID == 1) echo "selected='selected'";?>> <? echo $courses[1];?> </option>
                <option value = 2 <? if ($myIntern->courseID == 2) echo "selected='selected'";?>> <? echo $courses[2];?> </option>
                <option value = 3 <? if ($myIntern->courseID == 3) echo "selected='selected'";?>> <? echo $courses[3];?> </option>
                <option value = 4 <? if ($myIntern->courseID == 4) echo "selected='selected'";?>> <? echo $courses[4];?> </option>
                <option value = 5 <? if ($myIntern->courseID == 5) echo "selected='selected'";?>> <? echo $courses[5];?> </option>
                <option value = 6 <? if ($myIntern->courseID == 6) echo "selected='selected'";?>> <? echo $courses[6];?> </option>
                <option value = 7 <? if ($myIntern->courseID == 7) echo "selected='selected'";?>> <? echo $courses[7];?> </option>
                <option value = 8 <? if ($myIntern->courseID == 8) echo "selected='selected'";?>> <? echo $courses[8];?> </option>
              </select>
              </div>
            </div>
            <div class="form-group">
              <div class="col-lg-10">
              <label for="inputStatus" class="control-label">Internship Status</label>
              <select id="iStatusID" name="iStatusID" class="editbox form-control" required>
                <!--<option value = 0 <? if ($myIntern->statusID == 0) echo "selected='selected'";?>> <? echo $status[0];?> </option>-->
                <option value = 1 <? if ($myIntern->statusID == 1) echo "selected='selected'";?>> <? echo $status[1];?> </option>
                <option value = 2 <? if ($myIntern->statusID == 2) echo "selected='selected'";?>> <? echo $status[2];?> </option>
                <option value = 3 <? if ($myIntern->statusID == 3) echo "selected='selected'";?>> <? echo $status[3];?> </option>
                <option value = 4 <? if ($myIntern->statusID == 4) echo "selected='selected'";?>> <? echo $status[4];?> </option>
                <option value = 5 <? if ($myIntern->statusID == 5) echo "selected='selected'";?>> <? echo $status[5];?> </option>
              </select>
              </div>
            </div>
            <div class="form-group">
              <div class="col-lg-10">
              <label for="inputCompany" class="control-label">Current Company</label> 
              <select id="iCurrentCompanyID" name="iCurrentCompanyID" class="editbox form-control">
              <?php foreach ($myCompanyNames as $company) { ?><? echo $company->companyName;?>
                <option value = <? echo $company->employerID; ?> <? if ($myIntern->currentEmployerID == $company->employerID) echo "selected='selected'";?>> <? echo $company->companyName;?> </option>
              <? } ?>
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