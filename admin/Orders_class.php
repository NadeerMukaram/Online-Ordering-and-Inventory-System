<?php

class orders {

	function getCountsoftab($status){
include 'connection/connect.php';
			$sql = " select * from trans_record where status = '$status' ";
	                $result = mysqli_query($con,$sql); // run query
	                $count= mysqli_num_rows($result); // to count if necessary
	           
	           echo $count;

	}

	function countfordashboard($table) {
		include 'connection/connect.php';
			$sql = " select * from $table  ";
	                $result = mysqli_query($con,$sql); // run query
	                $count= mysqli_num_rows($result); // to count if necessary
	           
	           echo $count;

	}

function countfordashboardsales() {
		include 'connection/connect.php';
			$sql = " select * from trans_record where status ='completed'  ";
	                $result = mysqli_query($con,$sql); // run query
	                $count= mysqli_num_rows($result); // to count if necessary
	           
	           echo $count;

	}

		function getPendings() {
			include 'connection/connect.php';

				           
				          			$sql = " select * from trans_record where status = 'pending' order by dateandtime desc  ";
				          	                $result = mysqli_query($con,$sql); // run query
				          	                $count= mysqli_num_rows($result); // to count if necessary
				          	               //  $get_id =  mysqli_insert_id($con); // this code gets the newly inserted id . if insert is the action
				          	             if ($count>=1){
				          	             	//while($row = mysqli_fetch_array($result)){} is where we output all the data in database
				          	                 while($row = mysqli_fetch_array($result)){
				          	                 	$prodid = $row['prod_id'];
				          	                 	$track_id = $row['track_id'];
				          	                 	$user = $row['user_id'];
				          	                 	$trtype = $row['transaction_type'];
				          						?>
				          						
				          						<tr>
				          							<td><?php echo $row['quantity']?></td>
				          							<?php 
				          								$selectprod = "select * from product where prod_id ='$prodid' ";
				          								 $getselected = mysqli_query($con,$selectprod);
				          								  while($selected = mysqli_fetch_array($getselected)){ 
				          								  	?>
				          								  	<td><?php echo $selected['name']?></td>
				          								  	<td><?php echo $selected['description']?></td>
				          								  	<?php
				          								  }
				          							?>
				          							<td><?php echo $row['dateandtime']?></td>
				          							<td>₱<?php echo $row['total']?></td>
				          							<td >
				          								<?php
				          								$getusername = "select * from user_account where user_id = '$user' ";
				          								 $getuser= mysqli_query($con,$getusername); 
				          								  while($user = mysqli_fetch_array($getuser)){ 
				          								  	echo $user['uname'].' '.$user['surname'];

				          								  }

				          								?>
				          							</td>
				          							<td>
				          								<a href="orders_action.php?approve&order_id=<?php echo $track_id?>&trtype=<?php echo $trtype?>" class="btn btn-success" style="font-size: 13px;width: 80px"> Approve</a>	
				          								<a href="orders_action.php?cancel&order_id=<?php echo $track_id?>&type=pending " class="btn btn-danger" style="font-size: 13px;margin-top: 2px;width: 80px"> cancel</a>

				          							</td>
				          							
				          						</tr>
				          						
				          						<?php
				          	                 }
				          	          }else {
				          	          	?>
				          	          	<tr>
				          	          		<td colspan="7">No Orders yet.</td>
				          	          	</tr>
				          	          	<?php
				          	          }
				                 
				          
		}

function getpickup() {
        	include 'connection/connect.php';

				           
				          			$sql = " select * from trans_record where status = 'approved' order by dateandtime desc  ";
				          	                $result = mysqli_query($con,$sql); // run query
				          	                $count= mysqli_num_rows($result); // to count if necessary
				          	               //  $get_id =  mysqli_insert_id($con); // this code gets the newly inserted id . if insert is the action
				          	             if ($count>=1){
				          	             	//while($row = mysqli_fetch_array($result)){} is where we output all the data in database
				          	                 while($row = mysqli_fetch_array($result)){
				          	                 	$prodid = $row['prod_id'];
				          	                 	$track_id = $row['track_id'];
				          	                 	$user = $row['user_id'];
				          	                 	$trtype = $row['transaction_type'];
				          						?>
				          						
				          						<tr>
				          							<td><?php echo $row['quantity']?></td>
				          							<?php 
				          								$selectprod = "select * from product where prod_id ='$prodid' ";
				          								 $getselected = mysqli_query($con,$selectprod);
				          								  while($selected = mysqli_fetch_array($getselected)){ 
				          								  	?>
				          								  	<td><?php echo $selected['name']?></td>
				          								  	<td><?php echo $selected['description']?></td>
				          								  	<?php
				          								  }
				          							?>
				          							<td><?php echo $row['dateandtime']?></td>
				          							<td>₱<?php echo $row['total']?></td>
				          							<td >
				          								<?php
				          								$getusername = "select * from user_account where user_id = '$user' ";
				          								 $getuser= mysqli_query($con,$getusername); 
				          								  while($user = mysqli_fetch_array($getuser)){ 
				          								  	echo $user['uname'].' '.$user['surname'];

				          								  }

				          								?>
				          							</td>
				          							<td>
				          							 <a  href="orders_action.php?completed&order_id=<?php echo $track_id?>&type=pickup" class="btn btn-success" style="font-size: 13px;width: 100px;">Mark as Complete</a>  

				          							</td>
				          							
				          						</tr>
				          						
				          						<?php
				          	                 }
				          	          }else {
				          	          	?>
				          	          	<tr>
				          	          		<td colspan="7">No Orders yet.</td>
				          	          	</tr>
				          	          	<?php
				          	          }
				                 
}

function gettoships() {
			include 'connection/connect.php';

				           
				          			$sql = " select * from trans_record where status = 'toship'  ";
				          	                $result = mysqli_query($con,$sql); // run query
				          	                $count= mysqli_num_rows($result); // to count if necessary
				          	               //  $get_id =  mysqli_insert_id($con); // this code gets the newly inserted id . if insert is the action
				          	             if ($count>=1){
				          	             	//while($row = mysqli_fetch_array($result)){} is where we output all the data in database
				          	                 while($row = mysqli_fetch_array($result)){
				          	                 	$prodid = $row['prod_id'];
				          	                 	$track_id = $row['track_id'];
				          	                 	$user = $row['user_id'];
				          						?>
				          						
				          						<tr>
				          							<td><?php echo $row['quantity']?></td>
				          							<?php 
				          								$selectprod = "select * from product where prod_id ='$prodid' ";
				          								 $getselected = mysqli_query($con,$selectprod);
				          								  while($selected = mysqli_fetch_array($getselected)){ 
				          								  	?>
				          								  	<td><?php echo $selected['name']?></td>
				          								  	<td><?php echo $selected['description']?></td>
				          								  	<?php
				          								  }
				          							?>
				          							<td><?php echo $row['dateandtime']?></td>
				          							<td>₱<?php echo $row['total']?></td>
				          							<td >
				          								<?php
				          								$getusername = "select * from user_account where user_id = '$user' ";
				          								 $getuser= mysqli_query($con,$getusername); 
				          								  while($user = mysqli_fetch_array($getuser)){ 
				          								  	echo $user['uname'].' '.$user['surname'];

				          								  }

				          								?>
				          							</td>
				          							<td>
				          								<a href="orders_action.php?shipped&order_id=<?php echo $track_id?>" class="btn btn-success" style="font-size: 13px;width: 100px">Mark as Shipped</a>	
				          								<a href="orders_action.php?cancel&order_id=<?php echo $track_id?>&type=toship" class="btn btn-danger" style="font-size: 13px;margin-top: 2px;width: 100px"> cancel</a>

				          							</td>
				          							
				          						</tr>
				          						
				          						<?php
				          	                 }
				          	          }else {
				          	          	?>
				          	          	<tr>
				          	          		<td colspan="7">No Orders yet.</td>
				          	          	</tr>
				          	          	<?php
				          	          }
				                 
				          
		}


