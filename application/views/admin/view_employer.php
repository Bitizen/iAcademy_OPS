<script type="text/javascript" language="javascript" src="<?php echo base_url();?>assets/js/jquery-1.7.2.js"></script>
<script type="text/javascript" language="javascript" src="<?php echo base_url();?>assets/js/bootstrap.js"></script>
<!-- START SCRIPTS -->
<script>
    $(document).on("click", ".viewEmployeeProfile", function () {
         <?php $courses = unserialize (COURSE_LIST);?>
         <?php $employmentStats = unserialize (ALUMNUS_EMPLOYMENT_STATUS);?>

         var fn = $(this).data('fne');
         var mn = $(this).data('mne');
         var ln = $(this).data('lne');
         var mob = $(this).data('mo');
         var phone = $(this).data('ll');
         var email = $(this).data('eae');
         var add = $(this).data('pae');
         var cId = $(this).data('cie');
         var sId = $(this).data('sie');
         var currentEmp = $(this).data('cee');

         document.getElementById("fullNameEmp").innerHTML = fn + " " + mn + " " + ln;
         document.getElementById("mobileEmp").innerHTML = mob;
         document.getElementById("landlineEmp").innerHTML = phone;
         document.getElementById("emailAddEmp").innerHTML = email;
         document.getElementById("physicalAddEmp").innerHTML = add;
         document.getElementById("courseEmp").innerHTML =  cId;
         document.getElementById("statusEmp").innerHTML =  sId;
         document.getElementById("currentEmployerEmp").innerHTML =  currentEmp;
      
         if (cId == 0){
            document.getElementById("courseEmp").innerHTML =  '<?php echo $courses[0]; ?>';
         }else if (cId == 1){
            document.getElementById("courseEmp").innerHTML =  '<?php echo $courses[1]; ?>';
         }else if (cId == 2){
            document.getElementById("courseEmp").innerHTML =  '<?php echo $courses[2]; ?>';
         }else if (cId == 3){
            document.getElementById("courseEmp").innerHTML =  '<?php echo $courses[3]; ?>';
         }else if (cId == 4){
            document.getElementById("courseEmp").innerHTML =  '<?php echo $courses[4]; ?>';
         }else if (cId == 5){
            document.getElementById("courseEmp").innerHTML =  '<?php echo $courses[5]; ?>';
         }else if (cId == 6){
            document.getElementById("courseEmp").innerHTML =  '<?php echo $courses[6]; ?>';
         }else if (cId == 7){
            document.getElementById("courseEmp").innerHTML =  '<?php echo $courses[7]; ?>';
         }

         if (cId == 0){
            document.getElementById("statusEmp").innerHTML =  '<?php echo $employmentStats[0]; ?>';
         }else if (sId == 1){
            document.getElementById("statusEmp").innerHTML =  '<?php echo $employmentStats[1]; ?>';
         }else if (sId == 2){
            document.getElementById("statusEmp").innerHTML =  '<?php echo $employmentStats[2]; ?>';
         }

         if (currentEmp == "" || currentEmp == null){
            document.getElementById("currentEmployerEmp").innerHTML =  "<?php echo 'N/A';?>";
          }
    });
</script>

