         
              <script type="text/javascript">
                function displaymodalnones()  {
  
            
              document.getElementById("myModals").classList.add('d-none');
              document.getElementById("view").classList.add('d-none');
            }
              document.getElementById("myModals").classList.add('d-none');
                      
              </script>
              <style type="text/css">
              .modalcreated {
                  display: block
              }
                .modalcreated a:hover {
                  color: red;
                }
              </style>
                <div id="myModals" class="modalcreated" style="">

              <!-- Modal content -->
              <div class="modal-contents">
              
               <div class="container">
               <div class="row">
               	<h6>Product ID : <?php echo $prodid?></h6>
               	<hr>
               	<div class="col-sm-1">
               		
               	</div>
               	<div class="col-sm-10">
               		 <p></p>
                     
                    <form method="post" action="add.php" enctype="multipart/form-data" >
                         <?php
                             $sql = " select * from product where prod_id = '$prodid'  ";
                                         $result = mysqli_query($con,$sql); // run query
                                    
                                          while($row = mysqli_fetch_array($result)){
                                            $cat_id= $row['cat_id'];
                                            ?>

<div class="container">
<div class="row">

    
          <input type="text" name="txtname" class="form-control" placeholder="Enter Product Name" value="<?php echo $row['name']?>" style="font-size: 13px"  required><p></p> 
          <input type="text" name="txtdesc" class="form-control" placeholder="Product Description" value="<?php echo $row['description']?>" style="font-size: 13px" required><p></p>  
          <input type="text" name="txtprice" class="form-control" placeholder="Enter Price" value="<?php echo $row['price']?>" style="font-size: 13px" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" required><p></p>  

          <select class="form-select" name="cat_id" style="font-size: 13px" required="">
            
               <?php 
                  $selectcat = new Data();
                 $selectcat->getCategoryselecttags($cat_id);
               ?>
           
          <?php 
                  $selectcat = new Data();
                 $selectcat->getCategoryselecttag();
                  ?>
          </select>      <p></p>
          <p style="font-size: 12px">Upload Image</p>
          <input type="file" name="images[]"  class="form-control" style="font-size: 13px" multiple required="">    <p></p>
              <input type="hidden" name="prodid" value="<?php echo $prodid?>">

                       
    
    
</div>
</div>
  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" style="font-size: 13px;" onclick=" displaymodalnones()">Close</button>
                    
                    <button type="submit" class="btn btn-primary" name="updateproduct"  style="font-size: 13px;" >Save changes</button>
                  </div>
                                            <?php
                                          }
                                   
                         ?>                  
                     </form>

</div>
                    
                   
                   <p></p>

               	</div>
               	<div class="col-sm-1">
               		
               	</div>
               </div>
               </div>
         
               


              </div>

           
          