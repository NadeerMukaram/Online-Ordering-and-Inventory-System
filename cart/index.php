<?php
	session_start();
  
	if (isset($_SESSION['access_token'])) {//////////////////////////////////////////////////////////////////////////////////////GOogle Login
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
<link rel="stylesheet" type="text/css" href="../css/homepage.css?v=4685" />

<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Titillium+Web:wght@600&display=swap" rel="stylesheet">

<link rel="stylesheet" type="text/css" href="../css/shoppingcart.css?v=2630" />

</head>
<title>Shopping Cart</title>
<?php 
    include '../admin/connection/connect.php';
?>
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
        <li id="shoppingcartplacing"><a href="../orders/orders.php"><span style="font-size: 1.5rem;"><span style="color: #333333;"><i class="fas fa-shopping-cart"></i></span></span> MY ORDERS</a></li>
        
    </ul>
    <div class="burger">
        <div class="line1"></div>
        <div class="line2"></div>
        <div class="line3"></div>
    </div>	
</nav>



<article>

    <main>
<div class="row">
  <br><br>
  <?php
   if(isset($_POST['btnremove'])) {
        $cartno = $_POST['cartno'];
      
            $sql = "DELETE FROM `cart` WHERE cart_id = '$cartno' ";
             $result = mysqli_query($con,$sql); // run query
             if($result) {
                ?>
      <span style="color:rgb(128,0,0);margin-top:4.3%;font-family:Evogria;font-weight:bolder" id="hidenote">Item has been removed</span>
      <script>
        
          setInterval(function(){   document.getElementById('hidenote').setAttribute('style','display:none'); }, 3000);
      </script>
       <?php 
             }
                
       
   }
   if(isset($_POST['qtychange'])) {
       $qty = $_POST['qtychange'];
       $cartno = $_POST['cartno'];
                          $sql = " select * from cart where cart_id = '$cartno'  ";
 						                $result = mysqli_query($con,$sql); // run query
 						                $count= mysqli_num_rows($result); // to count if necessary
 						         
 						                 while($row = mysqli_fetch_array($result)){
 						                            $prod_id = $row['prod_id'];
 						                 }
 						 
 						
 						 $getprice = "select * from product where prod_id = '$prod_id'";
             						  $getpriceres = mysqli_query($con,$getprice); // run query
             						   while($row = mysqli_fetch_array($getpriceres)){
             						                            $price= $row['price'];
 						                 }
 						                 
 						        $overallamountdue = $qty * $price;  
 						        
 						        ////update
 						        
 						        $updatecart = "update cart set `qty`='$qty', `total` = '$overallamountdue' where cart_id = '$cartno' ";
 						                    $resultupdate= mysqli_query($con,$updatecart);
 						                    if ($resultupdate) {
 						                     ?>
                                      <span style="color:green;margin-top:4.3%;font-family:Evogria;font-weight:bolder" id="hidenote">Quantity Changed  <i class='fas fa-check-circle'></i> </span>
                                      <script>
                                        
                                          setInterval(function(){   document.getElementById('hidenote').setAttribute('style','display:none'); }, 3000);
                                      </script>
                                       <?php    
 						                    }
 						       
         
   }
  ?>
  <br>
</div>  
<div class="basket-module" >
        <label for="promo-code">Choose a promotional code</label>
        <form method="post">
            <div class="btn-group" role="group" aria-label="Basic example">
        <select name="promoselect" id="promo-code" class="form-select" style="width:300px;font-size:13px" disabled >
            <option>Select Promocodes</option>
            <?php 
                  $sqlcodes = " select * from promocodes ";
                              $resultcodes = mysqli_query($con,$sqlcodes); // run query
                            
                             
                               while($row = mysqli_fetch_array($resultcodes)){
                                ?>
                                  <option type="submit"  value="<?php echo $row['promo_id']?>"><?php echo $row['code']?> -> Discount Amount : ₱ <?php echo $row['discount']?></span></option>
                                <?php
                               }
                        
            
            ?>
      
       
        </select>
        <button class="btn btn-dark" style="font-size:12px;"  id="promo-codebtn" disabled>Apply</button>
        </div>
        </form>
       <h6 id="maximum">
       </h6>
      
      </div>
 
 <style>
.emptycart{
    margin-top:5%;
    font-family:Evogria;
    font-weight:bolder;
    margin: 20%;
}
</style>  
   
    
<div class="basket" style="overflow-y: scroll; height: 500px;">

    
    <div class="basket-labels">
        <ul>
          <li class="item item-heading">Item</li>
          <li class="price">₱</li>
          <li class="quantity">Ǭ</li>
          <li class="subtotal">Subtotal</li>
        </ul>
    </div>
	   <?php 
	   	$email = $_SESSION['email'] ;
	   
			     $sql = " select * from user_account where email = '$email'  ";
                             $resultforuser = mysqli_query($con,$sql); // run query
                            
                        
                              while($row = mysqli_fetch_array($resultforuser)){
                                    $userid = $row['user_id'];
                                    
                              }
                             
                             
	   
	         $sqlall = " SELECT * FROM `cartview` WHERE user_id = '$userid' "; /////////////////////////////////////////TODO
                             $resulta = mysqli_query($con,$sqlall); // run query
                           
                           $count= mysqli_num_rows($resulta); // to count if necessary
                              if ($count>=1){
                                $amountdue= 0;
                              //while($row = mysqli_fetch_array($result)){} is where we output all the data in database
                              while($row = mysqli_fetch_array($resulta)){
                                    $image = $row['photo'];
                           if ($image == 'th.jfif') {
                              $image_src ="../admin/".$image;
                          }else {
                            $image_src = "../admin/bin/Item_Images/".$image;  
                          }
                          $amountdue += $row['total'];
                          $prodid = $row['prod_id'];
                          $cartid =$row['cart_id'];
                         
                               ?>
                               	<!-- ITEM 1 -->    
                                    <div class="basket-product">
                                        <div class="item">
                                          <div class="product-image">
                                            <img src="<?php echo $image_src?>" alt="Placholder Image 2" class="product-frame" height="100">
                                          </div>
                                          <div class="product-details">
                                            <h1><b><span class="item-quantity"><?php echo $row['qty']?></span> x </b> <span style="text-transform:uppercase"><?php echo $row['name']?></span></h1>
                                            <p><b>Product Code</b><br><strong><?php echo $row['prod_id']?></strong></p>
                                          </div>
                                        </div>
                                        <div class="price"><?php echo $row['price']?></div>
                                        <div class="quantity">
                                           
                                            <form method="post">
                                                  <input type="hidden" value="<?php echo $row['cart_id']?>" name="cartno">
                                          <input type="number"  name="qtychange" value="<?php echo $row['qty']?>" min="1" class="quantity-field">
                                          <p style="font-size:12px">Press <button type="submit">Enter</button> to Update Quantity</p>
                                          </form>
                                          
                                        </div>
                                     
                                        <div class="subtotal"><?php echo $row['total']?></div>
                                       
                                        <div class="remove">
                                            <form method="post">
                                                <input type="hidden" value="<?php echo $row['cart_id']?>" name="cartno">
                                      
                                          <button type="submit" name="btnremove">Remove</button>
                                          </form>
                                         
                                        </div>
                                    </div>
	
<!---->
	  
                               <?php
                              }
                              } else {
                                    ?>
                                               <h4 class="emptycart">Your Cart is Empty <i class="fas fa-cog fa-spin"></i> <br>  <a style="color:white" href="https://hantechdesign.com/category">CLICK HERE</a> to make some order.</h4>
                                               
                                    <?php
                              }
                       
    	?>

 
	  
</div>
<?php 

                            $cartcounta = "select * from cart where user_id = '$userid'";
                            $resultcart = mysqli_query($con,$cartcounta); // run query
                         
                             $countcart= 0;
                              while($row = mysqli_fetch_array($resultcart)){ 
                                
                                
                            $countcart += $row['qty'];
                          }
                             
                           
                             
?>

<form method="post" action="../orders/index.php" >
    
<aside style="margin-top:-120px">
      <div class="summary">
        <div class="summary-total-items"><span id="itemscount"><?php echo $countcart?></span> Items in your Bag</div>
        <div class="summary-subtotal">
            <?php
            if (isset($_POST['promoselect'])) {
                $promoid = $_POST['promoselect'];
                $foo = true;
                
                	$email =$_SESSION['email'] ;
		
			     $sql = " select * from user_account where email = '$email'  ";
                             $result = mysqli_query($con,$sql); // run query
                             $count= mysqli_num_rows($result); // to count if necessary
                        
                              while($row = mysqli_fetch_array($result)){
                                    $userid = $row['user_id'];
                                    
                              }
                              
                 $checktrans = "select * from trans_record where user_id='$userid' and promo_id = '$promoid'";
                  $resll = mysqli_query($con,$checktrans); 
                    $countp= mysqli_num_rows($resll);
                    if($countp >=1 ) {
                        ?>
                        
                         <h6 style="font-size:11px;color:red">Were sorry but you have already used this Code.</h6>
                        <?php
                    }else {
                            $sqlcodess = " select * from promocodes where promo_id = '$promoid' ";
                              $resultcodess = mysqli_query($con,$sqlcodess); // run query
                            
                             
                               while($row = mysqli_fetch_array($resultcodess)){
                                   $dis = $row['discount'];
                                   $promoids = $row['promo_id'];
                                ?>
                                 <p style="font-size:14px;">Promocode <br> <span style="font-zie:12px;">Code :<?php echo $row['code']?> <br> Value : ₱ <?php echo $dis?></span> </p>
                                <?php
                               } 
                    }
             
                        
            
             
            }else {
                ?>
                <p style="font-size:14px;">Promocode <br> None</p>
                <?php
            }
            ?>
          
            <!---->
           
          <div class="summary-promo hide">
            <div class="promo-title">Promotion</div>
            <div class="promo-value final-value" id="basket-promo"></div>
          </div>
        </div>
        <div class="summary-delivery">
         
         
        
        <p class="selected">Type Of Transaction:</p>
        <p></p>
      
        <input type="radio" id="typecod" onclick="codclick()" name="typetrans" value="cod" required>
         Cash on Delivery 
           <p id="unsetbill" class="d-none"  style="color:grey;font-size:12px;cursor:default"> <i class="fas fa-info-circle" data-toggle="tooltip" data-placement="right" title="Unable to Proceed"></i> If it doesnt proceed. then you need to set Billing Address <br>
           Click <a href="javascript:void(0)" onclick="on()">HERE</a> to set </p>
        <p></p>
      
        <style>
#overlay {
  position: fixed;
  display: none;
  width: 100%;
  height: 100%;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: rgba(0,0,0,0.5);
  z-index: 2;
  cursor: pointer;
}

