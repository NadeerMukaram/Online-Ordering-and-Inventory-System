<?php
session_start();
include 'connection/connect.php';

	if(isset($_POST['saveaccount'])){ 
	     date_default_timezone_set('Asia/Manila');
	              $datenows= date('Y-m-d H:i:s');
	              $dateonly = date('Y-m-d');
	              $log = "INSERT INTO `logs`(`type`,`section`,`details`, `datelog`, `datetimelog`) VALUES ('Adding new accounts','account','new account added :  $givenname ','$dateonly','$datenows')";
	              $savelog = mysqli_query($con,$log);
	/*	$type= $_POST['usertype'];
       $name = $_POST['txtname'];
       $lastname = $_POST['txtlastname'];
       $txtnumber = $_POST['txtnumber'];
       date_default_timezone_set('Asia/Manila');
       $datenow = date('Y/m/d');

       if ($type == 'client') {
      
       $sql = "INSERT INTO `accounts`( `name`, `lastname`, `mobile_number`, `user_type`, `date_registered`) VALUES ('$name','$lastname','$txtnumber','$type','$datenow')  ";
                $result = mysqli_query($con,$sql); // run query
             if($result) {
             	 $_SESSION['success'] = '  <div class="alert alert-success " id="alerto" role="alert" style="float:right;width:auto;font-size: 14px;cursor: default;">
																										                    Account Added Successfully!
																										                      </div>
																										                    <script type="text/javascript">
																										                       setInterval(function(){
																										                        document.getElementById("alerto").classList.add("d-none");
																										                       },5000)    
																										                      </script>';
																										                      header('location:accounts.php');

             }
               

       } else if($type == 'admin') {

       		include 'includes/header.php';
       		?>

       		<div class="container">
       		<div class="row">
       			<p><br><br><br></p>
       			<div class="col-sm-2"></div>
       			<div class="col-sm-8">
       				<div class="card">
       					<div class="container">
       						<p></p>
       						<h5>Enter Username And Password For Login Credentials</h5>
       						<hr>
       					<p></p>
       					 <form method="post" action="addu.php" >
      
       					<input type="hidden" name="usertype" value="<?php echo $type?>">
       					<input type="hidden" name="txtname" value="<?php echo $name?>">
       					<input type="hidden" name="txtlastname" value="<?php echo $lastname?>">
       					<input type="hidden" name="txtnumber" value="<?php echo $txtnumber?>">
       				  	<input type="textuser" name="txtuser" class="form-control" placeholder="Enter Username" autofocus=""><p></p>
       					<input type="password" name="txtpass" class="form-control" placeholder="Enter Password">
       					<p></p>
       					<button class="btn btn-primary" type="Submit" name="submit" >Submit</button>
       					 </form>
       				  	<p></p>
       					</div>
       				  	
       				</div>
       					 
       			</div>
       			<div class="col-sm-2"></div>
       		</div>
       		</div>
       		<?php

       }

    
       /*
		*/
		   $givenname = $_POST['givenname'];
        $lastname= $_POST['lastname'];
        $address = $_POST['address'];
        $contact = $_POST['contact'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        
                        $checkifemailexist = "select * from user_account where email = '$email' and logintype='personal' ";
                         $resultcheck = mysqli_query($con,$checkifemailexist); // run query
                          $count= mysqli_num_rows($resultcheck); // to count if necessary
                          
                           $checkifnumberexist = "select * from user_account where contact_no = '$contact' and logintype='personal' ";
                         $resultchecks = mysqli_query($con,$checkifnumberexist); // run query
                           $countnum= mysqli_num_rows($resultchecks); // to count if necessary
                         
                          
             if ($count==1){
                   ?>
                   
                    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
     <link rel="shortout icon" type="image/x-icon" href="https://cdn.fbsbx.com/v/t59.2708-21/129691924_913408942397501_4331861266440577245_n.gif?_nc_cat=110&ccb=3&_nc_sid=041f46&_nc_eui2=AeExms4dQDTY7umZoxC1iM7y4IS0rfEewhXghLSt8R7CFcR6rJPQwvNIXCDTdGMRILEaZEExVHaA9Qb_hKCfdF6W&_nc_ohc=1SjKXqBVwr8AX8CjKE_&_nc_ht=cdn.fbsbx.com&oh=087ab825a9ccc133567592fc952fa92e&oe=60394595">
    <!-- Bootstrap CSS -->
   <script src="https://kit.fontawesome.com/129b086bc9.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
                   
                   
                    <div class="container" style="">
                        <br><br>
                        <div class="row">
                                <h4>There was a <span style="color:Red">Problem</span> in saving new record.</h4>
                            <h5>REASON : <span style="font-weight:bolder"><?php echo $email?></span> Already exist in our Database <i class="fas fa-exclamation-triangle"></i></h5>
                           
                        </div>
                        <div class="row">
                                <div class="col-sm-6">
                                        <h6>Please Enter another VALID Email to proceed :</h6>
                                        <p></p>
                                        <form method="post">
                                            <input type="hidden" name="givenname" value=<?php echo $givenname?>>
                                            <input type="hidden" name="lastname" value=<?php echo $lastname?>>
                                            <input type="hidden" name="address" value=<?php echo $address?>>
                                            <input type="hidden" name="contact" value=<?php echo $contact?>>
                                       
                                          
                                            <input type="hidden" name="password" value=<?php echo $password?>>
                                        <input type="email" name="email" class="form-control" required autofocus> 
                                        <p></p>
                                        <button type="submit" class="btn btn-success" name="saveaccount">Proceed</button>
                                        </form>
                                </div>
                        </div>
                        
                    </div>
                   <?php
                 
             }else if($countnum == 1 ){
                     ?>
                   
                    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
     <link rel="shortout icon" type="image/x-icon" href="https://cdn.fbsbx.com/v/t59.2708-21/129691924_913408942397501_4331861266440577245_n.gif?_nc_cat=110&ccb=3&_nc_sid=041f46&_nc_eui2=AeExms4dQDTY7umZoxC1iM7y4IS0rfEewhXghLSt8R7CFcR6rJPQwvNIXCDTdGMRILEaZEExVHaA9Qb_hKCfdF6W&_nc_ohc=1SjKXqBVwr8AX8CjKE_&_nc_ht=cdn.fbsbx.com&oh=087ab825a9ccc133567592fc952fa92e&oe=60394595">
    <!-- Bootstrap CSS -->
   <script src="https://kit.fontawesome.com/129b086bc9.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
                   
                   
                    <div class="container" style="">
                        <br><br>
                        <div class="row">
                                <h4>There was a <span style="color:Red">Problem</span> in saving new record.</h4>
                            <h5>REASON : <span style="font-weight:bolder"><?php echo $contact?></span> Already exist in our Database <i class="fas fa-exclamation-triangle"></i></h5>
                           
                        </div>
                        <div class="row">
                                <div class="col-sm-6">
                                        <h6>Only One number is allowed. Please enter valid number :</h6>
                                        <p></p>
                                        <form method="post">
                                            <input type="hidden" name="givenname" value=<?php echo $givenname?>>
                                            <input type="hidden" name="lastname" value=<?php echo $lastname?>>
                                            <input type="hidden" name="address" value=<?php echo $address?>>
                                            <input type="hidden" name="contact" value=<?php echo $contact?>>
                                             <input type="hidden" name="email" value =<?php echo $email?>>
                                           
                                            <input type="hidden" name="password" value=<?php echo $password?>>
                                        <input type="text" name="contact" maxlength='11' oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" class="form-control" required autofocus> 
                                        <p></p>
                                        <button type="submit" class="btn btn-success" name="saveaccount">Proceed</button>
                                        </form>
                                </div>
                        </div>
                        
                    </div>
                   <?php
                 
             }
              else {
                 date_default_timezone_set('Asia/Manila');
       $datenow = date('Y/m/d');
                 
                 $sql = " INSERT INTO `user_account`(`uname`, `surname`, `address`, `contact_no`, `logintype`, `email`,`datejoined`, `password`) VALUES 
            	('$givenname','$lastname','$address','$contact','personal','$email','$datenow','$password')  ";
                $result = mysqli_query($con,$sql); // run query
               
               
               
            if ($result) {
                   	 $_SESSION['success'] = '  <div class="alert alert-success " id="alerto" role="alert" style="float:right;width:auto;font-size: 14px;cursor: default;">
																										                    Account Added Successfully!
																										                      </div>
																										                    <script type="text/javascript">
																										                       setInterval(function(){
																										                        document.getElementById("alerto").classList.add("d-none");
																										                       },5000)    
																										                      </script>';
																										                      header('location:accounts.php');

            }else {
                echo 'Problem Adding';
            }
                 
             }
                 
             
          

	}


   if(isset($_POST['submit'])){ 

       	$type= $_POST['usertype'];
       $name = $_POST['txtname'];
       $lastname = $_POST['txtlastname'];
       $txtnumber = $_POST['txtnumber'];
       		$txtuser = $_POST['txtuser'];
       		$txtpass = $_POST['txtpass'];
       		 date_default_timezone_set('Asia/Manila');
       $datenow = date('Y/m/d');


       		 $sql = "INSERT INTO `accounts`( `name`, `lastname`, `mobile_number`, `user_type`, `date_registered`,`username`,`password`) VALUES ('$name','$lastname','$txtnumber','$type','$datenow','$txtuser','$txtpass')  ";
                $result = mysqli_query($con,$sql); // run query
             if($result) {
             	 $_SESSION['success'] = '  <div class="alert alert-success " id="alerto" role="alert" style="float:right;width:auto;font-size: 14px;cursor: default;">
																										                    Account Added Successfully!
																										                      </div>
																										                    <script type="text/javascript">
																										                       setInterval(function(){
																										                        document.getElementById("alerto").classList.add("d-none");
																										                       },5000)    
																										                      </script>';
																										                      header('location:accounts.php');

             }

       }

?>