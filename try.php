<?php
function itexmo($number,$message,$apicode,$passwd){
			$ch = curl_init();
			$itexmo = array('1' => $number, '2' => $message, '3' => $apicode, 'passwd' => $passwd);
			curl_setopt($ch, CURLOPT_URL,"https://www.itexmo.com/php_api/api.php");
			curl_setopt($ch, CURLOPT_POST, 1);
			 curl_setopt($ch, CURLOPT_POSTFIELDS, 
			          http_build_query($itexmo));
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			return curl_exec ($ch);
			curl_close ($ch);
}
 $message1 = "Your Verification code is :asd " ;
 
 
  //itexmo('09557653775',$message1,'TR-INCID721287_QU1NB','lb552xzk21');
  itexmo('09638304913','Your Verification code is : sadasd','TR-HANTE304913_N6VGH','b{!b@m#an@');
?>