<script>
    $(document).on("click", ".viewInternProfile", function () {
         <?php $courses = unserialize (COURSE_LIST);?>
         <?php $internStats = unserialize (INTERN_STATUS);?>

         var firstName = $(this).data('fn');
         var middleName = $(this).data('mn');
         var lastName = $(this).data('ln');
         var mobile = $(this).data('mobile');
         var landline = $(this).data('landline');
         var emailAdd = $(this).data('ea');
         var physicalAdd = $(this).data('pa');
         var courseId = $(this).data('ci');
         var statusId = $(this).data('si');
         var currentEmployer = $(this).data('ce');

         document.getElementById("fullName").innerHTML = firstName + " " + middleName + " " + lastName;
         document.getElementById("mobile").innerHTML = mobile;
         document.getElementById("landline").innerHTML = landline;
         document.getElementById("emailAdd").innerHTML = emailAdd;
         document.getElementById("physicalAdd").innerHTML = physicalAdd;
         document.getElementById("course").innerHTML = course;
         document.getElementById("status").innerHTML = status;
         document.getElementById("currentEmployer").innerHTML = currentEmployer;

         if (courseId == 0){
            document.getElementById("course").innerHTML = '<?php echo $courses[0]; ?>';
         }else if (courseId == 1){
            document.getElementById("course").innerHTML = '<?php echo $courses[1]; ?>';
         }else if (courseId == 2){
            document.getElementById("course").innerHTML = '<?php echo $courses[2]; ?>';
         }else if (courseId == 3){
            document.getElementById("course").innerHTML = '<?php echo $courses[3]; ?>';
         }else if (courseId == 4){
            document.getElementById("course").innerHTML = '<?php echo $courses[4]; ?>';
         }else if (courseId == 5){
            document.getElementById("course").innerHTML = '<?php echo $courses[5]; ?>';
         }else if (courseId == 6){
            document.getElementById("course").innerHTML = '<?php echo $courses[6]; ?>';
         }else if (courseId == 7){
            document.getElementById("course").innerHTML = '<?php echo $courses[7]; ?>';
         }

         if (statusId == 0){
            //$(".modal-body #status").val( '<?php echo $internStats[0]; ?>' );
            document.getElementById("status").innerHTML = '<?php echo $internStats[0]; ?>';
         }else if (statusId == 1){
            document.getElementById("status").innerHTML = '<?php echo $internStats[1]; ?>';
         }else if (statusId == 2){
            document.getElementById("status").innerHTML = '<?php echo $internStats[2]; ?>';
         }else if (statusId == 3){
            document.getElementById("status").innerHTML = '<?php echo $internStats[3]; ?>';
         }else if (statusId == 4){
            document.getElementById("status").innerHTML = '<?php echo $internStats[4]; ?>';
         }
          if (currentEmployer == "" || currentEmployer == null){
            document.getElementById("currentEmployer").innerHTML = "<?php echo 'N/A';?>";
          }
    });  
