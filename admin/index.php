<?php
session_start();
if(isset($_SESSION["users_id"])){
  header("location:dashboard.php");
}

?> 
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortout icon" type="image/x-icon"  href="http://www.xiconeditor.com/GetIcon.ashx?R=579a8b6e-6009-4906-93aa-52d6edcca110">
    <!-- Bootstrap CSS -->
   <script src="https://kit.fontawesome.com/129b086bc9.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
 <script src="ajax.js"></script>
<link rel="stylesheet" type="text/css" href="css/style.css">
    <title>Admin-Login</title>
    <style type="text/css">
      .panel-body {
  height: 580px;

  

}
    </style>
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Amatic+SC&display=swap" rel="stylesheet">
     <?php 
      include "connection/connect.php";
     ?>
  </head>
  <body style=" background-image: url('https://images.pexels.com/photos/34577/pexels-photo.jpg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940');background-repeat: no-repeat;
  background-size: cover" >

      <div class="container">
        <div class="row">
          <br><br>
          
        </div>
          <div class="row">
                    
              <div class="col-sm-4 "></div>
              <div class="col-sm-4">
                  <div class="panel panel-default" style="box-shadow: 0 5px 5px 4px rgba(10,0,0,.5);border-radius: 10px; background-color: #FDFEFE">
                   <div class="panel-body">
                            <div class="container"> 
                             
                <h4 style="text-align: center; font-family: copperplate gothic; font-weight: lighter;cursor: default; "><br><i class="fas fa-key"></i><br><br>Hantech</h4> <h6 style="text-align: center; font-family: centaur; font-weight: lighter">Administrative Login</h6>
                
                 <h6 style='font-family:agency fb; letter-spacing:5px ; visibility: hidden;cursor: default;text-align: center' id="loading"><span style='font-size:20px' ><i class='fas fa-spinner fa-spin'></span></i>  Access Granted...</h6>
                <style type="text/css">
                  input {
                    font-family: century gothic;
                  }
                </style>
               <?php 