#text{
  position: absolute;
  top: 50%;
  left: 50%;
  font-size: 50px;
  color: black;
  transform: translate(-50%,-50%);
  -ms-transform: translate(-50%,-50%);
  height:auto;
  background-color:white;
  width:40%;
  border-radius:10px;
}
</style>
       <div id="overlay" >
           <div id="text">
            <div class="container" background-color:white>
                <div class="row">
                    <p></p>
                    
                        <div class="container">
                            
                    <?php
                     $email =$_SESSION['email'] ;
		
			     $sql = " select * from user_account where email = '$email'  ";
                             $result = mysqli_query($con,$sql); // run query
                             $count= mysqli_num_rows($result); // to count if necessary
                        
                              while($row = mysqli_fetch_array($result)){
                                    $userid = $row['user_id'];
                                    
                              }
                    $selectacc = "select * from user_account where user_id = '$userid'";
                     $run = mysqli_query($con,$selectacc); // run query
                      while($out = mysqli_fetch_array($run)){
                         $statuss= $out['status'];
                         $contact = $out['contact_no'];
                      }
                      
                      if($statuss == 0) {
                            if ($contact == '') {
                                  ?>
                          <p></p>
                         <h5>You Haven't Set yet Any Contact Number</h5>
                         <h6>Set it first to proceed Cash on Delivery Order</h6><p></p><p><br></p>
                           
                         <h6><a href="setmobi.php" style="color:#c8c6a7;font-family:Evogria;font-size:1.5rem;">Set Mobile Number here</a></h6>
                         
                          <?php
                            }else {
                                ?>
                                 <p></p>
                         <h5>Your Contact Number is <span style="color:red">NOT</span> Yet Verified..</h5>
                         <h6>Verify it first to proceed Cash on Delivery order</h6><p></p><p><br></p>
                        
                         <h6><a href="cartverification.php?userid=<?php echo $userid?>">Click Here to Verify Contact Number!</a></h6>
                         
                          <?php
                            }
                       
                         
                      }else {
                          ?>
                        <p></p>
                        <h5>Billing Address</h5>
                        <p style="color:grey;font-size:12px"><i class="fas fa-info-circle"></i> This field is Required to proceed COD </p>
                       
                      <p></p>
                      <label style="font-size:17px;">Address <span style="color:grey;font-size:12px;"> ( Ex. Zone 1 , Ayala ) </span></label>
                    <input class="form-control " type="text" name="txtaddr" required   id="fieldaddr">
                    <p></p>
                     <label style="font-size:17px;">City <span style="color:grey;font-size:12px;"> ( Ex. Zamboanga City ) </span></label>
                     <input class="form-control " type="text" name="txtcity" required   id="fieldcity">
                      <p></p>
                      <label style="font-size:17px;">Zip code <span style="color:grey;font-size:12px;"> (Ex. 7000 ) </span></label>
                     <input class="form-control " type="text" maxlength='4'  required name="txtzip"    id="fieldzip" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
                          <?php
                      }
                    ?>   
                        
                  
                  
                     </div>
                </div>
                <hr>
                <?php
                    if($statuss == 1) { 
                        ?>
                      <p style="color:grey;font-size:12px"><i class="fas fa-info-circle"></i> Note : Provide a VALID Billing address to avoid problems  </p>
                <button class="btn btn-success proceedemail form-control" onclick="off()"  type="submit"name="btnproceeds">Set & Proceed</button>
                <?php
                    }
                ?>
                
                
                
                 <a href="index.php" style="margin-top:-50px;" class="btn btn-dark form-control">Close</a>
            </div>
            </div>
        </div>
        <script>
       

