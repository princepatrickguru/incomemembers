<?php 
session_start();

include("../include/config.php"); 

require('../phpmailer/PHPMailerAutoload.php');
require_once('../phpmailer/class.phpmailer.php');

$sender = $mail_sendername;
$mail_host = $mail_host;
$senderemail = $mail_sender;
$mail_password = $mail_password;

if (isset($_POST['login'])){

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  $data = strip_tags($data);
  return $data;
}
 

$email =  test_input($_POST['email']);
$password =  test_input($_POST['password']);

	$query = sprintf("select * from users where password='%s' and email='%s'",  $password, $email); 
	$result = mysqli_query($conn, $query);
	
	
if(mysqli_num_rows($result) > 0) {

    $row = mysqli_fetch_assoc($result);
    
    $_SESSION["id"] = $row['id'];
    $_SESSION["email"] = $email;
?>
	<script>
      alert("Login Successful");
	  window.location = "dashboard.php"; 
	</script>
<?php
	}else{
?>
	<script>
      alert("Invalid Login");
	  window.location = "login.html"; 
	</script>
<?php

			}

}
?>