<?php
session_start();
include '../administrator/connection/connect.php';

if(isset($_POST['sendcode'])) {
    
    $contact = $_POST['contact'];
      if(isset($_SESSION['access_token'])) {
                $email =$_SESSION['email'] ;
		
			     $sql = " select * from user_account where email = '$email'  ";
                             $result = mysqli_query($con,$sql); // run query
                             $count= mysqli_num_rows($result); // to count if necessary
                        
                              while($row = mysqli_fetch_array($result)){
                                    $userid = $row['user_id'];
                                    
                              }
                              
                             
      for ($s = '', $i = 0, $z = strlen($a = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789')-1; $i != 6; $x = rand(0,$z), $s .= $a{$x}, $i++); 
                      $sendcode = "UPDATE `user_account` SET `vcode`='$s' WHERE user_id = '$userid'";
                       $Codegenerate = mysqli_query($con,$sendcode); // run query
                   if($Codegenerate) {
                       $selectacc = "select * from user_account where user_id = '$userid' ";
                     $run = mysqli_query($con,$selectacc); // run query
                      while($out = mysqli_fetch_array($run)){ 
                         $mobile = $out['contact_no'];
                         $vcode = $out['vcode'];
                         
                      } 
                   }    
                       
                      
                      function itexmo($number,$message,$apicode,$passwd){
		$url = 'https://www.itexmo.com/php_api/api.php';
		$itexmo = array('1' => $number, '2' => $message, '3' => $apicode, 'passwd' => $passwd);
		$param = array(
			'http' => array(
				'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
				'method'  => 'POST',
				'content' => http_build_query($itexmo),
			),
		);
		$context  = stream_context_create($param);
		return file_get_contents($url, false, $context);
}
 $message1 = "Hi , This is your verification code :    " ;
 $messages = $message1.$vcode;

 
   itexmo($contact,$messages,'TR-HANTE304913_N6VGH','b{!b@m#an@');
     echo 'codesent'; 

                      
                      
      }else  if(isset($_SESSION['user_id'])) { 
                  $userid =$_SESSION['user_id'] ; 
           for ($s = '', $i = 0, $z = strlen($a = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789')-1; $i != 6; $x = rand(0,$z), $s .= $a{$x}, $i++); 
                      $sendcode = "UPDATE `user_account` SET `vcode`='$s' WHERE user_id = '$userid'";
                       $Codegenerate = mysqli_query($con,$sendcode); // run query
                   if($Codegenerate) {
                       $selectacc = "select * from user_account where user_id = '$userid' ";
                     $run = mysqli_query($con,$selectacc); // run query
                      while($out = mysqli_fetch_array($run)){ 
                         $mobile = $out['contact_no'];
                         $vcode = $out['vcode'];
                         
                      } 
                   }    
                       
                      
                      function itexmo($number,$message,$apicode,$passwd){
		$url = 'https://www.itexmo.com/php_api/api.php';
		$itexmo = array('1' => $number, '2' => $message, '3' => $apicode, 'passwd' => $passwd);
		$param = array(
			'http' => array(
				'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
				'method'  => 'POST',
				'content' => http_build_query($itexmo),
			),
		);
		$context  = stream_context_create($param);
		return file_get_contents($url, false, $context);
}
 $message1 = "Hi , This is your verification code :    " ;
 $messages = $message1.$vcode;

 
   //itexmo($contact,$messages,'TR-HANTE304913_N6VGH','b{!b@m#an@');
     echo 'codesent'; 

          
      }
}
if(isset($_POST['getverified'])) {
    $vcode = $_POST['entrycode'];
    if(isset($_SESSION['access_token'])) {
          $email =$_SESSION['email'] ;
          
          if($vcode == '') {
                 echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                      Invalid Code! It should not be Empty .
                                                       <button type="button" class="close" data-dismiss="alert" aria-label="Close" style="float:right;outline:none;border:none">
                                                        <span aria-hidden="true">&times;</span>
                                                      </button>
                                      
                                    </div>  ';
          }else {
               $sql = " select * from user_account where email = '$email'  ";
                             $result = mysqli_query($con,$sql); // run query
                             $count= mysqli_num_rows($result); // to count if necessary
                        
                              while($row = mysqli_fetch_array($result)){
                                    $userid = $row['user_id'];
                                    
                              }
                      $check = "select * from user_account where user_id = '$userid' and vcode = '$vcode'";
                     $rundiagnostics = mysqli_query($con,$check); // run query
                      $countiftrue= mysqli_num_rows($rundiagnostics);
                      
                      if($countiftrue == 1) {
                          
                            $update = "UPDATE `user_account` SET `vcode`=' ',`status`='1' WHERE user_id = '$userid'";
                             $runupdate = mysqli_query($con,$update); // run query
                                if($runupdate) {
                                 echo 'success';
                                   
                                    
                                }
                          
                      }else {
                           echo '<div class="alert alert-danger alert-dismissible fade show" role="alert" style="font-size:13px">
                                                      Invalid Code! Please Check your Phone and enter a Valid code .
                                                       <button type="button" class="close" data-dismiss="alert" aria-label="Close" style="float:right;outline:none;border:none">
                                                        <span aria-hidden="true">&times;</span>
                                                      </button>
                                      
                                    </div>  ';
                      }
                      
              
          }
		
			    
        
    }else  if(isset($_SESSION['user_id'])) { 
                  $userid =$_SESSION['user_id'] ;  
        $check = "select * from user_account where user_id = '$userid' and vcode = '$vcode'";
                     $rundiagnostics = mysqli_query($con,$check); // run query
                      $countiftrue= mysqli_num_rows($rundiagnostics);
                      
                      if($countiftrue == 1) {
                          
                            $update = "UPDATE `user_account` SET `vcode`=' ',`status`='1' WHERE user_id = '$userid'";
                             $runupdate = mysqli_query($con,$update); // run query
                                if($runupdate) {
                                 echo 'success';
                                   
                                    
                                }
                          
                      }else {
                           echo '<div class="alert alert-danger alert-dismissible fade show" role="alert" style="font-size:13px">
                                                      Invalid Code! Please Check your Phone and enter a Valid code .
                                                       <button type="button" class="close" data-dismiss="alert" aria-label="Close" style="float:right;outline:none;border:none">
                                                        <span aria-hidden="true">&times;</span>
                                                      </button>
                                      
                                    </div>  ';
                      }
                      
              
          
		
        
    }
    
}

?>