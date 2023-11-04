
            <!-- Modal -->
            <div class="modal fade" id="addnew" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                 <form method="post" action="addpromo.php">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Adding PromoCode</h5>
                   
                  </div>
                  <div class="modal-body">

<div class="container">
<div class="row">
        <p>Enter Discounted price in PHP</p>
        <input type="text" name="txtamount" class="form-control" placeholder="Enter Amount " oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">   
        <p>Enter Validity :</p>
        <input type="date" name="txtdate" class="form-control"> 

</div>
</div>

</div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" style="font-size: 13px;" data-dismiss="modal">Close</button>
                    
                    <button type="submit" class="btn btn-primary" name="savepromo"  style="font-size: 13px;" >Save changes</button>
                  </div>
                </div>
              </form>
              </div>
            </div>