function off() {
  document.getElementById("overlay").style.display = "none";
 
 
}
function on() { 
    document.getElementById("overlay").style.display = "block"; 
}
</script>

        <input type="radio" id="typepickup"  onclick="pickupclick()" name="typetrans" value="pickup" required>
         Pick Up
        
         <p></p>
         <img src="https://st2.depositphotos.com/1031343/6862/v/450/depositphotos_68629545-stock-illustration-cash-on-delivery-stamp.jpg" class="rounded" style="width:50px">
         <img src="https://th.bing.com/th/id/OIP.cTB_Gv2EYd2tckq3Aft4DAHaHa?pid=ImgDet&rs=1" class="rounded" style="width:50px">
        </div>
       
        <div class="subtotal-title">Subtotal</div>
          <div class="subtotal-value final-value" id="basket-subtotal">
               <?php 
                    $overallcod = $amountdue + 100 -  $dis;
                     $overallpickup = $amountdue  -  $dis;
         $selectavil = " SELECT * FROM `sales_discount` where sal_id = '1' ";
                       $resultavil = mysqli_query($con,$selectavil); // run query
                       $count= mysqli_num_rows($resultavil); // to count if necessary
                  
                       
                        while($row = mysqli_fetch_array($resultavil)){
                                $am=  $row['amount'];
                        }
                 
 
                    
                ?>
              <script>
                    var amounttoreach = <?php echo $am?>;
                    var amountdue = <?php echo $amountdue?> ;
                            if(amountdue >=  amounttoreach) { 
                                
                                document.getElementById('promo-code').disabled = false; 
                                document.getElementById('promo-codebtn').disabled = false; 
                               document.getElementById('maximum').innerHTML=""; 
                            }else {
                                document.getElementById('maximum').innerHTML="<i class='fas fa-info-circle'></i>  Must reach the maximum amount of  ₱<?php echo $am?>  To Avail promo ..";
                                document.getElementById('promo-code').disabled = true;
                                document.getElementById('promo-codebtn').disabled = true; 
                                 document.getElementById('basket-total').innerHTML="<?php echo $amountdue?>";
                                  
                            }
                    function codclick() {
                         document.getElementById('unsetbill').classList.remove('d-none');
                      document.getElementById('codlive').innerHTML="<p style='font-size:14px'>Shipping Fee : <span style='float:right'> ₱100</span></p>";
                      document.getElementById("overlay").style.display = "block";
                      document.getElementById("fieldadd").focus();
                    
                      
                   
                   
                       <?php 
                        if($foo == true) { 
                            ?>
                             document.getElementById('basket-total').innerHTML="<?php echo $overallcod?>";
                            document.getElementById('basket-tots').innerHTML="<input type='hidden' id='totalamountdue' name='totalamount' value=<?php echo $overallcod ?>>";
                            
                            document.getElementById('basket-truth').innerHTML="<input type='hidden' id='totalamountdue' name='truths' value='promo'>";
                            document.getElementById('basket-promoid').innerHTML="<input type='hidden' id='totalamountdue' name='promo_ids' value=<?php echo $promoids ?>>";
                           
                            <?php
                        }else {
                           ?>
                             document.getElementById('basket-total').innerHTML="<?php echo $overallcod?>";
                            document.getElementById('basket-tots').innerHTML="<input type='hidden' id='totalamountdue' name='totalamount' value=<?php echo $overallcod?>>";
                            document.getElementById('basket-truth').innerHTML="<input type='hidden' id='totalamountdue' name='truths' value='nopromo'>";
                            <?php 
                        }
                       ?>
                        
                        
                         <?php 
                            $codtrue = true;
                         
                         ?>
                    
                    }
                    function pickupclick(){
                        document.getElementById('codlive').innerHTML="";
                          document.getElementById('unsetbill').classList.add('d-none');
                        document.getElementById("fieldaddr").required = false;
                     document.getElementById("fieldcity").required = false;
                     document.getElementById("fieldzip").required = false;
                        <?php
                        $pickup= true;
                            if($foo == true) {
                              ?>
                               document.getElementById('basket-total').innerHTML="<?php echo  $overallpickup?>";
                               document.getElementById('basket-tots').innerHTML="<input type='hidden' id='totalamountdue' name='totalamount' value=<?php echo $overallpickup?>> ";
                               document.getElementById('basket-truth').innerHTML="<input type='hidden' id='totalamountdue' name='truths' value='promo'>";
                                document.getElementById('basket-promoid').innerHTML="<input type='hidden' id='totalamountdue' name='promo_ids' value=<?php echo $promoids ?>>";
                                
                              <?php
                            }else {
                              ?>
                               document.getElementById('basket-total').innerHTML="<?php echo  $amountdue?>";
                               document.getElementById('basket-tots').innerHTML="<input type='hidden' id='totalamountdue' name='totalamount' value=<?php echo $amountdue?>> ";
                                document.getElementById('basket-truth').innerHTML="<input type='hidden' id='totalamountdue' name='truths' value='nopromo'>";
                              
                              <?php   
                            }
                        ?>
                         
                    }
                    
              </script>
              <?php echo  $amountdue?></div>
              <div id="codlive">
                  
              </div>
             
               <!--<p style="font-size:14px">Promocode : <span style="float:right"> - ₱50</span></p> -- >
               
               <!--<p style="font-size:14px">Promocode : <span style="float:right">  ---</span></p>-->
               
               <!-- <p style="font-size:14px">Shipping Fee : <span style="float:right"> ₱100</span></p> -->
               
                <!-- <p style="font-size:14px">Shipping Fee : <span style="float:right"> ---</span></p>-->
               <div id="promominus" style="font-size:14px"></div>
               <?php 
               if ($foo == true) {
                 ?>
                 <p style="font-size:14px;">Promocode : <span style='float:right'> - ₱<?php echo $dis?></span></p>
                 
                 <?php
                 $totalwpromo =$amountdue - $dis;
               }
               
               ?>
        <div class="summary-total">
          <div class="total-title">Total</div>
          <div class="total-value final-value" id="basket-total">
              
              <?php
              
             if($foo == true) {
                 echo  $totalwpromo;
                 
             }else {
                 echo $amountdue;
                 
             }
           
             /*
             
             $amountdue (amountdue of pickup w/no promocode)
             $overallcod (total amount due of cod shipping fee and promocode ..)
             $overallpickup (total amount due of pick up w/promocode)
             */
            
              ?>
              
               
               
              </div>
              <div id="basket-tots"> </div>
              <div id="basket-truth"> </div>
              <div id="basket-promoid"></div>
        </div>
        <div class="summary-checkout">
          <button type="submit" id="changeletter"  name="btnproceeds" class="checkout-cta btn btn-dark">PROCEED</button>
        
        </div>
      </div>
</aside>
</form>

</main>




</article>



<div class="slider_for_shoppingcart"></div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="../js/shoppingcart.js"></script>
<script src="../js/nav.js"></script>
</body>

