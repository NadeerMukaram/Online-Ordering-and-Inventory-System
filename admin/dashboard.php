<?php
session_start();
if(!isset($_SESSION['users_id'])) {
header('location:index.php');

}
 include 'includes/header.php';?>
	
	
	<div class="page-wrapper chiller-theme toggled">
 	
 	<?php include 'includes/sidebar.php'?>
<?php include 'Orders_class.php';
    include 'class.php';
?>
  <?php
                  $Datatable = new Data();
                  $Datatable->TimeFrameforlowstacks();
                  
                  $Datatable = new Data();
                  $Datatable->TimeFrameforexpiringstocks();
           
           ?>

  <!-- sidebar-wrapper  -->
  <main class="page-content">
    <div class="container-fluid">
      <h2 style="font-family: 'Jost', sans-serif;letter-spacing: 5px;">DASHBOARD</h2>
      <hr>
     	
       <div class="row">
          
       		<div class="col-sm-4">
       			<a href="orders.php"  style="text-decoration: none">
       			<div class="card" style="border-left: 5px solid rgb(28, 200, 138)">
       			  <div class="card-body">
		       			<h5 style="font-family: 'Jost', sans-serif;font-weight:bolder ">Order Management <span style="padding: 10px; text-decoration: underline; ">
               <?php 
                  $table = 'trans_record';
                  $countmanagetrans = new orders();
                  $countmanagetrans->countfordashboard($table);
                  ?>    
                </span></h5>
       			  </div>
       			</div>
       			</a>
       		</div>
       		<div class="col-sm-4">
       			<a href="accounts.php" style="text-decoration: none">
       			<div class="card" style="border-left: 5px solid rgb(253, 191, 45)">
       			  <div class="card-body">
       			    <h5 style="font-family: 'Jost', sans-serif;font-weight:bolder">Number of Users <span style="padding: 10px; text-decoration: underline; ">
                <?php 
                  $table = 'user_account';
                  $countmanageacc = new orders();
                  $countmanageacc->countfordashboard($table);
                  ?> 

                </span></h5>
       			  </div>
       			</div>
       		</a>
       		</div>
       		<div class="col-sm-4">
       			<a href="products.php" style="text-decoration: none">
       			<div class="card" style="border-left: 5px solid rgb(89, 123, 225)">
       			  <div class="card-body">
       			    <h5 style="font-family: 'Jost', sans-serif;font-weight:bolder">Number of Products <span style="padding: 10px; text-decoration: underline; ">
                <?php 
                  $table = 'product';
                  $countmanagepro = new orders();
                  $countmanagepro->countfordashboard($table);
                  ?>   
                </span></h5>
       			  </div>
       			</div>
       		</a>
       		</div>

       </div>

       <hr>
        <button class="btn btn-primary" onclick="window.location.href='accounts.php' " style="border-radius:14px;background-color:transparent;color:#665356">Add Customer <i class="fas fa-plus"></i></button>
         <button class="btn btn-info" onclick="window.location.href='inventory.php' " style="border-radius:14px;background-color:transparent;color:#665356">Add Products <i class="fas fa-plus"></i></button>
         
         <p><br></p>
       <div class="row">
    <script>
window.onload = function() {

var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	title: {
		text: "Hantech's Data Statistics"
	},
	data: [{
		type: "pie",
		startAngle: 240,
		yValueFormatString: "##0.00\"%\"",
		indexLabel: "{label} {y}",
		dataPoints: [
			{y:  <?php 
                  $table = 'user_account';
                  $countmanageacc = new orders();
                  $countmanageacc->countfordashboard($table);
                  ?> 
 , label: "Users"},
			{y:<?php 
                  $table = 'product';
                  $countmanagepro = new orders();
                  $countmanagepro->countfordashboard($table);
                  ?> , label: "Products"},
			{y: <?php 
                  
                  $countmanageacc = new orders();
                  $countmanageacc->countfordashboardsales();
                  ?> , label: "Sales"},
			{y: <?php 
                  $table = 'trans_record';
                  $countmanagetrans = new orders();
                  $countmanagetrans->countfordashboard($table);
                  ?>, label: "Orders"}
	
		]
	}]
});
chart.render();

}
</script>
<div id="chartContainer" style="height: 300px; width: 100%;"></div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>

<?php include 'includes/header.php';?>