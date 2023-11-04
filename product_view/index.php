<?php
session_start();
include '../admin/connection/connect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css">
<link rel="icon" href="../img/tabicon.png" type="image/gif" sizes="16x16">
<link rel="stylesheet" type="text/css" href="../css/homepage.css?v=4685" />
<link rel="stylesheet" type="text/css" href="productpage.css?v=305" />

<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Titillium+Web:wght@600&display=swap" rel="stylesheet">

  <script type="text/javascript" src="../js/jquery-1.9.1.min.js"></script>
  <script type="text/javascript" src="../js/magnify.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.min.js"></script>

  
</head>
<title>Hantech Product</title>
</head>

<body style="font-family: 'Titillium Web', sans-serif;" >

<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v10.0" nonce="PTZFhf9a"></script>

<header>


<!-- NAVIGATION BAR --> 
<nav>
    <div class="logo">
        <a href="../home"><img src="https://hantechdesign.com/img/logo_alt_alt_ok.png" alt="logo"></a>
	</div>


    <ul class="nav-links">
        <li><a href="../home"><span style="font-size: 1.5rem;"><span style="color: #333333;"><i class="fas fa-house-user"></i></span></span> HOME</a></li>
        <li><a href="../category"><span style="font-size: 1.5rem;"><span style="color: #333333;"><i class="fas fa-align-left"></i></span></span> CATEGORIES</a></li>
        <li><a href="../orders/orders.php"><span style="font-size: 1.5rem;"><span style="color: #333333;"><i class="fas fa-cart-arrow-down"></i></span></span> ORDERS</a></li>
        <li id="cartplacing"><a href="../cart"><span style="font-size: 1.5rem;"><span style="color: #333333;"><i class="fas fa-shopping-cart"></i></span></span> MY CART <span class="btn btn-dark" style="padding:5px;" id="mycart"></span></a></li>
      
	
    </ul>
    <div class="burger">
        <div class="line1"></div>
        <div class="line2"></div>
        <div class="line3"></div>
    </div>	
</nav>



<div class="productbody">