if(isset($_POST['txtpass'])){
   
    $email= $_POST['txtuser'];   
   $password= $_POST['txtpass']; 
               $emailValidation = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9]+(\.[a-z]{2,4})$/";
        if (!preg_match($emailValidation,$email)){
                   echo "retard";
                exit();
                   } else { 
            
            $securepass= md5($password);
  $connect = mysqli_connect("localhost","i7685129_wp1","Reenjay17","i7685129_wp1");
           
            $sql = " select * from admin_account where email = '$email' and  password = '$securepass' ";
            $query = mysqli_query($connect,$sql);
                $count= mysqli_num_rows($query);
            if ($count==1){
                while($row = mysqli_fetch_array($query)){
                $_SESSION["users_id"] = $row["admin_id"];
                $_SESSION["names"] = $row["aname"];
                 $_SESSION["branchid"] = $row["branch_id"];
                  $_SESSION["emails"] = $row["email"];
              
           
                  ?>
                   
                  
                         <style >
                             .display-none {
                                 display:none;
                             }
                         </style>
                          <h6 id="spin" style="text-align:center;font-family: 'Roboto Condensed', sans-serif;">Verifying Login <i class="fas fa-spinner fa-pulse"></i></h6>
                            <h6 id="spine" class="display-none" style="text-align:center;color:black;background-color:#00ff00;padding:5px;font-family: 'Roboto Condensed', sans-serif;">Access Granted <i class="fas fa-check"></i></h6>
                           <script>
                               
                          
                           setInterval(function(){ 
                               document.getElementById('spin').classList.add('display-none');
                                 document.getElementById('spine').classList.remove('display-none');
                                
                           }, 2000);
                            setInterval(function(){ 
                            window.location.href="index.php";
                           
                            
                           }, 2900);
                           </script>
                    
                
                  <?php
                
                }
            } else {
                 ?>
                
               
                         <style >
                             .display-none {
                                 display:none;
                             }
                         </style>
                          <h6 id="spin" style="text-align:center;font-family: 'Rajdhani', sans-serif;font-family: 'Roboto Condensed', sans-serif;">Verifying Login <i class="fas fa-spinner fa-pulse"></i></h6>
                            <h6 id="spine" class="display-none" style="text-align:center;color:white;background-color:#ff0000;padding:5px;font-family: 'Roboto Condensed', sans-serif;">Access Denied <i class="fas fa-times"></i> <br>Unidentified Credentials<i class="fa fa-ban" aria-hidden="true"></i></h6>
                           
                           
                           <script>
                           
                          
                           setInterval(function(){ 
                               document.getElementById('spin').classList.add('display-none');
                                 document.getElementById('spine').classList.remove('display-none');
                                 
                           }, 1000);
                            setInterval(function(){ 
                             window.location.href="index.php";
                                 
                           }, 1500);
                           </script>
                    
                  
                  <?php
            }
      
      
  
       
    }
          
                       
                   
     
 }


             ?>
                
              
                
                
                 <form method="post" >
                
                <h4 style="color:grey"><i class="fas fa-user"></i><span style="font-size:15px;font-family: century gothic;cursor: default;" >Email</span></h4>
                <input id="txtuserss" type="Email" name="txtuser" class="form-control" required="" placeholder="Enter Email address"  >
                  
                <br>
                <h4 style="color:grey"><i class="fas fa-lock"></i><span style="font-size:15px;font-family: century gothic;cursor: default;">Password</span></h4>
                <input id="txtpassss" type="password" name="txtpass" class="form-control" required="" placeholder="Enter Password"><br>
  <div class="form-group">
                                                <div class="custom-control custom-checkbox"><input class="custom-control-input" id="rememberPasswordCheck" type="checkbox" checked="true" /><label class="custom-control-label" style="font-family: century gothic;font-weight: lighter;color:grey" for="rememberPasswordCheck">Remember password</label></div>
                                            </div>
                <br>

                <input type="submit" name="btnlogin" id="btnlogin" value="Login" class="form-control btn btn-info" style="height:50px;font-family: century gothic">
                  <a href="#"  style="font-weight: lighter; font-family: centaur;font-size:17px;text-align: center;text-decoration: none ; float:right" data-toggle="modal" data-target="#exampleModal"> Register</a> 
                  <br><br>
                </form>
                <a href="https://hantechdesign.com" target="_blank" style="font-weight: lighter; font-family: centaur;font-size:15px;text-align: center;text-decoration: none">hantechdesign.com</a>


             

              <!-- Button trigger modal -->
                 
                  
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    
      <div class="modal-body">
                  <div class="container">
                    <form action="index.php" name="myform" method="post">
                        <h5>Enter Administrator Access Code  <i class="fas fa-key"></i></h5>
                          <br>
                        <input type="password"  class="form" name="accesscode"  placeholder="✪✪✪✪✪✪" required>
                        <input type="submit" class="btn btn-success" name="btnaccess">
                      
                    </form>
                
                  </div>
      </div>
      <div class="modal-footer">
      <button type="button" class="btn btn-danger" data-dismiss="modal" >Close</button>
       
       
      </div>
    </div>
  </div>
</div>
              </div> 

                        </div>

                  </div>

                  <!--modal-->
                <?php 
                  if(isset($_POST['btnaccess'])){ 
                    $accesscode = $_POST['accesscode'];
                    
                    $sql = " select * from administrator where password = '$accesscode'  ";
                    $query = mysqli_query($con,$sql);
                        $count= mysqli_num_rows($query);
                    if ($count==1){
                        while($row = mysqli_fetch_array($query)){
                          
                          
                            echo '
                              <script>window.location.href="register.php"; </script>
                            ';
                   
                           
                        
                        } 

                  }else {
                    echo '
                    <script>alert ("INVALID ACCESS CODE.");
                    window.location.href="index.php"; </script>
                    
                  ';
                  
                }
                }else
                 if(isset($_POST['btnaccesscodenew'])){  

                   $accesscodes = $_POST['accesscodes'];
                    
                    $sql = " select * from administrator where password = '$accesscodes'  ";
                    $query = mysqli_query($con,$sql);
                        $count= mysqli_num_rows($query);
                    if ($count==1){
                        while($row = mysqli_fetch_array($query)){
                          
                          
                            echo '
                              <script>window.location.href="reg_process.php?newbranch"; </script>
                            ';
                   
                           
                        
                        } 

                  }else {
                    echo '
                    <script>alert ("INVALID ACCESS CODE.");
                    window.location.href="register.php"; </script>
                    
                  ';
                  
                }

                 }
               

                ?>

    <!-- Button trigger modal -->
          <!-- Button trigger modal -->
              
<!-- Modal -->

 
    <!--end-->

              </div>
               <div class="col-sm-4"></div>

          </div>
      </div>
          
   
  </body>
</html>

  