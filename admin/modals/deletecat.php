<?php


                                                                        		$sql = " select * from product where cat_id = '$prodid'  ";
                                                                            $result = mysqli_query($con,$sql); // run query
                                                                            $count= mysqli_num_rows($result); // to count if necessary
                                                                         if ($count>=1){
                                                                        
                                                                            $_SESSION['success'] = '  <div class="alert alert-danger " id="alerto" role="alert" style="float:right;width:auto;font-size: 14px;cursor: default;">
																						You cannot DELETE a category with a PRODUCT ASSOCIATED.<p></p> Note: Deleting first the associated products or updating will enable the deletion.
																										                      </div>
																										                    <script type="text/javascript">
																										                       setInterval(function(){
																										                        document.getElementById("alerto").classList.add("d-none");
																										                       },15000)    
																										                      </script>';

																				                                 header('location:category.php');	
                                                                          
                                                                      }else {
                                                                          	$sql = "DELETE FROM `category` WHERE  cat_id = '$prodid'  ";
	                $result = mysqli_query($con,$sql); // run query
	                 date_default_timezone_set('Asia/Manila');
	              $datenows= date('Y-m-d H:i:s');
	              $dateonly = date('Y-m-d');
	              $log = "INSERT INTO `logs`(`type`,`section`,`details`, `datelog`, `datetimelog`) VALUES ('Deleted category','category','Deleted category id : $prodid','$dateonly','$datenows')";
	              $savelog = mysqli_query($con,$log);
	              if($result) {
	              	 $_SESSION['success'] = '  <div class="alert alert-success " id="alerto" role="alert" style="float:right;width:auto;font-size: 14px;cursor: default;">
																										                     Deleted Successfully!
																										                      </div>
																										                    <script type="text/javascript">
																										                       setInterval(function(){
																										                        document.getElementById("alerto").classList.add("d-none");
																										                       },5000)    
																										                      </script>';

																				                                 header('location:category.php');						                   
	              }
                                                                      }

		

?>