
  <div id="viewEmployerDiv" class="col-lg-10 col-lg-offset-1">
    <legend>Employer Profile</legend>
    
     <ul class="nav nav-tabs" style="margin-bottom: 15px;">
      <li class="active"><a href="#company_details" data-toggle="tab">Company Details</a></li>
      <li><a href="#representatives" data-toggle="tab">Representatives</a></li>
    </ul>
    <div id="myTabContent" class="tab-content">
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

</body>
</html>