<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

 include "PHPMailer/PHPMailerAutoload.php"; 

include 'PHPMailer/Exception.php';
include 'PHPMailer/PHPMailer.php';
include 'PHPMailer/SMTP.php';

$mail = new PHPMailer;
//$mail->isSMTP(); 
//SMTP_SERVER: smtpout.secureserver.net (or alternatively relay-hosting.secureserver.net)
//SMTP_PORT: 465 //or 3535 or 80 or 25
//SMTP_AUTH: true //always
//SMTP_Secure: 'ssl' //only if using port 465
$mail->SMTPDebug =2; // 0 = off (for production use) - 1 = client messages - 2 = client and server messages

$mail->Host = localhost; // use $mail->Host = gethostbyname('smtp.gmail.com'); // if your network does not support SMTP over IPv6
//$mail->SMTPSecure = "tls";
//$mail->Port = 80;
//$mail->SMTPAuth = true;


//$mail->Username = 'noreply@hantechdesign.com'; // email
//$mail->Password = '$Mj?TzBkdVW='; // password
$mail->setFrom('noreply@hantechdesign.com','Hantech-Support'); // From email and name
if(isset($_GET['send'])) {
    $useremail= $_GET['email'];
    $username = $_GET['name'];
  
    $user = 'Mr/Mrs.'.$username;
}
$mail->addAddress($useremail,$user); // to email and name
$mail->Subject = 'WELCOME';
$mail->msgHTML("
<!doctype html>
<html lang='en'>
<body style='	width: 100%;
	height: 100vh;
	background-image: linear-gradient(to top, white , #7BA9D1, #7BA9D1);'>
	<p><br><br></p>

<div class='emailbdy' style='	text-align:center;
	margin:3rem;'>



<h1 style='	font-family:Impact;
	font-size:3rem;'>Welcome and Thank You $user </h1>
<hr>
<p style='	font-family:arial;
	margin:1rem;
	font-size:1.2rem;'>
We are glad, happy and can't wait to serve you. <br>
Make some choices and Make some Orders <br>
Enjoy Shopping !!
</p>

<h5 style='	margin-top:5rem;
	font-family:verdana;'>The Hantech Team</h5>
© 2021 Hantech, All Rights Reserved
</div>

</body>

</html>

");
$mail->AltBody = 'HTML messaging not supported'; // If html emails is not supported by the receiver, show this body
// $mail->addAttachment('images/phpmailer_mini.png'); //Attach an image file
/*$mail->SMTPOptions = array(
                    'ssl' => array(
                        'verify_peer' => false,
                        'verify_peer_name' => false,
                        'allow_self_signed' => true
                    )
                );*/
if(!$mail->send()){
    echo "Mailer Error: " ;
}else{
  //page to go
}

?>
