<script type="text/javascript" language="javascript" src="<?php echo base_url();?>assets/js/jquery-1.7.2.js"></script>


<div class="col-lg-10 col-lg-offset-1">
	<a id="addEmployerBtn" class="btn btn-info">Add Employer</a>
	<!--<a id="addContactBtn" class="btn btn-info">Add Representative</a>-->
	<a class="btn btn-info" href="<?php echo base_url();?>index.php/administrator_controller/loadAddEvaluationView" target="_blank" >Add Evaluation</a>
</div>
<br>

<style type="text/css" title="currentStyle">
	@import "<?= base_url();?>assets/css/demo_page.css";
	@import "<?= base_url();?>assets/css/demo_table.css";
</style>
<script type="text/javascript" language="javascript" src="<?= base_url();?>assets/js/jquery.dataTables.js"></script>
<script type="text/javascript" charset="utf-8">
	$(document).ready(function() {
		$('#example').dataTable( {
			"bProcessing": true,
			"bServerSide": true,
			"sAjaxSource": "<?= base_url();?>index.php/administrator_controller/getEmployerList",
			"sServerMethod": "POST"
		} );
	} );
</script>

	<div id="viewUserListDiv" class="col-lg-10 col-lg-offset-1">
	  <legend>Employers</legend>
		<div id="dt_example">
		<div id="container">
			<div id="dynamic">
				<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-hover" id="example">
					<thead>
						<tr class="info">
							<th width="25%">Company Name</th>
							<th width="28%">Location</th>
							<th width="27%">Industry Type</th>
							<th width="20%">Industry Partner</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td colspan="5" class="dataTables_empty">Loading data from server</td>
						</tr>
					</tbody>
				</table>
			</div>
			</div>
		</div>
	</body>
</html>



<!-- ADD EMPLOYER MODAL -->
<div class="modal" id="addEmployerDiv">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title">Add Employer</h4>
      </div>
      <div class="modal-body">
      <!-- ADD EMPLOYER FORM -->
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
			  </table>
	     </div>
		 <div class="modal-footer">
		        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
		        <button type="submit" class="btn btn-primary">Add Employer</button>
	     </div>
      	</form>     
      <!-- END ADD EMPLOYER FORM -->
    </div>
  </div>
</div>
<!-- END OF ADD EMPLOYER MODAL -->

			            


<!-- START ADD CONTACT MODAL -->
    <div id="addContactDiv" class="modal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title">Add Representative</h4>
      </div>
      <div class="modal-body">
      <!-- ADD CONTACT FORM -->
			<form action="<?php echo base_url();?>index.php/administrator_controller/addRepresentative" 
					method="post" accept-charset="utf-8" onSubmit="return confirm('Are you sure?')">
			      <table class="tg">
			        <tr>
			          <td class="td-fields"><label for="employerID">Company</label></td>
			              <td class="td-values">
			              <select name='employerID'>
			                <option value="0">NA</option>
			              <?php foreach ($companyList as $c): ?>
			                 <option value="<?php echo $c['employerID'] ?>"> <?php echo $c['companyName'] ?> </option>
			              <?php endforeach?>
			              </select></td>
			        <tr/>

			        <tr>
			          <td class="td-fields"><label for="company">Contact Type</label></td>
			              <td class="td-values">
			              <select name='representativeType'>
			                <option value="1">primary</option>
			                <option value="2">secondary</option>
			                <option value="3">tertiary</option>
			              </select></td>
			        <tr/> 

			      <tr>
			            <td class="td-fields"><label for="first_name">First Name:</label> </td>
			            <td class="td-values"><input type="text" name="first_name" value="" id="first_name" required /></td>
			      </tr>
			      <tr>
			            <td class="td-fields"><label for="middle_name">Middle Name:</label></td>
			            <td class="td-values"><input type="text" name="middle_name" value="" id="middle_name" required /></td>      
			      </tr>
			      <tr>
			            <td class="td-fields"><label for="last_name">Last Name:</label> </td>
			            <td class="td-values"><input type="text" name="last_name" value="" id="last_name" required /> </td>     
			      </tr>
			      <tr>
			            <td class="td-fields"><label for="position">Position:</label></td>
			            <td class="td-values"><input type="text" name="position" value="" id="position"  required/> </td>     
			      </tr>
			      <tr>
			            <td class="td-fields"><label for="landline">Phone:</label></td> 
			            <td class="td-values"><input type="text" name="landline" value="" id="landline"  required/></td>
			      </tr>      
			      
			      <tr>
			            <td class="td-fields"><label for="mobile">Mobile:</label> </td>  
			            <td class="td-values"><input type="text" name="mobile" value="" id="mobile" required/> </td>    
			      </tr>      
			      <tr>
			            <td class="td-fields"><label for="email">Email:</label>  </td> 
			            <td class="td-values"><input type="text" name="email" value="" id="email"  required/>   </td>    
			      </tr>
			      <tr>
			            <td class="td-fields"><label for="username">Username:</label>  </td> 
			            <td class="td-values"><input type="text" name="username" value="" id="username"  required/>   </td>    
			      </tr>

			      <tr>
			            <td class="td-fields"><label for="password">Password:</label>  </td> 
			            <td class="td-values"><input type="password" name="password" value="" id="password"  required/>   </td>    
			      </tr>

			      <tr>
			            <td class="td-fields"><label for="password_confirm">Confirm Password:</label>  </td> 
			            <td class="td-values"><input type="password" name="password_confirm" value="" id="password_confirm"  required/>  </td>     
			      </tr>
			      </table>
				 </div>
				 <div class="modal-footer">
				        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
				        <button type="submit" class="btn btn-primary">Add Representative</button>
			     </div>
			</form>     
      <!-- END ADD CONTACT FORM -->
    </div>
  </div>
</div>
<!-- END OF ADD CONTACT MODAL -->




