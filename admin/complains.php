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
      <h2 style="font-family: 'Turret Road', cursive; letter-spacing: 5px;">Customer's Feedback</h2>
    <?php 
    if(isset($_SESSION['success'])) {
      echo $_SESSION['success'];
      unset($_SESSION['success']);
    }

    ?>
  
      <hr>
     
     <p></p>
        <div class="card">
            <div class="card-header">
                Complains-suggestions-feedback
            </div>
            
            <div class="card-body">
                <div class="card">
  <div class="card-header">
  Reenjay Caimor  <button class="btn btn-danger" style="font-size:12px;float:right">Delete</button> <button class="btn btn-success" style="font-size:12px;float:right;margin-right:5px">Reply</button>
  </div>
  <div class="card-body">
    <blockquote class="blockquote mb-0">
      <p style="font-size:12px">Kulang po Yung item ko na na receive. yung isa po open po . can i request a new one ?</p>
     
    </blockquote>
  </div>
</div>
<p></p>
              <div class="card">
  <div class="card-header">
  Nadeer Mukaram <button class="btn btn-danger" style="font-size:12px;float:right">Delete</button> <button class="btn btn-success" style="font-size:12px;float:right;margin-right:5px">Reply</button>
  </div>
  <div class="card-body">
    <blockquote class="blockquote mb-0">
      <p style="font-size:12px">Nice Po tlga Customer Service nyo , I was serve as if like im a VIP !! Good job! :) :)</p>
     
    </blockquote>
  </div>
</div>
<p></p>
              <div class="card">
  <div class="card-header">
  Wareen Josiah De Guzman <button class="btn btn-danger" style="font-size:12px;float:right">Delete</button> <button class="btn btn-success" style="font-size:12px;float:right;margin-right:5px">Reply</button>
  </div>
  <div class="card-body">
    <blockquote class="blockquote mb-0">
      <p style="font-size:12px">GOod Job po . Bilis ng Order , Bait ma ni manong Delivery guy ! .. Will Order Again !! :)</p>
     
    </blockquote>
  </div>
</div>
<p></p>
              <div class="card">
  <div class="card-header">
  Ryan Camonias <button class="btn btn-danger" style="font-size:12px;float:right">Delete</button> <button class="btn btn-success" style="font-size:12px;float:right;margin-right:5px">Reply</button>
  </div>
  <div class="card-body">
    <blockquote class="blockquote mb-0">
      <p style="font-size:12px">So cool po . at Mura . Every Customer may Free Voucher , pero sana Unlimited :D  Will Order again</p>
     
    </blockquote>
  </div>
</div>
<p></p>
              <div class="card">
  <div class="card-header">
  kerzen dalman lañojan <button class="btn btn-danger" style="font-size:12px;float:right">Delete</button> <button class="btn btn-success" style="font-size:12px;float:right;margin-right:5px">Reply</button>
  </div>
  <div class="card-body">
    <blockquote class="blockquote mb-0">
      <p style="font-size:12px">Nice Nice Nice ,</p>
     
    </blockquote>
  </div>
</div>
<p></p>
              <div class="card">
  <div class="card-header">
  Tres Marias <button class="btn btn-danger" style="font-size:12px;float:right">Delete</button> <button class="btn btn-success" style="font-size:12px;float:right;margin-right:5px">Reply</button>
  </div>
  <div class="card-body">
    <blockquote class="blockquote mb-0">
      <p style="font-size:12px">Great Items .. Super convenient ,, Almost Everything i need . nasa online shop nyo na !! Will order again !!</p>
     
    </blockquote>
  </div>
</div>
                
            </div>
            <div class="card-footer">
                <div class="container">
                    <form>
                        <div class="btn-group " style="float:right" role="group" aria-label="Basic example" >
                          <input type="text" name="message" class="" style="width:170px">
                          <button type="submit" class="btn btn-secondary" >Send <i class="fas fa-paper-plane"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
     
     <p></p>
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