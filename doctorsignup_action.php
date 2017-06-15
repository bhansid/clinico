<?php
	include "connection.php";
	session_start();
	$name=$_REQUEST['name'];
	$dob=$_REQUEST['dob'];
	$email=$_REQUEST['email'];
	$pass=$_REQUEST['pass'];
	$cpass=$_REQUEST['cpass'];
	$spe=$_REQUEST['specialization'];
	$mno=$_REQUEST['mno'];
	$otpc = $_SESSION["otp"];
	$otp=$_REQUEST["otp"];

	$select="select * from doctorsignup";
	$res=mysqli_query($conn,$select);
	$flag=false;
	while ($row=mysqli_fetch_array($res)){
		if($row[0] == $mno){
			$flag=false;
			break;
		}
	}
	if($flag == true){
		header("location:usersignup.php?msg=Mobile already exists");
	}
	else{
		if($pass == $cpass){
			if($otp == $otpc && $otp!="")
			{
				$insert = "insert into doctorsignup values('$mno','$email','$pass','$otp','$spe')";
				mysqli_query($conn, $insert);
				header("location:usersignup.php?msg=Doctor Signed up successfully");
			}
			else{
				header("location:usersignup.php?msg=Wrong OTP");
			}
		}
		else{
			header("location:usersignup.php?msg=Check Password");
		}
	}