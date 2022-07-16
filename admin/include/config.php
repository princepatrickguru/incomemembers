<?php

$server = "localhost";
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "inmembers";

$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
} 	
	$one = 1;

	$sql_settings = sprintf("SELECT * FROM settings WHERE settings_id = %s", $one);

		if($result_settings= mysqli_query($conn, $sql_settings)){
		
		$row_Settings = mysqli_fetch_assoc($result_settings);
			$sitename = $row_Settings['sitename'];
			$sitephone = $row_Settings['sitephone'];
			$siteemail = $row_Settings['siteemail'];
			$sitelogo = $row_Settings['logo'];
			$siteurl = $row_Settings['url'];
			$sitechat = $row_Settings['site_chat'];
			$siteyear = $row_Settings['site_year'];
			$siteauthurl = $row_Settings['auth_url'];
			$siteuserurl = $row_Settings['user_url'];
			$sitefavicon = $row_Settings['favicon'];
			$sitesms_unit = $row_Settings['sms_unit'];
			$sitesms_sid = $row_Settings['sms_sid'];
			$sitesms_token = $row_Settings['sms_token'];
			$sitesms_number = $row_Settings['sms_number'];
			
			$mail_host = $row_Settings['mail_host'];
			$mail_sender = $row_Settings['mail_sender'];
			$mail_sendername = $row_Settings['mail_sendername'];
			$mail_password = $row_Settings['mail_password'];
			$host_username = $row_Settings['host_username'];

		}

?>