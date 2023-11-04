<?php
session_start();
include 'connection/connect.php';

if(isset($_POST['savecategory'])){ 
	$category = $_POST['txtcat'];
	 date_default_timezone_set('Asia/Manila');
	              $datenows= date('Y-m-d H:i:s');
	              $dateonly = date('Y-m-d');
	              $log = "INSERT INTO `logs`(`type`,`section`,`details`, `datelog`, `datetimelog`) VALUES ('Adding new category','category','new category added : $category','$dateonly','$datenows')";
	              $savelog = mysqli_query($con,$log);
	        
                        	$sqls = " select * from category where `categoryname`= '$category'  ";
                    $resultss = mysqli_query($con,$sqls); // run query
                     $count= mysqli_num_rows($resultss); // to count if necessary
                                                                         
                             if ($count ==1) {
             $_SESSION['success'] = '  <div class="alert alert-danger " id="alerto" role="alert" style="float:right;width:auto;font-size: 14px;cursor: default;">
			 Saving Failed. Category Already <span style="font-weight:bolder">EXIST.</span> 
																										                      </div>
																										                    <script type="text/javascript">
																										                       setInterval(function(){
																										                        document.getElementById("alerto").classList.add("d-none");
																										                       },8000)    
																										                      </script>';
																										                      header('location:category.php');
                            }else {
                                $sql = " INSERT INTO `category`(`categoryname`) VALUES ('$category')  ";
		                $result = mysqli_query($con,$sql); // run query

		                if($result) {
		                	 $_SESSION['success'] = '  <div class="alert alert-success " id="alerto" role="alert" style="float:right;width:auto;font-size: 14px;cursor: default;">
																										                     Category Added Successfully!
																										                      </div>
																										                    <script type="text/javascript">
																										                       setInterval(function(){
																										                        document.getElementById("alerto").classList.add("d-none");
																										                       },5000)    
																										                      </script>';
																										                      header('location:category.php');

																										                   
                                                                                                                                   
		                }
                            }

				
		              
}

	if(isset($_POST['updatecat'])){
		$category = $_POST['txtcat'];
		$catid = $_POST['catid'];
		 date_default_timezone_set('Asia/Manila');
	              $datenows= date('Y-m-d H:i:s');
	              $dateonly = date('Y-m-d');
	              $log = "INSERT INTO `logs`(`type`,`section`,`details`, `datelog`, `datetimelog`) VALUES ('updating category','category','category updated id : $catid ','$dateonly','$datenows')";
	              $savelog = mysqli_query($con,$log);
		
			            	            $sqls = " select * from category where `categoryname`= '$category' and `cat_id` = '$catid'  ";
                                                                                $resultss = mysqli_query($con,$sqls); // run query
                                                                                 $count= mysqli_num_rows($resultss); // to count if necessary
                                                                         
                                                                                if ($count ==1) {
                                                                                      while($row = mysqli_fetch_array($resultss)){ 
                                                                                          $catname = $row['categoryname'];
                                                                                         
                                                                                      }
                                                                        
                                                                        //run update
                                                                        	$sql = "UPDATE `category` SET  `categoryname`='$category' WHERE cat_id = '$catid'  ";
		                $result = mysqli_query($con,$sql); // run query

		                if ($result) {
		                	 $_SESSION['success'] = '  <div class="alert alert-success " id="alerto" role="alert" style="float:right;width:auto;font-size: 14px;cursor: default;">
																										                     Category Updated Successfully! 
																										                      </div>
																										                    <script type="text/javascript">
																										                       setInterval(function(){
																										                        document.getElementById("alerto").classList.add("d-none");
																										                       },5000)    
																										                      </script>';
																										                      header('location:category.php');

		                }
                                                                                }else{
                                                                                    $sqls = " select * from category where `categoryname`= '$category'  ";
                                                                                $resultss = mysqli_query($con,$sqls); // run query
                                                                                 $count= mysqli_num_rows($resultss); // to count if necessary
                                                                         
                                                                                if ($count ==1) {
                                                                                   $_SESSION['success'] = '  <div class="alert alert-danger " id="alerto" role="alert" style="float:right;width:auto;font-size: 14px;cursor: default;">
																										                    Updating Failed. This category Entered ~ Already <span style="font-weight:bolder">EXIST.</span> 
																										                      </div>
																										                    <script type="text/javascript">
																										                       setInterval(function(){
																										                        document.getElementById("alerto").classList.add("d-none");
																										                       },5000)    
																										                      </script>';
																										                      header('location:category.php');
                                                                                  
                                                                                }else {
                                                                                   	$sql = "UPDATE `category` SET  `categoryname`='$category' WHERE cat_id = '$catid'  ";
		                $result = mysqli_query($con,$sql); // run query

		                if ($result) {
		                	 $_SESSION['success'] = '  <div class="alert alert-success " id="alerto" role="alert" style="float:right;width:auto;font-size: 14px;cursor: default;">
																										                     Category Updated Successfully!
																										                      </div>
																										                    <script type="text/javascript">
																										                       setInterval(function(){
																										                        document.getElementById("alerto").classList.add("d-none");
																										                       },5000)    
																										                      </script>';
																										                      header('location:category.php');

		                }
                                                                                }
                                                                         
                                                                         
                                                                                
                                                                                }

		
		
	}


?>