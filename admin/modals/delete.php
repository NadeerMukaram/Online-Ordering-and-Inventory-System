<?php



			$sql = "DELETE FROM `product` WHERE  prod_id = '$prodid'  ";
	                $result = mysqli_query($con,$sql); // run query
	                 date_default_timezone_set('Asia/Manila');
	              $datenows= date('Y-m-d H:i:s');
	              $dateonly = date('Y-m-d');
	              $log = "INSERT INTO `logs`(`type`,`section`,`details`, `datelog`, `datetimelog`) VALUES ('Deleting  Units','unit','Deleted product id : $prodid ','$dateonly','$datenows')";
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

																										                   
	              }

?>