		function gettoreceives() {

			include 'connection/connect.php';

				           
				          			$sql = " select * from trans_record where status = 'toreceive'  ";
				          	                $result = mysqli_query($con,$sql); // run query
				          	                $count= mysqli_num_rows($result); // to count if necessary
				          	               //  $get_id =  mysqli_insert_id($con); // this code gets the newly inserted id . if insert is the action
				          	             if ($count>=1){
				          	             	//while($row = mysqli_fetch_array($result)){} is where we output all the data in database
				          	                 while($row = mysqli_fetch_array($result)){
				          	                 	$prodid = $row['prod_id'];
				          	                 	$track_id = $row['track_id'];
				          	                 	$user = $row['user_id'];
				          	                 	$orderaccepted = $row['Order_accepted'];
				          						?>
				          						
				          						<tr>
				          							<td><?php echo $row['quantity']?></td>
				          							<?php 
				          								$selectprod = "select * from product where prod_id ='$prodid' ";
				          								 $getselected = mysqli_query($con,$selectprod);
				          								  while($selected = mysqli_fetch_array($getselected)){ 
				          								  	?>
				          								  	<td><?php echo $selected['name']?></td>
				          								  	<td><?php echo $selected['product_code']?></td>
				          								  	<?php
				          								  }
				          							?>
				          							<td><?php echo $row['dateandtime']?></td>
				          							<td>₱<?php echo $row['total']?></td>
				          							<td >
				          								<?php
				          								$getusername = "select * from user_account where user_id = '$user' ";
				          								 $getuser= mysqli_query($con,$getusername); 
				          								  while($user = mysqli_fetch_array($getuser)){ 
				          								  	$userrrr= $user['uname'];
				          								  	echo $user['uname'].' '.$user['surname'];

				          								  }

				          								?>
				          							</td>
				          							<td>
				          								<!--<a href="orders_action.php?received&order_id=<?php echo $track_id?>" class="btn btn-success" style="font-size: 13px;width: 100px">Mark as Complete</a> -->	
				          									<p style="color: #6eb366"><span >Waiting</span> for <?php echo 'Mr/Mrs. <br>'.$userrrr?> <br>	to Receive 	</p>
				          							<?php
				          							
				          							$datetoaccept = date('Y-m-d', strtotime($orderaccepted . ' + 4 days'));
				          						date_default_timezone_set('Asia/Manila');
				          					
                                            $datenow = date('Y-m-d');	
                                          
				          							if($datenow > $datetoaccept) {
				          							   ?>
				          							    <a  href="orders_action.php?completed&order_id=<?php echo $track_id?>" class="btn btn-success" style="font-size: 13px;width: 100px;">Mark as Complete</a>  
				          							   <?php
				          							}else {
				          							    ?>
				          							    <p style="font-size:12px;color:grey"><i class="fas fa-info-circle"></i>Validating Order Transaction</p>
				          							 <button class="btn btn-secondary" style="font-size: 13px;width: 100px;" disabled >Mark as Complete</button>      
				          							    <?php
				          							}
				          							
				          							?>		
				
				  
        	<a href="orders_action.php?cancel&order_id=<?php echo $track_id?>&type=toreceive" class="btn btn-danger" style="font-size: 13px;margin-top: 2px;width: 100px"> cancel</a>
				          							</td>
				          							
				          						</tr>
				          						
				          						<?php
				          	                 }
				          	          }else {
				          	          	?>
				          	          	<tr>
				          	          		<td colspan="7">No Orders yet.</td>
				          	          	</tr>
				          	          	<?php
				          	          }
				                 

		}

