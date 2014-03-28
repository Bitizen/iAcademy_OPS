
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
				"sAjaxSource": "<?= base_url();?>index.php/administrator_controller/getAdministratorList",
				"sServerMethod": "POST"
			} );
		} );
	</script>

	<div id="viewUserListDiv" class="col-lg-10 col-lg-offset-1">
	  <legend>Admins</legend>
		<div id="dt_example">
		<div id="container">
			<div id="dynamic">
				<table cellpadding="0" cellspacing="0" border="0" class="display" id="example">
					<thead>
						<tr>
							<th width="20%">First Name</th>
							<th width="20%">Middle Name</th>
							<th width="30%">Last Name</th>
							<th width="30%">Position</th>
							<!--<th width="5%">View</th>-->

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
</body>
</html>