<?php
function itexmo($number,$message,$apicode,$passwd){
		$url = 'https://www.itexmo.com/php_api/api.php';
		$itexmo = array('1' => $number, '2' => $message, '3' => $apicode, 'passwd' => $passwd);
		$param = array(
			'http' => array(
				'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
				'method'  => 'POST',
				'content' => http_build_query($itexmo),
			),
		);
		$context  = stream_context_create($param);
		return file_get_contents($url, false, $context);
}
/*  
Ireport Datas 
apicode : TR-REENJ653775_556NA
password : uib[d]wv}g

Hantech
apicode : TR-HANTE304913_N6VGH
password :  b{!b@m#an@
*/
if (isset($_POST['sendvcode'])) {
    $number = $_POST['contact'];
    $code = $_POST['code'];
    itexmo($number,'Hi , This is your verification code $code ','TR-HANTE304913_N6VGH',' b{!b@m#an@');
}


?>