<?php
 if(isset($_GET['productview'])){
    $prod_id = $_GET['prod_id']; 
     
        $sql = " select * from products where prod_id= '$prod_id'    ";
                $result = mysqli_query($con,$sql); // run query
             //   $count= mysqli_num_rows($result); // to count if necessary
             $countstock = 0 ;
                 //while($row = mysqli_fetch_array($result)){} is where we output all the data in database
                 while($row = mysqli_fetch_array($result)){
                      $image = $row['photo'];
                          if ($image == 'th.jfif') {
                              $image_src ="../admin/".$image;
                          }else {
                            $image_src = "../admin/bin/Item_Images/".$image;  
                          }
                          
                     
?>
               
<div class="container-fluid">
	<div class="row">
		<div class="col-md-6 g-0">
		    <p><br><br></p>
		    
		<!--
		<div class="container">
		     <img src=" <?php echo $image_src ?>" class="img-thumbnail">
		</div>
		-->
		
		<div class="container magnify">
        <div class="large"></div><!-- This is the magnifying glass which will contain the original/large version -->

        <!-- Image source http://www.flickr.com/photos/rustyangel/4509569191/ -->
        <div class="imgbox"><img src="<?php echo $image_src ?>" class="thumb img-thumbnail" /></div>

        </div><!-- @end .magnify -->


        <style>
            
        .fb-share-button {
            padding:10px;
        }
            
        </style>
		
        <div class="fb-share-button" data-href="https://hantechdesign.com/product_view/index.php?productview&amp;prod_id=<?php echo $row['prod_id']?>" data-layout="button_count" data-size="small"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fhantechdesign.com%2Fproduct_view%2Findex.php%3Fproductview%26prod_id%3Dblank&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Share</a></div>

		
		</div>
	
		<div class="col-md-6 productdescrp">
			<div class="row">
				<div class="col-md-12">
				<h2 id="productname">
				<?php echo $row['name']?>   <span style="font-size:15px; text-transform:capitalize"><br>Category:	<?php echo $row['categoryname']?></span>
				</h2>
			
            			    <i style="color:gold" class="fas fa-star"></i>
                            <i style="color:gold" class="fas fa-star"></i>
                            <i style="color:gold" class="fas fa-star"></i>
                            <i style="color:gold" class="fas fa-star"></i>
                            <i style="color:gold" class="fas fa-star"></i>	
                            <p> <?php 
                                $getstock = " select * from productstock where prod_id = '$prod_id'  ";
                            $allstock = mysqli_query($con,$getstock); // run query
                            //$count= mysqli_num_rows($result); // to count if necessary
                         
                         	//while($row = mysqli_fetch_array($result)){} is where we output all the data in database
                             while($rows = mysqli_fetch_array($allstock)){
                                           $countstock += $rows['stock'];
                             }
                             if($countstock >= 0 ) {
                                
                                 echo 'Stock: '.$countstock;  
                             } else {
                                 echo 'OUT OF STOCK';
                             }
                       
                            
                            ?>
                            
                            </p>
				</div>
			</div>
			
			<img src="hantechdiscount.png" class="hantechdiscount" alt="...">
			
			<hr id="justlongline">
			
			<div class="row">
				<div class="col-md-12">
				<h1 id="productprizehan">₱<?php echo $row['price']?></h1>
				<h5 id="productdescrip">
				<?php echo $row['description']?>
				</h5>
				</div>
			</div>
			
			<hr id="justlongline">
			
			<div class="itemaddtocard">	
			<h4 id="productquantity">Quantity:</h4>
			<div class="quantity">
				<button class="minus-btn" id="minusbtn" type="button" name="button">
				<i class="fas fa-minus"></i>
				</button>		
			<input type="text" name="name" value="1" id="quantiti" readonly style="cursor:default">
				<button class="plus-btn" id="addbtn" type="button" name="button">
				<i class="fas fa-plus"></i>
				</button>
			</div>
			    
			    <?php
			        if(isset($_SESSION['access_token'])) {
			            	$email =$_SESSION['email'] ;
		
			     $sql = " select * from user_account where email = '$email'  ";
                             $result = mysqli_query($con,$sql); // run query
                             $count= mysqli_num_rows($result); // to count if necessary
                        
                              while($row = mysqli_fetch_array($result)){
                                    $userid = $row['user_id'];
                                    
                              }
			        }else if (isset($_SESSION['user_id'])) {
			           $userid =$_SESSION['user_id'] ;
			        }else {
			             $userid = $_SESSION['temp'];
			          
			        }
			     
              $cartcount = "select * from cart where user_id = '$userid'";
                            $resultcart = mysqli_query($con,$cartcount); // run query
                          
                             $countcart= mysqli_num_rows($resultcart);
?>
 <script>
                   document.getElementById("mycart").innerHTML = "<?php echo $countcart?>"; 
                
                      
  </script>
  <?php
			    ?>
			    <?php 
			    if($countstock >= 0 ) {
			        ?>
	<a  class="btn btn-outline-dark addcart" data-pid="<?php echo $prod_id?>" data-userid="<?php echo $userid ?>" ><i class="fa fa-cart-plus" aria-hidden="true"></i></i> Add to cart</a>
			        <?php
			    }else {
			        ?>
	<a  class="btn btn-outline-dark addcart"><i class="fas fa-ban" aria-hidden="true"></i></i> Unavailable</a>			        
			        <?php
			    }
			    ?>
		
			</div>
			
		</div>
	</div>
</div>
<?php
  }
          
 }