	function getcompleted() {

			include 'connection/connect.php';
            date_default_timezone_set('Asia/Manila');
            $datenow = date('Y-m-d');
            	$datetoaccept = date('Y-m-d', strtotime($datenow . ' + 30 days'));
				           
				          			$sql = " select * from trans_record where status = 'completed' order by datecompleted desc  ";
				          	                $result = mysqli_query($con,$sql); // run query
				          	                $count= mysqli_num_rows($result); // to count if necessary
				          	               //  $get_id =  mysqli_insert_id($con); // this code gets the newly inserted id . if insert is the action
				          	             if ($count>=1){
				          	             	//while($row = mysqli_fetch_array($result)){} is where we output all the data in database
				          	                 while($row = mysqli_fetch_array($result)){
				          	                 	$prodid = $row['prod_id'];
				          	                 	$track_id = $row['track_id'];
				          	                 	$user = $row['user_id'];
				          						?>
				          						
				          						<tr>
				          							<td><?php echo $row['quantity']?></td>
				          							<?php 
				          								$selectprod = "select * from product where prod_id ='$prodid' ";
				          								 $getselected = mysqli_query($con,$selectprod);
				          								  while($selected = mysqli_fetch_array($getselected)){ 
				          								  	?>
				          								  	<td><?php echo $selected['name']?></td>
				          								  	<td><?php echo $selected['description']?></td>
				          								  	<?php
				          								  }
				          							?>
				          							<td><?php echo $row['dateandtime']?></td>
				          							<td>₱<?php echo $row['total']?></td>
				          							<td >
				          								<?php
				          								$getusername = "select * from user_account where user_id = '$user' ";
				          								 $getuser= mysqli_query($con,$getusername); 
				          								  while($user = mysqli_fetch_array($getuser)){ 
				          								  	$userrrr= $user['uname'];
				          								  	echo $user['uname'].' '.$user['surname'];

				          								  }

				          								?>
				          							</td>
				          							<td>
				          								<!--<a href="orders_action.php?received&order_id=<?php echo $track_id?>" class="btn btn-success" style="font-size: 13px;width: 100px">Mark as Complete</a> -->	
				          									<p style="color: #6eb366">COMPLETED 	</p>

				          							</td>
				          							
				          						</tr>
				          						
				          						<?php
				          	                 }
				          	          }else {
				          	          	?>
				          	          	<tr>
				          	          		<td colspan="7">No Orders yet.</td>
				          	          	</tr>
				          	          	<?php
				          	          }
				                 

		}


