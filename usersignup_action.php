<?php
	include "connection.php";
	session_start();
	$name=$_REQUEST['name'];
	$dob=$_REQUEST['dob'];
	$email=$_REQUEST['email'];
	$pass=$_REQUEST['pass'];
	$cpass=$_REQUEST['cpass'];
	$mno=$_REQUEST['mno'];
	$otpc = $_SESSION["otp"];
	$otp=$_REQUEST["otp"];

	$select="select * from usersignup";
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
				$insert = "insert into usersignup values('$mno','$email','$pass','$otp')";
				mysqli_query($conn, $insert);

				# object oriented

				# procedural
				$dob1= date_diff(date_create($dob), date_create('today'))->y;
				echo $dob1;
				$insert1 = "insert into userprofile values('$mno','$name','$dob1',NULL,NULL,NULL)";
				mysqli_query($conn, $insert1);
				header("location:usersignup.php?msg=User Signed up successfully");
			}
			else{
				header("location:usersignup.php?msg=Wrong OTP");
			}
		}
		else{
			header("location:usersignup.php?msg=Check Password");
		}
	}