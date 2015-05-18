<?php require_once("hackproof.php"); ?>
<?php if (isset($_GET['submit'])) {
	var_dump($_GET);
	# code...
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
		<style>
		textarea::-webkit-input-placeholder {
			color: rgba(255,255,255,0.8);
		}

		textarea:active::-webkit-input-placeholder ,
		textarea:focus::-webkit-input-placeholder {
			color: rgba(255,255,255,0.2);
		}

		textarea::-moz-placeholder {
			color: rgba(255,255,255,0.8);
		}

		textarea:active::-moz-placeholder,
		textarea:focus::-moz-placeholder {
			color: rgba(255,255,255,0.2);
		}

		textarea:-ms-input-placeholder {  
			color: rgba(255,255,255,0.8);
		}

		textarea:active::-ms-input-placeholder ,
		textarea:focus::-ms-input-placeholder {
			color: rgba(255,255,255,0.2);
		}
		textarea{
			line-height: inherit;
			display: inline-block;
			color: #b14943;
			padding:10px;
			cursor: pointer;
			border: 1px dashed #b14943;
			background: transparent;
			font-family: inherit;
			font-size: inherit;
			margin: 0;
			-webkit-appearance: none;
		}
</style>
	</head>
	<body>
		<?php
			require_once("../config.php");
			$con				=	mysql_connect($DB_HOST,$DB_USER,$DB_PASS);
			$username			=	mysql_real_escape_string($_COOKIE['username']);
			$sql				=	"SELECT * FROM `$DB_NAME`.`faculty` WHERE `username`='$username'";
			$data				=	mysql_fetch_object(mysql_query($sql));
		?>
		<form id="nl-form" style="font-size:32px;margin-bottom:30px; margin-top:50px; width:1280px" class="nl-form">
					Application for:
					<select>
						<option value="1" selected>CL</option>
						<option value="2">SCL</option>
						<option value="3">VL</option>
						<option value="4">ML</option>
						<option value="5">OOD</option>
						<option value="6">C-OFF</option>
						<option value="7">EL</option>
					</select><br />
					<label>1. Name
					<input size="18" data-subline="Your Username" type="text" placeholder="Username" name="name" value="<?php echo $data->fullname; ?>" disabled /><br /></label>
					&nbsp;&nbsp;&nbsp;Designation:<input type="text" name="designation" value="<?php echo $data->designation; ?>" disabled /><br />
					&nbsp;&nbsp;&nbsp;Department: <input type="text" name="department" value="<?php echo $data->department; ?>" disabled /><br />
					2. Leave from <input type="date" name="from" /> to <input type="date" name="to" /><br />
					3. Leave Address <input type="text" name="leaveAddress" /><br />
					4. Phone No : Res <input type="text" size="14" name="resPhone"> Mobile <input type="text" size="14" name="mobilePhone"><br>
					
					5. a)Leaving the campus: <br>
					&nbsp;&nbsp;&nbsp;&nbsp;At <input type="date" name="leavingCampusDate">On: <input size="7" type="text" name="leavingCampusTime"><br>
					5. b)Expected to be back: <br>
					&nbsp;&nbsp;&nbsp;&nbsp;At <input type="date" name="joiningCampusDate">On: <input size="7" type="text" name="joiningCampusTime"><br>

					6. Alternate Arrangements: <br>

					<textarea name="" placeholder="For theory" cols="35" rows="4"></textarea> <textarea placeholder="For lab" name="" cols="35" rows="4"></textarea><br>
					7. Send Notification to: <br>
					<select multiple style="width:500px;font-size:14px;" name="people[]" id="friend_list">
						<?php
							$department		=		mysql_real_escape_string($data->department);
							$sql			=		"SELECT * FROM `$DB_NAME`.`faculty` WHERE `department`='$department'";
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