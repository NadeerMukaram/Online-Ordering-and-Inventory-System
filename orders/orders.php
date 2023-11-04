<?php
	session_start();

  
	if (isset($_SESSION['access_token'])) {//////////////////////////////////////////////////////////////////////////////////////Google Login
		include '../admin/connection/connect.php';
	 
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
<link rel="stylesheet" type="text/css" href="../css/homepage.css?v=4685" />

<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Titillium+Web:wght@600&display=swap" rel="stylesheet">

<!-- Orders Tab CSS --> 
<link rel="stylesheet" type="text/css" href="../css/orders.css?v=490" />

<!-- Orders Tab JS --> 
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


</head>
<title>Orders</title>
</head>

<body style="font-family: 'Titillium Web', sans-serif;">


<header>


<!-- NAVIGATION BAR --> 
<nav>
    <div class="logo">
        <a href="../home"><img src="../img/logo_alt_alt_ok.png" alt="logo"></a>
	</div>


    <ul class="nav-links">
        <li><a href="../home"><span style="font-size: 1.5rem;"><span style="color: #333333;"><i class="fas fa-house-user"></i></span></span> HOME</a></li>
        <li><a href="../category"><span style="font-size: 1.5rem;"><span style="color: #333333;"><i class="fas fa-align-left"></i></span></span> CATEGORIES</a></li>
        <li id="shoppingcartplacing"><a href="../cart"><span style="font-size: 1.5rem;"><span style="color: #333333;"><i class="fas fa-shopping-cart"></i></span></span> MY CART</a></li>
      
        
	
    </ul>
    <div class="burger">
        <div class="line1"></div>
        <div class="line2"></div>
        <div class="line3"></div>
    </div>	
</nav>






<!-- ORDERS  --> 
<article>

<div class="container m-auto">
<div class="row">



<!-- ORDERS TAB --> 
<div class="col-lg-12 col-md-12 col-sm-12">
<div class="orderstab">

    <ul id="myTab" class="nav nav-tabs">
        <li class="nav-item">
            <a href="orders.php" class="nav-link active" id="pend" >Pending</a>
        </li>
       
        <li class="nav-item">
            <?php 
            include '../administrator/connection/connect.php';
                
                	$email =$_SESSION['email'] ;
		
			     $sql = " select * from user_account where email = '$email'  ";
                             $result = mysqli_query($con,$sql); // run query
                             $count= mysqli_num_rows($result); // to count if necessary
                        
                              while($row = mysqli_fetch_array($result)){
                                    $userid = $row['user_id'];
                                    
                              }
                              
                              $orderscountforwalkin = "select * from trans_record where user_id = '$userid' and status='approved' and transaction_type = 'pickup'  ";
                               $resultcount = mysqli_query($con,$orderscountforwalkin);
                                $countpickup= mysqli_num_rows($resultcount); 
                               
                                $orderscountforreservation = "select * from trans_record where user_id = '$userid' and forcod='codgood' and transaction_type = 'cod'  ";
                               $resultcounts = mysqli_query($con,$orderscountforreservation);
                                $countcod= mysqli_num_rows($resultcounts); 
            ?>
            <a href="orders.php?pickuptab" class="nav-link" id="pu" >Pick Up <span class="badge btn btn-dark" ><?php echo $countpickup?></span></a>
        </li>
        <li class="nav-item">
            <a href="orders.php?codtab&Toshiptab" class="nav-link" id="co" >Cash On Delivery <span class="badge btn btn-dark"><?php echo $countcod?></span></a>
        </li>
        <li class="nav-item">
            <a href="orders.php?completedtab" class="nav-link" id="com" >Completed </a>
        </li>
         <li class="nav-item">
            <a href="orders.php?cancelled" class="nav-link" id="cancc" >Cancelled </a>
        </li>
        
    </ul>
	

    <div class="tab-content">
	
	<!-- All Tab  --> 
      <?php
      	/*	 while($row = mysqli_fetch_array($resultselect)){
                                      $image = $row['photo'];
                                      $image_src = "../administrator/bin/Item_Images/".$image;
                                  ?>
                                  	<div class="item-tab-list">
                    				<a href="#"><img src="<?php //echo $image_src?>" alt="tabitem" height="120"/></a>
                    				<div class="card">
                    					<div class="card-body">
                    						<h5 class="card-title"><?php // echo $row['name']?></h5>
                    						<p class="card-text"><?php //echo $row['description']?>.. <br> Transaction Type : <?php echo $row['transaction_type']?> <br> Quantity : <?php echo $row['quantity']?></p>
                    						Amount Due :<h4 > ₱ <?php //echo $row['total']?></h4>
                    					</div>
                    				</div>
                    			</div>
                                <?php 
                                    
                              }
                              */
            if(isset($_GET['cancelled'])) {
                ?>
          <script>
           document.getElementById('pu').classList.remove('active');
                      document.getElementById('pend').classList.remove('active');  
                     
                     document.getElementById('co').classList.remove('active'); 
                       document.getElementById('com').classList.remove('active');
                        document.getElementById('cancc').classList.add('active');
                         
          </script>
          <?php
        $selectalpending = "select * from orderview where user_id ='$userid' and status = 'cancelled' ";
                $runselect = mysqli_query($con,$selectalpending);
                 $ss= mysqli_num_rows($runselect); 
              if($ss>= 1){
                 while($row = mysqli_fetch_array($runselect)){
                                      $image = $row['photo'];
                                        if ($image == 'th.jfif') {
                              $image_src ="../admin/".$image;
                          }else {
                            $image_src = "../admin/bin/Item_Images/".$image;  
                          }
                                   ?>
                                  	<div class="item-tab-list">
                    				<a href="#"><img src="<?php echo $image_src?>" alt="tabitem" height="120"/></a>
                    				<div class="card">
                    					<div class="card-body">
                    					    <div class="container">
                    					       <div class="row">
                    						<div class="col-sm-6">
                    						    <h5 class="card-title"><?php  echo $row['name']?></h5>
                    						<p class="card-text"><?php echo $row['description']?>.. <br> Transaction Type : <?php echo $row['transaction_type']?> <br> Quantity : <?php echo $row['quantity']?></p>
                    						Amount Paid :<h4 >₱<?php echo $row['total']?></h4> 
                    						</div>
                    						<div class="col-sm-6">
                    						        <h6>Date Created : <?php echo $row['dateandtime']?>  <br><p></p>
                    						            Date for Pick Up : <?php
                    						                if($row['target_date'] == 0) {
                    						                   echo 'None Pickup';
                    						                }else {
                    						                     echo $row['target_date'];
                    						                }
                    						           ?>
                    						            <p></p>
                    						           
                    						            <p></p>
                    						            Status : <span style="text-transform:capitalize;color:red">Cancelled</span>
                    						        </h6>
                    						</div>
                    						</div>
                    					    </div>
                    						
                    					</div>
                    				</div>
                    			</div>
                                <?php 
                              }
                              }else {
                     ?>
                            <div class="container">
                                    <div style="text-align:center">
                                        <h1 style="font-size:60px"><i class="far fa-clipboard"></i> </h1>
                                        <h6>No Orders Yet.</h6>
                                        
                                    </div>
                            </div>
                            <?php 
                 }
            }else                   
                              
            if(isset($_GET['completedtab'])) {
                ?>
          <script>
           document.getElementById('pu').classList.remove('active');
                      document.getElementById('pend').classList.remove('active');  
                     
                     document.getElementById('co').classList.remove('active'); 
                       document.getElementById('com').classList.add('active');
                       document.getElementById('cancc').classList.remove('active');
          </script>
          <?php
        $selectalpending = "select * from orderview where user_id ='$userid' and status = 'completed' ORDER BY datecompleted DESC ";
                $runselect = mysqli_query($con,$selectalpending);
                 $ss= mysqli_num_rows($runselect); 
              if($ss>= 1){
                 while($row = mysqli_fetch_array($runselect)){
                                      $image = $row['photo'];
                                        if ($image == 'th.jfif') {
                              $image_src ="../admin/".$image;
                          }else {
                            $image_src = "../admin/bin/Item_Images/".$image;  
                          }
                                  ?>
                                  	<div class="item-tab-list">
                    				<a href="#"><img src="<?php echo $image_src?>" alt="tabitem" height="120"/></a>
                    				<div class="card">
                    					<div class="card-body">
                    					    <div class="container">
                    					       <div class="row">
                    						<div class="col-sm-6">
                    						    <h5 class="card-title"><?php  echo $row['name']?></h5>
                    						<p class="card-text"><?php echo $row['description']?>.. <br> Transaction Type : <?php echo $row['transaction_type']?> <br> Quantity : <?php echo $row['quantity']?></p>
                    						Amount Paid :<h4 >₱<?php echo $row['total']?></h4> 
                    						</div>
                    						<div class="col-sm-6">
                    						        <h6>Date Created : <?php echo $row['dateandtime']?>  <br><p></p>
                    						            Date for Pick Up : <?php
                    						                if($row['target_date'] == 0) {
                    						                   echo 'None';
                    						                }else {
                    						                     echo $row['target_date'];
                    						                }
                    						           ?>
                    						            <p></p>
                    						            Date-Completed : <?php 
                    						            $timestamp = $row['datecompleted'];
                                                            echo date("F jS, Y", strtotime($timestamp));
                    						            
                    						            ?>
                    						            <p></p>
                    						           Status : <span style="text-transform:capitalize;color:green">Completed</span>
                    						        </h6>
                    						</div>
                    						</div>
                    					    </div>
                    						
                    					</div>
                    				</div>
                    			</div>
                                <?php 
                                    
                              }
                              }else {
                     ?>
                            <div class="container">
                                    <div style="text-align:center">
                                        <h1 style="font-size:60px"><i class="far fa-clipboard"></i> </h1>
                                        <h6>No Orders Yet.</h6>
                                        
                                    </div>
                            </div>
                            <?php 
                 }
            }  else                 
                              
      if (isset($_GET['pickuptab'])) {
          ?>
          <script>
           document.getElementById('pu').classList.add('active');
                      document.getElementById('pend').classList.remove('active');  
                     
                     document.getElementById('co').classList.remove('active'); 
                       document.getElementById('com').classList.remove('active');
                       document.getElementById('cancc').classList.remove('active');
          </script>
          <?php
        $selectalpending = "select * from orderview where user_id ='$userid' and transaction_type='pickup' and status = 'approved' ";
                $runselect = mysqli_query($con,$selectalpending);
                 $ss= mysqli_num_rows($runselect); 
              if($ss>= 1){
                 while($row = mysqli_fetch_array($runselect)){
                                      $image = $row['photo'];
                                        if ($image == 'th.jfif') {
                              $image_src ="../admin/".$image;
                          }else {
                            $image_src = "../admin/bin/Item_Images/".$image;  
                          }
                                  ?>
                                  	<div class="item-tab-list">
                    				<a href="#"><img src="<?php echo $image_src?>" alt="tabitem" height="120"/></a>
                    				<div class="card">
                    					<div class="card-body">
                    					    <div class="container">
                    					       <div class="row">
                    						<div class="col-sm-6">
                    						    <h5 class="card-title"><?php  echo $row['name']?></h5>
                    						<p class="card-text"><?php echo $row['description']?>.. <br> Transaction Type : <?php echo $row['transaction_type']?> <br> Quantity : <?php echo $row['quantity']?></p>
                    						Amount Due :<h4 >₱<?php echo $row['total']?></h4> 
                    						</div>
                    						<div class="col-sm-6">
                    						        <h6>Date Created : <?php echo $row['dateandtime']?>  <br><p></p>
                    						            Date for Pick Up : <?php echo $row['target_date']?>
                    						            <p></p>
                    						            Payment Status : <span style="text-transform:capitalize"><?php echo $row['paymentstatus']?></span>
                    						        </h6>
                    						</div>
                    						</div>
                    					    </div>
                    						
                    					</div>
                    				</div>
                    			</div>
                                <?php 
                                    
                              }
                              }else {
                     ?>
                            <div class="container">
                                    <div style="text-align:center">
                                        <h1 style="font-size:60px"><i class="far fa-clipboard"></i> </h1>
                                        <h6>No Orders Yet.</h6>
                                        
                                    </div>
                            </div>
                            <?php 
                 }
      }else if (isset($_GET['codtab'])) {
        
          ?>
          <script>
                      document.getElementById('pend').classList.remove('active');  
                     document.getElementById('pu').classList.remove('active'); 
                     document.getElementById('co').classList.add('active'); 
                     document.getElementById('com').classList.remove('active');
                     document.getElementById('cancc').classList.remove('active');
          </script>
          
          <div class="container">
              <?php
               $selectalpending = "select * from orderview where user_id ='$userid' and transaction_type='cod' and  status ='toprocess' ";
                $runselectpending = mysqli_query($con,$selectalpending);
                 $countpickuptab = mysqli_num_rows($runselectpending);
                 
                  $selectalship = "select * from orderview where user_id ='$userid' and transaction_type='cod' and  status ='toship' ";
                $runselectship = mysqli_query($con, $selectalship);
                $countshiptab = mysqli_num_rows($runselectship);
                
                 $selectalque = "select * from orderview where user_id ='$userid' and transaction_type='cod' and  status ='toreceive' ";
                $runselectque = mysqli_query($con,$selectalque);
                 $countquetab = mysqli_num_rows($runselectque);
                 
                 $selectalcom = "select * from orderview where user_id ='$userid' and transaction_type='cod' and  status ='completed' ";
                $runselectcom = mysqli_query($con,$selectalcom);
                 $countcomtab = mysqli_num_rows($runselectcom);
                 
                 $selectalcanc = "select * from orderview where user_id ='$userid' and transaction_type='cod' and  status ='cancelledcod' ";
                $runselectcanc = mysqli_query($con,$selectalcanc);
                 $countcanctab = mysqli_num_rows($runselectcanc);
              
              ?>
              <div class="container">
              <div class="btn-group" role="group" aria-label="Basic example">
             
              <a  href="orders.php?codtab&Toshiptab" type="button" class="btn btn-secondary" id="ship">To Ship <span id="codshipcount" class="badge btn btn-dark"><?php echo $countshiptab?></span></a>
              <a  href="orders.php?codtab&Toreceivetab" type="button" class="btn btn-secondary" id="rec">To Receive <span id="codreceivecount" class="badge btn btn-dark"><?php echo $countquetab?></span></a>
             <a  href="orders.php?codtab&completedtab" type="button" class="btn btn-secondary" id="compl">Completed <span id="codreceivecount" class="badge btn btn-dark"><?php echo $countcomtab?></span></a>

            </div>
            </div>
            <hr>
                <div class="container">
                    <?php
                     if(isset($_GET['Toshiptab'])) { 
                         ?>
                        <script>
                      
                            
                            document.getElementById('ship').classList.add('btn-light');
                             document.getElementById('ship').classList.remove('btn-secondary');
                            document.getElementById('rec').classList.remove('btn-light');
                             document.getElementById('rec').classList.add('btn-secondary');
                        </script>
                        <?php
                         if($countshiptab >=1) {
                                   if(isset($_POST['cancel'])){ 
                      $track = $_POST['track_id'];
                      ?>
                      <style type="text/css">

              .modalcreated {
            display: none; /* Hidden by default */
            position: fixed; /* Stay in place */
            z-index: 1; /* Sit on top */
            padding-top: 100px; /* Location of the box */
            left: 0;
            top: 0;
            width: 100%; /* Full width */
            height: 100%; /* Full height */
            overflow: auto; /* Enable scroll if needed */
            background-color: rgb(0,0,0); /* Fallback color */
            background-color: rgba(0,0,0,0.4); /* Black w/ opacity */

          }

          /* Modal Content */
          .modal-contents {
            background-color: #fefefe;
            margin: auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
             border-radius: 5px;
          }

          /* The Close Button */
          .close {
            color: #aaaaaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
          }

          .close:hover,
          .close:focus {
            color: #000;
            text-decoration: none;
            cursor: pointer;
          }
          .display-block {
            display: block;

          }
          .diplay-none {
            display: none;
          }
            </style> 
                       <script type="text/javascript">
                function displaymodalnones()  {
  
            
              document.getElementById("myModals").setAttribute('style','display:none');
            }
              document.getElementById("myModals").classList.add('display-block');
                      
              </script>
             
              <div id="myModals" class="modalcreated" style="display: block">

              <!-- Modal content -->
              <div class="modal-contents">
               <a href="javascript:void(0)"> <span class="close " onclick="displaymodalnones()" style="font-size: 23px;"><i class="fas fa-times-circle"></i></span></a>
                    
                      <div class="container">
                        <div class="row">
                           <h5 style="text-align: center;">Are you Sure you want to Cancel the Order No : <?php echo $track?> ?</h5>
                                  <p style="text-align: center;">Status : <span style="color: green"> To Ship</span></p>
                            <form method="post" action="approve.php" style="text-align: center;">
                              <label class="btn-warning" style="padding: 3px;border-radius: 5px;">YES</label>
                                 <input type="checkbox" name="checkyes"  required="">   
                                 <label class="btn-danger"  style="margin-left: 10px;padding: 3px;border-radius: 5px;">NO</label>
                                 <input onclick="displaymodalnones()" type="checkbox" name="checkno" > 

                                 <p></p>
                                 <p>Please Provide a Reason of Cancelation :</p>
                                 <textarea style="font-size: 12px;" name="reason" class="form-control" required=""></textarea>   
                                 <p></p>
                                 <input type="hidden" name="track_id" value=<?php echo $track?>>
                                 <input type="hidden" name="leveltype" value="orderuser">
                                 <input type="submit" name="btnsubship" value="Proceed" class="btn btn-secondary form-control" style="font-size: 14px;">              
                            </form>
                          
                        </div>
                      </div>
               

              </div>

            </div>
                      <?php
                    }else if (isset($_GET['ordercancelled'])) {
                      
                        ?>
                            <p id="erono" style="background-color:rgba(0,0,0,.8);color:white;float:right;padding:5px;">Order Has Been Cancelled <i class="fas fa-info-circle"></i></p>
                            <script>
                            setInterval(function(){
                                 document.getElementById('erono').classList.add('d-none');
                            },3000);
                               
                            </script>
                        <?php
                    }
                       
                 while($row = mysqli_fetch_array($runselectship)){
                                      $image = $row['photo'];
                                       if ($image == 'th.jfif') {
                              $image_src ="../admin/".$image;
                          }else {
                            $image_src = "../admin/bin/Item_Images/".$image;  
                          }
                                  ?>
                                  	<div class="item-tab-list">
                    				<a href="#"><img src="<?php echo $image_src?>" alt="tabitem" height="120"/></a>
                    				<div class="card">
                    					<div class="card-body">
                    					    <div class="container">
                    					        <div class="row">
                    					            <div class="col-sm-6">
                    					                	<h5 class="card-title"><?php  echo $row['name']?></h5>
                    						<p class="card-text"><?php echo $row['description']?>.. <br> Transaction Type : <?php echo $row['transaction_type']?> <br> Quantity : <?php echo $row['quantity']?></p>
                    						Amount Due :<h4 > <span style="color:#730b19;font-weight:bolder">₱<?php echo $row['total']?></span></h4>
                    					            </div>
                    					            <div class="col-sm-6">
                    					                <h6>Date Created : <?php echo $row['dateandtime']?> <br><p></p>
                    					                   Billing Address <hr>  Street/Barangay : <?php echo $row['addr']?> <br>
                    					                   Municipality/City : <?php echo $row['city']?> <br> Zip Code : <?php echo $row['zipcode']?>
                    					                </h6>
                    					                <form method="post" action="orders.php?codtab&Toshiptab" >
                    					                    <input type="hidden" name="track_id" value=<?php echo $row['track_id']?>>
                    					                <button class="btn btn-danger" name="cancel" style="font-size:13px">Cancel Order</button>
                    					                </form>
                    					            </div>
                    					        </div>
                    					    </div>
                    					
                    					</div>
                    				</div>
                    			</div>
                                <?php 
                                    
                              }
                         }else {
                            ?>
                            <div class="container">
                                    <div style="text-align:center">
                                        <h1 style="font-size:60px"><i class="far fa-clipboard"></i> </h1>
                                        <h6>No Orders Yet.</h6>
                                        
                                    </div>
                            </div>
                            <?php
                         }
                        
                    }else  if(isset($_GET['Toreceivetab'])){
                       ?>
                        <script>
                       
                            document.getElementById('ship').classList.remove('btn-light');
                             document.getElementById('ship').classList.add('btn-secondary');
                            document.getElementById('rec').classList.add('btn-light');
                             document.getElementById('rec').classList.remove('btn-secondary');
                        </script>
                        <?php 
                        
                        if($countquetab >=1) { 
                 while($row = mysqli_fetch_array($runselectque)){
                                      $image = $row['photo'];
                                        if ($image == 'th.jfif') {
                              $image_src ="../admin/".$image;
                          }else {
                            $image_src = "../admin/bin/Item_Images/".$image;  
                          }
                                  ?>
                                  	<div class="item-tab-list">
                    				<a href="#"><img src="<?php echo $image_src?>" alt="tabitem" height="120"/></a>
                    				<div class="card">
                    					<div class="card-body">
                    					    <div class="container">
                    					        <div class="row">
                    					            <div class="col-sm-6">
                    					                	<h5 class="card-title"><?php  echo $row['name']?></h5>
                    						<p class="card-text"><?php echo $row['description']?>.. <br> Transaction Type : <?php echo $row['transaction_type']?> <br> Quantity : <?php echo $row['quantity']?></p>
                    						Amount Due :<h4 > <span style="color:#730b19;font-weight:bolder">₱<?php echo $row['total']?></span>	</h4>
                    					
                    					            </div>
                    					            <div class="col-sm-6">
                    					                <h6>Date Created : <?php echo $row['dateandtime']?> <br><p></p>
                    					                   Billing Address <hr>  Street/Barangay : <?php echo $row['addr']?> <br>
                    					                   Municipality/City : <?php echo $row['city']?> <br> Zip Code : <?php echo $row['zipcode']?>
                    					                </h6>
                    					                <form method="post" action="approve.php" >
                    					                    <input type="hidden" name="track_id" value=<?php echo $row['track_id']?>>
                    					                <button class="btn btn-warning" name="rece" style="font-size:13px" >Order Received <i class="fas fa-check-circle"></i></button>
                    					               
                    					                </form>
                    					            </div>
                    					        </div>
                    					    </div>
                    					
                    					</div>
                    				</div>
                    			</div>
                                <?php 
                                    
                              }
                        }else {
                             ?>
                            <div class="container">
                                    <div style="text-align:center">
                                        <h1 style="font-size:60px"><i class="far fa-clipboard"></i> </h1>
                                        <h6>No Orders Yet.</h6>
                                        
                                    </div>
                            </div>
                            <?php
                        }
                    }
                    else if (isset($_GET['completedtab'])) {
                         ?>
                        <script>
                       
                            document.getElementById('ship').classList.remove('btn-light');
                             document.getElementById('ship').classList.add('btn-secondary');
                            document.getElementById('rec').classList.remove('btn-light');
                             document.getElementById('rec').classList.add('btn-secondary');
                             document.getElementById('compl').classList.remove('btn-secondary');
                              document.getElementById('compl').classList.add('btn-light');
                        </script>
                        <?php
                        
                        
                           if($countcomtab >=1) { 
                 while($row = mysqli_fetch_array($runselectcom)){
                                      $image = $row['photo'];
                                        if ($image == 'th.jfif') {
                              $image_src ="../admin/".$image;
                          }else {
                            $image_src = "../admin/bin/Item_Images/".$image;  
                          }
                                 ?>
                                  	<div class="item-tab-list">
                    				<a href="#"><img src="<?php echo $image_src?>" alt="tabitem" height="120"/></a>
                    				<div class="card">
                    					<div class="card-body">
                    					    <div class="container">
                    					        <div class="row">
                    					            <div class="col-sm-6">
                    					                	<h5 class="card-title"><?php  echo $row['name']?></h5>
                    						<p class="card-text"><?php echo $row['description']?>.. <br> Transaction Type : <?php echo $row['transaction_type']?> <br> Quantity : <?php echo $row['quantity']?></p>
                    						Amount Paid :<h4 > <span style="color:#730b19;font-weight:bolder">₱<?php echo $row['total']?></span>	</h4>
                    					
                    					            </div>
                    					            <div class="col-sm-6">
                    					                <h6>Date Created : <?php echo $row['dateandtime']?> <br><p></p>
                    					                   Billing Address <hr>  Street/Barangay : <?php echo $row['addr']?> <br>
                    					                   Municipality/City : <?php echo $row['city']?> <br> Zip Code : <?php echo $row['zipcode']?>
                    					                </h6>
                    					              <h5 style="color:green">Completed</h5>
                    					            </div>
                    					        </div>
                    					    </div>
                    					
                    					</div>
                    				</div>
                    			</div>
                                <?php 
                                    
                              }
                        }else {
                             ?>
                            <div class="container">
                                    <div style="text-align:center">
                                        <h1 style="font-size:60px"><i class="far fa-clipboard"></i> </h1>
                                        <h6>No Orders Yet.</h6>
                                        
                                    </div>
                            </div>
                            <?php
                        }
                        
                    }else if (isset($_GET['cancelledtab'])) {
                       ?>
                        <script>
                       
                            document.getElementById('ship').classList.remove('btn-light');
                             document.getElementById('ship').classList.add('btn-secondary');
                            document.getElementById('rec').classList.remove('btn-light');
                             document.getElementById('rec').classList.add('btn-secondary');
                             document.getElementById('compl').classList.add('btn-secondary');
                              document.getElementById('compl').classList.remove('btn-light');
                               document.getElementById('canc').classList.add('btn-light');
                                document.getElementById('canc').classList.remove('btn-secondary');
                        </script>
                        <?php
                        
                            if($countcanctab >=1) { 
                 while($row = mysqli_fetch_array($runselectcanc)){
                                      $image = $row['photo'];
                                       if ($image == 'th.jfif') {
                              $image_src ="../admin/".$image;
                          }else {
                            $image_src = "../admin/bin/Item_Images/".$image;  
                          }
                                    ?>
                                  	<div class="item-tab-list">
                    				<a href="#"><img src="<?php echo $image_src?>" alt="tabitem" height="120"/></a>
                    				<div class="card">
                    					<div class="card-body">
                    					    <div class="container">
                    					       <div class="row">
                    						<div class="col-sm-6">
                    						    <h5 class="card-title"><?php  echo $row['name']?></h5>
                    						<p class="card-text"><?php echo $row['description']?>.. <br> Transaction Type : <?php echo $row['transaction_type']?> <br> Quantity : <?php echo $row['quantity']?></p>
                    						Amount Paid :<h4 >₱<?php echo $row['total']?></h4> 
                    						</div>
                    						<div class="col-sm-6">
                    						        <h6>Date Created : <?php echo $row['dateandtime']?>  <br><p></p>
                    						            Date for Pick Up : <?php
                    						                if($row['target_date'] == 0) {
                    						                   echo 'None';
                    						                }else {
                    						                     echo $row['target_date'];
                    						                }
                    						           ?>
                    						            <p></p>
                    						            Date-Completed : <?php 
                    						            $timestamp = $row['datecompleted'];
                                                            echo date("F jS, Y", strtotime($timestamp));
                    						            
                    						            ?>
                    						            <p></p>
                    						            Payment Status : <span style="text-transform:capitalize;color:green">Completed</span>
                    						        </h6>
                    						</div>
                    						</div>
                    					    </div>
                    						
                    					</div>
                    				</div>
                    			</div>
                                <?php 
                                    
                              }
                        }else {
                             ?>
                            <div class="container">
                                    <div style="text-align:center">
                                        <h1 style="font-size:60px"><i class="far fa-clipboard"></i> </h1>
                                        <h6>No Orders Yet.</h6>
                                        
                                    </div>
                            </div>
                            <?php
                        }
                    }
                 
                    
                    ?>
                </div>
              
          </div>
          <?php
         /* 
           $selectalpending = "select * from orderview where transaction_type='cod' and  forcod = 'codgood' ";
                $runselect = mysqli_query($con,$selectalpending);
                 while($row = mysqli_fetch_array($runselect)){
                                      $image = $row['photo'];
                                      $image_src = "../administrator/bin/Item_Images/".$image;
                                  ?>
                                  	<div class="item-tab-list">
                    				<a href="#"><img src="<?php echo $image_src?>" alt="tabitem" height="120"/></a>
                    				<div class="card">
                    					<div class="card-body">
                    						<h5 class="card-title"><?php  echo $row['name']?></h5>
                    						<p class="card-text"><?php echo $row['description']?>.. <br> Transaction Type : <?php echo $row['transaction_type']?> <br> Quantity : <?php echo $row['quantity']?></p>
                    						Amount Due :<h4 > ₱ <?php echo $row['total']?></h4>
                    					</div>
                    				</div>
                    			</div>
                                <?php 
                                    
                              }
                              */
                              
                              
        
      }else {
           ?>
          <script>
                      document.getElementById('pend').classList.add('active');  
                     document.getElementById('pu').classList.remove('active'); 
                     document.getElementById('co').classList.remove('active'); 
          </script>
          <?php
                $selectalpending = "select * from orderview where status = 'pending' and user_id ='$userid' ";
                $runselect = mysqli_query($con,$selectalpending);
                 $as= mysqli_num_rows($runselect); 
                 if($as >=1) {
                 while($row = mysqli_fetch_array($runselect)){
                                      $image = $row['photo'];
                                       if ($image == 'th.jfif') {
                              $image_src ="../admin/".$image;
                          }else {
                            $image_src = "../admin/bin/Item_Images/".$image;  
                          }
                                 ?>
                                  	<div class="item-tab-list">
                    				<a href="#"><img src="<?php echo $image_src?>" alt="tabitem" height="120"/></a>
                    				<div class="card">
                    					<div class="card-body">
                    					    <div class="container">
                    					        <div class="row">
                    					            <div class="col-sm-6">
                    					                	<h5 class="card-title"><?php  echo $row['name']?></h5>
                    						<p class="card-text"><?php echo $row['description']?>.. <br> Transaction Type : <?php echo $row['transaction_type']?> <br> Quantity : <?php echo $row['quantity']?></p>
                    						Amount Due :<h4 > <span style="color:#730b19;font-weight:bolder">₱<?php echo $row['total']?></span></h4>
                    					            </div>
                    					            <div class="col-sm-6">
                    					                <h6>Date Created : <?php echo $row['dateandtime']?> <br><p></p>
                    					                   Billing Address <hr>  Street/Barangay : <?php echo $row['addr']?> <br>
                    					                   Municipality/City : <?php echo $row['city']?> <br> Zip Code : <?php echo $row['zipcode']?>
                    					                </h6>
                    					               
                    					               <h5>PENDING</h5>
                    					            </div>
                    					        </div>
                    					    </div>
                    					
                    					</div>
                    				</div>
                    			</div>
                                <?php 
                                    
                                    
                              }
                 }else {
                     ?>
                            <div class="container">
                                    <div style="text-align:center">
                                        <h1 style="font-size:60px"><i class="far fa-clipboard"></i> </h1>
                                        <h6>No Orders Yet.</h6>
                                        
                                    </div>
                            </div>
                            <?php 
                 }
      }

		
		?>
		
	
		
		
        </div>
		
    </div>
</div>
</div>

</div>
</div>

</article>








<div class="slider_for_order"></div>

<script>
    $(document).ready(function(){
        $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
            var activeTab = $(e.target).text(); 
            var previousTab = $(e.relatedTarget).text(); 
            $(".active-tab span").html(activeTab);
            $(".previous-tab span").html(previousTab);
        });
    });
