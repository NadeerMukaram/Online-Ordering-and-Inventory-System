<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

 include "PHPMailer/PHPMailerAutoload.php"; 

include 'PHPMailer/Exception.php';
include 'PHPMailer/PHPMailer.php';
include 'PHPMailer/SMTP.php';
session_start();   

include '../admin/connection/connect.php';
$mail = new PHPMailer;
$mail->SMTPDebug =0; 
$mail->Host = localhost; 
$mail->setFrom('noreply@hantechdesign.com','Hantech-Support');
?>
 <!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="icon" href="../img/tabicon.png" type="image/gif" sizes="16x16">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css">
<link rel="stylesheet" type="text/css" href="../css/homepage.css?v=4740" />
<link rel="stylesheet" type="text/css" href="../css/bestsellers.css?v=045" />

<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Titillium+Web:wght@600&display=swap" rel="stylesheet">

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.min.js"></script>

<title>Recovery</title>
</head>

<body style="background-image: url(../img/pexels-pixabay-3263101.jpg);
		 background-repeat: no-repeat;
		 background-size:100% 100%;
         font-family: 'Titillium Web', sans-serif;
">

<style>a {text-decoration:none}</style>





<style>
    
.starbody {
    background-image:url("../img/star-body-ok.png");
    background-size: 100% 110%;
    image-rendering: -webkit-optimize-contrast;
}    
    
</style>


<p><br><br></p>
<div class="container">
    <div class="row">
        <div class="col-sm-2"></div>
       <?php
        if(isset($_POST['sub'])) {
            $email = $_POST['txtemail'];
            $number = $_POST['txtnum'];
            
            	$sql = "select * from user_account where contact_no = '$number' and email = '$email' and logintype='personal'  ";
                $result = mysqli_query($con,$sql); // run query
                $count= mysqli_num_rows($result); // to count if necessary
               //  $get_id =  mysqli_insert_id($con); // this code gets the newly inserted id . if insert is the action
             if ($count==1){
                  while($row = mysqli_fetch_array($result)){
	                $user_id = $row['user_id'];
	                 }
     for ($s = '', $i = 0, $z = strlen($a = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789')-1; $i != 6; $x = rand(0,$z), $s .= $a{$x}, $i++);  
           $pass =$s;
           
            $update = "UPDATE `user_account` set `password`='$pass' WHERE user_id = '$user_id'";
            $updateresult = mysqli_query($con,$update); // run query
            if($updateresult) {
                $select = "select * from user_account where user_id = '$user_id'";
                $selectresult = mysqli_query($con,$select); // run query
                 while($rows = mysqli_fetch_array($selectresult)){
	                $newpass = $rows['password'];
	                 }
            }
  $mail->addAddress($email,' '); // to email and name
$mail->Subject = 'Password-Recovery';
$mail->msgHTML("
<!doctype html>
<html lang='en'>
<body style='	width: 100%;
	height: 100vh;
	background-image: linear-gradient(to top, white , #7BA9D1, #7BA9D1);'>
	<p><br><br></p>

<div class='emailbdy' style='	text-align:center;
	margin:3rem;'>



<h2 style='	font-family:Impact;
	'>Your new password is : <span style='font-weight:bolder;margin-left:10px;font-size:25px'>  $newpass </span>  </h2>
<hr>
<p style='	font-family:arial;
	margin:1rem;
	font-size:1.2rem;'>
<br> <br>

</p>

<h5 style='	margin-top:5rem;
	font-family:verdana;'>The Hantech Team</h5>
© 2021 Hantech, All Rights Reserved
</div>

</body>

</html>

");
            ?>
           
             <div class="col-sm-8">
            <h5>New password was sent to :</h5> <h4><?php echo $email?></h4><br>
            <h6>Kindly check your email and use the new given password..</h6>
                <br>
                <a href="index.php">Sign-IN Here</a>
        </div>
       
           
            <?php
          }else {
            ?>
              <div class="col-sm-8">
            <h5>Were <span style="color:red">sorry </span>. we could not find your account.. <br>For Help  Contact us at : support@hantechdesign.com <br>if you havent signup yet.</h5>
             <h5><a href="index.php">Signup Here</a></h5> 
            <br>
            <h5><a href="recovery.php">Try again</a></h5>
            <br>
          
        </div>
            <?php
          }
          
        }else {
            ?>
                 <div class="col-sm-8">
            <h4>Password Recovery</h4>
            <br>
            
                <h6>Enter current Email:</h6>
                <form method="post">
                <input type="email" name="txtemail" class="form-control" style="font-size:13px;" required autofocus>
                <br>
                 <h6>Enter Mobile number:</h6>
                <input type="text" name="txtnum" maxlength="11" class="form-control" style="font-size:13px;" required oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
                <br>
               <button type="submit" name="sub" class="btn btn-secondary" style="float:right"> Submit</button> 
             </form>
        </div>
        
            <?php
        }
       ?>
        
       
         
        
        <div class="col-sm-2"></div>
    </div>
</div>

</div>



<!-- SLIDER ANIMATION FOR NAV--> 
<div class="slider"></div>




<!-- SCRIPTS USED --> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/latest/TweenMax.min.js" integrity="sha512-8Wy4KH0O+AuzjMm1w5QfZ5j5/y8Q/kcUktK9mPUVaUoBvh3QPUZB822W/vy7ULqri3yR8daH3F58+Y8Z08qzeg==" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/latest/TimelineMax.min.js" integrity="sha512-lJDBw/vKlGO8aIZB8/6CY4lV+EMAL3qzViHid6wXjH/uDrqUl+uvfCROHXAEL0T/bgdAQHSuE68vRlcFHUdrUw==" crossorigin="anonymous"></script>
<script src="../js/nav.js"></script>
<script src="../js/animation_alt_abc.js"></script>
<script src="../js/searchbar.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js" integrity="sha512-U6K1YLIFUWcvuw5ucmMtT9HH4t0uz3M366qrF5y4vnyH6dgDzndlcGvH/Lz5k8NFh80SN95aJ5rqGZEdaQZ7ZQ==" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>



<!-- POP UP GALLERY FUNCTION JS --> 
<script>
$(document).ready(function() {
    $('.popup-gallery').magnificPopup({
        delegate: 'a',
        type: 'image',
        tLoading: 'Loading image #%curr%...',
        mainClass: 'mfp-img-mobile',
        gallery: {
            enabled: true,
            navigateByImgClick: true,
            preload: [0,1] // Will preload 0 - before current, and 1 after the current image
        }
    });
});
function logout() {
    window.location.href="../signin/logout.php";
}
function clickdirect() {
    window.location.href="../cart";
}
</script>


</body>

</html> 

<?php
$mail->AltBody = 'HTML messaging not supported';
if(!$mail->send()){
   
}else{
  
 
}
?>