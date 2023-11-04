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
        
         date_default_timezone_set('Asia/Manila');
	              $datenows= date('Y-m-d H:i:s');
	              $dateonly = date('Y-m-d');
	              $log = "INSERT INTO `logs`(`type`,`section`,`details`, `datelog`, `datetimelog`) VALUES ('Updating Units','unit','Updated products or units : $code-$name ','$dateonly','$datenows')";
	              $savelog = mysqli_query($con,$log);
        
       $sql = "UPDATE `product` SET `product_code`='$code',`name`='$name',`price`='$price',`description`='$desc',
                            `cat_id`='$cat_id',`standard_or_size`='$standardsize',`weight`='$weight',`brand`='$brand',`made`='$made' WHERE prod_id = '$prodid'  ";
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
    
    
    if(isset($_GET['del'])){
       $prodid = $_GET['prodid'];
      
        ?>
            <?php
session_start();
if(!isset($_SESSION['users_id'])) {
header('location:index.php');

}


 include 'includes/header.php';?>
	
	
	<div class="page-wrapper chiller-theme toggled">
 	
 	<?php include 'includes/sidebar.php';

  include 'class.php';
  ?>


  <!-- sidebar-wrapper  -->
  <main class="page-content">
    <div class="container-fluid">
      <h4 style="font-family: 'Jost', sans-serif;">Deleting Product ..</h4>
      <a href="products.php" class="btn btn-secondary" style="font-size:12px"><i class="fas fa-arrow-left"></i> Back to INVENTORY</a>
      <hr>
     
      <div class="row">
          
                 
         <div class="card">
          <p></p>
          <form method="post" action="add.php" >
                <div class="container">
                    <h5>Are you sure You want to Delete this Product?</h5>
                <input type="hidden" name="prodid" value="<?php echo $prodid?>">    
                        <p></p>
                        <h6 style="color:red"><i class="fas fa-exclamation-triangle"></i> All Records including : Cart , Transactions ,Sales and stocks or in summary all Associated records of this product will be Deleted permanently and cannot be Recovered.<br> Above warnings is mentioned.
                            <span style="color:black;">Do you wish to Proceed?</span>
                        </h6>
                        <p></p>
                        <button type="submit" name="btndelete" class="btn btn-danger" style="font-size:13px;width:150px">Yes</button> <button type="button" onclick="window.location.href='products.php'" style="font-size:13px;width:150px" class="btn btn-warning">No</button>
                </div> 
              </form>
              <p></p>
          </div>

      </div>

      <hr>
      <footer class="text-center">
        <div class="mb-2">
          <small>
            ©Copyrights &middot; 2021 
          </small>
        </div>
      
      </footer>
    </div>
  </main>
  <!-- page-content" -->



</div>
    <script type="text/javascript" src="action.js">  </script>


<!-- page-wrapper -->
<script type="text/javascript">
	
	jQuery(function ($) {

    $(".sidebar-dropdown > a").click(function() {
  $(".sidebar-submenu").slideUp(200);
  if (
    $(this)
      .parent()
      .hasClass("active")
  ) {
    $(".sidebar-dropdown").removeClass("active");
    $(this)
      .parent()
      .removeClass("active");
  } else {
    $(".sidebar-dropdown").removeClass("active");
    $(this)
      .next(".sidebar-submenu")
      .slideDown(200);
    $(this)
      .parent()
      .addClass("active");
  }
});

$("#close-sidebar").click(function() {
  $(".page-wrapper").removeClass("toggled");
});
$("#show-sidebar").click(function() {
  $(".page-wrapper").addClass("toggled");
});

 

   
});      
      	
</script>
    

<?php include 'includes/footer.php';?>
        <?php
      
      
    }
    
    
   if(isset($_POST['btndelete'])) {
       $prodid = $_POST['prodid'];
       
        date_default_timezone_set('Asia/Manila');
	              $datenows= date('Y-m-d H:i:s');
	              $dateonly = date('Y-m-d');
	              $log = "INSERT INTO `logs`(`type`,`section`,`details`, `datelog`, `datetimelog`) VALUES ('Deleting new Units','unit','Deleting new products, product id : $prodid ','$dateonly','$datenows')";
	              $savelog = mysqli_query($con,$log);
       
                    $deletecart = "DELETE FROM `cart` WHERE prod_id = '$prodid' ";
                        $delcart = mysqli_query($con,$deletecart);
                        if($delcart) {
                            $deletetrans = "DELETE FROM `trans_record` WHERE prod_id = '$prodid' ";
                        $deltrans = mysqli_query($con,$deletetrans);
                        if($deltrans) {
                            $deletestock = "DELETE FROM `productstock` WHERE prod_id = '$prodid' ";
                        $delstock = mysqli_query($con,$deletestock);
                        if($delstock) {
                             $deleteprod = "DELETE FROM `product` WHERE prod_id = '$prodid' ";
                        $delprod = mysqli_query($con,$deleteprod);
                        if ($delprod) {
                              $_SESSION['success'] = '  <div class="alert alert-success " id="alerto" role="alert" style="float:right;width:auto;font-size: 14px;cursor: default;">
																										                    Product Deleted Successfully!
																										                      </div>
																										                    <script type="text/javascript">
																										                       setInterval(function(){
																										                        document.getElementById("alerto").classList.add("d-none");
																										                       },5000)    
																										                      </script>';
																										                      header('location:products.php');
                        }
                        }
                        }
                        }
                          
                          
                         
   } 
   
?>