<?php
	require_once "config.php";
    
	if (isset($_SESSION['access_token']))
		$gClient->setAccessToken($_SESSION['access_token']);
	else if (isset($_GET['code'])) {
		$token = $gClient->fetchAccessTokenWithAuthCode($_GET['code']);
		$_SESSION['access_token'] = $token;
	} else {
		header('Location: https://hantechdesign.com/');
		exit();
	}

	$oAuth = new Google_Service_Oauth2($gClient);
	$userData = $oAuth->userinfo_v2_me->get();

	$_SESSION['id'] = $userData['id'];
	$_SESSION['email'] = $userData['email'];
	$_SESSION['gender'] = $userData['gender'];
	$_SESSION['picture'] = $userData['picture'];
	$_SESSION['familyName'] = $userData['familyName'];
	$_SESSION['givenName'] = $userData['givenName'];

    $usermail = $userData['email'];
    $name = $userData['givenName'];
    $surname = $userData['familyName']; 
    include '../administrator/connection/connect.php';
    
                                 $sql = " select * from user_account where email = '$usermail' and logintype = 'gmail'  ";
					                $result = mysqli_query($con,$sql); // run query
					                $count= mysqli_num_rows($result); // to count if necessary
					             if ($count==1){
					                 
					                   ?>
	  <script>window.location.href="../Mail/welcomeback.php?send&email=<?php echo $usermail?>&name=<?php echo $name?>"</script>
							                    <?php
					             //	header('Location:https://hantechdesign.com/');
	                                    exit();	
					             	
					          }else {
					                 date_default_timezone_set('Asia/Manila');
                                        $datenow = date('Y/m/d');
					              
									$sql = " INSERT INTO `user_account`(`uname`, `surname`, `logintype`, `email`,`datejoined`) VALUES ('$name','$surname','gmail','$usermail',' $datenow')  ";
							                $result = mysqli_query($con,$sql); // run query
							                
							               if ($result) {
							                  
							                
                                           
                                               
							                    ?>
	  <script>window.location.href="../Mail/index.php?send&email=<?php echo $usermail?>&name=<?php echo $name?>"</script>
							                    <?php
							                
							               }
							          
					          }
    
    

?>