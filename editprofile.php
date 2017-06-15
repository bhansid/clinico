<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Doctor Signup</title>
	<link href="css/bootstrap.css" rel="stylesheet">
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</head>
<body>
<?php
	include "connection.php";
	include "header_user.php";
	session_start();

	$id = $_SESSION['user'];
	$select="select * from patients where mobileno=$id";
	$res=mysqli_query($conn,$select);
	$row=mysqli_fetch_array($res);
?>
	<div class="container">
		<h2>Edit Profile</h2>
		<form action="editprofile_action.php" method="post">
			<div class="form-group">
				Patient Mobile Number
				<input type="text" name="mno" value="<?php echo $row[0] ?>" class="form-control" required readonly/>
			</div>

			<div class="form-group">
				Patient Name
				<input type="text" name="pname" value="<?php echo $row[1] ?>" class="form-control" required/>
			</div>

			<div class="form-group">
				Patient Age
				<input type="date" name="page" value="<?php echo $row[2] ?>" class="form-control" required readonly/>
			</div>

			<div class="form-group">
				Patient Weight
				<input type="number" name="weight" value="<?php echo $row[3] ?>" required class="form-control"/>
			</div>

			<div class="form-group">
				Patient Gender
				<input type="number" name="gender" value="<?php echo $row[4] ?>" required class="form-control"/>
			</div>

			<div class="form-group">
				<br>
				<input type="submit" value="SUBMIT" class="btn btn-primary form-control"/>
			</div>
		</form>
	</div>
</body>
</html>