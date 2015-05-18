<?php
if(!defined("getFacultyIdFromUsername")){
	function getFacultyIdFromUsername($DB_INFO,$username){
		$con		=		mysql_connect($DB_INFO['host'],$DB_INFO['user'],$DB_INFO['pass']);
		$DB_NAME	=		$DB_INFO['name'];
		$username	=		mysql_real_escape_string($username);
		$sql		=		"SELECT * FROM `$DB_NAME`.`faculty` WHERE username='$username'";
		$data		=		mysql_fetch_object(mysql_query($sql)) or die(mysql_error());
		return $data->id;
	}
}
?>