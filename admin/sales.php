<?php
session_start();
if(!isset($_SESSION['users_id'])) {
header('location:index.php');

}

 include 'includes/header.php';?>
  
  
  <div class="page-wrapper chiller-theme toggled">
  
  <?php include 'includes/sidebar.php';

include 'connection/connect.ph';
  ?>
  



  <!-- sidebar-wrapper  -->
  <main class="page-content">
    <div class="container-fluid">
      <h2 style="font-family: 'Jost', sans-serif;letter-spacing: 5px;">SALES</h2>
      <hr>
     
      
      <script>
      
      </script>
      <div class="row">
         <div class="card">
          <p></p>
                <div class="container">
                    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Year', 'Sales'],
          <?php 
              $sql = " select * from  trans_record  ";
                $result = mysqli_query($con,$sql); // run query
              
               //while($row = mysqli_fetch_array($result)){} is where we output all the data in database
                 while($row = mysqli_fetch_array($result)){
                   ?> ['<?php echo $row['datecompleted']?>', <?php echo $row['total']?>],   <?php         
                 }
          
          ?>
         
         
        ]);

        var options = {
          title: 'Sales Line Graph',
          hAxis: {title: 'Daily Sales',  titleTextStyle: {color: 'blue'}},
          vAxis: {minValue: 0}
        };

        var chart = new google.visualization.AreaChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }
    </script>
      <div id="chart_div" style="width: 100%; height: 500px;"></div>
      
      <p></p>
      <hr>
     
      <h4>Sales As of :  <?php 
      date_default_timezone_set('Asia/Manila');
       $datenow = date('Y-m-d');
       $years =date('Y');
       $months = date('m');
       $days = date('d');
      
       echo date("F jS, Y", strtotime($datenow));
      ?></h4>
   
<div class="row">
                  <h5 style="font-weight:bold">Summary Report</h5>
                     
                   


                  
                 <div class="col-sm-2">
                     <h5 style="">Monthly</h5>

<div class="dropdown">
  <button class="btn btn-light dropdown-toggle" style="font-size:15px" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
   Select Month
  </button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
    <a class="dropdown-item" href="sales.php?arrangebymonth&p=01&mm=January&#Sortof">January</a>
    <a class="dropdown-item" href="sales.php?arrangebymonth&p=02&mm=February&#Sortof">February</a>
    <a class="dropdown-item" href="sales.php?arrangebymonth&p=03&mm=March&#Sortof">March</a>
    <a class="dropdown-item" href="sales.php?arrangebymonth&p=04&mm=April&#Sortof">April</a>
    <a class="dropdown-item" href="sales.php?arrangebymonth&p=05&mm=May&#Sortof">May</a>
    <a class="dropdown-item" href="sales.php?arrangebymonth&p=06&mm=June&#Sortof">June</a>
    <a class="dropdown-item" href="sales.php?arrangebymonth&p=07&mm=July&#Sortof">July</a>
    <a class="dropdown-item" href="sales.php?arrangebymonth&p=08&mm=August&#Sortof">August</a>
    <a class="dropdown-item" href="sales.php?arrangebymonth&p=09&mm=September&#Sortof">September</a>
    <a class="dropdown-item" href="sales.php?arrangebymonth&p=10&mm=October&#Sortof">October</a>
    <a class="dropdown-item" href="sales.php?arrangebymonth&p=11&mm=November&#Sortof">November</a>
    <a class="dropdown-item" href="sales.php?arrangebymonth&p=12&mm=December&#Sortof">December</a>
  </div>
</div>
<p></p>
    <a href="sales.php#Sortof" class="btn btn-light">Refresh <i class="fas fa-sync"></i></a>
                 </div> 
                 
              
                  <div class="col-sm-2">
                     <h5 style="">Yearly</h5>

