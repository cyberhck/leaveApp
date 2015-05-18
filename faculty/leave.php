<?php require_once("hackproof.php"); ?>
<?php if (isset($_POST['submit'])) {
	require_once("../config.php");
	$con					=	mysql_connect($DB_HOST,$DB_USER,$DB_PASS);
	$username				=	mysql_real_escape_string($_COOKIE['username']);
	$sql					=	"SELECT * FROM `$DB_NAME`.`faculty` WHERE `username`='$username'";
	$data					=	mysql_fetch_object(mysql_query($sql));
	$applicantUsername		=	$username;
	$leaveFor				=	mysql_real_escape_string($_POST['for']);
	$leaveFrom				=	mysql_real_escape_string($_POST['from']);
	$leaveTo				=	mysql_real_escape_string($_POST['to']);
	$leaveAddress			=	mysql_real_escape_string($_POST['leaveAddress']);
	$phoneNumberRes			=	mysql_real_escape_string($_POST['resPhone']);
	$phoneNumberMob			=	mysql_real_escape_string($_POST['mobilePhone']);
	$leavingCampusDate		=	mysql_real_escape_string($_POST['leavingCampusDate']);
	$leavingCampusTime		=	mysql_real_escape_string($_POST['leavingCampusTime']);
	$alternateTheory		=	mysql_real_escape_string($_POST['alternateTheory']);
	$alternateLab			=	mysql_real_escape_string($_POST['alternateLab']);
	$joiningCampusDate		=	mysql_real_escape_string($_POST['joiningCampusDate']);
	$joiningCampusTime		=	mysql_real_escape_string($_POST['joiningCampusDate']);
	$people					=	$_POST['people'];//array
	$sql					=	"INSERT INTO `$DB_NAME`.`leaves` (`applicationFor`, `leaveFrom`, `leaveTo`, `leaveAddr`, `resPhone`, `mobPhone`, `leavingCampusDate`, `leavingCampusTime`, `joiningCampusDate`, `joiningCampusTime`, `alternateTheory`, `alternateLab`, `user`) VALUES('$leaveFor','$leaveFrom','$leaveTo','$leaveAddress','$phoneNumberRes','$phoneNumberMob','$leavingCampusDate','$leavingCampusTime', '$joiningCampusDate', '$joiningCampusTime','$alternateTheory','$alternateLab',$data->id);";
		//insert that then look for people thingy
	if(!mysql_query($sql)){
	 	die("Some error occured, please try again later");
	}
	//tag the faculties.
	$lastInsert				=	mysql_insert_id();
	$sql					=	"INSERT INTO `$DB_NAME`.`tags`(`faculty`,`leaveId`) VALUES ";

	require_once("functions.php");
	
	$DB_INFO['user']		=	$DB_USER;
	$DB_INFO['pass']		=	$DB_PASS;
	$DB_INFO['host']		=	$DB_HOST;
	$DB_INFO['name']		=	$DB_NAME;
	$str					=	[];
	foreach ($people as $key) {
		//echo $key;
		$value				=	getFacultyIdFromUsername($DB_INFO,$key);
		$str[]				=	"($value,$lastInsert)";
	}
	$str=implode(",", $str);
	$sql=$sql.$str;
	if(mysql_query($sql)){
		header("location:ok.php?status=success");
	}else{
		die(mysql_error());
	}
}else{
?>
<!DOCTYPE html>
<html lang="en" class="no-js">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
		<title>Advanced Leave Application</title>
		<script type="text/javascript" src="/dist/js/jquery-1.10.2.min.js"></script>
		<script type="text/javascript" src="/dist/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="/dist/js/select2.js"></script>
		<script type="text/javascript" src="/dist/js/select2_locale_en.js"></script>
		<link rel="stylesheet" href="/dist/css/select2.css">
		<link rel="stylesheet" href="/dist/css/select2-bootstrap.css">
		<link rel="stylesheet" type="text/css" href="/dist/css/default.css" />
		<link rel="stylesheet" type="text/css" href="/dist/css/component.css" />
		<script src="/dist/js/modernizr.custom.js"></script>
		<script src="/dist/js/nlform.js"></script>
		<script src="/dist/leave.js"></script>
	</head>
	<body>
		<?php
			require_once("../config.php");
			$con				=	mysql_connect($DB_HOST,$DB_USER,$DB_PASS);
			$username			=	mysql_real_escape_string($_COOKIE['username']);
			$sql				=	"SELECT * FROM `$DB_NAME`.`faculty` WHERE `username`='$username'";
			$data				=	mysql_fetch_object(mysql_query($sql));
		?>
		<form id="nl-form" style="font-size:32px;margin-bottom:30px; margin-top:50px; width:1280px" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" class="nl-form">
					Application for:
					<select name="for">
						<option value="CL" selected>CL</option>
						<option value="SCL">SCL</option>
						<option value="VL">VL</option>
						<option value="ML">ML</option>
						<option value="OOD">OOD</option>
						<option value="C-OFF">C-OFF</option>
						<option value="EL">EL</option>
					</select><br />
					<label>1. Name
					<input size="18" data-subline="Your Username" type="text" placeholder="Username" name="name" value="<?php echo $data->fullname; ?>" readonly /><br /></label>
					&nbsp;&nbsp;&nbsp;Designation:<input type="text" name="designation" value="<?php echo $data->designation; ?>" readonly /><br />
					&nbsp;&nbsp;&nbsp;Department: <input type="text" name="department" value="<?php echo $data->department; ?>" readonly /><br />
					2. Leave from <input type="date" name="from" /> to <input type="date" name="to" /><br />
					3. Leave Address <input type="text" name="leaveAddress" /><br />
					4. Phone No : Res <input type="text" size="14" name="resPhone"> Mobile <input type="text" size="14" name="mobilePhone"><br>
					5. a)Leaving the campus: <br>
					&nbsp;&nbsp;&nbsp;&nbsp;At <input type="date" name="leavingCampusDate">On: <input size="7" type="text" name="leavingCampusTime"><br>
					5. b)Expected to be back: <br>
					&nbsp;&nbsp;&nbsp;&nbsp;At <input type="date" name="joiningCampusDate">On: <input size="7" type="text" name="joiningCampusTime"><br>

					6. Alternate Arrangements: <br>

					<textarea name="alternateTheory" placeholder="For theory" cols="35" rows="4"></textarea> <textarea placeholder="For lab" name="alternateLab" cols="35" rows="4"></textarea><br>
					7. Send Notification to: <br>
					<select multiple style="width:500px;font-size:14px;" name="people[]" id="friend_list">
						<?php
							$department		=		mysql_real_escape_string($data->department);
							$sql			=		"SELECT * FROM `$DB_NAME`.`faculty` WHERE `department`='$department' AND username !='$data->username';";
							$query			=		mysql_query($sql);
							while($result	=		mysql_fetch_object($query)){
								?>
									<option value="<?php echo $result->username; ?>"><?php echo $result->fullname." (".$result->username.")"; ?></option>
								<?php
							}
						?>
						
					</select>


					<!-- in <input type="text" value="" placeholder="any city" data-subline="For example: <em>Los Angeles</em> or <em>New York</em>"/> -->
					<div class="nl-submit-wrap">
						<button class="nl-submit" name="submit" type="submit">Apply Leave</button>
					</div>
					<div class="nl-overlay"></div>
		</form>
	</body>
</html>
<?php } ?>