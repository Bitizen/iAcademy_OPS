
<style type="text/css" title="currentStyle">
	@import "<?= base_url();?>assets/css/demo_page.css";
	@import "<?= base_url();?>assets/css/demo_table.css";
	@import "<?= base_url();?>assets/css/TableTools.css";
	@import "<?= base_url();?>assets/css/TableTools_JUI.css";
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

			aData.forEach(function(entry) {
			    selectedRows.push(entry[0]);
			});
			console.log(selectedRows);

			$.ajax({
			  url: '<?= base_url();?>index.php/administrator_controller/updateInternsToAlumni',
			  data: {selected: selectedRows},
			  type: 'POST',
			  dataType: 'JSON',
			  success: function(msg){
		         alert( "Students Updated");
		      }
			});

			document.location.reload(true);
	    });

	});

</script>

<?php $courses = unserialize (COURSE_LIST); ?>

	<div id="viewUserListDiv" class="col-lg-10 col-lg-offset-1">
	  <legend>Interns</legend>	
	  <button id="test" onClick="return confirm('Are you sure you want to update these Interns to Alumnus?')">Update to Alumnus</button>
		<div id="dt_example">
		<div id="container">
			<div id="dynamic">
				<table cellpadding="0" cellspacing="0" border="0" class="display" id="example">
					<thead>
						<tr>
							<th width="1%">Student ID</th>
							<th width="10%">First Name</th>
							<th width="10%">Middle Name</th>
							<th width="10%">Last Name</th>
							<th width="5%">Course</th>
							<th width="10%">Status</th>
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
	</body>
</html>
