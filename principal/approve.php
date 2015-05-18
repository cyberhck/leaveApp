<?php
	require_once("hackproof.php");
	require_once("../config.php");
	$con			=	mysql_connect($DB_HOST,$DB_USER,$DB_PASS);
	$result			=	mysql_real_escape_string($_GET['approved']);
	$id				=	mysql_real_escape_string($_GET['id']);
	$sql			=	"UPDATE `$DB_NAME`.`leaves` SET principalApproval='$result' WHERE id=$id;";
	if(mysql_query($sql)){
		echo "success";
	}else{
		echo "fail".mysql_error();
	}

?>