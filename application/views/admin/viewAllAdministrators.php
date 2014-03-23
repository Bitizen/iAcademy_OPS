<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<link rel="shortcut icon" type="image/ico" href="http://www.datatables.net/media/images/favicon.ico" />
		
		<title>Administrators</title>
		<style type="text/css" title="currentStyle">
			@import "http://localhost/iops_ion/assets/css/demo_page.css";
			@import "http://localhost/iops_ion/assets/css/demo_table.css";
		</style>
		<script type="text/javascript" language="javascript" src="http://localhost/iops_ion/assets/js/jquery.js"></script>
		<script type="text/javascript" language="javascript" src="http://localhost/iops_ion/assets/js/jquery.dataTables.js"></script>
		<script type="text/javascript" charset="utf-8">
			$(document).ready(function() {
				$('#example').dataTable( {
					"bProcessing": true,
					"bServerSide": true,
					"sAjaxSource": "<?= base_url();?>index.php/home/getAdminDataByAjax",
					"sServerMethod": "POST"
				} );
			} );
		</script>
	</head>
	<body id="dt_example">
		<div id="container">
			<h1>Administrators</h1>
			<div id="dynamic">
<table cellpadding="0" cellspacing="0" border="0" class="display" id="example">
	<thead>
		<tr>
			<th width="20%">Firstname</th>
			<th width="25%">Lastname</th>
			<th width="25%">Email</th>
			<th width="15%">Contact Number</th>
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