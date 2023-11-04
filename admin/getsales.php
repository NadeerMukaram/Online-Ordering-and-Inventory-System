<?php 
  session_start();
include 'connection/connect.php';

    if(isset($_POST['getdat'])){
        $year = $_POST['year'];
        $month = $_POST['month'];
        $day = $_POST['day'];
        $compare = $year.'-'.$month.'-'.$day;
          
                     $sql = " select * from trans_record where concat (`datecompleted`) like '%$compare%'   ";
                      $result = mysqli_query($con,$sql); // run query
                      $count= mysqli_num_rows($result); // to count if necessary
                     //  $get_id =  mysqli_insert_id($con); // this code gets the newly inserted id . if insert is the action
                 if($count >=1) {
                       while($row = mysqli_fetch_array($result)){
                            $prodid = $row['prod_id'];
	                     ?>
	                     <tr>
	                         <td><?php
	                         $select = "select * from product where prod_id = '$prodid' ";
	                         $results = mysqli_query($con,$select); // run query
	                         while($rows = mysqli_fetch_array($results)){ 
	                            echo $rows['product_code']; 
	                         }
	                         
    	                         ?></td>
    	                         <td><?php echo $row['quantity']?></td>
    	                         <td>  ₱<?php echo $row['total']?></td>
	                     </tr>
	                     <?php
	                     $totalsales += $row['total'];
	                 } 
                       
                 }else {
                    
                     ?>
                     <tr>
                           
                         <td style="text-align:center" colspan="8">No Records Found in  : <?php echo $year.'-'.$month.'-'.$day?></td>
                     </tr>
                     <?php
                 }
                
    }

?>  
           