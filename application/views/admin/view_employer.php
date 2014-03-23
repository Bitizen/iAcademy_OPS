
  <div id="viewEmployerDiv">
    <legend>Employer Profile <img id="editMyProfile" src="<?php echo base_url();?>assets\images\edit.png" alt="Edit Company Profile" width="25" height="25" /></legend>
    
    <!-- COMPANY DETAILS -->
    <div class="panel panel-info">
      <div class="panel-heading"><h3 class="panel-title">Company Details</h3></div>
      <div class="panel-body">
        <table class="tg">
          <tr>
            <td class="td-fields">Company Name</td>
            <td class="td-values"><?php echo $myEmployer->companyName;?></td>
          </tr>
          <tr>
            <td class="td-fields">Industry</td>
            <td class="td-values"><?php echo $myEmployer->industryType;?></td>
          </tr>
          <tr>
            <td class="td-fields">SEC Registration</td>
            <td class="td-values">
              <?php if (strlen($myEmployer->SECRegistrationFilePath) != 0) {

                    $image_properties = array(
                              'src' => base_url().$myEmployer->SECRegistrationFilePath,
                              'alt' => $myEmployer->companyName.' SEC Registration',
                              'class' => '',
                              'width' => '100',
                              'height' => '150',
                              'title' => $myEmployer->companyName.' SEC Registration'
                    );

                    echo img($image_properties);
                  }
                  else {

                  }
              ?>
              <?php //if(strlen($uploadErrorSEC != 0)) echo $uploadErrorSEC;?>
              <?php echo form_open_multipart('administrator_controller/uploadSECRegistration');?>
                <input type="file" name="userfile" size="20" />
                <br/>
                <input type="submit" class="btn btn-default" value="Upload SEC Registration" />
              </form>
            </td>
          </tr>
          <tr>
            <td class="td-fields">Mailing Address</td>
            <td class="td-values"><?php echo $myEmployer->completeMailingAddress;?></td>
          </tr>
          <tr>
            <td class="td-fields">Telephone Number</td>
            <td class="td-values"><?php echo $myEmployer->telephoneNumber;?></td>
          </tr>
          <tr>
            <td class="td-fields">Fax Number</td>
            <td class="td-values"><?php echo $myEmployer->faxNumber;?></td>
          </tr>
          <tr>
            <td class="td-fields">Website</td>
            <td class="td-values"><?php echo $myEmployer->website;?></td>
          </tr>
          <tr>
            <td class="td-fields">Date Established</td>
            <td class="td-values"><?php echo $myEmployer->dateEstablished;?></td>
          </tr>
          <tr>
            <td class="td-fields">Company Logo</td>
            <td class="td-values">
              <?php if($myEmployer->companyLogoFilePath!=null) {

                    $image_properties = array(
                              'src' => base_url().$myEmployer->companyLogoFilePath,
                              'alt' => $myEmployer->companyName.' Company Logo',
                              'class' => '',
                              'width' => '180',
                              'height' => '100',
                              'title' => $myEmployer->companyName.' Company Logo'
                    );

                    echo img($image_properties);
                  }
                  else {

                  }
              ?>
              <?php //if($uploadErrorLogo != null) echo $uploadErrorLogo;?>
              <?php echo form_open_multipart('administrator_controller/uploadCompanyLogo');?>
                <input type="file" name="userfile" size="20" />
                <br/>
                <input type="submit" class="btn btn-default" value="Upload Company Logo" />
              </form>
            </td>
          </tr>
          <tr>
            <td class="td-fields">Other Documents</td>
            <td class="td-values">
              <?php if($myEmployer->otherDocumentsFilePath!=null) {

                    $image_properties = array(
                              'src' => base_url().$myEmployer->otherDocumentsFilePath,
                              'alt' => $myEmployer->companyName.' Other Documents',
                              'class' => '',
                              'width' => '100',
                              'height' => '150',
                              'title' => $myEmployer->companyName.' Other Documents'
                    );

                    echo img(base_url().$myEmployer->otherDocumentsFilePath);
                  }
                  else {

                  }
              ?>
              <br/>
              <?php //if($uploadErrorOther != null) echo $uploadErrorOther;?>
              <?php echo form_open_multipart('administrator_controller/uploadOtherDocuments');?>
                <input type="file" name="userfile" size="20" />
                <br/>
                <input type="submit" class="btn btn-default" value="Upload Other Documents" />
              </form>
            </td>
          </tr>
          <tr>
            <td class="td-fields">Other Avenues For Collaboration</td>
            <td class="td-values">
              <ul class="list-group">
              <?php if($myEmployer->hasScholarshipGrants==1) echo "<p>Scholarship Grants</p>"; ?>
              <?php if($myEmployer->hasSeminarsAndTrainings==1) echo "<p>Seminars & Trainings</p>"; ?>
              <?php if($myEmployer->hasRecruitmentActivities==1) echo "<p>Recruitment Activities</p>"; ?>
              <?php if($myEmployer->hasFacultyImmersion==1) echo "<p>Faculty Immersion</p>"; ?>
              </ul>
            </td>
          </tr>
          <tr>
            <td class="td-fields">Hiring</td>
            <td class="td-values">
              <?php if ($myEmployer->isHiring==1) echo 'Yes'; else echo 'No'; ?>
            </td>
          </tr>
          <tr>
            <td class="td-fields">Allowance Provision</td>
            <td class="td-values">
              <?php if ($myEmployer->hasAllowanceProvision==1) echo 'Yes'; else echo 'No'; ?>
            </td>
          </tr>
        </table>
      </div>
    </div>
    <!-- END COMPANY DETAILS-->

    <br/>

    <!-- PRIMAY CONTACY -->
    <?php if($myEmployerContacts['first']->first_name != null || $myEmployerContacts['first']->first_name != "") { ?>
    <div class="panel panel-info">
      <div class="panel-heading"><h3 class="panel-title">Primary Contact</h3></div>
      <div class="panel-body">
        <table class="tg">
          <tr>
            <td class="td-fields">Name</td>
            <td class="td-values"><?php echo $myEmployerContacts['first']->first_name;?> <?php echo $myEmployerContacts['first']->middle_name;?> <?php echo $myEmployerContacts['first']->last_name;?></td>
          </tr>
          <tr>
            <td class="td-fields">Designation</td>
            <td class="td-values"><?php echo $myEmployerContacts['first']->position;?></td>
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
          <tr>
            <td class="td-fields">Date Of Birth</td>
            <td class="td-values"><?php echo $myEmployerContacts['first']->date_of_birth;?></td>
          </tr>
        </table>
      </div>
    </div>
    <?php } ?>
    <!-- END PRIMARY CONTACT-->

    <!-- SECONDARY CONTACY -->
    <?php if($myEmployerContacts['second']->first_name != null || $myEmployerContacts['second']->first_name != "") {?>
    <div class="panel panel-info">
      <div class="panel-heading"><h3 class="panel-title">Secondary Contact</h3></div>
      <div class="panel-body">
        <table class="tg">
          <tr>
            <td class="td-fields">Name</td>
            <td class="td-values"><?php echo $myEmployerContacts['second']->first_name;?> <?php echo $myEmployerContacts['second']->middle_name;?> <?php echo $myEmployerContacts['second']->last_name;?></td>
          </tr>
          <tr>
            <td class="td-fields">Designation</td>
            <td class="td-values"><?php echo $myEmployerContacts['second']->position;?></td>
          </tr>
          <tr>
            <td class="td-fields">Telephone Number</td>
            <td class="td-values"><?php echo $myEmployerContacts['second']->landline;?></td>
          </tr>
          <tr>
            <td class="td-fields">Mobile Number</td>
            <td class="td-values"><?php echo $myEmployerContacts['second']->mobile;?></td>
          </tr>
          <tr>
            <td class="td-fields">Email</td>
            <td class="td-values"><?php echo $myEmployerContacts['second']->email;?></td>
          </tr>
          <tr>
            <td class="td-fields">Date Of Birth</td>
            <td class="td-values"><?php echo $myEmployerContacts['second']->date_of_birth;?></td>
          </tr>
        </table>
      </div>
    </div>
    <?php } ?>
    <!-- END SECONDARY CONTACT-->

    <!-- TERTIARY CONTACY -->
    <?php if($myEmployerContacts['third']->first_name != null || $myEmployerContacts['third']->first_name != "") {?>
    <div class="panel panel-info">
      <div class="panel-heading"><h3 class="panel-title">Tertiary Contact</h3></div>
      <div class="panel-body">
        <table class="tg">
          <tr>
            <td class="td-fields">Name</td>
            <td class="td-values"><?php echo $myEmployerContacts['third']->first_name;?> <?php echo $myEmployerContacts['third']->middle_name;?> <?php echo $myEmployerContacts['third']->last_name;?></td>
          </tr>
          <tr>
            <td class="td-fields">Designation</td>
            <td class="td-values"><?php echo $myEmployerContacts['third']->position;?></td>
          </tr>
          <tr>
            <td class="td-fields">Telephone Number</td>
            <td class="td-values"><?php echo $myEmployerContacts['third']->landline;?></td>
          </tr>
          <tr>
            <td class="td-fields">Mobile Number</td>
            <td class="td-values"><?php echo $myEmployerContacts['third']->mobile;?></td>
          </tr>
          <tr>
            <td class="td-fields">Email</td>
            <td class="td-values"><?php echo $myEmployerContacts['third']->email;?></td>
          </tr>
          <tr>
            <td class="td-fields">Date Of Birth</td>
            <td class="td-values"><?php echo $myEmployerContacts['third']->date_of_birth;?></td>
          </tr>
        </table>
      </div>
    </div>
    <?php } ?>
    <!-- END TERTIARY CONTACT-->

  </div>


