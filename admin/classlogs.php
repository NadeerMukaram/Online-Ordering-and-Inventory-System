<?php
class logs {
    function logsstocks() {
        	include 'connection/connect.php';
        	
        	?>
        	
   <script type="text/javascript">     
    function PrintDiv(){    
       var divToPrint = document.getElementById('divToPrint');
       var popupWin = window.open('', '_blank', 'width=500,height=600');
       popupWin.document.open();
       popupWin.document.write(divToPrint.innerHTML);
       popupWin.focus();
        popupWin.print();
       
        popupWin.document.close();
            }
 </script>




<div id="divToPrint" style="display:none;">
<!--print content--->

 <div style="width:100%;height:100%;background-color:white;">
 	 <style>
table { 
	width:100%; 
	border-collapse: collapse; 
	margin:50px auto;
	}

/* Zebra striping */
tr:nth-of-type(odd) { 
	background: #eee; 
	}

th { 
	background: rgb(52, 152, 219); 
	color: black; 
	font-weight: bold; 
	}

td, th { 
	padding: 7px; 
	border: 1px solid #ccc; 
	text-align: center; 
	font-size: 13px;
	}
</style>
 	<h3>Stocks Log Record</h3>
 	<br>
 	<hr>
   <table class="table">
  <thead>
    <tr>
      <th scope="col">Type</th>
      <th scope="col">Quantity</th>
      <th scope="col">Details</th>
      <th scope="col">Date&Time</th>
    </tr>
  </thead>
  <tbody>
        	<?php
        	$sql = " select * from logs where section = 'stocks'  ";
                $result = mysqli_query($con,$sql); // run query
                $count= mysqli_num_rows($result); // to count if necessary
               //  $get_id =  mysqli_insert_id($con); // this code gets the newly inserted id . if insert is the action
             if ($count>=1){
                 //while($row = mysqli_fetch_array($result)){} is where we output all the data in database
                 while($row = mysqli_fetch_array($result)){
                    ?>
                    <tr>
                     <td><span style="font-weight:bolder"><?php echo $row['type']?></span></td>
                     <td><?php echo $row['qty']?></td>
                     <td><?php echo $row['details']?></td>
                     <td><?php echo $row['datetimelog']?></td>
                    </tr>
                    <?php
                 }
          }
          
          
    ?>
  </tbody>
</table>


  </div>
</div>
        	  <table class="table" id="table_id">
  <thead>
    <tr>
      <th scope="col">Type</th>
      <th scope="col">Quantity</th>
      <th scope="col">Details</th>
      <th scope="col">Date&Time</th>
    </tr>
  </thead>
  <tbody>
        	<?php
        	$sql = " select * from logs where section = 'stocks'  ";
                $result = mysqli_query($con,$sql); // run query
                $count= mysqli_num_rows($result); // to count if necessary
               //  $get_id =  mysqli_insert_id($con); // this code gets the newly inserted id . if insert is the action
             if ($count>=1){
                 //while($row = mysqli_fetch_array($result)){} is where we output all the data in database
                 while($row = mysqli_fetch_array($result)){
                    ?>
                    <tr>
                     <td><span style="font-weight:bolder"><?php echo $row['type']?></span></td>
                     <td><?php echo $row['qty']?></td>
                     <td><?php echo $row['details']?></td>
                     <td><?php echo $row['datetimelog']?></td>
                    </tr>
                    <?php
                 }
          }
          
          
    ?>
  </tbody>
</table>
<button type="button" value="print" onclick="PrintDiv()" class="btn btn-light" style="width:150;float:right">
  Print Stock logs <i class="fas fa-print"></i>
  </button>
 
          <?php
    }
    
    
     function logsproducts() {
        	include 'connection/connect.php';
        	
        	?>
        	
   <script type="text/javascript">     
    function PrintDivunit(){    
       var divToPrint = document.getElementById('divToPrinterunit');
       var popupWin = window.open('', '_blank', 'width=500,height=600');
       popupWin.document.open();
       popupWin.document.write(divToPrint.innerHTML);
       popupWin.focus();
        popupWin.print();
       
        popupWin.document.close();
            }
 </script>




<div id="divToPrinterunit" style="display:none;">
<!--print content--->

 <div style="width:100%;height:100%;background-color:white;">
 	<h3>Units Log Record</h3>
 	<br>
 	<hr>
 	 <style>
table { 
	width:100%; 
	border-collapse: collapse; 
	margin:50px auto;
	}

/* Zebra striping */
tr:nth-of-type(odd) { 
	background: #eee; 
	}

th { 
	background: rgb(52, 152, 219); 
	color: black; 
	font-weight: bold; 
	}

td, th { 
	padding: 7px; 
	border: 1px solid #ccc; 
	text-align: center; 
	font-size: 13px;
	}
</style>
   <table class="table" >
  <thead>
    <tr>
      <th scope="col">Type</th>
     
      <th scope="col">Details</th>
      <th scope="col">Date&Time</th>
    </tr>
  </thead>
  <tbody>
        	<?php
        	$sql = " select * from logs where section = 'unit'  ";
                $result = mysqli_query($con,$sql); // run query
                $count= mysqli_num_rows($result); // to count if necessary
               //  $get_id =  mysqli_insert_id($con); // this code gets the newly inserted id . if insert is the action
             if ($count>=1){
                 //while($row = mysqli_fetch_array($result)){} is where we output all the data in database
                 while($row = mysqli_fetch_array($result)){
                    ?>
                    <tr>
                     <td><span style="font-weight:bolder"><?php echo $row['type']?></span></td>
                    
                     <td><?php echo $row['details']?></td>
                     <td><?php echo $row['datetimelog']?></td>
                    </tr>
                    <?php
                 }
          }
          
          
    ?>
  </tbody>
</table>


  </div>
</div>
        	  <table class="table table-sm" id="table_product">
  <thead>
    <tr>
      <th scope="col">Type</th>
     
      <th scope="col">Details</th>
      <th scope="col">Date&Time</th>
    </tr>
  </thead>
  <tbody>
        	<?php
        	$sql = " select * from logs where section = 'unit'  ";
                $result = mysqli_query($con,$sql); // run query
                $count= mysqli_num_rows($result); // to count if necessary
               //  $get_id =  mysqli_insert_id($con); // this code gets the newly inserted id . if insert is the action
             if ($count>=1){
                 //while($row = mysqli_fetch_array($result)){} is where we output all the data in database
                 while($row = mysqli_fetch_array($result)){
                    ?>
                    <tr>
                     <td><span style="font-weight:bolder"><?php echo $row['type']?></span></td>
                    
                     <td><?php echo $row['details']?></td>
                     <td><?php echo $row['datetimelog']?></td>
                    </tr>
                    <?php
                 }
          }
          
          
    ?>
  </tbody>
</table>
<script>
         $(document).ready(function() {
  //# for id , . for classes
      $('#table_product').DataTable();

         }); 
           
    </script>
<button type="button" value="print" onclick="PrintDivunit()" class="btn btn-light" style="width:150;float:right">
  Print Units logs <i class="fas fa-print"></i>
  </button>
          <?php
    }
    
    
    function logspromocode() {
        	include 'connection/connect.php';
        	
        	?>
        	
   <script type="text/javascript">     
    function PrintDivcode(){    
       var divToPrint = document.getElementById('divToPrintercode');
       var popupWin = window.open('', '_blank', 'width=500,height=600');
       popupWin.document.open();
       popupWin.document.write(divToPrint.innerHTML);
       popupWin.focus();
        popupWin.print();
       
        popupWin.document.close();
            }
 </script>




<div id="divToPrintercode" style="display:none;">
<!--print content--->

 <div style="width:100%;height:100%;background-color:white;">
 	<h3>Promocode Log Record</h3>
 	<br>
 	<hr>
 	 <style>
table { 
	width:100%; 
	border-collapse: collapse; 
	margin:50px auto;
	}

/* Zebra striping */
tr:nth-of-type(odd) { 
	background: #eee; 
	}

th { 
	background: rgb(52, 152, 219); 
	color: black; 
	font-weight: bold; 
	}

td, th { 
	padding: 7px; 
	border: 1px solid #ccc; 
	text-align: center; 
	font-size: 13px;
	}
</style>
   <table class="table" >
  <thead>
    <tr>
      <th scope="col">Type</th>
     
      <th scope="col">Details</th>
      <th scope="col">Date&Time</th>
    </tr>
  </thead>
  <tbody>
        	<?php
        	$sql = " select * from logs where section = 'pcode'  ";
                $result = mysqli_query($con,$sql); // run query
                $count= mysqli_num_rows($result); // to count if necessary
               //  $get_id =  mysqli_insert_id($con); // this code gets the newly inserted id . if insert is the action
             if ($count>=1){
                 //while($row = mysqli_fetch_array($result)){} is where we output all the data in database
                 while($row = mysqli_fetch_array($result)){
                    ?>
                    <tr>
                     <td><span style="font-weight:bolder"><?php echo $row['type']?></span></td>
                    
                     <td><?php echo $row['details']?></td>
                     <td><?php echo $row['datetimelog']?></td>
                    </tr>
                    <?php
                 }
          }
          
          
    ?>
  </tbody>
</table>


  </div>
</div>
        	  <table class="table table-sm" id="table_pcode">
  <thead>
    <tr>
      <th scope="col">Type</th>
     
      <th scope="col">Details</th>
      <th scope="col">Date&Time</th>
    </tr>
  </thead>
  <tbody>
        	<?php
        	$sql = " select * from logs where section = 'pcode'  ";
                $result = mysqli_query($con,$sql); // run query
                $count= mysqli_num_rows($result); // to count if necessary
               //  $get_id =  mysqli_insert_id($con); // this code gets the newly inserted id . if insert is the action
             if ($count>=1){
                 //while($row = mysqli_fetch_array($result)){} is where we output all the data in database
                 while($row = mysqli_fetch_array($result)){
                    ?>
                    <tr>
                     <td><span style="font-weight:bolder"><?php echo $row['type']?></span></td>
                    
                     <td><?php echo $row['details']?></td>
                     <td><?php echo $row['datetimelog']?></td>
                    </tr>
                    <?php
                 }
          }
          
          
    ?>
  </tbody>
</table>
<script>
         $(document).ready(function() {
  //# for id , . for classes
      $('#table_pcode').DataTable();

         }); 
           
    </script>
<button type="button" value="print" onclick="PrintDivcode()" class="btn btn-light" style="width:150;float:right">
  Print Promocode logs <i class="fas fa-print"></i>
  </button>
          <?php
    }
    
