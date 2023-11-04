         
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
               	<h6>Promo ID : <?php echo $prodid?></h6>
               	<hr>
               	<div class="col-sm-1">
               		
               	</div>
               	<div class="col-sm-10">
               		 <p></p>
                     
                      <form method="post" action="addpcode.php">
                        <?php 
                              $sql = " select * from promocodes where promo_id = '$prodid'  ";
                                          $result = mysqli_query($con,$sql); // run query
                                          
                                           while($row = mysqli_fetch_array($result)){
                                  ?>
                                   <p>Update Discounted price in PHP</p>
        <input type="text" name="txtamount" class="form-control" placeholder="Enter Amount " value="<?php echo $row['discount']?>" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">   
        <p>Update Validity :</p>
        <input type="date" name="txtdate" value="<?php echo $row['validity']?>" class="form-control"> 
                                  <?php
                                           }
                                        
                                    
                        ?>
                        <p></p>
                        <hr>
                        <input type="hidden" name="promoid" value="<?php echo $prodid?>">
                               <button type="button" class="btn btn-secondary" style="font-size: 13px" onclick="displaymodalnones()">close</button>  
                                <button type="submit" class="btn btn-primary" name="updatepcode" style="font-size: 13px" >update</button>             
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
          