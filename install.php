<?php
	if(isset($_POST['submit'])){
		require_once("config.php");
		$con			=		mysql_connect($DB_HOST, $DB_USER, $DB_PASS);
		$username		=		mysql_real_escape_string($_POST['username']);
		$password		=		mysql_real_escape_string($_POST['password']);
		$sql			=		"INSERT INTO `$DB_NAME`.`admin` (`username`,`password`) VALUES('$username','$password')";
		if(mysql_query($sql)){
			echo "Admin Created, please login and start creating users and delete install.php file from server it might harm";
		}else{
			echo "Please contact developer, there was some error";
		}
	}else{
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Install</title>
		<!-- <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css" rel="stylesheet"> -->
		<link href="dist/css/bootstrap.min.css" rel="stylesheet">
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 

		<!-- Include roboto.css to use the Roboto web font, material.css to include the theme and ripples.css to style the ripple effect -->
		<link href="dist/css/roboto.min.css" rel="stylesheet">
		<link href="dist/css/material.min.css" rel="stylesheet">
		<link href="dist/css/ripples.min.css" rel="stylesheet">

	</head>

	<body>
		<div class="container">
			<div class="row">
				<div class="col-md-5" style="text-align:center;margin-top:25px;">
					<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
						<input type="text" name="username" class="form-control floating-label" placeholder="Admin User">
						<input type="text" name="password" class="form-control floating-label" placeholder="Admin Password">
						<button type="submit" name="submit"  value="submit" class="btn btn-primary">Submit</button>
					</form>
				</div>
			</div>
		</div>

		<!-- Your site -->
<!--		<p class="bs-component">
			<a href="javascript:void(0)" class="btn btn-default">Default</a>
			<a href="javascript:void(0)" class="btn btn-primary">Primary</a>
			<a href="javascript:void(0)" class="btn btn-success">Success</a>
			<a href="javascript:void(0)" class="btn btn-info">Info</a>
			<a href="javascript:void(0)" class="btn btn-warning">Warning</a>
			<a href="javascript:void(0)" class="btn btn-danger">Danger</a>
			<a href="javascript:void(0)" class="btn btn-link">Link</a>
		</p>
 -->
		<!-- Your site ends -->

		<!--<script src="//code.jquery.com/jquery-1.10.2.min.js"></script>-->
		<!--<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>-->
		<script src="dist/js/jquery-1.10.2.min.js"></script>
		<script src="dist/js/bootstrap.min.js"></script>
		<script src="dist/js/ripples.min.js"></script>
		<script src="dist/js/material.min.js"></script>
		<script>
			$(document).ready(function() {
				// This command is used to initialize some elements and make them work properly
				$.material.init();
			});
		</script>

	</body>

</html>
<?php
}
?>