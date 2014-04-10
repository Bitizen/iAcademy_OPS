
  <div id="empViewMyProfileDiv" class="col-lg-10 col-lg-offset-1">
    <legend>My Account <img id="editMyProfile" src="<?php echo base_url();?>assets/images/edit.png" alt="Edit Company Profile" width="25" height="25" /></legend>

    <ul class="nav nav-tabs" style="margin-bottom: 15px;">
      <li class="active"><a href="#personal_information" data-toggle="tab">Personal Information</a></li>
      <li><a href="#career_details" data-toggle="tab">Career Details</a></li>
    </ul>
    <div id="myTabContent" class="tab-content">
      <!-- PERSONAL INFORMATION -->
      <div class="tab-pane fade active in" id="personal_information">
      <div class="panel panel-info">
        <div class="panel-heading"><h3 class="panel-title">Personal Information</h3></div>
        <div class="panel-body">
          <table class="tg">
            <tr>
              <td class="td-fields">Full Name</td>
              <td class="td-values"><?php echo $myAlumnus->first_name;?> <?php echo $myAlumnus->middle_name;?> <?php echo $myAlumnus->last_name;?></td>
            </tr>
            <tr>
              <td class="td-fields">Date Of Birth</td>
              <td class="td-values"><?php echo $myAlumnus->date_of_birth;?></td>
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
              <td class="td-values"><?php echo $myAlumnus->email;?></td>
            </tr>
          </table>
        </div>
      </div>
      </div>
      <!-- END CONTACT DETAILS -->

      <div class="tab-pane fade" id="career_details">
        <div class="panel panel-info">
          <div class="panel-heading"><h3 class="panel-title">Career Details</h3></div>
          <div class="panel-body">
            <table class="tg">
              <tr>
                <td class="td-fields">Availability</td>
                <td class="td-values"><?php echo $myAlumnusDetails->availability;?></td>
              </tr>
              <tr>
                <td class="td-fields">Resume</td>
                <td class="td-values">
                  <?php if (strlen($myAlumnusDetails->resumePath) != 0) {

                        $image_properties = array(
                                  'src' => base_url().$myAlumnusDetails->resumePath,
                                  'alt' => $myAlumnus->last_name.'_'.$myAlumnus->first_name.'_Resume',
                                  'class' => '',
                                  'width' => '100',
                                  'height' => '150',
                                  'title' => $myAlumnus->last_name.'_'.$myAlumnus->first_name.'_Resume'
                        );

                        echo img($image_properties);
                      }
                  ?>
                  <?php //if(strlen($uploadErrorSEC != 0)) echo $uploadErrorSEC;?>
                  <?php echo form_open_multipart('alumnus_controller/uploadResume');?>
                    <input type="file" name="userfile" size="20" />
                    <br/>
                    <input type="submit" class="btn btn-default" value="Upload Resume" />
                  </form>
                </td>
              </tr>
            </table>
          </div>
        </div>

        <div class="panel panel-info">
          <div class="panel-heading"><h3 class="panel-title">Company Details</h3></div>
          <div class="panel-body">
            <table class="tg">
              <tr>
                <td class="td-fields">Company</td>
                <td class="td-values">
                  <a href="<?php echo base_url();?>index.php/alumnus_controller/viewEmployer?eID=<?php echo $myEmployer->employerID;?>">
                    <?php echo $myEmployer->companyName;?>
                  </a>
                </td>
              </tr>
              <tr>
                <td class="td-fields">Mailing Address</td>
                <td class="td-values"><?php echo $myEmployer->completeMailingAddress;?></td>
              </tr>
              <tr>
                <td class="td-fields">Representative</td>
                <td class="td-values"><?php echo $myEmployerContacts->first_name;?> <?php echo $myEmployerContacts->middle_name;?> <?php echo $myEmployerContacts->last_name;?>, <?php echo $myEmployerContacts->position;?></td>
              </tr>
              <tr>
                <td class="td-fields">Telephone Number</td>
                <td class="td-values"><?php echo $myEmployerContacts->landline;?></td>
              </tr>
              <tr>
                <td class="td-fields">Mobile Number</td>
                <td class="td-values"><?php echo $myEmployerContacts->mobile;?></td>
              </tr>
              <tr>
                <td class="td-fields">Email</td>
                <td class="td-values"><?php echo $myEmployerContacts->email;?></td>
              </tr>
            </table>
          </div>
        </div>
      </div>

    </div>

    <!-- UPDATE MY PROFILE DIALOG -->
    <form class="form-horizontal" action="<?php echo base_url();?>index.php/alumnus_controller/updateMyAlumnus" method="POST">
    <fieldset>
      
    <div class="modal" id="dialog-edit-company-profile" >
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title">Update Contact Details</h4>
          </div>
          <div class="modal-body">

        <!-- CONTACT DETAILS -->
        <div class="panel panel-primary">
          <div class="panel-heading">
            <h3 class="panel-title"></h3>
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
              <input type="text" value="<?php echo $myAlumnus->email; ?>" class="editbox form-control" name="iEmail" size="20" />
              </div>
            </div>
          </div>
        </div>
        <!-- END CONTACT DETAILS -->

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
    <!-- END UPDATE PROFILE DIALOG -->

 
</body>
</html>