</html> 
	  <?php
	}else if(isset($_SESSION['user_id'])) {/////////////////////////////////////////////////////////////////////////////////////////Personal login
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
<link rel="stylesheet" type="text/css" href="../css/homepage.css?v=4685" />

<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Titillium+Web:wght@600&display=swap" rel="stylesheet">

<link rel="stylesheet" type="text/css" href="../css/shoppingcart.css?v=2630" />

</head>
<title>Shopping Cart</title>
<?php 
    include '../admin/connection/connect.php';
?>
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
        <li id="shoppingcartplacing"><a href="../orders/orders.php"><span style="font-size: 1.5rem;"><span style="color: #333333;"><i class="fas fa-shopping-cart"></i></span></span> MY ORDERS</a></li>
        
    </ul>
    <div class="burger">
        <div class="line1"></div>
        <div class="line2"></div>
        <div class="line3"></div>
    </div>	
</nav>



<article>

    <main>
<div class="row">
  <br><br>
  <?php
   if(isset($_POST['btnremove'])) {
        $cartno = $_POST['cartno'];
      
            $sql = "DELETE FROM `cart` WHERE cart_id = '$cartno' ";
             $result = mysqli_query($con,$sql); // run query
             if($result) {
                ?>
      <span style="color:rgb(128,0,0);margin-top:4.3%;font-family:Evogria;font-weight:bolder" id="hidenote">Item has been removed</span>
      <script>
        
          setInterval(function(){   document.getElementById('hidenote').setAttribute('style','display:none'); }, 3000);
      </script>
       <?php 
             }
                
       
   }
   if(isset($_POST['qtychange'])) {
       $qty = $_POST['qtychange'];
       $cartno = $_POST['cartno'];
                          $sql = " select * from cart where cart_id = '$cartno'  ";
 						                $result = mysqli_query($con,$sql); // run query
 						                $count= mysqli_num_rows($result); // to count if necessary
 						         
 						                 while($row = mysqli_fetch_array($result)){
 						                            $prod_id = $row['prod_id'];
 						                 }
 						 
 						
 						 $getprice = "select * from product where prod_id = '$prod_id'";
             						  $getpriceres = mysqli_query($con,$getprice); // run query
             						   while($row = mysqli_fetch_array($getpriceres)){
             						                            $price= $row['price'];
 						                 }
 						                 
 						        $overallamountdue = $qty * $price;  
 						        
 						        ////update
 						        
 						        $updatecart = "update cart set `qty`='$qty', `total` = '$overallamountdue' where cart_id = '$cartno' ";
 						                    $resultupdate= mysqli_query($con,$updatecart);
 						                    if ($resultupdate) {
 						                     ?>
                                      <span style="color:green;margin-top:4.3%;font-family:Evogria;font-weight:bolder" id="hidenote">Quantity Changed  <i class='fas fa-check-circle'></i> </span>
                                      <script>
                                        
                                          setInterval(function(){   document.getElementById('hidenote').setAttribute('style','display:none'); }, 3000);
                                      </script>
                                       <?php    
 						                    }
 						       
         
   }
  ?>
  <br>
</div>  
<div class="basket-module" >
        <label for="promo-code">Choose a promotional code</label>
        <form method="post">
            <div class="btn-group" role="group" aria-label="Basic example">
        <select name="promoselect" id="promo-code" class="form-select" style="width:300px;font-size:13px" disabled >
            <option>Select Promocodes</option>
            <?php 
                  $sqlcodes = " select * from promocodes ";
                              $resultcodes = mysqli_query($con,$sqlcodes); // run query
                            
                             
                               while($row = mysqli_fetch_array($resultcodes)){
                                ?>
                                  <option type="submit"  value="<?php echo $row['promo_id']?>"><?php echo $row['code']?> -> Discount Amount : ₱ <?php echo $row['discount']?></span></option>
                                <?php
                               }
                        
            
            ?>
      
       
        </select>
        <button class="btn btn-dark" style="font-size:12px;"  id="promo-codebtn" disabled>Apply</button>
        </div>
        </form>
       <h6 id="maximum">
       </h6>
      
      </div>
 
 <style>
.emptycart{
    margin-top:5%;
    font-family:Evogria;
    font-weight:bolder;
    margin: 20%;
}
</style>  
   
    
<div class="basket" style="overflow-y: scroll; height: 500px;">

    
    <div class="basket-labels">
        <ul>
          <li class="item item-heading">Item</li>
          <li class="price">₱</li>
          <li class="quantity">Ǭ</li>
          <li class="subtotal">Subtotal</li>
        </ul>
    </div>
	   <?php 
	 $userid=$_SESSION['user_id'];
	   
			   
                             
                             
	   
	         $sqlall = " SELECT * FROM `cartview` WHERE user_id = '$userid' "; /////////////////////////////////////////TODO
                             $resulta = mysqli_query($con,$sqlall); // run query
                           
                           $count= mysqli_num_rows($resulta); // to count if necessary
                              if ($count>=1){
                                $amountdue= 0;
                              //while($row = mysqli_fetch_array($result)){} is where we output all the data in database
                              while($row = mysqli_fetch_array($resulta)){
                                    $image = $row['photo'];
                           if ($image == 'th.jfif') {
                              $image_src ="../admin/".$image;
                          }else {
                            $image_src = "../admin/bin/Item_Images/".$image;  
                          }
                          $amountdue += $row['total'];
                          $prodid = $row['prod_id'];
                          $cartid =$row['cart_id'];
                         
                               ?>
                               	<!-- ITEM 1 -->    
                                    <div class="basket-product">
                                        <div class="item">
                                          <div class="product-image">
                                            <img src="<?php echo $image_src?>" alt="Placholder Image 2" class="product-frame" height="100">
                                          </div>
                                          <div class="product-details">
                                            <h1><b><span class="item-quantity"><?php echo $row['qty']?></span> x </b> <span style="text-transform:uppercase"><?php echo $row['name']?></span></h1>
                                            <p><b>Product Code</b><br><strong><?php echo $row['prod_id']?></strong></p>
                                          </div>
                                        </div>
                                        <div class="price"><?php echo $row['price']?></div>
                                        <div class="quantity">
                                           
                                            <form method="post">
                                                  <input type="hidden" value="<?php echo $row['cart_id']?>" name="cartno">
                                          <input type="number"  name="qtychange" value="<?php echo $row['qty']?>" min="1" class="quantity-field">
                                          <p style="font-size:12px">Press <button type="submit">Enter</button> to Update Quantity</p>
                                          </form>
                                          
                                        </div>
                                     
                                        <div class="subtotal"><?php echo $row['total']?></div>
                                       
                                        <div class="remove">
                                            <form method="post">
                                                <input type="hidden" value="<?php echo $row['cart_id']?>" name="cartno">
                                      
                                          <button type="submit" name="btnremove">Remove</button>
                                          </form>
                                         
                                        </div>
                                    </div>
	
<!---->
	  
                               <?php
                              }
                              } else {
                                    ?>
                                               <h4 class="emptycart">Your Cart is Empty <i class="fas fa-cog fa-spin"></i> <br>  <a style="color:white" href="https://hantechdesign.com/category">CLICK HERE</a> to make some order.</h4>
                                               
                                    <?php
                              }
                       
    	?>

 
	  
</div>
<?php 

                            $cartcounta = "select * from cart where user_id = '$userid'";
                            $resultcart = mysqli_query($con,$cartcounta); // run query
                         
                             $countcart= 0;
                              while($row = mysqli_fetch_array($resultcart)){ 
                                
                                
                            $countcart += $row['qty'];
                          }
                             
                           
                             
?>

<form method="post" action="../orders/index.php" >
    
<aside style="margin-top:-120px">
      <div class="summary">
        <div class="summary-total-items"><span id="itemscount"><?php echo $countcart?></span> Items in your Bag</div>
        <div class="summary-subtotal">
            <?php
            if (isset($_POST['promoselect'])) {
                $promoid = $_POST['promoselect'];
                $foo = true;
                
                 $userid=$_SESSION['user_id'];
		
			     
                              
                 $checktrans = "select * from trans_record where user_id='$userid' and promo_id = '$promoid'";
                  $resll = mysqli_query($con,$checktrans); 
                    $countp= mysqli_num_rows($resll);
                    if($countp >=1 ) {
                        ?>
                        
                         <h6 style="font-size:11px;color:red">Were sorry but you have already used this Code.</h6>
                        <?php
                    }else {
                            $sqlcodess = " select * from promocodes where promo_id = '$promoid' ";
                              $resultcodess = mysqli_query($con,$sqlcodess); // run query
                            
                             
                               while($row = mysqli_fetch_array($resultcodess)){
                                   $dis = $row['discount'];
                                   $promoids = $row['promo_id'];
                                ?>
                                 <p style="font-size:14px;">Promocode <br> <span style="font-zie:12px;">Code :<?php echo $row['code']?> <br> Value : ₱ <?php echo $dis?></span> </p>
                                <?php
                               } 
                    }
             
                        
            
             
            }else {
                ?>
                <p style="font-size:14px;">Promocode <br> None</p>
                <?php
            }
            ?>
          
            <!---->
           
          <div class="summary-promo hide">
            <div class="promo-title">Promotion</div>
            <div class="promo-value final-value" id="basket-promo"></div>
          </div>
        </div>
        <div class="summary-delivery">
         
         
        
        <p class="selected">Type Of Transaction:</p>
        <p></p>
      
        <input type="radio" id="typecod" onclick="codclick()" name="typetrans" value="cod" required>
         Cash on Delivery 
           <p id="unsetbill" class="d-none"  style="color:grey;font-size:12px;cursor:default"> <i class="fas fa-info-circle" data-toggle="tooltip" data-placement="right" title="Unable to Proceed"></i> If it doesnt proceed. then you need to set Billing Address <br>
           Click <a href="javascript:void(0)" onclick="on()">HERE</a> to set </p>
        <p></p>
      
        <style>
#overlay {
  position: fixed;
  display: none;
  width: 100%;
  height: 100%;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: rgba(0,0,0,0.5);
  z-index: 2;
  cursor: pointer;
}

