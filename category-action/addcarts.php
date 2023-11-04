<?php 
session_start();
include '../admin/connection/connect.php';
        
      
              
               if(isset($_POST['addtocartnoid'])) {
            
            $prodid = $_POST['prod_id'];
           
            $quantities = '1';
                
                 $getprice = "select * from product where prod_id = '$prodid'";
                     $getres = mysqli_query($con,$getprice); 
                     while($row = mysqli_fetch_array($getres)){
                            $price = $row['price'];
                             $itemname = $row['name'];
                 }
                 
                if(isset($_SESSION['temp'])) {
                    $temp = $_SESSION['temp'];
                      $checkitemifalreadyexist = "select * from cart where prod_id= '$prodid' and user_id= '$temp'";
                             $checkexist= mysqli_query($con,$checkitemifalreadyexist); // run query
                              $countthis= mysqli_num_rows($checkexist);
                              
                              if ($countthis == 1) {
                                     while($row = mysqli_fetch_array($checkexist)){
                                    $qty = $row['qty'];
                                    $total = $row['total'];
                                    
                              }
                              $totalqty = $qty + $quantities ;
                              $amountdue = $totalqty *  $price;
                                                $updateqty = "UPDATE `cart` SET `qty`='$totalqty' , `total`= '$amountdue' WHERE prod_id='$prodid' and user_id = '$temp' ";
                                                $updateitem= mysqli_query($con,$updateqty); // run query
                                  
                                  if ($updateqty) {
                                         $cartcount = "select * from cart where user_id = '$temp'";
                            $resultcart = mysqli_query($con,$cartcount); // run query
                          
                             $countcart= mysqli_num_rows($resultcart);
                                  echo '<div class="fixed-bottom" >             
                    				   <div class="alert alert-dark  fade show" id="xx" role="alert" style="width:auto; font-size:25px; font-family:Evogria; margin-top:60px;float:right;background-color:#9ac89a;color:#153327" >
                      <strong>( '.$itemname.' ) Quantity Updated <i class="fas fa-check-circle"></i></strong> 
                      
                    </div>
                    </div>
                   <script>
                 setInterval(function() {
                     document.getElementById("xx").classList.add("d-none");
                 },7000);
                      
                   </script>
				    ';
                                  }
                                
                              }else {
                                  
                             
                        $addtocart = "INSERT INTO `cart`(`user_id`, `prod_id`, `qty`, `total`, `status`) VALUES ('$temp','$prodid','$quantities','$price','cart')";
                             $added = mysqli_query($con,$addtocart); // run query
                             if($added) {
                            $cartcount = "select * from cart where user_id = '$temp'";
                            $resultcart = mysqli_query($con,$cartcount); // run query
                          
                             $countcart= mysqli_num_rows($resultcart);
                             echo '<div class="fixed-bottom" >             
                    				   <div class="alert alert-dark  fade show" id="xx" role="alert" style="width:auto; font-size:25px; font-family:Evogria; margin-top:60px;float:right;background-color:#9ac89a;color:#153327" >
                      <strong>( '.$itemname.' ) Added to Cart <i class="fas fa-check-circle"></i></strong> 
                      
                    </div>
                    </div>
                   <script>
                 setInterval(function() {
                     document.getElementById("xx").classList.add("d-none");
                 },4000);
                      
                   </script>
				    ';
				  
                                  
                    
                             }
                              
                      }       
                }
        
				}
        if(isset($_POST['getcartss'])) {
            if(isset($_SESSION['temp'])) {
             $userids = $_SESSION['temp'];
            
                  
                   $cartcount = "select * from cart where user_id ='$userids' ";
                            $resultcart = mysqli_query($con,$cartcount); // run query
                          
                             $countcart= mysqli_num_rows($resultcart);
                             echo $countcart;
            }
            
            
        }  
            
        

?>