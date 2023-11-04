         
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
               <a href="javascript:void(0)"> <span class="close " onclick="displaymodalnones()" style="font-size: 23px;"><i class="fas fa-times-circle"></i></span></a>
               <div class="container">
               <div class="row">
               	<h6>Product ID : <?php echo $prodid?></h6>
               	<hr>
               	<div class="col-sm-1">
               		
               	</div>
               	<div class="col-sm-10">
               		      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
  	  <?php  //$prodid
                			$sqls = " select * from photo where prod_id='$prodid' order by rand() limit 1 ";
                	                $results = mysqli_query($con,$sqls); // run query
                	               
                	               //  $get_id =  mysqli_insert_id($con); // this code gets the newly inserted id . if insert is the action
                	           
                	             	//while($row = mysqli_fetch_array($result)){} is where we output all the data in database
                	                 while($rows = mysqli_fetch_array($results)){
                	                 	?>
                	             <div class="carousel-item active">
								      <img class="d-block w-100" src="<?php echo $rows['photo']?>" alt="First slide" style="height: 400px;">
								    </div>
                	                 	<?php

                	                 }
                	          

                ?>
   
     <?php  //$prodid
                			$sql = " select * from photo where prod_id='$prodid'  ";
                	                $result = mysqli_query($con,$sql); // run query
                	               
                	               //  $get_id =  mysqli_insert_id($con); // this code gets the newly inserted id . if insert is the action
                	           
                	             	//while($row = mysqli_fetch_array($result)){} is where we output all the data in database
                	                 while($row = mysqli_fetch_array($result)){
                	                 	?>
                	             <div class="carousel-item">
							      <img class="d-block w-100" src="<?php echo $row['photo']?>" alt="Second slide" style="height: 400px;">
							    </div>
    
                	                 	<?php

                	                 }
                	          

                ?>
  
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
               	</div>
               	<div class="col-sm-1">
               		
               	</div>
               </div>
               </div>
         
               


              </div>

            </div>
          