<?php
include '../administrator/connection/connect.php';
 if(isset($_POST['btnsub'])) {
                               $reason = $_POST['reason'];
                                 $track = $_POST['track_id'];
                                
                                  $update = "UPDATE `trans_record` SET `cancelationreason` = '$reason',`forcod` = 'cancelled' , `status`='cancelled' WHERE track_id = '$track' ";  
                                    $resultupdate = mysqli_query($con,$update); // run query 
                                    
                                    if ($resultupdate) {
                                   ?>
                                 <script>window.location.href='https://hantechdesign.com/orders/orders.php?codtab&Topaytab&ordercancelled'</script>
                                 <?php   
                                    }
                                    
                                     ?>
                                     <style>
                                         #loader {
    	background-image: linear-gradient(to top, #deded6 , #c8c6a7, #c8c6a7);
    	background-repeat:no-repeat;
    	background-size:100% 100%;
  position: absolute;
  left: 50%;
  top: 50%;
  z-index: 1;
  width: 120px;
  height: 120px;
  margin: -76px 0 0 -76px;
  border: 16px solid #f3f3f3;
  border-radius: 50%;
  border-top: 16px solid #3498db;
  -webkit-animation: spin 2s linear infinite;
  animation: spin 2s linear infinite;
}
@-webkit-keyframes spin {
  0% { -webkit-transform: rotate(0deg); }
  100% { -webkit-transform: rotate(360deg); }
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}

/* Add animation to "page content" */
.animate-bottom {
  position: relative;
  -webkit-animation-name: animatebottom;
  -webkit-animation-duration: 1s;
  animation-name: animatebottom;
  animation-duration: 1s
}

@-webkit-keyframes animatebottom {
  from { bottom:-100px; opacity:0 } 
  to { bottom:0px; opacity:1 }
}

@keyframes animatebottom { 
  from{ bottom:-100px; opacity:0 } 
  to{ bottom:0; opacity:1 }
}

#myDiv {
  display: none;
  text-align: center;
}
                                     </style>
                                     <link rel="stylesheet" type="text/css" href="../css/homepage.css?v=3150" />
                                     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />
                                   <body onload="myFunction()" style="margin:0;">

<div id="loader"></div>
 <script>window.location.href='https://hantechdesign.com/orders/orders.php?codtab&Topaytab&ordercancelled'</script>
</body>
                                
                                 <?php 
                                 
 }
 else if (isset($_POST['btnsubship'])) {
            $reason = $_POST['reason'];
                                 $track = $_POST['track_id'];
                                
                                  $update = "UPDATE `trans_record` SET `cancelationreason` = '$reason',`forcod` = 'cancelled' , `status`='cancelled' WHERE track_id = '$track' ";  
                                    $resultupdate = mysqli_query($con,$update); // run query 
                                    
                                    if ($resultupdate) {
                                   ?>
                                 <script>window.location.href='https://hantechdesign.com/orders/orders.php?codtab&Toshiptab&ordercancelled'</script>
                                 <?php   
                                    }
                                    
                                     ?>
                                     <style>
                                         #loader {
    	background-image: linear-gradient(to top, #deded6 , #c8c6a7, #c8c6a7);
    	background-repeat:no-repeat;
    	background-size:100% 100%;
  position: absolute;
  left: 50%;
  top: 50%;
  z-index: 1;
  width: 120px;
  height: 120px;
  margin: -76px 0 0 -76px;
  border: 16px solid #f3f3f3;
  border-radius: 50%;
  border-top: 16px solid #3498db;
  -webkit-animation: spin 2s linear infinite;
  animation: spin 2s linear infinite;
}
@-webkit-keyframes spin {
  0% { -webkit-transform: rotate(0deg); }
  100% { -webkit-transform: rotate(360deg); }
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}

/* Add animation to "page content" */
.animate-bottom {
  position: relative;
  -webkit-animation-name: animatebottom;
  -webkit-animation-duration: 1s;
  animation-name: animatebottom;
  animation-duration: 1s
}

@-webkit-keyframes animatebottom {
  from { bottom:-100px; opacity:0 } 
  to { bottom:0px; opacity:1 }
}

@keyframes animatebottom { 
  from{ bottom:-100px; opacity:0 } 
  to{ bottom:0; opacity:1 }
}

#myDiv {
  display: none;
  text-align: center;
}
                                     </style>
                                     <link rel="stylesheet" type="text/css" href="../css/homepage.css?v=3150" />
                                     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />
                                   <body onload="myFunction()" style="margin:0;">

<div id="loader"></div>
 
</body>
                                
                                 <?php 
 }else if (isset($_POST['rece'])) {
     date_default_timezone_set('Asia/Manila');
$datenow = date('Y-m-d');
          
                                 $track = $_POST['track_id'];
                                    $update = "UPDATE `trans_record` SET `forcod` = 'completed' ,`datecompleted`='$datenow', `status`='completed' WHERE  track_id = '$track' ";
                            $resultupdate = mysqli_query($con,$update); // run query
                            
                            if($resultupdate) {
                                ?>
                                 <script>window.location.href='https://hantechdesign.com/orders/orders.php?codtab&Toreceivetab'</script>
                                 <?php   
                                    }
                                    
                                     ?>
                                     <style>
                                         #loader {
    	background-image: linear-gradient(to top, #deded6 , #c8c6a7, #c8c6a7);
    	background-repeat:no-repeat;
    	background-size:100% 100%;
  position: absolute;
  left: 50%;
  top: 50%;
  z-index: 1;
  width: 120px;
  height: 120px;
  margin: -76px 0 0 -76px;
  border: 16px solid #f3f3f3;
  border-radius: 50%;
  border-top: 16px solid #3498db;
  -webkit-animation: spin 2s linear infinite;
  animation: spin 2s linear infinite;
}
@-webkit-keyframes spin {
  0% { -webkit-transform: rotate(0deg); }
  100% { -webkit-transform: rotate(360deg); }
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}

/* Add animation to "page content" */
.animate-bottom {
  position: relative;
  -webkit-animation-name: animatebottom;
  -webkit-animation-duration: 1s;
  animation-name: animatebottom;
  animation-duration: 1s
}

@-webkit-keyframes animatebottom {
  from { bottom:-100px; opacity:0 } 
  to { bottom:0px; opacity:1 }
}

@keyframes animatebottom { 
  from{ bottom:-100px; opacity:0 } 
  to{ bottom:0; opacity:1 }
}

#myDiv {
  display: none;
  text-align: center;
}
                                     </style>
                                     <link rel="stylesheet" type="text/css" href="../css/homepage.css?v=3150" />
                                     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />
                                   <body onload="myFunction()" style="margin:0;">

<div id="loader"></div>
 
</body>
                                
                                 <?php 
                            }
                                 
 

?>