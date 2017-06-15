<?php
	session_start();
	if (is_null($_SESSION['user'])) {
		header("location:doctorlogin.php");
	}
	include "connection.php";
?>


<div class="header">
	<div class="container-fluid">
		<nav class="navbar navbar-default">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
						data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<div class="logo">
					<a class="navbar-brand" href="userhome.php">Clinico</a>
				</div>
			</div>

			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse nav-wil" id="bs-example-navbar-collapse-1">
				<nav class="cl-effect-5" id="cl-effect-5">
					<ul class="nav navbar-nav">
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown"
							   role="button" aria-haspopup="true" aria-expanded="false">Settings<span
									class="caret"></span></a>
							<ul class="dropdown-menu">
								<li><a href="editprofile.php">Edit Profile</a> </li>
								<li><a href="userchangepassword.php">Change Password</a></li>
								<li><a href="doctorlogout.php">LogOut</a></li>
							</ul>
						</li>
						<li class="active navbar-right"><a>Welcome ,
								<?php $u=$_SESSION['user']; $q="select name from doctorsignup where mobileno= '$u'"; $qu=mysqli_query($conn,$q);$qu1=mysqli_fetch_array($qu); echo $qu1[0]; ?></a></li>

					</ul>
				</nav>
			</div>
			<!-- /.navbar-collapse -->
		</nav>
	</div>
</div>





