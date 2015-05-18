<?php
	require_once("hackproof.php");
	require_once("../config.php");
	$con		=		mysql_connect($DB_HOST,$DB_USER,$DB_PASS);
	$id=mysql_real_escape_string($_GET['id']);
	$type=mysql_real_escape_string($_GET['approved']);
	$sql	=	"UPDATE `$DB_NAME`.`tags` SET approved='$type' WHERE id=$id;";
	if(mysql_query($sql)){
		echo "Success!";
	}else{
		echo mysql_error();
	}
?>