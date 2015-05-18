<?php
	if(isset($_POST['submit'])){
		require_once("../config.php");
		$con			=		mysql_connect($DB_HOST, $DB_USER, $DB_PASS);
		$username		=		mysql_real_escape_string($_POST['username']);
		$password		=		mysql_real_escape_string($_POST['password']);
		$sql			=		"SELECT * FROM `$DB_NAME`.`hod` WHERE `username`='$username' AND `password`='$password';";
		$query			=		mysql_query($sql);
		// die("came");
		if(mysql_num_rows($query)==1){
			setcookie("username",$username);
			setcookie("password",$password);
			header("location:show.php");
		}else{
			//redirect here itself, saying password mismatch
			header("location:index.php?error=passwordMismatch");
		}
	}else{
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Login</title>
		<!-- <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css" rel="stylesheet"> -->
		<link href="/dist/css/bootstrap.min.css" rel="stylesheet">

		<!-- Include roboto.css to use the Roboto web font, material.css to include the theme and ripples.css to style the ripple effect -->
		<link href="/dist/css/roboto.min.css" rel="stylesheet">
		<link href="/dist/css/material.min.css" rel="stylesheet">
		<link href="/dist/css/ripples.min.css" rel="stylesheet">

	</head>

	<body>
		<div class="container">
			<div class="row">
				<div class="col-md-5" style="text-align:center;margin-top:25px;">
					<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
						<input type="text" name="username" class="form-control floating-label" placeholder="Username">
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
<?php
}
?>