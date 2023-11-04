<?php 
	session_start();

if (isset($_SESSION['access_token'])) { ////////////////////////////////////////////////////////////////////////gmail users
      
          
    if (isset($_POST['btnproceeds'])) {
 include '../administrator/connection/connect.php';
        $trans_type =$_POST['typetrans'];
         $totaldue = $_POST['totalamount'];
          $truth = $_POST['truths'];
          $promo = $_POST['promo_ids'];
          $addr = $_POST['txtaddr'];
          $city = $_POST['txtcity'];
          $zip = $_POST['txtzip'];
          
              
                    
            	$email =$_SESSION['email'] ;
	
			     $sql = " select * from user_account where email = '$email'  ";
                             $result = mysqli_query($con,$sql); // run query
                           
                        
                              while($row = mysqli_fetch_array($result)){
                                    $userid = $row['user_id'];
                                    
                              }
                              
                           if ($trans_type == 'cod') { ////////////////////////////////////////////////////////////////////////////////////////for COD
                          
                              $insertcart = "select * from cart where user_id = '$userid'  ";
                             $resultcart = mysqli_query($con,$insertcart); // run query
                                 $count= mysqli_num_rows($resultcart); 
                        if ($count >=1) {
                              
                                 
                              while($row = mysqli_fetch_array($resultcart)){
                                  $prodid = $row['prod_id'];
                                  $qty = $row['qty'];
                                  $total = $row['total'];
                                 date_default_timezone_set('Asia/Manila');
                                $todays_date = date("Y-m-d h:i:s");
                                    
              
              
                                                                	for ($i = 0; $i < $count; $i++) {
																				//count($id_array) --> if I input 4 fields, count($id_array) = 4)
                                                                            if($truth == 'promo') {
             $insert = "  INSERT INTO `trans_record`(`user_id`, `prod_id`, `quantity`, `total`, `dateandtime`, `transaction_type`,`stat_checkout`,`promo_id`,`addr`,`city`,`zipcode`,`status`) VALUES ('$userid','$prodid','$qty','$total','$todays_date','$trans_type','false','$promo','$addr','$city','$zip','pending') ";  
                                                                                   $selectpro = "select * from productstock where prod_id = '$prodid' order by modified asc limit 1";
                                                                                   $rungetdef = mysqli_query($con,$selectpro);
                                                                                   $countdefaultstock = 0;
                                                                                   while($getst = mysqli_fetch_array($rungetdef)){ 
                                                                                       $defstock = $getst['stock'];
                                                                                      $stockid = $getst['stock_id'];
                                                                                      $finalstock = $defstock - $qty;
                                                                                      $updatestock = "update productstock set `stock` ='$finalstock' where stock_id ='$stockid' ";
		                                                                             $changestock = mysqli_query($con,$updatestock); // run query
                                                                                   }
                                                                                   
                                                                               
                                                                                    
                                                                                
                                                                            }else {
        $insert = "  INSERT INTO `trans_record`(`user_id`, `prod_id`, `quantity`, `total`, `dateandtime`, `transaction_type`,`stat_checkout`,`addr`,`city`,`zipcode`,`status`) VALUES ('$userid','$prodid','$qty','$total','$todays_date','$trans_type','false','$addr','$city','$zip','pending') ";      
                                                                              $selectpro = "select * from productstock where prod_id = '$prodid' order by modified asc limit 1";
                                                                                   $rungetdef = mysqli_query($con,$selectpro);
                                                                                   $countdefaultstock = 0;
                                                                                   while($getst = mysqli_fetch_array($rungetdef)){ 
                                                                                       $defstock = $getst['stock'];
                                                                                      $stockid = $getst['stock_id'];
                                                                                      $finalstock = $defstock - $qty;
                                                                                      $updatestock = "update productstock set `stock` ='$finalstock' where stock_id ='$stockid' ";
		                                                                             $changestock = mysqli_query($con,$updatestock); // run query
                                                                                   }
                                                                                   
                                                                           
                                                                            }
																				  
																				 
																				}
												 		            
												 		                		 $resultaaa = mysqli_query($con,$insert); // run query*/  
                                 
                                    
                              }
                        }
                        if ( $resultaaa) {
                              $deletecartitem = "DELETE FROM `cart` WHERE user_id= '$userid'";
                                 mysqli_query($con,$deletecartitem); 
                            
        
 ?>
<!DOCTYPE html>
<html>
<head>
    <link rel="icon" href="../img/tabicon.png" type="image/gif" sizes="16x16">
    <link rel="stylesheet" type="text/css" href="../css/homepage.css?v=4840" />
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Titillium+Web:wght@600&display=swap" rel="stylesheet">
    
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
    	background-image: linear-gradient(to top, #deded6 , #c8c6a7, #c8c6a7);
    	background-repeat:no-repeat;
    	background-size:100% 100%;
    	font-family: 'Titillium Web', sans-serif;
}
/* Center the loader */
#loader {
        background-image: linear-gradient(to top, #deded6 , #c8c6a7, #c8c6a7);
    	background-repeat:no-repeat;
    	background-size:100% 100%;
  position: absolute;
  left: 50%;
  top: 50%;
  z-index: 1;
  width: 120px;
  height: 120px;
  margin: -76px 0 0 -76px;
  border: 16px solid #333333;
  border-radius: 50%;
  border-top: 16px solid #deded6;
  -webkit-animation: spin 2s linear infinite;
  animation: spin 2s linear infinite;
}

@-webkit-keyframes spin {
  0% { -webkit-transform: rotate(0deg); }
  100% { -webkit-transform: rotate(360deg); }
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}

/* Add animation to "page content" */
.animate-bottom {
  position: relative;
  -webkit-animation-name: animatebottom;
  -webkit-animation-duration: 1s;
  animation-name: animatebottom;
  animation-duration: 1s
}

@-webkit-keyframes animatebottom {
  from { bottom:-100px; opacity:0 } 
  to { bottom:0px; opacity:1 }
}

@keyframes animatebottom { 
  from{ bottom:-100px; opacity:0 } 
  to{ bottom:0; opacity:1 }
}

#myDiv {
  display: none;
  text-align: center;
}
i {
   margin-top:100px;  
   font-size:80px;
   color:white;
}

h1 {
   
}
</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />
</head>
<body onload="myFunction()" style="margin:0;">

<div id="loader"></div>

<div style="display:none;" id="myDiv" class="animate-bottom">
                             <i style="" class='fas fa-check-circle'></i>
     <h1>Transaction  Completed. <br>Thank You!</h1> <br>
        <h4> To see the status of your order click <a href="../orders/orders.php">HERE</a>  <br> <br>To make some more orders click  <a href="../category">HERE</a></h4>
    
 
</div>

<script>
var myVar;

function myFunction() {
  myVar = setTimeout(showPage, 2000);
}

function showPage() {
  document.getElementById("loader").style.display = "none";
  document.getElementById("myDiv").style.display = "block";
}
</script>

</body>
</html>

 <?php   
    }else {
       ?>
        <script>
            alert("please Select Item First before doing proceedings! thankyou..");
            window.location.href="../category";
        </script>
        <?php 
    }
    
    }else  if ($trans_type == 'pickup') { ////////////////////////////////////////////////////////////////////////////////////////////////for pickup
       $trans_type =$_POST['typetrans'];
         $totaldue = $_POST['totalamount'];
          $truth = $_POST['truths'];
          $promo = $_POST['promo_ids']; 
          	$email =$_SESSION['email'] ;
          	
          	
         $selectavils = " SELECT * FROM `sales_discount` where sal_id = '2' ";
                       $resultavils = mysqli_query($con,$selectavils); // run query
                       
                  
                       
                        while($row = mysqli_fetch_array($resultavils)){
                              $amount =  $row['amount'];
                        }
                 
                    
                    if ($totaldue >= $amount) {
                      //will pay ahead
                      
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
<link rel="stylesheet" type="text/css" href="../css/homepage.css?v=4145" />

<link rel="stylesheet" type="text/css" href="../css/shoppingcart.css?v=8000" />

</head>
<title>CheckOut</title>
<?php 
    include '../admin/connection/connect.php';
?>
</head>

<body>
   <h3 style="text-align:center;margin-top:200px">Your order <span style="color:red">EXCEED</span> our limit Amount ! <br><br> <span style-"font-size:13px;">We are Redirecting You to Pay Online</span> <i class="fas fa-spinner fa-pulse"></i></h3>
                    <script>
                    setInterval(function() {
                         window.location.href="paymentdirect.php?pay&payableamount=<?php echo $totaldue?>&promocheck=<?php echo $truth?>&promo_id=<?php echo $promo?>&truths=<?php echo $truth?>";
                    },4000)
                       
                      
                    </script>


<div class="slider"></div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="../js/shoppingcart.js"></script>
<script src="../js/nav.js"></script>
</body>

</html> 
 
                 
                    <?php
                      
                    }else {
                       //proceed reservation
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
<link rel="stylesheet" type="text/css" href="../css/homepage.css?v=4145" />

<link rel="stylesheet" type="text/css" href="../css/shoppingcart.css?v=8000" />

<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Titillium+Web:wght@600&display=swap" rel="stylesheet">

</head>
<title>CheckOut</title>
<?php 
    include '../admin/connection/connect.php';
?>
</head>

<body style="font-family: 'Titillium Web', sans-serif;">
<form method="post">
        <div class="container">
            <div class="row">
                <div class="col">
                     
                </div>
                <div class="col">
                    <h5 style="margin-top:220px">SELECT TARGET DATE <br> for Reservation or Pick Up :</h5>
                     <input type="datetime-local" name="datetarget" class="form-control" Placeholder="Select Date" required >
                     
                     <input type="hidden" name="typetrans" value= "<?php echo $trans_type?>">
                     <input type="hidden" name="totalamount" value= "<?php echo $totaldue?>">
                     <input type="hidden" name="truths" value= "<?php echo  $truth?>">
                     <input type="hidden" name="promo_ids" value= "<?php echo $promo?>">
                     
                     <br>
                           <input type="submit" name="btnsubmit"  class="btn btn-dark form-control" value="SELECT" style="height:50px">   
                </div>
                  <div class="col">
                     
                </div>
            </div>
                    
                        
                   
        </div>
         </form>


<div class="slider"></div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="../js/shoppingcart.js"></script>
<script src="../js/nav.js"></script>
</body>

</html> 
 
                       <?php
                       
                    }
          	
            
          
    
        
    } 
 
    }else   if (isset($_POST['btnsubmit'])) {
        include '../administrator/connection/connect.php';
        	$email =$_SESSION['email'] ;
        	 $trans_type =$_POST['typetrans'];
         $totaldue = $_POST['totalamount'];
          $truth = $_POST['truths'];
          $promo = $_POST['promo_ids']; 
           
         
	
			     $sql = " select * from user_account where email = '$email'  ";
                             $result = mysqli_query($con,$sql); // run query
                           
                        
                              while($row = mysqli_fetch_array($result)){
                                    $userid = $row['user_id'];
                                    
                              }
        	 
                              
        $datetarget= $_POST['datetarget'];
           $insertcart = "select * from cart where user_id = '$userid'  ";
                             $resultcart = mysqli_query($con,$insertcart); // run query
                                 $count= mysqli_num_rows($resultcart); 
                        if ($count >=1) {
                              
                                 
                                
                              while($row = mysqli_fetch_array($resultcart)){
                                  $prodid = $row['prod_id'];
                                  $qty = $row['qty'];
                                  $total = $row['total'];
                                 date_default_timezone_set('Asia/Manila');
                                $todays_date = date("Y-m-d h:i:s");
                                    
                                                                	for ($i = 0; $i < $count; $i++) {
																				//count($id_array) --> if I input 4 fields, count($id_array) = 4)
                                                                            if($truth == 'promo') {
             $insert = "  INSERT INTO `trans_record`(`user_id`, `prod_id`, `quantity`, `total`, `dateandtime`, `transaction_type`,`target_date`,`stat_checkout`,`promo_id`,`paymentstatus`,`status`) VALUES ('$userid','$prodid','$qty','$total','$todays_date','$trans_type','$datetarget','false','$promo','unpaid','pending') ";  
                                                                                $selectpro = "select * from productstock where prod_id = '$prodid' order by stock desc limit 1";
                                                                                   $rungetdef = mysqli_query($con,$selectpro);
                                                                                   $countdefaultstock = 0;
                                                                                   while($getst = mysqli_fetch_array($rungetdef)){ 
                                                                                       $defstock = $getst['stock'];
                                                                                      $stockid = $getst['stock_id'];
                                                                                      $finalstock = $defstock - $qty;
                                                                                      $updatestock = "update productstock set `stock` ='$finalstock' where stock_id ='$stockid' ";
		                                                                             $changestock = mysqli_query($con,$updatestock); // run query
                                                                                   }
                                                                                
                                                                            }else {
        $insert = "  INSERT INTO `trans_record`(`user_id`, `prod_id`, `quantity`, `total`, `dateandtime`, `transaction_type`,`target_date`,`stat_checkout`,`paymentstatus`,`status`) VALUES ('$userid','$prodid','$qty','$total','$todays_date','$trans_type','$datetarget','false','unpaid','pending') ";      
                                                                              $selectpro = "select * from productstock where prod_id = '$prodid' order by stock desc limit 1";
                                                                                   $rungetdef = mysqli_query($con,$selectpro);
                                                                                   $countdefaultstock = 0;
                                                                                   while($getst = mysqli_fetch_array($rungetdef)){ 
                                                                                       $defstock = $getst['stock'];
                                                                                      $stockid = $getst['stock_id'];
                                                                                      $finalstock = $defstock - $qty;
                                                                                      $updatestock = "update productstock set `stock` ='$finalstock' where stock_id ='$stockid' ";
		                                                                             $changestock = mysqli_query($con,$updatestock); // run query
                                                                                   }
                                                                                
                                                                            }
																				  
																				 
																				}
												 		            
												 		                		 $resultaaa = mysqli_query($con,$insert); // run query*/  
                                 
                                    
                              }
                        }else {
                         
                        }
                        if ( $resultaaa) {
                              $deletecartitem = "DELETE FROM `cart` WHERE user_id= '$userid'";
                                 mysqli_query($con,$deletecartitem); 
                            
        
 ?>
<!DOCTYPE html>
<html>
<head>
    <link rel="icon" href="../img/tabicon.png" type="image/gif" sizes="16x16">
    <link rel="stylesheet" type="text/css" href="../css/homepage.css?v=4840" />
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Titillium+Web:wght@600&display=swap" rel="stylesheet">
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
    	background-image: linear-gradient(to top, #deded6 , #c8c6a7, #c8c6a7);
    	background-repeat:no-repeat;
    	background-size:100% 100%;
    	font-family: 'Titillium Web', sans-serif;
}
/* Center the loader */
#loader {
    	background-image: linear-gradient(to top, #deded6 , #c8c6a7, #c8c6a7);
    	background-repeat:no-repeat;
    	background-size:100% 100%;
  position: absolute;
  left: 50%;
  top: 50%;
  z-index: 1;
  width: 120px;
  height: 120px;
  margin: -76px 0 0 -76px;
  border: 16px solid #333333;
  border-radius: 50%;
  border-top: 16px solid #deded6;
  -webkit-animation: spin 2s linear infinite;
  animation: spin 2s linear infinite;
}

@-webkit-keyframes spin {
  0% { -webkit-transform: rotate(0deg); }
  100% { -webkit-transform: rotate(360deg); }
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}

/* Add animation to "page content" */
.animate-bottom {
  position: relative;
  -webkit-animation-name: animatebottom;
  -webkit-animation-duration: 1s;
  animation-name: animatebottom;
  animation-duration: 1s
}

@-webkit-keyframes animatebottom {
  from { bottom:-100px; opacity:0 } 
  to { bottom:0px; opacity:1 }
}

@keyframes animatebottom { 
  from{ bottom:-100px; opacity:0 } 
  to{ bottom:0; opacity:1 }
}

#myDiv {
  display: none;
  text-align: center;
}
i {
   margin-top:100px;  
   font-size:80px;
   color:white;
}

h1 {
   
}
</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />
</head>
<body onload="myFunction()" style="margin:0;">

<div id="loader"></div>

<div style="display:none;" id="myDiv" class="animate-bottom">
                             <i style="" class='fas fa-check-circle'></i>
     <h1>Transaction  Completed. <br>thankyou!</h1> <br>
        <h4> To see the status of your order click <a href="../orders/orders.php">HERE</a>  <br> <br>To make some more orders click  <a href="../category">HERE</a></h4>
    
 
</div>

<script>
var myVar;

function myFunction() {
  myVar = setTimeout(showPage, 2000);
}

function showPage() {
  document.getElementById("loader").style.display = "none";
  document.getElementById("myDiv").style.display = "block";
}
</script>

</body>
</html>

 <?php   
    } else {
        echo 'fail';
        echo $datetarget;
    }   
    }
}else if (isset($_SESSION['user_id'])) { //////////////////////////////////////////////////////////////personal users
       
          
    if (isset($_POST['btnproceeds'])) {
 include '../admin/connection/connect.php';
        $trans_type =$_POST['typetrans'];
         $totaldue = $_POST['totalamount'];
          $truth = $_POST['truths'];
          $promo = $_POST['promo_ids'];
          $addr = $_POST['txtaddr'];
          $city = $_POST['txtcity'];
          $zip = $_POST['txtzip'];
            	$userid =$_SESSION['user_id'];
	
			 
                              
                           if ($trans_type == 'cod') { ////////////////////////////////////////////////////////////////////////////////////////for COD
                          
                              $insertcart = "select * from cart where user_id = '$userid'  ";
                             $resultcart = mysqli_query($con,$insertcart); // run query
                                 $count= mysqli_num_rows($resultcart); 
                        if ($count >=1) {
                              
                                 
                              while($row = mysqli_fetch_array($resultcart)){
                                  $prodid = $row['prod_id'];
                                  $qty = $row['qty'];
                                  $total = $row['total'];
                                 date_default_timezone_set('Asia/Manila');
                                $todays_date = date("Y-m-d h:i:s");
                                    
                                                                	for ($i = 0; $i < $count; $i++) {
																				//count($id_array) --> if I input 4 fields, count($id_array) = 4)
                                                                            if($truth == 'promo') {
             $insert = "  INSERT INTO `trans_record`(`user_id`, `prod_id`, `quantity`, `total`, `dateandtime`, `transaction_type`,`stat_checkout`,`promo_id`,`addr`,`city`,`zipcode`,`status`) VALUES ('$userid','$prodid','$qty','$total','$todays_date','$trans_type','false','$promo','$addr','$city','$zip','pending') ";  
                                                                               $selectpro = "select * from productstock where prod_id = '$prodid' order by stock desc limit 1";
                                                                                   $rungetdef = mysqli_query($con,$selectpro);
                                                                                   $countdefaultstock = 0;
                                                                                   while($getst = mysqli_fetch_array($rungetdef)){ 
                                                                                       $defstock = $getst['stock'];
                                                                                      $stockid = $getst['stock_id'];
                                                                                      $finalstock = $defstock - $qty;
                                                                                      $updatestock = "update productstock set `stock` ='$finalstock' where stock_id ='$stockid' ";
		                                                                             $changestock = mysqli_query($con,$updatestock); // run query
                                                                                   }
                                                                                
                                                                            }else {
        $insert = "  INSERT INTO `trans_record`(`user_id`, `prod_id`, `quantity`, `total`, `dateandtime`, `transaction_type`,`stat_checkout`,`addr`,`city`,`zipcode`,`status`) VALUES ('$userid','$prodid','$qty','$total','$todays_date','$trans_type','false','$addr','$city','$zip','pending') ";      
                                                                              $selectpro = "select * from productstock where prod_id = '$prodid' order by stock desc limit 1";
                                                                                   $rungetdef = mysqli_query($con,$selectpro);
                                                                                   $countdefaultstock = 0;
                                                                                   while($getst = mysqli_fetch_array($rungetdef)){ 
                                                                                       $defstock = $getst['stock'];
                                                                                      $stockid = $getst['stock_id'];
                                                                                      $finalstock = $defstock - $qty;
                                                                                      $updatestock = "update productstock set `stock` ='$finalstock' where stock_id ='$stockid' ";
		                                                                             $changestock = mysqli_query($con,$updatestock); // run query
                                                                                   }
                                                                            }
																				  
																				 
																				}
												 		            
												 		                		 $resultaaa = mysqli_query($con,$insert); // run query*/  
                                 
                                    
                              }
                        }
                        if ( $resultaaa) {
                              $deletecartitem = "DELETE FROM `cart` WHERE user_id= '$userid'";
                                 mysqli_query($con,$deletecartitem); 
                            
        
 ?>
<!DOCTYPE html>
<html>
<head>
    <link rel="icon" href="../img/tabicon.png" type="image/gif" sizes="16x16">
    <link rel="stylesheet" type="text/css" href="../css/homepage.css?v=4840" />
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Titillium+Web:wght@600&display=swap" rel="stylesheet">
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
    	background-image: linear-gradient(to top, #deded6 , #c8c6a7, #c8c6a7);
    	background-repeat:no-repeat;
    	background-size:100% 100%;
    	font-family: 'Titillium Web', sans-serif;
}
/* Center the loader */
#loader {
        background-image: linear-gradient(to top, #deded6 , #c8c6a7, #c8c6a7);
    	background-repeat:no-repeat;
    	background-size:100% 100%;
  position: absolute;
  left: 50%;
  top: 50%;
  z-index: 1;
  width: 120px;
  height: 120px;
  margin: -76px 0 0 -76px;
  border: 16px solid #333333;
  border-radius: 50%;
  border-top: 16px solid #deded6;
  -webkit-animation: spin 2s linear infinite;
  animation: spin 2s linear infinite;
}

@-webkit-keyframes spin {
  0% { -webkit-transform: rotate(0deg); }
  100% { -webkit-transform: rotate(360deg); }
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}

/* Add animation to "page content" */
.animate-bottom {
  position: relative;
  -webkit-animation-name: animatebottom;
  -webkit-animation-duration: 1s;
  animation-name: animatebottom;
  animation-duration: 1s
}

@-webkit-keyframes animatebottom {
  from { bottom:-100px; opacity:0 } 
  to { bottom:0px; opacity:1 }
}

@keyframes animatebottom { 
  from{ bottom:-100px; opacity:0 } 
  to{ bottom:0; opacity:1 }
}

#myDiv {
  display: none;
  text-align: center;
}
i {
   margin-top:100px;  
   font-size:80px;
   color:white;
}

h1 {
   
}
</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />
</head>
<body onload="myFunction()" style="margin:0;">

<div id="loader"></div>

<div style="display:none;" id="myDiv" class="animate-bottom">
                             <i style="" class='fas fa-check-circle'></i>
     <h1>Transaction  Completed. <br>Thank You!</h1> <br>
        <h4> To see the status of your order click <a href="../orders/orders.php">HERE</a>  <br> <br>To make some more orders click  <a href="../category">HERE</a></h4>
    
 
</div>

<script>
var myVar;

function myFunction() {
  myVar = setTimeout(showPage, 2000);
}

function showPage() {
  document.getElementById("loader").style.display = "none";
  document.getElementById("myDiv").style.display = "block";
}
</script>

</body>
</html>

 <?php   
    }else {
       ?>
        <script>
            alert("please Select Item First before doing proceedings! thankyou..");
            window.location.href="../category";
        </script>
        <?php 
    }
    
    }else  if ($trans_type == 'pickup') { ////////////////////////////////////////////////////////////////////////////////////////////////for pickup
       $trans_type =$_POST['typetrans'];
         $totaldue = $_POST['totalamount'];
          $truth = $_POST['truths'];
          $promo = $_POST['promo_ids']; 
          
          	
          	
         $selectavils = " SELECT * FROM `sales_discount` where sal_id = '2' ";
                       $resultavils = mysqli_query($con,$selectavils); // run query
                       
                  
                       
                        while($row = mysqli_fetch_array($resultavils)){
                              $amount =  $row['amount'];
                        }
                 
                    
                    if ($totaldue >= $amount) {
                      //will pay ahead
                      
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
<link rel="stylesheet" type="text/css" href="../css/homepage.css?v=4145" />

<link rel="stylesheet" type="text/css" href="../css/shoppingcart.css?v=8000" />

</head>
<title>CheckOut</title>
<?php 
    include '../admin/connection/connect.php';
?>
</head>

<body>
   <h3 style="text-align:center;margin-top:200px">Your order <span style="color:red">EXCEED</span> our limit Amount ! <br><br> <span style-"font-size:13px;">We are Redirecting You to Pay Online</span> <i class="fas fa-spinner fa-pulse"></i></h3>
                    <script>
                    setInterval(function() {
                         window.location.href="paymentdirect.php?pay&payableamount=<?php echo $totaldue?>&promocheck=<?php echo $truth?>&promo_id=<?php echo $promo?>&truths=<?php echo $truth?>";
                    },4000)
                       
                      
                    </script>


<div class="slider"></div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="../js/shoppingcart.js"></script>
<script src="../js/nav.js"></script>
</body>

</html> 
 
                 
                    <?php
                      
                    }else {
                       //proceed reservation
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
<link rel="stylesheet" type="text/css" href="../css/homepage.css?v=4145" />

<link rel="stylesheet" type="text/css" href="../css/shoppingcart.css?v=8000" />

<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Titillium+Web:wght@600&display=swap" rel="stylesheet">

</head>
<title>CheckOut</title>
<?php 
    include '../admin/connection/connect.php';
?>
</head>

<body style="font-family: 'Titillium Web', sans-serif;">
<form method="post">
        <div class="container">
            <div class="row">
                <div class="col">
                     
                </div>
                <div class="col">
                    <h5 style="margin-top:220px">SELECT TARGET DATE <br> for Reservation or Pick Up :</h5>
                     <input type="datetime-local" name="datetarget" class="form-control" Placeholder="Select Date" >
                     
                     <input type="hidden" name="typetrans" value= "<?php echo $trans_type?>">
                     <input type="hidden" name="totalamount" value= "<?php echo $totaldue?>">
                     <input type="hidden" name="truths" value= "<?php echo  $truth?>">
                     <input type="hidden" name="promo_ids" value= "<?php echo $promo?>">
                     
                     <br>
                           <input type="submit" name="btnsubmit"  class="btn btn-dark form-control" value="SELECT" style="height:50px">   
                </div>
                  <div class="col">
                     
                </div>
            </div>
                    
                        
                   
        </div>
         </form>


<div class="slider"></div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="../js/shoppingcart.js"></script>
<script src="../js/nav.js"></script>
</body>

</html> 
 
                       <?php
                       
                    }
          	
            
          
    
        
    } 
 
    }else   if (isset($_POST['btnsubmit'])) {
        include '../admin/connection/connect.php';
        		$userid =$_SESSION['user_id'];
        	 $trans_type =$_POST['typetrans'];
         $totaldue = $_POST['totalamount'];
          $truth = $_POST['truths'];
          $promo = $_POST['promo_ids']; 
           
         
	
			 
        	 
                              
        $datetarget= $_POST['datetarget'];
           $insertcart = "select * from cart where user_id = '$userid'  ";
                             $resultcart = mysqli_query($con,$insertcart); // run query
                                 $count= mysqli_num_rows($resultcart); 
                        if ($count >=1) {
                              
                                 
                                
                              while($row = mysqli_fetch_array($resultcart)){
                                  $prodid = $row['prod_id'];
                                  $qty = $row['qty'];
                                  $total = $row['total'];
                                 date_default_timezone_set('Asia/Manila');
                                $todays_date = date("Y-m-d h:i:s");
                                    
                                                                	for ($i = 0; $i < $count; $i++) {
																				//count($id_array) --> if I input 4 fields, count($id_array) = 4)
                                                                            if($truth == 'promo') {
             $insert = "  INSERT INTO `trans_record`(`user_id`, `prod_id`, `quantity`, `total`, `dateandtime`, `transaction_type`,`target_date`,`stat_checkout`,`promo_id`,`paymentstatus`,`status`) VALUES ('$userid','$prodid','$qty','$total','$todays_date','$trans_type','$datetarget','false','$promo','unpaid','pending') ";  
                                                                               $selectpro = "select * from productstock where prod_id = '$prodid' order by stock desc limit 1";
                                                                                   $rungetdef = mysqli_query($con,$selectpro);
                                                                                   $countdefaultstock = 0;
                                                                                   while($getst = mysqli_fetch_array($rungetdef)){ 
                                                                                       $defstock = $getst['stock'];
                                                                                      $stockid = $getst['stock_id'];
                                                                                      $finalstock = $defstock - $qty;
                                                                                      $updatestock = "update productstock set `stock` ='$finalstock' where stock_id ='$stockid' ";
		                                                                             $changestock = mysqli_query($con,$updatestock); // run query
                                                                                   }
                                                                                
                                                                                
                                                                            }else {
        $insert = "  INSERT INTO `trans_record`(`user_id`, `prod_id`, `quantity`, `total`, `dateandtime`, `transaction_type`,`target_date`,`stat_checkout`,`paymentstatus`,`status`) VALUES ('$userid','$prodid','$qty','$total','$todays_date','$trans_type','$datetarget','false','unpaid','pending') ";      
                                                                               $selectpro = "select * from productstock where prod_id = '$prodid' order by stock desc limit 1";
                                                                                   $rungetdef = mysqli_query($con,$selectpro);
                                                                                   $countdefaultstock = 0;
                                                                                   while($getst = mysqli_fetch_array($rungetdef)){ 
                                                                                       $defstock = $getst['stock'];
                                                                                      $stockid = $getst['stock_id'];
                                                                                      $finalstock = $defstock - $qty;
                                                                                      $updatestock = "update productstock set `stock` ='$finalstock' where stock_id ='$stockid' ";
		                                                                             $changestock = mysqli_query($con,$updatestock); // run query
                                                                                   }
                                                                                
                                                                            }
																				  
																				 
																				}
												 		            
												 		                		 $resultaaa = mysqli_query($con,$insert); // run query*/  
                                 
                                    
                              }
                        }else {
                         
                        }
                        if ( $resultaaa) {
                              $deletecartitem = "DELETE FROM `cart` WHERE user_id= '$userid'";
                                 mysqli_query($con,$deletecartitem); 
                            
        
 ?>
<!DOCTYPE html>
<html>
<head>
    <link rel="icon" href="../img/tabicon.png" type="image/gif" sizes="16x16">
    <link rel="stylesheet" type="text/css" href="../css/homepage.css?v=4840" />
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Titillium+Web:wght@600&display=swap" rel="stylesheet">
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
    	background-image: linear-gradient(to top, #deded6 , #c8c6a7, #c8c6a7);
    	background-repeat:no-repeat;
    	background-size:100% 100%;
    	font-family: 'Titillium Web', sans-serif;
}
/* Center the loader */
#loader {
    	background-image: linear-gradient(to top, #deded6 , #c8c6a7, #c8c6a7);
    	background-repeat:no-repeat;
    	background-size:100% 100%;
  position: absolute;
  left: 50%;
  top: 50%;
  z-index: 1;
  width: 120px;
  height: 120px;
  margin: -76px 0 0 -76px;
  border: 16px solid #333333;
  border-radius: 50%;
  border-top: 16px solid #deded6;
  -webkit-animation: spin 2s linear infinite;
  animation: spin 2s linear infinite;
}

@-webkit-keyframes spin {
  0% { -webkit-transform: rotate(0deg); }
  100% { -webkit-transform: rotate(360deg); }
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}

/* Add animation to "page content" */
.animate-bottom {
  position: relative;
  -webkit-animation-name: animatebottom;
  -webkit-animation-duration: 1s;
  animation-name: animatebottom;
  animation-duration: 1s
}

@-webkit-keyframes animatebottom {
  from { bottom:-100px; opacity:0 } 
  to { bottom:0px; opacity:1 }
}

@keyframes animatebottom { 
  from{ bottom:-100px; opacity:0 } 
  to{ bottom:0; opacity:1 }
}

#myDiv {
  display: none;
  text-align: center;
}
i {
   margin-top:100px;  
   font-size:80px;
   color:white;
}

h1 {
   
}
</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />
</head>
<body onload="myFunction()" style="margin:0;">

<div id="loader"></div>

<div style="display:none;" id="myDiv" class="animate-bottom">
                             <i style="" class='fas fa-check-circle'></i>
     <h1>Transaction  Completed. <br>thankyou!</h1> <br>
        <h4> To see the status of your order click <a href="../orders/orders.php">HERE</a>  <br> <br>To make some more orders click  <a href="../category">HERE</a></h4>
    
 
</div>

<script>
var myVar;

function myFunction() {
  myVar = setTimeout(showPage, 2000);
}

function showPage() {
  document.getElementById("loader").style.display = "none";
  document.getElementById("myDiv").style.display = "block";
}
</script>

</body>
</html>

 <?php   
    } else {
        echo 'fail';
        echo $datetarget;
    }   
    }       
  
    
}else {
    ?>
    <script>window.location.href="../home/index.php"</script>
    <?php
}

?>
