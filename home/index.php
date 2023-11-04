<?php
	session_start();
include '../admin/connection/connect.php';

 if (isset($_SESSION['access_token'])) { ///////////////////////////////////////////////////////////////////////////// USER GMAIL ACCOUNT
	
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
<link rel="stylesheet" type="text/css" href="../css/homepage.css?v=4850" />
<link rel="stylesheet" type="text/css" href="../css/bestsellers.css?v=045" />

<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Titillium+Web:wght@600&display=swap" rel="stylesheet">

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.min.js"></script>

<title>Home</title>
</head>

<body style="background-image: url(../img/pexels-pixabay-3263101.jpg);
		 background-repeat: no-repeat;
		 background-size:100% 100%;
         font-family: 'Titillium Web', sans-serif;
">

<style>a {text-decoration:none}</style>

<header>

<!-- NAVIGATION BAR --> 
<nav>
    <div class="logo">
        <a href="../home"><img src="../img/logo_alt_alt_ok.png" alt="logo"></a>
	</div>
	

    <ul class="nav-links">
        <li><a href="../home"><span style="font-size: 1.5rem;"><span style="color: #333333;"><i class="fas fa-house-user"></i></span></span> HOME</a></li>
        <li><a href="../category"><span style="font-size: 1.5rem;"><span style="color: #333333;"><i class="fas fa-align-left"></i></span></span> CATEGORIES</a></li>
       <li><a href="../orders/orders.php"><span style="font-size: 1.5rem;"><span style="color: #333333;"><i class="fas fa-cart-arrow-down"></i></span></span> ORDERS</a></li>
       
       
        <li>
            <a href="#" data-toggle="modal" data-target="#myaccount"><span style="font-size: 1.5rem;"><span style="color: #333333;" ><i class="fas fa-user"></i></span></span> MY ACCOUNT</a>
            <!-- <a href="#" onclick="logout()"><span style="font-size: 1.2rem;"><span style="color: #333333;" data-toggle="modal" data-target="#myaccount"><i class="fas fa-sign-out-alt"></i></span></span> My Account</a>-->
            
            </li>
        <!-- Button trigger modal -->
                <!-- Button trigger modal -->


<!-- Modal -->


		<div class="dropdown_for_user">
			<?php 
			$email =$_SESSION['email'] ;
		
			     $sql = " select * from user_account where email = '$email'  ";
                             $result = mysqli_query($con,$sql); // run query
                             $count= mysqli_num_rows($result); // to count if necessary
                        
                              while($row = mysqli_fetch_array($result)){
                                    $userid = $row['user_id'];
                                    
                              }
                              $tempid=$_SESSION['temp']; 
                              $moveselected = "UPDATE `cart` SET `user_id`='$userid' WHERE user_id = '$tempid'";
                              $resultmoving = mysqli_query($con,$moveselected);
                              
                              if($resultmoving) {
                                  unset($_SESSION['temp']);
                              }
                              
                              
                    $cartcount = "select * from cart where user_id = '$userid'";
                            $resultcart = mysqli_query($con,$cartcount); // run query
                          
                             $countcart= mysqli_num_rows($resultcart);
                           
                       ?>
                       	<button  onclick="clickdirect()" class="btn btn-dark" style="width: 84px; background-color:#333333"><i class="fa fa-shopping-cart" aria-hidden="true"></i> <span class="badge badge-light" style="background-color: white;color: black"><?php echo $countcart?></span></button>
                       <?php
                       
			?>
			<div class="dropdown-content" style="right:0";>
			    
				<?php 
				        $selectallitemcart = "select * from cartview where user_id = '$userid'";
				         $resulta = mysqli_query($con,  $selectallitemcart);
				          $countcarts= mysqli_num_rows($resulta);
				          if($countcarts >=1) {
				          while($row = mysqli_fetch_array($resulta)){
				              $image = $row['photo'];
                          
                          
                          if ($image == 'th.jfif') {
                              $image_src = $image;
                          }else {
                            $image_src = "../admin/bin/Item_Images/".$image;  
                          }
                                ?>
                                <a onclick="clickdirect()">
				<img src="<?php echo $image_src?>" class="itemphoto" alt="" height="80"> 
				<div class="textarea">
				<b class="hantechcolordropdown">Product Name:</b> <?php echo $row['name']?> <br>
				<b class="hantechcolordropdown">Product Code:</b><?php echo $row['prod_id']?> <br>
				<b class="hantechcolordropdown">Quantity:</b><?php echo $row['qty']?> X ₱<?php echo $row['price']?> <br>
				<b class="hantechcolordropdown">Amount Due:</b> ₱<?php echo $row['total']?>
				</div>
				</a>

                                <?php
                                    
                              }
				              
				          }else {
				              echo '<h4 style="text-align:center;margin-top:20px;">Empty Cart</h4>';
				          }
				        
				?>
				
				
				
				<hr>
				<a  onclick="clickdirect()" class="viewshopcart" >View Shopping Cart</a>
				</div>
	
		</div>	
    </ul>
  
    <div class="burger">
        <div class="line1"></div>
        <div class="line2"></div>
        <div class="line3"></div>
    </div>	
</nav>



<style>
    
     @media screen and (max-width:450px) and (min-width:300px) {
       
    .dfcolor {
    background-color:black;
    color:white;
    }
    }
   
    
</style>

 <!--MODALS-->
 <?php include 'includemodals.php'?>
<section>		
		<div class="han">
		
		<!-- SEARCH BAR MOBILE --> 	
			<form method="post" action="../category-action/index.php">
		<div class="searchbarmobile">
		<div class="input-group">
		<input type="text" class="form-control textss" placeholder="Search Item's/Products" name="txtsearch"  autofocus>
		<div class="input-group-append">
			<button class="btn dfcolor" type="submit">
			<i class="fa fa-search"></i>
			</button>
			</div>
		</div>
		</div>
		</form>
		
		<!-- SEARCH BAR --> 
		<form method="post" action="../category-action/index.php">
		<div class="search-wrapper">	
			<div class="input-holder">
				<input type="text" class="search-input" placeholder="Search" name="txtsearch" />
				<button type="button" class="search-icon" onclick="searchToggle(this, event);"><span></span></button>
			</div>
				<span class="close" onclick="searchToggle(this, event);"></span>
		</div>	
		</form>
		
		<!-- HANTECH COVER PHOTO --> 	
		
		<img class ="mobilehantechcover" src="../img/mobilecoveraltabc-min.jpg" alt="">
		
		<img class ="hantechcover" src="../img/h-art-altabc-min.jpg" alt="">
		
		<div class="row">
		<div class="col-md-12">
		<h1 class="headline">ELDREANNE</h1>
		</div>
		<div class="col-md-12">
		<h5 class="headline2">Online Ordering and Inventory System</h5>
        <h6 class="headline3">Welcome <span id="givenname" style=""><?php echo $_SESSION['givenName']?></span>, You can start ordering now!<h6>
		</div>
		</div>
		
		</div>	
</section>



<style>
    
.starbody {
    background-image:url("../img/star-body-ok.png");
    background-size: 100% 110%;
    image-rendering: -webkit-optimize-contrast;
}    
    
</style>



<!-- BEST SELLER ITEMS -->
<div class="container topsellers">

<h6 id="topselleritems" class="hidebestsell"><i class="far fa-star"></i>Monthly Top Sellers </h6>

  <div class="row">
    <div id="carousel" class="carousel slide" data-ride="carousel">
      <div class="carousel-inner">
        <div class="carousel-item active">
		
		
		<!-- TOP 5 BEST SELLER ITEMS VIEW-->
			<div class="d-none d-lg-block ">
            <div class="slide-box">
                <?php
                    include '../admin/connection/connect.php';
                    
                                 $sql = " select Distinct prod_id from trans_record order by rand() limit 5  ";
                    $result = mysqli_query($con,$sql); // run query
               
                 
                     while($row = mysqli_fetch_array($result)){
                            $id = $row['prod_id'];
                            $selectproduct = "select distinct name ,prod_id , photo ,price from products where prod_id='$id'  ";
                            $run = mysqli_query($con, $selectproduct ); // run query
                              while($rows = mysqli_fetch_array($run)){ 
                                    $image = $rows['photo'];
                          
                          
                          if ($image == 'th.jfif') {
                              $image_src ="../admin/".$image;
                          }else {
                            $image_src = "../admin/bin/Item_Images/".$image;  
                          }
                                  ?>
                                <a href="../product_view/index.php?productview&prod_id=<?php echo $rows['prod_id']?>">
                                  	<div class="card bestselleritem">
            			<img class="card-img-top" src="<?php echo  $image_src?>" alt="First slide">
            			<div class="card-body starbody">
            			<h5 class="card-title"><?php echo $rows['name']?></h5>
            			<h5>₱<?php echo $rows['price']?></h5>
            			
            			    <i style="color:gold" class="fas fa-star"></i>
                            <i style="color:gold" class="fas fa-star"></i>
                            <i style="color:gold" class="fas fa-star"></i>
                            <i style="color:gold" class="fas fa-star"></i>
                            <i style="color:gold" class="fas fa-star"></i>
            			</div>
            			</div>
            			</a>
                                  <?php
                              }
                     }
              
                
                ?>
			
		
             
			
			
          </div>
          
          </div>
		  
		
      </div>
     <!-- <a class="carousel-control-prev" href="#carousel" role="button" data-slide="prev">
        <span style="font-size: 4rem; color: #c8c6a7; margin-left:200%;" aria-hidden="true"><i class="fas fa-chevron-circle-left"></i></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carousel" role="button" data-slide="next">
        <span style="font-size: 4rem; color: #c8c6a7; margin-right:200%;" aria-hidden="true"><i class="fas fa-chevron-circle-right"></i></span>
        <span class="sr-only">Next</span>
      </a>-->
    </div>
  </div>
</div>

</div>


<hr>


<div class="actualbg">
<div class="row hanfeatures g-0">

		<div class="col-lg-3 col-md-3 col-sm-12 col-12 mb-4">	
		<div class="card hanfeaturebox">
              <div class="card-body">
                <h4 class="card-title">
				<img class="card-img-top featureimg mw-100" src="../img/abd0.png">                     
				<h4>Product Reservation</h4>
                </h4>
                <p class="card-text">Allows you to reserve and pay for a product through our site for future purchase!</p>
              </div>
		</div>
		</div>

		<div class="col-lg-3 col-md-3 col-sm-12 col-12 mb-4">	
		<div class="card hanfeaturebox">
              <div class="card-body">
                <h4 class="card-title">
				<img class="card-img-top featureimg mw-100" src="../img/abc0.png">  
				<h4>User-Friendly Interface</h4>
                </h4>
                <p class="card-text">Our site is built with simplicity and efficiency!</p>
              </div>
		</div>
		</div>
		
		<div class="col-lg-3 col-md-3 col-sm-12 col-12 mb-4">	
		<div class="card hanfeaturebox">
              <div class="card-body">
                <h4 class="card-title">
				<img class="card-img-top featureimg mw-100" src="../img/aba0.png">  
				<h4>Special Offers</h4>
                </h4>
                <p class="card-text">We offer promotional codes for you to save money!</p>
              </div>
		</div>
		</div>
		
		<div class="col-lg-3 col-md-3 col-sm-12 col-12 mb-4">	
		<div class="card hanfeaturebox">
              <div class="card-body ">
                <h4 class="card-title">
				<img class="card-img-top featureimg mw-100" src="../img/abb0.png">  
				<h4>Fast and Reliable</h4>
                </h4>
                <p class="card-text">Fast transaction, easy to use and navigate through!</p>
              </div>
		</div>
		</div>
		
</div>
</div>

</header>



<!-- MISSION, VISION, ABOUT US SECTION --> 
<div class="aboutus">



<hr id="hr">
<div class="container mt-5 mb-4">
<div class="row popup-gallery">
        
<div class="container-fluid">
    
    
	<div class="col-md-12">
		  <img class="justus" src="../css/imgp/abouts_big-min.jpg" >
	</div>
	
	<div class="row">
	    
		<div class="col-sm-12 mb-12 vm aboutmobile">
            <a href="../css/imgp/aboutus_alt-min.jpg">
                <img src="../css/imgp/aboutus_preview00-min.jpg" >
            </a>		    
		</div>	  
		
		<div class="col-md-6 col-sm-12 mb-12 vm">
            <a href="../css/imgp/mission_ok-min.jpg">
                <img src="../css/imgp/mission_pog_preview.jpg" >
            </a>		    
		</div>
		
		<div class="col-md-6 col-sm-12 mb-12 vm">
            <a href="../css/imgp/vision_ok-min.jpg">
                <img src="../css/imgp/vision_pog_preview.jpg" >
            </a>		    
		</div>
		
	</div>
	
</div>

</div>
</div>
    

<!--
<hr id="hr">
<div class="container mt-5 mb-4">
    <div class="row popup-gallery">
        
    <div class="col-md-6">
        <img class="justus" src="../css/imgp/aboutus0000.jpg" >
    </div>   
    
    	<div class="col-md-6">
		<div class="row">
		    
        <div class="col-lg-12 col-md-12 mb-12 vm aboutmobile">
            <a href="../css/imgp/aboutus0000.jpg">
                <img src="../css/imgp/aboutus_preview0.jpg" >
            </a>
        </div>
        
        <div class="col-lg-12 col-md-12 mb-12 vm">
            <a href="../css/imgp/mission00.jpg">
                <img src="../css/imgp/mission_preview0.jpg" >
            </a>
        </div>

        <div class="col-lg-12 col-md-12 mb-12 vm">
            <a href="../css/imgp/vision00.jpg">
                <img src="../css/imgp/vision_preview0.jpg" >
            </a>
       </div>
       
       </div>
     </div>
    </div>
</div>
-->

<hr id="hr">
</div>


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
	}
	else if (isset($_SESSION['user_id'])) { //////////////////////////////////////////////////////////////////////////USER PERSONAL ACCOUNT
	   
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
<link rel="stylesheet" type="text/css" href="../css/homepage.css?v=4850" />
<link rel="stylesheet" type="text/css" href="../css/bestsellers.css?v=045" />

<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Titillium+Web:wght@600&display=swap" rel="stylesheet">

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.min.js"></script>

<title>Home</title>
</head>

<body style="background-image: url(../img/pexels-pixabay-3263101.jpg);
		background-repeat: no-repeat;
		background-size:100% 100%;
		font-family: 'Titillium Web', sans-serif;
">

<style>a {text-decoration:none}</style>

<header>

<!-- NAVIGATION BAR --> 
<nav>
    <div class="logo">
        <a href="../home"><img src="../img/logo_alt_alt_ok.png" alt="logo"></a>
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
			
	<?php 
		$userid= $_SESSION['user_id'];
		 
		         $tempid=$_SESSION['temp']; 
                              $moveselected = "UPDATE `cart` SET `user_id`='$userid' WHERE user_id = '$tempid'";
                              $resultmoving = mysqli_query($con,$moveselected);
                              
                              if($resultmoving) {
                                  unset($_SESSION['temp']);
                              }
			    
                    $cartcount = "select * from cart where user_id = '$userid'";
                            $resultcart = mysqli_query($con,$cartcount); // run query
                          
                             $countcart= mysqli_num_rows($resultcart);
                           
                       ?>
                       	<button  onclick="clickdirect()" class="btn btn-dark" style="width: 84px; background-color:#333333"><i class="fa fa-shopping-cart" aria-hidden="true"></i> <span class="badge badge-light" style="background-color: white;color: black"><?php echo $countcart?></span></button>
                       <?php
			?>
				<div class="dropdown-content" style="right:0";>
			    
				<?php 
				        $selectallitemcart = "select * from cartview where user_id = '$userid'";
				         $resulta = mysqli_query($con,  $selectallitemcart);
				          $countcarts= mysqli_num_rows($resulta);
				          if($countcarts >=1) {
				          while($row = mysqli_fetch_array($resulta)){
				              $image = $row['photo'];
                          $image_src = "../administrator/bin/Item_Images/".$image;
                                ?>
                                <a>
				<img src="<?php echo $image_src?>" class="itemphoto"alt="" height="80"> 
				<div class="textarea">
				<b class="hantechcolordropdown">Product Name:</b> <?php echo $row['name']?> <br>
				<b class="hantechcolordropdown">Product Code:</b><?php echo $row['prod_id']?> <br>
				<b class="hantechcolordropdown">Quantity:</b><?php echo $row['qty']?> X ₱<?php echo $row['price']?> <br>
				<b class="hantechcolordropdown">Amount Due:</b> ₱<?php echo $row['total']?>
				</div>
				</a>

                                <?php
                                    
                              }
				              
				          }else {
				              echo '<h4 style="text-align:center;margin-top:20px;">Empty Cart</h4>';
				          }
				        
				?>
				
				
				
				<hr>
				<a  onclick="clickdirect()" class="viewshopcart" >View Shopping Cart</a>
				</div>
	
		</div>	
    </ul>
    <div class="burger">
        <div class="line1"></div>
        <div class="line2"></div>
        <div class="line3"></div>
    </div>	
</nav>



<style>
    
        @media screen and (max-width:450px) and (min-width:300px) {
       
        .dfcolor {
            background-color:black;
            color:white;
            
        }
       
      
    }
</style>

<?php include 'includemodals.php'?>
<section>		
		<div class="han">
		
		<!-- SEARCH BAR MOBILE --> 	
			<form method="post" action="../category-action/index.php">
		<div class="searchbarmobile">
		<div class="input-group">
		<input type="text" class="form-control textss" placeholder="Search Item's/Products" name="txtsearch"  autofocus>
		<div class="input-group-append">
			<button class="btn dfcolor" type="submit">
			<i class="fa fa-search"></i>
			</button>
			</div>
		</div>
		</div>
		</form>
		
		<!-- SEARCH BAR --> 
		<form method="post" action="../category-action/index.php">
		<div class="search-wrapper">	
			<div class="input-holder">
				<input type="text" class="search-input" placeholder="Search" name="txtsearch" />
				<button type="button" class="search-icon" onclick="searchToggle(this, event);"><span></span></button>
			</div>
				<span class="close" onclick="searchToggle(this, event);"></span>
		</div>	
		</form>
		
		<!-- HANTECH COVER PHOTO --> 	
		
		<img class ="mobilehantechcover" src="../img/mobilecoveraltabc-min.jpg" alt="">
		
		<img class ="hantechcover" src="../img/h-art-altabc-min.jpg" alt="">
		
		<div class="row">
		<div class="col-md-12">
		<h1 class="headline">ELDREANNE</h1>
		</div>
		<div class="col-md-12">
		<h5 class="headline2">Online Ordering and Inventory System</h5>
        <h6 class="headline3">Welcome <span id="givenname" style=""><?php echo $_SESSION['name']?></span>, You can start ordering now!<h6>
		</div>
		</div>
		
		</div>	
</section>




<style>
    
.starbody {
    background-image:url("../img/star-body-ok.png");
    background-size: 100% 110%;
    image-rendering: -webkit-optimize-contrast;
}    
    
</style>



<!-- BEST SELLER ITEMS -->
<div class="toptotopsellers">
<div class="container topsellers">

<h6 id="topselleritems" class="hidebestsell"><i class="far fa-star"></i>Monthly Top Sellers </h6>

  <div class="row">
    <div id="carousel" class="carousel slide" data-ride="carousel">
      <div class="carousel-inner">
        <div class="carousel-item active">
		
		
			<!-- TOP 5 BEST SELLER ITEMS VIEW-->
			<div class="d-none d-lg-block ">
            <div class="slide-box">
                <?php
                    include '../admin/connection/connect.php';
                    
                                 $sql = " select Distinct prod_id from trans_record order by rand() limit 5  ";
                    $result = mysqli_query($con,$sql); // run query
               
                 
                     while($row = mysqli_fetch_array($result)){
                            $id = $row['prod_id'];
                            $selectproduct = "select distinct name ,prod_id, photo ,price from products where prod_id='$id'  ";
                            $run = mysqli_query($con, $selectproduct ); // run query
                              while($rows = mysqli_fetch_array($run)){ 
                                    $image = $rows['photo'];
                          
                          
                          if ($image == 'th.jfif') {
                              $image_src ="../admin/".$image;
                          }else {
                            $image_src = "../admin/bin/Item_Images/".$image;  
                          }
                                  ?>
                                   <a href="../product_view/index.php?productview&prod_id=<?php echo $rows['prod_id']?>">
                                  	<div class="card bestselleritem">
            			<img class="card-img-top" src="<?php echo  $image_src?>" alt="First slide">
            			<div class="card-body starbody">
            			<h5 class="card-title"><?php echo $rows['name']?></h5>
            			<h5>₱<?php echo $rows['price']?></h5>
            			
            			    <i style="color:gold" class="fas fa-star"></i>
                            <i style="color:gold" class="fas fa-star"></i>
                            <i style="color:gold" class="fas fa-star"></i>
                            <i style="color:gold" class="fas fa-star"></i>
                            <i style="color:gold" class="fas fa-star"></i>
            			</div>
            			</div>
            			</a>
                                  <?php
                              }
                     }
              
                
                ?>
			
		
             
			
			
          </div>
          
          </div>
		  
		
      </div>
     <!-- <a class="carousel-control-prev" href="#carousel" role="button" data-slide="prev">
        <span style="font-size: 4rem; color: #c8c6a7; margin-left:200%;" aria-hidden="true"><i class="fas fa-chevron-circle-left"></i></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carousel" role="button" data-slide="next">
        <span style="font-size: 4rem; color: #c8c6a7; margin-right:200%;" aria-hidden="true"><i class="fas fa-chevron-circle-right"></i></span>
        <span class="sr-only">Next</span>
      </a>-->
    </div>
  </div>
</div>

</div>
</div>

<hr>


<div class="actualbg">
<div class="row hanfeatures g-0">
    

		<div class="col-lg-3 col-md-3 col-sm-12 col-12 mb-4">	
		<div class="card hanfeaturebox">
              <div class="card-body">
                <h4 class="card-title">
				<img class="card-img-top featureimg mw-100" src="../img/abd0.png">                     
				<h4>Product Reservation</h4>
                </h4>
                <p class="card-text">Allows you to reserve and pay for a product through our site for future purchase!</p>
              </div>
		</div>
		</div>

		<div class="col-lg-3 col-md-3 col-sm-12 col-12 mb-4">	
		<div class="card hanfeaturebox">
              <div class="card-body">
                <h4 class="card-title">
				<img class="card-img-top featureimg mw-100" src="../img/abc0.png">  
				<h4>User-Friendly Interface</h4>
                </h4>
                <p class="card-text">Our site is built with simplicity and efficiency!</p>
              </div>
		</div>
		</div>
		
		<div class="col-lg-3 col-md-3 col-sm-12 col-12 mb-4">	
		<div class="card hanfeaturebox">
              <div class="card-body">
                <h4 class="card-title">
				<img class="card-img-top featureimg mw-100" src="../img/aba0.png">  
				<h4>Special Offers</h4>
                </h4>
                <p class="card-text">We offer promotional codes for you to save money!</p>
              </div>
		</div>
		</div>
		
		<div class="col-lg-3 col-md-3 col-sm-12 col-12 mb-4">	
		<div class="card hanfeaturebox">
              <div class="card-body ">
                <h4 class="card-title">
				<img class="card-img-top featureimg mw-100" src="../img/abb0.png">  
				<h4>Fast and Reliable</h4>
                </h4>
                <p class="card-text">Fast transaction, easy to use and navigate through!</p>
              </div>
		</div>
		</div>
		
</div>
</div>

</header>



<!-- MISSION, VISION, ABOUT US SECTION --> 
<div class="aboutus">
    


<hr id="hr">
<div class="container mt-5 mb-4">
<div class="row popup-gallery">
        
<div class="container-fluid">
    
    
	<div class="col-md-12">
		  <img class="justus" src="../css/imgp/abouts_big-min.jpg" >
	</div>
	
	<div class="row">
	    
		<div class="col-sm-12 mb-12 vm aboutmobile">
            <a href="../css/imgp/aboutus_alt-min.jpg">
                <img src="../css/imgp/aboutus_preview00-min.jpg" >
            </a>		    
		</div>	  
		
		<div class="col-md-6 col-sm-12 mb-12 vm">
            <a href="../css/imgp/mission_ok-min.jpg">
                <img src="../css/imgp/mission_pog_preview.jpg" >
            </a>		    
		</div>
		
		<div class="col-md-6 col-sm-12 mb-12 vm">
            <a href="../css/imgp/vision_ok-min.jpg">
                <img src="../css/imgp/vision_pog_preview.jpg" >
            </a>		    
		</div>
		
	</div>
	
</div>

</div>
</div>



<!-- 
<hr id="hr">
<div class="container mt-5 mb-4">
    <div class="row popup-gallery">
        
    <div class="col-md-6">
        <img class="justus" src="../css/imgp/aboutus0000.jpg" >
    </div>   
    
    	<div class="col-md-6">
		<div class="row">
		    
        <div class="col-lg-12 col-md-12 mb-12 vm aboutmobile">
            <a href="../css/imgp/aboutus0000.jpg">
                <img src="../css/imgp/aboutus_preview0.jpg" >
            </a>
        </div>
        
        <div class="col-lg-12 col-md-12 mb-12 vm">
            <a href="../css/imgp/mission00.jpg">
                <img src="../css/imgp/mission_preview0.jpg" >
            </a>
        </div>

        <div class="col-lg-12 col-md-12 mb-12 vm">
            <a href="../css/imgp/vision00.jpg">
                <img src="../css/imgp/vision_preview0.jpg" >
            </a>
       </div>
       
       </div>
     </div>
    </div>
</div>
-->


<hr id="hr">
</div>

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
	}else { //////////////////////////////////////////////////////////////////////////////////////////////DEFAULT NO USER
 
    			
				function getUserIpAddr(){
    if(!empty($_SERVER['HTTP_CLIENT_IP'])){
        //ip from share internet
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    }elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
        //ip pass from proxy
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }else{
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}

date_default_timezone_set('Asia/Manila');
$datenows = date('Y-m-d H:i:s');
$ipreal = getUserIpAddr();

        $check = "select * from temp where ipaddress = '$ipreal' ";
        $resultcheck = mysqli_query($con,$check); // run query
                $countiptemp= mysqli_num_rows($resultcheck);
             if($countiptemp >= 1)  {
                 while($gettemp = mysqli_fetch_array($resultcheck)){
                    $tempid = $gettemp['tempid'];
                    $_SESSION['temp'] = $tempid;
                 }
             } else {
            $inserttemp = "INSERT INTO `temp`(`ipaddress`, `datep`) VALUES ('$ipreal','$datenows')";
            $tempres = mysqli_query($con,$inserttemp); 
			$get_id =  mysqli_insert_id($con);	
			$_SESSION['temp'] = $get_id;
             }
           
			
			
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
<link rel="stylesheet" type="text/css" href="../css/homepage.css?v=4850" />
<link rel="stylesheet" type="text/css" href="../css/bestsellers.css?v=045" />

<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Titillium+Web:wght@600&display=swap" rel="stylesheet">

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.min.js"></script>

<title>Home</title>
</head>

<body style="background-image: url(../img/pexels-pixabay-3263101.jpg);
		background-repeat: no-repeat;
		background-size:100% 100%;
		font-family: 'Titillium Web', sans-serif;
">

<style>a {text-decoration:none}</style>

<header>

<!-- NAVIGATION BAR --> 
<nav>
    <div class="logo">
        <a href="../home"><img src="../img/logo_alt_alt_ok.png" alt="logo"></a>
	</div>


    <ul class="nav-links">
        <li><a href="../home"><span style="font-size: 1.5rem;"><span style="color: #333333;"><i class="fas fa-house-user"></i></span></span> HOME</a></li>
        <li><a href="../category"><span style="font-size: 1.5rem;"><span style="color: #333333;"><i class="fas fa-align-left"></i></span></span> CATEGORIES</a></li>
        <li><a href="../signin"><span style="font-size: 1.5rem;"><span style="color: #333333;"><i class="fas fa-cart-arrow-down"></i></span></span> ORDERS</a></li>
        <li><a href="../signin"><span style="font-size: 1.5rem;"><span style="color: #333333;"><i class="fas fa-user-edit"></i></span></span> SIGN IN</a></li>
        
		<div class="dropdown">
			
		<button   class="btn btn-dark" onclick = "window.location.href='../cart/'" style="width: 84px; background-color:#333333"><i class="fa fa-shopping-cart" aria-hidden="true"></i> <span class="badge badge-light" style="background-color: white;color: black">
		    <?php
		      $userid = $_SESSION['temp'];
              $cartcount = "select * from cart where user_id = '$userid'";
                            $resultcart = mysqli_query($con,$cartcount); // run query
                          
                             $countcart= mysqli_num_rows($resultcart);
                             echo $countcart;

		    ?>
		    
		</span></button>
		</div>	
    </ul>
    <div class="burger">
        <div class="line1"></div>
        <div class="line2"></div>
        <div class="line3"></div>
    </div>	
</nav>



<style>


    
    @media screen and (max-width:450px) and (min-width:300px) {
    .dfcolor {
    background-color:black;
    color:white;
    }
    }
     
    @media screen and (max-width:400px) and (min-width:360px) { 
    .textss {
    margin-left:-55px;
    }
	}
	 
    
</style>


<section>		
		<div class="han">
		
		<!-- SEARCH BAR MOBILE --> 	
			<form method="post" action="../category-action/index.php">
		<div class="searchbarmobile">
		<div class="input-group">
		<input type="text" class="form-control textss" placeholder="Search Item's/Products" name="txtsearch"  autofocus>
		<div class="input-group-append">
			<button class="btn dfcolor" type="submit">
			<i class="fa fa-search"></i>
			</button>
			</div>
		</div>
		</div>
		</form>
		
		<!-- SEARCH BAR --> 
		<form method="post" action="../category-action/index.php">
		<div class="search-wrapper">	
			<div class="input-holder">
				<input type="text" class="search-input" placeholder="Search" name="txtsearch" />
				<button type="button" class="search-icon" onclick="searchToggle(this, event);"><span></span></button>
			</div>
				<span class="close" onclick="searchToggle(this, event);"></span>
		</div>	
		</form>
		
		<!-- HANTECH COVER PHOTO --> 	
		
		<img class ="mobilehantechcover" src="../img/mobilecoveraltabc-min.jpg" alt="">
		
		<img class ="hantechcover" src="../img/h-art-altabc-min.jpg" alt="">
		
		<div class="row">
		<div class="col-md-12">
		<h1 class="headline">ELDREANNE </h1>
		</div>
		<div class="col-md-12">
		<h5 class="headline2">Online Ordering and Inventory System</h5>
		</div>
		</div>
		
		</div>	
</section>


<style>
    
.starbody {
    background-image:url("../img/star-body-ok.png");
    background-size: 100% 110%;
    image-rendering: -webkit-optimize-contrast;
}    
    
</style>


<!-- BEST SELLER ITEMS -->
<div class="container topsellers">

<h6 id="topselleritems" class="hidebestsell"><i class="far fa-star"></i>Monthly Top Sellers </h6>

  <div class="row">
    <div id="carousel" class="carousel slide" data-ride="carousel">
      <div class="carousel-inner">
        <div class="carousel-item active">
		
		
		<!-- TOP 5 BEST SELLER ITEMS VIEW-->
			<div class="d-none d-lg-block">
            <div class="slide-box">
                <?php
                    include '../admin/connection/connect.php';
                    
                                 $sql = " select Distinct prod_id from trans_record order by rand() limit 5  ";
                    $result = mysqli_query($con,$sql); // run query
               
                 
                     while($row = mysqli_fetch_array($result)){
                            $id = $row['prod_id'];
                            $selectproduct = "select distinct name ,prod_id , photo ,price from products where prod_id='$id'  ";
                            $run = mysqli_query($con, $selectproduct ); // run query
                              while($rows = mysqli_fetch_array($run)){ 
                                   $image = $rows['photo'];
                          
                          
                          if ($image == 'th.jfif') {
                              $image_src ="../admin/".$image;
                          }else {
                            $image_src = "../admin/bin/Item_Images/".$image;  
                          }
                                  ?>
                                   <a href="../product_view/index.php?productview&prod_id=<?php echo $rows['prod_id']?>">
                                  	<div class="card bestselleritem">
            			<img class="card-img-top" src="<?php echo  $image_src?>" alt="First slide">
            			<div class="card-body starbody">
            			<h5 class="card-title"><?php echo $rows['name']?></h5>
            			<h5>₱<?php echo $rows['price']?></h5>
            			
            			    <i style="color:gold" class="fas fa-star"></i>
                            <i style="color:gold" class="fas fa-star"></i>
                            <i style="color:gold" class="fas fa-star"></i>
                            <i style="color:gold" class="fas fa-star"></i>
                            <i style="color:gold" class="fas fa-star"></i>
            			</div>
            			</div>
            			</a>
                                  <?php
                              }
                     }
              
                
                ?>
			
		
             
			
			
          </div>
          
          </div>
		  
		
      </div>
     <!-- <a class="carousel-control-prev" href="#carousel" role="button" data-slide="prev">
        <span style="font-size: 4rem; color: #c8c6a7; margin-left:200%;" aria-hidden="true"><i class="fas fa-chevron-circle-left"></i></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carousel" role="button" data-slide="next">
        <span style="font-size: 4rem; color: #c8c6a7; margin-right:200%;" aria-hidden="true"><i class="fas fa-chevron-circle-right"></i></span>
        <span class="sr-only">Next</span>
      </a>-->
    </div>
  </div>
</div>

</div>


<hr>


<div class="actualbg">
<div class="row hanfeatures g-0">
    

		<div class="col-lg-3 col-md-3 col-sm-12 col-12 mb-4">	
		<div class="card hanfeaturebox">
              <div class="card-body">
                <h4 class="card-title">
				<img class="card-img-top featureimg mw-100" src="../img/abd0.png">                     
				<h4>Product Reservation</h4>
                </h4>
                <p class="card-text">Allows you to reserve and pay for a product through our site for future purchase!</p>
              </div>
		</div>
		</div>

		<div class="col-lg-3 col-md-3 col-sm-12 col-12 mb-4">	
		<div class="card hanfeaturebox">
              <div class="card-body">
                <h4 class="card-title">
				<img class="card-img-top featureimg mw-100" src="../img/abc0.png">  
				<h4>User-Friendly Interface</h4>
                </h4>
                <p class="card-text">Our site is built with simplicity and efficiency!</p>
              </div>
		</div>
		</div>
		
		<div class="col-lg-3 col-md-3 col-sm-12 col-12 mb-4">	
		<div class="card hanfeaturebox">
              <div class="card-body">
                <h4 class="card-title">
				<img class="card-img-top featureimg mw-100" src="../img/aba0.png">  
				<h4>Special Offers</h4>
                </h4>
                <p class="card-text">We offer promotional codes for you to save money!</p>
              </div>
		</div>
		</div>
		
		<div class="col-lg-3 col-md-3 col-sm-12 col-12 mb-4">	
		<div class="card hanfeaturebox">
              <div class="card-body ">
                <h4 class="card-title">
				<img class="card-img-top featureimg mw-100" src="../img/abb0.png">  
				<h4>Fast and Reliable</h4>
                </h4>
                <p class="card-text">Fast transaction, easy to use and navigate through!</p>
              </div>
		</div>
		</div>
		
</div>
</div>

</header>






<!-- MISSION, VISION, ABOUT US SECTION --> 
<div class="aboutus">
    





<hr id="hr">
<div class="container mt-5 mb-4">
<div class="row popup-gallery">
        
<div class="container-fluid">
    
    
	<div class="col-md-12">
		  <img class="justus" src="../css/imgp/abouts_big-min.jpg" >
	</div>
	
	<div class="row">
	    
		<div class="col-sm-12 mb-12 vm aboutmobile">
            <a href="../css/imgp/aboutus_alt-min.jpg">
                <img src="../css/imgp/aboutus_preview00-min.jpg" >
            </a>		    
		</div>	  
		
		<div class="col-md-6 col-sm-12 mb-12 vm">
            <a href="../css/imgp/mission_ok-min.jpg">
                <img src="../css/imgp/mission_pog_preview.jpg" >
            </a>		    
		</div>
		
		<div class="col-md-6 col-sm-12 mb-12 vm">
            <a href="../css/imgp/vision_ok-min.jpg">
                <img src="../css/imgp/vision_pog_preview.jpg" >
            </a>		    
		</div>
		
	</div>
	
</div>

</div>
</div>






<!--
<hr id="hr">
<div class="container mt-5 mb-4">
    <div class="row popup-gallery">
        
    <div class="col-md-6">
        <img class="justus" src="../css/imgp/aboutus0000.jpg" >
    </div>   
    
    	<div class="col-md-6">
		<div class="row">
		    
        <div class="col-lg-12 col-md-12 mb-12 vm aboutmobile">
            <a href="../css/imgp/aboutus0000.jpg">
                <img src="../css/imgp/aboutus_preview0.jpg" >
            </a>
        </div>
        
        <div class="col-lg-12 col-md-12 mb-12 vm">
            <a href="../css/imgp/mission00.jpg">
                <img src="../css/imgp/mission_preview0.jpg" >
            </a>
        </div>

        <div class="col-lg-12 col-md-12 mb-12 vm">
            <a href="../css/imgp/vision00.jpg">
                <img src="../css/imgp/vision_preview0.jpg" >
            </a>
       </div>
       
       </div>
     </div>
    </div>
</div>
-->

<hr id="hr">
</div>


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
function clickdirect() {
    window.location.href="../signin";
}
</script>


</body>

</html> 
	    <?php
	}
?>