</script>

<script src="../js/nav.js"></script>
</body>

</html> 
	    <?php
	    
	}
	else if(isset($_SESSION['user_id'])) { ////////////////////////////////////////////////////////////////////////////USer personal
		include '../admin/connection/connect.php';
	 
	  
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
<link rel="stylesheet" type="text/css" href="../css/homepage.css?v=4685" />


<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Titillium+Web:wght@600&display=swap" rel="stylesheet">

<!-- Orders Tab CSS --> 
<link rel="stylesheet" type="text/css" href="../css/orders.css?v=490" />

<!-- Orders Tab JS --> 
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


</head>
<title>Orders</title>
</head>

<body style="font-family: 'Titillium Web', sans-serif;">


<header>


<!-- NAVIGATION BAR --> 
<nav>
    <div class="logo">
        <a href="../home"><img src="../img/logo_alt_alt_ok.png" alt="logo"></a>
	</div>


    <ul class="nav-links">
        <li><a href="../home"><span style="font-size: 1.5rem;"><span style="color: #333333;"><i class="fas fa-house-user"></i></span></span> HOME</a></li>
        <li><a href="../category"><span style="font-size: 1.5rem;"><span style="color: #333333;"><i class="fas fa-align-left"></i></span></span> CATEGORIES</a></li>
        <li id="shoppingcartplacing"><a href="../cart"><span style="font-size: 1.5rem;"><span style="color: #333333;"><i class="fas fa-shopping-cart"></i></span></span> MY CART</a></li>
        
	
    </ul>
    <div class="burger">
        <div class="line1"></div>
        <div class="line2"></div>
        <div class="line3"></div>
    </div>	
</nav>






<!-- ORDERS  --> 
<article>

<div class="container m-auto">
<div class="row">



<!-- ORDERS TAB --> 
<div class="col-lg-12 col-md-12 col-sm-12">
<div class="orderstab">

    <ul id="myTab" class="nav nav-tabs">
        <li class="nav-item">
            <a href="orders.php" class="nav-link active" id="pend" >Pending</a>
        </li>
       
        <li class="nav-item">
            <?php 
            include '../admin/connection/connect.php';
                
                	$userid =$_SESSION['user_id'];
		
			    
                              
                              $orderscountforwalkin = "select * from trans_record where user_id = '$userid' and status='approved' and transaction_type = 'pickup'  ";
                               $resultcount = mysqli_query($con,$orderscountforwalkin);
                                $countpickup= mysqli_num_rows($resultcount); 
                               
                                $orderscountforreservation = "select * from trans_record where user_id = '$userid' and forcod='codgood' and transaction_type = 'cod'  ";
                               $resultcounts = mysqli_query($con,$orderscountforreservation);
                                $countcod= mysqli_num_rows($resultcounts); 
            ?>
            <a href="orders.php?pickuptab" class="nav-link" id="pu" >Pick Up <span class="badge btn btn-dark" ><?php echo $countpickup?></span></a>
        </li>
        <li class="nav-item">
            <a href="orders.php?codtab&Toshiptab" class="nav-link" id="co" >Cash On Delivery <span class="badge btn btn-dark"><?php echo $countcod?></span></a>
        </li>
         <li class="nav-item">
            <a href="orders.php?completedtab" class="nav-link" id="com" >Completed </a>
        </li>
         <li class="nav-item">
            <a href="orders.php?cancelled" class="nav-link" id="cancc" >Cancelled </a>
        </li>
        
    </ul>
	

    <div class="tab-content">
	
	<!-- All Tab  --> 
      <?php
      	/*	 while($row = mysqli_fetch_array($resultselect)){
                                      $image = $row['photo'];
                                      $image_src = "../administrator/bin/Item_Images/".$image;
                                  ?>
                                  	<div class="item-tab-list">
                    				<a href="#"><img src="<?php //echo $image_src?>" alt="tabitem" height="120"/></a>
                    				<div class="card">
                    					<div class="card-body">
                    						<h5 class="card-title"><?php // echo $row['name']?></h5>
                    						<p class="card-text"><?php //echo $row['description']?>.. <br> Transaction Type : <?php echo $row['transaction_type']?> <br> Quantity : <?php echo $row['quantity']?></p>
                    						Amount Due :<h4 > ₱ <?php //echo $row['total']?></h4>
                    					</div>
                    				</div>
                    			</div>
                                <?php 
                                    
                              }
                              */
            if(isset($_GET['cancelled'])) {
                ?>
          <script>
           document.getElementById('pu').classList.remove('active');
                      document.getElementById('pend').classList.remove('active');  
                     
                     document.getElementById('co').classList.remove('active'); 
                       document.getElementById('com').classList.remove('active');
                        document.getElementById('cancc').classList.add('active');
                         
          </script>
          <?php
        $selectalpending = "select * from orderview where user_id ='$userid' and status = 'cancelled' ";
                $runselect = mysqli_query($con,$selectalpending);
                 $ss= mysqli_num_rows($runselect); 
              if($ss>= 1){
                 while($row = mysqli_fetch_array($runselect)){
                                      $image = $row['photo'];
                                        if ($image == 'th.jfif') {
                              $image_src ="../admin/".$image;
                          }else {
                            $image_src = "../admin/bin/Item_Images/".$image;  
                          }
                                  ?>
                                  	<div class="item-tab-list">
                    				<a href="#"><img src="<?php echo $image_src?>" alt="tabitem" height="120"/></a>
                    				<div class="card">
                    					<div class="card-body">
                    					    <div class="container">
                    					       <div class="row">
                    						<div class="col-sm-6">
                    						    <h5 class="card-title"><?php  echo $row['name']?></h5>
                    						<p class="card-text"><?php echo $row['description']?>.. <br> Transaction Type : <?php echo $row['transaction_type']?> <br> Quantity : <?php echo $row['quantity']?></p>
                    						Amount to Pay :<h4 >₱<?php echo $row['total']?></h4> 
                    						</div>
                    						<div class="col-sm-6">
                    						        <h6>Date Created : <?php echo $row['dateandtime']?>  <br><p></p>
                    						            Date for Pick Up : <?php
                    						                if($row['target_date'] == 0) {
                    						                   echo 'None Pickup';
                    						                }else {
                    						                     echo $row['target_date'];
                    						                }
                    						           ?>
                    						            <p></p>
                    						            Status : <span style="text-transform:capitalize;color:red">Cancelled</span>
                    						        </h6>
                    						</div>
                    						</div>
                    					    </div>
                    						
                    					</div>
                    				</div>
                    			</div>
                                <?php 
                                    
                              }
                              }else {
                     ?>
                            <div class="container">
                                    <div style="text-align:center">
                                        <h1 style="font-size:60px"><i class="far fa-clipboard"></i> </h1>
                                        <h6>No Orders Yet.</h6>
                                        
                                    </div>
                            </div>
                            <?php 
                 }
            }else                   
                              
            if(isset($_GET['completedtab'])) {
                ?>
          <script>
           document.getElementById('pu').classList.remove('active');
                      document.getElementById('pend').classList.remove('active');  
                     
                     document.getElementById('co').classList.remove('active'); 
                       document.getElementById('com').classList.add('active');
                       document.getElementById('cancc').classList.remove('active');
          </script>
          <?php
        $selectalpending = "select * from orderview where user_id ='$userid' and status = 'completed' ORDER BY datecompleted desc ";
                $runselect = mysqli_query($con,$selectalpending);
                 $ss= mysqli_num_rows($runselect); 
              if($ss>= 1){
                 while($row = mysqli_fetch_array($runselect)){
                                      $image = $row['photo'];
                                        if ($image == 'th.jfif') {
                              $image_src ="../admin/".$image;
                          }else {
                            $image_src = "../admin/bin/Item_Images/".$image;  
                          }
                                    ?>
                                  	<div class="item-tab-list">
                    				<a href="#"><img src="<?php echo $image_src?>" alt="tabitem" height="120"/></a>
                    				<div class="card">
                    					<div class="card-body">
                    					    <div class="container">
                    					       <div class="row">
                    						<div class="col-sm-6">
                    						    <h5 class="card-title"><?php  echo $row['name']?></h5>
                    						<p class="card-text"><?php echo $row['description']?>.. <br> Transaction Type : <?php echo $row['transaction_type']?> <br> Quantity : <?php echo $row['quantity']?></p>
                    						Amount Paid :<h4 >₱<?php echo $row['total']?></h4> 
                    						</div>
                    						<div class="col-sm-6">
                    						        <h6>Date Created : <?php echo $row['dateandtime']?>  <br><p></p>
                    						            Date for Pick Up : <?php
                    						                if($row['target_date'] == 0) {
                    						                   echo 'None';
                    						                }else {
                    						                     echo $row['target_date'];
                    						                }
                    						           ?>
                    						            <p></p>
                    						            Date-Completed : <?php 
                    						            $timestamp = $row['datecompleted'];
                                                            echo date("F jS, Y", strtotime($timestamp));
                    						            
                    						            ?>
                    						            <p></p>
                    						             Status : <span style="text-transform:capitalize;color:green">Completed</span>
                    						        </h6>
                    						</div>
                    						</div>
                    					    </div>
                    						
                    					</div>
                    				</div>
                    			</div>
                                <?php 
                                    
                              }
                              }else {
                     ?>
                            <div class="container">
                                    <div style="text-align:center">
                                        <h1 style="font-size:60px"><i class="far fa-clipboard"></i> </h1>
                                        <h6>No Orders Yet.</h6>
                                        
                                    </div>
                            </div>
                            <?php 
                 }
            }  else                 
                              
      if (isset($_GET['pickuptab'])) {
          ?>
          <script>
           document.getElementById('pu').classList.add('active');
                      document.getElementById('pend').classList.remove('active');  
                     
                     document.getElementById('co').classList.remove('active'); 
                       document.getElementById('com').classList.remove('active');
                       document.getElementById('cancc').classList.remove('active');
          </script>
          <?php
        $selectalpending = "select * from orderview where user_id ='$userid' and transaction_type='pickup' and status = 'approved' ";
                $runselect = mysqli_query($con,$selectalpending);
                 $ss= mysqli_num_rows($runselect); 
              if($ss>= 1){
                 while($row = mysqli_fetch_array($runselect)){
                                      $image = $row['photo'];
                                        if ($image == 'th.jfif') {
                              $image_src ="../admin/".$image;
                          }else {
                            $image_src = "../admin/bin/Item_Images/".$image;  
                          }
                                  ?>
                                  	<div class="item-tab-list">
                    				<a href="#"><img src="<?php echo $image_src?>" alt="tabitem" height="120"/></a>
                    				<div class="card">
                    					<div class="card-body">
                    					    <div class="container">
                    					       <div class="row">
                    						<div class="col-sm-6">
                    						    <h5 class="card-title"><?php  echo $row['name']?></h5>
                    						<p class="card-text"><?php echo $row['description']?>.. <br> Transaction Type : <?php echo $row['transaction_type']?> <br> Quantity : <?php echo $row['quantity']?></p>
                    						Amount Due :<h4 >₱<?php echo $row['total']?></h4> 
                    						</div>
                    						<div class="col-sm-6">
                    						        <h6>Date Created : <?php echo $row['dateandtime']?>  <br><p></p>
                    						            Date for Pick Up : <?php echo $row['target_date']?>
                    						            <p></p>
                    						            Payment Status : <span style="text-transform:capitalize"><?php echo $row['paymentstatus']?></span>
                    						        </h6>
                    						</div>
                    						</div>
                    					    </div>
                    						
                    					</div>
                    				</div>
                    			</div>
                                <?php 
                                    
                              }
                              }else {
                     ?>
                            <div class="container">
                                    <div style="text-align:center">
                                        <h1 style="font-size:60px"><i class="far fa-clipboard"></i> </h1>
                                        <h6>No Orders Yet.</h6>
                                        
                                    </div>
                            </div>
                            <?php 
                 }
      }else if (isset($_GET['codtab'])) {
        
          ?>
          <script>
                      document.getElementById('pend').classList.remove('active');  
                     document.getElementById('pu').classList.remove('active'); 
                     document.getElementById('co').classList.add('active'); 
                     document.getElementById('com').classList.remove('active');
                     document.getElementById('cancc').classList.remove('active');
          </script>
          
          <div class="container">
              <?php
               $selectalpending = "select * from orderview where user_id ='$userid' and transaction_type='cod' and  status ='toprocess' ";
                $runselectpending = mysqli_query($con,$selectalpending);
                 $countpickuptab = mysqli_num_rows($runselectpending);
                 
                  $selectalship = "select * from orderview where user_id ='$userid' and transaction_type='cod' and  status ='toship' ";
                $runselectship = mysqli_query($con, $selectalship);
                $countshiptab = mysqli_num_rows($runselectship);
                
                 $selectalque = "select * from orderview where user_id ='$userid' and transaction_type='cod' and  status ='toreceive' ";
                $runselectque = mysqli_query($con,$selectalque);
                 $countquetab = mysqli_num_rows($runselectque);
                 
                 $selectalcom = "select * from orderview where user_id ='$userid' and transaction_type='cod' and  status ='completed' ";
                $runselectcom = mysqli_query($con,$selectalcom);
                 $countcomtab = mysqli_num_rows($runselectcom);
                 
                 $selectalcanc = "select * from orderview where user_id ='$userid' and transaction_type='cod' and  status ='cancelledcod' ";
                $runselectcanc = mysqli_query($con,$selectalcanc);
                 $countcanctab = mysqli_num_rows($runselectcanc);
              
              ?>
              <div class="container">
              <div class="btn-group" role="group" aria-label="Basic example">

              <a  href="orders.php?codtab&Toshiptab" type="button" class="btn btn-secondary" id="ship">To Ship <span id="codshipcount" class="badge btn btn-dark"><?php echo $countshiptab?></span></a>
              <a  href="orders.php?codtab&Toreceivetab" type="button" class="btn btn-secondary" id="rec">To Receive <span id="codreceivecount" class="badge btn btn-dark"><?php echo $countquetab?></span></a>
             <a  href="orders.php?codtab&completedtab" type="button" class="btn btn-secondary" id="compl">Completed <span id="codreceivecount" class="badge btn btn-dark"><?php echo $countcomtab?></span></a>

            </div>
            </div>
            <hr>
                <div class="container">
                    <?php
                    if(isset($_GET['Topaytab'])) {
                        ?>
                        <script>

                            document.getElementById('ship').classList.remove('btn-light');
                             document.getElementById('ship').classList.add('btn-secondary');
                            document.getElementById('rec').classList.remove('btn-light');
                             document.getElementById('rec').classList.add('btn-secondary');
                        </script>
                        
                        <?php
                        
                        
                           if($countpickuptab >=1) {
                                
                                if(isset($_POST['cancel'])){ 
                      $track = $_POST['track_id'];
                      ?>
                      <style type="text/css">

              .modalcreated {
            display: none; /* Hidden by default */
            position: fixed; /* Stay in place */
            z-index: 1; /* Sit on top */
            padding-top: 100px; /* Location of the box */
            left: 0;
            top: 0;
            width: 100%; /* Full width */
            height: 100%; /* Full height */
            overflow: auto; /* Enable scroll if needed */
            background-color: rgb(0,0,0); /* Fallback color */
            background-color: rgba(0,0,0,0.4); /* Black w/ opacity */

          }

          /* Modal Content */
          .modal-contents {
            background-color: #fefefe;
            margin: auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
             border-radius: 5px;
          }

          /* The Close Button */
          .close {
            color: #aaaaaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
          }

          .close:hover,
          .close:focus {
            color: #000;
            text-decoration: none;
            cursor: pointer;
          }
          .display-block {
            display: block;

          }
          .diplay-none {
            display: none;
          }
            </style> 
                       <script type="text/javascript">
                function displaymodalnones()  {
  
            
              document.getElementById("myModals").setAttribute('style','display:none');
            }
              document.getElementById("myModals").classList.add('display-block');
                      
              </script>
             
              <div id="myModals" class="modalcreated" style="display: block">

              <!-- Modal content -->
              <div class="modal-contents">
               <a href="javascript:void(0)"> <span class="close " onclick="displaymodalnones()" style="font-size: 23px;"><i class="fas fa-times-circle"></i></span></a>
                    
                      <div class="container">
                        <div class="row">
                           <h5 style="text-align: center;">Are you Sure you want to Cancel the Order No : <?php echo $track?> ?</h5>
                                  <p style="text-align: center;">Status : <span style="color: green"> On Process</span></p>
                            <form method="post" action="approve.php" style="text-align: center;">
                              <label class="btn-warning" style="padding: 3px;border-radius: 5px;">YES</label>
                                 <input type="checkbox" name="checkyes"  required="">   
                                 <label class="btn-danger"  style="margin-left: 10px;padding: 3px;border-radius: 5px;">NO</label>
                                 <input onclick="displaymodalnones()" type="checkbox" name="checkno" > 

                                 <p></p>
                                 <p>Please Provide a Reason of Cancelation :</p>
                                 <textarea style="font-size: 12px;" name="reason" class="form-control" required=""></textarea>   
                                 <p></p>
                                 <input type="hidden" name="track_id" value=<?php echo $track?>>
                                 <input type="hidden" name="leveltype" value="orderuser">
                                 <input type="submit" name="btnsub" value="Proceed" class="btn btn-secondary form-control" style="font-size: 14px;">              
                            </form>
                          
                        </div>
                      </div>
               

              </div>

            </div>
                      <?php
                    }else if (isset($_GET['ordercancelled'])) {
                      
                        ?>
                            <p id="erono" style="background-color:rgba(0,0,0,.8);color:white;float:right;padding:5px;">Order Has Been Cancelled <i class="fas fa-info-circle"></i></p>
                            <script>
                            setInterval(function(){
                                 document.getElementById('erono').classList.add('d-none');
                            },3000);
                               
                            </script>
                        <?php
                    }
                               
                           
                 
                 while($row = mysqli_fetch_array($runselectpending)){
                                      $image = $row['photo'];
                                        if ($image == 'th.jfif') {
                              $image_src ="../admin/".$image;
                          }else {
                            $image_src = "../admin/bin/Item_Images/".$image;  
                          }
                                  ?>
                                  	<div class="item-tab-list">
                    				<a href="#"><img src="<?php echo $image_src?>" alt="tabitem" height="120"/></a>
                    				<div class="card">
                    					<div class="card-body">
                    					    <div class="container">
                    					        <div class="row">
                    					            <div class="col-sm-6">
                    					                	<h5 class="card-title"><?php  echo $row['name']?></h5>
                    						<p class="card-text"><?php echo $row['description']?>.. <br> Transaction Type : <?php echo $row['transaction_type']?> <br> Quantity : <?php echo $row['quantity']?></p>
                    						Amount Due :<h4 > <span style="color:#730b19;font-weight:bolder">₱<?php echo $row['total']?></span></h4>
                    					            </div>
                    					            <div class="col-sm-6">
                    					                <h6>Date Created : <?php echo $row['dateandtime']?> <br><p></p>
                    					                   Billing Address <hr>  Street/Barangaya : <?php echo $row['addr']?> <br>
                    					                   Municipality/City : <?php echo $row['city']?> <br> Zip Code : <?php echo $row['zipcode']?>
                    					                </h6>
                    					                <form method="post" action="orders.php?codtab&Topaytab" >
                    					                    <input type="hidden" name="track_id" value=<?php echo $row['track_id']?>>
                    					                <button class="btn btn-danger" name="cancel" style="font-size:13px">Cancel Order</button>
                    					                </form>
                    					            </div>
                    					        </div>
                    					    </div>
                    					
                    					</div>
                    				</div>
                    			</div>
                                <?php 
                                    
                              }
                           }else {
                               ?>
                            <div class="container">
                                    <div style="text-align:center">
                                        <h1 style="font-size:60px"><i class="far fa-clipboard"></i> </h1>
                                        <h6>No Orders Yet.</h6>
                                        
                                    </div>
                            </div>
                            <?php 
                           }
                    }else  if(isset($_GET['Toshiptab'])) { 
                         ?>
                        <script>
                        document.getElementById('pay').classList.add('btn-secondary');
                            document.getElementById('pay').classList.remove('btn-light');
                            document.getElementById('ship').classList.add('btn-light');
                             document.getElementById('ship').classList.remove('btn-secondary');
                            document.getElementById('rec').classList.remove('btn-light');
                             document.getElementById('rec').classList.add('btn-secondary');
                        </script>
                        <?php
                         if($countshiptab >=1) {
                                   if(isset($_POST['cancel'])){ 
                      $track = $_POST['track_id'];
                      ?>
                      <style type="text/css">

              .modalcreated {
            display: none; /* Hidden by default */
            position: fixed; /* Stay in place */
            z-index: 1; /* Sit on top */
            padding-top: 100px; /* Location of the box */
            left: 0;
            top: 0;
            width: 100%; /* Full width */
            height: 100%; /* Full height */
            overflow: auto; /* Enable scroll if needed */
            background-color: rgb(0,0,0); /* Fallback color */
            background-color: rgba(0,0,0,0.4); /* Black w/ opacity */

          }

          /* Modal Content */
          .modal-contents {
            background-color: #fefefe;
            margin: auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
             border-radius: 5px;
          }

          /* The Close Button */
          .close {
            color: #aaaaaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
          }

          .close:hover,
          .close:focus {
            color: #000;
            text-decoration: none;
            cursor: pointer;
          }
          .display-block {
            display: block;

          }
          .diplay-none {
            display: none;
          }
            </style> 
                       <script type="text/javascript">
                function displaymodalnones()  {
  
            
              document.getElementById("myModals").setAttribute('style','display:none');
            }
              document.getElementById("myModals").classList.add('display-block');
                      
              </script>
             
              <div id="myModals" class="modalcreated" style="display: block">

              <!-- Modal content -->
              <div class="modal-contents">
               <a href="javascript:void(0)"> <span class="close " onclick="displaymodalnones()" style="font-size: 23px;"><i class="fas fa-times-circle"></i></span></a>
                    
                      <div class="container">
                        <div class="row">
                           <h5 style="text-align: center;">Are you Sure you want to Cancel the Order No : <?php echo $track?> ?</h5>
                                  <p style="text-align: center;">Status : <span style="color: green"> To Ship</span></p>
                            <form method="post" action="approve.php" style="text-align: center;">
                              <label class="btn-warning" style="padding: 3px;border-radius: 5px;">YES</label>
                                 <input type="checkbox" name="checkyes"  required="">   
                                 <label class="btn-danger"  style="margin-left: 10px;padding: 3px;border-radius: 5px;">NO</label>
                                 <input onclick="displaymodalnones()" type="checkbox" name="checkno" > 

                                 <p></p>
                                 <p>Please Provide a Reason of Cancelation :</p>
                                 <textarea style="font-size: 12px;" name="reason" class="form-control" required=""></textarea>   
                                 <p></p>
                                 <input type="hidden" name="track_id" value=<?php echo $track?>>
                                 <input type="hidden" name="leveltype" value="orderuser">
                                 <input type="submit" name="btnsubship" value="Proceed" class="btn btn-secondary form-control" style="font-size: 14px;">              
                            </form>
                          
                        </div>
                      </div>
               

              </div>

            </div>
                      <?php
                    }else if (isset($_GET['ordercancelled'])) {
                      
                        ?>
                            <p id="erono" style="background-color:rgba(0,0,0,.8);color:white;float:right;padding:5px;">Order Has Been Cancelled <i class="fas fa-info-circle"></i></p>
                            <script>
                            setInterval(function(){
                                 document.getElementById('erono').classList.add('d-none');
                            },3000);
                               
                            </script>
                        <?php
                    }
                       
                 while($row = mysqli_fetch_array($runselectship)){
                                      $image = $row['photo'];
                                       if ($image == 'th.jfif') {
                              $image_src ="../admin/".$image;
                          }else {
                            $image_src = "../admin/bin/Item_Images/".$image;  
                          }
                                  ?>
                                  	<div class="item-tab-list">
                    				<a href="#"><img src="<?php echo $image_src?>" alt="tabitem" height="120"/></a>
                    				<div class="card">
                    					<div class="card-body">
                    					    <div class="container">
                    					        <div class="row">
                    					            <div class="col-sm-6">
                    					                	<h5 class="card-title"><?php  echo $row['name']?></h5>
                    						<p class="card-text"><?php echo $row['description']?>.. <br> Transaction Type : <?php echo $row['transaction_type']?> <br> Quantity : <?php echo $row['quantity']?></p>
                    						Amount Due :<h4 > <span style="color:#730b19;font-weight:bolder">₱<?php echo $row['total']?></span></h4>
                    					            </div>
                    					            <div class="col-sm-6">
                    					                <h6>Date Created : <?php echo $row['dateandtime']?> <br><p></p>
                    					                   Billing Address <hr>  Street/Barangay : <?php echo $row['addr']?> <br>
                    					                   Municipality/City : <?php echo $row['city']?> <br> Zip Code : <?php echo $row['zipcode']?>
                    					                </h6>
                    					                <form method="post" action="orders.php?codtab&Toshiptab" >
                    					                    <input type="hidden" name="track_id" value=<?php echo $row['track_id']?>>
                    					                <button class="btn btn-danger" name="cancel" style="font-size:13px">Cancel Order</button>
                    					                </form>
                    					            </div>
                    					        </div>
                    					    </div>
                    					
                    					</div>
                    				</div>
                    			</div>
                                <?php 
                                    
                              }
                         }else {
                            ?>
                            <div class="container">
                                    <div style="text-align:center">
                                        <h1 style="font-size:60px"><i class="far fa-clipboard"></i> </h1>
                                        <h6>No Orders Yet.</h6>
                                        
                                    </div>
                            </div>
                            <?php
                         }
                        
                    }else  if(isset($_GET['Toreceivetab'])){
                       ?>
                        <script>
                        document.getElementById('pay').classList.add('btn-secondary');
                            document.getElementById('pay').classList.remove('btn-light');
                            document.getElementById('ship').classList.remove('btn-light');
                             document.getElementById('ship').classList.add('btn-secondary');
                            document.getElementById('rec').classList.add('btn-light');
                             document.getElementById('rec').classList.remove('btn-secondary');
                        </script>
                        <?php 
                        
                        if($countquetab >=1) { 
                 while($row = mysqli_fetch_array($runselectque)){
                                      $image = $row['photo'];
                                       if ($image == 'th.jfif') {
                              $image_src ="../admin/".$image;
                          }else {
                            $image_src = "../admin/bin/Item_Images/".$image;  
                          }
                                  ?>
                                  	<div class="item-tab-list">
                    				<a href="#"><img src="<?php echo $image_src?>" alt="tabitem" height="120"/></a>
                    				<div class="card">
                    					<div class="card-body">
                    					    <div class="container">
                    					        <div class="row">
                    					            <div class="col-sm-6">
                    					                	<h5 class="card-title"><?php  echo $row['name']?></h5>
                    						<p class="card-text"><?php echo $row['description']?>.. <br> Transaction Type : <?php echo $row['transaction_type']?> <br> Quantity : <?php echo $row['quantity']?></p>
                    						Amount Due :<h4 > <span style="color:#730b19;font-weight:bolder">₱<?php echo $row['total']?></span>	</h4>
                    					
                    					            </div>
                    					            <div class="col-sm-6">
                    					                <h6>Date Created : <?php echo $row['dateandtime']?> <br><p></p>
                    					                   Billing Address <hr>  Street/Barangay : <?php echo $row['addr']?> <br>
                    					                   Municipality/City : <?php echo $row['city']?> <br> Zip Code : <?php echo $row['zipcode']?>
                    					                </h6>
                    					                <form method="post" action="approve.php" >
                    					                    <input type="hidden" name="track_id" value=<?php echo $row['track_id']?>>
                    					                <button class="btn btn-warning" name="rece" style="font-size:13px" >Order Received <i class="fas fa-check-circle"></i></button>
                    					               
                    					                </form>
                    					            </div>
                    					        </div>
                    					    </div>
                    					
                    					</div>
                    				</div>
                    			</div>
                                <?php 
                                    
                              }
                        }else {
                             ?>
                            <div class="container">
                                    <div style="text-align:center">
                                        <h1 style="font-size:60px"><i class="far fa-clipboard"></i> </h1>
                                        <h6>No Orders Yet.</h6>
                                        
                                    </div>
                            </div>
                            <?php
                        }
                    }
                    else if (isset($_GET['completedtab'])) {
                         ?>
                        <script>
                        document.getElementById('pay').classList.add('btn-secondary');
                            document.getElementById('pay').classList.remove('btn-light');
                            document.getElementById('ship').classList.remove('btn-light');
                             document.getElementById('ship').classList.add('btn-secondary');
                            document.getElementById('rec').classList.remove('btn-light');
                             document.getElementById('rec').classList.add('btn-secondary');
                             document.getElementById('compl').classList.remove('btn-secondary');
                              document.getElementById('compl').classList.add('btn-light');
                        </script>
                        <?php
                        
                        
                           if($countcomtab >=1) { 
                 while($row = mysqli_fetch_array($runselectcom)){
                                      $image = $row['photo'];
                                        if ($image == 'th.jfif') {
                              $image_src ="../admin/".$image;
                          }else {
                            $image_src = "../admin/bin/Item_Images/".$image;  
                          }
                                   ?>
                                  	<div class="item-tab-list">
                    				<a href="#"><img src="<?php echo $image_src?>" alt="tabitem" height="120"/></a>
                    				<div class="card">
                    					<div class="card-body">
                    					    <div class="container">
                    					       <div class="row">
                    						<div class="col-sm-6">
                    						    <h5 class="card-title"><?php  echo $row['name']?></h5>
                    						<p class="card-text"><?php echo $row['description']?>.. <br> Transaction Types : <?php echo $row['transaction_type']?> <br> Quantity : <?php echo $row['quantity']?></p>
                    						Amount Paid :<h4 >₱<?php echo $row['total']?></h4> 
                    						</div>
                    						<div class="col-sm-6">
                    						        <h6>Date Created : <?php echo $row['dateandtime']?>  <br><p></p>
                    						            Date for Pick Up : <?php
                    						                if($row['target_date'] == 0) {
                    						                   echo 'None';
                    						                }else {
                    						                     echo $row['target_date'];
                    						                }
                    						           ?>
                    						            <p></p>
                    						            Date-Completed : <?php 
                    						            $timestamp = $row['datecompleted'];
                                                            echo date("F jS, Y", strtotime($timestamp));
                    						            
                    						            ?>
                    						            <p></p>
                    						            Payment Status : <span style="text-transform:capitalize;color:green">Completed</span>
                    						        </h6>
                    						</div>
                    						</div>
                    					    </div>
                    						
                    					</div>
                    				</div>
                    			</div>
                                <?php 
                                    
                              }
                        }else {
                             ?>
                            <div class="container">
                                    <div style="text-align:center">
                                        <h1 style="font-size:60px"><i class="far fa-clipboard"></i> </h1>
                                        <h6>No Orders Yet.</h6>
                                        
                                    </div>
                            </div>
                            <?php
                        }
                        
                    }else if (isset($_GET['cancelledtab'])) {
                       ?>
                        <script>
                        document.getElementById('pay').classList.add('btn-secondary');
                            document.getElementById('pay').classList.remove('btn-light');
                            document.getElementById('ship').classList.remove('btn-light');
                             document.getElementById('ship').classList.add('btn-secondary');
                            document.getElementById('rec').classList.remove('btn-light');
                             document.getElementById('rec').classList.add('btn-secondary');
                             document.getElementById('compl').classList.add('btn-secondary');
                              document.getElementById('compl').classList.remove('btn-light');
                               document.getElementById('canc').classList.add('btn-light');
                                document.getElementById('canc').classList.remove('btn-secondary');
                        </script>
                        <?php
                        
                            if($countcanctab >=1) { 
                 while($row = mysqli_fetch_array($runselectcanc)){
                                      $image = $row['photo'];
                                        if ($image == 'th.jfif') {
                              $image_src ="../admin/".$image;
                          }else {
                            $image_src = "../admin/bin/Item_Images/".$image;  
                          }
                                  ?>
                                  	<div class="item-tab-list">
                    				<a href="#"><img src="<?php echo $image_src?>" alt="tabitem" height="120"/></a>
                    				<div class="card">
                    					<div class="card-body">
                    					    <div class="container">
                    					        <div class="row">
                    					            <div class="col-sm-6">
                    					                	<h5 class="card-title"><?php  echo $row['name']?></h5>
                    						<p class="card-text"><?php echo $row['description']?>.. <br> Transaction Type : <?php echo $row['transaction_type']?> <br> Quantity : <?php echo $row['quantity']?></p>
                    						Amount Paid :<h4 > <span style="color:#730b19;font-weight:bolder">₱<?php echo $row['total']?></span>	</h4>
                    					
                    					            </div>
                    					            <div class="col-sm-6">
                    					                <h6>Date Created : <?php echo $row['dateandtime']?> <br><p></p>
                    					                   Billing Address <hr>  Street/Barangay : <?php echo $row['addr']?> <br>
                    					                   Municipality/City : <?php echo $row['city']?> <br> Zip Code : <?php echo $row['zipcode']?>
                    					                   <br> <p></p>
                    					                   Cancelation Reason : <br>
                    					                   <span style="color:#8c0f26"><?php echo $row['cancelationreason']?></span>
                    					                </h6>
                    					                
                    					              <h5 style="color:red">CANCELLED</h5>
                    					            </div>
                    					        </div>
                    					    </div>
                    					
                    					</div>
                    				</div>
                    			</div>
                                <?php 
                                    
                              }
                        }else {
                             ?>
                            <div class="container">
                                    <div style="text-align:center">
                                        <h1 style="font-size:60px"><i class="far fa-clipboard"></i> </h1>
                                        <h6>No Orders Yet.</h6>
                                        
                                    </div>
                            </div>
                            <?php
                        }
                    }
                 
                    
                    ?>
                </div>
              
          </div>
          <?php
         /* 
           $selectalpending = "select * from orderview where transaction_type='cod' and  forcod = 'codgood' ";
                $runselect = mysqli_query($con,$selectalpending);
                 while($row = mysqli_fetch_array($runselect)){
                                      $image = $row['photo'];
                                      $image_src = "../administrator/bin/Item_Images/".$image;
                                  ?>
                                  	<div class="item-tab-list">
                    				<a href="#"><img src="<?php echo $image_src?>" alt="tabitem" height="120"/></a>
                    				<div class="card">
                    					<div class="card-body">
                    						<h5 class="card-title"><?php  echo $row['name']?></h5>
                    						<p class="card-text"><?php echo $row['description']?>.. <br> Transaction Type : <?php echo $row['transaction_type']?> <br> Quantity : <?php echo $row['quantity']?></p>
                    						Amount Due :<h4 > ₱ <?php echo $row['total']?></h4>
                    					</div>
                    				</div>
                    			</div>
                                <?php 
                                    
                              }
                              */
                              
                              
        
      }else {
           ?>
          <script>
                      document.getElementById('pend').classList.add('active');  
                     document.getElementById('pu').classList.remove('active'); 
                     document.getElementById('co').classList.remove('active'); 
          </script>
          <?php
                $selectalpending = "select * from orderview where status = 'pending' and user_id ='$userid' ";
                $runselect = mysqli_query($con,$selectalpending);
                 $as= mysqli_num_rows($runselect); 
                 if($as >=1) {
                 while($row = mysqli_fetch_array($runselect)){
                                      $image = $row['photo'];
                                       if ($image == 'th.jfif') {
                              $image_src ="../admin/".$image;
                          }else {
                            $image_src = "../admin/bin/Item_Images/".$image;  
                          }
                                 ?>
                                  	<div class="item-tab-list">
                    				<a href="#"><img src="<?php echo $image_src?>" alt="tabitem" height="120"/></a>
                    				<div class="card">
                    					<div class="card-body">
                    					    <div class="container">
                    					        <div class="row">
                    					            <div class="col-sm-6">
                    					                	<h5 class="card-title"><?php  echo $row['name']?></h5>
                    						<p class="card-text"><?php echo $row['description']?>.. <br> Transaction Type : <?php echo $row['transaction_type']?> <br> Quantity : <?php echo $row['quantity']?></p>
                    						Amount Due :<h4 > <span style="color:#730b19;font-weight:bolder">₱<?php echo $row['total']?></span></h4>
                    					            </div>
                    					            <div class="col-sm-6">
                    					                <h6>Date Created : <?php echo $row['dateandtime']?> <br><p></p>
                    					                   Billing Address <hr>  Street/Barangay : <?php echo $row['addr']?> <br>
                    					                   Municipality/City : <?php echo $row['city']?> <br> Zip Code : <?php echo $row['zipcode']?>
                    					                </h6>
                    					               
                    					               <h5>PENDING</h5>
                    					            </div>
                    					        </div>
                    					    </div>
                    					
                    					</div>
                    				</div>
                    			</div>
                                <?php 
                                    
                                    
                              }
                 }else {
                     ?>
                            <div class="container">
                                    <div style="text-align:center">
                                        <h1 style="font-size:60px"><i class="far fa-clipboard"></i> </h1>
                                        <h6>No Orders Yet.</h6>
                                        
                                    </div>
                            </div>
                            <?php 
                 }
      }

		
		?>
		
	
		
		
        </div>
		
    </div>
</div>
</div>

</div>
</div>

</article>








<div class="slider_for_order"></div>

<script>
    $(document).ready(function(){
        $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
            var activeTab = $(e.target).text(); 
            var previousTab = $(e.relatedTarget).text(); 
            $(".active-tab span").html(activeTab);
            $(".previous-tab span").html(previousTab);
        });
    });
</script>

<script src="../js/nav.js"></script>
</body>

</html> 
	    <?php
	}else {
	    ?>
	        <script>window.location.href="../signin"</script>
	    <?php
	}
?>
