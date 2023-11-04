<?php 
include '../administrator/connection/connect.php';
    if(isset($_POST['sendcode'])) {
       
        $code = $_POST['code'];
        $contact = $_POST['contact'];
        $userid = $_POST['userid'];
        
          
          if($code == '') {
                 echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                      Invalid Code! It should not be Empty .
                                                       <button type="button" class="close" data-dismiss="alert" aria-label="Close" style="float:right;outline:none;border:none">
                                                        <span aria-hidden="true">&times;</span>
                                                      </button>
                                      
                                    </div>  ';
          }else {
             
                      $check = "select * from user_account where user_id = '$userid' and vcode = '$code'";
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