     function logsaccount() {
        	include 'connection/connect.php';
        	
        	?>
        	
   <script type="text/javascript">     
    function PrintDivacc(){    
       var divToPrint = document.getElementById('divToPrinteracc');
       var popupWin = window.open('', '_blank', 'width=500,height=600');
       popupWin.document.open();
       popupWin.document.write(divToPrint.innerHTML);
       popupWin.focus();
        popupWin.print();
       
        popupWin.document.close();
            }
 </script>




<div id="divToPrinteracc" style="display:none;">
<!--print content--->

 <div style="width:100%;height:100%;background-color:white;">
 	<h3>Accounts Log Record</h3>
 	<br>
 	<hr>
 	 <style>
table { 
	width:100%; 
	border-collapse: collapse; 
	margin:50px auto;
	}

/* Zebra striping */
tr:nth-of-type(odd) { 
	background: #eee; 
	}

th { 
	background: rgb(52, 152, 219); 
	color: black; 
	font-weight: bold; 
	}

td, th { 
	padding: 7px; 
	border: 1px solid #ccc; 
	text-align: center; 
	font-size: 13px;
	}
</style>
   <table class="table" >
  <thead>
    <tr>
      <th scope="col">Type</th>
     
      <th scope="col">Details</th>
      <th scope="col">Date&Time</th>
    </tr>
  </thead>
  <tbody>
        	<?php
        	$sql = " select * from logs where section = 'account'  ";
                $result = mysqli_query($con,$sql); // run query
                $count= mysqli_num_rows($result); // to count if necessary
               //  $get_id =  mysqli_insert_id($con); // this code gets the newly inserted id . if insert is the action
             if ($count>=1){
                 //while($row = mysqli_fetch_array($result)){} is where we output all the data in database
                 while($row = mysqli_fetch_array($result)){
                    ?>
                    <tr>
                     <td><span style="font-weight:bolder"><?php echo $row['type']?></span></td>
                    
                     <td><?php echo $row['details']?></td>
                     <td><?php echo $row['datetimelog']?></td>
                    </tr>
                    <?php
                 }
          }
          
          
    ?>
  </tbody>
</table>


  </div>
</div>
        	  <table class="table table-sm" id="table_acc">
  <thead>
    <tr>
      <th scope="col">Type</th>
     
      <th scope="col">Details</th>
      <th scope="col">Date&Time</th>
    </tr>
  </thead>
  <tbody>
        	<?php
        	$sql = " select * from logs where section = 'account'  ";
                $result = mysqli_query($con,$sql); // run query
                $count= mysqli_num_rows($result); // to count if necessary
               //  $get_id =  mysqli_insert_id($con); // this code gets the newly inserted id . if insert is the action
             if ($count>=1){
                 //while($row = mysqli_fetch_array($result)){} is where we output all the data in database
                 while($row = mysqli_fetch_array($result)){
                    ?>
                    <tr>
                     <td><span style="font-weight:bolder"><?php echo $row['type']?></span></td>
                    
                     <td><?php echo $row['details']?></td>
                     <td><?php echo $row['datetimelog']?></td>
                    </tr>
                    <?php
                 }
          }
          
          
    ?>
  </tbody>
</table>
<script>
         $(document).ready(function() {
  //# for id , . for classes
      $('#table_acc').DataTable();

         }); 
           
    </script>
<button type="button" value="print" onclick="PrintDivacc()" class="btn btn-light" style="width:150;float:right">
  Print Account logs <i class="fas fa-print"></i>
  </button>
          <?php
    }
    
