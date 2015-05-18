<?php require_once("hackproof.php"); ?>
<!DOCTYPE html>
<html lang="en" class="no-js">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
		<title>Requests</title>
		<link rel="stylesheet" type="text/css" href="/dist/css/component.css" />
		<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.css">
		<script type="text/javascript" charset="utf8" src="//code.jquery.com/jquery-1.10.2.min.js"></script>
		<script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.js"></script>
		<script>
			$(document).ready( function () {
				$('#example').DataTable();
			} );
		</script>
	</head>
	<body>
		<table id="example" class="display" cellspacing="0" width="100%">
		<thead>
			<tr>
				<th>Applicant Name</th>
				<th>Application For</th>
				<th>Leave From</th>
				<th>Leave To</th>
				<th>Leave Address</th>
				<th>Alternate Arrangement (Theory)</th>
				<th>Alternate Arrangement (Lab)</th>
				<th>Action</th>
			</tr>
		</thead>
		<tfoot>
			<tr>
				<th>Applicant Name</th>
				<th>Application For</th>
				<th>Leave From</th>
				<th>Leave To</th>
				<th>Leave Address</th>
				<th>Alternate Arrangement (Theory)</th>
				<th>Alternate Arrangement (Lab)</th>
				<th>Action</th>
			</tr>
		</tfoot>
<?php
	$username			=		$_COOKIE['username'];
	require_once("functions.php");
	require_once("../config.php");
	$DB_INFO['host']	=	$DB_HOST;
	$DB_INFO['user']	=	$DB_USER;
	$DB_INFO['pass']	=	$DB_PASS;
	$DB_INFO['name']	=	$DB_NAME;
	$con				=	mysql_connect($DB_HOST,$DB_USER,$DB_PASS);
	$id					=	getFacultyIdFromUsername($DB_INFO,$username);
	$sql				=	"SELECT tags.id,faculty.fullname,leaves.applicationFor,leaves.leaveFrom,leaves.leaveTo,leaves.leaveAddr,leaves.alternateTheory,leaves.alternateLab FROM `$DB_NAME`.`tags`,`$DB_NAME`.`faculty`,`$DB_NAME`.`leaves` WHERE tags.faculty=$id AND leaves.id=tags.leaveId AND leaves.user=faculty.id;";
	$query				=	mysql_query($sql);?>
			<tbody>
	<?php
	while($data			=	mysql_fetch_object($query)){
			?>
				<tr>
					<td><?php echo $data->fullname; ?></td>
					<td><?php echo $data->applicationFor; ?></td>
					<td><?php echo $data->leaveFrom; ?></td>
					<td><?php echo $data->leaveTo; ?></td>
					<td><?php echo $data->leaveAddr; ?></td>
					<td><?php echo $data->alternateTheory; ?></td>
					<td><?php echo $data->alternateLab ?></td>
					<td>Approve/Reject</td>
				</tr>
			<?php
	}
?>

		</tbody>
	</table>
	</body>
</html>
