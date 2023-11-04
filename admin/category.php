<?php
session_start();
if(!isset($_SESSION['users_id'])) {
header('location:index.php');

}
$_SESSION['Category'] = '1';
 include 'includes/header.php';?>
  
  
  <div class="page-wrapper chiller-theme toggled">
  
  <?php include 'includes/sidebar.php';

  include 'class.php';

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
            width: 30%;
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
      <h2 style="font-family: 'Jost', sans-serif;letter-spacing: 5px;">CATEGORY</h2>
      <hr>
     
      
      <script>
      
      </script>
      <div class="row">
         <div class="card">
          <p></p>
          <button class="btn btn-info clicksessionadd"  data-toggle="modal" data-target="#addnew" style="width: 10%;font-size: 12px">Add New <i class="fas fa-plus"></i></button>
            <!-- Button trigger modal -->
          
            <?php include 'modals/addnewproduct.php';

             if (isset($_GET['Edit'])) {
               $prodid = $_GET['prodid'];
            include 'modals/editmodalcat.php';
            }else if (isset($_GET['del'])) {
               $prodid = $_GET['prodid'];
               include 'modals/deletecat.php';
            }

            ?>

          <p></p>
          <?php 
          if (isset($_SESSION['success'])) {
            echo $_SESSION['success'];
            unset($_SESSION['success']);
          }

          ?>
              <table class="table table-striped" id="table_id">
                <thead>
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Category</th>
                    <th scope="col">Status</th>
                    
                    <th scope="col">Action</th>
                   
                  </tr>
                </thead>
                <tbody>
                  <?php 
                  $Datatable = new Data();
                  $Datatable->getCategory();
                  ?>

                </tbody>
              </table>
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

 <script>
   $(document).ready(function() {

    $('.clicksessionadd').click(function() { 
        <?php
        $_SESSION['addnew']='addnewuser';
        ?>
    })

     $('.clicksessionedit').click(function() { 
        <?php
        $_SESSION['edit']='edit';
        ?>
    })
      $('.clicksessiondelete').click(function() { 
        <?php

        $_SESSION['delete']='delete';
        ?>
    })
  
 
 });      
     
 </script>
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