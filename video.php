<?php
include 'admin/connection/connect.php';
   
   
  
   $sql = " select * from product   ";
                    $result = mysqli_query($con,$sql); // run query
                    $count= mysqli_num_rows($result); // to count if necessary
                 
                     while($row = mysqli_fetch_array($result)){
                          
                          for ($i = 0 ; $i < $count ; $i++) {
                              $string = 'han-'.rand(12345,56789);
                               $update = "UPDATE `product` SET `product_code`='$string' WHERE 1";
                                $sad = mysqli_query($con,$update); // run query
                          }
                               
                                
                     }
              

?>