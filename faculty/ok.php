<?php
if(isset($_GET['status'])){
	$status=$_GET['status'];
}else{
	$status="no data";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?php echo $status; ?></title>
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
			The result of your task is:<?php echo $status; ?>
		</div>



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