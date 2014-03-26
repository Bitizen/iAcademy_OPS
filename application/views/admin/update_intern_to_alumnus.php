
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
	    	//var yearGraduated = document.getElementById('yearGraduated').value;
	    	//var monthGraduated = document.getElementById('monthGraduated').value;
	    	//var termGraduated = document.getElementById('termGraduated').value;
	    	var yearGraduated = $("#yearGraduated").val();
	    	var monthGraduated = $("#monthGraduated").val();
	    	var termGraduated = $("#termGraduated").val();

			aData.forEach(function(entry) {
			    selectedRows.push(entry[0]);
			});
			console.log(selectedRows);

			$.ajax({
			  url: '<?= base_url();?>index.php/administrator_controller/updateInternsToAlumni',
			  data: {selected: selectedRows, year: yearGraduated, month: monthGraduated, term: termGraduated},
			  type: 'POST',
			  dataType: 'JSON',
			  success: function(msg){
		         alert("Students Updated");
		      }
			});

			//document.location.reload(true);
	    });

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