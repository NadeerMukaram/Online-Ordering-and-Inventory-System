<?php
session_start();
if(!isset($_SESSION['users_id'])) {
header('location:index.php');

}


 include 'includes/header.php';?>
	
	
	<div class="page-wrapper chiller-theme toggled">
 	
 	<?php include 'includes/sidebar.php';

  include 'class.php';
  ?>


  <!-- sidebar-wrapper  -->
  <main class="page-content">
    <div class="container-fluid">
      <h4 style="font-family: 'Jost', sans-serif;">Manage Product</h4>
      <a href="products.php" class="btn btn-secondary" style="font-size:12px"><i class="fas fa-arrow-left"></i> Back to INVENTORY</a>
      <hr>
     
      <div class="row">
          
                 
         <div class="card">
          <p></p>
             <?php
                if(isset($_GET['Manage'])) {
                    $prodid = $_GET['prodid'];
                        
                        $selectp = "select * from product where prod_id ='$prodid'";
                         $results = mysqli_query($con,$selectp); // run query
                           while($row = mysqli_fetch_array($results)){
                           $image = $row['photo'];
                          $catid = $row['cat_id'];
                          $definedsize=$row['standard_or_size'];
                          $weigh = $row['weight'];
                          
                          if ($image == 'th.jfif') {
                              $image_src = $image;
                          }else {
                            $image_src = "bin/Item_Images/".$image;  
                          }
                               ?>
                  <div class="container">
                        <div id="form">
                             <p></p>
                             <form method="post"  enctype="multipart/form-data" action="add.php" id="formtosave">
                                 <div class="row">
                            <div class="col-sm-4">
                                    <img id="configimage" src='<?php echo $image_src?>' style="width:100%;height:400px; border:1px inset grey;">
                                    <p></p>
                                   
                                <input type="checkbox" class="updatephoto" id="updatephoto">
                                <label for="updatephoto" style="font-size:15px">UPDATE or UPLOAD PHOTO</label> 
                                <input type="file" name="image" id="image" class="form-control" style="font-size:14px;margin-top:10px"  disabled>
                                
                         
                            
                            <script type="text/javascript">
                                    
                                    
                                                              const inpfile = document.getElementById("image"); //id of input tag type file
                                                              const regform=document.getElementById ("form"); // div containing the form
                                                              const previewimage=regform.querySelector("#configimage"); // id of img tag
                                          
                                                               inpfile.addEventListener("change",function () {
                                                                  const file = this.files[0];
                                          
                                                                  if(file) {
                                                                      const reader = new FileReader();
                                                                      
                                                                      
                                                                      reader.addEventListener("load",function() {
                                                                          previewimage.setAttribute("src",this.result);
                                                                         
                                                                      });
                                                                      reader.readAsDataURL(file);
                                                                  }
                                                               });      
                                          
                                  </script>
                            </div>
                                <div class="col-sm-4">
                                 <h6>Enter Product Code :</h6>
                           <input type="text" value="<?php echo $row['product_code']?>" name="txtcode" class="form-control" required="" id="1" readonly style="font-size:14px" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"> 
                            <input type="hidden" name="prodid" value="<?php echo $prodid?>">
                            <h6>Enter Product Name :</h6>
                           <input type="text" name="txtname" value="<?php echo $row['name']?>"  class="form-control" required="" readonly   style="font-size:14px"> 
                         <h6>Enter Description :</h6>
                           <input type="text" name="description" value="<?php echo $row['description']?>" class="form-control" required="" readonly style="font-size:14px"> 
                           <h6>Enter Price :</h6>
                           <input type="text" name="price" value="<?php echo $row['price']?>" class="form-control" required="" readonly style="font-size:14px" placeholder="PHP" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
                          
                       
                           <p></p>
                           <h6>Latest Category : <span style="font-weight:bold;color:grey"><?php
                                
                                $selcat = "select * from category where cat_id ='$catid' ";
                                 $resultse = mysqli_query($con,$selcat); // run query
                                              while($rowse = mysqli_fetch_array($resultse)){ 
                                                  echo $rowse['categoryname'];
                                              }
                           ?></span></h6>
                         <h6>Select Category :</h6>
                             <select name="txtcategory" class="form-select" disabled >
                                     
                                   
                                 <?php 
                                    	$sqls= " select * from category  ";
                                     $results = mysqli_query($con,$sqls); // run query
                                             
          
             	//while($row = mysqli_fetch_array($result)){} is where we output all the data in database
                 while($rows = mysqli_fetch_array($results)){
                        ?>
                        <option value=<?php echo $rows['cat_id']?> style="text-transform:uppercase"><?php echo $rows['categoryname']?> category</option>
                            
                        <?php
                 }
                                    ?>
                    </select>
                    <p></p>
                     <h6>Enter Expiration Date :</h6>
                           <input type="date" name="expiration" id="expp" class="form-control" readonly  style="font-size:14px"  > 
                                
                            </div>
                            
                              <div class="col-sm-4">
                                  <!-------------UI Freindly------------------>
                       
                                  <div class="card">
                                        <p></p>
                                         <label class="container" style="font-size:15px">
                                        <h5 style="font-weight:bold">ACTIONS</h5>
                                        </label>
                                       <label class="container" id="renedit"  style="font-size:15px">
                                          <input type="checkbox"  name="0" class="editit"   > EDIT <i class="fas fa-edit"></i>
                                          <span class="checkmark"></span>
                                        </label>
                                        
                                         <label class="container" id="ad" style="font-size:15px;margin-top:5px">
                                          <input type="checkbox"  name="1" id="delete" > DELETE <i class="fas fa-trash"></i>
                                          <span class="checkmark"></span>
                                        </label>
                                    
                                     <script>
                                      $('.updatephoto').click(function() {
                                      if($(this).prop("checked") == true) {
                                     document.getElementById('image').removeAttribute('disabled');
                                     document.getElementById('image').setAttribute('required','true');
                                    
                                     document.getElementById('formtosave').setAttribute('action','wphoto.php');
                                      }
                                      else if($(this).prop("checked") == false) {
                                       document.getElementById('image').setAttribute('disabled','true');
                                        document.getElementById('image').removeAttribute('required');
                                         document.getElementById('formtosave').setAttribute('action','add.php');
                                      }
                                    });
                                         
                                 $('.editit').click(function() {
                                      if($(this).prop("checked") == true) {
                                       $('#renedit').html('<a onclick="window.location.reload()" class="btn btn-danger" style="font-size:11px">CANCEL <i class="fas fa-ban"></i></a>');
                                     $('.form-control').removeAttr( "readonly" );
                                     $('.form-select').removeAttr("disabled");
                                    $('#btnupdate').removeClass('d-none');
                                    $('#ad').addClass('d-none');
                                  
                                      }
                                      else if($(this).prop("checked") == false) {
                                    $('.form-control').attr('readonly','true');
                                    $('.form-select').attr('disabled','true');
                                    $('#btnupdate').addClass('d-none');
                                     $('#delete').removeAttr('disabled');
                                      }
                                    });
                                    
                                    $('#delete').click(function() {
                                        window.location.href="add.php?del&prodid=<?php echo $prodid?>"; 
                                    });
                                    
                                    
                                     </script>
                              
                                      <p></p>  
                                  </div>
                                   <!-------------UI Freindly------------------>
                              
                              <h6 style="font-weight:bold">Other Details :</h6>
                           <p style="font-size:11px;color:grey"><i class="fas fa-info-circle"></i>This are skippable if it is not necessary</p>
                           <hr>
                           <p>Sizes : Width and Height</p>
                           <h6>Defined Size : <?php 
                            
                            if($definedsize == '') {
                                echo 'N/A';
                            }else {
                               echo $row['standard_or_size'] ;
                            }
                           ?>
                           
                           </h6>
                     <div class="row">
                        <div class="col">
                          <input  type="text"  readonly name="textwidth" class="form-control" placeholder="Enter Width" style="font-size:14px"  oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" >
                        </div>
                        <div class="col">
                          <input type="text" readonly  name="textheight" class="form-control" placeholder="Enter Height" style="font-size:14px"  oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" >
                        </div>
                        <p></p>
                        <div class="container">
                             <select name="variety" disabled class="form-select" style="font-size:14px">
                            <option value=" ">Select Specific Size</option>
                            <option value="Extra-small">Extra-Small</option>
                            <option value="Small">Small</option>
                            <option value="Medium">Medium</option>
                            <option value="Large">Large</option>
                            <option value="Extra-large">Extra-Large</option>
                        </select>
                        <br>
                        </div>
                  
                        </div>
                        <div class="row">
                            <p>Weight : G/KG</p>
                            <h6>Defined Weight : <?php
                                
                                if($weigh == '') {
                                    echo 'N/A';
                                }else {
                                    echo $row['weight']; 
                                }
                            
                           ?></h6>
                           
                            <div class="container">
                                 <input type="text" readonly name="txtweight" id="kg" class="form-control" placeholder="Enter Weight" style="font-size:14px" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" >   
                                <span class="d-none" id="optg">
                                   
                                 <input  type="radio" name="gr" class="grams" id="gr" value="grams" style="margin-top:10px" >
                             <label for="check">Grams</label><br>
                             <input  type="radio" name="gr" id="kgs" value="kilograms" class="kilograms" >
                             <label for="check">KiloGrams</label>
                            </span>
                            
                            </div>
                            <p></p>
                        </div>
                       
                    
                        
                         <div class="row">
                            <p>Brand and Where its made :</p>
                           
                            
                            <div class="container">
                              <div class="row">
                        <div class="col">
                         <input type="text" value="<?php echo $row['brand']?>" readonly name="txtbrand" class="form-control" placeholder="Enter Brand Name" style="font-size:14px"  >   
                        </div>
                        <div class="col">
                         <input type="text" readonly value="<?php echo $row['made']?>" name="txtmade" class="form-control" placeholder="Where its Made ?" style="font-size:14px"  >   
                        </div>
                        </div>
                       
                            </div>
                            
                        </div>
                        <hr>
                        <p></p>
                            </div>
                            <p></p>
                            <div class="row"  >
                                <div class="container" >
                                       
                                        <button type="submit" name="btnupdate" id="btnupdate" class="btn btn-secondary d-none form-control">UPDATE</button>
                                        <p></p>
                                </div>
                            </div>
                            </div>
                            </form>
                        </div>
                  </div>
                  
                 <hr>
                 <p></p>
                
                  <div class="container" id="stock" >
                       <h6 style="font-weight:bold;text-align:center">STOCKS</h6>
                       	<?php
                  if(isset($_SESSION['success'])) {
                    echo $_SESSION['success'];
                    unset($_SESSION['success']);
                  }
                  ?>
                       <div class="row">
                           <!-- Button trigger modal -->

<div class="btn-group" role="group" aria-label="Basic example" style="width:35%">
  <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#exampleModal" style="font-size:11px;width:10%">
  New <i class="fas fa-plus"></i>
</button>
<button class="btn btn-secondary" onclick="window.location.href='stocking.php?edit&prodid=<?php echo $prodid?>'" style="font-size:11px;width:10%">Edit <i class="fas fa-edit"></i></button>
<button class="btn btn-secondary" onclick="window.location.href='stocking.php?stockout&prodid=<?php echo $prodid?>'" style="font-size:11px;width:10%">stockout <i class="fas fa-long-arrow-alt-right"></i></button>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h6 class="modal-title" id="exampleModalLabel">Add New Stocks</h6>
    
      </div>
      <form method="post" action="dochange.php">
      <div class="modal-body">
            <p></p>
            
                Enter Stock :
                <input type="text" name="txtnewstock" class="form-control" style="font-size:14px" required>
                Enter Expiration-Date :
                    <span style="color:grey;font-size:12px"><i class="fas fa-info-circle"></i> If product doesnt Expire.Just skip</span>
                    <input type="date" name="expdate" class="form-control" style="font-size:14px">
                    <input type="hidden" name="prodid" value="<?php echo $prodid?>">
            <p></p>
          
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" style="font-size:11px;">Close</button>
        <button type="submit" class="btn btn-primary" name="savenew" style="font-size:11px;">Save changes</button>
      </div>
      </form>
    </div>
  </div>
</div>
  <p></p>
<table class="table" id="table_id">
  <thead class="thead-light">
    <tr>
        
      <th scope="col">Stock</th>
      <th scope="col">Date-Modified</th>
      <th scope="col">Expiration-Date</th>
      <th scope="col">Action</th>
     
    </tr>
  </thead>
  <tbody>
     <?php 
                       
                  $Datatable = new Data();
                  $Datatable->stocks_of_selected($prodid);
    ?>
  </tbody>
</table>
 <p></p>
                           
                       </div>
                  </div>
                  <?php
                              
	                           
	                            }
                         
                  
                }
             
             
             ?>   
    
                   
                            
            </div>
       
    
              
              <p></p>
          </div>

      </div>

      <hr>
      <footer class="text-center">
        <div class="mb-2">
          <small>
            ©Copyrights &middot; 2021 
          </small>
        </div>
      
      </footer>
    </div>
  </main>
  <!-- page-content" -->



</div>
    <script type="text/javascript" src="action.js">  </script>


<!-- page-wrapper -->
<script type="text/javascript">
	
	jQuery(function ($) {

    $(".sidebar-dropdown > a").click(function() {
  $(".sidebar-submenu").slideUp(200);
  if (
    $(this)
      .parent()
      .hasClass("active")
  ) {
    $(".sidebar-dropdown").removeClass("active");
    $(this)
      .parent()
      .removeClass("active");
  } else {
    $(".sidebar-dropdown").removeClass("active");
    $(this)
      .next(".sidebar-submenu")
      .slideDown(200);
    $(this)
      .parent()
      .addClass("active");
  }
});

$("#close-sidebar").click(function() {
  $(".page-wrapper").removeClass("toggled");
});
$("#show-sidebar").click(function() {
  $(".page-wrapper").addClass("toggled");
});

 

   
});      
      	
</script>
    

<?php include 'includes/footer.php';?>