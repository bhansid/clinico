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

		$s = "select * from appointments";
		$q = mysqli_query($conn, $s);
		$t='';
		$t = $t . '<table class="table table-bordered">';
		$t = $t . '<thead>';
		$t = $t . '<th>Appointment ID</th>';
		$t = $t . '<th>Request Date</th>';
		$t = $t . '<th>Symptoms</th>';
		$t = $t . '<th>Mobile No </th>';
		$t = $t . '<th>Patient Name</th>';

		$t = $t . '</thead>';
		while($row = mysqli_fetch_array($q))
		{
			$t = $t . '<tr>';
			$t = $t . '<td>' . $row[0] .'</td>';
			$t = $t . '<td>' . $row[1] . '</td>';
			$t = $t . '<td>' . $row[2] . '</td>';
			$t = $t . '<td>' . $row[3] . '</td>';
		$qq="select name from userprofile where mobileno = $row[3]";
		$ss=mysqli_query($conn,$qq);
		$ss1=mysqli_fetch_array($ss);
			$t = $t . '<td> <a target="_blank" href=patientprofile.php?id='.$row[3].'>' . $ss1[0] . '</a>' . '</td>';

			$t = $t . '</tr>';

		}

$t = $t . '</table>';
echo $t;

	?>



</div>

</body>
</html>
