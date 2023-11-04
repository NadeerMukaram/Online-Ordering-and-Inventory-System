
	  <!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="icon" href="../img/tabicon.png" type="image/gif" sizes="16x16">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
<link rel="stylesheet" type="text/css" href="../css/homepage.css?v=4740" />

<link rel="stylesheet" type="text/css" href="../css/shoppingcart.css?v=2410" />

<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Titillium+Web:wght@600&display=swap" rel="stylesheet">

</head>
<title>Shopping Cart</title>
<?php 
    include '../admin/connection/connect.php';
?>
</head>

<body style="font-family: 'Titillium Web', sans-serif;">


<header>


<!-- NAVIGATION BAR --> 
</header>


<article>

    <main>
        <div class="container">
            <p><br><br></p>
                <div class="row">
                    <div class="col-sm-2">
                        <a href="../home" class="btn btn-dark" style="font-size:12px"><i class="fas fa-arrow-left"></i> Back to Home</a><p></p>
                        
                        
                    </div>
                     <div class="col-sm-8">
                                   <?php
                if(isset($_GET['userid'])) {
                   $userid= $_GET['userid'];
                   
                    
                      
                       for ($s = '', $i = 0, $z = strlen($a = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789')-1; $i != 6; $x = rand(0,$z), $s .= $a{$x}, $i++); 
                      $sendcode = "UPDATE `user_account` SET `vcode`='$s' WHERE user_id = '$userid'";
                       $Codegenerate = mysqli_query($con,$sendcode); // run query
                   if($Codegenerate) {
                       $selectacc = "select * from user_account where user_id = '$userid' ";
                     $run = mysqli_query($con,$selectacc); // run query
                      while($out = mysqli_fetch_array($run)){ 
                         $mobile = $out['contact_no'];
                         $vcode = $out['vcode'];
                         
                      } 
                   }    
                       
                      
                      function itexmo($number,$message,$apicode,$passwd){
		$url = 'https://www.itexmo.com/php_api/api.php';
		$itexmo = array('1' => $number, '2' => $message, '3' => $apicode, 'passwd' => $passwd);
		$param = array(
			'http' => array(
				'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
				'method'  => 'POST',
				'content' => http_build_query($itexmo),
			),
		);
		$context  = stream_context_create($param);
		return file_get_contents($url, false, $context);
}
 $message1 = "Hi , This is your verification code :    " ;
 $messages = $message1.$vcode;

 
 itexmo($mobile,$messages,'TR-HANTE304913_N6VGH','b{!b@m#an@');
   
                            
                   ?>
                   <h6>
              <span id="noti">  </span>      
            <span id="wholenote">
           An OTP Verification Code was Sent to Your Mobile Number <?php echo  $mobile?> . <p></p> Please Check your mobile phone.. <p></p> <span style="color:grey;font-size:14px"><i class="fas fa-info-circle"></i> If this is not your mobile number go to , Home>>Myaccount>>Account Details>>Edit</span>
            <p></p>
            <span id="showotp" class="">
            <input type="text" id="entrycode" class="form-control" placeholder="Enter OTP verification Code">
           
            <input type="hidden" id="contact" value="<?php echo $mobile?>">
            <input type="hidden" id="userid" value="<?php echo $userid?>">
           
            <p></p>
            <span style="color:grey;font-size:12px"><i class="fas fa-info-circle"></i> Note : Verification Code quite Sensitive.  <p></p>if you didnt receive the Code , kindly check your number.</span>
            <p></p>
           <h6>If you dont receive Any message containing Verification Code , Were Sorry as it is a free text api only 
           We Put it on our system For Development Purpose only. We All know that free has a limit .
            <br>This is your VERIFICATION CODE : <span style="color:white;font-size:20px;font-weight:bold"><?php echo $vcode?></span>
           </h6>
             <button class="btn btn-secondary sendcode">VERIFY</button>
             </span>
             </span>
                </h6>
               
                   <?php
                }
            ?> 
                    </div>
                     <div class="col-sm-2">
                         <a href="../cart" class="btn btn-dark" style="font-size:12px"> Back to Cart <i class="fas fa-arrow-right"></i></a>
                    </div>
                    
                    
                </div>
        </div>
        
    </main>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
 $(document).ready(function() { 
    
     $('.sendcode').click(function() { 
        
           var code = $('#entrycode').val();
            var contact = $('#contact').val();
            var userid = $('#userid').val();
            
           $.ajax({
                        			url	:	"verify.php",
                        			method:	"POST",
                        			data	:	{sendcode:1,code:code,contact:contact,userid:userid},
                        			success	:	function(data){
                        		 if(data == 'success') {
                        		$('#wholenote').html("<div class='alert alert-success' role='alert'>Mobile Number Verified Successfully ! Redirecting <i class='fas fa-spinner fa-pulse'></i></div>"); 
                        		   setInterval(function(){
                        		       window.location.href="index.php";
                        		   },2000);
                        		 }else {
                        		    	$('#noti').html(data);  
                        		 }
                        		
                        			
                        		
                        	
                        			}
                        		})
                        	
          
      }) 
 });
 </script>

<div class="slider_for_shoppingcart"></div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="../js/shoppingcart.js"></script>
<script src="../js/nav.js"></script>
</body>

</html> 