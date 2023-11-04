<?php
session_start();
include '../administrator/connection/connect.php';
?>

<!-- Modal -->
<div class="modal fade" id="Verifynumber" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="margin-top:50px">
      
      <div class="modal-body">
          <?php
            if(isset($_SESSION['access_token'])) {
                $email =$_SESSION['email'] ;
		
			     $sql = " select * from user_account where email = '$email'  ";
                             $result = mysqli_query($con,$sql); // run query
                             $count= mysqli_num_rows($result); // to count if necessary
                        
                              while($row = mysqli_fetch_array($result)){
                                    $userid = $row['user_id'];
                                    
                              }
                              
           
                         $selectacc = "select * from user_account where user_id = '$userid'";
                     $run = mysqli_query($con,$selectacc); // run query
                      while($out = mysqli_fetch_array($run)){ 
                         $mobile = $out['contact_no'];
                         
                         
                      }
                ?>
                
                    <h6>
                        <span id="flexxnotif" >
                            <button class="btn btn-secondary sendcode">Send Verification Code</button>
           <!-- An OTP verification Code was Sent to Your Mobile Number > --></span>
            <p></p>
            <span id="showotp" class="d-none">
            <input type="text" id="entrycode" class="form-control" placeholder="Enter OTP verification Code">
           
            <input type="hidden" id="contact" value="<?php echo $mobile?>">
           
            <p></p>
            <span style="color:grey;font-size:12px"><i class="fas fa-info-circle"></i>Note : Verification Code quite Sensitive.  <p></p>if you didnt receive the Code , kindly check your number.</span>
                </h6>
                </span>
                <?php
            }else  if(isset($_SESSION['user_id'])) { 
                  $userid =$_SESSION['user_id'] ;
		
			   
           
                         $selectacc = "select * from user_account where user_id = '$userid'";
                     $run = mysqli_query($con,$selectacc); // run query
                      while($out = mysqli_fetch_array($run)){ 
                         $mobile = $out['contact_no'];
                         
                         
                      }
                ?>
                
                    <h6>
                        <span id="flexxnotifs" >
                            <button class="btn btn-secondary sendcodes">Send Verification Code</button>
           <!-- An OTP verification Code was Sent to Your Mobile Number > --></span>
            <p></p>
            <span id="showotps" class="d-none">
            <input type="text" id="entrycode" class="form-control" placeholder="Enter OTP verification Code">
           
            <input type="hidden" id="contacts" value="<?php echo $mobile?>">
           
            <p></p>
            <span style="color:grey;font-size:12px"><i class="fas fa-info-circle"></i>Note : Verification Code quite Sensitive.  <p></p>if you didnt receive the Code , kindly check your number.</span>
                </h6>
                </span>
                <?php
            }
          ?>
        
      </div>
      <div class="modal-footer">
       <?php
       if(isset($_SESSION['access_token'])){
          ?>
            <button type="button" class="btn btn-primary btnverifyemail d-none" id="pingpongs" style="font-size:11px">Verify</button>
           <?php  
       }else
       if(isset($_SESSION['user_id'])) { 
           ?>
            <button type="button" class="btn btn-primary btnverifypersonal d-none" id="pingpongs" style="font-size:11px">Verify</button>
           <?php
       }
       ?>
       
         <button type="button" class="btn btn-secondary" style="font-size:11px" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
 <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
 $(document).ready(function() {
     
      $('.sendcodes').click(function() {  
           var contact = $('#contacts').val();
          
           
           $.ajax({
                        			url	:	"verify.php",
                        			method:	"POST",
                        			data	:	{sendcode:1,contact:contact},
                        			success	:	function(data){
                        		 if(data == 'codesent') {
                        		   	$('#flexxnotifs').html("An OTP verification Code was Sent to Your Mobile Number 09*********"); 
                        		   	document.getElementById('showotps').classList.remove('d-none');
                                    document.getElementById('pingpongs').classList.remove('d-none');
                        		 }
                        		
                        			
                        		
                        	
                        			}
                        		})
          
      })
     
      $('.sendcode').click(function() {  
           var contact = $('#contact').val();
          
           
           $.ajax({
                        			url	:	"verify.php",
                        			method:	"POST",
                        			data	:	{sendcode:1,contact:contact},
                        			success	:	function(data){
                        		 if(data == 'codesent') {
                        		   	$('#flexxnotif').html("An OTP verification Code was Sent to Your Mobile Number 09*********"); 
                        		   	document.getElementById('showotp').classList.remove('d-none');
                                    document.getElementById('pingpongs').classList.remove('d-none');
                        		 }
                        		
                        			
                        		
                        	
                        			}
                        		})
          
      })
      $('.btnverifyemail').click(function() { 
          var entry = $('#entrycode').val();
          
            var contact = $('#contact').val();
         
                              //code:code,contact:contact      
                                      
                                    $.ajax({
                        			url	:	"verify.php",
                        			method:	"POST",
                        			data	:	{getverified:1,entrycode:entry},
                        			success	:	function(data){
                        			   if(data=='success') {
                        			      
                        			        document.getElementById('flexxnotif').innerHTML ="<div class='alert alert-success alert-dismissible fade show' role='alert'> Account number Verified!<button type='button' class='close' data-dismiss='alert' aria-label='Close' style='float:right;outline:none;border:none'> <span aria-hidden='true'>&times;</span> </button> </div>"; 
                        			       	setInterval(function(){window.location.href="index.php"},2000);
                        			       	
                        			   }else {
                        			      	$('#flexxnotif').html(data);  
                        			      	
                        			   }
                        			      
                        			  
                        		
                        			
                        			  
                        		
                        	
                        			}
                        		})
                                
                            })
      
     $('.btnverifypersonal').click(function() { 
          var entry = $('#entrycode').val();
          
            var contact = $('#contact').val();
         
                              //code:code,contact:contact      
                                      
                                    $.ajax({
                        			url	:	"verify.php",
                        			method:	"POST",
                        			data	:	{getverified:1,entrycode:entry},
                        			success	:	function(data){
                        			   if(data=='success') {
                        			      
                        			        document.getElementById('flexxnotifs').innerHTML ="<div class='alert alert-success alert-dismissible fade show' role='alert'> Account number Verified!<button type='button' class='close' data-dismiss='alert' aria-label='Close' style='float:right;outline:none;border:none'> <span aria-hidden='true'>&times;</span> </button> </div>"; 
                        			       	setInterval(function(){window.location.href="index.php"},2000);
                        			       
                        			   }else {
                        			      
                        			      		$('#flexxnotifs').html(data); 
                        			   }
                        			      
                        			  
                        		
                        			
                        			  
                        		
                        	
                        			}
                        		})
                                
                            })
                            
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
 });
</script>