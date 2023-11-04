<?php
session_start();
include 'connection/connect.php';

  if(isset($_POST['savepromo'])) {
      $damount = $_POST['txtamount'];
      $valid = $_POST['txtdate'];
     
      for ($s = '', $i = 0, $z = strlen($a = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789')-1; $i != 6; $x = rand(0,$z), $s .= $a{$x}, $i++); 
 date_default_timezone_set('Asia/Manila');
	              $datenows= date('Y-m-d H:i:s');
	              $dateonly = date('Y-m-d');
	              $log = "INSERT INTO `logs`(`type`,`section`,`details`, `datelog`, `datetimelog`) VALUES ('Adding new Promocode','pcode','Added promocode , discount : $damount','$dateonly','$datenows')";
	              $savelog = mysqli_query($con,$log);
                $sql = " INSERT INTO `promocodes`(`code`, `discount`,`validity`) VALUES ('$s','$damount','$valid')  ";
                $result = mysqli_query($con,$sql); // run query
               
           if($result) {
           
                $_SESSION['success'] = '  <div class="alert alert-success " id="alerto" role="alert" style="float:right;width:auto;font-size: 14px;cursor: default;">
		Promocode Saved Successfully !
																										                      </div>
																										                    <script type="text/javascript">
																										                       setInterval(function(){
																										                        document.getElementById("alerto").classList.add("d-none");
																										                       },4000)    
																										                      </script>';
																										                      header('location:pcode.php');
               
           }
                
            
  }

?>