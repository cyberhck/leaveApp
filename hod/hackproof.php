<?php
	if(isset($_COOKIE['username'])){
			require_once("../config.php");
			$con			=		mysql_connect($DB_HOST, $DB_USER, $DB_PASS);
			$username		=		mysql_real_escape_string($_COOKIE['username']);
			$password		=		mysql_real_escape_string($_COOKIE['password']);
			$sql			=		"SELECT * FROM `$DB_NAME`.`hod` WHERE `username`='$username' AND `password`='$password';";
			$query			=		mysql_query($sql);
			if(mysql_num_rows($query)==1){
				//don't do anything.
			}else{
				//redirect here itself, saying password mismatch
				header("location:index.php?error=youAreMarked");
				die();
			}
	}else{
		header("location:index.php?msg=loginRequired");
		die();
	}


?>