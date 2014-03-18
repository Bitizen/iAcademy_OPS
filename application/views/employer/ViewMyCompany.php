<!doctype html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <title>iAcademy Online Placement System</title>
  <script src="//code.jquery.com/jquery-1.9.1.js"></script>
  <script src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
  <script type="text/javascript" src="/js/default.js"></script>
  <script type="text/javascript" src="/js/jquery-1.7.2.js"></script>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">
  <link rel="stylesheet" href="assets/css/default.css" type="text/css" media="all"/>
  <link rel="stylesheet" href="assets/css/jquery-ui.css" type="text/css" media="all"/>
  <link rel="stylesheet" href="assets/css/style.css" type="text/css" media="all"/>
  <link rel="shortcut icon" href="http://iacademy.edu.ph/main/wp-content/uploads/2011/05/logoonly1-300x264.png" />

</head>

<body>
  <div>
    <h1>iAcademy Online Placement System</h1>
  </div>
  <a href="customauth/logout">Logout</a>

  Logo: DO LATER<br/><br/>
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
    <span class='span-table-title'>Company Details</span>
    <img id="editMyProfile" src="assets/img/edit.png" alt="Update" width="25" height="25" /><br/><br/>
    <input type='hidden' value='<?php echo $myEmployer->employerID;?>'/>
    <table class="tg">
      <tr>
        <th class="tg-uce2">Employer ID</th>
        <th class="tg-efv9"><?php echo $myEmployer->employerID;?></th>
      </tr>
      <tr>
        <td class="tg-e3zv">Company Name</td>
        <td class="tg-031e"><?php echo $myEmployer->companyName;?></td>
      </tr>
      <tr>
        <td class="tg-e3zv">Industry</td>
        <td class="tg-031e"><?php echo $myEmployer->industryID;?></td>
      </tr>
      <tr>
        <td class="tg-e3zv">SEC Registration</td>
        <td class="tg-031e"><?php echo $myEmployer->SECRegistrationFilePath;?></td>
      </tr>
      <tr>
        <td class="tg-031e">Mailing Address</td>
        <td class="tg-031e"><?php echo $myEmployer->completeMailingAddress;?></td>
      </tr>
      <tr>
        <td class="tg-031e">Telephone Number</td>
        <td class="tg-031e"><?php echo $myEmployer->telephoneNumber;?></td>
      </tr>
      <tr>
        <td class="tg-031e">Fax Number</td>
        <td class="tg-031e"><?php echo $myEmployer->faxNumber;?></td>
      </tr>
      <tr>
        <td class="tg-031e">Website</td>
        <td class="tg-031e"><?php echo $myEmployer->website;?></td>
      </tr>
      <tr>
        <td class="tg-031e">Date Established</td>
        <td class="tg-031e"><?php echo $myEmployer->dateEstablished;?></td>
      </tr>
      <tr>
        <td class="tg-e3zv">Hiring</td>
        <td class="tg-031e"><?php echo $myEmployer->isHiring;?></td>
      </tr>
    </table>

    <br/><br/><br/>

    <span class='span-table-title'>Primary Contact</span><br/><br/>
    <table class="tg">
      <tr>
        <td class="tg-031e">Name</td>
        <td class="tg-031e"><?php echo $myEmployer->primaryContactName;?></td>
      </tr>
      <tr>
        <td class="tg-031e">Designation</td>
        <td class="tg-031e"><?php echo $myEmployer->primaryContactDesignation;?></td>
      </tr>
      <tr>
        <td class="tg-031e">Telephone Number</td>
        <td class="tg-031e"><?php echo $myEmployer->primaryContactTelephoneNumber;?></td>
      </tr>
      <tr>
        <td class="tg-031e">Mobile Number</td>
        <td class="tg-031e"><?php echo $myEmployer->primaryContactMobileNumber;?></td>
      </tr>
      <tr>
        <td class="tg-031e">Email</td>
        <td class="tg-031e"><?php echo $myEmployer->primaryContactEmail;?></td>
      </tr>
      <tr>
        <td class="tg-031e">Date Of Birth</td>
        <td class="tg-031e"><?php echo $myEmployer->primaryContactDateOfBirth;?></td>
      </tr>
    </table>

    <br/><br/><br/>

    <span class='span-table-title'>Secondary Contact</span><br/><br/>
    <table class="tg">
      <tr>
        <td class="tg-031e">Name</td>
        <td class="tg-031e"><?php echo $myEmployer->secondaryContactName;?></td>
      </tr>
      <tr>
        <td class="tg-031e">Designation</td>
        <td class="tg-031e"><?php echo $myEmployer->secondaryContactDesignation;?></td>
      </tr>
      <tr>
        <td class="tg-031e">Telephone Number</td>
        <td class="tg-031e"><?php echo $myEmployer->secondaryContactTelephoneNumber;?></td>
      </tr>
      <tr>
        <td class="tg-031e">Mobile Number</td>
        <td class="tg-031e"><?php echo $myEmployer->secondaryContactMobileNumber;?></td>
      </tr>
      <tr>
        <td class="tg-031e">Email</td>
        <td class="tg-031e"><?php echo $myEmployer->secondaryContactEmail;?></td>
      </tr>
      <tr>
        <td class="tg-031e">Date Of Birth</td>
        <td class="tg-031e"><?php echo $myEmployer->secondaryContactDateOfBirth;?></td>
      </tr>
    </table>

  </div>

