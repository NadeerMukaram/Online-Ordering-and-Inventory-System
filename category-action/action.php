<?php
session_start();
include '../administrator/connection/connect.php';
if(isset($_POST['editcontact'])) {
  
 $address = $_POST['address'];
 $contact = $_POST['contact'];
 $userid = $_POST['userid'];

        if($contact == '' && $address == '') {
         echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                    No Changes Applied.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
 
</div>  ';
        }else {
            //verified checked
            $checkifnumberisverified = "select * from user_account where user_id='$userid' and status = '1' and contact_no = '$contact' ";
            $check = mysqli_query($con,$checkifnumberisverified); // run query
             $countstatus= mysqli_num_rows( $check); // to count if necessary
             
             if($countstatus == 1) {
                 //verified true
                $sql = " UPDATE `user_account` SET `address`='$address'  WHERE user_id ='$userid'  ";
                    $result = mysqli_query($con,$sql); // run query
                 if ($result) {
                      echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                                                       Account Updated Successfully !
                                                       <button type="button" class="close" data-dismiss="alert" aria-label="Close" style="float:right;outline:none;border:none">
                                                        <span aria-hidden="true">&times;</span>
                                                      </button>
                                      
                                    </div>  ';
                 } 
             }else {
                $sql = " UPDATE `user_account` SET `address`='$address',`contact_no`='$contact', `status` = '0' WHERE user_id ='$userid'  ";
                    $result = mysqli_query($con,$sql); // run query
                 if ($result) {
                      echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                                                       Account Updated Successfully !
                                                       <button type="button" class="close" data-dismiss="alert" aria-label="Close" style="float:right;outline:none;border:none">
                                                        <span aria-hidden="true">&times;</span>
                                                      </button>
                                      
                                    </div>  ';
                 }  
             }
             
        }
 
  
                   
                
                 
            
}else if(isset($_POST['editpersonal'])) {
   
 $address = $_POST['address'];
 $contact = $_POST['contact'];
 $userid = $_POST['userid'];
 $password = $_POST['password']; // new password to save
 
 $passdefault = $_POST['passworddefault']; // pass old the default
 $curpassword = $_POST['curpassword']; // pass the input to compare
 
                if ($curpassword == '') {
                      echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                      Current Password Required to Save changes!
                                                       <button type="button" class="close" data-dismiss="alert" aria-label="Close" style="float:right;outline:none;border:none">
                                                        <span aria-hidden="true">&times;</span>
                                                      </button>
                                      
                                    </div>  ';
                }else if ($password == '') {
                    //save password default
                    $passworddef = $passdefault;
                      $auth = "select * from user_account where user_id = '$userid' and password= '$curpassword' and contact_no ='$contact' and status='1' " ;  // verified #
                        $runcheck = mysqli_query($con,$auth); // run query
                        $countpass= mysqli_num_rows($runcheck); // to count if necessary
                        if ($countpass == 1) {
                             $sql = " UPDATE `user_account` SET `address`='$address',`password` = '$passworddef' WHERE user_id ='$userid'  ";
                    $result = mysqli_query($con,$sql); // run query
                 if ($result) {
                      echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                                                       Account Updated Successfully !
                                                       <button type="button" class="close" data-dismiss="alert" aria-label="Close" style="float:right;outline:none;border:none">
                                                        <span aria-hidden="true">&times;</span>
                                                      </button>
                                      
                                    </div>  ';
                 }
                        }else {
                                    $sql = " UPDATE `user_account` SET `address`='$address',`password` = '$passworddef',`contact_no` = '$contact' ,`status`='0'  WHERE user_id ='$userid'  ";
                    $result = mysqli_query($con,$sql); // run query
                 if ($result) {
                      echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                                                       Account Updated Successfully !
                                                       <button type="button" class="close" data-dismiss="alert" aria-label="Close" style="float:right;outline:none;border:none">
                                                        <span aria-hidden="true">&times;</span>
                                                      </button>
                                      
                                    </div>  ';
                 }else {
                      echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                      Somethings wrong!
                                                       <button type="button" class="close" data-dismiss="alert" aria-label="Close" style="float:right;outline:none;border:none">
                                                        <span aria-hidden="true">&times;</span>
                                                      </button>
                                      
                                    </div>  ';
                 }
                        }
                }
                else {
                    //change password
                       $auth = "select * from user_account where user_id = '$userid' and password= '$curpassword'  and contact_no ='$contact' and status='1' " ; //not verified
                        $runcheck = mysqli_query($con,$auth); // run query
                        $countpasss= mysqli_num_rows($runcheck); // to count if necessary
                        if ($countpasss == 1) {
                             $sql = " UPDATE `user_account` SET `address`='$address',`password` = '$password' WHERE user_id ='$userid'  ";
                    $result = mysqli_query($con,$sql); // run query
                 if ($result) {
                      echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                                                       Account Updated Successfully !
                                                       <button type="button" class="close" data-dismiss="alert" aria-label="Close" style="float:right;outline:none;border:none">
                                                        <span aria-hidden="true">&times;</span>
                                                      </button>
                                      
                                    </div>  ';
                 }
                        }else {
                                      $sql = " UPDATE `user_account` SET `address`='$address',`contact_no`='$contact',`password` = '$password',`status` = '0' WHERE user_id ='$userid'  ";
                    $result = mysqli_query($con,$sql); // run query
                 if ($result) {
                      echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                                                       Account Updated Successfully !
                                                       <button type="button" class="close" data-dismiss="alert" aria-label="Close" style="float:right;outline:none;border:none">
                                                        <span aria-hidden="true">&times;</span>
                                                      </button>
                                      
                                    </div>  ';
                 }else {
                      echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                      Wrong Password! Unable to Proceed.
                                                       <button type="button" class="close" data-dismiss="alert" aria-label="Close" style="float:right;outline:none;border:none">
                                                        <span aria-hidden="true">&times;</span>
                                                      </button>
                                      
                                    </div>  ';
                 }
                           
                        }
                }
                     
       
             
        
 
  
                   
                
                 
            
}


