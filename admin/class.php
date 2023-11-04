<?php

	/**
	 *  
	 */
	
	class Data
	{
	    
	    function stocks_of_selected($id_of_units) {
	        	include 'connection/connect.php';
					$sql = " select * from productstock where prod_id ='$id_of_units'  ";
			                $result = mysqli_query($con,$sql); // run query
			               
			                 while($row = mysqli_fetch_array($result)){ 
			                  $xp=   $row['expiration'];
			                  $numstock =  $row['stock'];
			                    ?>
			                    <tr>
			                        <td><?php 
			                            if($numstock >= 0) {
			                                echo $numstock;
			                            }else {
			                                echo '0';
			                            }
			                                
			                        ?></td>
			                        <td><?php echo $row['modified']?></td>
			                        <td><?php 
			                            if($xp == '0000-00-00') {
			                                echo 'No Expiration';
			                            }else {
			                                echo $xp;
			                            }
			                        ?></td>
			                        <td><a href="dochange.php?del&stockid=<?php echo $row['stock_id']?>&prodid=<?php echo $id_of_units ?>" class="btn"><i class="fas fa-trash"></i></a></td>
			                    </tr>
			                    <?php
			                    
			                 }
			              
	    }

        function TimeFrameforlowstacks() {
            	include 'connection/connect.php';
            	$sql = " select * from productstock where stock < 40 ";
			                $result = mysqli_query($con,$sql); // run query
			              $count= mysqli_num_rows($result); // to count if necessary 
			              if($count >=1) {
			                 //make the notifications 
			                 ?>
			                   <div class="fixed-top">
                           <a href="products.php?getlowstocks" style="text-decoration:none" >
                            <div class="alert alert-danger alert-dismissible fade show" role="alert" style="width:auto;float:right;margin-top:30px;margin-right:20px">
                           <i class="fas fa-long-arrow-alt-down"></i> Units Low Stocks Detected Click here to View
                 
                                 <button type="button"  data-dismiss="alert" aria-label="Close" style="font-size:15px;outline:none;border:none;">
                                <span aria-hidden="true">&times;</span>
                                  
                                </div>
                                </a>
                      </div>
			                 <?php
			              }else {
			                  //do nothing
			              }
			                 
            	
        }
        
         function TimeFrameforexpiringstocks() {
            	include 'connection/connect.php';
            	date_default_timezone_set('Asia/Manila');
            	$datenow = date('Y-m-d');
            	$sql = " select * from product where cat_id = '1' or cat_id = '3' or cat_id = '4'  ";
			                $result = mysqli_query($con,$sql); // run query
			              $count= mysqli_num_rows($result); // to count if necessary 
			              
			             
			                 //make the notifications 
			                  while($row = mysqli_fetch_array($result)){
                                         $sqlstock = " select * from productstock where expiration < '$datenow'  ";
                                            $results = mysqli_query($con,$sqlstock); // run query
                                          $countstocks= mysqli_num_rows($results);
                                             while($stock= mysqli_fetch_array($results)){
                                                    $exp = $stock['expiration'];
                                             }
                                      
                             }
                          if($countstocks >=1) {
                              if($exp == '0') {
                               //do nothing
                              }else {
                                    ?>
			                   <div class="fixed-top">
                           <a href="products.php?getexpirytocks" style="text-decoration:none" >
                            <div class="alert alert-danger alert-dismissible fade show" role="alert" style="width:auto;float:right;margin-top:100px;margin-right:20px">
                           <i class="fas fa-long-arrow-alt-down"></i>Stocks <span style="font-weight:bolder">Expired</span> Detected Click here to View
                    
                                 <button type="button"  data-dismiss="alert" aria-label="Close" style="font-size:15px;outline:none;border:none;">
                                <span aria-hidden="true">&times;</span>
                                  
                                </div>
                                </a>
                      </div>
			                 <?php
                              }
                            
			              
                          }
			                 
            	
        }


		function getStocks($id_of_units) {
		     	include 'connection/connect.php';
					$sql = " select * from productstock where prod_id ='$id_of_units' ";
			                $result = mysqli_query($con,$sql); // run query
			                $overalltotal = 0 ;
			                 while($row = mysqli_fetch_array($result)){ 
			                  $overalltotal += $row['stock'];
			                 }
			               if($overalltotal <= 40) {
			                   ?>
			                  <span style="color:#cd3d44"><?php 
			                   if($overalltotal >= 0) {
			                                echo $overalltotal;
			                            }else {
			                                echo '0';
			                            }
			                  ?> <i class="fas fa-long-arrow-alt-down"></i></span>
			                   <?php
			               }else {
			                   echo $overalltotal;
			               }
		}
		
			function getprodStockse($id_of_units) {
		     	include 'connection/connect.php';
		     	date_default_timezone_set('Asia/Manila');
            	$datenow = date('Y-m-d');
					$sql = " select * from productstock where prod_id='$id_of_units' and expiration !='0000-00-00' and expiration < now() ";
					
			                $result = mysqli_query($con,$sql); // run query
			               
			                 while($row = mysqli_fetch_array($result)){ 
			                   $exp = $row['expiration'];
			                    $prodid = $row['prod_id'];
			                 }
			                 
			                     if($exp == '0') {
                               //do nothing
                              
                               echo'zero';
                              }else {
                                   $sqls = " select * from product where prod_id='$prodid' ";
			                $results = mysqli_query($con,$sqls); // run query
			               
			                 while($rows = mysqli_fetch_array($results)){
			                 	$catid = $rows['cat_id'];
			                 	$prodid=$rows['prod_id'];
			                 	  $image = $rows['photo'];
                          
                          
                          if ($image == 'th.jfif') {
                              $image_src = $image;
                          }else {
                            $image_src = "bin/Item_Images/".$image;  
                          }
										?>
									
										<tr>
											<td><?php echo $rows['product_code']?></td>
											<td>
											    <img src="<?php echo $image_src?>" style="height:50px;width:50px">
											 
											    
											</td>
											<td><?php echo $rows['name']?></td>
										
												<td><?php 
												    $Datatable = new Data();
                                                     $Datatable->getStocks($prodid);
												?> <i class="fas fa-exclamation-triangle"></i></td>
											<td><?php
											$cat = " select * from category where cat_id = '$catid' ";
								                $resultae = mysqli_query($con,$cat); // run query
								               
								                 while($rowse = mysqli_fetch_array($resultae)){
								                 	echo $rowse['categoryname'];
								                 }
											?></td>
										<td><a href="manage_product.php?Manage&prodid=<?php echo $prodid?>" class="btn btn-light btn-sm viewprod" >Manage <i class="fas fa-arrow-circle-right"></i></a></td>
										
										</tr>

										<?php
			                 }
			                    
                                  
                              }
                            
			              
                          
			              
			                      
			                  
			               
			                   
			                   
			               
			               
		}
		
		function getProductsexpirystocks() {
		     	include 'connection/connect.php';
				    	$sql = " select * from product where cat_id = '1' or cat_id = '3' or cat_id = '4'  ";
			                $result = mysqli_query($con,$sql); // run query
			               
			                 while($row = mysqli_fetch_array($result)){
			                              $prodid = $row['prod_id'];           
			                                         $Datatable = new Data();
                                                     $Datatable->getprodStockse($prodid); 
			                     
			                 }
				
		}
	
		function getprodStocks($id_of_units) {
		     	include 'connection/connect.php';
					$sql = " select * from productstock where prod_id ='$id_of_units' ";
			                $result = mysqli_query($con,$sql); // run query
			                $overalltotal = 0 ;
			                 while($row = mysqli_fetch_array($result)){ 
			                  $overalltotal += $row['stock'];
			                  $prodid = $row['prod_id'];
			                 }
			               if($overalltotal <= 40) {
			                        $sqls = " select * from product where prod_id='$prodid' ";
			                $results = mysqli_query($con,$sqls); // run query
			               
			                 while($rows = mysqli_fetch_array($results)){
			                 	$catid = $rows['cat_id'];
			                 	$prodid=$rows['prod_id'];
			                 	  $image = $rows['photo'];
                          
                          
                          if ($image == 'th.jfif') {
                              $image_src = $image;
                          }else {
                            $image_src = "bin/Item_Images/".$image;  
                          }
										?>
									
										<tr>
											<td><?php echo $rows['product_code']?></td>
											<td>
											    <img src="<?php echo $image_src?>" style="height:50px;width:50px">
											 
											    
											</td>
											<td><?php echo $rows['name']?></td>
										
												<td><?php 
												    $Datatable = new Data();
                                                     $Datatable->getStocks($prodid);
												?> </td>
											<td><?php
											$cat = " select * from category where cat_id = '$catid' ";
								                $resultae = mysqli_query($con,$cat); // run query
								               
								                 while($rowse = mysqli_fetch_array($resultae)){
								                 	echo $rowse['categoryname'];
								                 }
											?></td>
										<td><a href="manage_product.php?Manage&prodid=<?php echo $prodid?>" class="btn btn-light btn-sm viewprod" >Manage <i class="fas fa-arrow-circle-right"></i></a></td>
										
										</tr>

										<?php
			                 }
			                    
			                  
			               
			                   
			                   
			               }
			               
		}
		
		function getProductslowstocks() {
		     	include 'connection/connect.php';
				    	$sql = " select * from product ";
			                $result = mysqli_query($con,$sql); // run query
			               
			                 while($row = mysqli_fetch_array($result)){
			                              $prodid = $row['prod_id'];           
			                                         $Datatable = new Data();
                                                     $Datatable->getprodStocks($prodid); 
			                     
			                 }
				
		}
		
		
		function getproducts() {
		include 'connection/connect.php';
					$sql = " select * from product ";
			                $result = mysqli_query($con,$sql); // run query
			               
			                 while($row = mysqli_fetch_array($result)){
			                 	$catid = $row['cat_id'];
			                 	$prodid=$row['prod_id'];
			                 	  $image = $row['photo'];
                          
                          
                          if ($image == 'th.jfif') {
                              $image_src = $image;
                          }else {
                            $image_src = "bin/Item_Images/".$image;  
                          }
										?>
									
										<tr>
											<td><?php echo $row['product_code']?></td>
											<td>
											    <img src="<?php echo $image_src?>" style="height:50px;width:50px">
											  
											    
											</td>
											<td><?php echo $row['name']?></td>
										
												<td><?php 
												    $Datatable = new Data();
                                                     $Datatable->getStocks($prodid);
												?> </td>
											<td><?php
											$cat = " select * from category where cat_id = '$catid' ";
								                $resulta = mysqli_query($con,$cat); // run query
								               
								                 while($rows = mysqli_fetch_array($resulta)){
								                 	echo $rows['categoryname'];
								                 }
											?></td>
										<td><a href="manage_product.php?Manage&prodid=<?php echo $prodid?>" class="btn btn-light btn-sm viewprod" >Manage <i class="fas fa-arrow-circle-right"></i></a></td>
										
										</tr>

										<?php
			                 }
			                

			        
		}	

		function getCategory() {
			include 'connection/connect.php';
					$sql = " select * from category ";
			                $result = mysqli_query($con,$sql); // run query
			               
			                 while($row = mysqli_fetch_array($result)){
			                 	$cati = $row['cat_id'];
										?>
										<tr>
											<td><?php echo $row['cat_id']?></td>
											<td><?php echo $row['categoryname']?></td>
											<td>
											    <?php 
											      $sqls = " select * from product where cat_id = '$cati'  ";
                                                        $results = mysqli_query($con,$sqls); // run query
                                                        $counts= mysqli_num_rows($results); // to count if necessary
                                                       //  $get_id =  mysqli_insert_id($con); // this code gets the newly inserted id . if insert is the action
                                                     if ($counts>=1){ 
                                                         ?>
                                                          <span style="padding:5px;color:#33a556">Active</span>
                                                         <?php
                                                     }else {
                                                          ?>
                                                         <span style="padding:5px;color:#c53753">Inactive</span>
                                                         <?php
                                                     }
											    ?>
										
                                       
											</td>
											<td>
												<a href="category.php?Edit&prodid=<?php echo $cati?>" class="btn btn-light btn-sm viewprod" ><i class="fas fa-edit"></i></a>
												<a href="category.php?del&prodid=<?php echo $cati?>" class="btn btn-light btn-sm viewprod" ><i class="fas fa-trash"></i></a>

											</td>
										</tr>
										<?php
			                 }
		}
		
		function getpromocodes() {
		    	include 'connection/connect.php';
					$sql = " select * from promocodes ";
			                $result = mysqli_query($con,$sql); // run query
			               date_default_timezone_set('Asia/Manila');
                                            $datenow = date('Y-m-d');
			                 while($row = mysqli_fetch_array($result)){
			                 	$promoid = $row['promo_id'];
			                 	$da= $row['validity'];
			                 	$compdate = date($da);
										?>
									
										<tr>
											<td><?php echo $row['promo_id']?></td>
											<td><?php echo $row['code']?></td>
											<td>₱<?php echo $row['discount']?></td>
											<td><?php echo $row['validity']?></td>
											<td> 
											<?php
											 
                                	
                                     if ($compdate < $datenow){
                                      
                                      
                                        ?>
                                        <span style="padding:5px;color:#c53753">Expired</span>
                                        <?php
                                       
                                     }else {
                                         ?>
                                         
                                        <span style="padding:5px;color:#33a556">Active</span>
                                        <?php
                                     }
                                
                                ?>
											
											
											</td>
											<td>
												<a href="pcode.php?Edit&promoid=<?php echo $promoid?>" class="btn btn-light btn-sm viewprod" ><i class="fas fa-edit"></i></a>
												<a href="pcode.php?del&promoid=<?php echo $promoid?>" class="btn btn-light btn-sm viewprod" ><i class="fas fa-trash"></i></a>

											</td>
										</tr>
										<?php
			                 }
		    
		}



			function getaccounts() {
		include 'connection/connect.php';
					$sql = " select * from user_account ";
			                $result = mysqli_query($con,$sql); // run query
			               
			                 while($row = mysqli_fetch_array($result)){
			                 	$user_id = $row['user_id'];
			                 	$editispersonal = $row['logintype'];
										?>
										<tr>
											<td><?php echo $row['user_id']?></td>
											<td><?php echo $row['uname']?></td>
											<td><?php echo $row['surname']?></td>
											<td><?php echo $row['address']?></td>
											<td><?php echo $row['contact_no']?></td>
											<td><?php echo $row['email']?></td>
											<td><?php echo $row['datejoined']?></td>
											<td>
											    <?php
											        if($editispersonal == 'gmail') {
											            ?>
											            
											            <?php
											        }else if($editispersonal == 'personal') {
											         ?>
											            <a href="accounts.php?Edit&prodid=<?php echo $user_id?>" class="btn btn-light btn-sm viewprod" ><i class="fas fa-edit"></i></a>
											        <?php
											            
											        }
											    ?>
												
												<a href="accounts.php?del&prodid=<?php echo $user_id?>" class="btn btn-light btn-sm viewprod" ><i class="fas fa-trash"></i></a></td>
										</tr>
										<?php
			                 }
			        
		}



		function getCategoryselecttag() {
			include 'connect.php';
					$sql = " select * from category ";
			                $result = mysqli_query($con,$sql); // run query
			               
			                 while($row = mysqli_fetch_array($result)){
										?>
										<option value="<?php echo $row['cat_id']?>">
										
											<?php echo $row['category_name']?>
											
										</option>
										<?php
			                 }
		}
		

		function getCategoryselecttags($catid) {
			include 'connect.php';
					$sql = " select * from category where cat_id = '$catid' ";
			                $result = mysqli_query($con,$sql); // run query
			               
			                 while($row = mysqli_fetch_array($result)){
										?>
										<option value="<?php echo $row['cat_id']?>">
										
											<?php echo $row['category_name']?>
											
										</option>
										<?php
			                 }
		}
		
		
		

	}




?>