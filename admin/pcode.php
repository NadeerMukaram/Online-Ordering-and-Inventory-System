<?php
session_start();
if(!isset($_SESSION['users_id'])) {
header('location:index.php');

}
$_SESSION['pcode'] = '1';
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
      <h2 style="font-family: 'Jost', sans-serif;letter-spacing: 5px;">PROMO CODES</h2>
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
               $prodid = $_GET['promoid'];
            include 'modals/editmodalpcode.php';
            }else if (isset($_GET['del'])) {
               $prodid = $_GET['promoid'];
               include 'modals/deletepcode.php';
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
                    <th scope="col">Code</th>
                    <th scope="col">Discount-Price</th>
                     <th scope="col">Validity</th>
                     <th scope="col">Status</th>
                     <th scope="col">Action</th>
                   
                  </tr>
                </thead>
                <tbody>
                  <?php 
                  $Datatable = new Data();
                  $Datatable->getpromocodes();
                  ?>

                </tbody>
              </table>
              <p></p>
              <hr>
              <p><br></p>
              <h5 style="font-weight:bolder">Amount Limits</h5>
              <div class="row">
                  <div class="container">
                        <table class="table table-light">
                  <thead>
                    <tr>
                      <th scope="col">Details</th>
                      <th scope="col">Amount</th>
                      <th scope="col">Action</th>
                      
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                        <td>Total Amount To avail Voucher of Promocodes</td>
                        <td>
                            <?php 
         $selectavil = " SELECT * FROM `sales_discount` where sal_id = '1' ";
                       $resultavil = mysqli_query($con,$selectavil); // run query
                       $count= mysqli_num_rows($resultavil); // to count if necessary
                  
                       
                        while($row = mysqli_fetch_array($resultavil)){
                                echo $row['amount'];
                        }
                 
         ?>
                        </td>
                        <td>
                            <button type="button" class="btn btn-dark" style="background-color:transparent;font-size:11px;color:#2b1d2b" data-toggle="modal" data-target="#prmo">Change</button>
                        </td>
                        
                    </tr>
                    
                    <tr>
                        <td>PickUp Amount Limit ,To Trigger payment Online</td>
                        <td>
                            <?php 
         $selectavils = " SELECT * FROM `sales_discount` where sal_id = '2' ";
                       $resultavils = mysqli_query($con,$selectavils); // run query
                       
                  
                       
                        while($row = mysqli_fetch_array($resultavils)){
                                echo $row['amount'];
                        }
                 
  ?>
                        </td>
                        <td>
                             <button type="button" class="btn btn-dark" style="background-color:transparent;font-size:11px;color:#2b1d2b" data-toggle="modal" data-target="#limitchange">Change</button>
                        </td>
                    </tr>
                  </tbody>
                </table>
                  </div>
              </div>
          </div>
    <?php include 'savingmodal.php'?>
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