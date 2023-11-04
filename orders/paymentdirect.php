<?php
session_start();
include '../administrator/connection/connect.php';
if(isset($_SESSION['access_token'])){
   
        if(isset($_GET['pay'])) {
            $payable = $_GET['payableamount'];
            $promocheck = $_GET['promocheck'];
            $promo_id = $_GET['promo_id'];
             $truth = $_GET['truths'];
            $email =$_SESSION['email'] ;
                        
                        ?>
                        <!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body {
  font-family: Arial;
  font-size: 12px;
  padding: 8px;
}

* {
  box-sizing: border-box;
}

.row {
  display: -ms-flexbox; /* IE10 */
  display: flex;
  -ms-flex-wrap: wrap; /* IE10 */
  flex-wrap: wrap;
  margin: 0 -16px;
}

.col-25 {
  -ms-flex: 25%; /* IE10 */
  flex: 25%;
}

.col-50 {
  -ms-flex: 50%; /* IE10 */
  flex: 50%;
}

.col-75 {
  -ms-flex: 75%; /* IE10 */
  flex: 75%;
}

.col-25,
.col-50,
.col-75 {
  padding: 0 16px;
}

.s {
    font-size:14px;
}
.container {
  background-color: #f2f2f2;
  padding: 5px 20px 15px 20px;
  border: 1px solid lightgrey;
  border-radius: 3px;
}

input[type=text] {
  width: 100%;
  margin-bottom: 20px;
  padding: 8px;
  border: 1px solid #ccc;
  border-radius: 3px;
}

label {
  margin-bottom: 10px;
  display: block;
}

.icon-container {
  margin-bottom: 20px;
  padding: 7px 0;
  font-size: 24px;
}

.btn {
  background-color: #04AA6D;
  color: white;
  padding: 12px;
  margin: 10px 0;
  border: none;
  width: 100%;
  border-radius: 3px;
  cursor: pointer;
  font-size: 14px;
}

.btn:hover {
  background-color: #45a049;
}

a {
  color: #2196F3;
}

hr {
  border: 1px solid lightgrey;
}

span.price {
  float: right;
  color: grey;
}

.ddxp option {
    text-transform:capitalize;
}
/* Responsive layout - when the screen is less than 800px wide, make the two columns stack on top of each other instead of next to each other (also change the direction - make the "cart" column go on top) */
@media (max-width: 800px) {
  .row {
    flex-direction: column-reverse;
  }
  .col-25 {
    margin-bottom: 20px;
  }
}
</style>
 <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    	 <!--<link rel="shortout icon" type="image/x-icon" href="">--> <!---->
    	  <script src="https://kit.fontawesome.com/129b086bc9.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<title>Payment-Method</title>
</head>
<body>

        <div class="container">
            <h3 style="text-align:center">Secure Pay <i class="fas fa-shield-alt"></i> </h3>
            <p style="color:red;font-size:12px;text-align:center"><i class="fas fa-info-circle"></i> From Hantech Team : <br>This is for development Purpose only . We encourage you to dont enter any valid payment or  credit card details . <br> its for your safety and ours too. <br> Keepsafe!</p>
            <hr>
            
            <div class="card"></div>
            
<div class="row">
  <div class="col-75">
    <div class="container">
      <form method="post">
      
        <div class="row">
          

          <div class="col-50">
            <h5>Payment</h5>
           
            <label for="fname">Accepted Cards</label>
            <div class="icon-container">
              <i class="fa fa-cc-visa" style="color:navy;"></i>
              <i class="fa fa-cc-amex" style="color:blue;"></i>
              <i class="fa fa-cc-mastercard" style="color:red;"></i>
              <i class="fa fa-cc-discover" style="color:orange;"></i>
            </div>
            <label for="cname">Name on Card</label>
            <input type="text" class="s form-control" id="cname" name="cardname" placeholder="John More Doe" required>
            <label for="ccnum">Credit card number</label>
            <input type="text" class="s form-control" id="ccnum" name="cardnumber" onblur='addDashes(this)' maxlength='16' placeholder="1111-2222-3333-4444" required oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
            <script>
             function addDashes(f)
             {
               f.value = f.value.slice(0,4)+"-"+f.value.slice(4,8)+"-"+f.value.slice(8,12)+"-"+f.value.slice(12,16);
             }
            </script>
            <label for="expmonth">Exp Month</label>
            <select class="form-select ddxp" name="expmonth" required>
                    <option value="january">January</option>
                    <option value="february">february</option>
                    <option value="march">march</option>
                    <option value="april">april</option>
                    <option value="may">may</option>
                    <option value="june">june</option>
                    <option value="july">july</option>
                    <option value="august">august</option>
                    <option value="september">september</option>
                    <option value="october">october</option>
                    <option value="november">november</option>
                    <option value="december">december</option>
            </select>
            <div class="row">
              <div class="col-50">
                <label for="expyear">Exp Year</label>
                <input type="text" class="s form-control" id="expyear" name="expyear" placeholder="2024" required maxlength='4'>
              </div>
              <div class="col-50">
                <label for="cvv">CVV</label>
                <input type="text" class="s form-control" id="cvv" name="cvv" placeholder="xxx" required maxlength='3'>
              </div>
            </div>
          </div>
           <div class="col-50"> 
           <p></p>
          
               <p></p>
               <div class="container" style="background-color:white;cursor:default">
                   <h5> Amount Payable : <span style="font-size:35px;font-weight:bolder;color:#892020">₱<?php echo $payable?></span></h5>
               </div>
               
                <p></p>
          
           <p><br></p>
                <h6>No Credit Cards for PAYMENT ? <br> 
                
                  We Offer Cash On Delivery Services <br> <p></p>
                  Kindly Click to the link Below.
                </h6>
                <p></p>
                <a href="https://hantechdesign.com/cart/" style="text-decoration:none;color:black">
                <div class="card">
                    <div class="btn-group" role="group" aria-label="Basic example">
                 <img src="https://th.bing.com/th/id/OIP.fBCioSL_sbCeocuxiJI1BwHaFi?pid=ImgDet&rs=1" style="width:200px">
                 <p></p>
                    <h5 style="margin-top:10px">Cash on Delivery <br>
                       <span style="font-size:13px;color:grey"> Selected Areas. Delivered by our trusted BH rider. Same Day Delivery please confirm early. Deliveries Mondays to Saturdays 9am to 6pm. <br><span style="color:black"> NOTE: Select COD (cash on delivery) on your checkout form</span></span><br> Click HERE!!!
                    </h5>
                </div>
                   
                </div>
                </a>
           </div>
          
          
        </div>
        
        <input type="submit" class="btn btn-success" value="Continue to checkout" name="btncheckout" class="btn">
      </form>
    </div>
  </div>
 
</div>


</div>
</body>
</html>

                        
                        <?php
                  
          if(isset($_POST['btncheckout'])) {
              $email =$_SESSION['email'] ;
           
             
			    $sql = " select * from user_account where email = '$email'  ";
                             $result = mysqli_query($con,$sql); // run query
                           if ($result) {
                               echo 'run userselect';
                           }else {
                               echo 'didnt run userselect';
                           }
                        
                              while($row = mysqli_fetch_array($result)){
                                    $userid = $row['user_id'];
                                    
                              }
                              
                               $insertcart = "select * from cart where user_id = '$userid'  ";
                             $resultcart = mysqli_query($con,$insertcart); // run query
                                 $count= mysqli_num_rows($resultcart); 
                        if ($count >=1) {
                              //create random numbers and letters
                              for ($s = '', $i = 0, $z = strlen($a = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789')-1; $i != 6; $x = rand(0,$z), $s .= $a{$x}, $i++); 
                              //end create
                                date_default_timezone_set('Asia/Manila');
                                $todays_dateprocess = date("Y-m-d h:i:s");
                        $createinvoice = "INSERT INTO `invoice_record`(`user_id`, `branch_id`, `dateprocess`, `total`, `amount_rendered`, `amount_change`,`uniquecode`) VALUES
                                                                                ('$userid','1','$todays_dateprocess','$payable','$payable','0','$s')";  
                           $createdinvoice= mysqli_query($con,$createinvoice);
                                    if ($createdinvoice) {
                                       $getinvoiceid = "select invoice_no from invoice_record where uniquecode = '$s'";
                            $getinvoiceidres= mysqli_query($con,$getinvoiceid);
                              while($get = mysqli_fetch_array( $getinvoiceidres)){ 
                                 $iv_no =$get['invoice_no'];
                              }
                           
                                  
                                    }
                          
                              while($row = mysqli_fetch_array($resultcart)){
                                  $prodid = $row['prod_id'];
                                  $qty = $row['qty'];
                                  $total = $row['total'];
                                 date_default_timezone_set('Asia/Manila');
                                $todays_date = date("Y-m-d h:i:s");
                                    
                                                                	for ($i = 0; $i < $count; $i++) {
																				//count($id_array) --> if I input 4 fields, count($id_array) = 4)
                                                                            if($truth == 'promo') {
             $insert = "  INSERT INTO `trans_record`(`user_id`,`invoice_no`,`prod_id`, `quantity`, `total`, `dateandtime`, `transaction_type`,`stat_checkout`,`promo_id`,`paymentstatus`,`forcod`,`status`) VALUES ('$userid','$iv_no','$prodid','$qty','$total','$todays_date','pickup','false','$promo_id','paid','pickup','approved') ";  
                                                                            }else {
        $insert = "  INSERT INTO `trans_record`(`user_id`,`invoice_no`,`prod_id`, `quantity`, `total`, `dateandtime`, `transaction_type`,`stat_checkout`,`paymentstatus`,`forcod`,`status`) VALUES ('$userid','$iv_no','$prodid','$qty','$total','$todays_date','pickup','false','paid','pickup','approved') ";      
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

<script>
   window.location.href="successpaynotif.php?successpaid";
</script>
 <?php   
    } else {
        echo 'fail';
       
    }   
      
              
          }              
                        
            
        }
    
}else if (isset($_SESSION['user_id'])) { //////////////////////////////////////////////////////////////personal users
  
        if(isset($_GET['pay'])) {
            $payable = $_GET['payableamount'];
            $promocheck = $_GET['promocheck'];
            $promo_id = $_GET['promo_id'];
             $truth = $_GET['truths'];
            $userid =$_SESSION['user_id'];
                        
                        ?>
                        <!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body {
  font-family: Arial;
  font-size: 12px;
  padding: 8px;
}

* {
  box-sizing: border-box;
}

.row {
  display: -ms-flexbox; /* IE10 */
  display: flex;
  -ms-flex-wrap: wrap; /* IE10 */
  flex-wrap: wrap;
  margin: 0 -16px;
}

.col-25 {
  -ms-flex: 25%; /* IE10 */
  flex: 25%;
}

.col-50 {
  -ms-flex: 50%; /* IE10 */
  flex: 50%;
}

.col-75 {
  -ms-flex: 75%; /* IE10 */
  flex: 75%;
}

.col-25,
.col-50,
.col-75 {
  padding: 0 16px;
}

.s {
    font-size:14px;
}
.container {
  background-color: #f2f2f2;
  padding: 5px 20px 15px 20px;
  border: 1px solid lightgrey;
  border-radius: 3px;
}

input[type=text] {
  width: 100%;
  margin-bottom: 20px;
  padding: 8px;
  border: 1px solid #ccc;
  border-radius: 3px;
}

label {
  margin-bottom: 10px;
  display: block;
}

.icon-container {
  margin-bottom: 20px;
  padding: 7px 0;
  font-size: 24px;
}

.btn {
  background-color: #04AA6D;
  color: white;
  padding: 12px;
  margin: 10px 0;
  border: none;
  width: 100%;
  border-radius: 3px;
  cursor: pointer;
  font-size: 14px;
}

.btn:hover {
  background-color: #45a049;
}

a {
  color: #2196F3;
}

hr {
  border: 1px solid lightgrey;
}

span.price {
  float: right;
  color: grey;
}

.ddxp option {
    text-transform:capitalize;
}
/* Responsive layout - when the screen is less than 800px wide, make the two columns stack on top of each other instead of next to each other (also change the direction - make the "cart" column go on top) */
@media (max-width: 800px) {
  .row {
    flex-direction: column-reverse;
  }
  .col-25 {
    margin-bottom: 20px;
  }
}
</style>
 <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    	 <!--<link rel="shortout icon" type="image/x-icon" href="">--> <!---->
    	  <script src="https://kit.fontawesome.com/129b086bc9.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<title>Payment-Method</title>
</head>
<body>

        <div class="container">
            <h3 style="text-align:center">Secure Pay <i class="fas fa-shield-alt"></i> </h3>
            <p style="color:red;font-size:12px;text-align:center"><i class="fas fa-info-circle"></i> From Hantech Team : <br>This is for development Purpose only . We encourage you to dont enter any valid payment or  credit card details . <br> its for your safety and ours too. <br> Keepsafe!</p>
            <hr>
            
            <div class="card"></div>
            
<div class="row">
  <div class="col-75">
    <div class="container">
      <form method="post">
      
        <div class="row">
          

          <div class="col-50">
            <h5>Payment</h5>
           
            <label for="fname">Accepted Cards</label>
            <div class="icon-container">
              <i class="fa fa-cc-visa" style="color:navy;"></i>
              <i class="fa fa-cc-amex" style="color:blue;"></i>
              <i class="fa fa-cc-mastercard" style="color:red;"></i>
              <i class="fa fa-cc-discover" style="color:orange;"></i>
            </div>
            <label for="cname">Name on Card</label>
            <input type="text" class="s form-control" id="cname" name="cardname" placeholder="John More Doe" required>
            <label for="ccnum">Credit card number</label>
            <input type="text" class="s form-control" id="ccnum" name="cardnumber" onblur='addDashes(this)' maxlength='16' placeholder="1111-2222-3333-4444" required oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
            <script>
             function addDashes(f)
             {
               f.value = f.value.slice(0,4)+"-"+f.value.slice(4,8)+"-"+f.value.slice(8,12)+"-"+f.value.slice(12,16);
             }
            </script>
            <label for="expmonth">Exp Month</label>
            <select class="form-select ddxp" name="expmonth" required>
                    <option value="january">January</option>
                    <option value="february">february</option>
                    <option value="march">march</option>
                    <option value="april">april</option>
                    <option value="may">may</option>
                    <option value="june">june</option>
                    <option value="july">july</option>
                    <option value="august">august</option>
                    <option value="september">september</option>
                    <option value="october">october</option>
                    <option value="november">november</option>
                    <option value="december">december</option>
            </select>
            <div class="row">
              <div class="col-50">
                <label for="expyear">Exp Year</label>
                <input type="text" class="s form-control" id="expyear" name="expyear" placeholder="2024" required maxlength='4'>
              </div>
              <div class="col-50">
                <label for="cvv">CVV</label>
                <input type="text" class="s form-control" id="cvv" name="cvv" placeholder="xxx" required maxlength='3'>
              </div>
            </div>
          </div>
           <div class="col-50"> 
           <p></p>
          
               <p></p>
               <div class="container" style="background-color:white;cursor:default">
                   <h5> Amount Payable : <span style="font-size:35px;font-weight:bolder;color:#892020">₱<?php echo $payable?></span></h5>
               </div>
               
                <p></p>
          
           <p><br></p>
                <h6>No Credit Cards for PAYMENT ? <br> 
                
                  We Offer Cash On Delivery Services <br> <p></p>
                  Kindly Click to the link Below.
                </h6>
                <p></p>
                <a href="https://hantechdesign.com/cart/" style="text-decoration:none;color:black">
                <div class="card">
                    <div class="btn-group" role="group" aria-label="Basic example">
                 <img src="https://th.bing.com/th/id/OIP.fBCioSL_sbCeocuxiJI1BwHaFi?pid=ImgDet&rs=1" style="width:200px">
                 <p></p>
                    <h5 style="margin-top:10px">Cash on Delivery <br>
                       <span style="font-size:13px;color:grey"> Selected Areas. Delivered by our trusted BH rider. Same Day Delivery please confirm early. Deliveries Mondays to Saturdays 9am to 6pm. <br><span style="color:black"> NOTE: Select COD (cash on delivery) on your checkout form</span></span><br> Click HERE!!!
                    </h5>
                </div>
                   
                </div>
                </a>
           </div>
          
          
        </div>
        
        <input type="submit" class="btn btn-success" value="Continue to checkout" name="btncheckout" class="btn">
      </form>
    </div>
  </div>
 
</div>


</div>
</body>
</html>

                        
                        <?php
                  
          if(isset($_POST['btncheckout'])) {
             
           
             
			  
                               $insertcart = "select * from cart where user_id = '$userid'  ";
                             $resultcart = mysqli_query($con,$insertcart); // run query
                                 $count= mysqli_num_rows($resultcart); 
                        if ($count >=1) {
                              //
                              for ($s = '', $i = 0, $z = strlen($a = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789')-1; $i != 6; $x = rand(0,$z), $s .= $a{$x}, $i++); 
                                date_default_timezone_set('Asia/Manila');
                                $todays_dateprocess = date("Y-m-d h:i:s");
                        $createinvoice = "INSERT INTO `invoice_record`(`user_id`, `branch_id`, `dateprocess`, `total`, `amount_rendered`, `amount_change`,`uniquecode`) VALUES
                                                                                ('$userid','1','$todays_dateprocess','$payable','$payable','0','$s')";  
                           $createdinvoice= mysqli_query($con,$createinvoice);
                                    if ($createdinvoice) {
                                       $getinvoiceid = "select invoice_no from invoice_record where uniquecode = '$s'";
                            $getinvoiceidres= mysqli_query($con,$getinvoiceid);
                              while($get = mysqli_fetch_array( $getinvoiceidres)){ 
                                 $iv_no =$get['invoice_no'];
                              }
                           
                                  
                                    }
                          
                              while($row = mysqli_fetch_array($resultcart)){
                                  $prodid = $row['prod_id'];
                                  $qty = $row['qty'];
                                  $total = $row['total'];
                                 date_default_timezone_set('Asia/Manila');
                                $todays_date = date("Y-m-d h:i:s");
                                    
                                                                	for ($i = 0; $i < $count; $i++) {
																				//count($id_array) --> if I input 4 fields, count($id_array) = 4)
                                                                            if($truth == 'promo') {
             $insert = "  INSERT INTO `trans_record`(`user_id`,`invoice_no`,`prod_id`, `quantity`, `total`, `dateandtime`, `transaction_type`,`stat_checkout`,`promo_id`,`paymentstatus`,`forcod`,`status`) VALUES ('$userid','$iv_no','$prodid','$qty','$total','$todays_date','pickup','false','$promo_id','paid','pickup','approved') ";  
                                                                            }else {
        $insert = "  INSERT INTO `trans_record`(`user_id`,`invoice_no`,`prod_id`, `quantity`, `total`, `dateandtime`, `transaction_type`,`stat_checkout`,`paymentstatus`,`forcod`,`status`) VALUES ('$userid','$iv_no','$prodid','$qty','$total','$todays_date','pickup','false','paid','pickup','approved') ";      
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

<script>
   window.location.href="successpaynotif.php?successpaid";
</script>
 <?php   
    } else {
        echo 'fail';
       
    }   
      
              
          }              
                        
            
        }      
  
    
}else {
    ?>
    <script>window.location.href="../home/index.php"</script>
    <?php
}
                      /*  
                       
                        
                       */
?>

