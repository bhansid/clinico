<?php
	include "connection.php";
	$time=$_REQUEST['time'];
	$mono=$_REQUEST['mo'];
	$sym=$_REQUEST['sym'];

	$insert = "insert into appointments values(NULL,'$time','$sym','$mono')";

	$authKey = "#####";
	$message = urlencode("Your Appointment request has been submitted. You will be contacted soon by a doctor." );
	$mobileNumber = "91$mono";
	$senderId = "#####";
	$message = urlencode("$message" );
	$route = "4";
	$postData = array(
		'authkey' => $authKey,
		'mobiles' => $mobileNumber,
		'message' => $message,
		'sender' => $senderId,
		'route' => $route
	);
	$url="https://control.msg91.com/api/sendhttp.php";
	$ch = curl_init();
	curl_setopt_array($ch, array(
		CURLOPT_URL => $url,
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_POST => true,
		CURLOPT_POSTFIELDS => $postData
		//,CURLOPT_FOLLOWLOCATION => true
	));
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
	$output = curl_exec($ch);
	if(curl_errno($ch))
	{
		echo 'error:' . curl_error($ch);
	}
	curl_close($ch);
	echo ("SMS Sent");
	mysqli_query($conn, $insert);

