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
      <h4 style="font-family: 'Jost', sans-serif;">Adding New Products</h4>
      <a href="products.php" class="btn btn-secondary" style="font-size:12px"><i class="fas fa-arrow-left"></i> Back to INVENTORY</a>
      <hr>
     
      <div class="row">
          	<?php
                  if(isset($_SESSION['success'])) {
                    echo $_SESSION['success'];
                    unset($_SESSION['success']);
                  }
                  ?>
                 
         <div class="card">
          <p></p>
                
    
                            
                     <div id="form">
                     <form method="post" id="formsave"  enctype="multipart/form-data" action="save.php" >
        <div class="row " >
            
                             
                              
                  
                        
                       
                        <div class="col-sm-6">
                            <h6>Enter Product Code :</h6>
                           <input type="text" name="txtcode" class="form-control" required=""  style="font-size:14px" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"> 
                          
                            <h6>Enter Product Name :</h6>
                           <input type="text" name="txtname" class="form-control" required=""   style="font-size:14px"> 
                         <h6>Enter Description :</h6>
                           <input type="text" name="description" class="form-control" required="" style="font-size:14px"> 
                           <h6>Enter Price :</h6>
                           <input type="text" name="price" class="form-control" required="" style="font-size:14px" placeholder="PHP" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
                          <h6>Enter Stocks :</h6>
                           <input type="text" name="stock" class="form-control" required=""  style="font-size:14px" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" > 
                        
                         
                           <p></p>
                         <h6>Select Category :</h6>
                             <select name="txtcategory" class="form-select" >
                                     
                                   
                                 <?php 
                                    	$sql = " select * from category  ";
                $result = mysqli_query($con,$sql); // run query
              
          
             	//while($row = mysqli_fetch_array($result)){} is where we output all the data in database
                 while($row = mysqli_fetch_array($result)){
                        ?>
                        <option value=<?php echo $row['cat_id']?> style="text-transform:uppercase"><?php echo $row['categoryname']?> category</option>
                            
                        <?php
                 }
                                    ?>
                    </select>
                    <p></p>
                    <hr>
                       <h6 style="font-weight:bold">Types of Product: </h6>
                             <input  type="radio" name="exp" id="check" class="has" required>
                             <label for="check">It Has Expiration-Date.</label><br>
                             <input  type="radio" name="exp" id="check" class="doesnt" required>
                             <label for="check">It Doesnt  Expired. </label>
                             <p></p>
                             <div id="expd" class="d-none">
                              <h6>Enter Expiration Date :</h6>
                           <input type="date" name="expiration" id="expp" class="form-control"  style="font-size:14px"  > 
                           <p></p>
                           </div>
                           
                         
                            <script type="text/javascript">
                              
                                $(document).ready(function() {
                              
                                $('.has').click(function() {
                                document.getElementById('expd').classList.remove('d-none');
                                document.getElementById('expp').setAttribute('required','true');
                                  })
                                   $('.doesnt').click(function() {
                              document.getElementById('expd').classList.add('d-none');
                               document.getElementById('expp').removeAttribute('required');
                             
                                  })
                              
                              });      
                                  
                                    
                            </script>
                        
                        </div>
                         <div class="col-sm-6">
                          
                           
                           <h6 style="font-weight:bold">Other Details :</h6>
                           <p style="font-size:11px;color:grey"><i class="fas fa-info-circle"></i>This are skippable if it is not necessary</p>
                           <hr>
                           <p>Sizes : Width and Height</p>
                     <div class="row">
                        <div class="col">
                          <input  type="text"  name="textwidth" class="form-control" placeholder="Enter Width" style="font-size:14px"  oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" >
                        </div>
                        <div class="col">
                          <input type="text"  name="textheight" class="form-control" placeholder="Enter Height" style="font-size:14px"  oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" >
                        </div>
                        <p></p>
                        <div class="container">
                             <select name="variety" class="form-select" style="font-size:14px">
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
                           
                           
                            <div class="container">
                                 <input type="text" name="txtweight" id="kg" class="form-control" placeholder="Enter Weight" style="font-size:14px" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" >   
                                <span class="d-none" id="optg">
                                   
                                 <input  type="radio" name="gr" class="grams" id="gr" value="grams" style="margin-top:10px" >
                             <label for="check">Grams</label><br>
                             <input  type="radio" name="gr" id="kgs" value="kilograms" class="kilograms" >
                             <label for="check">KiloGrams</label>
                            </span>
                            
                            </div>
                            <p></p>
                        </div>
                       
                        
                         <script type="text/javascript">
                              
                                $(document).ready(function() {
                              
                                $('.grams').click(function() {
                                var value = $('#kg').val();
                                var totarvalue = value+' grams';
                             
                                document.getElementById('#kg').setAttribute('value',totarvalue);
                                  })
                                  
                                   $('.kilograms').click(function() {
                               var value = $('#kg').val();
                               var totarvalue = value+' Kilograms';
                              
                                document.getElementById('#kg').setAttribute('value',totarvalue);
                                  })
                                  
                                    $('#kg').keyup(function(){ 
                                        var value = $('#kg').val();
                                    document.getElementById('optg').classList.remove('d-none');
                                    document.getElementById('gr').setAttribute('required','true');
                                     document.getElementById('kgs').setAttribute('required','true');
                                            if (value == '') {
                                             document.getElementById('optg').classList.add('d-none');    
                                               document.getElementById('gr').removeAttribute('required');
                                                document.getElementById('kgs').removeAttribute('required');
                                            }
                                     })      
        
                              
                              });      
                                  
                                    
                            </script>
                        
                        
                         <div class="row">
                            <p>Brand and Where its made :</p>
                           
                            
                            <div class="container">
                              <div class="row">
                        <div class="col">
                         <input type="text" name="txtbrand" class="form-control" placeholder="Enter Brand Name" style="font-size:14px"  >   
                        </div>
                        <div class="col">
                         <input type="text" name="txtmade" class="form-control" placeholder="Where its Made ?" style="font-size:14px"  >   
                        </div>
                        </div>
                       
                            </div>
                            
                        </div>
                        <hr>
                        <p></p>
                        <h6 style="font-weight:bolder"> Include a PHOTO?</h6>
                         <input  type="checkbox" name="ph" class="uploadphoto" id="check">
                        <label for="check">Upload a Photo</label>
                        
                        <p></p>
                            <div id="phto" class="d-none" >
                                
                                <img src="link.png" style="width:100%;height:500px" id="configimage">   <p></p>
                                <input type="file" name="image" id="image" class="form-control" style="font-size:14px" >
                                
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
                        <p></p>
                         <script type="text/javascript">
                              //Code for checkboxchecked or uncheck
                                $(document).ready(function() {
                              
                              $('.uploadphoto').click(function() {
                                      if($(this).prop("checked") == true) {
                                       document.getElementById('phto').classList.remove('d-none');
                                       
                                          document.getElementById('image').setAttribute('required','true');
                                      }
                                      else if($(this).prop("checked") == false) {
                                        document.getElementById('phto').classList.add('d-none');
                                         document.getElementById('image').removeAttribute('required');
                                      }
                                    });
                                    
                                     $('.remain').click(function() {
                                      if($(this).prop("checked") == true) {
                                       document.getElementById('formsave').setAttribute('action','remain.php');
                                      }
                                      else if($(this).prop("checked") == false) {
                                        document.getElementById('formsave').setAttribute('action','save.php');
                                      }
                                    });
        
                              
                              });
        
                           
                            </script>
                         
                            
                                 <h6 style="font-weight:bolder">Saving Options:</h6>
                             
                              <input type="checkbox" class="remain" id="check">
                     <label for="check">Remain on this Page after Saving. </label>
                    
                      
                 
                                
                                     <br><br>
                                        <input type="submit" name="savenew" value="SAVE" class="form-control btn btn-success s"  >
                                        <br><br>
                                       
                                       
                       
                                        
                                        
                                        
                               
                              
                        </div>
                       
        </div>
        </form>
                   
                            
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