#text{
  position: absolute;
  top: 50%;
  left: 50%;
  font-size: 50px;
  color: black;
  transform: translate(-50%,-50%);
  -ms-transform: translate(-50%,-50%);
  height:auto;
  background-color:white;
  width:40%;
}
</style>
       <div id="overlay" >
           <div id="text">
            <div class="container" background-color:white>
                <div class="row">
                    <p></p>
                    
                        <div class="container">
                            
                    <?php
                    $userid=$_SESSION['user_id'];
		
			  
                    $selectacc = "select * from user_account where user_id = '$userid'";
                     $run = mysqli_query($con,$selectacc); // run query
                      while($out = mysqli_fetch_array($run)){
                         $statuss= $out['status'];
                         $contact = $out['contact_no'];
                      }
                      
                      if($statuss == 0) {
                            if ($contact == '') {
                                  ?>
                          <p></p>
                         <h5>You Haven't Set yet Any Contact Number</h5>
                         <h6>Set it first to proceed Cash on Delivery Order</h6><p></p><p><br></p>
                            <h6>Homepage ➤ MyAccount</h6>
                         <h6><a href="https://hantechdesign.com/" style="color:#c8c6a7;font-family:Evogria;font-size:1.5rem;">Set it at Homepage</a></h6>
                         
                          <?php
                            }else {
                                ?>
                                 <p></p>
                         <h5>Your Contact Number is <span style="color:red">NOT</span> Yet Verified..</h5>
                         <h6>Verify it first to proceed Cash on Delivery order</h6><p></p><p><br></p>
                        
                         <h6><a href="cartverification.php?userid=<?php echo $userid?>">Click HERE to Verify Contact Number!</a></h6>
                         
                          <?php
                            }
                       
                         
                      }else {
                          ?>
                        <p></p>
                        <h5>Billing Address</h5>
                        <p style="color:grey;font-size:12px"><i class="fas fa-info-circle"></i> This field is Required to proceed COD </p>
                       
                      <p></p>
                      <label style="font-size:17px;">Address <span style="color:grey;font-size:12px;"> ( Ex. Zone 1 , Ayala ) </span></label>
                    <input class="form-control " type="text" name="txtaddr" required   id="fieldaddr">
                    <p></p>
                     <label style="font-size:17px;">City <span style="color:grey;font-size:12px;"> ( Ex. Zamboanga City ) </span></label>
                     <input class="form-control " type="text" name="txtcity" required   id="fieldcity">
                      <p></p>
                      <label style="font-size:17px;">Zip code <span style="color:grey;font-size:12px;"> (Ex. 7000 ) </span></label>
                     <input class="form-control " type="text" maxlength='4'  required name="txtzip"    id="fieldzip" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
                          <?php
                      }
                    ?>   
                        
                  
                  
                     </div>
                </div>
                <hr>
                <?php
                    if($statuss == 1) { 
                        ?>
                      <p style="color:grey;font-size:12px"><i class="fas fa-info-circle"></i> Note : Provide a VALID Billing address to avoid problems  </p>
                <button class="btn btn-success proceedemail form-control" onclick="off()"  type="submit"name="btnproceeds">Set & Proceed</button>
                <?php
                    }
                ?>
                
                
                
                 <a href="index.php" style="margin-top:-50px;" class="btn btn-dark form-control">Close</a>
            </div>
            </div>
        </div>
        <script>
       

function off() {
  document.getElementById("overlay").style.display = "none";
 
 
}
function on() { 
    document.getElementById("overlay").style.display = "block"; 
}
</script>

        <input type="radio" id="typepickup"  onclick="pickupclick()" name="typetrans" value="pickup" required>
         Pick Up
        
         <p></p>
         <img src="https://st2.depositphotos.com/1031343/6862/v/450/depositphotos_68629545-stock-illustration-cash-on-delivery-stamp.jpg" class="rounded" style="width:50px">
         <img src="https://th.bing.com/th/id/OIP.cTB_Gv2EYd2tckq3Aft4DAHaHa?pid=ImgDet&rs=1" class="rounded" style="width:50px">
        </div>
       
        <div class="subtotal-title">Subtotal</div>
          <div class="subtotal-value final-value" id="basket-subtotal">
               <?php 
                    $overallcod = $amountdue + 100 -  $dis;
                     $overallpickup = $amountdue  -  $dis;
         $selectavil = " SELECT * FROM `sales_discount` where sal_id = '1' ";
                       $resultavil = mysqli_query($con,$selectavil); // run query
                       $count= mysqli_num_rows($resultavil); // to count if necessary
                  
                       
                        while($row = mysqli_fetch_array($resultavil)){
                                $am=  $row['amount'];
                        }
                 
 
                    
                ?>
              <script>
                    var amounttoreach = <?php echo $am?>;
                    var amountdue = <?php echo $amountdue?> ;
                            if(amountdue >=  amounttoreach) { 
                                
                                document.getElementById('promo-code').disabled = false; 
                                document.getElementById('promo-codebtn').disabled = false; 
                               document.getElementById('maximum').innerHTML=""; 
                            }else {
                                document.getElementById('maximum').innerHTML="<i class='fas fa-info-circle'></i>  Must reach the maximum amount of  ₱<?php echo $am?>  To Avail promo ..";
                                document.getElementById('promo-code').disabled = true;
                                document.getElementById('promo-codebtn').disabled = true; 
                                 document.getElementById('basket-total').innerHTML="<?php echo $amountdue?>";
                                  
                            }
                    function codclick() {
                         document.getElementById('unsetbill').classList.remove('d-none');
                      document.getElementById('codlive').innerHTML="<p style='font-size:14px'>Shipping Fee : <span style='float:right'> ₱100</span></p>";
                      document.getElementById("overlay").style.display = "block";
                      document.getElementById("fieldadd").focus();
                    
                      
                   
                   
                       <?php 
                        if($foo == true) { 
                            ?>
                             document.getElementById('basket-total').innerHTML="<?php echo $overallcod?>";
                            document.getElementById('basket-tots').innerHTML="<input type='hidden' id='totalamountdue' name='totalamount' value=<?php echo $overallcod ?>>";
                            
                            document.getElementById('basket-truth').innerHTML="<input type='hidden' id='totalamountdue' name='truths' value='promo'>";
                            document.getElementById('basket-promoid').innerHTML="<input type='hidden' id='totalamountdue' name='promo_ids' value=<?php echo $promoids ?>>";
                           
                            <?php
                        }else {
                           ?>
                             document.getElementById('basket-total').innerHTML="<?php echo $overallcod?>";
                            document.getElementById('basket-tots').innerHTML="<input type='hidden' id='totalamountdue' name='totalamount' value=<?php echo $overallcod?>>";
                            document.getElementById('basket-truth').innerHTML="<input type='hidden' id='totalamountdue' name='truths' value='nopromo'>";
                            <?php 
                        }
                       ?>
                        
                        
                         <?php 
                            $codtrue = true;
                         
                         ?>
                    
                    }
                    function pickupclick(){
                        document.getElementById('codlive').innerHTML="";
                          document.getElementById('unsetbill').classList.add('d-none');
                        document.getElementById("fieldaddr").required = false;
                     document.getElementById("fieldcity").required = false;
                     document.getElementById("fieldzip").required = false;
                        <?php
                        $pickup= true;
                            if($foo == true) {
                              ?>
                               document.getElementById('basket-total').innerHTML="<?php echo  $overallpickup?>";
                               document.getElementById('basket-tots').innerHTML="<input type='hidden' id='totalamountdue' name='totalamount' value=<?php echo $overallpickup?>> ";
                               document.getElementById('basket-truth').innerHTML="<input type='hidden' id='totalamountdue' name='truths' value='promo'>";
                                document.getElementById('basket-promoid').innerHTML="<input type='hidden' id='totalamountdue' name='promo_ids' value=<?php echo $promoids ?>>";
                                
                              <?php
                            }else {
                              ?>
                               document.getElementById('basket-total').innerHTML="<?php echo  $amountdue?>";
                               document.getElementById('basket-tots').innerHTML="<input type='hidden' id='totalamountdue' name='totalamount' value=<?php echo $amountdue?>> ";
                                document.getElementById('basket-truth').innerHTML="<input type='hidden' id='totalamountdue' name='truths' value='nopromo'>";
                              
                              <?php   
                            }
                        ?>
                         
                    }
                    
              </script>
              <?php echo  $amountdue?></div>
              <div id="codlive">
                  
              </div>
             
               <!--<p style="font-size:14px">Promocode : <span style="float:right"> - ₱50</span></p> -- >
               
               <!--<p style="font-size:14px">Promocode : <span style="float:right">  ---</span></p>-->
               
               <!-- <p style="font-size:14px">Shipping Fee : <span style="float:right"> ₱100</span></p> -->
               
                <!-- <p style="font-size:14px">Shipping Fee : <span style="float:right"> ---</span></p>-->
               <div id="promominus" style="font-size:14px"></div>
               <?php 
               if ($foo == true) {
                 ?>
                 <p style="font-size:14px;">Promocode : <span style='float:right'> - ₱<?php echo $dis?></span></p>
                 
                 <?php
                 $totalwpromo =$amountdue - $dis;
               }
               
               ?>
        <div class="summary-total">
          <div class="total-title">Total</div>
          <div class="total-value final-value" id="basket-total">
              
              <?php
              
             if($foo == true) {
                 echo  $totalwpromo;
                 
             }else {
                 echo $amountdue;
                 
             }
           
             /*
             
             $amountdue (amountdue of pickup w/no promocode)
             $overallcod (total amount due of cod shipping fee and promocode ..)
             $overallpickup (total amount due of pick up w/promocode)
             */
            
              ?>
              
               
               
              </div>
              <div id="basket-tots"> </div>
              <div id="basket-truth"> </div>
              <div id="basket-promoid"></div>
        </div>
        <div class="summary-checkout">
          <button type="submit" id="changeletter"  name="btnproceeds" class="checkout-cta btn btn-dark">PROCEED</button>
        
        </div>
      </div>