<div class="dropdown">
  <button class="btn btn-light dropdown-toggle" style="font-size:15px" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
   Select Year
  </button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
    <a class="dropdown-item" href="sales.php?arrangeby&p=01&mm=2021&#Sortof">2021</a>
    <a class="dropdown-item" href="sales.php?arrangeby&p=02&mm=2022&#Sortof">2022</a>
    <a class="dropdown-item" href="sales.php?arrangeby&p=03&mm=2023&#Sortof">2023</a>
    <a class="dropdown-item" href="sales.php?arrangeby&p=04&mm=2024&#Sortof">2024</a>
    <a class="dropdown-item" href="sales.php?arrangeby&p=05&mm=2025&#Sortof">2025</a>
    <a class="dropdown-item" href="sales.php?arrangeby&p=06&mm=2026&#Sortof">2026</a>
    <a class="dropdown-item" href="sales.php?arrangeby&p=07&mm=2027&#Sortof">2027</a>
    <a class="dropdown-item" href="sales.php?arrangeby&p=08&mm=2028&#Sortof">2028</a>
    <a class="dropdown-item" href="sales.php?arrangeby&p=09&mm=2029&#Sortof">2029</a>
    <a class="dropdown-item" href="sales.php?arrangeby&p=10&mm=2030&#Sortof">2030</a>
    <a class="dropdown-item" href="sales.php?arrangeby&p=11&mm=2031&#Sortof">2031</a>
    <a class="dropdown-item" href="sales.php?arrangeby&p=12&mm=2032&#Sortof">2032</a>
  </div>
</div>

                 </div> 
           <div class="col-sm-8">
               <div class="card">
                   <div class="container">
                       <p></p>
                        <h5 style="text-align:center">Date Range</h5>
                  <form method="get" >
                      <h6>From <input type="date" name="datebegin" style="width:40%"  required> To <input type="date" name="dateend" style="width:40%"  required> </h6>
                      
                    
                     <button type="submit"  name="sortby" value="#Sortof" class="form-control">Sort</button>
                      
                  </form>
                   </div>
                  <p></p>
               </div>
                       
                  </div>
                 
                 
              </div>
              
             

      <p id="Sortof"></p>
      <table class="table " id="table_id">
  <thead class="thead-dark" >
    <tr>
      <th scope="col">Product_code</th>
       <th scope="col">Date-Completed</th>
      <th scope="col">Qty</th>
      <th scope="col">Total</th>
     
    </tr>
  </thead>
  <tbody id="salesdata">
       <?php 
            if(isset($_GET['sortby'])) {
                   $begin = $_GET['datebegin'];
                   $end = $_GET['dateend'];
                    echo '<h5 style="color:#676dba" >From <span style="font-weight:bolder">'.date("F jS, Y", strtotime($begin)).' </span> To <span style="font-weight:bolder"> '.date("F jS, Y", strtotime($end)).'</span></h5>';
                    
                             date_default_timezone_set('Asia/Manila');
       $datenow = date('Y-m-d');
        	$sql = " select * from trans_record where status = 'completed' and 	datecompleted between '$begin' and '$end'   ";
	                $result = mysqli_query($con,$sql); // run query
	             
	                $totalsales =0;
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
    	                          <td><?php echo date("F jS, Y", strtotime($row['datecompleted'])) ?></td>
    	                         <td><?php echo $row['quantity']?></td>
    	                         <td>  ₱<?php echo $row['total']?></td>
	                     </tr>
	                     <?php
	                     $totalsales += $row['total'];
	                 } 
                    
            }else
            if(isset($_GET['arrangebymonth'])) {
                    $mno = $_GET['p'];
                    $month = $_GET['mm'];
                    echo '<h5 style="color:#676dba" >For the Month of  <span style="font-weight:bold">'.$month.'</span></h5>';
                    
                             date_default_timezone_set('Asia/Manila');
       $datenow = date('Y-m-d');
        	$sql = " select * from trans_record where status = 'completed' and 	MONTH(datecompleted) = '$mno';   ";
	                $result = mysqli_query($con,$sql); // run query
	             
	                $totalsales =0;
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
    	                          <td><?php echo date("F jS, Y", strtotime($row['datecompleted'])) ?></td>
    	                         <td><?php echo $row['quantity']?></td>
    	                         <td>  ₱<?php echo $row['total']?></td>
	                     </tr>
	                     <?php
	                     $totalsales += $row['total'];
	                 } 
                    
            }
            
            else  if(isset($_GET['arrangeby'])) {
                    $mno = $_GET['p'];
                    $month = $_GET['mm'];
                    echo '<h5 style="color:#676dba" >For the Year  <span style="font-weight:bold">'.$month.'</span></h5>';
                    
                             date_default_timezone_set('Asia/Manila');
       $datenow = date('Y-m-d');
        	$sql = " select * from trans_record where status = 'completed' and 	YEAR(datecompleted) = '$month';   ";
	                $result = mysqli_query($con,$sql); // run query
	             
	                $totalsales =0;
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
    	                           <td><?php echo date("F jS, Y", strtotime($row['datecompleted'])) ?></td>
    	                         <td><?php echo $row['quantity']?></td>
    	                         <td>  ₱<?php echo $row['total']?></td>
	                     </tr>
	                     <?php
	                     $totalsales += $row['total'];
	                 } 
                    
            }
            
            else {
               
                date_default_timezone_set('Asia/Manila');
       $datenow = date('Y-m-d');
        	$sql = " select * from trans_record where status = 'completed' and 	datecompleted >=  '$datenow'   ";
	                $result = mysqli_query($con,$sql); // run query
	             
	                $totalsales =0;
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
    	                          <td><?php echo date("F jS, Y", strtotime($row['datecompleted'])) ?></td>
    	                         <td><?php echo $row['quantity']?></td>
    	                         <td>  ₱<?php echo $row['total']?></td>
	                     </tr>
	                     <?php
	                     $totalsales += $row['total'];
	                 } 
	        
            }
	       
	              
       ?> 
  </tbody>