			function getcancelled() {

			include 'connection/connect.php';
                date_default_timezone_set('Asia/Manila');
                $datenow = date('Y-m-d');
				           
				          			$sql = " select * from trans_record where status = 'cancelled'  ";
				          	                $result = mysqli_query($con,$sql); // run query
				          	                $count= mysqli_num_rows($result); // to count if necessary
				          	               //  $get_id =  mysqli_insert_id($con); // this code gets the newly inserted id . if insert is the action
				          	             if ($count>=1){
				          	             	//while($row = mysqli_fetch_array($result)){} is where we output all the data in database
				          	                 while($row = mysqli_fetch_array($result)){
				          	                 	$prodid = $row['prod_id'];
				          	                 	$track_id = $row['track_id'];
				          	                 	$user = $row['user_id'];
				          						?>
				          						
				          						<tr>
				          							<td><?php echo $row['quantity']?></td>
				          							<?php 
				          								$selectprod = "select * from product where prod_id ='$prodid' ";
				          								 $getselected = mysqli_query($con,$selectprod);
				          								  while($selected = mysqli_fetch_array($getselected)){ 
				          								  	?>
				          								  	<td><?php echo $selected['name']?></td>
				          								  	<td><?php echo $selected['description']?></td>
				          								  	<?php
				          								  }
				          							?>
				          							<td><?php echo $row['dateandtime']?></td>
				          							<td>₱<?php echo $row['total']?></td>
				          							<td >
				          								<?php
				          								$getusername = "select * from user_account where user_id = '$user' ";
				          								 $getuser= mysqli_query($con,$getusername); 
				          								  while($user = mysqli_fetch_array($getuser)){ 
				          								  	$userrrr= $user['uname'];
				          								  	echo $user['uname'].' '.$user['surname'];

				          								  }

				          								?>
				          							</td>
				          							<td>
				          								<!--<a href="orders_action.php?received&order_id=<?php echo $track_id?>" class="btn btn-success" style="font-size: 13px;width: 100px">Mark as Complete</a> -->	
				          									<p style="color: #c4112f">CANCELLED 	</p>

				          							</td>
				          							
				          						</tr>
				          						
				          						<?php
				          	                 }
				          	          }else {
				          	          	?>
				          	          	<tr>
				          	          		<td colspan="7">No Orders yet.</td>
				          	          	</tr>
				          	          	<?php
				          	          }
				                 

		}

}









?>