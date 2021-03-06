<style type="text/css" title="currentStyle">
	@import "<?= base_url();?>assets/css/demo_page.css";
	@import "<?= base_url();?>assets/css/demo_table.css";
</style>
<script type="text/javascript" language="javascript" src="<?= base_url();?>assets/js/jquery-1.7.2.js"></script>
<script type="text/javascript" language="javascript" src="<?= base_url();?>assets/js/jquery.dataTables.js"></script>
<script type="text/javascript" charset="utf-8">
	$(document).ready(function() {
		$('#example').dataTable( {
			"bProcessing": true,
			"bServerSide": true,
			"sAjaxSource": "<?= base_url();?>index.php/administrator_controller/getAlumnusList",	
			"sServerMethod": "POST"
		} );
	} );
</script>

	<div id="viewUserListDiv" class="col-lg-10 col-lg-offset-1">
	  <legend>Alumni</legend>
		<div id="dt_example">
		<div id="container">
			<div id="dynamic">
				<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-hover" id="example">
					<thead>
						<tr class="info">	
							<th width="11%">Last Name</th>
							<th width="11%">First Name</th>
							<th width="8%">Middle Name</th>
							<th width="11%">Course</th>
							<th width="11%">Skill</th>
							<th width="9%">Employment Status</th>
							<th width="8%">Company</th>
							<th width="8%">Position</th>
							<th width="5%">Affiliation Status</th>
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