?>
<div class="newcarts"></div>
      
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
           

                                <script>
                                
                               //add quantities
                                 $(document).ready(function() { 
                                    
                                      
                                      $('#minusbtn').click(function(e) { 
                                          	e.preventDefault();
                                		var quantity = $('#quantiti').val();
                                		if(quantity > 1){
                                			quantity--;
                                		}
                                		$('#quantiti').val(quantity);
                                       
                                          
                                      })
                                      
                                      $('#addbtn').click(function(e) { 
                                          	e.preventDefault();
                                    		var quantity = $('#quantiti').val();
                                    		quantity++;
                                    		$('#quantiti').val(quantity);
                                          
                                      
                                          
                                      })
                                      
                                       $('.addcart').click(function() {
                                         var prod_id = $(this).data("pid");
                                          var user_id = $(this).data("userid");
                                          var qty = $('#quantiti').val();
                                        //    var cartcount =$('#mycart').
                                         if(user_id == 'noid') {
                                                      $.ajax({
                                			url	:	"addcart.php",
                                			method:	"POST",
                                			data	:	{addtocartnoid:1,prod_id:prod_id,user_id:user_id,qty:qty},
                                			success	:	function(data){
                                			 
                                		    $('.newcarts').html(data);
                                		       getcartcount();
                                		
                                			}
                                		})
                                         }else {
                                             
                                              $.ajax({
                                			url	:	"addcart.php",
                                			method:	"POST",
                                			data	:	{addtocart:1,prod_id:prod_id,user_id:user_id,qty:qty},
                                			success	:	function(data){
                                			 
                                		    $('.newcarts').html(data);
                                		       getcartcount();
                                		
                                			}
                                		})
                                         }
                                         
                                           function getcartcount() {
                                  
                                             $.ajax({
                                			url	:	"addcart.php",
                                			method:	"POST",
                                			data	:	{getcart:1,user_id:user_id},
                                			success	:	function(data){
                                			   
                                			$('#mycart').html(data);
                                		
                                			} 
                                         })
                                        
                                         }
                                        
                                       });
                               
                                   
                                     
                                 });
                                 
                                 </script>


<hr id="justlongline">

<div class="container" style="display:block; margin-left:auto; margin-right:auto;">

<!--<h2 id="productname">
Comments
</h2>-->

<style>

@media screen and (max-width: 768px) {
    
    .nondisplay {
    display:none;
    }
    
}


</style>



<div class="container-fluid nondisplay">
	<div class="row">
		<div class="col-md-6">
		<div class="fb-comments" data-href="http://localhost/ecommerce/product.php?product=<?php echo $slug; ?>" data-numposts="10" style="width:100%;" ></div> 
		</div>
		<div class="col-md-6">
			<div class="row">
				<div class="col-md-12">
				<a href="https://www.who.int/emergencies/diseases/novel-coronavirus-2019/advice-for-public"><img src="../img/memorable-stay-home-ad-campaigns-by-brands-for-covid-19.jpg" width="400px" height="200px"></a>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12" style="margin-top:20px;">
				<a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ"><img src="../img/aaa1.jpg" width="400px" height="350px"></a>
				</div>
			</div>
		</div>
	</div>
</div>

 

    <script>
(function(d, s, id) {
	var js, fjs = d.getElementsByTagName(s)[0];
	if (d.getElementById(id)) return;
	js = d.createElement(s); js.id = id;
	js.src = 'https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.12';
	fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));
</script> 

</div>

<hr id="justlongline">

<div class="relatedproductsbody">

<h3 id="relatedproduct">Related Products</h3>

<div class="relatedproductslist">

<style>
    
.relatedprod  {
    height:300px;
}

@media screen and (max-width:400px) and (min-width:360px) { 
   
.relatedprod  {
    height:200px;
}
    
}


@media screen and (max-width:450px) and (min-width:400px) {
    
.relatedprod  {
    height:200px;
}
      
}
    
</style>


<div class="container-fluid">
<div class="row">
    
        <?php 
            $sql = " select * from product order by rand() limit 4  "; 
             $result = mysqli_query($con,$sql); // run query
                            
                        
                              while($row = mysqli_fetch_array($result)){ 
                                  $image = $row['photo'];
                           if ($image == 'th.jfif') {
                              $image_src ="../admin/".$image;
                          }else {
                            $image_src = "../admin/bin/Item_Images/".$image;  
                          }
                                  ?>
                                  <div class="col-md-3">
                        <div class="card">
                          <img src="<?php echo $image_src?>" class="card-img-top relatedprod" alt="...">
                          <div class="card-body">
                            <h5 class="card-title"><?php echo $row['name']?></h5>
                        	<h3 id="productprizehan">₱<?php echo $row['price']?></h3>
                            <a href="index.php?productview&prod_id=<?php echo $row['prod_id']?>" class="btn btn-dark">View & Add</a>
                          </div>
                        </div>
                        </div>
                                  <?php
                              }
        ?>




	
</div>

</div>


</div>

</div>
</div>


<style>
.fab { 
color:#333333;
}

.fab:hover { 
color:#538FCB;
}
</style>

</div>

<footer id="forproduct">

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


<div class="sliderforproductpage"></div>
<script src="../js/nav.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>
<script src="/docs/5.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>
<script src="./js/nav.js"></script>
</body>

</html> 