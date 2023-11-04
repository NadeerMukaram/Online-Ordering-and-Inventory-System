<?php
session_start();
if(!isset($_SESSION['users_id'])) {
header('location:index.php');

}

$_SESSION['products'] = '1';
 include 'includes/header.php';?>
	
	
	<div class="page-wrapper chiller-theme toggled">
 	
 	<?php include 'includes/sidebar.php';

  include 'class.php';
  include 'classlogs.php';
  ?>
 <style type="text/css">
   
              .modalcreated {
            display: none; /* Hidden by default */
            position: fixed; /* Stay in place */
            z-index: 1000 !important; /* Sit on top */
            padding-top: 70px; /* Location of the box */
            left: 0;
            top: 0;
            width: 100%; /* Full width */
            height: 100%; /* Full height */
            overflow: auto; /* Enable scroll if needed */
            background-color: rgb(0,0,0); /* Fallback color */
            background-color: rgba(0,0,0,0.4); /* Black w/ opacity */

          }

          /* Modal Content */
          .modal-contents {
            background-color: #fefefe;
            margin: auto;
            padding: 20px;
            border: 1px solid #888;
            width: 60%;
             border-radius: 5px;
             z-index: 1 !important;
          }

          /* The Close Button */
          .close {
            color: #aaaaaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
          }

          .close:hover,
          .close:focus {
            color: #000;
            text-decoration: none;
            cursor: pointer;
          }
          .display-block {
            display: block;

          }
          .diplay-none {
            display: none;
          }
           
 </style>


  <!-- sidebar-wrapper  -->
  <main class="page-content">
    <div class="container-fluid">
      <h2 style="font-family: 'Jost', sans-serif;letter-spacing: 5px;">L0GS</h2>
      <hr>
     	
      <div class="row">
         <div class="card">
          <p></p>
          
            <h4 style="font-weight:bolder">Stocks</h4>
                <?php  
                $Datatable = new logs();
                  $Datatable->logsstocks();
                  ?>
                  <hr>
                  <br>
                <h4 style="font-weight:bolder">Units</h4>
                <?php  
                $Datatable = new logs();
                  $Datatable->logsproducts();
                  ?> 
                  <hr>
                  <br>
                <h4 style="font-weight:bolder">Promo Code</h4>
                <?php  
                $Datatable = new logs();
                  $Datatable->logspromocode();
                  ?> 
                <hr>
                  <br>
                <h4 style="font-weight:bolder">Category</h4>
                <?php  
                $Datatable = new logs();
                  $Datatable->logscategory();
                  ?> 
                    <hr>
                  <br>
                <h4 style="font-weight:bolder">Accounts</h4>
                <?php  
                $Datatable = new logs();
                  $Datatable->logsaccount();
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