<? if(isset($updateEmployer)) { ?>

  <div id="empEditMyProfileDiv" title="<?php echo $updateEmployer->companyName;?>">
  <table class="tg" width=500>
    <tr  class="edit_tr">
      <th class="tg-431l" rowspan="2">Photo</th>
      <th class="tg-efv9" rowspan="2"><img src="<?php echo $updateEmployer->PICTURE;?>"</th>
      <th class="tg-baox" colspan="2" rowspan="2">
        <span id="sStudentID" class="text"><?php echo $updateEmployer->STUDENT_ID;?></span>
        <input type="text" value="<?php echo $updateEmployer->STUDENT_ID; ?>" class="editbox" id="iStudentId" size="10" />
      </th>
    </tr>
    <tr>
    </tr>
    <tr class="edit_tr">
      <td class="tg-34fq">Firstname</td>
      <td class="tg-031e">
        <span id="sFirstName" class="text"><?php echo $updateEmployer->FIRSTNAME;?></span>
        <input type="text" value="<?php echo $updateEmployer->FIRSTNAME; ?>" class="editbox" id="iFirstName" size="12" />
      </td>
      <td class="tg-031e"></td>
      <td class="tg-031e"></td>
    </tr>
    <tr class="edit_tr">
      <td class="tg-gcqo">Lastname</td>
      <td class="tg-hfjq">
        <span id="sLastName" class="text"><?php echo $updateEmployer->LASTNAME;?></span>
        <input type="text" value="<?php echo $updateEmployer->LASTNAME; ?>" class="editbox" id="iLastName" size="12" />
      </td>
      <td class="tg-gcqo"></td>
      <td class="tg-hfjq"></td>
    </tr>
    <tr class="edit_tr">
      <td class="tg-yefz">Gender</td>
      <td class="tg-efv9">
        <span id="sGender" class="text"><?php echo $updateEmployer->GENDER;?></span>
        <input type="radio" name="iGENDER" id="iGenderM" class="editbox" value="M" <? if ($updateEmployer->GENDER == "M") echo "checked";?> required /><span id="iMale" class="editbox">Male</span>
        <input type="radio" name="iGENDER" id="iGenderF" class="editbox" value="F" <? if ($updateEmployer->GENDER == "F") echo "checked";?> required /><span id="iFemale" class="editbox">Female</span>
      </td>
      <td class="tg-yefz">Birthdate</td>
      <td class="tg-efv9">
        <span id="sBirthdate" class="text"><?php echo $updateEmployer->BIRTHDATE;?></span>
      </td>
    </tr>
    <tr class="edit_tr">
      <td class="tg-yefz">Contact Details</td>
      <td class="tg-efv9">
        <span id="sContactDetails" class="text"><?php echo $updateEmployer->CONTACT_DETAILS;?></span>
        <input type="text" value="<?php echo $updateEmployer->CONTACT_DETAILS; ?>" class="editbox" id="iContactDetails" size="12" />
      </td>
      <td class="tg-yefz">Last Updated</td>
      <td class="tg-efv9">
        <span id="sLastUpdated" class="text"><?php echo $updateEmployer->CONTACT_DETAILS_LAST_UPDATED;?></span>
      </td>
    </tr>
    <tr class="edit_tr">
      <td class="tg-gcqo">Course</td>
      <td class="tg-hfjq">
        <span id="sCourseName" class="text"><?php echo $updateEmployer->COURSE_NAME;?></span>
        <select id="iCourseName" name="COURSE_ID" class="editbox" required>
          <option value = 1 <? if ($updateEmployer->COURSE_NAME == "Software Engineering") echo "selected='selected'";?>> Software Engineering </option>
          <option value = 2 <? if ($updateEmployer->COURSE_NAME == "Multimedia Arts") echo "selected='selected'";?>> Multimedia Arts </option>
          <option value = 3 <? if ($updateEmployer->COURSE_NAME == "Business Administration") echo "selected='selected'";?>> Business Administration </option>
          <option value = 4 <? if ($updateEmployer->COURSE_NAME == "Digital Arts") echo "selected='selected'";?>> Digital Arts </option>
          <option value = 5 <? if ($updateEmployer->COURSE_NAME == "Animation") echo "selected='selected'";?>> Animation </option>
          <option value = 6 <? if ($updateEmployer->COURSE_NAME == "Fashion Design") echo "selected='selected'";?>> Fashion Design </option>
        </select>
      </td>
      <td class="tg-gcqo">Year Graduated</td>
      <td class="tg-hfjq">
        <span id="sYearGraduated" class="text"><?php echo $updateEmployer->YEAR_GRADUATED;?></span>
        <select name="YEAR_GRADUATED" id="iYearGraduated" class="editbox" ></select>
      </td>
    </tr>
    <tr class="edit_tr">
      <td class="tg-gcqo">Address</td>
      <td class="tg-hfjq" colspan="3">
        <span id="sAddress" class="text"><?php echo $updateEmployer->ADDRESS;?><span>
        <input type="text" value="<?php echo $updateEmployer->ADDRESS; ?>" class="editbox" id="iAddress" size="12" />
      </td>
    </tr>
    <tr class="edit_tr">
      <td class="tg-34fq">Status</td>
      <td class="tg-icr7" colspan="3">
        <span id="sStatus" class="text"><?php echo $updateEmployer->DESCRIPTION;?></span>
        <select id="iStatus" name="EMPLOYMENT_STATUS_ID" class="editbox" required >
          <option value = 1 <? if ($updateEmployer->DESCRIPTION == "Employed") echo "selected='selected'";?>> Employed </option>
          <option value = 2 <? if ($updateEmployer->DESCRIPTION == "Unemployed, seeking for a job") echo "selected='selected'";?>> Unemployed, seeking for a job </option>
          <option value = 3 <? if ($updateEmployer->DESCRIPTION == "Unemployed, currently not interested") echo "selected='selected'";?>> Unemployed, currently not interested </option>                 
        </select>
      </td>
    </tr>
  </table>
    
  </div>

<? } ?>

</body>
</html>