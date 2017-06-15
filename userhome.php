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
<?php include "header_user.php" ?>

<div class="container">
<h2>Search Symptoms</h2>
	<div class="form-group-lg">
		<div class="col-sm-1"></div>
		<div class="col-sm-8">
			<input id="txtsrch" name="txtsrch" placeholder="Start typing to search symptoms" class="form-control"/>
		</div>
		<div class="col-sm-2">
			<button class="btn btn-primary btn-lg" onclick="searchareas()">
				<span class=" glyphicon glyphicon-search"></span> Search
			</button>
		</div>
		<div class="col-sm-1"></div>
	</div>

	<div class="row">
		<div class="col-sm-12">
			<div id="symptoms"></div>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-12">
			<div id="txtHint"></div>
		</div>
	</div>
	<br><br>
</div>

</body>
</html>
