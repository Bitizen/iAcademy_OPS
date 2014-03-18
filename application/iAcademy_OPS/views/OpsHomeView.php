<!doctype html>
<html lang="en">

<head>
 <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>iAcademy Online Placement System</title>
  <script src="//code.jquery.com/jquery-1.9.1.js"></script>
  <script src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
  <script type="text/javascript" src="assets/js/default.js"></script>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">
  <link rel="stylesheet" type="text/css" href="assets/css/homeStyle.css" media="all"/>
  <link rel="shortcut icon" href="http://iacademy.edu.ph/main/wp-content/uploads/2011/05/logoonly1-300x264.png" />
</head>

<body>

  <!-- HEADER -->
  <table id="header"> 
      <tr>
        <td>
          <div>
            <h1 id="headerTitle">iAcademy Online Placement System</h1>
          </div>
          <a id="linkLogout" href="customauth/logout">Logout</a>
        </td>
      </tr>
      <tr>    
      <td>
        <div id="tabs">
          <ul>
            <li><a href="#tabs-1">STUDENT</a></li>
            <li><a href="#tabs-2">EMPLOYER</a></li>
            <li><a href="#tabs-3">ADMINISTRATOR</a></li>
          </ul>

          <div id="tabs-1">

          <div id="btnStudentDiv">
            <table>
              <tr>
                <td>        
                    <button type="button" id="btnShowAlumniReg">REGISTER ALUMNUS</button>
                </td>
                <td>       
                    <button type="button" id="btnShowAlumniView">VIEW ALUMNI</button>
                </td>
              </tr>
            </table>
          </div>

          <div id="alumViewDiv">
            <table width=800>
              <th>
                <td><h4>STUDENT ID</h4></td>
                <td><h4>LASTNAME</h4></td>
                <td><h4>FIRSTNAME</h4></td>
                <td><h4>EMPLOYMENT STATUS</h4></td>
              </th>
            <?php foreach($students as $student):?>
              <tr>
                <td> <a id="aShowStudentChosen"
                        href="<?php echo base_url();?>index.php/OpsController/view_student?student_id=<?=$student->STUDENT_ID?>">
                      <img src="img\view.png" alt="View Student" width="25" height="25" /></a> </td>
                <td> <?=$student->STUDENT_ID?> </td> 
                <td> <?=$student->LASTNAME?> </td>
                <td> <?=$student->FIRSTNAME?> </td> 
                <td> <?=$student->DESCRIPTION?> </td>
              </tr>
             <?php endforeach;?>
             </table>
          </div>

          <div id = "alumRegDiv">
              <form action = "<?php echo base_url();?>index.php/OpsController/add_student" accept-charset="utf-8" method = "POST">
                <table id = "tblInsertFormAlum" width = "600" height = "auto">
                  <tr> 
                    <td><h4>PERSONAL INFORMATION</h4></td>
                    <td></td>
                  <tr/>
                  <tr> 
                    <td><label for="STUDENT_ID">STUDENT ID</label></td>
                    <td><input type="text" name="STUDENT_ID" required/></td>
                  <tr/>
                  <tr>
                    <td><label for="FIRSTNAME">FIRSTNAME</label></td>
                    <td><input type="text" name="FIRSTNAME" required /></td> 
                  <tr/>
                  <tr>
                    <td><label for="LASTNAME">LASTNAME</label></td>
                    <td><input type="text" name="LASTNAME" required /></td>
                  <tr/>
                  <tr>
                    <td><label for="GENDER">GENDER</label></td>
                    <td>
                      <input type="radio" name="GENDER" value="M" required />Male
                      <input type="radio" name="GENDER" value="F" checked required />Female
                    </td>
                  <tr/>
                  <tr>
                    <td><label for="BIRTHDATE">BIRTHDATE</label></td>
                    <td><input type="date" name="BIRTHDATE" required /></td>
                  <tr/>
                  <tr>
                    <td><label for="ADDRESS">ADDRESS</label></td>
                    <td><input type="text" name="ADDRESS" tabindex="3" required /></td>
                  <tr/>
                  <tr>
                    <td><label for="CONTACT_DETAILS">CONTACT DETAILS</label></td>
                    <td><input type="text" name="CONTACT_DETAILS" tabindex="3" required /></td>
                  <tr/>
                  <tr>
                    <td><label for="CONTACT_DETAILS_LAST_UPDATED"></label></td>
                    <td><input type="hidden" id="DATE_TODAY" name="CONTACT_DETAILS_LAST_UPDATED" value="" /></td>
                  <tr/>
                  <tr>
                    <td><label for="COURSE_ID">COURSE</label></td>
                    <td>
                      <select name="COURSE_ID" required>
                        <option value = "" selected="selected">-- Select a Course --</option>
                        <option value = 1> Software Engineering </option>
                        <option value = 2> Multimedia Arts </option>
                        <option value = 3> Business Administration </option>
                        <option value = 4> Digital Arts </option>
                        <option value = 5> Animation </option>
                        <option value = 6> Fashion Design </option>
                    </select>
                    </td>
                  <tr/>
                  <tr>
                    <td>
                      <label for="YEAR_GRADUATED">YEAR GRADUATED</label>
                    </td>
                    <td>
                      <select name="YEAR_GRADUATED" id="yearpicker"></select>
                    </td>
                  <tr/>
                  </table>

                  <table width= 900>
                    <tr>
                      <td><h4>EMPLOYMENT</h4></td>
                      <td><h4>HISTORY</h4></td>
                      <td></td>
                      <td></td>
                      <td></td>
                    </tr>
                    <tr>
                    <td><label for="EMPLOYMENT_STATUS_ID">EMPLOYMENT STATUS</label></td>
                      <td>
                      <select id="selectStatus" name="EMPLOYMENT_STATUS_ID" required >
                          <option value = "">-- Select Current Status --</option>
                          <option value = 1> Employed </option>
                          <option value = 2> Unemployed, seeking for a job </option>
                          <option value = 3> Unemployed, currently not interested </option>                 
                        </select>
                      </td>
                      <td></td>
                      <td></td>
                      </tr>
                    <?php
                      $number_of_rows = 5;
                      for($i=1;$i<=$number_of_rows;$i++) :?>
                        <tr><td><label for="COMPANY"><?=$i?> COMPANY</label></td>
                        <td><input type="text" name="col[<?=$i?>][COMPANY_NAME]" /></td>
                        <td> </td>
                        <td><label for="ROLE_ID" >POSITION</label></td>
                        <td><select type="text" name="col[<?=$i?>][ROLE_ID]" >
                          <option value = "" selected="selected">-- Select a Position --</option>
                          <option value = 1> Software Engineer </option>
                          <option value = 2> Multimedia Artist</option>
                          <option value = 3> Manager </option>
                          <option value = 4> Graphic Designer </option>
                          <option value = 5> Animator </option>
                          <option value = 6> Fashion Designer </option>
                          <option value = 7> Game Developer </option>
                          <option value = 8> Web Developer </option>
                          <option value = 9> Other </option>                  
                        </select></td>
                        <td> </td>
                        <td><label for="START_DATE" >START</label></td>
                      <td><input type="date" name="col[<?=$i?>][START_DATE]" /></td>
                      <td> </td>
                      <td><label for="END_DATE" >END</label></td>
                      <td><input type="date" name="col[<?=$i?>][END_DATE]" /></td></tr>
                    <?php endfor;?>      
                    <tr>
                      <td></td>
                      <td><input type="submit" value="Submit"/></td>
                    <tr/>
                </table>    
              </form>
          </div>

          </div>

          <div id="tabs-2">

            <div id="btnEmployerDiv">

            <table>
              <tr>
                <td>        
                    <button type="button" id="btnShowEmpReg">REGISTER EMPLOYER</button>
                </td>
                <td>       
                    <button type="button" id="btnShowEmpView">VIEW EMPLOYERS</button>
                </td>
              </tr>
            </table>
          </div>

           <div id="empViewDiv">
            <table width=500>
              <th>
                <td><h4>LASTNAME</h4></td>
                <td><h4>FIRSTNAME</h4></td>
                <td><h4>COMPANY</h4></td>
              </th>
             <?php foreach($employers as $employer):?>
              <tr>
                <td>  </td> 
                <td> <?=$employer->LASTNAME?> </td>
                <td> <?=$employer->FIRSTNAME?> </td> 
                <td> <?=$employer->COMPANY_NAME?> </td>
              </tr>
               <?php endforeach;?>
             </table>
          </div>

          <div id="empRegDiv">

          <form action = "<?php echo base_url();?>index.php/OpsController/add_employer" accept-charset="utf-8" method = "POST" >
             <table id = "tblInsertFormEmp" width = "600" height = "auto">
                  <tr> 
                    <td><h4>EMPLOYER</h4></td>
                    <td></td>
                  </tr>
                  <tr>
                    <td><label for="FIRSTNAME">FIRSTNAME</label></td>
                    <td><input type="text" name="FIRSTNAME" required /></td> 
                  </tr>
                  <tr>
                    <td><label for="LASTNAME">LASTNAME</label></td>
                    <td><input type="text" name="LASTNAME" required /></td>
                  </tr>
                  <tr>
                    <td><label for="COMPANY_NAME">COMPANY</label></td>
                    <td><input type="text" name="COMPANY_NAME" required /></td>
                  </tr>
                  <tr>
                      <td></td>
                      <td><input type="submit" value="Submit"/></td>
                  </tr>
              </table>
          </form>
          </div>
          </div>

          <div id="tabs-3">
             <div id="btnAdminDiv">
            <table>
              <tr>
                <td>        
                    <button type="button" id="btnShowAdminReg">REGISTER ADMINISTRATOR</button>
                </td>
                <td>        
                    <button type="button" id="btnShowAdminView">VIEW ADMINISTRATORS</button>
                </td>
              </tr>
            </table>
          </div>

           <div id="adminViewDiv">
            <table width=500>
              <th>
                <td><h4>LASTNAME</h4></td>
                <td><h4>FIRSTNAME</h4></td>
                
              </th>
             <?php foreach($admins as $admin):?>
              <tr>
                <td>  </td> 
                <td> <?=$admin->LASTNAME?> </td>
                <td> <?=$admin->FIRSTNAME?> </td> 
              
              </tr>
               <?php endforeach;?>
             </table>
          </div>

          <div id="adminRegDiv">
          <form action = "<?php echo base_url();?>index.php/OpsController/add_admin" accept-charset="utf-8" method = "POST">
             <table id = "tblInsertFormAdmin" width = "600" height = "auto">
                  <tr> 
                    <td><h4>ADMINISTRATOR</h4></td>
                    <td></td>
                  </tr>
                  <tr>
                    <td><label for="FIRSTNAME">FIRSTNAME</label></td>
                    <td><input type="text" name="FIRSTNAME" required /></td> 
                  </tr>
                  <tr>
                    <td><label for="LASTNAME">LASTNAME</label></td>
                    <td><input type="text" name="LASTNAME" required /></td>
                  </tr>
                  <tr>
                      <td></td>
                      <td><input type="submit" value="Submit"/></td>
                  </tr>
              </table>
          </form>
          </div>
          </div>
        </div>
         

         <? if(isset($studentChosen)) { ?>

        <div id="studentChosenDiv" title="<?php echo $studentChosen->LASTNAME;?>, <?php echo $studentChosen->FIRSTNAME;?>">
        <table class="tg" width=500>
          <tr  class="edit_tr">
            <th class="tg-431l" rowspan="2">Photo</th>
            <th class="tg-efv9" rowspan="2"><img src="<?php echo $studentChosen->PICTURE;?>"</th>
            <th class="tg-baox" colspan="2" rowspan="2">
              <span id="sStudentID" class="text"><?php echo $studentChosen->STUDENT_ID;?></span>
              <input type="text" value="<?php echo $studentChosen->STUDENT_ID; ?>" class="editbox" id="iStudentId" size="10" />
            </th>
          </tr>
          <tr>
          </tr>
          <tr class="edit_tr">
            <td class="tg-34fq">Firstname</td>
            <td class="tg-031e">
              <span id="sFirstName" class="text"><?php echo $studentChosen->FIRSTNAME;?></span>
              <input type="text" value="<?php echo $studentChosen->FIRSTNAME; ?>" class="editbox" id="iFirstName" size="12" />
            </td>
            <td class="tg-031e"></td>
            <td class="tg-031e"></td>
          </tr>
          <tr class="edit_tr">
            <td class="tg-gcqo">Lastname</td>
            <td class="tg-hfjq">
              <span id="sLastName" class="text"><?php echo $studentChosen->LASTNAME;?></span>
              <input type="text" value="<?php echo $studentChosen->LASTNAME; ?>" class="editbox" id="iLastName" size="12" />
            </td>
            <td class="tg-gcqo"></td>
            <td class="tg-hfjq"></td>
          </tr>
          <tr class="edit_tr">
            <td class="tg-yefz">Gender</td>
            <td class="tg-efv9">
              <span id="sGender" class="text"><?php echo $studentChosen->GENDER;?></span>
              <input type="radio" name="iGENDER" id="iGenderM" class="editbox" value="M" <? if ($studentChosen->GENDER == "M") echo "checked";?> required /><span id="iMale" class="editbox">Male</span>
              <input type="radio" name="iGENDER" id="iGenderF" class="editbox" value="F" <? if ($studentChosen->GENDER == "F") echo "checked";?> required /><span id="iFemale" class="editbox">Female</span>
            </td>
            <td class="tg-yefz">Birthdate</td>
            <td class="tg-efv9">
              <span id="sBirthdate" class="text"><?php echo $studentChosen->BIRTHDATE;?></span>
            </td>
          </tr>
          <tr class="edit_tr">
            <td class="tg-yefz">Contact Details</td>
            <td class="tg-efv9">
              <span id="sContactDetails" class="text"><?php echo $studentChosen->CONTACT_DETAILS;?></span>
              <input type="text" value="<?php echo $studentChosen->CONTACT_DETAILS; ?>" class="editbox" id="iContactDetails" size="12" />
            </td>
            <td class="tg-yefz">Last Updated</td>
            <td class="tg-efv9">
              <span id="sLastUpdated" class="text"><?php echo $studentChosen->CONTACT_DETAILS_LAST_UPDATED;?></span>
            </td>
          </tr>
          <tr class="edit_tr">
            <td class="tg-gcqo">Course</td>
            <td class="tg-hfjq">
              <span id="sCourseName" class="text"><?php echo $studentChosen->COURSE_NAME;?></span>
              <select id="iCourseName" name="COURSE_ID" class="editbox" required>
                <option value = 1 <? if ($studentChosen->COURSE_NAME == "Software Engineering") echo "selected='selected'";?>> Software Engineering </option>
                <option value = 2 <? if ($studentChosen->COURSE_NAME == "Multimedia Arts") echo "selected='selected'";?>> Multimedia Arts </option>
                <option value = 3 <? if ($studentChosen->COURSE_NAME == "Business Administration") echo "selected='selected'";?>> Business Administration </option>
                <option value = 4 <? if ($studentChosen->COURSE_NAME == "Digital Arts") echo "selected='selected'";?>> Digital Arts </option>
                <option value = 5 <? if ($studentChosen->COURSE_NAME == "Animation") echo "selected='selected'";?>> Animation </option>
                <option value = 6 <? if ($studentChosen->COURSE_NAME == "Fashion Design") echo "selected='selected'";?>> Fashion Design </option>
              </select>
            </td>
            <td class="tg-gcqo">Year Graduated</td>
            <td class="tg-hfjq">
              <span id="sYearGraduated" class="text"><?php echo $studentChosen->YEAR_GRADUATED;?></span>
              <select name="YEAR_GRADUATED" id="iYearGraduated" class="editbox" ></select>
            </td>
          </tr>
          <tr class="edit_tr">
            <td class="tg-gcqo">Address</td>
            <td class="tg-hfjq" colspan="3">
              <span id="sAddress" class="text"><?php echo $studentChosen->ADDRESS;?><span>
              <input type="text" value="<?php echo $studentChosen->ADDRESS; ?>" class="editbox" id="iAddress" size="12" />
            </td>
          </tr>
          <tr class="edit_tr">
            <td class="tg-34fq">Status</td>
            <td class="tg-icr7" colspan="3">
              <span id="sStatus" class="text"><?php echo $studentChosen->DESCRIPTION;?></span>
              <select id="iStatus" name="EMPLOYMENT_STATUS_ID" class="editbox" required >
                <option value = 1 <? if ($studentChosen->DESCRIPTION == "Employed") echo "selected='selected'";?>> Employed </option>
                <option value = 2 <? if ($studentChosen->DESCRIPTION == "Unemployed, seeking for a job") echo "selected='selected'";?>> Unemployed, seeking for a job </option>
                <option value = 3 <? if ($studentChosen->DESCRIPTION == "Unemployed, currently not interested") echo "selected='selected'";?>> Unemployed, currently not interested </option>                 
              </select>
            </td>
          </tr>
        </table>  
        </div>
      </td>
    </tr>
    <tr id="footer">
      <td>
        <div>
            <h1>iAcademy Online Placement System</h1>
          </div>
          <a href="customauth/logout">Logout</a>
      </td>
    </tr>
  </table>
</body>
</html>
<? } ?>