</script>
<!-- END SCRIPTS -->

  <div class="col-lg-10 col-lg-offset-1">
    <a id="editMyProfile" class="btn btn-info">Edit Profile</a>
  </div>

  <div id="viewEmployerDiv" class="col-lg-10 col-lg-offset-1">
    <legend>Employer Profile</legend>
    <ul class="nav nav-tabs" style="margin-bottom: 15px;">
      <li class="active"><a href="#company_details" data-toggle="tab">Company Details</a></li>
      <li><a href="#documents" data-toggle="tab">Documents</a></li>
      <li><a href="#representatives" data-toggle="tab">Representatives</a></li>
      <li><a href="#affiliates" data-toggle="tab">Affiliates</a></li>
    </ul>

    <!-- Start Tab Contents -->
    <div id="myTabContent" class="tab-content">
      <!-- Start Company Details -->
      <div class="tab-pane fade active in" id="company_details">
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
      </div>
      <!-- End Company Details -->
      <!-- Start Documents -->
      <div class="tab-pane fade" id="documents">
      <div class="panel panel-info">
        <div class="panel-heading"><h3 class="panel-title">Documents</h3></div>
        <div class="panel-body">
          <table class="tg">
            <tr>
              <td class="td-fields">SEC Registration</td>
              <td class="td-values">
                <?php if (strlen($myEmployer->SECRegistrationFilePath) != 0) {
                      if (substr($myEmployer->SECRegistrationFilePath, -3) == "pdf") {
                ?>
                      <a href="<?=base_url('index.php/administrator_controller/viewSECRegistration?eID='.$this->input->get('eID', TRUE));?>" target="_blank">View <?= $myEmployer->companyName;?>'s SEC Registration</a>
                <?      
                      } else if (substr($myEmployer->SECRegistrationFilePath, -3) == "png"
                              || substr($myEmployer->SECRegistrationFilePath, -3) == "jpg"
                              || substr($myEmployer->SECRegistrationFilePath, -3) == "gif") {
                      
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

                  }
                  else {
                    echo "No SEC Registration.";
                  }
                ?>
                <?php //if(strlen($uploadErrorSEC != 0)) echo $uploadErrorSEC;?>
                <?php echo form_open_multipart('administrator_controller/uploadSECRegistration?eID='.$myEmployer->employerID.'');?>
                  <input type="file" name="userfile" size="20" />
                  <br/>
                  <input type="submit" class="btn btn-default" value="Upload SEC Registration" />
                </form>
              </td>
            </tr>
            <tr>
              <td class="td-fields">Company Logo</td>
              <td class="td-values">
                <?php if($myEmployer->companyLogoFilePath!=null) {
                      /*
                      $image_properties = array(
                                'src' => base_url().$myEmployer->companyLogoFilePath,
                                'alt' => $myEmployer->companyName.' Company Logo',
                                'class' => '',
                                'width' => '180',
                                'height' => '100',
                                'title' => $myEmployer->companyName.' Company Logo'
                      );

                      echo img($image_properties);
                      */
                    }
                    else {
                      echo "No Company Logo.";
                    }
                ?>
                <?php //if($uploadErrorLogo != null) echo $uploadErrorLogo;?>
                <?php echo form_open_multipart('administrator_controller/uploadCompanyLogo?eID='.$myEmployer->employerID.'');?>
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
                      /*
                      $image_properties = array(
                                'src' => base_url().$myEmployer->otherDocumentsFilePath,
                                'alt' => $myEmployer->companyName.' Other Documents',
                                'class' => '',
                                'width' => '100',
                                'height' => '150',
                                'title' => $myEmployer->companyName.' Other Documents'
                      );

                      echo img(base_url().$myEmployer->otherDocumentsFilePath);
                      */
                    }
                    else {
                      echo "No Other Documents.";
                    }
                ?>
                <br/>
                <?php //if($uploadErrorOther != null) echo $uploadErrorOther;?>
                <?php echo form_open_multipart('administrator_controller/uploadOtherDocuments?eID='.$myEmployer->employerID.'');?>
                  <input type="file" name="userfile" size="20" />
                  <br/>
                  <input type="submit" class="btn btn-default" value="Upload Other Documents" />
                </form>
              </td>
            </tr>
          </table>
        </div>
      </div>
      </div>
      <!-- End Documents -->
      <!-- Start Representatives -->
      <div class="tab-pane fade" id="representatives">

      <?php 
        $contactSlots = 0;
      ?>

        <!-- PRIMAY CONTACY -->
        <?php if($myEmployerContacts['first']->first_name != null && $myEmployerContacts['first']->first_name != "") { ?>
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
        <?php } 
        else {
          $contactSlots += 1;
        }
        ?>
        <!-- END PRIMARY CONTACT-->

        <!-- SECONDARY CONTACY -->
        <?php if($myEmployerContacts['second']->first_name != null && $myEmployerContacts['second']->first_name != ""
              && ($myEmployerContacts['first']->first_name != $myEmployerContacts['second']->first_name
              && $myEmployerContacts['first']->last_name != $myEmployerContacts['second']->last_name)) {?>
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
        <?php }
        else {
          $contactSlots += 1;
        }
        ?>
        <!-- END SECONDARY CONTACT-->

        <!-- TERTIARY CONTACY -->
        <?php if($myEmployerContacts['third']->first_name != null && $myEmployerContacts['third']->first_name != ""
              && ($myEmployerContacts['third']->first_name != $myEmployerContacts['second']->first_name
              && $myEmployerContacts['third']->last_name != $myEmployerContacts['second']->last_name)) {?>
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
        <?php }
        else {
          $contactSlots += 1;
        }
        ?>
        <!-- END TERTIARY CONTACT-->

      <?php if($contactSlots > 0){
          echo '<a id="addContactBtn" class="btn btn-info">Add Contact</a>';
      }?>

      </div>
      <!-- End Representatives -->
      <!-- Start Affiliates -->
      <div class="tab-pane fade" id="affiliates">
        <div class="panel panel-info">
          <div class="panel-heading"><h3 class="panel-title">Affiliated Students</h3></div>
          <div class="panel-body">
                <table id="table1" class="table table-striped table-hover">
                <thead> 
                  <tr class="active">
                    <th class="td-values">Lastname</th>
                    <th class="td-values">Firstname</th>
                    <th class="td-values">Middlename</th>
                    <th class="td-values">Position</th>
                    <th class="td-values">Affiliation Status</th>
                    <th class="td-values">Affiliation Status</th>
                  </tr>
                  </thead>
                  <tbody> 
                <?php foreach($myEmployerAffiliatedStudents as $student):?>
                  <tr class="active">
                  
                    <td class="td-values"> <a data-toggle="modal" href="#dialog-view-intern-profile" class="viewInternProfile" 
                          data-fn="<?php echo $student->firstName;?>"
                          data-mn="<?php echo $student->middleName;?>"
                          data-ln="<?php echo $student->lastName;?>"
                          data-mobile="<?php echo $student->mobile;?>"
                          data-landline="<?php echo $student->landline;?>"
                          data-ea="<?php echo $student->emailAddress;?>"
                          data-pa="<?php echo $student->address;?>"
                          data-ci="<?php echo $student->courseID;?>"
                          data-si="<?php echo $student->statusID;?>"
                          data-ce="<?php echo $student->companyName;?>"
                      > <?=$student->lastName?> </a></td>
                    <td class="td-values"> <?=$student->firstName?> </td>
                    <td class="td-values"> <?=$student->middleName?> </td> 
                    <td class="td-values"> <?=$student->position?> </td>
                    <td class="td-values"> <?php if ($student->startDate != 0000-00-00 && $student->endDate != 0000-00-00) { 
                        echo "Past";
                    }else if($student->endDate == 0000-00-00){
                        echo "Current";
                    }
                    ?></td>
                     <td class="td-values"> <?php if ($student->isGraduate == 0) { 
                    echo "Intern";
                }else if($student->isGraduate == 1){
                    echo "Alumnus";
                }
                ?></td>            
                  </tr>
                 <?php endforeach;?>
                 </tbody>
                 </table>
          </div>
        </div>
      <!-- End Affiliates -->

    <!-- Start View Affiliated Employee Profile -->
    <div class="modal fade" id="dialog-view-employee-profile" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
              <h4 class="modal-title">Employee Profile</h4>
          </div>
          <div class="panel-body">
            <div class="modal-body">
              <table class="employeeProfileTbl">
                <tr>
                  <td><h5 class="text-primary"><strong>FULLNAME</strong></h5></td>
                  <td><div type="text" id="fullNameEmp" class="text-primary" ></div></td>
                </tr>
                <tr>
                  <td><h5 class="text-primary"><strong>MOBILE</strong></h5></td>
                  <td><div type="text" id="mobileEmp" class="text-primary" ></div></td>
                </tr>
                <tr>
                  <td><h5 class="text-primary"><strong>LANDLINE</strong></h5></td>
                  <td><div type="text" id="landlineEmp" class="text-primary" ></div></td>
                </tr>
                <tr>
                  <td><h5 class="text-primary"><strong>EMAIL</strong></h5></td>
                  <td><div type="text" id="emailAddEmp" class="text-primary" ></div></td>
                </tr>
                <tr>
                  <td><h5 class="text-primary"><strong>ADDRESS</strong></h5></td>
                  <td><div type="text" id="physicalAddEmp" class="text-primary" ></div></td>
                </tr>
                <tr>
                  <td><h5 class="text-primary"><strong>COURSE</strong></h5></td>
                  <td><div type="text" id="courseEmp" class="text-primary" ></div></td>
                </tr>
                <tr>
                  <td><h5 class="text-primary"><strong>EMPLOYMENT STATUS</strong></h5></td>
                  <td><div type="text" id="statusEmp" class="text-primary" ></div></td>
                </tr>
                <tr>
                  <td><h5 class="text-primary"><strong>CURRENT EMPLOYER</strong></h5></td>
                  <td><div type="text" id="currentEmployerEmp" class="text-primary" ></div></td>
                </tr>
              </table>
            </div>
            <div class="modal-footer"></div>
          </div>
        </div>
      </div>
    </div>
    <!-- End View Affiliated Employee Profile -->

    <!-- Start View Affiliated Intern Profile -->
    <div class="modal fade" id="dialog-view-intern-profile" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
              <h4 class="modal-title">Intern Profile</h4>
            </div>
          <div class="panel-body">
          <div class="modal-body">
            <table class="internProfileTbl">
              <tr>
                <td><h5 class="text-primary"><strong>FULLNAME</strong></h5></td>
                <td><div type="text" id="fullName" class="text-primary" ></div></td>
              </tr>
              <tr>
                <td><h5 class="text-primary"><strong>MOBILE</strong></h5></td>
                <td><div type="text" id="mobile" class="text-primary" ></div></td>
              </tr>
              <tr>
                <td><h5 class="text-primary"><strong>LANDLINE</strong></h5></td>
                <td><div type="text" id="landline" class="text-primary" ></div></td>
              </tr>
              <tr>
                <td><h5 class="text-primary"><strong>EMAIL</strong></h5></td>
                <td><div type="text" id="emailAdd" class="text-primary" ></div></td>
              </tr>
              <tr>
                <td><h5 class="text-primary"><strong>ADDRESS</strong></h5></td>
                <td><div type="text" id="physicalAdd" class="text-primary" ></div></td>
              </tr>
              <tr>
                <td><h5 class="text-primary"><strong>COURSE</strong></h5></td>
                <td><div type="text" id="course" class="text-primary" ></div></td>
              </tr>
              <tr>
                <td><h5 class="text-primary"><strong>INTERNSHIP STATUS</strong></h5></td>
                <td><div type="text" id="status" class="text-primary" ></div></td>
              </tr>
              <tr>
                <td><h5 class="text-primary"><strong>CURRENT EMPLOYER</strong></h5></td>
                <td><div type="text" id="currentEmployer" class="text-primary" ></div></td>
              </tr>
            </table>
          </div>
          <div class="modal-footer">
          </div>
          </div>
        </div>
      </div>
    </div>
    <!-- End View Affiliated Inter Profile -->

    </div>
    <!-- End Tab Contents -->
  </div>




