
  <!-- START NEWLY ADDED SCRIPTS -->
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

         $(".modal-body #fullNameEmp").val( fn + " " + mn + " " + ln );
         $(".modal-body #mobileEmp").val( mob );
         $(".modal-body #landlineEmp").val( phone );
         $(".modal-body #emailAddEmp").val( email );
         $(".modal-body #physicalAddEmp").val( add );
         $(".modal-body #courseEmp").val( cId );
         $(".modal-body #statusEmp").val( sId );
         $(".modal-body #currentEmployerEmp").val( currentEmp );
        
         if (cId == 0){
            $(".modal-body #courseEmp").val( '<?php echo $courses[0]; ?>' );
         }else if (cId == 1){
            $(".modal-body #courseEmp").val( '<?php echo $courses[1]; ?>' );
         }else if (cId == 2){
            $(".modal-body #courseEmp").val( '<?php echo $courses[2]; ?>' );
         }else if (cId == 3){
            $(".modal-body #courseEmp").val( '<?php echo $courses[3]; ?>' );
         }else if (cId == 4){
            $(".modal-body #courseEmp").val( '<?php echo $courses[4]; ?>' );
         }else if (cId == 5){
            $(".modal-body #courseEmp").val( '<?php echo $courses[5]; ?>' );
         }else if (cId == 6){
            $(".modal-body #courseEmp").val( '<?php echo $courses[6]; ?>' );
         }else if (cId == 7){
            $(".modal-body #courseEmp").val( '<?php echo $courses[7]; ?>' );
         }

         if (cId == 0){
            $(".modal-body #statusEmp").val( '<?php echo $employmentStats[0]; ?>' );
         }else if (sId == 1){
            $(".modal-body #statusEmp").val( '<?php echo $employmentStats[1]; ?>' );
         }else if (sId == 2){
            $(".modal-body #statusEmp").val( '<?php echo $employmentStats[2]; ?>' );
         }

         if (currentEmp == "" || currentEmp == null){
            $(".modal-body #currentEmployerEmp").val( "<?php echo 'N/A';?>" );
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

         $(".modal-body #fullName").val( firstName + " " + middleName + " " + lastName );
         $(".modal-body #mobile").val( mobile );
         $(".modal-body #landline").val( landline );
         $(".modal-body #emailAdd").val( emailAdd );
         $(".modal-body #physicalAdd").val( physicalAdd );
         $(".modal-body #course").val( courseId );
         $(".modal-body #status").val( statusId );
         $(".modal-body #currentEmployer").val( currentEmployer );

         if (courseId == 0){
            $(".modal-body #course").val( '<?php echo $courses[0]; ?>' );
         }else if (courseId == 1){
            $(".modal-body #course").val( '<?php echo $courses[1]; ?>' );
         }else if (courseId == 2){
            $(".modal-body #course").val( '<?php echo $courses[2]; ?>' );
         }else if (courseId == 3){
            $(".modal-body #course").val( '<?php echo $courses[3]; ?>' );
         }else if (courseId == 4){
            $(".modal-body #course").val( '<?php echo $courses[4]; ?>' );
         }else if (courseId == 5){
            $(".modal-body #course").val( '<?php echo $courses[5]; ?>' );
         }else if (courseId == 6){
            $(".modal-body #course").val( '<?php echo $courses[6]; ?>' );
         }else if (courseId == 7){
            $(".modal-body #course").val( '<?php echo $courses[7]; ?>' );
         }

         if (statusId == 0){
            $(".modal-body #status").val( '<?php echo $internStats[0]; ?>' );
         }else if (statusId == 1){
            $(".modal-body #status").val( '<?php echo $internStats[1]; ?>' );
         }else if (statusId == 2){
            $(".modal-body #status").val( '<?php echo $internStats[2]; ?>' );
         }else if (statusId == 3){
            $(".modal-body #status").val( '<?php echo $internStats[3]; ?>' );
         }else if (statusId == 4){
            $(".modal-body #status").val( '<?php echo $internStats[4]; ?>' );
         }
          if (currentEmployer == "" || currentEmployer == null){
            $(".modal-body #currentEmployer").val( "<?php echo 'N/A';?>" );
          }
    });  
  </script>
  <!-- END NEWLY ADDED SCRIPTS -->

  <div id="viewEmployerDiv" class="col-lg-10 col-lg-offset-1">
    <legend>Employer Profile <img id="editMyProfile" src="<?php echo base_url();?>assets/images/edit.png" alt="Edit Company Profile" width="25" height="25" /></legend>
    
     <ul class="nav nav-tabs" style="margin-bottom: 15px;">
      <li class="active"><a href="#company_details" data-toggle="tab">Company Details</a></li>
      <li><a href="#documents" data-toggle="tab">Documents</a></li>
      <li><a href="#representatives" data-toggle="tab">Representatives</a></li>
      <li><a href="#affiliates" data-toggle="tab">Affiliates</a></li>
    </ul>
    <div id="myTabContent" class="tab-content">
      <!-- Start NEWLY ADDED View Intern Profile -->
  <div class="modal fade" id="dialog-view-intern-profile" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
        <div class="panel panel-default">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <div class="panel-heading"><h3 class="panel-title">Intern Profile</h3></div>
        </div>
        <div class="panel-body">
        <div class="modal-body">
          <table class="internProfileTbl">
            <tr>
              <td><h6 class="text-info">FULLNAME</h6></td>
              <td><input type="text" id="fullName" class="text-primary" value="" readonly/></td>
            </tr>
            <tr>
              <td><h6 class="text-info">MOBILE</h6></td>
              <td><input type="text" id="mobile" class="text-primary" value="" readonly/></td>
            </tr>
            <tr>
              <td><h6 class="text-info">LANDLINE</h6></td>
              <td><input type="text" id="landline" class="text-primary" value="" readonly/></td>
            </tr>
            <tr>
              <td><h6 class="text-info">EMAIL</h6></td>
              <td><input type="text" id="emailAdd" class="text-primary" value="" readonly /></td>
            </tr>
            <tr>
              <td><h6 class="text-info">ADDRESS</h6></td>
              <td><input type="text" id="physicalAdd" class="text-primary" value="" readonly/></td>
            </tr>
            <tr>
              <td><h6 class="text-info">COURSE</h6></td>
              <td><input type="text" id="course" class="text-primary" value="" readonly/></td>
            </tr>
            <tr>
              <td><h6 class="text-info">INTERNSHIP STATUS</h6></td>
              <td><input type="text" id="status" class="text-primary" value="" readonly /></td>
            </tr>
            <tr>
              <td><h6 class="text-info">CURRENT EMPLOYER</h6></td>
              <td><input type="text" id="currentEmployer" class="text-primary" value="" readonly/></td>
            </tr>
          </table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
        </div>
      </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->
  <!-- End NEWLY ADDED View Intern Profile -->

