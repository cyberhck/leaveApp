<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>About</title>
</head>
<body>
	<h2>Application designed by Nishchal Gautam (1VE12IS025)</h2>
	<?php if (isset($_GET['loggedOut'])) {
		echo "<h3>You've been logged out.</h3>";
	} ?>
</body>
</html>