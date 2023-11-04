<?php



			$sql = "DELETE FROM `user_account` WHERE  user_id = '$user_id'  ";
	                $result = mysqli_query($con,$sql); // run query
	                 date_default_timezone_set('Asia/Manila');
	              $datenows= date('Y-m-d H:i:s');
	              $dateonly = date('Y-m-d');
	              $log = "INSERT INTO `logs`(`type`,`section`,`details`, `datelog`, `datetimelog`) VALUES ('Deleted accounts','account','Deleted account id : $user_id ','$dateonly','$datenows')";
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