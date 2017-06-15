<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Signup User</title>
	<link href="css/bootstrap.css" rel="stylesheet">
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery-ui.js"></script>
	<script src="js/parsley.min.js"></script>
</head>
<body>
<?php include "header_public.php" ?>
	<div class="container">
		<h2 class="text-center">Patient Sign Up</h2>
		<div class="col-md-3"></div>
		<div class="col-md-6">
			<form action="usersignup_action.php" method="post">
				<div class="form-group">
					Name
					<input type="text" class="form-control" name="name" required data-parsley-required="true"/>
				</div>
				<div class="form-group">
					Date of Birth
					<input type="date" name="dob" id="dt" required class="form-control"/>

				</div>
				<div class="form-group">
					Email
					<input type="email" name="email" class="form-control" required data-parsley-required="true"/>
				</div>
				<div class="form-group">
					Password
					<input type="password" name="pass" class="form-control" required data-parsley-required="true"/>
				</div>
				<div class="form-group">
					Confirm Password
					<input type="password" name="cpass" class="form-control" required data-parsley-required="true"/>
				</div>
				<div class="form-group">
					Mobile No.
					<div class="input-group">
						<span class="input-group-addon">+91</span>
						<input type="text" name="mno" id="mno" minlength="10" maxlength="10" class="form-control" required
							   data-parsley-required="true"/>
					</div>
					<input type="button" class="btn btn-success" value="Send OTP" onclick="sendotp()">
					<div id="otp">

					</div>
				</div>
				<div class="form-group">
					<input type="submit" value="SUBMIT" class="btn btn-primary"/>
					<?php
						if(isset($_REQUEST['msg']))
							echo $_REQUEST['msg'];
					?>
				</div>

			</form>
		</div>
		<div class="col-md-3"></div>
	</div>
<script>
    function sendotp() {
        var mno=parseInt(document.getElementById("mno").value);
//            alert (mno);
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("otp").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "otpaction.php?mno=" + mno, true);
        xmlhttp.send();
    }
    $('#usersignup').parsley();

</script>
</body>
</html>