<?php 
session_start();
	include 'connection/connect.php';
	 
	if(isset($_GET['approve'])){ 
		$oid = $_GET['order_id'];
		$type = $_GET['trtype'];
		    
		if($type == 'pickup') {
		        	$sql = " update trans_record set `status` = 'approved' where track_id ='$oid'  ";
			                $result = mysqli_query($con,$sql); // run query

			                if($result) {
			                	$_SESSION['success'] = '
			                	   <div class="alert alert-success" id="hideinseconds" role="alert">
						        Order approved Successfully!
						      </div>
						      <script type="text/javascript">
						        setInterval(function() {
						          document.getElementById("hideinseconds").classList.add("d-none");
						        },4000)        
						      </script>
			                	';
			                	header('location:orders.php?pending');
			                	
			                }
		}else if($type == 'cod') {
		    
					$sql = " update trans_record set `status` = 'toship' , `forcod`= 'codgood' where track_id ='$oid'  ";
			                $result = mysqli_query($con,$sql); // run query

			                if($result) {
			                	$_SESSION['success'] = '
			                	   <div class="alert alert-success" id="hideinseconds" role="alert">
						        Order approved Successfully!
						      </div>
						      <script type="text/javascript">
						        setInterval(function() {
						          document.getElementById("hideinseconds").classList.add("d-none");
						        },4000)        
						      </script>
			                	';
			                	header('location:orders.php?pending');
			                }
		}


			            
		
	}

	if(isset($_GET['shipped'])){ 
		$oid = $_GET['order_id'];
date_default_timezone_set('Asia/Manila');
$datenow = date('Y-m-d');

					$sql = " update trans_record set `Order_accepted`='$datenow' ,  `status` = 'toreceive' where track_id ='$oid'  ";
			                $result = mysqli_query($con,$sql); // run query

			                if($result) {
			                	$_SESSION['success'] = '
			                	   <div class="alert alert-success" id="hideinseconds" role="alert">
						        Order was Marked Shipped Successfully!
						      </div>
						      <script type="text/javascript">
						        setInterval(function() {
						          document.getElementById("hideinseconds").classList.add("d-none");
						        },4000)        
						      </script>
			                	';
			                	header('location:orders.php?toship');
			                }
	}

	if(isset($_GET['completed'])){ 
		$oid = $_GET['order_id'];
date_default_timezone_set('Asia/Manila');
$datenow = date('Y-m-d');

					$sql = " update trans_record set `datecompleted`='$datenow' ,`status` = 'completed'  where track_id ='$oid'  ";
			                $result = mysqli_query($con,$sql); // run query

			                if($result) {
			                	$_SESSION['success'] = '
			                	   <div class="alert alert-success" id="hideinseconds" role="alert">
						        Order was Marked Complete Successfully!
						      </div>
						      <script type="text/javascript">
						        setInterval(function() {
						          document.getElementById("hideinseconds").classList.add("d-none");
						        },4000)        
						      </script>
			                	';
			                	header('location:orders.php?completed');
			                }
	}

	if(isset($_GET['cancel'])){
	 $oid = $_GET['order_id'];
	 $typee = $_GET['type'];



	 $sql = " update trans_record set `status` = 'cancelled' where track_id ='$oid'  ";
			                $result = mysqli_query($con,$sql); // run query

			                if($result) {
			                	$_SESSION['success'] = '
			           <div class="alert alert-warning alert-dismissible fade show" role="alert">
			  <strong>Order Cancelled ! </strong> accidentally pressed ? <a href="orders_action.php?restore&order_id='.$oid.'&type='.$typee.' " style="text-decoration: none">Restore   <i class="fas fa-sync fa-spin"></i></a>
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close" style="outline: none;border: none;float: right;">
			    <span aria-hidden="true">&times;</span>
			  </button>
			</div>
						     
			                	';

			                	if($typee == 'pending') {
			                		header('location:orders.php?pending');
			                	
			                	}else if ($typee == 'toship') {
			                		header('location:orders.php?toship');
			                	}else if ($typee =='toreceive'){
			                	    	header('location:orders.php?toreceive');
			                	}
			                	

			                }

			                	
			               
		
	}

	if(isset($_GET['restore'])){ 
		$oid = $_GET['order_id'];
		$typee = $_GET['type'];



			function restorecancelled($stat,$id) {
				include 'connection/connect.php';
				 $sql = " update trans_record set `status` = '$stat' where track_id ='$id'  ";
			                $result = mysqli_query($con,$sql); // run query

			                if($result) {
			                	$_SESSION['success'] = '
			          <div class="alert alert-success" id="hideinseconds" role="alert">
						        Order Restored Successfully!
						      </div>
						      <script type="text/javascript">
						        setInterval(function() {
						          document.getElementById("hideinseconds").classList.add("d-none");
						        },4000)        
						      </script>
						     
			                	';
			                	
			                }
		
		}


							if($typee == 'pending') {

								restorecancelled('pending',$oid);
			                		header('location:orders.php?pending');
			                	
			                	}else if ($typee == 'toship') {
			                		restorecancelled('toship',$oid);
			                		header('location:orders.php?toship');
			                	}else if ($typee =='toreceive'){
			                	    restorecancelled('toreceive',$oid);
			                	    	header('location:orders.php?toreceive');
			                	}
			                	

		
	

	

		
	}
?>