</aside>
</form>

</main>




</article>



<div class="slider_for_shoppingcart"></div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="../js/shoppingcart.js"></script>
<script src="../js/nav.js"></script>
</body>

</html> 
	  <?php
	  /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////usertemp
	}else if(isset($_SESSION['temp'])){
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
<link rel="stylesheet" type="text/css" href="../css/homepage.css?v=4685" />

<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Titillium+Web:wght@600&display=swap" rel="stylesheet">

<link rel="stylesheet" type="text/css" href="../css/shoppingcart.css?v=2630" />

</head>
<title>Shopping Cart</title>
<?php 
    include '../admin/connection/connect.php';
?>
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
        <li id="shoppingcartplacing"><a href="../orders/orders.php"><span style="font-size: 1.5rem;"><span style="color: #333333;"><i class="fas fa-shopping-cart"></i></span></span> MY ORDERS</a></li>
        
    </ul>
    <div class="burger">
        <div class="line1"></div>
        <div class="line2"></div>
        <div class="line3"></div>
    </div>	
</nav>



<article>

    <main>
<div class="row">
  <br><br>
  <?php
   if(isset($_POST['btnremove'])) {
        $cartno = $_POST['cartno'];
      
            $sql = "DELETE FROM `cart` WHERE cart_id = '$cartno' ";
             $result = mysqli_query($con,$sql); // run query
             if($result) {
                ?>
      <span style="color:rgb(128,0,0);margin-top:4.3%;font-family:Evogria;font-weight:bolder" id="hidenote">Item has been removed</span>
      <script>
        
          setInterval(function(){   document.getElementById('hidenote').setAttribute('style','display:none'); }, 3000);
      </script>
       <?php 
             }
                
       
   }
   if(isset($_POST['qtychange'])) {
       $qty = $_POST['qtychange'];
       $cartno = $_POST['cartno'];
                          $sql = " select * from cart where cart_id = '$cartno'  ";
 						                $result = mysqli_query($con,$sql); // run query
 						                $count= mysqli_num_rows($result); // to count if necessary
 						         
 						                 while($row = mysqli_fetch_array($result)){
 						                            $prod_id = $row['prod_id'];
 						                 }
 						 
 						
 						 $getprice = "select * from product where prod_id = '$prod_id'";
             						  $getpriceres = mysqli_query($con,$getprice); // run query
             						   while($row = mysqli_fetch_array($getpriceres)){
             						                            $price= $row['price'];
 						                 }
 						                 
 						        $overallamountdue = $qty * $price;  
 						        
 						        ////update
 						        
 						        $updatecart = "update cart set `qty`='$qty', `total` = '$overallamountdue' where cart_id = '$cartno' ";
 						                    $resultupdate= mysqli_query($con,$updatecart);
 						                    if ($resultupdate) {
 						                     ?>
                                      <span style="color:green;margin-top:4.3%;font-family:Evogria;font-weight:bolder" id="hidenote">Quantity Changed  <i class='fas fa-check-circle'></i> </span>
                                      <script>
                                        
                                          setInterval(function(){   document.getElementById('hidenote').setAttribute('style','display:none'); }, 3000);
                                      </script>
                                       <?php    
 						                    }
 						       
         
   }
  ?>
  <br>
</div>  
<div class="basket-module" >
        <label for="promo-code">Choose a promotional code</label>
        <form method="post">
            <div class="btn-group" role="group" aria-label="Basic example">
        <select name="promoselect" id="promo-code" class="form-select" style="width:300px;font-size:13px" disabled >
            <option>Select Promocodes</option>
           
      
       
        </select>
        <button class="btn btn-dark" style="font-size:12px;"  id="promo-codebtn" disabled>Apply</button>
        </div>
        </form>
       <h6 id="maximum">
       </h6>
      
      </div>
 
 <style>
.emptycart{
    margin-top:5%;
    font-family:Evogria;
    font-weight:bolder;
    margin: 20%;
}
</style>  
   
    
<div class="basket" style="overflow-y: scroll; height: 500px;">

    
    <div class="basket-labels">
        <ul>
          <li class="item item-heading">Item</li>
          <li class="price">₱</li>
          <li class="quantity">Ǭ</li>
          <li class="subtotal">Subtotal</li>
        </ul>
    </div>
	   <?php 
	 
	 $userid= $_SESSION['temp'];
	   
			   
                             
                             
	   
	         $sqlall = " SELECT * FROM `cartviewnoid` WHERE user_id = '$userid' "; /////////////////////////////////////////TODO
                             $resulta = mysqli_query($con,$sqlall); // run query
                           
                           $count= mysqli_num_rows($resulta); // to count if necessary
                              if ($count>=1){
                                $amountdue= 0;
                              //while($row = mysqli_fetch_array($result)){} is where we output all the data in database
                              while($row = mysqli_fetch_array($resulta)){
                                    $image = $row['photo'];
                           if ($image == 'th.jfif') {
                              $image_src ="../admin/".$image;
                          }else {
                            $image_src = "../admin/bin/Item_Images/".$image;  
                          }
                          $amountdue += $row['total'];
                          $prodid = $row['prod_id'];
                          $cartid =$row['cart_id'];
                         
                               ?>
                               	<!-- ITEM 1 -->    
                                    <div class="basket-product">
                                        <div class="item">
                                          <div class="product-image">
                                            <img src="<?php echo $image_src?>" alt="Placholder Image 2" class="product-frame" height="100">
                                          </div>
                                          <div class="product-details">
                                            <h1><b><span class="item-quantity"><?php echo $row['qty']?></span> x </b> <span style="text-transform:uppercase"><?php echo $row['name']?></span></h1>
                                            <p><b>Product Code</b><br><strong><?php echo $row['prod_id']?></strong></p>
                                          </div>
                                        </div>
                                        <div class="price"><?php echo $row['price']?></div>
                                        <div class="quantity">
                                           
                                            <form method="post">
                                                  <input type="hidden" value="<?php echo $row['cart_id']?>" name="cartno">
                                          <input type="number"  name="qtychange" value="<?php echo $row['qty']?>" min="1" class="quantity-field">
                                          <p style="font-size:12px">Press <button type="submit">Enter</button> to Update Quantity</p>
                                          </form>
                                          
                                        </div>
                                     
                                        <div class="subtotal"><?php echo $row['total']?></div>
                                       
                                        <div class="remove">
                                            <form method="post">
                                                <input type="hidden" value="<?php echo $row['cart_id']?>" name="cartno">
                                      
                                          <button type="submit" name="btnremove">Remove</button>
                                          </form>
                                         
                                        </div>
                                    </div>
	
<!---->
	  
                               <?php
                              }
                              } else {
                                    ?>
                                               <h4 class="emptycart">Your Cart is Empty <i class="fas fa-cog fa-spin"></i> <br>  <a style="color:white" href="https://hantechdesign.com/category">CLICK HERE</a> to make some order.</h4>
                                               
                                    <?php
                              }
                       
    	?>

 
	  
</div>
<?php 
 $userid=$_SESSION['temp'];

                            $cartcounta = "select * from cart where user_id = '$userid'";
                            $resultcart = mysqli_query($con,$cartcounta); // run query
                         
                             $countcart= 0;
                              while($row = mysqli_fetch_array($resultcart)){ 
                                
                                
                            $countcart += $row['qty'];
                          }
                             
                           
                             
?>


    
<aside style="margin-top:-120px;">
      <div class="summary" >
        <div class="summary-total-items"><span id="itemscount"><?php echo $countcart?></span> Items in your Bag</div>
        <div class="summary-subtotal">
            <?php
            if (isset($_POST['promoselect'])) {
                $promoid = $_POST['promoselect'];
                $foo = true;
                
                 $userid=$_SESSION['user_id'];
		
			     
                              
                 $checktrans = "select * from trans_record where user_id='$userid' and promo_id = '$promoid'";
                  $resll = mysqli_query($con,$checktrans); 
                    $countp= mysqli_num_rows($resll);
                    if($countp >=1 ) {
                        ?>
                        
                         <h6 style="font-size:11px;color:red">Were sorry but you have already used this Code.</h6>
                        <?php
                    }else {
                            $sqlcodess = " select * from promocodes where promo_id = '$promoid' ";
                              $resultcodess = mysqli_query($con,$sqlcodess); // run query
                            
                             
                               while($row = mysqli_fetch_array($resultcodess)){
                                   $dis = $row['discount'];
                                   $promoids = $row['promo_id'];
                                ?>
                                 <p style="font-size:14px;">Promocode <br> <span style="font-zie:12px;">Code :<?php echo $row['code']?> <br> Value : ₱ <?php echo $dis?></span> </p>
                                <?php
                               } 
                    }
             
                        
            
             
            }else {
                ?>
                <p style="font-size:14px;">Promocode <br> None</p>
                <?php
            }
            ?>
          
            <!---->
           
          <div class="summary-promo hide">
            <div class="promo-title">Promotion</div>
            <div class="promo-value final-value" id="basket-promo"></div>
          </div>
        </div>
        <div class="summary-delivery">
         
         
        
        <p class="selected">Type Of Transaction:</p>
        <p></p>
      
        <input type="radio" disabled id="typecod" onclick="codclick()" name="typetrans" value="cod" required>
         Cash on Delivery 
           <p id="unsetbill" class="d-none"  style="color:grey;font-size:12px;cursor:default"> <i class="fas fa-info-circle" data-toggle="tooltip" data-placement="right" title="Unable to Proceed"></i> If it doesnt proceed. then you need to set Billing Address <br>
           Click <a href="javascript:void(0)" onclick="on()">HERE</a> to set </p>
        <p></p>
      
        <style>
#overlay {
  position: fixed;
  display: none;
  width: 100%;
  height: 100%;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: rgba(0,0,0,0.5);
  z-index: 2;
  cursor: pointer;
}

