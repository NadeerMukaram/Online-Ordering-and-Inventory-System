<?php
session_start();
if(!isset($_SESSION['users_id'])) {
header('location:index.php');

}
 include 'includes/header.php';?>
	
	
	<div class="page-wrapper chiller-theme toggled">
 	
 	<?php include 'includes/sidebar.php'?>
<?php include 'Orders_class.php'?>

  <!-- sidebar-wrapper  -->
  <main class="page-content">
    <div class="container-fluid">
      <h2 style="font-family: 'Turret Road', cursive; letter-spacing: 5px;">Orders</h2>
    <?php 
    if(isset($_SESSION['success'])) {
      echo $_SESSION['success'];
      unset($_SESSION['success']);
    }

    ?>
  
      <hr>
     	<style type="text/css">
        .btnbtn {
          padding: 2px 6px; font-weight: bold;background-color: #353634;color: white;border-radius: 5px;float: right;
        }
        .badger {
          padding: 2px 6px; font-weight: bold;background-color: white;color: #3b3f34;border-radius: 5px;float: right;
        }
      </style>
        <div class="row">
          <p></p>
          <div class="d-flex align-items-start">
  <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
    <button class="nav-link" id="pending" onclick="window.location.href='orders.php?pending'">Pending Orders <span  class="badger" id="s1">
      
             <?php 
             $status = 'pending';
                  $pendingcount = new orders();
                  $pendingcount->getCountsoftab($status);
                  ?>
    </span></button>
    <button class="nav-link" id="pickup" onclick="window.location.href='orders.php?pickup'">Pick Up Orders<span class="badger" id="s6">
      <?php 
             $status = 'approved';
                  $topickcount = new orders();
                  $topickcount->getCountsoftab($status);
                  ?>

    </span></button>
    <button class="nav-link" id="toship" onclick="window.location.href='orders.php?toship'">To Ship <span class="badger" id="s2">
      <?php 
             $status = 'toship';
                  $toshipcount = new orders();
                  $toshipcount->getCountsoftab($status);
                  ?>

    </span></button>
    <button class="nav-link" id="toreceive" onclick="window.location.href='orders.php?toreceive'">To Receive <span  class="badger" id="s3">
       <?php 
             $status = 'toreceive';
                  $toreceivecount = new orders();
                  $toreceivecount->getCountsoftab($status);
                  ?>
    </span></button>
    <button class="nav-link" id="completed" onclick="window.location.href='orders.php?completed'">Completed <span  class="badger" id="s4">
       <?php 
             $status = 'completed';
                  $completedcount = new orders();
                  $completedcount->getCountsoftab($status);
                  ?>
    </span></button>
     <button class="nav-link" id="cancelled" onclick="window.location.href='orders.php?cancelled'">Cancelled <span  class="badger" id="s5">
        <?php 
             $status = 'cancelled';
                  $cancelledcount = new orders();
                  $cancelledcount->getCountsoftab($status);
                  ?>
     </span></button>
  </div>
  <div class="tab-content" id="v-pills-tabContent">
    <?php
    if(isset($_GET['pending'])){ 
      

      ?>
      <script type="text/javascript">
        
        document.getElementById("pending").classList.add('active');
        document.getElementById("toship").classList.remove('active');
        document.getElementById("toreceive").classList.remove('active');      
        document.getElementById("completed").classList.remove('active');
        document.getElementById("cancelled").classList.remove('active');
        document.getElementById("s1").classList.add('badger');
        document.getElementById("s1").classList.remove('btnbtn');
         document.getElementById("s2").classList.remove('badger');
        document.getElementById("s2").classList.add('btnbtn');
         document.getElementById("s3").classList.remove('badger');
        document.getElementById("s3").classList.add('btnbtn');
         document.getElementById("s4").classList.remove('badger');
        document.getElementById("s4").classList.add('btnbtn');
         document.getElementById("s5").classList.remove('badger');
        document.getElementById("s5").classList.add('btnbtn');
         document.getElementById("pickup").classList.remove('active');
          document.getElementById("s6").classList.remove('badger');
        document.getElementById("s6").classList.add('btnbtn');    
              
      </script>
      <!---------------------------------------------------------------------------------->
<div class="tab-pane fade show active">
  <div class="container">
    <table class="table table-bordered" id="table_id">
  <thead>
    <tr>
      <th scope="col">Qty</th>
      <th scope="col">Name</th>
      <th scope="col">Description</th>
      <th scope="col">Date Ordered</th>
      <th scope="col">Total</th>
       <th scope="col">Order By</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
   <?php 
                  $pending = new orders();
                  $pending->getPendings();
                  ?>
  </tbody>
</table>
    
  </div>
</div>
      <?php

    }else if (isset($_GET['pickup'])) {
        
      ?>
      <script type="text/javascript">
         document.getElementById("pickup").classList.add('active');
        document.getElementById("pending").classList.remove('active');
        document.getElementById("toship").classList.remove('active');
        document.getElementById("toreceive").classList.remove('active');      
        document.getElementById("completed").classList.remove('active');
        document.getElementById("cancelled").classList.remove('active');
        document.getElementById("s1").classList.remove('badger');
        document.getElementById("s1").classList.add('btnbtn');
         document.getElementById("s2").classList.remove('badger');
        document.getElementById("s2").classList.add('btnbtn');
         document.getElementById("s3").classList.remove('badger');
        document.getElementById("s3").classList.add('btnbtn');
         document.getElementById("s4").classList.remove('badger');
        document.getElementById("s4").classList.add('btnbtn');
         document.getElementById("s5").classList.remove('badger');
        document.getElementById("s5").classList.add('btnbtn');
        document.getElementById("s6").classList.add('badger');
        document.getElementById("s6").classList.remove('btnbtn');
        
         
      </script>
      <!---------------------------------------------------------------------------------->
<div class="tab-pane fade show active">
  <div class="container">
    <table class="table table-bordered" id="table_id">
  <thead>
    <tr>
      <th scope="col">Qty</th>
      <th scope="col">Name</th>
      <th scope="col">Description</th>
      <th scope="col">Date Ordered</th>
      <th scope="col">Total</th>
       <th scope="col">Order By</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
   <?php 
                  $pending = new orders();
                  $pending->getpickup();
     ?>
  </tbody>
</table>
    
  </div>
</div>
      <?php
    } 
    
    else  if(isset($_GET['toship'])){ 

       ?>
      <script type="text/javascript">
        document.getElementById("toship").classList.add('active');
        document.getElementById("pending").classList.remove('active');
       
        document.getElementById("toreceive").classList.remove('active');      
        document.getElementById("completed").classList.remove('active');
        document.getElementById("cancelled").classList.remove('active');
        document.getElementById("s1").classList.remove('badger');
        document.getElementById("s1").classList.add('btnbtn');
         document.getElementById("s2").classList.add('badger');
        document.getElementById("s2").classList.remove('btnbtn');
         document.getElementById("s3").classList.remove('badger');
        document.getElementById("s3").classList.add('btnbtn');
         document.getElementById("s4").classList.remove('badger');
        document.getElementById("s4").classList.add('btnbtn');
         document.getElementById("s5").classList.remove('badger');
        document.getElementById("s5").classList.add('btnbtn');
         document.getElementById("pickup").classList.remove('active');
          document.getElementById("s6").classList.remove('badger');
        document.getElementById("s6").classList.add('btnbtn');    
              
      </script>
<!---------------------------------------------------------------------------------->
<div class="tab-pane fade show active">
   <div class="container">
    <table class="table table-bordered" id="table_id">
  <thead>
    <tr>
      <th scope="col">Qty</th>
      <th scope="col">Name</th>
      <th scope="col">Description</th>
      <th scope="col">Date Ordered</th>
      <th scope="col">Total</th>
       <th scope="col">Order By</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
   <?php 
                  $pending = new orders();
                  $pending->gettoships();
                  ?>
  </tbody>
</table>
    
  </div>
</div>

      <?php
    } else  if(isset($_GET['toreceive'])){ 
       ?>
      <script type="text/javascript">
         document.getElementById("toreceive").classList.add('active'); 
        document.getElementById("pending").classList.remove('active');
        document.getElementById("toship").classList.remove('active');
            
        document.getElementById("completed").classList.remove('active');
        document.getElementById("cancelled").classList.remove('active');
         document.getElementById("s1").classList.remove('badger');
        document.getElementById("s1").classList.add('btnbtn');
         document.getElementById("s2").classList.remove('badger');
        document.getElementById("s2").classList.add('btnbtn');
         document.getElementById("s3").classList.add('badger');
        document.getElementById("s3").classList.remove('btnbtn');
         document.getElementById("s4").classList.remove('badger');
        document.getElementById("s4").classList.add('btnbtn');
         document.getElementById("s5").classList.remove('badger');
        document.getElementById("s5").classList.add('btnbtn');
         document.getElementById("pickup").classList.remove('active');
          document.getElementById("s6").classList.remove('badger');
        document.getElementById("s6").classList.add('btnbtn');    
              
      </script>
      <!---------------------------------------------------------------------------------->
<div class="tab-pane fade show active">
 <div class="container">
    <table class="table table-bordered" id="table_id">
  <thead>
    <tr>
      <th scope="col">Qty</th>
      <th scope="col">Name</th>
      <th scope="col">Description</th>
      <th scope="col">Date Ordered</th>
      <th scope="col">Total</th>
       <th scope="col">Order By</th>
      <th scope="col">Status</th>
    </tr>
  </thead>
  <tbody>
   <?php 
                  $pending = new orders();
                  $pending->gettoreceives();
                  ?>
  </tbody>
</table>
    
  </div>
</div>
      <?php
    } else  if(isset($_GET['completed'])){ 
       ?>
      <script type="text/javascript">
         document.getElementById("completed").classList.add('active');
        document.getElementById("pending").classList.remove('active');
        document.getElementById("toship").classList.remove('active');
        document.getElementById("toreceive").classList.remove('active');      
       
        document.getElementById("cancelled").classList.remove('active');
         document.getElementById("s1").classList.remove('badger');
        document.getElementById("s1").classList.add('btnbtn');
         document.getElementById("s2").classList.remove('badger');
        document.getElementById("s2").classList.add('btnbtn');
         document.getElementById("s3").classList.remove('badger');
        document.getElementById("s3").classList.add('btnbtn');
         document.getElementById("s4").classList.add('badger');
        document.getElementById("s4").classList.remove('btnbtn');
         document.getElementById("s5").classList.remove('badger');
        document.getElementById("s5").classList.add('btnbtn');
         document.getElementById("pickup").classList.remove('active');
          document.getElementById("s6").classList.remove('badger');
        document.getElementById("s6").classList.add('btnbtn');    
              
      </script>
      <!---------------------------------------------------------------------------------->
<div class="tab-pane fade show active">
  <div class="container">
    <table class="table table-bordered" id="table_id">
  <thead>
    <tr>
      <th scope="col">Qty</th>
      <th scope="col">Name</th>
      <th scope="col">Description</th>
      <th scope="col">Date Ordered</th>
      <th scope="col">Total</th>
       <th scope="col">Order By</th>
      <th scope="col">Status</th>
    </tr>
  </thead>
  <tbody>
    <?php 
                  $pending = new orders();
                  $pending-> getcompleted();
     ?>
  </tbody>
</table>
    
  </div>
 
 
</div>
      <?php
    } else  if(isset($_GET['cancelled'])){ 
       ?>
      <script type="text/javascript">
        document.getElementById("cancelled").classList.add('active');
        document.getElementById("pending").classList.remove('active');
        document.getElementById("toship").classList.remove('active');
        document.getElementById("toreceive").classList.remove('active');      
        document.getElementById("completed").classList.remove('active');
         document.getElementById("s1").classList.remove('badger');
        document.getElementById("s1").classList.add('btnbtn');
         document.getElementById("s2").classList.remove('badger');
        document.getElementById("s2").classList.add('btnbtn');
         document.getElementById("s3").classList.remove('badger');
        document.getElementById("s3").classList.add('btnbtn');
         document.getElementById("s4").classList.remove('badger');
        document.getElementById("s4").classList.add('btnbtn');
         document.getElementById("s5").classList.add('badger');
        document.getElementById("s5").classList.remove('btnbtn');
         document.getElementById("pickup").classList.remove('active');
          document.getElementById("s6").classList.remove('badger');
        document.getElementById("s6").classList.add('btnbtn');    
        
              
      </script>
      <!---------------------------------------------------------------------------------->
<div class="tab-pane fade show active">
   <div class="container">
    <table class="table table-bordered" id="table_id">
  <thead>
    <tr>
      <th scope="col">Qty</th>
      <th scope="col">Name</th>
      <th scope="col">Description</th>
      <th scope="col">Date Ordered</th>
      <th scope="col">Total</th>
       <th scope="col">Order By</th>
      <th scope="col">Status</th>
    </tr>
  </thead>
  <tbody>
    <?php 
                  $pending = new orders();
                  $pending-> getcancelled();
     ?>
  </tbody>
</table>
    
  </div>
</div>
      <?php
    } else {

         ?>
      <script type="text/javascript">
       
        document.getElementById("pending").classList.add('active');
        document.getElementById("toship").classList.remove('active');
        document.getElementById("toreceive").classList.remove('active');      
        document.getElementById("completed").classList.remove('active');
        document.getElementById("cancelled").classList.remove('active');
        document.getElementById("s1").classList.add('badger');
        document.getElementById("s1").classList.remove('btnbtn');
         document.getElementById("s2").classList.remove('badger');
        document.getElementById("s2").classList.add('btnbtn');
         document.getElementById("s3").classList.remove('badger');
        document.getElementById("s3").classList.add('btnbtn');
         document.getElementById("s4").classList.remove('badger');
        document.getElementById("s4").classList.add('btnbtn');
         document.getElementById("s5").classList.remove('badger');
        document.getElementById("s5").classList.add('btnbtn');
              
               document.getElementById("pickup").classList.remove('active');
          document.getElementById("s6").classList.remove('badger');
        document.getElementById("s6").classList.add('btnbtn');    
      </script>
      <!---------------------------------------------------------------------------------->
<div class="tab-pane fade show active">
 <div class="container">
    <table class="table table-bordered" id="table_id">
  <thead>
    <tr>
      <th scope="col">Qty</th>
      <th scope="col">Name</th>
      <th scope="col">Description</th>
      <th scope="col">Date Ordered</th>
      <th scope="col">Total</th>
       <th scope="col">Order By</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
   <?php 
                  $pending = new orders();
                  $pending->getPendings();
                  ?>
  </tbody>
</table>
    
  </div>
</div>
    <?php
    }

    ?>

    
   

  </div>
</div>
<p></p>
<hr>
<div class="container">
    <div class="row">
        <h6 style="font-size:13px;text-align:center"><i class="fas fa-info-circle"></i>Customer Feedback </h6>
            <button class="btn btn-danger" style="font-size:12px" onclick="window.location.href='complains.php'">Check</button>
            
    </div>
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
   
<?php  include 'includes/footer.php';?>