<!-- Start NEWLY ADDED View Employee Profile -->
  <div class="modal fade" id="dialog-view-employee-profile" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
        <div class="panel panel-default">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <div class="panel-heading"><h3 class="panel-title">Employee Profile</h3></div>
        </div>
        <div class="panel-body">
        <div class="modal-body">
          <table class="employeeProfileTbl">
            <tr>
              <td><h6 class="text-info">FULLNAME</h6></td>
              <td><input type="text" id="fullNameEmp" class="text-primary" value="" readonly/></td>
            </tr>
            <tr>
              <td><h6 class="text-info">MOBILE</h6></td>
              <td><input type="text" id="mobileEmp" class="text-primary" value="" readonly/></td>
            </tr>
            <tr>
              <td><h6 class="text-info">LANDLINE</h6></td>
              <td><input type="text" id="landlineEmp" class="text-primary" value="" readonly/></td>
            </tr>
            <tr>
              <td><h6 class="text-info">EMAIL</h6></td>
              <td><input type="text" id="emailAddEmp" class="text-primary" value="" readonly/></td>
            </tr>
            <tr>
              <td><h6 class="text-info">ADDRESS</h6></td>
              <td><input type="text" id="physicalAddEmp" class="text-primary" value="" readonly/></td>
            </tr>
            <tr>
              <td><h6 class="text-info">COURSE</h6></td>
              <td><input type="text" id="courseEmp" class="text-primary" value="" readonly/></td>
            </tr>
            <tr>
              <td><h6 class="text-info">EMPLOYMENT STATUS</h6></td>
              <td><input type="text" id="statusEmp" class="text-primary" value="" readonly/></td>
            </tr>
            <tr>
              <td><h6 class="text-info">CURRENT EMPLOYER</h6></td>
              <td><input type="text" id="currentEmployerEmp" class="text-primary" value=""readonly /></td>
            </tr>
          </table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
        </div>
      </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->
  <!-- End NEWLY ADDED View Employee Profile -->

  <!-- NEWLY ADDED VIEW LIST OF AFFILIATES - INTERNS -->
  <div class="tab-pane fade" id="affiliates">
    <div class="panel panel-info">
      <div class="panel-heading"><h3 class="panel-title">Interns</h3></div>
      <div class="panel-body">
            <table id="table1" class="table table-striped table-hover">
            <thead> 

              <tr class="success">
       
                <th class="td-values">Firstname</th>
                <th class="td-values">Middlename</th>
                <th class="td-values">Lastname</th>
                <th class="td-values">Position</th>
                <th class="td-values">Affiliation Status</th>
                <th class="td-values">View</th>
              </tr>
              </thead>
              <tbody> 
            <?php foreach($myEmployerAffiliatedInterns as $student):?>
              <tr class="active">
              
                <td class="td-values"> <?=$student->firstName?> </td>
                <td class="td-values"> <?=$student->middleName?> </td> 
                <td class="td-values"> <?=$student->lastName?> </td> 
                <td class="td-values"> <?=$student->position?> </td>
                <td class="td-values"> <?php if ($student->startDate != 0000-00-00 && $student->endDate != 0000-00-00) { 
                    echo "Past";
                }else if($student->endDate == 0000-00-00){
                    echo "Current";
                }
                ?></td>
                <td class="td-values"> 
                  <a data-toggle="modal" href="#dialog-view-intern-profile"  class="viewInternProfile btn btn-link" 
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
                  >View</a>
                </td>
              </tr>
             <?php endforeach;?>
             </tbody>
             </table>
      </div>
    </div>
    <!-- NEWLY ADDED END VIEW LIST OF AFFILIATES - INTERNS -->

    <!-- NEWLY ADDED VIEW LIST OF AFFILIATES - EMPLOYEES -->
    <div class="panel panel-info">
      <div class="panel-heading"><h3 class="panel-title">Employees</h3></div>
      <div class="panel-body">
           <table id="table2"  class="table table-striped table-hover" >
            <thead> 
              <tr class="success">
         
                <th class="td-values">Firstname</th>
                <th class="td-values">Middlename</th>
                <th class="td-values">Lastname</th>
                <th class="td-values">Position</th>
                <th class="td-values">Affiliation Status</th>
                <th class="td-values">View</th>
              </tr>
              </thead>
              <tbody> 
            <?php foreach($myEmployerAffiliatedEmployees as $employee):?>
              <tr class="active">
       
                <td class="td-values"> <?=$employee->firstName?> </td>
                <td class="td-values"> <?=$employee->middleName?> </td> 
                <td class="td-values"> <?=$employee->lastName?> </td>
                <td class="td-values"> <?=$employee->position?> </td>
                <td class="td-values"> <?php if ($employee->startDate != 0000-00-00 && $employee->endDate != 0000-00-00) { 
                    echo "Past";
                }else if($employee->endDate == 0000-00-00){
                    echo "Current";
                }
                ?></td>
        
                  <td class="td-values"> 
                  <a data-toggle="modal" href="#dialog-view-employee-profile"  class="viewEmployeeProfile btn btn-link" 
                      data-fne="<?php echo $employee->firstName;?>"
                      data-mne="<?php echo $employee->middleName;?>"
                      data-lne="<?php echo $employee->lastName;?>"
                      data-mo="<?php echo $employee->mobile;?>"
                      data-ll="<?php echo $employee->landline;?>"
                      data-eae="<?php echo $employee->emailAddress;?>"
                      data-pae="<?php echo $employee->address;?>"
                      data-cie="<?php echo $employee->courseID;?>"
                      data-sie="<?php echo $employee->statusID;?>"
                      data-cee="<?php echo $employee->companyName;?>"
                  >View</a>
                </td> 
                
              </tr>
             <?php endforeach;?>
              </tbody>
             </table>
      </div>
    </div>
  </div>
  <!-- NEWLY ADDED END VIEW LIST OF EMPLOYEES -->

    <!-- COMPANY DETAILS -->
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
    <!-- END COMPANY DETAILS-->

    <!-- DOCUMENTS -->
    <div class="tab-pane fade" id="documents">
    <div class="panel panel-info">
      <div class="panel-heading"><h3 class="panel-title">Documents</h3></div>
      <div class="panel-body">
        <table class="tg">
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
                    echo "No SEC Registration.";
                  }
              ?>
              <?php //if(strlen($uploadErrorSEC != 0)) echo $uploadErrorSEC;?>
              <?php echo form_open_multipart('employer_controller/uploadSECRegistration?eID=<?php echo $myEmployer->employerID;?>');?>
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
                    echo "No Company Logo.";
                  }
              ?>
              <?php //if($uploadErrorLogo != null) echo $uploadErrorLogo;?>
              <?php echo form_open_multipart('employer_controller/uploadCompanyLogo');?>
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
                    echo "No Other Documents.";
                  }
              ?>
              <br/>
              <?php //if($uploadErrorOther != null) echo $uploadErrorOther;?>
              <?php echo form_open_multipart('employer_controller/uploadOtherDocuments');?>
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
    <!-- END DOCUMENTS -->

    <!-- PRIMAY CONTACY -->
    <div class="tab-pane fade" id="representatives">
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
    <?php } ?>
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
    <?php } ?>
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
    <?php } ?>
    <!-- END TERTIARY CONTACT-->
  </div>
  </div>


<!-- UPDATE COMPANY PROFILE DIALOG -->
<div class="modal" id="dialog-edit-company-profile" >
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title"><?php echo $myEmployer->companyName;?></h4>
      <div class="modal-body">
 
      <!-- COMPANY DETAILS -->
      <form class="form-horizontal" action="<?php echo base_url();?>index.php/employer_controller/updateEmployer?eID=<? echo $myEmployer->employerID;?>" method="POST">
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

<!-- START VIEW AFFILIATED INTERN'S PROFILE -->
    <div id="dialog-view-intern-profile" class="modal">
    <div class="modal-dialog">
      <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
           <h3 id="myModalLabel">Modal header</h3>

      </div>
      <div class="modal-body">
          <p>One fine body…</p>
      </div>
      <div class="modal-footer">
          <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
          <button class="btn btn-primary">Save changes</button>
      </div>
      </div>
  </div>
<!-- END VIEW AFFILIATED INTERN'S PROFILE -->
</body>
</html>