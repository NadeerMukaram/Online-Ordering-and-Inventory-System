<?php
session_start();
include 'connection/connect.php';
                
                          
    if(isset($_POST['savenew'])) {
        $name = $_POST['txtname'];
        $description = $_POST['description'];
        $price = $_POST['price'];
        $stock = $_POST['stock'];
        $catid = $_POST['txtcategory'];
        $expiration_date = $_POST['expiration'];
        $width = $_POST['textwidth'];
        $height = $_POST['textheight'];
        $weight = $_POST['txtweight'];
        $brand = $_POST['txtbrand'];
         $made = $_POST['txtmade'];
         $variety = $_POST['variety'];
         $branch=  $_SESSION["branchid"];
         $productcode = $_POST['txtcode'];
         $kilo = $_POST['gr'];
         $include = $_POST['ph'];
       
         date_default_timezone_set('Asia/Manila');
	              $datenows= date('Y-m-d H:i:s');
	              $dateonly = date('Y-m-d');
	              $log = "INSERT INTO `logs`(`type`,`section`,`details`, `datelog`, `datetimelog`) VALUES ('Adding new Units','unit','adding new products or units in the system ','$dateonly','$datenows')";
	              $savelog = mysqli_query($con,$log);
         
       //  
       if($_FILES["image"]["name"] == '') {
         //then save the default.
         $pname ="th.jfif";
       }else {
          //save the entered image
           $pname = rand(1000,10000)."-".$_FILES["image"]["name"];
            $tname = $_FILES["image"]["tmp_name"];
         
         $uploads_dir = 'bin/Item_Images/';
         
         move_uploaded_file($tname , $uploads_dir .'/'.$pname);
       }
       
                
               
      
      
    
          $supasize = $width.'-'.$height.'-'.$variety;
          
      
         $finalweight = $weight.$kilo;
         //image 
         $pcode = 'hantech-'.$productcode;
       date_default_timezone_set('Asia/Manila');
            $datenow= date("Y/m/d");
        
        
         $chec = "select * from product where product_code ='$pcode'";
            $checked = mysqli_query($con,$chec);
            
            $checking= mysqli_num_rows($checked);
            
            if($checking == 1 ) {
                  ?>
                    <script>
                         window.history.back();
                    </script>
                <?php
                    
                       $_SESSION['success'] = '  <div class="alert alert-danger " id="alerto" role="alert" style="float:right;width:auto;font-size: 14px;cursor: default;">
															Product_Code Already Exist ! Duplicate Entries is Prohibited.
																										                      </div>
																										                    <script type="text/javascript">
																										                       setInterval(function(){
																										                        document.getElementById("alerto").classList.add("d-none");
																										                       },13000) ;
																										                      
																										                      </script>';
																										                      
            }else {
                
																										                        $sql = "INSERT INTO `product`(`product_code`,`branch_id`, `name`, `price`, `description`, `modified`, `availabitility`, `photo`, `cat_id`,`standard_or_size`, `weight`, `brand`, `made`) 
                                        VALUES ('$pcode','$branch','$name','$price','$description','$datenow','available','$pname','$catid','$supasize','$finalweight','$brand','$made')";
                  
                   
                        if (mysqli_query($con,$sql)){
                                        
                                  $getusernewid = " select * from product where photo = '$pname'  ";
                                $resultget = mysqli_query($con,$getusernewid); // run query
                             
                             	
                                 while($row = mysqli_fetch_array($resultget)){
                                     $newid = $row['prod_id'];
                
                                 }
                                           
                                
                                
                                
                             	$newstock = " INSERT INTO `productstock` (`prod_id`, `stock`, `modified`, `expiration`) VALUES ('$newid','$stock','$datenow','$expiration_date') ";
                                    $resultadd = mysqli_query($con,$newstock); // run query
                                  
                                 if ($resultadd) {
                              $_SESSION['success'] = '  <div class="alert alert-success " id="alerto" role="alert" style="float:right;width:auto;font-size: 14px;cursor: default;">
																										                    Product Added Successfully!
																										                      </div>
																										                    <script type="text/javascript">
																										                       setInterval(function(){
																										                        document.getElementById("alerto").classList.add("d-none");
																										                       },5000)    
																										                      </script>';
																										                      header('location:products.php');

                                 }else {
                          echo 'fail to save new';
       
                        }
                         
                        }
																										                     
            }
            
        
            
  
                 
    
                      
  
    }    
    
    if(isset($_GET['remain'])) {
             if(isset($_POST['savenew'])) {
        $name = $_POST['txtname'];
        $description = $_POST['description'];
        $price = $_POST['price'];
        $stock = $_POST['stock'];
        $catid = $_POST['txtcategory'];
        $expiration_date = $_POST['expiration'];
        $width = $_POST['textwidth'];
        $height = $_POST['textheight'];
        $weight = $_POST['txtweight'];
        $brand = $_POST['txtbrand'];
         $made = $_POST['txtmade'];
         $variety = $_POST['variety'];
         $branch=  $_SESSION["branchid"];
         //image 
         
          date_default_timezone_set('Asia/Manila');
	              $datenows= date('Y-m-d H:i:s');
	              $dateonly = date('Y-m-d');
	              $log = "INSERT INTO `logs`(`type`,`section`,`details`, `datelog`, `datetimelog`) VALUES ('Adding new Units','unit','adding new products or units in the system ','$dateonly','$datenows')";
	              $savelog = mysqli_query($con,$log);
         
       date_default_timezone_set('Asia/Manila');
            $datenow= date("Y/m/d");
         $pname = rand(1000,10000)."-".$_FILES["image"]["name"];
         $tname = $_FILES["image"]["tmp_name"];
         
         $uploads_dir = 'bin/Item_Images/';
         
         move_uploaded_file($tname , $uploads_dir .'/'.$pname);
 
            $sql = "INSERT INTO `product`(`branch_id`, `name`, `price`, `description`, `modified`, `availabitility`, `photo`, `cat_id`, `width`, `height`, `weight`, `brand`, `made`) 
                                        VALUES ('$branch','$name','$price','$description','$datenow','available','$pname','$catid','$width','$height','$weight','$brand','$made')";
                  
                   
                        if (mysqli_query($con,$sql)){
                                        
                                  $getusernewid = " select * from product where photo = '$pname'  ";
                                $resultget = mysqli_query($con,$getusernewid); // run query
                             
                             	
                                 while($row = mysqli_fetch_array($resultget)){
                                     $newid = $row['prod_id'];
                
                                 }
                                           
                                
                                
                                
                             	$newstock = " INSERT INTO `productstock` (`prod_id`, `stock`, `modified`, `expiration`) VALUES ('$newid','$stock','$datenow','$expiration_date') ";
                                    $resultadd = mysqli_query($con,$newstock); // run query
                                  
                                 if ($resultadd) {
                              $_SESSION['success'] = '  <div class="alert alert-success " id="alerto" role="alert" style="float:right;width:100%;font-size: 14px;cursor: default;">
																										                    Product Added Successfully!
																										                      </div>
																										                    <script type="text/javascript">
																										                       setInterval(function(){
																										                        document.getElementById("alerto").classList.add("d-none");
																										                       },5000)    
																										                      </script>';
																										                      header('location:inventory.php');

                                 }else {
                          echo 'fail to save new';
       
                        }
                         
                        }
  
                 
    
                      
  
    }    
    
    }
                         
?>