#text{
  position: absolute;
  top: 50%;
  left: 50%;
  font-size: 50px;
  color: black;
  transform: translate(-50%,-50%);
  -ms-transform: translate(-50%,-50%);
  height:auto;
  background-color:white;
  width:40%;
}
</style>
       <div id="overlay" >
           <div id="text">
            <div class="container" background-color:white>
                <div class="row">
                    <p></p>
                    
                        <div class="container">
                            
                    <?php
                    $userid=$_SESSION['user_id'];
		
			  
                    $selectacc = "select * from user_account where user_id = '$userid'";
                     $run = mysqli_query($con,$selectacc); // run query
                      while($out = mysqli_fetch_array($run)){
                         $statuss= $out['status'];
                         $contact = $out['contact_no'];
                      }
                      
                      if($statuss == 0) {
                            if ($contact == '') {
                                  ?>
                          <p></p>
                         <h5>You Haven't Set yet Any Contact Number</h5>
                         <h6>Set it first to proceed Cash on Delivery Order</h6><p></p><p><br></p>
                            <h6>Homepage ➤ MyAccount</h6>
                         <h6><a href="https://hantechdesign.com/" style="color:#c8c6a7;font-family:Evogria;font-size:1.5rem;">Set it at Homepage</a></h6>
                         
                          <?php
                            }else {
                                ?>
                                 <p></p>
                         <h5>Your Contact Number is <span style="color:red">NOT</span> Yet Verified..</h5>
                         <h6>Verify it first to proceed Cash on Delivery order</h6><p></p><p><br></p>
                        
                         <h6><a href="cartverification.php?userid=<?php echo $userid?>">Click HERE to Verify Contact Number!</a></h6>
                         
                          <?php
                            }
                       
                         
                      }else {
                          ?>
                        <p></p>
                        <h5>Billing Address</h5>
                        <p style="color:grey;font-size:12px"><i class="fas fa-info-circle"></i> This field is Required to proceed COD </p>
                       
                      <p></p>
                      <label style="font-size:17px;">Address <span style="color:grey;font-size:12px;"> ( Ex. Zone 1 , Ayala ) </span></label>
                    <input class="form-control " type="text" name="txtaddr" required   id="fieldaddr">
                    <p></p>
                     <label style="font-size:17px;">City <span style="color:grey;font-size:12px;"> ( Ex. Zamboanga City ) </span></label>
                     <input class="form-control " type="text" name="txtcity" required   id="fieldcity">
                      <p></p>
                      <label style="font-size:17px;">Zip code <span style="color:grey;font-size:12px;"> (Ex. 7000 ) </span></label>
                     <input class="form-control " type="text" maxlength='4'  required name="txtzip"    id="fieldzip" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
                          <?php
                      }
                    ?>   
                        
                  
                  
                     </div>
                </div>
                <hr>
                <?php
                    if($statuss == 1) { 
                        ?>
                      <p style="color:grey;font-size:12px"><i class="fas fa-info-circle"></i> Note : Provide a VALID Billing address to avoid problems  </p>
                <button class="btn btn-success proceedemail form-control" onclick="off()"  type="submit"name="btnproceeds">Set & Proceed</button>
                <?php
                    }
                ?>
                
                
                
                 <a href="index.php" style="margin-top:-50px;" class="btn btn-dark form-control">Close</a>
            </div>
            </div>
        </div>
        <script>
       

