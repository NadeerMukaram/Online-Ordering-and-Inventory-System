
            <!-- Modal -->
            <div class="modal fade" id="addnew" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                 <form method="post" enctype="multipart/form-data" action="add.php">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Adding New Products</h5>
                   
                  </div>
                  <div class="modal-body">

<div class="container">
<div class="row">

		
		    	<input type="text" name="txtname" class="form-control" placeholder="Enter Product Name" style="font-size: 13px" ><p></p> 
		    	<input type="text" name="txtdesc" class="form-control" placeholder="Product Description" style="font-size: 13px"><p></p>  
		    	<input type="text" name="txtprice" class="form-control" placeholder="Enter Price" style="font-size: 13px" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"><p></p>  

		    	<select class="form-select" name="cat_id" style="font-size: 13px">
		    		<option>Select Category</option>
		   		<?php 
                  $selectcat = new Data();
                 $selectcat->getCategoryselecttag();
                  ?>
		    	</select>      <p></p>
		    	<p style="font-size: 12px">Upload Image</p>
		    	<input type="file" name="images[]"  class="form-control" style="font-size: 13px" multiple>    <p></p>
		    	  

                       
		
		
</div>
</div>

</div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" style="font-size: 13px;" data-dismiss="modal">Close</button>
                    
                    <button type="submit" class="btn btn-primary" name="saveproduct"  style="font-size: 13px;" >Save changes</button>
                  </div>
                </div>
              </form>
              </div>
            </div>