<!-- START ADD CONTACT MODAL -->
<div id="addContactDiv" class="modal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title">Add Contact</h4>
      </div>
      <div class="modal-body">
      <!-- ADD CONTACT FORM -->
      <form action="<?php echo base_url();?>index.php/administrator_controller/addRepresentative" method="post" 
            class="form-horizontal" accept-charset="utf-8" onSubmit="return confirm('Are you sure?')">

      <div class="panel panel-info">
        <div class="panel-heading">
          <h3 class="panel-title">Basic Info</h3>
        </div>
        <div class="panel-body">
          <div class="form-group">
            <label for="first_name" class="col-lg-3 control-label">First Name:</label>
            <div class="col-lg-8">
            <input type="text" name="first_name" value="" id="first_name" class="form-control input-sm" required />
             </div>
          </div>


          <div class="form-group">   
            <label for="middle_name" class="col-lg-3 control-label">Middle Name:</label>            
            <div class="col-lg-8">
              <input type="text" name="middle_name" value="" id="middle_name" class="form-control input-sm" required />
            </div>
          </div>

          <div class="form-group">     
            <label for="last_name" class="col-lg-3 control-label">Last Name:</label>            
            <div class="col-lg-8">
              <input type="text" name="last_name" value="" id="last_name"  class="form-control input-sm"required />    
            </div>
          </div>


           <div class="form-group">
            <label for="position" class="col-lg-3 control-label">Position:</label>            
            <div class="col-lg-8">
              <input type="text" name="position" value="" id="position" class="form-control input-sm" required/>     
            </div>
          </div>


           <div class="form-group">
            <label for="landline" class="col-lg-3 control-label">Phone:</label>            
            <div class="col-lg-8">
              <input type="text" name="landline" value="" id="landline" class="form-control input-sm"  required/>    
            </div>
          </div>      

           <div class="form-group">
            <label for="mobile" class="col-lg-3 control-label">Mobile:</label>            
            <div class="col-lg-8">
              <input type="text" name="mobile" value="" id="mobile" class="form-control input-sm" />
            </div>
           </div> 

            <div class="form-group">
              <label for="dateOfBirth" class="col-lg-3 control-label">Date Of Birth:</label>
              <div class="col-lg-8">
                <input type="text" id="trigger-datepicker" name="dateOfBirth" class="form-control input-sm" ><!--<span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>-->
              </div>
            </div>
       </div>
      </div>

      <div class="panel panel-info">
        <div class="panel-heading">
          <h3 class="panel-title">Account info</h3>
        </div>
        <div class="panel-body">
           <div class="form-group">
            <label for="email" class="col-lg-3 control-label">Email:</label>            
            <div class="col-lg-8">
              <input type="text" name="email" value="" id="email" class="form-control input-sm"  required/>   
            </div>
          </div>

           <div class="form-group">
            <label for="username" class="col-lg-3 control-label">Username:</label>            
            <div class="col-lg-8">
              <input type="text" name="username" value="" id="username" class="form-control input-sm" required/>
            </div>
          </div>

           <div class="form-group">
            <label for="password" class="col-lg-3 control-label">Password:</label>            
            <div class="col-lg-8">
              <input type="password" name="password" value="" id="password" class="form-control input-sm" required/>
            </div>
          </div>

           <div class="form-group">
            <label for="password_confirm" class="col-lg-3 control-label">Confirm Password:</label>            
            <div class="col-lg-8">
              <input type="password" name="password_confirm" value="" id="password_confirm" class="form-control input-sm" required/>
            </div>
          </div>
       </div>
      </div>

      <div class="form-group">
        <label for="password_confirm" class="col-lg-8 control-label"></label>            
      </div>

     <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-primary">Add Contact</button>
     </div>
    </form>    
      <!-- END ADD CONTACT FORM -->
    </div>
  </div>
