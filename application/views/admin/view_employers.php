
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
				<table cellpadding="0" cellspacing="0" border="0" class="display" id="example">
					<thead>
						<tr>
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
