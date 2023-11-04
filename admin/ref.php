<?php
session_start();
include 'connection/connect.php';
if(isset($_GET['btnsaveavail'])) {
    $value = $_GET['txtchangevalue'];
         $sql = "UPDATE `sales_discount` SET `amount`='$value' WHERE sal_id = '1'  ";
                $result = mysqli_query($con,$sql); // run query
               
               if($result ) {
                 $_SESSION['success'] = '  <div class="alert alert-success " id="alerto" role="alert" style="float:right;width:auto;font-size: 14px;cursor: default;">
																										                   Amount limit changed.
																										                      </div>
																										                    <script type="text/javascript">
																										                       setInterval(function(){
																										                        document.getElementById("alerto").classList.add("d-none");
																										                       },5000)    
																										                      </script>';
																										                      header('location:pcode.php'); 
               }
            
                 
               
    
}

if(isset($_GET['btnsavelimit'])) {
    $value = $_GET['txtchangevalue'];
         $sql = "UPDATE `sales_discount` SET `amount`='$value' WHERE sal_id = '2'  ";
                $result = mysqli_query($con,$sql); // run query
               
               if($result ) {
                  $_SESSION['success'] = '  <div class="alert alert-success " id="alerto" role="alert" style="float:right;width:auto;font-size: 14px;cursor: default;">
																										                   Amount limit changed.
																										                      </div>
																										                    <script type="text/javascript">
																										                       setInterval(function(){
																										                        document.getElementById("alerto").classList.add("d-none");
																										                       },5000)    
																										                      </script>';
																										                      header('location:pcode.php'); 
               }
            
                 
               
    
}
?>