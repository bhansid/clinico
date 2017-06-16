<?php
	session_start();
	$mno = $_REQUEST["mno"];
	include "connection.php";
	$t="";
	for($i=1;$i<=6;$i++)
	{
		$t = $t . rand(1, 9);
	}
	$_SESSION["otp"]=$t;

	//Your authentication key
	$authKey = "#####";

	//Multiple mobiles numbers separated by comma
	$mobileNumber = "91$mno";

	//Sender ID,While using route4 sender id should be 6 characters long.
	$senderId = "#####";

	//Your message to send, Add URL encoding here.
	$message = urlencode("Your OTP to sign up for  is $t" );

	$postData = array(
		'authkey' => $authKey,
		'mobile' => $mobileNumber,
		'message' => $message,
		'sender' => $senderId,
		'otp' => $t
	);

	//API URL
	$url="https://control.msg91.com/api/sendotp.php";

	// init the resource
	$ch = curl_init();
	curl_setopt_array($ch, array(
		CURLOPT_URL => $url,
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_POST => true,
		CURLOPT_POSTFIELDS => $postData
	,CURLOPT_FOLLOWLOCATION => true
	));


	//Ignore SSL certificate verification
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);


	//get response
	$output = curl_exec($ch);
	//Print error if any
	if(curl_errno($ch))
	{
		echo 'error:' . curl_error($ch);
	}
	curl_close($ch);
	//
	//echo $t;
	echo 'Enter OTP received <input type="text" name="otp" id="otp" maxlength="6" minlength="6" required/>';

?>