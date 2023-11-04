         
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
               	<h6>Category ID : <?php echo $prodid?></h6>
               	<hr>
               	<div class="col-sm-1">
               		
               	</div>
               	<div class="col-sm-10">
               		 <p></p>
                     
                      <form method="post" action="addc.php">
                        <?php 
                              $sql = " select * from category where cat_id = '$prodid'  ";
                                          $result = mysqli_query($con,$sql); // run query
                                          
                                           while($row = mysqli_fetch_array($result)){
                                  ?>
                                    <input type="text" name="txtcat" value="<?php echo $row['categoryname']?>" class="form-control">
                                  <?php
                                           }
                                    
                        ?>
                        <p></p>
                        <hr>
                        <input type="hidden" name="catid" value="<?php echo $prodid?>">
                               <button type="button" class="btn btn-secondary" style="font-size: 13px" onclick="displaymodalnones()">close</button>  
                                <button type="submit" class="btn btn-primary" name="updatecat" style="font-size: 13px" >update</button>             
                      </form>
                     
                    
                   <p></p> 
                </div>
                    
                  

               	</div>
               	<div class="col-sm-1">
               		
               	</div>
               </div>
               </div>
         
               


              </div>

            </div>
          