</div>
</div>
<!-- END ADD CONTACT MODAL -->

<!-- Start Update Company Profile -->
<div class="modal fade" id="dialog-edit-company-profile" >
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title"><?php echo $myEmployer->companyName;?></h4>
      <div class="modal-body">
 
      <!-- COMPANY DETAILS -->
      <form class="form-horizontal" action="<?php echo base_url();?>index.php/administrator_controller/updateEmployer?eID=<? echo $myEmployer->employerID;?>" method="POST">
        <fieldset>
        <div class="panel panel-info">
          <div class="panel-heading">
            <h3 class="panel-title">Company Details</h3>
          </div>
          <div class="panel-body">
            <div class="form-group">
              <div class="col-lg-10">
              <label for="inputCompanyName" class="">Company Name</label>
                <input type="text" value="<?php echo $myEmployer->companyName; ?>" class="editbox form-control" name="iCompanyName" size="20" />
              </div>
            </div>
            <div class="form-group">
              <div class="col-lg-10">
              <label for="inputIndustryType" class="">Industry Type</label>
              <select id="iIndustryType" name="iIndustryType" class="editbox form-control" required>
                <?php 
                  $industries = unserialize (INDUSTRY_LIST);
                  $i=0;
                  foreach ($industries as $industry) { ?>
                  <option value = <? echo $industry;?> <? if ($myEmployer->industryType == $industries[$i]) echo "selected='selected'";?>> <? echo $industry;?> </option>
                <?php $i++; } ?>
                <option value = "NEW" <? if (!in_array($myEmployer->industryType, $industries)) echo "selected='selected'";?>> -- OTHER --</option>
              </select>
              <br/>
                <input type="text" placeholder="New Industry Type" class="form-control" id="iNewIndustryType" name="iNewIndustryType"<? if (!in_array($myEmployer->industryType, $industries)) echo $myEmployer->industryType;?> size="20" />
            </div>
            </div>
            <div class="form-group">
              <div class="col-lg-10">
              <label for="inputMailingAddress" class="">Mailing Address</label>
              <input type="text" value="<?php echo $myEmployer->completeMailingAddress; ?>" class="editbox form-control" name="iCompleteMailingAddress" size="20" />
              </div>
            </div>
            <div class="form-group">
              <div class="col-lg-10">
              <label for="inputTelephoneAddress" class="">Telephone Number</label>
              <input type="text" value="<?php echo $myEmployer->telephoneNumber; ?>" class="editbox form-control" name="iTelephoneNumber" size="20" />
              </div>
            </div>
            <div class="form-group">
              <div class="col-lg-10">
              <label for="inputFaxNumber" class="">Fax Number</label>
              <input type="text" value="<?php echo $myEmployer->faxNumber; ?>" class="editbox form-control" name="iFaxNumber" size="20" />
              </div>
            </div>
            <div class="form-group">
              <div class="col-lg-10">
              <label for="inputWebsite" class="">Website</label>
              <input type="text" value="<?php echo $myEmployer->website; ?>" class="editbox form-control" name="iWebsite" size="20" />
              </div>
            </div>
            <div class="form-group">
              <div class="col-lg-10">
              <label for="inputDateEstablished" class="">Date Established</label>
              <div class="input-group date">
                <input type="text" id="trigger-datepicker" name="iDateEstablished" class="form-control" value="<?php echo $myEmployer->dateEstablished; ?>"><span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
              </div>
              </div>
            </div>
            <div class="form-group">
              <div class="col-lg-10">
              <label for="inputHiring" class="">Hiring</label>
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
              <label for="inputAllowanceProvision" class="">Allowance Provision</label>
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
              <label for="inputOtherAvenuesForCollaboration" class="">Other Avenues for Collaboration</label>
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
<!-- End Update Company Profile -->

</body>
</html>