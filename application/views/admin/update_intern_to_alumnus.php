
<style type="text/css" title="currentStyle">
	@import "<?= base_url();?>assets/css/demo_page.css";
	@import "<?= base_url();?>assets/css/demo_table.css";
	@import "<?= base_url();?>assets/css/TableTools.css";
	@import "<?= base_url();?>assets/css/TableTools_JUI.css";
</style>
<style>
	.right-button {float:right}
</style>
<script type="text/javascript" language="javascript" src="<?= base_url();?>assets/js/jquery-1.7.2.js"></script>
<script type="text/javascript" language="javascript" src="<?= base_url();?>assets/js/jquery.dataTables.js"></script>
<script type="text/javascript" charset="utf-8" src="<?= base_url();?>assets/js/TableTools.js"></script>
<script type="text/javascript" charset="utf-8">

	$(document).ready(function() {

		/* Init the table */
		$('#example').dataTable( {
				"bProcessing": true,
				"bServerSide": true,
				"sAjaxSource": "<?= base_url();?>index.php/administrator_controller/getNewGradList",
				"sServerMethod": "POST",
				"sDom": 'T<"clear">lfrtip',
				"oTableTools": {
					"sRowSelect": "multi",
					"aButtons": [ "select_all", "select_none" ]
				}
		} );

		/* Handle Selected Rows */
		$("#test").click(function() {

			var selectedRows = Array();
			var oTT = TableTools.fnGetInstance('example');
	    	var aData = oTT.fnGetSelectedData();
	    	var yearGraduated = $("#yearGraduated").val();
	    	var monthGraduated = $("#monthGraduated").val();
	    	var termGraduated = $("#termGraduated").val();

			aData.forEach(function(entry) {
			    selectedRows.push(entry[0]);
			});
			console.log(selectedRows);

			$.ajax({
			  url: '<?= base_url();?>index.php/administrator_controller/updateInternsToAlumni',
			  data: {selected: selectedRows
			  	, year: yearGraduated
			  	, month: monthGraduated
			  	, term: termGraduated},
			  type: 'POST',
			  dataType: 'JSON',
			  success: function(msg){
		         //alert("Students Updated");
		      }
			});

			document.location.reload(true);
	    });

		/* Modal */

	});

</script>

<?php $courses = unserialize (COURSE_LIST); ?>

	<div id="viewUserListDiv" class="col-lg-10 col-lg-offset-1">
	  <legend>Interns</legend>		  
		<div id="dt_example">
			<div class="right-button">

            <select name="yearGraduated" id="yearGraduated" required>
              <option value = "" selected="selected">Select Year Graduated</option>
              <option value = 2006> 2006 </option>
              <option value = 2007> 2007 </option>
              <option value = 2008> 2008 </option>
              <option value = 2009> 2009 </option>
              <option value = 2010> 2010 </option>
              <option value = 2011> 2011 </option>
              <option value = 2012> 2012 </option>
              <option value = 2013> 2013 </option>
              <option value = 2014> 2014 </option>
              <option value = 2015> 2015 </option>
            </select>

			<select name="monthGraduated" id="monthGraduated" required>
              <option value = "" selected="selected">Select Month Graduated</option>
              <option value = 1> Jan </option>
              <option value = 2> Feb </option>
              <option value = 3> Mar </option>
              <option value = 4> Apr </option>
              <option value = 5> May </option>
              <option value = 6> Jun </option>
              <option value = 7> Jul </option>
              <option value = 8> Aug </option>
              <option value = 9> Sep </option>
              <option value = 10> Oct </option>
              <option value = 11> Nov </option>
              <option value = 12> Dec </option>
            </select>

            <select name="termGraduated" id="termGraduated" required>
              <option value = "" selected="selected">Select Term Graduated</option>
              <option value = 1> 1 </option>
              <option value = 2> 2 </option>
              <option value = 3> 3 </option>
            </select>

				<button id="test" class="btn btn-info" onClick="return confirm('Are you sure you want to update these Interns to Alumnus?')">Update to Alumnus</button>
			</div>
		<div id="container">
			<div id="dynamic">
				<table cellpadding="0" cellspacing="0" border="0" class="display" id="example">
					<thead>
						<tr>
							<th width="12%">Student ID</th>
							<th width="12%">Last Name</th>
							<th width="12%">First Name</th>
							<th width="11%">Middle Name</th>
							<th width="25%">Course</th>
							<th width="25%">Status</th>
							<th width="10%">Company</th>
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
	</div>

	<!-- MODAL -->
    <form class="form-horizontal" action="<?php echo base_url();?>index.php/administrator_controller/updateUser" method="POST">
    <fieldset>
      
    <div class="modal" id="dialog-edit-company-profile" >
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title">Profile Editor</h4>
          </div>
          <div class="modal-body">
      
        <!-- PERSONAL INFORMATION -->
        <div class="panel panel-primary">
          <div class="panel-heading">
            <h3 class="panel-title">Personal Information</h3>
          </div>
          <div class="panel-body">
            <div class="form-group">
              <div class="col-lg-10">
                <label for="inputCompanyName" class="control-label">First Name</label>
                <input type="text" value="<?php echo $user->first_name; ?>" class="editbox form-control" name="iFirstName" size="20" />
              </div>
            </div>
            <div class="form-group">
              <div class="col-lg-10">
                <label for="inputCompanyName" class="control-label">Middle Name</label>
                <input type="text" value="<?php echo $user->middle_name; ?>" class="editbox form-control" name="iMiddleName" size="20" />
              </div>
            </div>
            <div class="form-group">
              <div class="col-lg-10">
                <label for="inputCompanyName" class="control-label">Last Name</label>
                <input type="text" value="<?php echo $user->last_name; ?>" class="editbox form-control" name="iLastName" size="20" />
              </div>
            </div>
            <div class="form-group">
              <div class="col-lg-10">
                <label for="inputCompanyName" class="control-label">Position</label>
                <input type="text" value="<?php echo $user->position; ?>" class="editbox form-control" name="iPosition" size="20" />
              </div>
            </div>
            <div class="form-group">
              <div class="col-lg-10">
              <label for="inputDateOfBirth" class="control-label">Date Of Birth</label>
              <div class="input-group date">
                <input type="text" id="trigger-datepicker" name="iDateOfBirth" class="form-control" value="<?php echo $user->date_of_birth; ?>"><span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
              </div>
              </div>
            </div>
          </div>
        </div>
        <!-- END PERSONAL INFORMATION -->

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
    <!-- END MODAL -->

	</body>
</html>
