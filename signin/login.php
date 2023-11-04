<?php 
session_start();   

include '../admin/connection/connect.php';
  if (isset($_POST['login-submit'])) {
					            $user = $_POST['username'];
					            $pass = $_POST['password'];
					            
      
                  
            
		$sql = " select * from user_account where email = '$user' and password = '$pass'  ";
               $result = mysqli_query($con,$sql); // run query
                $count= mysqli_num_rows($result); // to count if necessary
             
             if ($count==1){
                 
            while($row = mysqli_fetch_array($result)){
               
                $_SESSION['user_id']= $row["user_id"];
                $_SESSION['name'] = $row["uname"];
                $_SESSION['email'] = $row["email"];
                    $usermail = $row["email"];
                    $name = $row["uname"];
            
                
             
                }
                 ?>
	  <script>window.location.href="https://hantechdesign.com/"</script>
							                    <?php 
            
              
          }else {
              header('location:https://hantechdesign.com/signin/index.php?failed-Authentication  ');
          }
					        
                       
                   
  }else if (isset($_POST['btnregister'])) {
      $uname = $_POST['givenname'];
      $lastname = $_POST['lastname'];
      $address = $_POST['address'];
      $contact = $_POST['contact'];
      $email = $_POST['email'];
      $password = $_POST['password'];
       $repassword = $_POST['confirm-password'];
       
       if ($password != $repassword) {
             ?>
        <script>
            alert('Password Does not MATCH.');
            history.back();</script>
      <?php
       }else {
                    $checkifemail = " select * from user_account where email = '$email' and logintype = 'personal'  ";
 						                $resulta = mysqli_query($con,$checkifemail); // run query
 						                $count= mysqli_num_rows($resulta); // to count if necessary
 						                
 						 $checkNumber= " select * from user_account where contact_no = '$contact' and logintype = 'personal'  ";
 						                $results = mysqli_query($con,$checkNumber); // run query
 						                $countnym= mysqli_num_rows($results); // to count if necessary
 						                
 						                
 						             if ($count==1){
 						             	//while($row = mysqli_fetch_array($result)){} is where we output all the data in database
 						                 while($row = mysqli_fetch_array($result)){
 						
 						                 }
 						                   
      ?>
        <script>
            alert('Email is already Taken.');
            history.back();</script>
      <?php 
 						                 
 						          }else  if ($countnym==1){ 
 						                  ?>
        <script>
            alert('This phone number is already used.');
            history.back();</script>
      <?php  
 						             } else {
 						                    date_default_timezone_set('Asia/Manila');
                                        $datenow = date('Y/m/d');
          	$sql = " INSERT INTO `user_account`(`uname`, `surname`, `address`, `contact_no`, `logintype`, `email`, `password`,`datejoined`) VALUES ('$uname','$lastname','$address','$contact','personal','$email','$password','$datenow')  ";
 					                $resultsadad = mysqli_query($con,$sql); // run query
 					               
 			if ($resultsadad) {
 			       ?>
	  <script>window.location.href="../Mail/welcomepersonal.php?send&email=<?php echo $email?>&name=<?php echo $uname?>";</script>
		  <?php
 			    
 			    
 			}
 						             } 
       
                        
      
  
   
  }
  }

?>