<?php 
session_start();
include 'connection/connect.php';

    if(isset($_POST['btnupdate'])) {
       
        $code = $_POST['txtcode'];
        $name = $_POST['txtname'];
        $desc = $_POST['description'];
        $price = $_POST['price'];
        $cat_id = $_POST['txtcategory'];
        $exp = $_POST['expiration'];
        $standardsize = $_POST['textwidth'].'-'.$_POST['textheight'].'-'.$_POST['variety'];
        $weight = $_POST['txtweight'];
        $gr = $_POST['gr'];
        $brand = $_POST['txtbrand'];
        $made = $_POST['txtmade'];
        $prodid = $_POST['prodid'];
         
           $pname = rand(1000,10000)."-".$_FILES["image"]["name"];
            $tname = $_FILES["image"]["tmp_name"];
         
         $uploads_dir = 'bin/Item_Images/';
         
         move_uploaded_file($tname , $uploads_dir .'/'.$pname);
      
          $sql = "UPDATE `product` SET `product_code`='$code',`name`='$name',`price`='$price',`description`='$desc',
                           `photo` = '$pname', `cat_id`='$cat_id',`standard_or_size`='$standardsize',`weight`='$weight',`brand`='$brand',`made`='$made' WHERE prod_id = '$prodid'  ";
	                $result = mysqli_query($con,$sql); // run query
	         if($result) {
	              $_SESSION['success'] = '  <div class="alert alert-success " id="alerto" role="alert" style="float:right;width:auto;font-size: 14px;cursor: default;">
																										                    Product Updated Successfully!
																										                      </div>
																										                    <script type="text/javascript">
																										                       setInterval(function(){
																										                        document.getElementById("alerto").classList.add("d-none");
																										                       },5000)    
																										                      </script>';
																										                      header('location:products.php');
	         }     
      
    }   
    
   
?>