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
    <a class="navbar-brand" href="#">iACADEMY Online Placement System</a>
  </div>
  <div class="navbar-collapse collapse navbar-responsive-collapse">
    <ul class="nav navbar-nav">
          
      <li class="dropdown">
        <a href="<?php echo base_url();?>index.php/admincontroller/index" class="dropdown-toggle" data-toggle="dropdown">Admin <b class="caret"></b></a>
        <ul class="dropdown-menu">
          <li><a href="#">View Users</a></li>
          <li class="divider"></li>
          <li class="dropdown-header">Manage Users</li>
          <li><a href="#">Add User</a></li>
          <li><a href="#">Update User</a></li>
          <li><a href="#">Disable User</a></li>
        </ul>
      </li>
      <li><a href="<?php echo base_url();?>index.php/employer_controller/viewRepresentative">My Account</a></li>
      <li class="active"><a href="#">Employer</a></li>
      <li><a href="#">Alumni</a></li>
      <li><a href="#">Interns</a></li>
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Careers <b class="caret"></b></a>
        <ul class="dropdown-menu">
          <li><a href="#">View Careers</a></li>
          <li class="divider"></li>
          <li class="dropdown-header">Manage Careers</li>
          <li><a href="#">Add Job Opening</a></li>
          <li><a href="#">Update Job Opening</a></li>
          <li><a href="#">Remove Job Opening</a></li>
        </ul>
      </li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="<?php echo base_url();?>index.php/auth/logout">[<?php echo $this->ion_auth->user()->row()->username; ?>]Logout</a></li>
    </ul>
  </div>
</div>
<!-- END NAVIGATION BAR -->
    <!--
    <?php //echo $myEmployer->companyLogoFilePath;?>
    <?php
      //$image = 'new.png'; 
      //$content = file_get_contents($image); 
      //header('Content-Type: image/jpeg');
      //echo $content; exit();
    ?>
    -->
  <div id="empViewMyProfileDiv">
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
              <?php echo form_open_multipart('upload/uploadSECRegistration');?>
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
              <?php echo form_open_multipart('upload/uploadCompanyLogo');?>
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
              <?php echo form_open_multipart('upload/uploadOtherDocuments');?>
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
      <form class="form-horizontal" action="<?php echo base_url();?>index.php/employer_controller/updateEmployer" method="POST">
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