function off() {
  document.getElementById("overlay").style.display = "none";
 
 
}
function on() { 
    document.getElementById("overlay").style.display = "block"; 
}
</script>

        <input type="radio"  disabled id="typepickup"  onclick="pickupclick()" name="typetrans" value="pickup" required>
         Pick Up
        
         <p></p>
         <img src="https://st2.depositphotos.com/1031343/6862/v/450/depositphotos_68629545-stock-illustration-cash-on-delivery-stamp.jpg" class="rounded" style="width:50px">
         <img src="https://th.bing.com/th/id/OIP.cTB_Gv2EYd2tckq3Aft4DAHaHa?pid=ImgDet&rs=1" class="rounded" style="width:50px">
        </div>
       <h6 style="color:red"><i class="fas fa-info-circle"></i> You need to login first before you can proceed to checkout</h6>
        <div class="subtotal-title">Subtotal</div>
          <div class="subtotal-value final-value" id="basket-subtotal">
               <?php 
                    $overallcod = $amountdue + 100 -  $dis;
                     $overallpickup = $amountdue  -  $dis;
         $selectavil = " SELECT * FROM `sales_discount` where sal_id = '1' ";
                       $resultavil = mysqli_query($con,$selectavil); // run query
                       $count= mysqli_num_rows($resultavil); // to count if necessary
                  
                       
                        while($row = mysqli_fetch_array($resultavil)){
                                $am=  $row['amount'];
                        }
                 
 
                    
                ?>
              <script>
                    var amounttoreach = <?php echo $am?>;
                    var amountdue = <?php echo $amountdue?> ;
                            if(amountdue >=  amounttoreach) { 
                                
                                document.getElementById('promo-code').disabled = false; 
                                document.getElementById('promo-codebtn').disabled = false; 
                               document.getElementById('maximum').innerHTML=""; 
                            }else {
                                document.getElementById('maximum').innerHTML="<i class='fas fa-info-circle'></i>  Must reach the maximum amount of  ₱<?php echo $am?>  To Avail promo ..";
                                document.getElementById('promo-code').disabled = true;
                                document.getElementById('promo-codebtn').disabled = true; 
                                 document.getElementById('basket-total').innerHTML="<?php echo $amountdue?>";
                                  
                            }
                    function codclick() {
                         document.getElementById('unsetbill').classList.remove('d-none');
                      document.getElementById('codlive').innerHTML="<p style='font-size:14px'>Shipping Fee : <span style='float:right'> ₱100</span></p>";
                      document.getElementById("overlay").style.display = "block";
                      document.getElementById("fieldadd").focus();
                    
                      
                   
                   
                       <?php 
                        if($foo == true) { 
                            ?>
                             document.getElementById('basket-total').innerHTML="<?php echo $overallcod?>";
                            document.getElementById('basket-tots').innerHTML="<input type='hidden' id='totalamountdue' name='totalamount' value=<?php echo $overallcod ?>>";
                            
                            document.getElementById('basket-truth').innerHTML="<input type='hidden' id='totalamountdue' name='truths' value='promo'>";
                            document.getElementById('basket-promoid').innerHTML="<input type='hidden' id='totalamountdue' name='promo_ids' value=<?php echo $promoids ?>>";
                           
                            <?php
                        }else {
                           ?>
                             document.getElementById('basket-total').innerHTML="<?php echo $overallcod?>";
                            document.getElementById('basket-tots').innerHTML="<input type='hidden' id='totalamountdue' name='totalamount' value=<?php echo $overallcod?>>";
                            document.getElementById('basket-truth').innerHTML="<input type='hidden' id='totalamountdue' name='truths' value='nopromo'>";
                            <?php 
                        }
                       ?>
                        
                        
                         <?php 
                            $codtrue = true;
                         
                         ?>
                    
                    }
                    function pickupclick(){
                        document.getElementById('codlive').innerHTML="";
                          document.getElementById('unsetbill').classList.add('d-none');
                        document.getElementById("fieldaddr").required = false;
                     document.getElementById("fieldcity").required = false;
                     document.getElementById("fieldzip").required = false;
                        <?php
                        $pickup= true;
                            if($foo == true) {
                              ?>
                               document.getElementById('basket-total').innerHTML="<?php echo  $overallpickup?>";
                               document.getElementById('basket-tots').innerHTML="<input type='hidden' id='totalamountdue' name='totalamount' value=<?php echo $overallpickup?>> ";
                               document.getElementById('basket-truth').innerHTML="<input type='hidden' id='totalamountdue' name='truths' value='promo'>";
                                document.getElementById('basket-promoid').innerHTML="<input type='hidden' id='totalamountdue' name='promo_ids' value=<?php echo $promoids ?>>";
                                
                              <?php
                            }else {
                              ?>
                               document.getElementById('basket-total').innerHTML="<?php echo  $amountdue?>";
                               document.getElementById('basket-tots').innerHTML="<input type='hidden' id='totalamountdue' name='totalamount' value=<?php echo $amountdue?>> ";
                                document.getElementById('basket-truth').innerHTML="<input type='hidden' id='totalamountdue' name='truths' value='nopromo'>";
                              
                              <?php   
                            }
                        ?>
                         
                    }
                    
              </script>
              <?php echo  $amountdue?></div>
              <div id="codlive">
                  
              </div>
             
               <!--<p style="font-size:14px">Promocode : <span style="float:right"> - ₱50</span></p> -- >
               
               <!--<p style="font-size:14px">Promocode : <span style="float:right">  ---</span></p>-->
               
               <!-- <p style="font-size:14px">Shipping Fee : <span style="float:right"> ₱100</span></p> -->
               
                <!-- <p style="font-size:14px">Shipping Fee : <span style="float:right"> ---</span></p>-->
               <div id="promominus" style="font-size:14px"></div>
               <?php 
               if ($foo == true) {
                 ?>
                 <p style="font-size:14px;">Promocode : <span style='float:right'> - ₱<?php echo $dis?></span></p>
                 
                 <?php
                 $totalwpromo =$amountdue - $dis;
               }
               
               ?>
               
        <div class="summary-total">
          <div class="total-title">Total</div>
          <div class="total-value final-value" id="basket-total">
              
              <?php
              
             if($foo == true) {
                 echo  $totalwpromo;
                 
             }else {
                 echo $amountdue;
                 
             }
           
             /*
             
             $amountdue (amountdue of pickup w/no promocode)
             $overallcod (total amount due of cod shipping fee and promocode ..)
             $overallpickup (total amount due of pick up w/promocode)
             */
            
              ?>
              
               
               
              </div>
              <div id="basket-tots"> </div>
              <div id="basket-truth"> </div>
              <div id="basket-promoid"></div>
        </div>
        
        <div class="summary-checkout">
          <button type="button" onclick='window.location.href="../signin"' id="changeletter"  name="btnproceeds" class="checkout-cta btn btn-dark">PROCEED</button>
        
        </div>
      </div>
</aside>


</main>




</article>



<div class="slider_for_shoppingcart"></div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="../js/shoppingcart.js"></script>
<script src="../js/nav.js"></script>
</body>

</html> 
	  <?php 
	}

?>
