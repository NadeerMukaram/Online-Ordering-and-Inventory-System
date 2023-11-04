<?php
	session_start();

if (isset($_SESSION['access_token'])) {
    unset($_SESSION['temp']);
	    ?>
	    	<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="icon" href="../img/tabicon.png" type="image/gif" sizes="16x16">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css"> <!-- /.carousel-indicators -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css">
<link rel="stylesheet" type="text/css" href="../css/homepage.css?v=4735" />
<link rel="stylesheet" type="text/css" href="../css/categories.css?v=3810" />

<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Titillium+Web:wght@600&display=swap" rel="stylesheet">

<script src="https://kit.fontawesome.com/129b086bc9.js" crossorigin="anonymous"></script>

</head>
<title>Categories</title>
<?php 
    include '../admin/connection/connect.php';
?>
</head>

<body style="font-family: 'Titillium Web', sans-serif;">


<header>

<nav>

    <div class="logo ">
        <a href="../home "><img src="../img/logo_alt_alt_ok.png" alt="logo"></a>
	</div>


    <ul class="nav-links">
        <li><a href="../home"><span style="font-size: 1.5rem;"><span style="color: #333333;"><i class="fas fa-house-user"></i></span></span> HOME</a></li>
        <li><a href="../category"><span style="font-size: 1.5rem;"><span style="color: #333333;"><i class="fas fa-align-left"></i></span></span> CATEGORIES</a></li>
        <li><a href="../orders/orders.php"><span style="font-size: 1.5rem;"><span style="color: #333333;"><i class="fas fa-cart-arrow-down"></i></span></span> ORDERS</a></li>
        <li>
            <a href="#" data-toggle="modal" data-target="#myaccount"><span style="font-size: 1.5rem;"><span style="color: #333333;" ><i class="fas fa-user"></i></span></span> MY ACCOUNT</a>
            <!-- <a href="#" onclick="logout()"><span style="font-size: 1.2rem;"><span style="color: #333333;" data-toggle="modal" data-target="#myaccount"><i class="fas fa-sign-out-alt"></i></span></span> My Account</a>-->
            
            </li>
		<div class="dropdown_for_user">
	
		
			<button  onclick="clickdirect()" class="btn btn-dark" style="width: 84px; background-color:#333333"><i class="fa fa-shopping-cart" aria-hidden="true"></i> <span id="countcart" class="badge badge-light" style="background-color: white;color: black;padding: .35em .65em;"></span></button>
				
			    
			
		</div>		
    </ul>
    <div class="burger">
        <div class="line1"></div>
        <div class="line2"></div>
        <div class="line3"></div>
    </div>
	
</nav>
	

</header>


		
	 <?php include 'includemodals.php'?>	
<div class="main">
    	<button  onclick="clickdirect()"  class="btn btn-dark pota" style="width: 84px;float:right"><i class="fa fa-shopping-cart" aria-hidden="true"></i> <span   class="badge badge-light" id="countcartmobi" style="background-color: white;color: black"></span></button>
	<form method="post" >		
  <div class="input-group">
    <input type="text" class="form-control texttt" name="txtsearch" id="focuser" placeholder="Search"   onclick="this.select()">
    <div class="input-group-append">
      <button class="btn btn-dark" type="submit" style="z-index:0;">
        <i class="fa fa-search"></i>
      </button>
    </div>
  </div>
  </form>
</div>


<div id="main">
<button class="openbtn_for_categoryaction" style="z-index:1;" onclick="openNav()"><img class="d-block img-fluid" src="../img/openbtnoone.png" alt=""></button>  



</div>
</div>





<!-- Font Awesome Version 5.15.2 -->
<div id="mySidebar" class="sidebar">
<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>

	<hr>
		<a href="../category"><i class="fas fa-bars"></i> All</a><hr class="hrcate">
		 <a href="../category-action/index.php?categorizedbynewlyadded"><i class="far fa-plus-square"></i>Newly Added</a><hr class="hrcate">
			<a href="../category-action/index.php?categorizedbyhighprice"><i class="fas fa-sort-amount-up"></i>To Highest Price</a><hr class="hrcate">
			<a href="../category-action/index.php?categorizedbylowprice"><i class="fas fa-sort-amount-down"></i>To Lowest Price</a><hr class="hrcate">
	<?php 
        		$sql = " select * from category  ";
                $result = mysqli_query($con,$sql); // run query
              
          
             	//while($row = mysqli_fetch_array($result)){} is where we output all the data in database
                 while($row = mysqli_fetch_array($result)){ 
                     ?>
                     	<a style="text-transform:capitalize" href="../category-action/index.php?categorized=<?php echo $row['categoryname']?>"> <?php echo $row['categoryname']?> </a><hr class="hrcate">
                     <?php
                 }
                 
 ?>


	<div class="sblogo"><img src="../img/hantechalternatelogobb.png" class="rotate" alt="logo"></div>
</div>


<div class="newcart"></div>



<div class="items" style="margin-top:10px;">
<div class="row">
     <?php 
      
			
if (isset($_POST['txtsearch'])) {
    	$email =$_SESSION['email'] ;
			     $sql = " select * from user_account where email = '$email'  ";
                             $resultforuser = mysqli_query($con,$sql); // run query
                            
                        
                              while($row = mysqli_fetch_array($resultforuser)){
                                    $userid = $row['user_id'];
                                    
                              }
                         $cartcount = "select * from cart where user_id = '$userid'";
                            $resultcart = mysqli_query($con,$cartcount); // run query
                          
                             $countcart= mysqli_num_rows($resultcart);
                                  ?>
                                  
                    
                   <script>
                   document.getElementById("countcart").innerHTML = "<?php echo $countcart?>"; 
                    document.getElementById("countcartmobi").innerHTML = "<?php echo $countcart?>"; 
                    
                   </script>
                   <?php
    $search = $_POST['txtsearch'];
     $sql = "SELECT * FROM `product` WHERE concat (`name`,`prod_id`) like '%$search%'   ";
      $result = mysqli_query($con,$sql); // run query
                $count= mysqli_num_rows($result); // to count if necessary
                        if ($count >=1) {
             	//while($row = mysqli_fetch_array($result)){} is where we output all the data in database
             	?>
				   
                
                    <h4><br><br><br>Related Search : <?php echo $search?> <br> </h4>
                    <br><br><br>
                    <hr>
                    <script>
                         document.getElementById("focuser").setAttribute("value","<?php echo $search?>");  
                    </script>
                <?php
                 while($row = mysqli_fetch_array($result)){
                      $image = $row['photo'];
                          if ($image == 'th.jfif') {
                              $image_src ="../admin/".$image;
                          }else {
                            $image_src = "../admin/bin/Item_Images/".$image;  
                          }
                     ?>
                
                     <!--item-->	<div class="col-lg-4 col-md-6 col-6 mb-4">	
		<div class="card h-100">
			<a href="#"><img class="card-img-top" height="250" src="<?php echo $image_src?>" alt=""></a>
              <div class="card-body">
                <h4 class="card-title">
                  <a href="../product_view/index.php?productview&prod_id=<?php echo $row['prod_id']?>" class="itemshover" style="text-transform: uppercase;"><?php echo $row['name']?></a>
                </h4>
                <hr>
                <h5 >₱<strong><?php echo $row['price']?></strong></h5>
                <i style="color:gold" class="fas fa-star"></i>
                <i style="color:gold" class="fas fa-star"></i>
                <i style="color:gold" class="fas fa-star"></i>
                <i style="color:gold" class="fas fa-star"></i>
                <i style="color:gold" class="fas fa-star"></i>
                
                <p class="card-text"><?php echo $row['description']?></p>
              </div>
              <div class="card-footer">
						
				<form method="post"   onsubmit='return false' >
				   
				<button type="submit"  class="btn btn-outline-dark addcart" data-userid="<?php echo $userid?>"  data-pid="<?php echo $row['prod_id']?>"  ><i class="fa fa-cart-plus" aria-hidden="true"></i></i> Add to cart</button>
				</form>
              </div>
		</div>
		</div>
                    <?php
                     
                 } }else {
                     	$email =$_SESSION['email'] ;
			     $sql = " select * from user_account where email = '$email'  ";
                             $resultforuser = mysqli_query($con,$sql); // run query
                            
                        
                              while($row = mysqli_fetch_array($resultforuser)){
                                    $userid = $row['user_id'];
                                    
                              }
                              
                     
                    $cartcount = "select * from cart where user_id = '$userid'";
                            $resultcart = mysqli_query($con,$cartcount); // run query
                          
                             $countcart= mysqli_num_rows($resultcart);
                                  ?>
                                  
                    
                   <script>
                   document.getElementById("countcart").innerHTML = "<?php echo $countcart?>"; 
                    document.getElementById("countcartmobi").innerHTML = "<?php echo $countcart?>"; 
                    
                   </script>
                
                    <h4 ><br><br><br>Related Search NOT Found : <span style="color:red"><?php echo $search?> </span>   </h4>
                    <br><br><br>
                    <hr>
                     <script>
                         document.getElementById("focuser").setAttribute("value","<?php echo $search?>");  
                    </script>
                    
                <?php  
                 }
}else
            if (isset($_GET['categorized'])) {
                $cate = $_GET['categorized'];
                	$email =$_SESSION['email'] ;
			     $sql = " select * from user_account where email = '$email'  ";
                             $resultforuser = mysqli_query($con,$sql); // run query
                            
                        
                              while($row = mysqli_fetch_array($resultforuser)){
                                    $userid = $row['user_id'];
                                    
                              }
                              
                     
                    $cartcount = "select * from cart where user_id = '$userid'";
                            $resultcart = mysqli_query($con,$cartcount); // run query
                          
                             $countcart= mysqli_num_rows($resultcart);
                ?>
                 <script>
                                document.getElementById("countcart").innerHTML = "<?php echo $countcart?>"; 
                                 document.getElementById("countcartmobi").innerHTML = "<?php echo $countcart?>";
                                 
                               </script>
                
                    <h4 style="text-align:center;text-transform:capitalize; margin-top:30px;"><br><br><?php echo $cate?> Category <br> </h4>
                    <br>
                    <div class="container">
                        
                    
                   <form method="post" action ="index.php?categorized=<?php echo $cate?>">
                   <div class="btn-group hanhighlowcataction" role="group" aria-label="Basic example">
                      <!-- <button type="button" class="btn btn-secondary"><i class="far fa-plus-square"></i> Newly Added</button>-->
                      <h4><button type="submit" name="highpr" class="btn btn-light btnon"><i class="fas fa-sort-amount-up"></i> To Highest Price</button></h4>
                      <h4><button type="submit" name="lowpr" class="btn btn-light btnon"><i class="fas fa-sort-amount-down"></i> To Lowest Price</button></h4>
                    
                    </div>
                    </form>
                    </div>
                    <br><br>
                    <hr>
                    
                <?php   
                        $getcategory = "select * from category";
                         $resultget = mysqli_query($con,$getcategory); 
                          while($get = mysqli_fetch_array($resultget)){ 
                              $catname = $get['categoryname'];
                              if($catname == $cate) {
                                  $catid = $get['cat_id'];
                               
                               
                              }
                              
                          }
                          if (isset($_POST['highpr'])){
                             	$email =$_SESSION['email'] ;
			     $sql = " select * from user_account where email = '$email'  ";
                             $resultforuser = mysqli_query($con,$sql); // run query
                            
                        
                              while($row = mysqli_fetch_array($resultforuser)){
                                    $userid = $row['user_id'];
                                    
                              }
                              
                     
                    $cartcount = "select * from cart where user_id = '$userid'";
                            $resultcart = mysqli_query($con,$cartcount); // run query
                          
                             $countcart= mysqli_num_rows($resultcart); 
                        ?>
                         <script>
                                document.getElementById("countcart").innerHTML = "<?php echo $countcart?>"; 
                                 document.getElementById("countcartmobi").innerHTML = "<?php echo $countcart?>";
                                 
                               </script>
                        <?php
                      
               $sql = " select  * from product where cat_id = '$catid'  Order by price desc";
                $result = mysqli_query($con,$sql); // run query
                $count= mysqli_num_rows($result); // to count if necessary
            
             	//while($row = mysqli_fetch_array($result)){} is where we output all the data in database
                 while($row = mysqli_fetch_array($result)){
                        $image = $row['photo'];
                           if ($image == 'th.jfif') {
                              $image_src ="../admin/".$image;
                          }else {
                            $image_src = "../admin/bin/Item_Images/".$image;  
                          }
                    ?>
                    <!--item-->	<div class="col-lg-3 col-md-6 col-6 mb-4">	
		<div class="card h-100">
			<a href="#"><img class="card-img-top" height="250" src="<?php echo $image_src?>" alt=""></a>
              <div class="card-body">
                <h4 class="card-title">
                  <a href="../product_view/index.php?productview&prod_id=<?php echo $row['prod_id']?>" class="itemshover" style="text-transform: uppercase;"><?php echo $row['name']?></a>
                </h4>
                <hr>
                <h5 >₱<strong><?php echo $row['price']?></strong></h5>
                <i style="color:gold" class="fas fa-star"></i>
                <i style="color:gold" class="fas fa-star"></i>
                <i style="color:gold" class="fas fa-star"></i>
                <i style="color:gold" class="fas fa-star"></i>
                <i style="color:gold" class="fas fa-star"></i>
                
                <p class="card-text"><?php echo $row['description']?></p>
              </div>
              <div class="card-footer">
						
			<form method="post"   onsubmit='return false' >
				   
				<button type="submit"  class="btn btn-outline-dark addcart" data-userid="<?php echo $userid?>"  data-pid="<?php echo $row['prod_id']?>"  ><i class="fa fa-cart-plus" aria-hidden="true"></i></i> Add to cart</button>
				</form>
              </div>
		</div>
		</div>
                    <?php
            }
            }else if (isset($_POST['lowpr'])){
                	$email =$_SESSION['email'] ;
			     $sql = " select * from user_account where email = '$email'  ";
                             $resultforuser = mysqli_query($con,$sql); // run query
                            
                        
                              while($row = mysqli_fetch_array($resultforuser)){
                                    $userid = $row['user_id'];
                                    
                              }
                              
                     
                    $cartcount = "select * from cart where user_id = '$userid'";
                            $resultcart = mysqli_query($con,$cartcount); // run query
                          
                             $countcart= mysqli_num_rows($resultcart);
                 ?>
                         <script>
                                document.getElementById("countcart").innerHTML = "<?php echo $countcart?>"; 
                                 document.getElementById("countcartmobi").innerHTML = "<?php echo $countcart?>";
                                 
                               </script>
                        <?php
                            
               $sql = " select  * from product where cat_id = '$catid'  Order by price asc";
                $result = mysqli_query($con,$sql); // run query
                $count= mysqli_num_rows($result); // to count if necessary
            
             	//while($row = mysqli_fetch_array($result)){} is where we output all the data in database
                 while($row = mysqli_fetch_array($result)){
                        $image = $row['photo'];
                           if ($image == 'th.jfif') {
                              $image_src ="../admin/".$image;
                          }else {
                            $image_src = "../admin/bin/Item_Images/".$image;  
                          }
                    ?>
                    <!--item-->	<div class="col-lg-3 col-md-6 col-6 mb-4">	
		<div class="card h-100">
			<a href="../product_view/index.php?productview&prod_id=<?php echo $row['prod_id']?>"><img class="card-img-top" height="250" src="<?php echo $image_src?>" alt=""></a>
              <div class="card-body">
                <h4 class="card-title">
                  <a href="../product_view/index.php?productview&prod_id=<?php echo $row['prod_id']?>" class="itemshover" style="text-transform: uppercase;"><?php echo $row['name']?></a>
                </h4>
                <hr>
                <h5 >₱<strong><?php echo $row['price']?></strong></h5>
                <i style="color:gold" class="fas fa-star"></i>
                <i style="color:gold" class="fas fa-star"></i>
                <i style="color:gold" class="fas fa-star"></i>
                <i style="color:gold" class="fas fa-star"></i>
                <i style="color:gold" class="fas fa-star"></i>
                
                <p class="card-text"><?php echo $row['description']?></p>
              </div>
              <div class="card-footer">
						
				<form method="post"   onsubmit='return false' >
				   
				<button type="submit"  class="btn btn-outline-dark addcart" data-userid="<?php echo $userid?>"  data-pid="<?php echo $row['prod_id']?>"  ><i class="fa fa-cart-plus" aria-hidden="true"></i></i> Add to cart</button>
				</form>
              </div>
		</div>
		</div>
                    <?php
            }
            }
            else {
                	$email =$_SESSION['email'] ;
			     $sql = " select * from user_account where email = '$email'  ";
                             $resultforuser = mysqli_query($con,$sql); // run query
                            
                        
                              while($row = mysqli_fetch_array($resultforuser)){
                                    $userid = $row['user_id'];
                                    
                              }
                              
                     
                    $cartcount = "select * from cart where user_id = '$userid'";
                            $resultcart = mysqli_query($con,$cartcount); // run query
                          
                             $countcart= mysqli_num_rows($resultcart);
                  ?>
                         <script>
                                document.getElementById("countcart").innerHTML = "<?php echo $countcart?>"; 
                                 document.getElementById("countcartmobi").innerHTML = "<?php echo $countcart?>";
                                 
                               </script>
                        <?php
                 $sql = " select  * from product where cat_id = '$catid'";
                $result = mysqli_query($con,$sql); // run query
                $count= mysqli_num_rows($result); // to count if necessary
            
             	//while($row = mysqli_fetch_array($result)){} is where we output all the data in database
                 while($row = mysqli_fetch_array($result)){
                        $image = $row['photo'];
                           if ($image == 'th.jfif') {
                              $image_src ="../admin/".$image;
                          }else {
                            $image_src = "../admin/bin/Item_Images/".$image;  
                          }
                    ?>
                    <!--item-->	<div class="col-lg-3 col-md-6 col-6 mb-4">	
		<div class="card h-100">
			<a href="../product_view/index.php?productview&prod_id=<?php echo $row['prod_id']?>"><img class="card-img-top" height="250" src="<?php echo $image_src?>" alt=""></a>
              <div class="card-body">
                <h4 class="card-title">
                  <a href="../product_view/index.php?productview&prod_id=<?php echo $row['prod_id']?>" class="itemshover" style="text-transform: uppercase;"><?php echo $row['name']?></a>
                </h4>
                <hr>
                <h5 >₱<strong><?php echo $row['price']?></strong></h5>
                <i style="color:gold" class="fas fa-star"></i>
                <i style="color:gold" class="fas fa-star"></i>
                <i style="color:gold" class="fas fa-star"></i>
                <i style="color:gold" class="fas fa-star"></i>
                <i style="color:gold" class="fas fa-star"></i>
                
                <p class="card-text"><?php echo $row['description']?></p>
              </div>
              <div class="card-footer">
						
			<form method="post"   onsubmit='return false' >
				   
				<button type="submit"  class="btn btn-outline-dark addcart" data-userid="<?php echo $userid?>"  data-pid="<?php echo $row['prod_id']?>"  ><i class="fa fa-cart-plus" aria-hidden="true"></i></i> Add to cart</button>
				</form>
              </div>
		</div>
		</div>
                    <?php
                 }
           
            }
                         
                            
             
  
            }else if (isset($_GET['categorizedbynewlyadded'])){
                	$email =$_SESSION['email'] ;
			     $sql = " select * from user_account where email = '$email'  ";
                             $resultforuser = mysqli_query($con,$sql); // run query
                            
                        
                              while($row = mysqli_fetch_array($resultforuser)){
                                    $userid = $row['user_id'];
                                    
                              }
                              
                     
                    $cartcount = "select * from cart where user_id = '$userid'";
                            $resultcart = mysqli_query($con,$cartcount); // run query
                          
                             $countcart= mysqli_num_rows($resultcart);
                ?>
                
                         <script>
                                document.getElementById("countcart").innerHTML = "<?php echo $countcart?>"; 
                                 document.getElementById("countcartmobi").innerHTML = "<?php echo $countcart?>";
                                 
                               </script>
                      
                
                    <h4 style="text-align:center;text-transform:capitalize; margin-top:30px;"><br><br> <i class="far fa-plus-square"></i> Newly Added <br> </h4>
                    <br><br><br>
                    <hr>
                    
                <?php   
                      
                         
                            
               $sql = " select  * from product Order by modified desc limit 10";
                $result = mysqli_query($con,$sql); // run query
                $count= mysqli_num_rows($result); // to count if necessary
            
             	//while($row = mysqli_fetch_array($result)){} is where we output all the data in database
                 while($row = mysqli_fetch_array($result)){
                        $image = $row['photo'];
                           if ($image == 'th.jfif') {
                              $image_src ="../admin/".$image;
                          }else {
                            $image_src = "../admin/bin/Item_Images/".$image;  
                          }
                    ?>
                    <!--item-->	<div class="col-lg-3 col-md-6 col-6 mb-4">	
		<div class="card h-100">
			<a href="../product_view/index.php?productview&prod_id=<?php echo $row['prod_id']?>"><img class="card-img-top" height="250" src="<?php echo $image_src?>" alt=""></a>
              <div class="card-body">
                <h4 class="card-title">
                  <a href="../product_view/index.php?productview&prod_id=<?php echo $row['prod_id']?>" class="itemshover" style="text-transform: uppercase;"><?php echo $row['name']?></a>
                </h4>
                <hr>
                <h5 >₱<strong><?php echo $row['price']?></strong></h5>
                <i style="color:gold" class="fas fa-star"></i>
                <i style="color:gold" class="fas fa-star"></i>
                <i style="color:gold" class="fas fa-star"></i>
                <i style="color:gold" class="fas fa-star"></i>
                <i style="color:gold" class="fas fa-star"></i>
                
                <p class="card-text"><?php echo $row['description']?></p>
              </div>
              <div class="card-footer">
						
				<form method="post"   onsubmit='return false' >
				   
				<button type="submit"  class="btn btn-outline-dark addcart" data-userid="<?php echo $userid?>"  data-pid="<?php echo $row['prod_id']?>"  ><i class="fa fa-cart-plus" aria-hidden="true"></i></i> Add to cart</button>
				</form>
              </div>
		</div>
		</div>
                    <?php
            }
            }else if (isset($_GET['categorizedbyhighprice'])){
                	$email =$_SESSION['email'] ;
			     $sql = " select * from user_account where email = '$email'  ";
                             $resultforuser = mysqli_query($con,$sql); // run query
                            
                        
                              while($row = mysqli_fetch_array($resultforuser)){
                                    $userid = $row['user_id'];
                                    
                              }
                              
                     
                    $cartcount = "select * from cart where user_id = '$userid'";
                            $resultcart = mysqli_query($con,$cartcount); // run query
                          
                             $countcart= mysqli_num_rows($resultcart);
                ?>
                 
                         <script>
                                document.getElementById("countcart").innerHTML = "<?php echo $countcart?>"; 
                                 document.getElementById("countcartmobi").innerHTML = "<?php echo $countcart?>";
                                 
                               </script>
                      
                    <h4 style="text-align:center;text-transform:capitalize; margin-top:30px;"><br><br> <i class="fas fa-sort-amount-up"></i> To Highest Price <br> </h4>
                    <br><br><br>
                    <hr>
                    
                <?php   
                      
                         
                            
               $sql = " select  * from product Order by price desc";
                $result = mysqli_query($con,$sql); // run query
                $count= mysqli_num_rows($result); // to count if necessary
            
             	//while($row = mysqli_fetch_array($result)){} is where we output all the data in database
                 while($row = mysqli_fetch_array($result)){
                        $image = $row['photo'];
                            if ($image == 'th.jfif') {
                              $image_src ="../admin/".$image;
                          }else {
                            $image_src = "../admin/bin/Item_Images/".$image;  
                          }
                    ?>
                    <!--item-->	<div class="col-lg-3 col-md-6 col-6 mb-4">	
		<div class="card h-100">
			<a href="../product_view/index.php?productview&prod_id=<?php echo $row['prod_id']?>"><img class="card-img-top" height="250" src="<?php echo $image_src?>" alt=""></a>
              <div class="card-body">
                <h4 class="card-title">
                  <a href="../product_view/index.php?productview&prod_id=<?php echo $row['prod_id']?>" class="itemshover" style="text-transform: uppercase;"><?php echo $row['name']?></a>
                </h4>
                <hr>
                <h5 >₱<strong><?php echo $row['price']?></strong></h5>
                <i style="color:gold" class="fas fa-star"></i>
                <i style="color:gold" class="fas fa-star"></i>
                <i style="color:gold" class="fas fa-star"></i>
                <i style="color:gold" class="fas fa-star"></i>
                <i style="color:gold" class="fas fa-star"></i>
                
                <p class="card-text"><?php echo $row['description']?></p>
              </div>
              <div class="card-footer">
						
				<form method="post"   onsubmit='return false' >
				   
				<button type="submit"  class="btn btn-outline-dark addcart" data-userid="<?php echo $userid?>"  data-pid="<?php echo $row['prod_id']?>"  ><i class="fa fa-cart-plus" aria-hidden="true"></i></i> Add to cart</button>
				</form>
              </div>
		</div>
		</div>
                    <?php
            }
            }else if (isset($_GET['categorizedbylowprice'])){
                	$email =$_SESSION['email'] ;
			     $sql = " select * from user_account where email = '$email'  ";
                             $resultforuser = mysqli_query($con,$sql); // run query
                            
                        
                              while($row = mysqli_fetch_array($resultforuser)){
                                    $userid = $row['user_id'];
                                    
                              }
                              
                     
                    $cartcount = "select * from cart where user_id = '$userid'";
                            $resultcart = mysqli_query($con,$cartcount); // run query
                          
                             $countcart= mysqli_num_rows($resultcart);
                ?>
                 
                         <script>
                                document.getElementById("countcart").innerHTML = "<?php echo $countcart?>"; 
                                 document.getElementById("countcartmobi").innerHTML = "<?php echo $countcart?>";
                                 
                               </script>
                      
                
                    <h4 style="text-align:center;text-transform:capitalize; margin-top:30px;"><br><br> <i class="fas fa-sort-amount-down"></i> To Lowest Price <br> </h4>
                    <br><br><br>
                    <hr>
                    
                <?php   
                      
                         
                            
               $sql = " select  * from product Order by price asc";
                $result = mysqli_query($con,$sql); // run query
                $count= mysqli_num_rows($result); // to count if necessary
            
             	//while($row = mysqli_fetch_array($result)){} is where we output all the data in database
                 while($row = mysqli_fetch_array($result)){
                        $image = $row['photo'];
                            if ($image == 'th.jfif') {
                              $image_src ="../admin/".$image;
                          }else {
                            $image_src = "../admin/bin/Item_Images/".$image;  
                          }
                    ?>
                    <!--item-->	<div class="col-lg-3 col-md-6 col-6 mb-4">	
		<div class="card h-100">
			<a href="../product_view/index.php?productview&prod_id=<?php echo $row['prod_id']?>"><img class="card-img-top" height="250" src="<?php echo $image_src?>" alt=""></a>
              <div class="card-body">
                <h4 class="card-title">
                  <a href="../product_view/index.php?productview&prod_id=<?php echo $row['prod_id']?>" class="itemshover" style="text-transform: uppercase;"><?php echo $row['name']?></a>
                </h4>
                <hr>
                <h5 >₱<strong><?php echo $row['price']?></strong></h5>
                <i style="color:gold" class="fas fa-star"></i>
                <i style="color:gold" class="fas fa-star"></i>
                <i style="color:gold" class="fas fa-star"></i>
                <i style="color:gold" class="fas fa-star"></i>
                <i style="color:gold" class="fas fa-star"></i>
                
                <p class="card-text"><?php echo $row['description']?></p>
              </div>
              <div class="card-footer">
						
				<form method="post"   onsubmit='return false' >
				   
				<button type="submit"  class="btn btn-outline-dark addcart" data-userid="<?php echo $userid?>"  data-pid="<?php echo $row['prod_id']?>"  ><i class="fa fa-cart-plus" aria-hidden="true"></i></i> Add to cart</button>
				</form>
              </div>
		</div>
		</div>
                    <?php
            }
            }
             else {
                 	$email =$_SESSION['email'] ;
			     $sql = " select * from user_account where email = '$email'  ";
                             $resultforuser = mysqli_query($con,$sql); // run query
                            
                        
                              while($row = mysqli_fetch_array($resultforuser)){
                                    $userid = $row['user_id'];
                                    
                              }
                              
                     
                    $cartcount = "select * from cart where user_id = '$userid'";
                            $resultcart = mysqli_query($con,$cartcount); // run query
                          
                             $countcart= mysqli_num_rows($resultcart);
                 ?>
                         <script>
                                document.getElementById("countcart").innerHTML = "<?php echo $countcart?>"; 
                                 document.getElementById("countcartmobi").innerHTML = "<?php echo $countcart?>";
                                 
                               </script>
                        <?php
                
                 $sql = " select * from product";
                $result = mysqli_query($con,$sql); // run query
                $count= mysqli_num_rows($result); // to count if necessary
              $cartcount = "select * from cart where user_id = '$userid'";
                            $resultcart = mysqli_query($con,$cartcount); // run query
                          
                             $countcart= mysqli_num_rows($resultcart);
                                  ?>
                                  
                    
                   <script>
                   document.getElementById("countcart").innerHTML = "<?php echo $countcart?>"; 
                    document.getElementById("countcartmobi").innerHTML = "<?php echo $countcart?>"; 
                    
                   </script>
                   <p><br><br></p>
                   <?php
             	//while($row = mysqli_fetch_array($result)){} is where we output all the data in database
                 while($row = mysqli_fetch_array($result)){
                        $image = $row['photo'];
                            if ($image == 'th.jfif') {
                              $image_src ="../admin/".$image;
                          }else {
                            $image_src = "../admin/bin/Item_Images/".$image;  
                          }
                    ?>
                    <!--item-->	<div class="col-lg-3 col-md-6 col-6 mb-4">	
		<div class="card h-100">
			<a href="../product_view/index.php?productview&prod_id=<?php echo $row['prod_id']?>"><img class="card-img-top" height="250" src="<?php echo $image_src?>" alt=""></a>
              <div class="card-body">
                <h4 class="card-title">
                  <a href="../product_view/index.php?productview&prod_id=<?php echo $row['prod_id']?>" class="itemshover" style="text-transform: uppercase;"><?php echo $row['name']?></a>
                </h4>
                <h5>₱<?php echo $row['price']?></h5>
                <i style="color:gold" class="fas fa-star"></i>
                <i style="color:gold" class="fas fa-star"></i>
                <i style="color:gold" class="fas fa-star"></i>
                <i style="color:gold" class="fas fa-star"></i>
                <i style="color:gold" class="fas fa-star"></i>
                
                <p class="card-text"><?php echo $row['description']?></p>
              </div>
              <div class="card-footer">
						
				<form method="post" action="../category-action/index.php" >
				    <input type="hidden" value="<?php echo $row['prod_id']?>" name="prod_id" >
				<button type="submit" class="btn btn-outline-dark "  name="addtocart"><i class="fa fa-cart-plus" aria-hidden="true"></i></i> Add to cart</button>
				</form>
              </div>
		</div>
		</div>
                    <?php
                 }
          

            }

   
?>

		
			
</div>
</div>
<script
  src="jquery2.js"></script>
<script>
     $(document).ready(function() {
  //# for id , . for classes
   
    $('.addcart').click(function(e) {
         var prod_id = $(this).data("pid");
          var user_id = $(this).data("userid");
          
        
   e.preventDefault();
   $.ajax({
			url	:	"addcart.php",
			method:	"POST",
			data	:	{addtocart:1,prod_id:prod_id,user_id:user_id},
			success	:	function(data){
			   
			$(".newcart").html(data);
		       
		
			}
		})
        })
       });
</script>

<style>
.fab { 
color:#333333;
}

.fab:hover { 
color:#538FCB;
}
</style>

<!-- FOOTER --> 
<footer>
	<div class="row">
 
		<div class="col-md-12">
			<h4><a href="../terms-of-service" target="_blank" class="termsofservice">Terms of Service</a> ┃ <a href="../aboutus" target="_blank" class="termsofservice">About Us</a></h4>
			<hr>
			<h6>Email us at hantechspprt@gmail.com</h6>
			<h4>Eldreanne Online Ordering and Inventory System © 2021</h4>
			<h6>
			Warren Josiah de Guzman <a href="https://www.facebook.com/warrenjosiah.deguzman.7"><i class="fab fa-facebook"></i></a> I 
			Nadeer Mukaram <a href="https://www.facebook.com/nzro3"><i class="fab fa-facebook"></i></a> I 
			Ryan Peñosa Camonias <a href="https://www.facebook.com/ryan.camonias"><i class="fab fa-facebook"></i></a> I 
			Reenjay Caimor <a href="https://www.facebook.com/reenjay.caimor"><i class="fab fa-facebook"></i></a> I 
			Kerzen Dalman Lañojan <a href="https://www.facebook.com/kerzen.lanojan.9"><i class="fab fa-facebook"></i></a>
			</h6>	
		</div>
	
	</div>	
</footer>

<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js" integrity="sha512-XKa9Hemdy1Ui3KSGgJdgMyYlUg1gM+QhL6cnlyTe2qzMCYm4nAZ1PsVerQzTTXzonUR+dmswHqgJPuwCq1MaAg==" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="../js/nav.js"></script>


<script>

function openNav() {
  document.getElementById("mySidebar").style.width = "290px";
}

function closeNav() {
  document.getElementById("mySidebar").style.width = "0";
}

function clickdirect() {
    window.location.href="../cart";
}
function logout() {
    window.location.href="../signin/logout.php";
}
</script>
<iframe name="addtocart" style="display:none"></iframe>
</body>

</html> 
	    <?php
	}else if (isset($_SESSION['user_id'])) {//////////////////////////////////////////////////////////////////////USER PERSONAL ACCOUNT
	    	    unset($_SESSION['temp']);
	    	    ?>
	    	<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="icon" href="../img/tabicon.png" type="image/gif" sizes="16x16">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css"> <!-- /.carousel-indicators -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css">
<link rel="stylesheet" type="text/css" href="../css/homepage.css?v=4735" />
<link rel="stylesheet" type="text/css" href="../css/categories.css?v=3810" />

<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Titillium+Web:wght@600&display=swap" rel="stylesheet">

<script src="https://kit.fontawesome.com/129b086bc9.js" crossorigin="anonymous"></script>

</head>
<title>Categories</title>
<?php 
    include '../admin/connection/connect.php';
?>
</head>

<body style="font-family: 'Titillium Web', sans-serif;">


<header>

<nav>

    <div class="logo ">
        <a href="../home "><img src="../img/logo_alt_alt_ok.png" alt="logo"></a>
	</div>


    <ul class="nav-links">
        <li><a href="../home"><span style="font-size: 1.5rem;"><span style="color: #333333;"><i class="fas fa-house-user"></i></span></span> HOME</a></li>
        <li><a href="../category"><span style="font-size: 1.5rem;"><span style="color: #333333;"><i class="fas fa-align-left"></i></span></span> CATEGORIES</a></li>
        <li><a href="../orders/orders.php"><span style="font-size: 1.5rem;"><span style="color: #333333;"><i class="fas fa-cart-arrow-down"></i></span></span> ORDERS</a></li>
       <li>
            <a href="#" data-toggle="modal" data-target="#myaccount"><span style="font-size: 1.5rem;"><span style="color: #333333;" ><i class="fas fa-user"></i></span></span> MY ACCOUNT</a>
            <!-- <a href="#" onclick="logout()"><span style="font-size: 1.2rem;"><span style="color: #333333;" data-toggle="modal" data-target="#myaccount"><i class="fas fa-sign-out-alt"></i></span></span> My Account</a>-->
            
            </li>
		<div class="dropdown_for_user">
	
			<button  onclick="clickdirect()" class="btn btn-dark" style="width: 84px; background-color:#333333"><i class="fa fa-shopping-cart" aria-hidden="true"></i> <span id="mycart" class="badge badge-light" style="background-color: white;color: black;padding: .35em .65em;"></span></button>
			
		</div>		
    </ul>
    <div class="burger">
        <div class="line1"></div>
        <div class="line2"></div>
        <div class="line3"></div>
    </div>
	
</nav>
	

</header>


<?php include 'includemodals.php'?>		

<div class="main">
    	<button  onclick="clickdirect()"  class="btn btn-dark pota" style="width: 84px;float:right"><i class="fa fa-shopping-cart" aria-hidden="true"></i><span class="badge badge-light" id="countcartmobi" style="background-color: white;color: black"></span></button>
	<form method="post" >		
  <div class="input-group">
    <input type="text" class="form-control texttt" name="txtsearch" id="focuser" placeholder="Search"   onclick="this.select()">
    <div class="input-group-append">
      <button class="btn btn-dark" type="submit" style="z-index:0;">
        <i class="fa fa-search"></i>
      </button>
    </div>
  </div>
  </form>
</div>


<div id="main">
<button class="openbtn_for_categoryaction" style="z-index:1;" onclick="openNav()"><img class="d-block img-fluid" src="../img/openbtnoone.png" alt=""></button>  

<!-- Carousel -->

</div>
</div>





<!-- Font Awesome Version 5.15.2 -->
<div id="mySidebar" class="sidebar">
<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>

	<hr>
		<a href="../category"><i class="fas fa-bars"></i> All</a><hr class="hrcate">
		 <a href="../category-action/index.php?categorizedbynewlyadded"><i class="far fa-plus-square"></i>Newly Added</a><hr class="hrcate">
			<a href="../category-action/index.php?categorizedbyhighprice"><i class="fas fa-sort-amount-up"></i>To Highest Price</a><hr class="hrcate">
			<a href="../category-action/index.php?categorizedbylowprice"><i class="fas fa-sort-amount-down"></i>To Lowest Price</a><hr class="hrcate">
	<?php 
        		$sql = " select * from category  ";
                $result = mysqli_query($con,$sql); // run query
              
          
             	//while($row = mysqli_fetch_array($result)){} is where we output all the data in database
                 while($row = mysqli_fetch_array($result)){ 
                     ?>
                     	<a style="text-transform:capitalize" href="../category-action/index.php?categorized=<?php echo $row['categoryname']?>"> <?php echo $row['categoryname']?> </a><hr class="hrcate">
                     <?php
                 }
                 
 ?>


	<div class="sblogo"><img src="../img/hantechalternatelogobb.png" class="rotate" alt="logo"></div>
</div>



<div class="newcart"></div>


<div class="items">
<div class="row">
     <?php 
      	$userid =$_SESSION['user_id'] ;
				if(isset($_POST['addtocart'])) {
				    $prod_id = $_POST['prod_id'];
				            $selectproduct = "select * from product where prod_id = '$prod_id'";
				             $result = mysqli_query($con,$selectproduct); // run query
                            
                              //while($row = mysqli_fetch_array($result)){} is where we output all the data in database
                              while($row = mysqli_fetch_array($result)){
                                    $price = $row['price'];
                              
                                 }
                      
			
                              
                             $checkitemifalreadyexist = "select * from cart where prod_id= '$prod_id' and user_id= '$userid'";
                             $checkexist= mysqli_query($con,$checkitemifalreadyexist); // run query
                              $countthis= mysqli_num_rows($checkexist);
                              
                              if ($countthis == 1) {
                                     while($row = mysqli_fetch_array($checkexist)){
                                    $qty = $row['qty'];
                                    $total = $row['total'];
                                    
                              }
                              $totalqty = $qty + 1 ;
                              $amountdue = $totalqty *  $price;
                                                $updateqty = "UPDATE `cart` SET `qty`='$totalqty' , `total`= '$amountdue' WHERE prod_id='$prod_id' and user_id = '$userid' ";
                                                $updateitem= mysqli_query($con,$updateqty); // run query
                                  
                                  if ($updateqty) {
                                         $cartcount = "select * from cart where user_id = '$userid'";
                            $resultcart = mysqli_query($con,$cartcount); // run query
                          
                             $countcart= mysqli_num_rows($resultcart);
                                    ?>
                                  
                                      <p><br></p>         
            				    <div id="hideadd">
            				   <div class="alert alert-success" role="alert"  style="margin-top:50px;text-align:center;margin-bottom:10px;">
                                  Item already added, Quantity Updated <i class="far fa-check-circle"></i>
                                </div>
                                </div>
                               <script>
                                document.getElementById("countcart").innerHTML = "<?php echo $countcart?>"; 
                                 document.getElementById("countcartmobi").innerHTML = "<?php echo $countcart?>";
                                   setInterval(function(){document.getElementById("hideadd").setAttribute("style","display:none");
                                    
                                       
                                   }, 2000);
                               </script>
            				    <?php
                                  }else {
                                      echo 'fail';
                                  }
                                
                              }else {
                                  
                             
                        $addtocart = "INSERT INTO `cart`(`user_id`, `prod_id`, `qty`, `total`, `status`) VALUES ('$userid','$prod_id','1','$price','cart')";
                             $added = mysqli_query($con,$addtocart); // run query
                             if($added) {
                            $cartcount = "select * from cart where user_id = '$userid'";
                            $resultcart = mysqli_query($con,$cartcount); // run query
                          
                             $countcart= mysqli_num_rows($resultcart);
                                  ?>
                                  
                                  <p><br></p> 
				    <div id="hideadd">
				   <div class="alert alert-success" role="alert"  style="margin-top:50px;text-align:center;margin-bottom:10px;">
                      Item has been added to cart <i class="far fa-check-circle"></i>
                    </div>
                     </div>
                   <script>
                   document.getElementById("countcart").innerHTML = "<?php echo $countcart?>"; 
                    document.getElementById("countcartmobi").innerHTML = "<?php echo $countcart?>"; 
                       setInterval(function(){document.getElementById("hideadd").setAttribute("style","display:none");
                       
                             
                       }, 2000);
                   </script>
				    <?php
                             }else {
                                 echo 'failed';
                             }
                              
                      }       
                            
				   
				}
				?>

<?php 
if (isset($_POST['txtsearch'])) {
    $userid =$_SESSION['user_id'] ;
			   
                         $cartcount = "select * from cart where user_id = '$userid'";
                            $resultcart = mysqli_query($con,$cartcount); // run query
                          
                             $countcart= mysqli_num_rows($resultcart);
                                  ?>
                                  
                    
                   <script>
                   document.getElementById("countcart").innerHTML = "<?php echo $countcart?>"; 
                    document.getElementById("countcartmobi").innerHTML = "<?php echo $countcart?>"; 
                    
                   </script>
                   <?php
    $search = $_POST['txtsearch'];
     $sql = "SELECT * FROM `product` WHERE concat (`name`,`prod_id`) like '%$search%'   ";
      $result = mysqli_query($con,$sql); // run query
                $count= mysqli_num_rows($result); // to count if necessary
                        if ($count >=1) {
             	//while($row = mysqli_fetch_array($result)){} is where we output all the data in database
             	?>
				   
                
                    <h4><br><br><br>Related Search : <?php echo $search?> <br> </h4>
                    <br><br><br>
                    <hr>
                    <script>
                         document.getElementById("focuser").setAttribute("value","<?php echo $search?>");  
                    </script>
                <?php
                 while($row = mysqli_fetch_array($result)){
                      $image = $row['photo'];
                           if ($image == 'th.jfif') {
                              $image_src ="../admin/".$image;
                          }else {
                            $image_src = "../admin/bin/Item_Images/".$image;  
                          }
                     ?>
                
                     <!--item-->	<div class="col-lg-4 col-md-6 col-6 mb-4">	
		<div class="card h-100">
			<a href="../product_view/index.php?productview&prod_id=<?php echo $row['prod_id']?>"><img class="card-img-top" height="250" src="<?php echo $image_src?>" alt=""></a>
              <div class="card-body">
                <h4 class="card-title">
                  <a href="../product_view/index.php?productview&prod_id=<?php echo $row['prod_id']?>" class="itemshover" style="text-transform: uppercase;"><?php echo $row['name']?></a>
                </h4>
                <hr>
                <h5 >₱<strong><?php echo $row['price']?></strong></h5>
                <i style="color:gold" class="fas fa-star"></i>
                <i style="color:gold" class="fas fa-star"></i>
                <i style="color:gold" class="fas fa-star"></i>
                <i style="color:gold" class="fas fa-star"></i>
                <i style="color:gold" class="fas fa-star"></i>
                
                <p class="card-text"><?php echo $row['description']?></p>
              </div>
              <div class="card-footer">
						
				<form method="post"   onsubmit='return false' >
				   
				<button type="submit"  class="btn btn-outline-dark addcart" data-userid="<?php echo $userid?>"  data-pid="<?php echo $row['prod_id']?>"  ><i class="fa fa-cart-plus" aria-hidden="true"></i></i> Add to cart</button>
				</form>
              </div>
		</div>
		</div>
                    <?php
                     
                 } }else {
                     $userid =$_SESSION['user_id'] ;
			    
                     
                    $cartcount = "select * from cart where user_id = '$userid'";
                            $resultcart = mysqli_query($con,$cartcount); // run query
                          
                             $countcart= mysqli_num_rows($resultcart);
                                  ?>
                                  
                    
                   <script>
                   document.getElementById("countcart").innerHTML = "<?php echo $countcart?>"; 
                    document.getElementById("countcartmobi").innerHTML = "<?php echo $countcart?>"; 
                    
                   </script>
                
                    <h4 ><br><br><br>Related Search NOT Found : <span style="color:red"><?php echo $search?> </span>   </h4>
                    <br><br><br>
                    <hr>
                     <script>
                         document.getElementById("focuser").setAttribute("value","<?php echo $search?>");  
                    </script>
                    
                <?php  
                 }
}else
              if (isset($_GET['categorized'])) {
                $cate = $_GET['categorized'];
                ?>
                
                    <h4 style="text-align:center;text-transform:capitalize; margin-top:30px;"><br><br><?php echo $cate?> Category <br> </h4>
                    <br>
                    <div class="container">
                        
                    
                   <form method="post" action ="index.php?categorized=<?php echo $cate?>">
                   <div class="btn-group hanhighlowcataction" role="group" aria-label="Basic example">
                      <!-- <button type="button" class="btn btn-secondary"><i class="far fa-plus-square"></i> Newly Added</button>-->
                      <h4><button type="submit" name="highpr" class="btn btn-light btnon"><i class="fas fa-sort-amount-up"></i> To Highest Price</button></h4>
                      <h4><button type="submit" name="lowpr" class="btn btn-light btnon"><i class="fas fa-sort-amount-down"></i> To Lowest Price</button></h4>
                    
                    </div>
                    </form>
                    </div>
                    <br><br>
                    <hr>
                    
                <?php   
                        $getcategory = "select * from category";
                         $resultget = mysqli_query($con,$getcategory); 
                          while($get = mysqli_fetch_array($resultget)){ 
                              $catname = $get['categoryname'];
                              if($catname == $cate) {
                                  $catid = $get['cat_id'];
                               
                               
                              }
                              
                          }
                          if (isset($_POST['highpr'])){
                 
                      
               $sql = " select  * from product where cat_id = '$catid'  Order by price desc";
                $result = mysqli_query($con,$sql); // run query
                $count= mysqli_num_rows($result); // to count if necessary
            
             	//while($row = mysqli_fetch_array($result)){} is where we output all the data in database
                 while($row = mysqli_fetch_array($result)){
                        $image = $row['photo'];
                           if ($image == 'th.jfif') {
                              $image_src ="../admin/".$image;
                          }else {
                            $image_src = "../admin/bin/Item_Images/".$image;  
                          }
                    ?>
                    <!--item-->	<div class="col-lg-3 col-md-6 col-6 mb-4">	
		<div class="card h-100">
			<a href="../product_view/index.php?productview&prod_id=<?php echo $row['prod_id']?>"><img class="card-img-top" height="250" src="<?php echo $image_src?>" alt=""></a>
              <div class="card-body">
                <h4 class="card-title">
                  <a href="../product_view/index.php?productview&prod_id=<?php echo $row['prod_id']?>" class="itemshover" style="text-transform: uppercase;"><?php echo $row['name']?></a>
                </h4>
                <hr>
                <h5 >₱<strong><?php echo $row['price']?></strong></h5>
                <i style="color:gold" class="fas fa-star"></i>
                <i style="color:gold" class="fas fa-star"></i>
                <i style="color:gold" class="fas fa-star"></i>
                <i style="color:gold" class="fas fa-star"></i>
                <i style="color:gold" class="fas fa-star"></i>
                
                <p class="card-text"><?php echo $row['description']?></p>
              </div>
              <div class="card-footer">
						
		<form method="post"   onsubmit='return false' >
				   
				<button type="submit"  class="btn btn-outline-dark addcart" data-userid="<?php echo $userid?>"  data-pid="<?php echo $row['prod_id']?>"  ><i class="fa fa-cart-plus" aria-hidden="true"></i></i> Add to cart</button>
				</form>
              </div>
		</div>
		</div>
                    <?php
            }
            }else if (isset($_POST['lowpr'])){
               
                            
               $sql = " select  * from product where cat_id = '$catid'  Order by price asc";
                $result = mysqli_query($con,$sql); // run query
                $count= mysqli_num_rows($result); // to count if necessary
            
             	//while($row = mysqli_fetch_array($result)){} is where we output all the data in database
                 while($row = mysqli_fetch_array($result)){
                        $image = $row['photo'];
                          if ($image == 'th.jfif') {
                              $image_src ="../admin/".$image;
                          }else {
                            $image_src = "../admin/bin/Item_Images/".$image;  
                          }
                    ?>
                    <!--item-->	<div class="col-lg-3 col-md-6 col-6 mb-4">	
		<div class="card h-100">
			<a href="../product_view/index.php?productview&prod_id=<?php echo $row['prod_id']?>"><img class="card-img-top" height="250" src="<?php echo $image_src?>" alt=""></a>
              <div class="card-body">
                <h4 class="card-title">
                  <a href="../product_view/index.php?productview&prod_id=<?php echo $row['prod_id']?>" class="itemshover" style="text-transform: uppercase;"><?php echo $row['name']?></a>
                </h4>
                <hr>
                <h5 >₱<strong><?php echo $row['price']?></strong></h5>
                <i style="color:gold" class="fas fa-star"></i>
                <i style="color:gold" class="fas fa-star"></i>
                <i style="color:gold" class="fas fa-star"></i>
                <i style="color:gold" class="fas fa-star"></i>
                <i style="color:gold" class="fas fa-star"></i>
                
                <p class="card-text"><?php echo $row['description']?></p>
              </div>
              <div class="card-footer">
						
		<form method="post"   onsubmit='return false' >
				   
				<button type="submit"  class="btn btn-outline-dark addcart" data-userid="<?php echo $userid?>"  data-pid="<?php echo $row['prod_id']?>"  ><i class="fa fa-cart-plus" aria-hidden="true"></i></i> Add to cart</button>
				</form>
              </div>
		</div>
		</div>
                    <?php
            }
            }
            else {
                 $sql = " select  * from product where cat_id = '$catid'";
                $result = mysqli_query($con,$sql); // run query
                $count= mysqli_num_rows($result); // to count if necessary
            
             	//while($row = mysqli_fetch_array($result)){} is where we output all the data in database
                 while($row = mysqli_fetch_array($result)){
                        $image = $row['photo'];
                          if ($image == 'th.jfif') {
                              $image_src ="../admin/".$image;
                          }else {
                            $image_src = "../admin/bin/Item_Images/".$image;  
                          }
                    ?>
                    <!--item-->	<div class="col-lg-3 col-md-6 col-6 mb-4">	
		<div class="card h-100">
			<a href="../product_view/index.php?productview&prod_id=<?php echo $row['prod_id']?>"><img class="card-img-top" height="250" src="<?php echo $image_src?>" alt=""></a>
              <div class="card-body">
                <h4 class="card-title">
                  <a href="../product_view/index.php?productview&prod_id=<?php echo $row['prod_id']?>" class="itemshover" style="text-transform: uppercase;"><?php echo $row['name']?></a>
                </h4>
                <hr>
                <h5 >₱<strong><?php echo $row['price']?></strong></h5>
                <i style="color:gold" class="fas fa-star"></i>
                <i style="color:gold" class="fas fa-star"></i>
                <i style="color:gold" class="fas fa-star"></i>
                <i style="color:gold" class="fas fa-star"></i>
                <i style="color:gold" class="fas fa-star"></i>
                
                <p class="card-text"><?php echo $row['description']?></p>
              </div>
              <div class="card-footer">
						
		<form method="post"   onsubmit='return false' >
				   
				<button type="submit"  class="btn btn-outline-dark addcart" data-userid="<?php echo $userid?>"  data-pid="<?php echo $row['prod_id']?>"  ><i class="fa fa-cart-plus" aria-hidden="true"></i></i> Add to cart</button>
				</form>
              </div>
		</div>
		</div>
                    <?php
                 }
           
            }
                         
                            
             
  
            }else if (isset($_GET['categorizedbynewlyadded'])){
                ?>
                
                    <h4 style="text-align:center;text-transform:capitalize; margin-top:30px;"><br><br> <i class="far fa-plus-square"></i> Newly Added <br> </h4>
                    <br><br><br>
                    <hr>
                    
                <?php   
                      
                         
                            
               $sql = " select  * from product Order by modified desc limit 10";
                $result = mysqli_query($con,$sql); // run query
                $count= mysqli_num_rows($result); // to count if necessary
            
             	//while($row = mysqli_fetch_array($result)){} is where we output all the data in database
                 while($row = mysqli_fetch_array($result)){
                        $image = $row['photo'];
                          if ($image == 'th.jfif') {
                              $image_src ="../admin/".$image;
                          }else {
                            $image_src = "../admin/bin/Item_Images/".$image;  
                          }
                    ?>
                    <!--item-->	<div class="col-lg-3 col-md-6 col-6 mb-4">	
		<div class="card h-100">
			<a href="../product_view/index.php?productview&prod_id=<?php echo $row['prod_id']?>"><img class="card-img-top" height="250" src="<?php echo $image_src?>" alt=""></a>
              <div class="card-body">
                <h4 class="card-title">
                  <a href="../product_view/index.php?productview&prod_id=<?php echo $row['prod_id']?>" class="itemshover" style="text-transform: uppercase;"><?php echo $row['name']?></a>
                </h4>
                <hr>
                <h5 >₱<strong><?php echo $row['price']?></strong></h5>
                <i style="color:gold" class="fas fa-star"></i>
                <i style="color:gold" class="fas fa-star"></i>
                <i style="color:gold" class="fas fa-star"></i>
                <i style="color:gold" class="fas fa-star"></i>
                <i style="color:gold" class="fas fa-star"></i>
                
                <p class="card-text"><?php echo $row['description']?></p>
              </div>
              <div class="card-footer">
						
			<form method="post"   onsubmit='return false' >
				   
				<button type="submit"  class="btn btn-outline-dark addcart" data-userid="<?php echo $userid?>"  data-pid="<?php echo $row['prod_id']?>"  ><i class="fa fa-cart-plus" aria-hidden="true"></i></i> Add to cart</button>
				</form>
              </div>
		</div>
		</div>
                    <?php
            }
            }else if (isset($_GET['categorizedbyhighprice'])){
                ?>
                
                    <h4 style="text-align:center;text-transform:capitalize; margin-top:30px;"><br><br> <i class="fas fa-sort-amount-up"></i> To Highest Price <br> </h4>
                    <br><br><br>
                    <hr>
                    
                <?php   
                      
                         
                            
               $sql = " select  * from product Order by price desc";
                $result = mysqli_query($con,$sql); // run query
                $count= mysqli_num_rows($result); // to count if necessary
            
             	//while($row = mysqli_fetch_array($result)){} is where we output all the data in database
                 while($row = mysqli_fetch_array($result)){
                        $image = $row['photo'];
                           if ($image == 'th.jfif') {
                              $image_src ="../admin/".$image;
                          }else {
                            $image_src = "../admin/bin/Item_Images/".$image;  
                          }
                    ?>
                    <!--item-->	<div class="col-lg-3 col-md-6 col-6 mb-4">	
		<div class="card h-100">
			<a href="../product_view/index.php?productview&prod_id=<?php echo $row['prod_id']?>"><img class="card-img-top" height="250" src="<?php echo $image_src?>" alt=""></a>
              <div class="card-body">
                <h4 class="card-title">
                  <a href="../product_view/index.php?productview&prod_id=<?php echo $row['prod_id']?>" class="itemshover" style="text-transform: uppercase;"><?php echo $row['name']?></a>
                </h4>
                <hr>
                <h5 >₱<strong><?php echo $row['price']?></strong></h5>
                <i style="color:gold" class="fas fa-star"></i>
                <i style="color:gold" class="fas fa-star"></i>
                <i style="color:gold" class="fas fa-star"></i>
                <i style="color:gold" class="fas fa-star"></i>
                <i style="color:gold" class="fas fa-star"></i>
                
                <p class="card-text"><?php echo $row['description']?></p>
              </div>
              <div class="card-footer">
						
		<form method="post"   onsubmit='return false' >
				   
				<button type="submit"  class="btn btn-outline-dark addcart" data-userid="<?php echo $userid?>"  data-pid="<?php echo $row['prod_id']?>"  ><i class="fa fa-cart-plus" aria-hidden="true"></i></i> Add to cart</button>
				</form>
              </div>
		</div>
		</div>
                    <?php
            }
            }else if (isset($_GET['categorizedbylowprice'])){
                ?>
                
                    <h4 style="text-align:center;text-transform:capitalize; margin-top:30px;"><br><br> <i class="fas fa-sort-amount-down"></i> To Lowest Price <br> </h4>
                    <br><br><br>
                    <hr>
                    
                <?php   
                      
                         
                            
               $sql = " select  * from product Order by price asc";
                $result = mysqli_query($con,$sql); // run query
                $count= mysqli_num_rows($result); // to count if necessary
            
             	//while($row = mysqli_fetch_array($result)){} is where we output all the data in database
                 while($row = mysqli_fetch_array($result)){
                        $image = $row['photo'];
                           if ($image == 'th.jfif') {
                              $image_src ="../admin/".$image;
                          }else {
                            $image_src = "../admin/bin/Item_Images/".$image;  
                          }
                    ?>
                    <!--item-->	<div class="col-lg-3 col-md-6 col-6 mb-4">	
		<div class="card h-100">
			<a href="../product_view/index.php?productview&prod_id=<?php echo $row['prod_id']?>"><img class="card-img-top" height="250" src="<?php echo $image_src?>" alt=""></a>
              <div class="card-body">
                <h4 class="card-title">
                  <a href="../product_view/index.php?productview&prod_id=<?php echo $row['prod_id']?>" class="itemshover" style="text-transform: uppercase;"><?php echo $row['name']?></a>
                </h4>
                <hr>
                <h5 >₱<strong><?php echo $row['price']?></strong></h5>
                <i style="color:gold" class="fas fa-star"></i>
                <i style="color:gold" class="fas fa-star"></i>
                <i style="color:gold" class="fas fa-star"></i>
                <i style="color:gold" class="fas fa-star"></i>
                <i style="color:gold" class="fas fa-star"></i>
                
                <p class="card-text"><?php echo $row['description']?></p>
              </div>
              <div class="card-footer">
						
		<form method="post"   onsubmit='return false' >
				   
				<button type="submit"  class="btn btn-outline-dark addcart" data-userid="<?php echo $userid?>"  data-pid="<?php echo $row['prod_id']?>"  ><i class="fa fa-cart-plus" aria-hidden="true"></i></i> Add to cart</button>
				</form>
              </div>
		</div>
		</div>
                    <?php
            }
            }
            else {
               
                
                 $sql = " select * from product";
                $result = mysqli_query($con,$sql); // run query
                $count= mysqli_num_rows($result); // to count if necessary
            
              $cartcount = "select * from cart where user_id = '$userid'";
                            $resultcart = mysqli_query($con,$cartcount); // run query
                          
                             $countcart= mysqli_num_rows($resultcart);
                                  ?>
                                  
                    
                   <script>
                   document.getElementById("countcart").innerHTML = "<?php echo $countcart?>"; 
                    document.getElementById("countcartmobi").innerHTML = "<?php echo $countcart?>"; 
                    
                   </script>
                   <?php
             	//while($row = mysqli_fetch_array($result)){} is where we output all the data in database
                 while($row = mysqli_fetch_array($result)){
                        $image = $row['photo'];
                           if ($image == 'th.jfif') {
                              $image_src ="../admin/".$image;
                          }else {
                            $image_src = "../admin/bin/Item_Images/".$image;  
                          }
                    ?>
                    <!--item-->	<div class="col-lg-3 col-md-6 col-6 mb-4">	
		<div class="card h-100">
			<a href="../product_view/index.php?productview&prod_id=<?php echo $row['prod_id']?>"><img class="card-img-top" height="250" src="<?php echo $image_src?>" alt=""></a>
              <div class="card-body">
                <h4 class="card-title">
                  <a href="../product_view/index.php?productview&prod_id=<?php echo $row['prod_id']?>" class="itemshover" style="text-transform: uppercase;"><?php echo $row['name']?></a>
                </h4>
                <h5>₱<?php echo $row['price']?></h5>
                <i style="color:gold" class="fas fa-star"></i>
                <i style="color:gold" class="fas fa-star"></i>
                <i style="color:gold" class="fas fa-star"></i>
                <i style="color:gold" class="fas fa-star"></i>
                <i style="color:gold" class="fas fa-star"></i>
                
                <p class="card-text"><?php echo $row['description']?></p>
              </div>
              <div class="card-footer">
						
				<form method="post"   onsubmit='return false' >
				   
				<button type="submit"  class="btn btn-outline-dark addcart" data-userid="<?php echo $userid?>"  data-pid="<?php echo $row['prod_id']?>"  ><i class="fa fa-cart-plus" aria-hidden="true"></i></i> Add to cart</button>
				</form>
              </div>
		</div>
		</div>
                    <?php
                 }
          

            }

   
?>

		
			
</div>
</div>

<script
  src="jquery2.js"></script>
<script>
     $(document).ready(function() {
  //# for id , . for classes
   
    $('.addcart').click(function(e) {
         var prod_id = $(this).data("pid");
          var user_id = $(this).data("userid");
          
        
   e.preventDefault();
   $.ajax({
			url	:	"addcart.php",
			method:	"POST",
			data	:	{addtocart:1,prod_id:prod_id,user_id:user_id},
			success	:	function(data){
			   
			$(".newcart").html(data);
		       
		
			}
		})
        })
       });
</script>

<style>
.fab { 
color:#333333;
}

.fab:hover { 
color:#538FCB;
}
</style>

<!-- FOOTER --> 
<footer>
	<div class="row">
 
		<div class="col-md-12">
			<h4><a href="../terms-of-service" target="_blank" class="termsofservice">Terms of Service</a> ┃ <a href="../aboutus" target="_blank" class="termsofservice">About Us</a></h4>
			<hr>
			<h6>Email us at hantechspprt@gmail.com</h6>
			<h4>Eldreanne Online Ordering and Inventory System © 2021</h4>
			<h6>
			Warren Josiah de Guzman <a href="https://www.facebook.com/warrenjosiah.deguzman.7"><i class="fab fa-facebook"></i></a> I 
			Nadeer Mukaram <a href="https://www.facebook.com/nzro3"><i class="fab fa-facebook"></i></a> I 
			Ryan Peñosa Camonias <a href="https://www.facebook.com/ryan.camonias"><i class="fab fa-facebook"></i></a> I 
			Reenjay Caimor <a href="https://www.facebook.com/reenjay.caimor"><i class="fab fa-facebook"></i></a> I 
			Kerzen Dalman Lañojan <a href="https://www.facebook.com/kerzen.lanojan.9"><i class="fab fa-facebook"></i></a>
			</h6>	
		</div>
	
	</div>	
</footer>

<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js" integrity="sha512-XKa9Hemdy1Ui3KSGgJdgMyYlUg1gM+QhL6cnlyTe2qzMCYm4nAZ1PsVerQzTTXzonUR+dmswHqgJPuwCq1MaAg==" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="../js/nav.js"></script>


<script>

function openNav() {
  document.getElementById("mySidebar").style.width = "290px";
}

function closeNav() {
  document.getElementById("mySidebar").style.width = "0";
}

function clickdirect() {
    window.location.href="../cart";
}
function logout() {
    window.location.href="../signin/logout.php";
}
</script>

</body>

</html> 
	    <?php   
	}else {///////////////////////////////////////////////////////////////////////////////////Default
	    	?>
	<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="icon" href="../img/tabicon.png" type="image/gif" sizes="16x16">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css"> <!-- /.carousel-indicators -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css">
<link rel="stylesheet" type="text/css" href="../css/homepage.css?v=4735" />
<link rel="stylesheet" type="text/css" href="../css/categories.css?v=3810" />

<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Titillium+Web:wght@600&display=swap" rel="stylesheet">

<script src="https://kit.fontawesome.com/129b086bc9.js" crossorigin="anonymous"></script>

</head>
<title>Categories</title>
<?php 
    include '../admin/connection/connect.php';
?>
</head>

<body style="font-family: 'Titillium Web', sans-serif;">


<header>

<nav>

    <div class="logo ">
        <a href="../home"><img src="../img/logo_alt_alt_ok.png" alt="logo"></a>
	</div>


    <ul class="nav-links">
        <li><a href="../home"><span style="font-size: 1.5rem;"><span style="color: #333333;"><i class="fas fa-house-user"></i></span></span> HOME</a></li>
        <li><a href="../category"><span style="font-size: 1.5rem;"><span style="color: #333333;"><i class="fas fa-align-left"></i></span></span> CATEGORIES</a></li>
        <li><a href="../signin"><span style="font-size: 1.5rem;"><span style="color: #333333;"><i class="fas fa-cart-arrow-down"></i></span></span> ORDERS</a></li>
        <li><a href="../signin"><span style="font-size: 1.5rem;"><span style="color: #333333;"><i class="fas fa-user-edit"></i></span></span> SIGN IN</a></li>
		<div class="dropdown">
			<button   class="btn btn-dark" onclick ='window.location.href="../cart/" ' style="width: 84px; background-color:#333333"><i class="fa fa-shopping-cart" aria-hidden="true"></i> <span class="badge badge-light" id="mycart" style="background-color: white;color: black;padding: .35em .65em;">
			      
			    
			</span></button>
		</div>		
    </ul>
    <div class="burger">
        <div class="line1"></div>
        <div class="line2"></div>
        <div class="line3"></div>
    </div>
	
</nav>
	

</header>


		

<div class="main">
    	<a href="../signin" class="btn btn-dark pota" style="width: 84px;float:right"><i class="fa fa-shopping-cart" aria-hidden="true"></i><span class="badge badge-light" style="background-color: white;color: black;padding: .35em .65em;">0</span></a>
	<form method="post" >		
  <div class="input-group">
    <input type="text" class="form-control texttt" name="txtsearch" id="focuser" placeholder="Search"   onclick="this.select()">
    <div class="input-group-append">
      <button class="btn btn-dark" type="submit" style="z-index:0;">
        <i class="fa fa-search"></i>
      </button>
    </div>
  </div>
  </form>
</div>


<div id="main">
<button class="openbtn_for_categoryaction" style="z-index:1;" onclick="openNav()"><img class="d-block img-fluid" src="../img/openbtnoone.png" alt=""></button>  


<!-- Carousel -->

</div>
</div>






<!-- Font Awesome Version 5.15.2 -->
<div id="mySidebar" class="sidebar">
<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>

	<hr>
		<a href="../category"><i class="fas fa-bars"></i> All</a><hr class="hrcate">
		 <a href="../category-action/index.php?categorizedbynewlyadded"><i class="far fa-plus-square"></i>Newly Added</a><hr class="hrcate">
			<a href="../category-action/index.php?categorizedbyhighprice"><i class="fas fa-sort-amount-up"></i>To Highest Price</a><hr class="hrcate">
			<a href="../category-action/index.php?categorizedbylowprice"><i class="fas fa-sort-amount-down"></i>To Lowest Price</a><hr class="hrcate">
		<?php 
        		$sql = " select * from category  ";
                $result = mysqli_query($con,$sql); // run query
              
          
             	//while($row = mysqli_fetch_array($result)){} is where we output all the data in database
                 while($row = mysqli_fetch_array($result)){ 
                     ?>
                     	<a style="text-transform:capitalize" href="../category-action/index.php?categorized=<?php echo $row['categoryname']?>"> <?php echo $row['categoryname']?> </a><hr class="hrcate">
                     <?php
                 }
                 
 ?>


	<div class="sblogo"><img src="../img/hantechalternatelogobb.png" class="rotate" alt="logo"></div>
</div>






<div class="items">
<div class="row">

<?php 
if (isset($_POST['txtsearch'])) {
    $search = $_POST['txtsearch'];
    $userids= $_SESSION['temp'];
     $sql = "SELECT * FROM `product` WHERE concat (`name`,`prod_id`) like '%$search%'   ";
      $result = mysqli_query($con,$sql); // run query
                $count= mysqli_num_rows($result); // to count if necessary
                        if ($count >=1) {
             	//while($row = mysqli_fetch_array($result)){} is where we output all the data in database
             	?>
                
                    <h4><br><br><br>Related Search : <?php echo $search?> <br> </h4>
                    <br><br><br>
                    <hr>
                    <script>
                         document.getElementById("focuser").setAttribute("value","<?php echo $search?>");  
                    </script>
                <?php
                 while($row = mysqli_fetch_array($result)){
                     $prodid = $row['prod_id'];
                      $image = $row['photo'];
                           if ($image == 'th.jfif') {
                              $image_src ="../admin/".$image;
                          }else {
                            $image_src = "../admin/bin/Item_Images/".$image;  
                          }
                     ?>
                
                     <!--item-->	<div class="col-lg-4 col-md-6 col-6 mb-4">	
		<div class="card h-100">
			<a href="../product_view/index.php?productview&prod_id=<?php echo $row['prod_id']?>"><img class="card-img-top" height="250" src="<?php echo $image_src?>" alt=""></a>
              <div class="card-body">
                <h4 class="card-title">
                  <a href="../product_view/index.php?productview&prod_id=<?php echo $row['prod_id']?>" class="itemshover" style="text-transform: uppercase;"><?php echo $row['name']?></a>
                </h4>
                <hr>
                <h5 >₱<strong><?php echo $row['price']?></strong></h5>
                <i style="color:gold" class="fas fa-star"></i>
                <i style="color:gold" class="fas fa-star"></i>
                <i style="color:gold" class="fas fa-star"></i>
                <i style="color:gold" class="fas fa-star"></i>
                <i style="color:gold" class="fas fa-star"></i>
                
                <p class="card-text"><?php echo $row['description']?></p>
              </div>
              <div class="card-footer">
						
				<a  class="btn btn-outline-dark addcart" data-pid="<?php echo $prodid?>" data-userid="<?php echo $userids ?>" ><i class="fa fa-cart-plus" aria-hidden="true"></i></i> Add to cart</a>
              </div>
		</div>
		</div>
                    <?php
                     
                 } }else {
                   ?>
                
                    <h4 ><br><br><br>Related Search NOT Found : <span style="color:red"><?php echo $search?> </span>   </h4>
                    <br><br><br>
                    <hr>
                    
                <?php  
                 }
}else
            if (isset($_GET['categorized'])) {
                $cate = $_GET['categorized'];
                ?>
                
                    <h4 style="text-align:center;text-transform:capitalize; margin-top:30px;"><br><br><?php echo $cate?> Category <br> </h4>
                    <br>
                    <div class="container">
                        
                    
                   <form method="post" action ="index.php?categorized=<?php echo $cate?>">
                   <div class="btn-group hanhighlowcataction" role="group" aria-label="Basic example">
                      <!-- <button type="button" class="btn btn-secondary"><i class="far fa-plus-square"></i> Newly Added</button>-->
                      <h4><button type="submit" name="highpr" class="btn btn-light btnon"><i class="fas fa-sort-amount-up"></i> To Highest Price</button></h4>
                      <h4><button type="submit" name="lowpr" class="btn btn-light btnon"><i class="fas fa-sort-amount-down"></i> To Lowest Price</button></h4>
                    
                    </div>
                    </form>
                    </div>
                    <br><br>
                    <hr>
                    
                <?php   
                        $getcategory = "select * from category";
                         $resultget = mysqli_query($con,$getcategory); 
                          while($get = mysqli_fetch_array($resultget)){ 
                              $catname = $get['categoryname'];
                              if($catname == $cate) {
                                  $catid = $get['cat_id'];
                               
                               
                              }
                              
                          }
                          if (isset($_POST['highpr'])){
                 
                      $userids = $_SESSION['temp'];
               $sql = " select  * from product where cat_id = '$catid'  Order by price desc";
                $result = mysqli_query($con,$sql); // run query
                $count= mysqli_num_rows($result); // to count if necessary
            
             	//while($row = mysqli_fetch_array($result)){} is where we output all the data in database
                 while($row = mysqli_fetch_array($result)){
                     $prodid = $row['prod_id'];
                        $image = $row['photo'];
                           if ($image == 'th.jfif') {
                              $image_src ="../admin/".$image;
                          }else {
                            $image_src = "../admin/bin/Item_Images/".$image;  
                          }
                    ?>
                    <!--item-->	<div class="col-lg-3 col-md-6 col-6 mb-4">	
		<div class="card h-100">
			<a href="../product_view/index.php?productview&prod_id=<?php echo $row['prod_id']?>"><img class="card-img-top" height="250" src="<?php echo $image_src?>" alt=""></a>
              <div class="card-body">
                <h4 class="card-title">
                  <a href="../product_view/index.php?productview&prod_id=<?php echo $row['prod_id']?>" class="itemshover" style="text-transform: uppercase;"><?php echo $row['name']?></a>
                </h4>
                <hr>
                <h5 >₱<strong><?php echo $row['price']?></strong></h5>
                <i style="color:gold" class="fas fa-star"></i>
                <i style="color:gold" class="fas fa-star"></i>
                <i style="color:gold" class="fas fa-star"></i>
                <i style="color:gold" class="fas fa-star"></i>
                <i style="color:gold" class="fas fa-star"></i>
                
                <p class="card-text"><?php echo $row['description']?></p>
              </div>
              <div class="card-footer">
						
		<a  class="btn btn-outline-dark addcart" data-pid="<?php echo $prodid?>" data-userid="<?php echo $userids ?>" ><i class="fa fa-cart-plus" aria-hidden="true"></i></i> Add to cart</a>
              </div>
		</div>
		</div>
                    <?php
            }
            }else if (isset($_POST['lowpr'])){
               
                   $userids = $_SESSION['temp'];      
               $sql = " select  * from product where cat_id = '$catid'  Order by price asc";
                $result = mysqli_query($con,$sql); // run query
                $count= mysqli_num_rows($result); // to count if necessary
            
             	//while($row = mysqli_fetch_array($result)){} is where we output all the data in database
                 while($row = mysqli_fetch_array($result)){
                     $prodid = $row['prod_id'];
                        $image = $row['photo'];
                           if ($image == 'th.jfif') {
                              $image_src ="../admin/".$image;
                          }else {
                            $image_src = "../admin/bin/Item_Images/".$image;  
                          }
                    ?>
                    <!--item-->	<div class="col-lg-3 col-md-6 col-6 mb-4">	
		<div class="card h-100">
			<a href="../product_view/index.php?productview&prod_id=<?php echo $row['prod_id']?>"><img class="card-img-top" height="250" src="<?php echo $image_src?>" alt=""></a>
              <div class="card-body">
                <h4 class="card-title">
                  <a href="../product_view/index.php?productview&prod_id=<?php echo $row['prod_id']?>" class="itemshover" style="text-transform: uppercase;"><?php echo $row['name']?></a>
                </h4>
                <hr>
                <h5 >₱<strong><?php echo $row['price']?></strong></h5>
                <i style="color:gold" class="fas fa-star"></i>
                <i style="color:gold" class="fas fa-star"></i>
                <i style="color:gold" class="fas fa-star"></i>
                <i style="color:gold" class="fas fa-star"></i>
                <i style="color:gold" class="fas fa-star"></i>
                
                <p class="card-text"><?php echo $row['description']?></p>
              </div>
              <div class="card-footer">
						
			<a  class="btn btn-outline-dark addcart" data-pid="<?php echo $prodid?>" data-userid="<?php echo $userids ?>" ><i class="fa fa-cart-plus" aria-hidden="true"></i></i> Add to cart</a>
              </div>
		</div>
		</div>
                    <?php
            }
            }
            else {
                $userids = $_SESSION['temp'];
                 $sql = " select  * from product where cat_id = '$catid'";
                $result = mysqli_query($con,$sql); // run query
                $count= mysqli_num_rows($result); // to count if necessary
            
             	//while($row = mysqli_fetch_array($result)){} is where we output all the data in database
                 while($row = mysqli_fetch_array($result)){
                     $prodid = $row['prod_id'];
                        $image = $row['photo'];
                            if ($image == 'th.jfif') {
                              $image_src ="../admin/".$image;
                          }else {
                            $image_src = "../admin/bin/Item_Images/".$image;  
                          }
                    ?>
                    <!--item-->	<div class="col-lg-3 col-md-6 col-6 mb-4">	
		<div class="card h-100">
			<a href="../product_view/index.php?productview&prod_id=<?php echo $row['prod_id']?>"><img class="card-img-top" height="250" src="<?php echo $image_src?>" alt=""></a>
              <div class="card-body">
                <h4 class="card-title">
                  <a href="../product_view/index.php?productview&prod_id=<?php echo $row['prod_id']?>" class="itemshover" style="text-transform: uppercase;"><?php echo $row['name']?></a>
                </h4>
                <hr>
                <h5 >₱<strong><?php echo $row['price']?></strong></h5>
                <i style="color:gold" class="fas fa-star"></i>
                <i style="color:gold" class="fas fa-star"></i>
                <i style="color:gold" class="fas fa-star"></i>
                <i style="color:gold" class="fas fa-star"></i>
                <i style="color:gold" class="fas fa-star"></i>
                
                <p class="card-text"><?php echo $row['description']?></p>
              </div>
              <div class="card-footer">
						
			<a  class="btn btn-outline-dark addcart" data-pid="<?php echo $prodid?>" data-userid="<?php echo $userids ?>" ><i class="fa fa-cart-plus" aria-hidden="true"></i></i> Add to cart</a>
              </div>
		</div>
		</div>
                    <?php
                 }
           
            }
                         
                            
             
  
            }else if (isset($_GET['categorizedbynewlyadded'])){
                ?>
                
                    <h4 style="text-align:center;text-transform:capitalize; margin-top:30px;"><br><br> <i class="far fa-plus-square"></i> Newly Added <br> </h4>
                    <br><br><br>
                    <hr>
                    
                <?php   
                      
                 $userids = $_SESSION['temp'];        
                            
               $sql = " select  * from product Order by modified desc limit 10";
                $result = mysqli_query($con,$sql); // run query
                $count= mysqli_num_rows($result); // to count if necessary
            
             	//while($row = mysqli_fetch_array($result)){} is where we output all the data in database
                 while($row = mysqli_fetch_array($result)){
                     $prodid = $row['prod_id'];
                        $image = $row['photo'];
                            if ($image == 'th.jfif') {
                              $image_src ="../admin/".$image;
                          }else {
                            $image_src = "../admin/bin/Item_Images/".$image;  
                          }
                    ?>
                    <!--item-->	<div class="col-lg-3 col-md-6 col-6 mb-4">	
		<div class="card h-100">
			<a href="../product_view/index.php?productview&prod_id=<?php echo $row['prod_id']?>"><img class="card-img-top" height="250" src="<?php echo $image_src?>" alt=""></a>
              <div class="card-body">
                <h4 class="card-title">
                  <a href="../product_view/index.php?productview&prod_id=<?php echo $row['prod_id']?>" class="itemshover" style="text-transform: uppercase;"><?php echo $row['name']?></a>
                </h4>
                <hr>
                <h5 >₱<strong><?php echo $row['price']?></strong></h5>
                <i style="color:gold" class="fas fa-star"></i>
                <i style="color:gold" class="fas fa-star"></i>
                <i style="color:gold" class="fas fa-star"></i>
                <i style="color:gold" class="fas fa-star"></i>
                <i style="color:gold" class="fas fa-star"></i>
                
                <p class="card-text"><?php echo $row['description']?></p>
              </div>
              <div class="card-footer">
						
					<a  class="btn btn-outline-dark addcart" data-pid="<?php echo $prodid?>" data-userid="<?php echo $userids ?>" ><i class="fa fa-cart-plus" aria-hidden="true"></i></i> Add to cart</a>
              </div>
		</div>
		</div>
                    <?php
            }
            }else if (isset($_GET['categorizedbyhighprice'])){
                ?>
                
                    <h4 style="text-align:center;text-transform:capitalize; margin-top:30px;"><br><br> <i class="fas fa-sort-amount-up"></i> To Highest Price <br> </h4>
                    <br><br><br>
                    <hr>
                    
                <?php   
                      
                         
                  $userids = $_SESSION['temp'];          
               $sql = " select  * from product Order by price desc";
                $result = mysqli_query($con,$sql); // run query
                $count= mysqli_num_rows($result); // to count if necessary
            
             	//while($row = mysqli_fetch_array($result)){} is where we output all the data in database
                 while($row = mysqli_fetch_array($result)){
                     $prodid = $row['prod_id'];
                        $image = $row['photo'];
                           if ($image == 'th.jfif') {
                              $image_src ="../admin/".$image;
                          }else {
                            $image_src = "../admin/bin/Item_Images/".$image;  
                          }
                    ?>
                    <!--item-->	<div class="col-lg-3 col-md-6 col-6 mb-4">	
		<div class="card h-100">
			<a href="../product_view/index.php?productview&prod_id=<?php echo $row['prod_id']?>"><img class="card-img-top" height="250" src="<?php echo $image_src?>" alt=""></a>
              <div class="card-body">
                <h4 class="card-title">
                  <a href="../product_view/index.php?productview&prod_id=<?php echo $row['prod_id']?>" class="itemshover" style="text-transform: uppercase;"><?php echo $row['name']?></a>
                </h4>
                <hr>
                <h5 >₱<strong><?php echo $row['price']?></strong></h5>
                <i style="color:gold" class="fas fa-star"></i>
                <i style="color:gold" class="fas fa-star"></i>
                <i style="color:gold" class="fas fa-star"></i>
                <i style="color:gold" class="fas fa-star"></i>
                <i style="color:gold" class="fas fa-star"></i>
                
                <p class="card-text"><?php echo $row['description']?></p>
              </div>
              <div class="card-footer">
						
			<a  class="btn btn-outline-dark addcart" data-pid="<?php echo $prodid?>" data-userid="<?php echo $userids ?>" ><i class="fa fa-cart-plus" aria-hidden="true"></i></i> Add to cart</a>
              </div>
		</div>
		</div>
                    <?php
            }
            }else if (isset($_GET['categorizedbylowprice'])){
                ?>
                
                    <h4 style="text-align:center;text-transform:capitalize; margin-top:30px;"><br><br> <i class="fas fa-sort-amount-down"></i> To Lowest Price <br> </h4>
                    <br><br><br>
                    <hr>
                    
                <?php   
                      
                 $userids= $_SESSION['temp'];
                 
                            
               $sql = " select  * from product Order by price asc";
                $result = mysqli_query($con,$sql); // run query
                $count= mysqli_num_rows($result); // to count if necessary
            
             	//while($row = mysqli_fetch_array($result)){} is where we output all the data in database
                 while($row = mysqli_fetch_array($result)){
                     $prodid = $row['prod_id'];
                        $image = $row['photo'];
                            if ($image == 'th.jfif') {
                              $image_src ="../admin/".$image;
                          }else {
                            $image_src = "../admin/bin/Item_Images/".$image;  
                          }
                    ?>
                    <!--item-->	<div class="col-lg-3 col-md-6 col-6 mb-4">	
		<div class="card h-100">
			<a href="../product_view/index.php?productview&prod_id=<?php echo $row['prod_id']?>"><img class="card-img-top" height="250" src="<?php echo $image_src?>" alt=""></a>
              <div class="card-body">
                <h4 class="card-title">
                  <a href="../product_view/index.php?productview&prod_id=<?php echo $row['prod_id']?>" class="itemshover" style="text-transform: uppercase;"><?php echo $row['name']?></a>
                </h4>
                <hr>
                <h5 >₱<strong><?php echo $row['price']?></strong></h5>
                <i style="color:gold" class="fas fa-star"></i>
                <i style="color:gold" class="fas fa-star"></i>
                <i style="color:gold" class="fas fa-star"></i>
                <i style="color:gold" class="fas fa-star"></i>
                <i style="color:gold" class="fas fa-star"></i>
                
                <p class="card-text"><?php echo $row['description']?></p>
              </div>
              <div class="card-footer">
						
			<a  class="btn btn-outline-dark addcart" data-pid="<?php echo $prodid?>" data-userid="<?php echo $userids ?>" ><i class="fa fa-cart-plus" aria-hidden="true"></i></i> Add to cart</a>
              </div>
		</div>
		</div>
                    <?php
            }
            }
            else {
                 $sql = " select * from product";
                $result = mysqli_query($con,$sql); // run query
                $count= mysqli_num_rows($result); // to count if necessary
            $userids = $_SESSION['temp'];
             	//while($row = mysqli_fetch_array($result)){} is where we output all the data in database
                 while($row = mysqli_fetch_array($result)){
                     $prodid= $row['prod_id'];
                        $image = $row['photo'];
                           if ($image == 'th.jfif') {
                              $image_src ="../admin/".$image;
                          }else {
                            $image_src = "../admin/bin/Item_Images/".$image;  
                          }
                    ?>
                    <!--item-->	<div class="col-lg-3 col-md-6 mb-4">	
		<div class="card h-100">
			<a href="../product_view/index.php?productview&prod_id=<?php echo $row['prod_id']?>"><img class="card-img-top" height="250" src="<?php echo $image_src?>" alt=""></a>
              <div class="card-body">
                <h4 class="card-title">
                  <a href="../product_view/index.php?productview&prod_id=<?php echo $row['prod_id']?>" class="itemshover" style="text-transform: uppercase;"><?php echo $row['name']?></a>
                </h4>
                <h5>₱<?php echo $row['price']?></h5>
                <i style="color:gold" class="fas fa-star"></i>
                <i style="color:gold" class="fas fa-star"></i>
                <i style="color:gold" class="fas fa-star"></i>
                <i style="color:gold" class="fas fa-star"></i>
                <i style="color:gold" class="fas fa-star"></i>
                
                <p class="card-text"><?php echo $row['description']?></p>
              </div>
              <div class="card-footer">
						
				<a  class="btn btn-outline-dark addcart" data-pid="<?php echo $prodid?>" data-userid="<?php echo $userids ?>" ><i class="fa fa-cart-plus" aria-hidden="true"></i></i> Add to cart</a>
              </div>
		</div>
		</div>
                    <?php
                 }
          

            }

   
?>

		
			
</div>
</div>
 <div class="newcarts"></div>
<?php
		      $userid = $_SESSION['temp'];
              $cartcount = "select * from cart where user_id = '$userid'";
                            $resultcart = mysqli_query($con,$cartcount); // run query
                          
                             $countcart= mysqli_num_rows($resultcart);
                             

		    ?>
        <script>
            document.getElementById('mycart').innerHTML= <?php echo $countcart; ?>;
        </script>
      <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  
        <script>
     $(document).ready(function() {
  //# for id , . for classes
   
    $('.addcart').click(function() {
                                        var prod_id = $(this).data("pid");
                                          var user_id = $(this).data("userid");
                                        var qty = '1';
            
                            $.ajax({
                                			url	:	"addcarts.php",
                                			method:	"POST",
                                			data	:	{addtocartnoid:1,prod_id:prod_id,user_id:user_id,qty:qty},
                                			success	:	function(data){
                                			 
                                		    $('.newcarts').html(data);
                                		       getcartcount();
                                		     
                                		  
                                			}
                                		})   
       
       })
       
       function getcartcount() {
                                  
                                             $.ajax({
                                			url	:	"addcarts.php",
                                			method:	"POST",
                                			data	:	{getcartss:1,},
                                			success	:	function(data){
                                			   
                                			document.getElementById('mycart').innerHTML= data;
                                		
                                			} 
                                         })
                                        
     }
     
     });
</script>

<style>
.fab { 
color:#333333;
}

.fab:hover { 
color:#538FCB;
}
</style>

<!-- FOOTER --> 
<footer>
	<div class="row">
 
		<div class="col-md-12">
			<h4><a href="../terms-of-service" target="_blank" class="termsofservice">Terms of Service</a> ┃ <a href="../aboutus" target="_blank" class="termsofservice">About Us</a></h4>
			<hr>
			<h6>Email us at hantechspprt@gmail.com</h6>
			<h4>Eldreanne Online Ordering and Inventory System © 2021</h4>
			<h6>
			Warren Josiah de Guzman <a href="https://www.facebook.com/warrenjosiah.deguzman.7"><i class="fab fa-facebook"></i></a> I 
			Nadeer Mukaram <a href="https://www.facebook.com/nzro3"><i class="fab fa-facebook"></i></a> I 
			Ryan Peñosa Camonias <a href="https://www.facebook.com/ryan.camonias"><i class="fab fa-facebook"></i></a> I 
			Reenjay Caimor <a href="https://www.facebook.com/reenjay.caimor"><i class="fab fa-facebook"></i></a> I 
			Kerzen Dalman Lañojan <a href="https://www.facebook.com/kerzen.lanojan.9"><i class="fab fa-facebook"></i></a>
			</h6>	
		</div>
	
	</div>	
</footer>

<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js" integrity="sha512-XKa9Hemdy1Ui3KSGgJdgMyYlUg1gM+QhL6cnlyTe2qzMCYm4nAZ1PsVerQzTTXzonUR+dmswHqgJPuwCq1MaAg==" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="../js/nav.js"></script>


<script>

function openNav() {
  document.getElementById("mySidebar").style.width = "290px";
}

function closeNav() {
  document.getElementById("mySidebar").style.width = "0";
}

function clickdirect() {
    window.location.href="../signin";
}
</script>

</body>

</html> 
	<?php
	}
?>
