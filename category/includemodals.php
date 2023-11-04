 <style>
 
@font-face {
  font-family: 'Evogria';
  src: url('./font/Evogria.otf'); /* IE9 Compat Modes */
}


.modal-title {
    font-family: Evogria;
    font-size: 50px;
    margin:auto;
}     
     
.modal-footer {
    font-family: Evogria;
    padding: .75rem 0;
}

.modal-header {
    background-image: url("https://img.freepik.com/free-photo/wooden-background_24972-623.jpg?size=626&ext=jpg");
    color: white;
}

.modal-content {
    padding: 15px 15px 0px 15px;
}

 </style>
 
 
 
 <div class="modal fade" id="myaccount" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Account Details</h5>
        <script src="https://kit.fontawesome.com/129b086bc9.js" crossorigin="anonymous"></script>
      </div>
      
      <div class="modal-body" >
         
            <?php 
             	session_start();
include '../administrator/connection/connect.php';

 if (isset($_SESSION['access_token'])) {  
                             
                                        
                                        
                              ?>
                               <div id="notif"></div>
                              <div id="get_AccountDetails" ></div>
                              <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
                               <script>
                               
                                 $(document).ready(function() {
                              //# for id , . for classes
                              getAccDetails();
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
                              <?php
     
 }  else if(isset($_SESSION['user_id'])) {
      ?>
                               <div id="notif"></div>
                              <div id="get_AccountDetails" ></div>
                              <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
                               <script>
                               
                                 $(document).ready(function() {
                              //# for id , . for classes
                              getAccDetails();
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
                              <?php
     
 } 
            
            ?>        
                
      </div>
      <div class="modal-footer">
        <button type="button" style="font-size:14px" class="btn btn-secondary" data-dismiss="modal">Close</button>
       
        <button type="button" style="font-size:17px; font-family: Evogria; background:#c8c6a7; color:#333333; " class="btn btn-dark" onclick="window.location.href='../signin/logout.php'">Sign Out <i class="fas fa-sign-out-alt" style="font-size: 1.1rem;"></i></button>
        
      </div>
      
    </div>
  </div>
</div>