    function logscategory() {
        	include 'connection/connect.php';
        	
        	?>
        	
   <script type="text/javascript">     
    function PrintDivcat(){    
       var divToPrint = document.getElementById('divToPrintercat');
       var popupWin = window.open('', '_blank', 'width=500,height=600');
       popupWin.document.open();
       popupWin.document.write(divToPrint.innerHTML);
       popupWin.focus();
        popupWin.print();
       
        popupWin.document.close();
            }
 </script>




<div id="divToPrintercat" style="display:none;">
<!--print content--->

 <div style="width:100%;height:100%;background-color:white;">
 	<h3>Category Log Record</h3>
 	<br>
 	<hr>
 	 <style>
table { 
	width:100%; 
	border-collapse: collapse; 
	margin:50px auto;
	}

/* Zebra striping */
tr:nth-of-type(odd) { 
	background: #eee; 
	}

th { 
	background: rgb(52, 152, 219); 
	color: black; 
	font-weight: bold; 
	}

td, th { 
	padding: 7px; 
	border: 1px solid #ccc; 
	text-align: center; 
	font-size: 13px;
	}
</style>
   <table class="table" >
  <thead>
    <tr>
      <th scope="col">Type</th>
     
      <th scope="col">Details</th>
      <th scope="col">Date&Time</th>
    </tr>
  </thead>
  <tbody>
        	<?php
        	$sql = " select * from logs where section = 'category'  ";
                $result = mysqli_query($con,$sql); // run query
                $count= mysqli_num_rows($result); // to count if necessary
               //  $get_id =  mysqli_insert_id($con); // this code gets the newly inserted id . if insert is the action
             if ($count>=1){
                 //while($row = mysqli_fetch_array($result)){} is where we output all the data in database
                 while($row = mysqli_fetch_array($result)){
                    ?>
                    <tr>
                     <td><span style="font-weight:bolder"><?php echo $row['type']?></span></td>
                    
                     <td><?php echo $row['details']?></td>
                     <td><?php echo $row['datetimelog']?></td>
                    </tr>
                    <?php
                 }
          }
          
          
    ?>
  </tbody>
</table>


  </div>
</div>
        	  <table class="table table-sm" id="table_cat">
  <thead>
    <tr>
      <th scope="col">Type</th>
     
      <th scope="col">Details</th>
      <th scope="col">Date&Time</th>
    </tr>
  </thead>
  <tbody>
        	<?php
        	$sql = " select * from logs where section = 'category'  ";
                $result = mysqli_query($con,$sql); // run query
                $count= mysqli_num_rows($result); // to count if necessary
               //  $get_id =  mysqli_insert_id($con); // this code gets the newly inserted id . if insert is the action
             if ($count>=1){
                 //while($row = mysqli_fetch_array($result)){} is where we output all the data in database
                 while($row = mysqli_fetch_array($result)){
                    ?>
                    <tr>
                     <td><span style="font-weight:bolder"><?php echo $row['type']?></span></td>
                    
                     <td><?php echo $row['details']?></td>
                     <td><?php echo $row['datetimelog']?></td>
                    </tr>
                    <?php
                 }
          }
          
          
    ?>
  </tbody>
</table>
<script>
         $(document).ready(function() {
  //# for id , . for classes
      $('#table_cat').DataTable();

         }); 
           
    </script>
<button type="button" value="print" onclick="PrintDivcat()" class="btn btn-light" style="width:150;float:right">
  Print Category logs <i class="fas fa-print"></i>
  </button>
          <?php
    }
}

?>