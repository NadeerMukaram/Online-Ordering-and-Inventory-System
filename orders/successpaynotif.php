<?php 
session_start();
if(isset($_SESSION['access_token'])){
  if(isset($_GET['successpaid'])) {
    ?>
    <!DOCTYPE html>
<html>
<head>
    <link rel="icon" href="../img/tabicon.png" type="image/gif" sizes="16x16">
    <link rel="stylesheet" type="text/css" href="../css/homepage.css" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
    	background-image: linear-gradient(to top, #deded6 , #c8c6a7, #c8c6a7);
    	background-repeat:no-repeat;
    	background-size:100% 100%;
}
/* Center the loader */
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
i {
   margin-top:100px;  
   font-size:80px;
   color:white;
}

h1 {
   
}
</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />
</head>
<body onload="myFunction()" style="margin:0;">

<div id="loader"></div>

<div style="display:none;" id="myDiv" class="animate-bottom">
                             <i style="" class='fas fa-check-circle'></i>
     <h1>Transaction  Completed. <br>thankyou!</h1> <br>
        <h4> To see the status of your Order Click <a href="../orders/orders.php">HERE</a>  <br> <br>To make some more orders click  <a href="../category">HERE</a></h4>
    
 
</div>

<script>
var myVar;

function myFunction() {
  myVar = setTimeout(showPage, 2000);
}

function showPage() {
  document.getElementById("loader").style.display = "none";
  document.getElementById("myDiv").style.display = "block";
}
</script>

</body>
</html>
      
    <?php
}    

}else if(isset($_SESSION['user_id'])){
   if(isset($_GET['successpaid'])) {
    ?>
    <!DOCTYPE html>
<html>
<head>
    <link rel="icon" href="../img/tabicon.png" type="image/gif" sizes="16x16">
    <link rel="stylesheet" type="text/css" href="../css/homepage.css" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
    	background-image: linear-gradient(to top, #deded6 , #c8c6a7, #c8c6a7);
    	background-repeat:no-repeat;
    	background-size:100% 100%;
}
/* Center the loader */
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
i {
   margin-top:100px;  
   font-size:80px;
   color:white;
}

h1 {
   
}
</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />
</head>
<body onload="myFunction()" style="margin:0;">

<div id="loader"></div>

<div style="display:none;" id="myDiv" class="animate-bottom">
                             <i style="" class='fas fa-check-circle'></i>
     <h1>Transaction  Completed. <br>thankyou!</h1> <br>
        <h4> To see the status of your Order Click <a href="../orders/orders.php">HERE</a>  <br> <br>To make some more orders click  <a href="../category">HERE</a></h4>
    
 
</div>

<script>
var myVar;

function myFunction() {
  myVar = setTimeout(showPage, 2000);
}

function showPage() {
  document.getElementById("loader").style.display = "none";
  document.getElementById("myDiv").style.display = "block";
}
</script>

</body>
</html>
      
    <?php
}   
}else {
   ?>
  <script>window.location.href="https://hantechdesign.com/home";</script>
  <?php 
}



?>