         
              <script type="text/javascript">
                function displaymodalnones()  {
  
            
              document.getElementById("myModals").setAttribute('style','display:none');
              document.getElementById("view").classList.add('d-none');
            }
              document.getElementById("myModals").classList.add('display-block');
                      
              </script>
              <style type="text/css">
                .modalcreated a:hover {
                  color: red;
                }
              </style>
                <div id="myModals" class="modalcreated" style="display: block">

              <!-- Modal content -->
              <div class="modal-contents">
              
               <div class="container">
               <div class="row">
               	<h6>User ID : <?php echo $user_id?></h6>
               	<hr>
               	<div class="col-sm-1">
               		
               	</div>
               	<div class="col-sm-10">
               		 <p></p>
                     
                      <form method="post" action="addacc.php">
                        <?php 
                              $sql = " select * from user_account where user_id = '$user_id'  ";
                                          $result = mysqli_query($con,$sql); // run query
                                          
                                           while($row = mysqli_fetch_array($result)){
                                           

                                          
                                           		?>
                                           		<p>Given Name:</p>
                                           		<input type="text" name="txtname" class="form-control" placeholder="Enter Name" value="<?php echo $row['uname']?>" style="font-size: 14px;" required="">
                                           		<p>Last Name:</p>
					    <input type="text" name="txtlastname" class="form-control" placeholder="Enter LastName" value="<?php echo $row['surname']?>" style="font-size: 14px;" required="">
					    <p>Address:</p>
					    <input type="text" name="txtaddress" class="form-control" value="<?php echo $row['address']?>"><p></p>
					    <p>Contact No:</p>
					    	<input type="text" name="contact"  tabindex="4" class="form-control"   value="<?php echo $row['contact_no']?>" maxlength='11'  oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" required >
					  
					  
					   
					   
              <input type="hidden" name="userid" value="<?php echo $user_id?>">
					     <p></p>
					    <p>Password:</p>
					     <input type="password" name="txtpass" value="<?php echo $row['password']?>" class="form-control">
                        <hr>
                       				<div class="modal-footer">
                       				    
                               <button type="button" class="btn btn-secondary" style="font-size: 13px" onclick="displaymodalnones()">close</button>  
                                <button type="submit" class="btn btn-primary" name="updateacc1" style="font-size: 13px" >update</button>      
                                </div>  
                                           		<?php
                                           	
                               
                                           }
                                    
                        ?>
                           
                      </form>
                     
                    
                   <p></p> 
                </div>
                    
                  <div class="col-sm-1">
               		
               	</div>

               	</div>
               	
               </div>
               </div>
         
               


              </div>

           
          