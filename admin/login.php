<?php 
session_start();
include 'connect.php';
		
			  	
			  	if(isset($_POST['btnlogin'])){
			  	$user = $_POST['user'];
			  	$pass = $_POST['pass']; 

			  	$sql = " select * from accounts where username = '$user' and password = '$pass' and user_type ='admin'   ";
			                $result = mysqli_query($con,$sql); // run query
			                $count= mysqli_num_rows($result); // to count if necessary
			               //  $get_id =  mysqli_insert_id($con); // this code gets the newly inserted id . if insert is the action
			             if ($count==1){
			             	//while($row = mysqli_fetch_array($result)){} is where we output all the data in database
			                 while($row = mysqli_fetch_array($result)){
									$_SESSION['users_id'] = $row['user_id'];
									$_SESSION['admin'] = $row['name'].' '.$row['lastname'];
 			                 }
			               
							header('location:dashboard.php');
			          } else {
			          	$_SESSION['error'] ='<div class="alert alert-danger alert-dismissible fade show"  role="alert">
							Incorrect Username Or Password !
							  <button type="button" style="float: right;outline: none;border: none;" class="close" data-dismiss="alert" aria-label="Close">
							    <span aria-hidden="true">&times;</span>
							  </button>
							</div>';
							header('location:index.php');
			          }
			  		
			  	}
					

?>