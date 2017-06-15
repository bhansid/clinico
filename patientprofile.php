<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Home</title>
	<link href="css/bootstrap.css" rel="stylesheet">

	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>

	<script src="js/jquery-ui.js"></script>
	<link rel="stylesheet" href="css/jquery-ui.css">
	<script src="src/tag-it.min.js"></script>
	<!--	<script src="src/jquery.tagsinput.min.js"></script>-->
	<!--	<link href="src/jquery.tagsinput.min.css" rel="stylesheet">-->
	<link href="src/jquery.tagit.css" rel="stylesheet">


</head>
<body>
<?php include "header_doctor.php" ?>
<?php include "connection.php" ?>
<div class="container">
<?php
$mm=$_REQUEST['id'];
$q = "select * from userprofile where mobileno='$mm'";

$qq = mysqli_query($conn,$q);
		$t='';
		$t = $t . '<table class="table table-bordered">';
		$t = $t . '<thead>';
		$t = $t . '<th>Mobile No</th>';
		$t = $t . '<th>Name</th>';
		$t = $t . '<th>Age</th>';
		$t = $t . '<th>Weight</th>';
		$t = $t . '<th>Gender</th>';
		$t = $t . '<th>Allergic</th>';
		$t = $t . '</thead>';
		while($row = mysqli_fetch_array($qq))
		{
			$t = $t . '<tr>';
			$t = $t . '<td>' . $row[0] .'</td>';
			$t = $t . '<td>' . $row[1] . '</td>';
			$t = $t . '<td>' . $row[2] . '</td>';
			$t = $t . '<td>' . $row[3] . '</td>';
			$t = $t . '<td>' . $row[4] . '</td>';
			$t = $t . '<td>' . $row[5] . '</td>';
			$t = $t . '</tr>';
		}

$t = $t . '</table>';
echo $t;

?>
</div>
</body>
</html>
