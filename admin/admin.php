<?php
require_once("hackproof.php");
?>
<?php
	if(isset($_POST['submit'])){
		require_once("../config.php");
		$con			=		mysql_connect($DB_HOST, $DB_USER, $DB_PASS);
		$username		=		mysql_real_escape_string($_POST['username']);
		$password		=		mysql_real_escape_string($_POST['password']);
		$department		=		mysql_real_escape_string($_POST['department']);
		$designation		=		mysql_real_escape_string($_POST['designation']);
		$fullname		=		mysql_real_escape_string($_POST['fullname']);		
		$sql			=		"INSERT INTO `$DB_NAME`.`faculty` (`username`,`password`,`department`,`designation`,`fullname`) VALUES('$username','$password','$department','$designation','$fullname')";
		if(mysql_query($sql)){
			header("location:admin.php?success");
		}else{
			header("location:admin.php?fail");
		}

	}else{
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Create Faculty</title>
		<!-- <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css" rel="stylesheet"> -->
		<link href="/dist/css/bootstrap.min.css" rel="stylesheet">
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
		<!-- Include roboto.css to use the Roboto web font, material.css to include the theme and ripples.css to style the ripple effect -->
		<link href="/dist/css/roboto.min.css" rel="stylesheet">
		<link href="/dist/css/material.min.css" rel="stylesheet">
		<link href="/dist/css/ripples.min.css" rel="stylesheet">

	</head>

	<body>
		<div class="container">
			<?php if(isset($_GET['success'])){echo "Success!";} ?>
			<?php if(isset($_GET['fail'])){echo "fail";} ?>
			<?php require_once("nav.php"); ?>
			<div class="row">
				<div class="col-md-5" style="text-align:center;margin-top:25px;">
					<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
						<input type="text" name="username" class="form-control floating-label" placeholder="Faculty Username">
						<input type="text" name="fullname" class="form-control floating-label" placeholder="Full Name">
						<input type="text" name="designation" class="form-control floating-label" placeholder="Designation">
						<input type="text" name="department" class="form-control floating-label" placeholder="Department">
						<input type="password" name="password" class="form-control floating-label" placeholder="Password">
						<button type="submit" name="submit"  value="submit" class="btn btn-primary">Submit</button>
					</form>
				</div>
			</div>
		</div>
		<!--<script src="//code.jquery.com/jquery-1.10.2.min.js"></script>-->
		<!--<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>-->
		<script src="/dist/js/jquery-1.10.2.min.js"></script>
		<script src="/dist/js/bootstrap.min.js"></script>
		<script src="/dist/js/ripples.min.js"></script>
		<script src="/dist/js/material.min.js"></script>
		<script>
			$(document).ready(function() {
				// This command is used to initialize some elements and make them work properly
				$.material.init();
			});
		</script>

	</body>

</html>
<?php } ?>