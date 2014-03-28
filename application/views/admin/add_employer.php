<div class='col-lg-10 col-lg-offset-1'>

<legend>Add Employer</legend>

<form action="<?php echo base_url();?>index.php/administrator_controller/addEmployer" 
method="post" accept-charset="utf-8" onSubmit="return confirm('Are you sure?')">
  <table class="tg">
      <!--<tr>
        <td class="td-fields"><label for="employer_id">Employer ID:</label></td>
        <td class="td-values"><input type="text" name="employerID" value="" id="employerID"  /></td>
      </tr>  -->    
      <tr>
        <td class="td-fields"><label for="iCompanyName">Company Name:</label></td>
        <td class="td-values"><input type="text" name="iCompanyName" value="" id="iCompanyName"  /></td>
      </tr>
      <tr>
        <td class="td-fields">
              <label for="inputIndustryType" class="">Industry Type</label></td>
              <?php $industries = unserialize (INDUSTRY_LIST); ?>
              
              <td class="td-values">

              <select id="iIndustryType" name="iIndustryType" class="" required>
              <?php foreach ($industries as $i => $value): ?>
                 <option value="<?php echo $value; ?>"> <?php echo $industries[$i] ?></option>
              <?php endforeach?>
              </select>              </td>

        </td>
        <td class="td-values"><input type="text" placeholder="New Industry Type" class="form-control" id="iNewIndustryType" name="iNewIndustryType"/></td>
      </tr>
 
      <tr>
        <td class="td-fields"><label for="company">Mailing Address:</label> </td>
        <td class="td-values"><input type="text" name="iCompleteMailingAddress" value="" id="iCompleteMailingAddress"  /></td>
      </tr>
      <tr>
        <td class="td-fields"><label for="email">Telephone Number:</label> </td>
        <td class="td-values"><input type="text" name="iTelephoneNumber" value="" id="iTelephoneNumber"  /></td>
      </tr>
      <tr>
        <td class="td-fields"><label for="phone">Fax Number:</label> </td>
        <td class="td-values"><input type="text" name="iFaxNumber" value="" id="iFaxNumber"  /></td>
      </tr>

      <tr>
        <td class="td-fields"><label for="phone">Website:</label> </td>
        <td class="td-values"><input type="text" name="iWebsite" value="" id="iWebsite"  /></td>
      </tr>

      <tr><td></td>
      <td><input type="submit" name="submit"  class="btn btn-primary" value="Add Employer"  />
      <input type="button" name="submit"  class="btn btn-default" value="Cancel" /></td></tr> 
  </table>
</form>