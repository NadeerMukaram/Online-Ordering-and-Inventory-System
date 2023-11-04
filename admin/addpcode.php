<?php
session_start();
include 'connection/connect.php';
       if(isset($_POST['updatepcode'])) {
                                               $amount = $_POST['txtamount'];
                                               $validity = $_POST['txtdate'];
                                               $promoid = $_POST['promoid'];
                          date_default_timezone_set('Asia/Manila');
	              $datenows= date('Y-m-d H:i:s');
	              $dateonly = date('Y-m-d');
	              $log = "INSERT INTO `logs`(`type`,`section`,`details`, `datelog`, `datetimelog`) VALUES ('Updating promocode','pcode','Promocode Updated , discount amount : $amount ','$dateonly','$datenows')";
	              $savelog = mysqli_query($con,$log);                      
                             $sql = "UPDATE `promocodes` SET `discount`='$amount',`validity`='$validity' WHERE promo_id = '$promoid' ";
                            $result = mysqli_query($con,$sql); // run query
                  
                  if($result) {
                      $_SESSION['success'] = '  <div class="alert alert-success " id="alerto" role="alert" style="float:right;width:auto;font-size: 14px;cursor: default;">
																										                    Promocode updated Successfully!
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