if(isset($_POST['getaccount'])) {
    if (isset($_SESSION['access_token'])) {  
            
                $email =$_SESSION['email'] ;
		
			     $sql = " select * from user_account where email = '$email'  ";
                             $result = mysqli_query($con,$sql); // run query
                             $count= mysqli_num_rows($result); // to count if necessary
                        
                              while($row = mysqli_fetch_array($result)){
                                    $userid = $row['user_id'];
                                    
                              }
    }else if (isset($_SESSION['user_id'])) {
        $userid = $_SESSION['user_id'];
    }
                    $selectacc = "select * from user_account where user_id = '$userid'";
                     $run = mysqli_query($con,$selectacc); // run query
                      while($out = mysqli_fetch_array($run)){
                         $statuss= $out['status']
                                   
                             ?>
                                  <form onsubmit="return false">
                                     
                                 
                                  <?php 
                                  
                                  if(isset($_SESSION['access_token'])){
                                      ?>
                                      <h5>Name : <?php echo $out['uname'].' '. $out['surname'] ?>  </h5>
                                  <input type="text" onclick="this.select()" name="address" placeholder="Enter Address" class="d-none form-control" style="font-size:12px;" id="addressgmail" value="<?php echo $out['address'] ?>"> <a class="d-none" id="cancelbtnaddgmail" href="#"  style="font-size:12px;cursor:link;color:#4754bb">Cancel</a>
                                 <h5 id="addresshidgmail">Address:  <?php echo $out['address'] ?> <a href="#" style="font-size:16px;color:#4754bb"class="editaddressgmail" >Edit</a></h5>
                                
                                     <input onclick="this.select()" type="text" value="<?php echo $out['contact_no'] ?>"  maxlength='11' placeholder="0955-222-3333" name="contactno" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" class="d-none form-control" style="font-size:12px;width:160px" id="contactnogmail"> <a class="d-none" id="cancelbtngmail" href="#"  style="font-size:12px;cursor:link;color:#4754bb">Cancel</a>
                                 
                                       <h5 id="contacthidgmail">Contact No: <span onblur="addDashes(this)"> <?php echo $out['contact_no']?> </span>
                                       <?php 
                                                if ($statuss == 0) {
                                                 ?>
                                                 <span style="color:red;font-size:12px">Not Verified</span>
                                                 <button class="btn btn-secondary" data-toggle="modal" data-target="#Verifynumber" style="font-size:11px">Verify Now</button>
                                                 
                                                 <?php
                                                
                                                }else {
                                                   ?>
                                                     <span style="color:green;font-size:14px">(Verified)</span>
                                                   <?php
                                                }
                                            
                                            ?>
                                       <a href="#"   style="font-size:16px;color:#4754bb" class="editcontactgmail" style="font-size:12px;cursor:link">Edit</a></h5>
                                            
                                 
                                  <h5>Email:  <?php echo $out['email']?> <span style="color:green;font-size:14px">(Verified)</span> </h5>
                                   <!--<h5>Email:  <?php echo $out['email']?> <p style="color:Red">-Not Verified</p> <a href="" style="font-size:16px">Verify Email</a></h5>-->
                                  <h5>Login Credentials: <span style='text-transform:capitalize'> <?php echo $out['logintype']?> </span></h5>
                                      <button type="button" style="font-size:14px" class="btn btn-primary d-none" userid="<?php echo $out['user_id']?>" id="savechanges">Save changes</button>
                                      <?php
                                  
                                    
                                      
                                      
                                      
                                      
                                  }else
                                    if(isset($_SESSION['user_id'])) {
                                        ?>
                                        <h5>Name : <?php echo $out['uname'].' '. $out['surname'] ?>  </h5>
                                  <input type="text" onclick="this.select()" name="address" placeholder="Enter Address" class="d-none form-control" style="font-size:12px;" id="address" value="<?php echo $out['address'] ?>"> <a class="d-none" id="cancelbtnadd" href="#"  style="font-size:12px;cursor:link;color:#4754bb">Cancel</a>
                                 <h5 id="addresshid">Address:  <?php echo $out['address'] ?> <a href="#" style="font-size:16px;color:#4754bb"class="editaddress" >Edit</a></h5>
                                
                                     <input onclick="this.select()" type="text" value="<?php echo $out['contact_no'] ?>"  maxlength='11' placeholder="0955-222-3333" name="contactno" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" class="d-none form-control" style="font-size:12px;width:160px" id="contactno"> <a class="d-none" id="cancelbtn" href="#"  style="font-size:12px;cursor:link;color:#4754bb">Cancel</a>
                                 
                                       <h5 id="contacthid">Contact No: <span onblur="addDashes(this)"> <?php echo $out['contact_no']?> </span> 
                                        <?php 
                                                if ($statuss == 0) {
                                                 ?>
                                                 <span style="color:red;font-size:12px">Not Verified</span>
                                                 <button class="btn btn-secondary" data-toggle="modal" data-target="#Verifynumber" style="font-size:11px">Verify Now</button>
                                                 
                                                 <?php
                                                
                                                }else {
                                                   ?>
                                                     <span style="color:green;font-size:14px">(Verified)</span>
                                                   <?php
                                                }
                                            
                                            ?>
                                       
                                       
                                       <a href="#"   style="font-size:16px;color:#4754bb" class="editcontact" style="font-size:12px;cursor:link">Edit</a></h5>
                               
                                 
                                  <h5>Email:  <?php echo $out['email']?> <span style="color:green;font-size:14px">(Verified)</span> </h5>
                                   <!--<h5>Email:  <?php echo $out['email']?> <p style="color:Red">-Not Verified</p> <a href="" style="font-size:16px">Verify Email</a></h5>-->
                                  
                                  <h5>Login Credentials: <span style='text-transform:capitalize'> <?php echo $out['logintype']?> </span></h5>
                                  
                                  <input type="password" onclick="this.select()"  placeholder="Enter New Password" class="d-none form-control"   style="font-size:12px;" id="password" ><a class="d-none" id="cancelpass" href="#"  style="font-size:12px;cursor:link;color:#4754bb">Cancel</a>
                                    <input type="hidden" id="hiddenpass" value=<?php echo $out['password']?>>    
                                        <h5 id="passwordhid">Password :  ●●●●●   <a href="#" style="font-size:16px;color:#4754bb"class="editpassword" >Edit</a></h5> <p></p>
                                       
                                        <input type="password" placeholder= "Input Current Password to save changes" id="txtcurrentpass"  class="form-control d-none" style="font-size:13px; width:51%" required><p></p>
                                         
                                         <button type="button" style="font-size:14px" class="btn btn-primary d-none" userid="<?php echo $out['user_id']?>" id="savechangesinpersonal">Save changes</button>
                                        <?php
                                       
                                    }
                                  ?>
                                 <!-- <h5>Password :  ●●●●●</h5> -->
                                  
                                   </form>
                               <?php
                                   
                                    
                              }
                               include 'verifymodal.php';
                              ?>
                              
                               <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
           

                                <script>
                               
                                 $(document).ready(function() {
                              //# for id , . for classes
                               /*  
                                addressgmail
                                      cancelbtnaddgmail
                                      editaddressgmail
                                      cancelbtngmail
                                      editcontactgmail
                                       addresshidgmail
                                     contacthidgmail
                                     contactnogmail
                               */
                              
                                $('.editpassword').click(function() { 
                                   
                                  document.getElementById('passwordhid').classList.add('d-none');
                                   document.getElementById('password').classList.remove('d-none');
                                   document.getElementById('cancelpass').classList.remove('d-none');
                                    document.getElementById('savechangesinpersonal').classList.remove('d-none');
                                    
                                    document.getElementById('txtcurrentpass').classList.remove('d-none');
                                })
                                
                                 $('#cancelpass').click(function() { 
                                     document.getElementById('txtcurrentpass').classList.add('d-none');
                                    document.getElementById('cancelpass').classList.add('d-none');
                                  document.getElementById('passwordhid').classList.remove('d-none');
                                   document.getElementById('password').classList.add('d-none');
                                    document.getElementById('savechangesinpersonal').classList.add('d-none');
                                })
                                  $('.editaddressgmail').click(function() {
                                   
                                    document.getElementById('addresshidgmail').classList.add('d-none');
                                     document.getElementById('addressgmail').classList.remove('d-none');
                                       document.getElementById('cancelbtnaddgmail').classList.remove('d-none');
                                      
                                         document.getElementById('savechanges').classList.remove('d-none');
                                
                                })
                                 $('.editcontactgmail').click(function() {
                                   
                                    
                                    document.getElementById('contactnogmail').classList.remove('d-none');
                                     document.getElementById('cancelbtngmail').classList.remove('d-none');
                                   
                                   
                                    document.getElementById('contacthidgmail').classList.add('d-none');
                                    document.getElementById('savechanges').classList.remove('d-none');
                                    
                               
                                })
                                 $('#cancelbtngmail').click(function() {
                                     
                                    
                                    document.getElementById('contactnogmail').classList.add('d-none');
                                     document.getElementById('cancelbtngmail').classList.add('d-none');
                                   
                                    document.getElementById('contacthidgmail').classList.remove('d-none');
                                    document.getElementById('savechanges').classList.add('d-none');
                                
                                })
                                 $('#cancelbtnaddgmail').click(function() {
                                     
                                    document.getElementById('addresshidgmail').classList.remove('d-none');
                                     document.getElementById('addressgmail').classList.add('d-none');
                                       document.getElementById('cancelbtnaddgmail').classList.add('d-none');
                                       document.getElementById('savechanges').classList.add('d-none');
                                
                                })
                               
                                $('.editcontact').click(function() {
                                     document.getElementById('savechangesinpersonal').classList.remove('d-none');
                                     document.getElementById('txtcurrentpass').classList.remove('d-none');
                                    document.getElementById('contactno').classList.remove('d-none');
                                     document.getElementById('cancelbtn').classList.remove('d-none');
                                   
                                   
                                    document.getElementById('contacthid').classList.add('d-none');
                                    document.getElementById('savechanges').classList.remove('d-none');
                                    
                               
                                })
                                
                                 $('#cancelbtn').click(function() {
                                      document.getElementById('savechangesinpersonal').classList.add('d-none');
                                     document.getElementById('txtcurrentpass').classList.add('d-none');
                                    
                                    document.getElementById('contactno').classList.add('d-none');
                                     document.getElementById('cancelbtn').classList.add('d-none');
                                   
                                    document.getElementById('contacthid').classList.remove('d-none');
                                    document.getElementById('savechanges').classList.add('d-none');
                                
                                })
                                
                                $('.editaddress').click(function() {
                                     document.getElementById('savechangesinpersonal').classList.remove('d-none');
                                   document.getElementById('txtcurrentpass').classList.remove('d-none');
                                    document.getElementById('addresshid').classList.add('d-none');
                                     document.getElementById('address').classList.remove('d-none');
                                       document.getElementById('cancelbtnadd').classList.remove('d-none');
                                      
                                         document.getElementById('savechanges').classList.remove('d-none');
                                
                                })
                                
                                  $('#cancelbtnadd').click(function() {
                                     document.getElementById('savechangesinpersonal').classList.add('d-none');
                                   document.getElementById('txtcurrentpass').classList.add('d-none');
                                    document.getElementById('addresshid').classList.remove('d-none');
                                     document.getElementById('address').classList.add('d-none');
                                       document.getElementById('cancelbtnadd').classList.add('d-none');
                                       document.getElementById('savechanges').classList.add('d-none');
                                
                                })
                                
                               
                                
                                $('#savechanges').click(function() {
                                    
                                   var address = $('#addressgmail').val();
                                   var contact = $('#contactnogmail').val();
                                    var userids =$(this).attr("userid");
                                  
                                     
                                    
                             $.ajax({
                            			url	:	"action.php",
                            			method:	"POST",
                            			data	:	{editcontact:1,address:address,contact:contact,userid:userids},
                            			success	:	function(data){
                            		           
                            		       
                            		        $('#notif').html(data); 
                            		   document.getElementById('addresshidgmail').classList.remove('d-none');
                                     document.getElementById('addressgmail').classList.add('d-none');
                                       document.getElementById('cancelbtnaddgmail').classList.add('d-none');
                                       document.getElementById('savechanges').classList.add('d-none');
                                        document.getElementById('contactnogmail').classList.add('d-none');
                                     document.getElementById('cancelbtngmail').classList.add('d-none');
                                   
                                    document.getElementById('contacthidgmail').classList.remove('d-none');
                                   
                            		    getAccDetails();
                            		}
                            		
                            		
                                    })
                    
                                })
                                
                                 $('#savechangesinpersonal').click(function() {
                                    
                                   var address = $('#address').val();
                                   var contact = $('#contactno').val();
                                    var userids =$(this).attr("userid");
                                     
                                      
                                        var password = $('#password').val();
                                        var passworddefault = $('#hiddenpass').val();
                                        var curpassword = $('#txtcurrentpass').val();
                                  
                                     
                                    
                             $.ajax({
                            			url	:	"action.php",
                            			method:	"POST",
                            			data	:	{editpersonal:1,address:address,contact:contact,userid:userids,password:password,curpassword:curpassword,passworddefault:passworddefault},
                            			success	:	function(data){
                            		           
                            		        getAccDetails();
                            		        $('#notif').html(data); 
                            		         document.getElementById('txtcurrentpass').classList.add('d-none');
                            		         document.getElementById('passwordhid').classList.remove('d-none');
                            		           document.getElementById('password').classList.add('d-none');
                                    document.getElementById('savechangesinpersonal').classList.add('d-none');
                            		   document.getElementById('addresshid').classList.remove('d-none');
                            		     document.getElementById('cancelpass').classList.add('d-none');
                                     document.getElementById('address').classList.add('d-none');
                                       document.getElementById('cancelbtnadd').classList.add('d-none');
                                       document.getElementById('savechanges').classList.add('d-none');
                                        document.getElementById('contactno').classList.add('d-none');
                                     document.getElementById('cancelbtn').classList.add('d-none');
                                  
                                    document.getElementById('contacthid').classList.remove('d-none');
                                    document.getElementById('savechanges').classList.add('d-none');
                                   
                                 
                                
                            		   
                            		}
                            		
                            		
                                    })
                    
                                })
                                
                                
                                 });
                                 function getAccDetails (){
                                       
                                    $.ajax({
                        			url	:	"action.php",
                        			method:	"POST",
                        			data	:	{getaccount:1},
                        			success	:	function(data){
                        				$("#get_AccountDetails").html(data);
                        				
                        			}
                        		})
                                
                            }
                               
                                    </script>
                              <?php
    
}


?>