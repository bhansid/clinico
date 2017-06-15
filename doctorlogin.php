<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Login Doctor</title>
	<link href="css/bootstrap.css" rel="stylesheet">
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</head>
<body>
<?php include "header_public.php" ?>
<div class="container">
	<div class="events">
		<div class="container">
			<h2 class="text-center">Doctor Log In</h2>
			<div class="col-md-3"></div>
			<div class="col-md-6">
				<form action="userlogin_action.php" method="post" class="form-horizontal">
					<div class="form-group">
						Mobile No.
						<div class="input-group">
							<span class="input-group-addon">+91</span>
							<input type="text" name="mno" id="mno" minlength="10" maxlength="10" class="form-control" required
								   data-parsley-required="true"/>
						</div>
					</div>
					<div class="form-group">
						Password
						<input type="password" name="pass" required class="form-control"/>
					</div>
					<div class="form-group">
						<input type="submit" value="LOGIN" class="btn btn-primary"/>
						<?php
							if(isset($_REQUEST['msg']))
								echo $_REQUEST['msg'];
						?>
					</div>
				</form>
			</div>
			<div class="col-md-6"></div>
		</div>
	</div>