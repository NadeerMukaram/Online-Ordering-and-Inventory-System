<?php
session_start();
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
                                if(isset($_SESSION['access_token'])) { 
                                    
                              ?>
                              <form method="post" id="oo">
                                   <h5>Enter Contact number:</h5>
                                   <input type="text" class="form-control" autofocus maxlength="11" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" name="contact" ><p></p>
                                   <button type="submit" class="btn btn-success form-control" name="save">Save</button>
                              </form>
                              <div class="d-none" id="verify"><h4>VErifying <i class="fas fa-spinner fa-pulse"></i></h4></div>
                              <?php
                              if(isset($_POST['save'])) {
                                  	$email =$_SESSION['email'] ;
		
			     $sql = " select * from user_account where email = '$email'  ";
                             $result = mysqli_query($con,$sql); // run query
                             $count= mysqli_num_rows($result); // to count if necessary
                        
                              while($row = mysqli_fetch_array($result)){
                                    $userid = $row['user_id'];
                                    
                              }
                                 $contact = $_POST['contact'];
                                 
                                     $sql = " UPDATE `user_account` SET `address`='$address',`contact_no`='$contact', `status` = '0' WHERE user_id ='$userid'  ";
                    $result = mysqli_query($con,$sql); // run query
                 if ($result) {
                     ?>
                     <script>
                     document.getElementById('oo').classList.add('d-none');
                     document.getElementById('verify').classList.remove('d-none');
                         window.location.href="cartverification.php?userid=<?php echo $userid?>";
                    </script>
                     <?php
                 }  
                              }
                                       
                                    
                                }else if(isset($_SESSION['user_id'])) {
                                   ?>
                              <form method="post" id="oo">
                                   <h5>Enter Contact number:</h5>
                                   <input type="text" class="form-control" autofocus maxlength="11" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" name="contact" ><p></p>
                                   <button type="submit" class="btn btn-success form-control" name="save">Save</button>
                              </form>
                              <div class="d-none" id="verify"><h4>VErifying <i class="fas fa-spinner fa-pulse"></i></h4></div>
                              <?php
                              if(isset($_POST['save'])) {
                                  	$userid = $_SESSION['user_id'];
		
			    
                                 $contact = $_POST['contact'];
                                 
                                     $sql = " UPDATE `user_account` SET `address`='$address',`contact_no`='$contact', `status` = '0' WHERE user_id ='$userid'  ";
                    $result = mysqli_query($con,$sql); // run query
                 if ($result) {
                     ?>
                     <script>
                     document.getElementById('oo').classList.add('d-none');
                     document.getElementById('verify').classList.remove('d-none');
                         window.location.href="cartverification.php?userid=<?php echo $userid?>";
                    </script>
                     <?php
                 }  
                              }
                                  
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
                        		$('#wholenote').html("<div class='alert alert-success' role='alert'>Mobile Number Verified Successfully ! Go Back to your Cart Now</div>"); 
                        		   
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