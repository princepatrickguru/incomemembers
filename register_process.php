<?php 
include("./include/config.php"); 

require('./phpmailer/PHPMailerAutoload.php');
require_once('./phpmailer/class.phpmailer.php');

$sender = $mail_sendername;
$mail_host = $mail_host;
$senderemail = $mail_sender;
$mail_password = $mail_password;

if (isset($_POST['signup'])){

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  $data = strip_tags($data);
  return $data;
}
 
$name =  test_input($_POST['name']);
$phone =  test_input($_POST['phone']);
$email =  test_input($_POST['email']);
$password =  test_input($_POST['password']);

	$result = sprintf("select * from user where phone='%s' or email='%s'",  $phone, $email); 
	$result =mysqli_query($conn, $result);

if(mysqli_num_rows($result) > 0) {

 header("Location: signup.php?exist"); 

}else{

$sql = sprintf('INSERT INTO users
(name, email, phone, password)			
						VALUES 
						("%s","%s","%s","%s")',
						$name,
						$email,
						$phone,		
						$password
						);					
						

mysqli_query($conn,$sql);

$subject = "Account Opening";

$htmlmsg = '
<html>
    <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    </head>
    <body bgcolor="#E0E0E0">
    <table style="margin:0; align="center" border="0" padding:0;" width="100%" bgcolor="#E0E0E0"><tr>
    	<td width="5%"></td>
    	<td width="90%" align="center" >
    <table border="0" style="margin:0; padding:0;" width="100%" border="0" width="100%" align="center" bgcolor="#E0E0E0">
    	
    
    	<tr>
    		<td bgcolor="#fff" align="left" style="color:#000; padding-left:60px; padding-right:30px;">
    		<br />
    			Thank you for opening an account with us. We are happy to welcome you 
    as a member of our growing community and hope that this is the 
    beginning of a long and fruitful journey towards your financial goals.<br />
    <p>
    Email registered: '.$email.'<br />
    Password: ******<br />
    </p>
    <br />
    
    
    		</td>
    	</tr>
    	
    	<tr>
    		<td bgcolor="#000">
    			<center>
    			<p style="color:#fff; margin:8px;"> 
    				If you do not sign up for anything, please ignore this email. <br />
    				If you have any questions, our support team will be pleased to help you..
    			</p>
    			</center>			
    		</td>
    	</tr>
    	<tr>
    		<td align="center">
    			<p><small>&copy;  '.$sitename.'  '.$site_year.'. All rights reserved</small></p>
    			
    		</td>
    	</tr>
    </table>
    	
    	</td>
    	<td width="5%"></td>
    </tr>
    </table>
    
    </body>
</html>
';
        		$mail = new PHPMailer;
				//$mail->SMTPDebug = 3;                               // Enable verbose debug output
				//$mail->isSMTP();                                      // Set mailer to use SMTP
				$mail->Host = $mail_host;  // Specify main and backup SMTP servers
				$mail->SMTPAuth = true;                               // Enable SMTP authentication
				$mail->Username = $senderemail;                 // SMTP username
				$mail->Password = $mail_password;                           // SMTP password
				$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
				$mail->Port = 587;                                    // TCP port to connect to

				$mail->setFrom($senderemail, $sender);
				$mail->addAddress($email);     // Add a recipient

				$mail->addReplyTo($senderemail);

				$mail->isHTML(true);  

				$mail->Subject = $subject;
				$mail->Body    = $htmlmsg;

				if(!$mail->send()) {
					echo '<br />';
				} else {
					echo '<br />';
				}
				
 header("Location: login.php?success"); 

			}

}
?>