<!-- UPDATE COMPANY PROFILE DIALOG -->
<div class="modal" id="dialog-edit-company-profile" >
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title"><?php echo $myEmployer->companyName;?></h4>
      <div class="modal-body">
      <div class="validateTips alert alert-dismissable alert-warning">
      <button type="button" class="close" data-dismiss="alert">×</button>
      <strong>Note : </strong> All form fields are required.</div><br/>
 
      <!-- COMPANY DETAILS -->
      <form class="form-horizontal" action="<?php echo base_url();?>index.php/administrator_controller/updateEmployer" method="POST">
        <fieldset>
        <div class="panel panel-primary">
          <div class="panel-heading">
            <h3 class="panel-title">Company Details</h3>
          </div>
          <div class="panel-body">
            <div class="form-group">
              <div class="col-lg-10">
              <label for="inputCompanyName" class="control-label">Company Name</label>
                <input type="text" value="<?php echo $myEmployer->companyName; ?>" class="editbox form-control" name="iCompanyName" size="20" />
              </div>
            </div>
            <div class="form-group">
              <div class="col-lg-10">
              <label for="inputIndustryType" class="control-label">Industry Type</label>
              <?php $industries = unserialize (INDUSTRY_LIST); ?>
              <select id="iIndustryType" name="iIndustryType" class="editbox form-control" required>
                <option value = <? echo $industries[0];?> <? if ($myEmployer->industryType == $industries[0]) echo "selected='selected'";?>> <? echo $industries[0];?> </option>
                <option value = <? echo $industries[1];?> <? if ($myEmployer->industryType == $industries[1]) echo "selected='selected'";?>> <? echo $industries[1];?> </option>
                <option value = <? echo $industries[2];?> <? if ($myEmployer->industryType == $industries[2]) echo "selected='selected'";?>> <? echo $industries[2];?> </option>
                <option value = <? echo $industries[3];?> <? if ($myEmployer->industryType == $industries[3]) echo "selected='selected'";?>> <? echo $industries[3];?> </option>
                <option value = <? echo $industries[4];?> <? if ($myEmployer->industryType == $industries[4]) echo "selected='selected'";?>> <? echo $industries[4];?> </option>
                <option value = <? echo $industries[5];?> <? if ($myEmployer->industryType == $industries[5]) echo "selected='selected'";?>> <? echo $industries[5];?> </option>
                <option value = <? echo $industries[6];?> <? if ($myEmployer->industryType == $industries[6]) echo "selected='selected'";?>> <? echo $industries[6];?> </option>
                <option value = <? echo $industries[7];?> <? if ($myEmployer->industryType == $industries[7]) echo "selected='selected'";?>> <? echo $industries[7];?> </option>
                <option value = <? echo $industries[8];?> <? if ($myEmployer->industryType == $industries[8]) echo "selected='selected'";?>> <? echo $industries[8];?> </option>
                <option value = <? echo $industries[9];?> <? if ($myEmployer->industryType == $industries[9]) echo "selected='selected'";?>> <? echo $industries[9];?> </option>
                <option value = <? echo $industries[10];?> <? if ($myEmployer->industryType == $industries[10]) echo "selected='selected'";?>> <? echo $industries[10];?> </option>
                <option value = <? echo $industries[11];?> <? if ($myEmployer->industryType == $industries[11]) echo "selected='selected'";?>> <? echo $industries[11];?> </option>
                <option value = <? echo $industries[12];?> <? if ($myEmployer->industryType == $industries[12]) echo "selected='selected'";?>> <? echo $industries[12];?> </option>
                <option value = <? echo $industries[13];?> <? if ($myEmployer->industryType == $industries[13]) echo "selected='selected'";?>> <? echo $industries[13];?> </option>
                <option value = <? echo $industries[14];?> <? if ($myEmployer->industryType == $industries[14]) echo "selected='selected'";?>> <? echo $industries[14];?> </option>
                <option value = <? echo $industries[15];?> <? if ($myEmployer->industryType == $industries[15]) echo "selected='selected'";?>> <? echo $industries[15];?> </option>
                <option value = <? echo $industries[16];?> <? if ($myEmployer->industryType == $industries[16]) echo "selected='selected'";?>> <? echo $industries[16];?> </option>
                <option value = <? echo $industries[17];?> <? if ($myEmployer->industryType == $industries[17]) echo "selected='selected'";?>> <? echo $industries[17];?> </option>
                <option value = <? echo $industries[18];?> <? if ($myEmployer->industryType == $industries[18]) echo "selected='selected'";?>> <? echo $industries[18];?> </option>
                <option value = <? echo $industries[19];?> <? if ($myEmployer->industryType == $industries[19]) echo "selected='selected'";?>> <? echo $industries[19];?> </option>
                <option value = <? echo $industries[20];?> <? if ($myEmployer->industryType == $industries[20]) echo "selected='selected'";?>> <? echo $industries[20];?> </option>
                <option value = <? echo $industries[21];?> <? if ($myEmployer->industryType == $industries[21]) echo "selected='selected'";?>> <? echo $industries[21];?> </option>
                <option value = <? echo $industries[22];?> <? if ($myEmployer->industryType == $industries[22]) echo "selected='selected'";?>> <? echo $industries[22];?> </option>
                <option value = <? echo $industries[23];?> <? if ($myEmployer->industryType == $industries[23]) echo "selected='selected'";?>> <? echo $industries[23];?> </option>
                <option value = <? echo $industries[24];?> <? if ($myEmployer->industryType == $industries[24]) echo "selected='selected'";?>> <? echo $industries[24];?> </option>
                <option value = "NEW" <? if (!in_array($myEmployer->industryType, $industries)) echo "selected='selected'";?>> -- OTHER --</option>
              </select>
              <br/>
                <input type="text" placeholder="New Industry Type" class="form-control" id="iNewIndustryType" name="iNewIndustryType"<? if (!in_array($myEmployer->industryType, $industries)) echo $myEmployer->industryType;?> size="20" />
            </div>
            </div>
            <div class="form-group">
              <div class="col-lg-10">
              <label for="inputMailingAddress" class="control-label">Mailing Address</label>
              <input type="text" value="<?php echo $myEmployer->completeMailingAddress; ?>" class="editbox form-control" name="iCompleteMailingAddress" size="20" />
              </div>
            </div>
            <div class="form-group">
              <div class="col-lg-10">
              <label for="inputTelephoneAddress" class="control-label">Telephone Number</label>
              <input type="text" value="<?php echo $myEmployer->telephoneNumber; ?>" class="editbox form-control" name="iTelephoneNumber" size="20" />
              </div>
            </div>
            <div class="form-group">
              <div class="col-lg-10">
              <label for="inputFaxNumber" class="control-label">Fax Number</label>
              <input type="text" value="<?php echo $myEmployer->faxNumber; ?>" class="editbox form-control" name="iFaxNumber" size="20" />
              </div>
            </div>
            <div class="form-group">
              <div class="col-lg-10">
              <label for="inputWebsite" class="control-label">Website</label>
              <input type="text" value="<?php echo $myEmployer->website; ?>" class="editbox form-control" name="iWebsite" size="20" />
              </div>
            </div>
            <div class="form-group">
              <div class="col-lg-10">
              <label for="inputDateEstablished" class="control-label">Date Established</label>
              <div class="input-group date">
                <input type="text" id="trigger-datepicker" name="iDateEstablished" class="form-control" value="<?php echo $myEmployer->dateEstablished; ?>"><span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
              </div>
              </div>
            </div>
            <div class="form-group">
              <div class="col-lg-10">
              <label for="inputHiring" class="control-label">Hiring</label>
              <div class="radio">
                <label>
                  <input type="radio" name="iHiring" id="iHiringYes" class="editbox" value = 1 <? if ($myEmployer->isHiring == 1) echo "checked";?> required /><span id="iHireYes" class="">Yes</span>
                </label>
              </div>
              <div class="radio">
                <label>
                  <input type="radio" name="iHiring" id="iHiringNo" class="editbox" value = 0 <? if ($myEmployer->isHiring == 0) echo "checked";?> required /><span id="iHireNo" class="">No</span>
                </label>
              </div>
              </div>
            </div>
            <div class="form-group">
              <div class="col-lg-10">
              <label for="inputAllowanceProvision" class="control-label">Allowance Provision</label>
              <div class="radio">
                <label>
                  <input type="radio" name="iAllowance" id="iAllowanceYes" class="editbox" value = 1 <? if ($myEmployer->hasAllowanceProvision == 1) echo "checked";?> required /><span id="iAllowYes" class="">Yes</span>
                </label>
              </div>
              <div class="radio">
                <label>
                  <input type="radio" name="iAllowance" id="iAllowanceNo" class="editbox" value = 0 <? if ($myEmployer->hasAllowanceProvision == 0) echo "checked";?> required /><span id="iAllowNo" class="">No</span>
                </label>
              </div>
              </div>
            </div>
            <div class="form-group">
              <div class="col-lg-10">
              <label for="inputOtherAvenuesForCollaboration" class="control-label">Other Avenues for Collaboration</label>
              <div class="checkbox">
                <label>
                  <input type="checkbox" name="iHasScholarshipGrants" value=1 <? if ($myEmployer->hasScholarshipGrants == 1) echo "checked";?> /> Scholarship Grants
                </label>
              </div>
              <div class="checkbox">
                <label>
                  <input type="checkbox" name="iHasSeminarsAndTrainings" value=1 <? if ($myEmployer->hasSeminarsAndTrainings == 1) echo "checked";?> /> Seminars & Trainings
                </label>
              </div>
              <div class="checkbox">
                <label>
                  <input type="checkbox" name="iHasRecruitmentActivities" value=1 <? if ($myEmployer->hasRecruitmentActivities == 1) echo "checked";?> /> Recruitment Activities
                </label>
              </div>
              <div class="checkbox">
                <label>
                  <input type="checkbox" name="iHasFacultyImmersion" value=1 <? if ($myEmployer->hasFacultyImmersion == 1) echo "checked";?> /> Faculty Immersion
                </label>
              </div>
              </div>
            </div>
        </div>
      </div>
      <!-- END COMPANY DETAILS -->

    <div class="modal-footer">
      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      <button type="submit" class="btn btn-primary">Update</button>
    </div>
    </div>
    </fieldset>
  </form>
  </div>
</div>
<!-- END UPDATE COMPANY PROFILE DIALOG -->

</body>
</html>