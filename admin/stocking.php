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
      <h4 style="font-family: 'Jost', sans-serif;">Manage Stocks</h4>
      <a href="javascript:void()" onclick="window.history.back()" class="btn btn-secondary" style="font-size:12px"><i class="fas fa-arrow-left"></i> Back </a>
      <hr>
     
      <div class="row">
          	<?php
                  if(isset($_SESSION['success'])) {
                    echo $_SESSION['success'];
                    unset($_SESSION['success']);
                  }
                  ?>
                 
         <div class="card">
          <p></p>
                <?php 
                    if(isset($_GET['edit'])) {
                        $prodid = $_GET['prodid'];
                        ?>
                         <form method="post" action="dochange.php">
                        <div class="card">
                            <div class="container">
                                <p></p>
                                <h6>Updating Product Stocks( <span style="font-weight:bold">
                                <?php 
                                    $select = "select * from product where prod_id = '$prodid'";
                                    $results = mysqli_query($con,$select);
                                    while($row = mysqli_fetch_array($results)){  
                                        echo 'CODE :'.$row['product_code'].'-'.$row['name'];
                                    }
                                ?></span> )
                                </h6>
                                Stock:
                                <input type="text" name="txtstock" style="width:50%" autofocus class="form-control" style="font-size:13px" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
                                Expiration-Date
                                <input type="date" name="txtdate" style="width:50%" class="form-control"  style="font-size:13px" >
                                <input type="hidden" name="prodid" value="<?php echo $prodid?>">
                                <p style="color:grey"><i class="fas fa-info-circle"></i> Note : Type the stocks you wish to Update and select from the data's below</p>
                                 <p></p>
                                </div>
                        </div>
                       
                       
                        <table class="table" id="table_id">
                          <thead class="thead-light">
                            <tr>
                                <th scope="col">Action</th>
                              <th scope="col">Stock</th>
                              <th scope="col">Date-Modified</th>
                              <th scope="col">Expiration-Date</th>
                             
                            </tr>
                          </thead>
                          <tbody>
                             <?php 
                                	$sql = " select * from productstock where prod_id ='$prodid' ";
			                $result = mysqli_query($con,$sql); // run query
			               
			                 while($row = mysqli_fetch_array($result)){ 
			                  $xp= $row['expiration'];
			                  $stoc=$row['stock_id'];
			                  $numstock = $row['stock'];
			                    ?>
			                    <tr>
			                     
			                        <td>
			                          
			                            
			                            <button type="submit" name="btnsaveedit" value="<?php echo $stoc?>"> UPDATE</button></td>
			                        <td><?php  
			                          if($numstock >= 0) {
			                                echo $numstock;
			                            }else {
			                                echo '0';
			                            }
			                        
			                        ?></td>
			                        <td><?php echo $row['modified']?></td>
			                        <td><?php 
			                            if($xp == '0000-00-00') {
			                                echo 'N/A';
			                            }else {
			                                echo $xp;
			                            }
			                        ?></td>
			                    </tr>
			                    <?php
			                   
			                 }
                            ?>
                          </tbody>
                        </table>
                        </form>
                        <?php
               }else if (isset($_GET['stockout'])) {
                         $prodid = $_GET['prodid'];
                         
                         ?>
                          <form method="post" action="dochange.php">
                        <div class="card">
                            <div class="container">
                                <p></p>
                                <h6>Updating Product Stocks( <span style="font-weight:bold">
                                <?php 
                                    $select = "select * from product where prod_id = '$prodid'";
                                    $results = mysqli_query($con,$select);
                                    while($row = mysqli_fetch_array($results)){  
                                        echo 'CODE :'.$row['product_code'].'-'.$row['name'];
                                    }
                                ?></span> )
                                </h6>
                               Input Quantity to take Out : <p></p>
                                <input type="text" name="txtstock" style="width:50%" autofocus class="form-control" style="font-size:13px" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
                               <p></p> Input Reason to take Out : 
                               <input type="text" name="txtreason" style="width:50%" autofocus class="form-control" style="font-size:13px"  required>
                               <input type="hidden" name="prodid" value="<?php echo $prodid?>">
                                <p style="color:grey"><i class="fas fa-info-circle"></i> Note : Type the stocks you wish to take out and select from the data's below</p>
                                 <p></p>
                                </div>
                        </div>
                       
                       <p></p>
                        <table class="table" id="table_id">
                          <thead class="thead-light">
                            <tr>
                                <th scope="col">Action</th>
                              <th scope="col">Stock</th>
                              <th scope="col">Date-Modified</th>
                              <th scope="col">Expiration-Date</th>
                             
                            </tr>
                          </thead>
                          <tbody>
                             <?php 
                                	$sql = " select * from productstock where prod_id ='$prodid' ";
			                $result = mysqli_query($con,$sql); // run query
			               
			                 while($row = mysqli_fetch_array($result)){ 
			                  $xp= $row['expiration'];
			                  $stoc=$row['stock_id'];
			                  $numstock = $row['stock'];
			                    ?>
			                    <tr>
			                     
			                        <td>
			                          
			                            
			                            <button type="submit" name="btnsaveout" value="<?php echo $stoc?>">SELECT</button></td>
			                        <td><?php 
			                         if($numstock >= 0) {
			                                echo $numstock;
			                            }else {
			                                echo '0';
			                            }
			                        
			                        ?></td>
			                        <td><?php echo $row['modified']?></td>
			                        <td><?php 
			                            if($xp == '0000-00-00') {
			                                echo 'N/A';
			                            }else {
			                                echo $xp;
			                            }
			                        ?></td>
			                    </tr>
			                    <?php
			                   
			                 }
                            ?>
                          </tbody>
                        </table>
                        </form>
                         <?php
                    }
                ?>
              
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