</table>
        <h5>A total Sales of Today is :<span style="font-size:24px;font-weight:bolder;color:#9f9404"> ₱ <?php echo $totalsales?></span></h5>
                </div>
                
                <p><br></p>
                <hr>
                <div class="row">
                    <div class="container">
                        
                            <p><br></p>
                             <div class="card">
                                <div class="card-header"><button class="btn btn-danger" style="font-size:13px;float:right">Delete All sales</button><h6 style="font-weight:bolder">All Sales records</h6> </div>
                                <div class="container">
                                    <table class="table table-striped" id="table_ids">
                                          <thead>
                                           <tr>
                                              <th scope="col">Product_code</th>
                                               <th scope="col">Date-Completed</th>
                                              <th scope="col">Qty</th>
                                              <th scope="col">Total</th>
                                             
                                            </tr>
                                          </thead>
                                          <tbody>
                                          <?php 
     
	       
                	              date_default_timezone_set('Asia/Manila');
                       $datenow = date('Y-m-d');
                        	$sql = " select * from trans_record where status = 'completed' order by datecompleted desc   ";
                	                $result = mysqli_query($con,$sql); // run query
                	             
                	                $totalsaless =0;
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
                    	                           <td><?php echo date("F jS, Y", strtotime($row['datecompleted'])) ?></td>
                    	                         <td><?php echo $row['quantity']?></td>
                    	                         <td>  ₱<?php echo $row['total']?></td>
                	                     </tr>
                	                     <?php
                	                     $totalsaless += $row['total'];
                	                 } 
                	        
                       ?> 
                                          </tbody>
                                        </table>
                                        <h5 style="float:right;margin-right:20px">A total of :<span style="font-size:24px;font-weight:bolder;color:#9f9404"> ₱ <?php echo $totalsaless?></span></h5>
                                </div>
                            </div>
                    </div>
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

 <script>
   $(document).ready(function() {

    $('.clicksessionadd').click(function() { 
        <?php
        $_SESSION['addnew']='addnewuser';
        ?>
    })

     $('.clicksessionedit').click(function() { 
        <?php
        $_SESSION['edit']='edit';
        ?>
    })
      $('.clicksessiondelete').click(function() { 
        <?php

        $_SESSION['delete']='delete';
        ?>
    })
  
 
 });      
     
 </script>
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