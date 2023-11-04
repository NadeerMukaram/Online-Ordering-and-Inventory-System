<?php 
session_start();
include 'connection/connect.php';
if(isset($_POST['btnsaveedit'])) {
    $stockid = $_POST['btnsaveedit'];
    $stock = $_POST['txtstock'];
    $xpdate=$_POST['txtdate'];
   
    $prodid = $_POST['prodid'];
    $getproduct = "select * from product where prod_id = '$prodid'";
    $prodres = mysqli_query($con, $getproduct);
    while($row = mysqli_fetch_array($prodres)){
        $prodno = $row['product_code'];
                 }
        	$sql = " UPDATE `productstock` SET `stock`='$stock' , `expiration`='$xpdate' WHERE stock_id = '$stockid' ";
	                $result = mysqli_query($con,$sql); // run query
	              
	              date_default_timezone_set('Asia/Manila');
	              $datenows= date('Y-m-d H:i:s');
	              $dateonly = date('Y-m-d');
	              $log = "INSERT INTO `logs`(`type`,`section`, `qty`, `details`, `datelog`, `datetimelog`) VALUES ('updating stocks','stocks','$stock','Updated stocks product-code = $prodno ','$dateonly','$datenows')";
	              $savelog = mysqli_query($con,$log);
	           
	                    if ($result) {
	                        	 $_SESSION['success'] = '  <div class="alert alert-success " id="alerto" role="alert" style="float:right;width:100%;font-size: 14px;cursor: default;">
																										                   Stocks Updated Successfully!
																										                      </div>
																										                    <script type="text/javascript">
																										                       setInterval(function(){
																										                        document.getElementById("alerto").classList.add("d-none");
																										                       },5000)    
																										                      </script>';
																										                   header('location:manage_product.php?Manage&prodid='.$prodid.'#stock');
	                    }
                      
}
if(isset($_POST['btnsaveout'])) {
    $stockid= $_POST['btnsaveout'];
    $stock = $_POST['txtstock'];
    $reason = $_POST['txtreason'];
     $prodid = $_POST['prodid'];
     $getproduct = "select * from product where prod_id = '$prodid'";
    $prodres = mysqli_query($con, $getproduct);
    while($row = mysqli_fetch_array($prodres)){
        $prodno = $row['product_code'];
                 }
    
                $selectstock = "select * from productstock where stock_id = '$stockid'  ";
                $resulst = mysqli_query($con,$selectstock); // run query
                while($row = mysqli_fetch_array($resulst)){
                $oldstock = $row['stock'];
            }
            $update = $oldstock - $stock ;
        
        	$sql = " UPDATE `productstock` SET `stock`='$update'  WHERE stock_id = '$stockid' ";
	                $result = mysqli_query($con,$sql); // run query
	              
	       date_default_timezone_set('Asia/Manila');
	              $datenows= date('Y-m-d H:i:s');
	              $dateonly = date('Y-m-d');
	              $log = "INSERT INTO `logs`(`type`,`section`, `qty`, `details`, `datelog`, `datetimelog`) VALUES ('Stocking out','stocks','$update','Reason :  $reason ','$dateonly','$datenows')";
	              $savelog = mysqli_query($con,$log);         
	           
	                    if ($result) {
	                        	 $_SESSION['success'] = '  <div class="alert alert-success " id="alerto" role="alert" style="float:right;width:100%;font-size: 14px;cursor: default;">
																										                Stock took from the Record successfully!
																										                      </div>
																										                    <script type="text/javascript">
																										                       setInterval(function(){
																										                        document.getElementById("alerto").classList.add("d-none");
																										                       },5000)    
																										                      </script>';
																										                   header('location:manage_product.php?Manage&prodid='.$prodid.'#stock');
    
}
	                        
	                    }
if(isset($_POST['savenew'])) {
    $newstock = $_POST['txtnewstock'];
    $xpdate = $_POST['expdate'];
    $prodid = $_POST['prodid'];
      $getproduct = "select * from product where prod_id = '$prodid'";
    $prodres = mysqli_query($con, $getproduct);
    while($row = mysqli_fetch_array($prodres)){
        $prodno = $row['product_code'];
                 }
    date_default_timezone_set('Asia/Manila');
    $datenow= date('Y-m-d');
    $sql = " INSERT INTO `productstock`( `prod_id`, `stock`, `modified`, `expiration`) VALUES ('$prodid','$newstock','$datenow','$xpdate')";
	                $result = mysqli_query($con,$sql); // run query
	            
	     date_default_timezone_set('Asia/Manila');
	              $datenows= date('Y-m-d H:i:s');
	              $dateonly = date('Y-m-d');
	              $log = "INSERT INTO `logs`(`type`,`section`, `qty`, `details`, `datelog`, `datetimelog`) VALUES ('Added New Stocks','stocks','$newstock','NewlyAdded stocks for  $prodno ','$dateonly','$datenows')";
	              $savelog = mysqli_query($con,$log);            
	              
	           
	                    if ($result) {
	                        	 $_SESSION['success'] = '  <div class="alert alert-success " id="alerto" role="alert" style="float:right;width:100%;font-size: 14px;cursor: default;">
																										                   Stocks Added Successfully!
																										                      </div>
																										                    <script type="text/javascript">
																										                       setInterval(function(){
																										                        document.getElementById("alerto").classList.add("d-none");
																										                       },5000)    
																										                      </script>';
																										                   header('location:manage_product.php?Manage&prodid='.$prodid.'#stock');
	                    }
        
}
  
  if(isset($_GET['del'])) {
      $stockid = $_GET['stockid'];
      $prodid = $_GET['prodid'];
                    
                   $sql = " DELETE FROM `productstock` WHERE stock_id = '$stockid'";
	                $result = mysqli_query($con,$sql); // run query
	              
	      date_default_timezone_set('Asia/Manila');
	              $datenows= date('Y-m-d H:i:s');
	              $dateonly = date('Y-m-d');
	              $log = "INSERT INTO `logs`(`type`,`section`, `details`, `datelog`, `datetimelog`) VALUES ('Deleted','stocks','Deleted Stock','$dateonly','$datenows')";
	              $savelog = mysqli_query($con,$log);     
	              
	                    if ($result) {
	                        	 $_SESSION['success'] = '  <div class="alert alert-success " id="alerto" role="alert" style="float:right;width:100%;font-size: 14px;cursor: default;">
																										                   Stock Record Deleted Successfully!
																										                      </div>
																										                    <script type="text/javascript">
																										                       setInterval(function(){
																										                        document.getElementById("alerto").classList.add("d-none");
																										                       },5000)    
																										                      </script>';
																										                   header('location:manage_product.php?Manage&prodid='.$prodid.'#stock');
	                    }
       
      
  }
      
            
        
?>