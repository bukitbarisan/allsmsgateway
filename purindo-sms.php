<?php
$nomor = file_get_contents("nomor.txt");
$pisah = explode("\n", $nomor);

foreach($pisah as $no){
	$token = "your_token";
	$passkey = "your_passkey";
	$message =
	'TESTIS';
	$fields = array(
		'token'=>$token,
		'aksi'=>'1',
 		'pesan'=> $message,
 		'hp'=>$no,
 		'passkey'=> $passkey,
 	);
 	$ch = curl_init();
 	$postvars = json_encode($fields);
	$url = "http://purindo.net/api/sms.php";
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_TIMEOUT, 100);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $postvars);
	$result = curl_exec($ch);
	$a = json_decode($result);
	$b = $a->result;
	$c = $a->message;
	if($b == "success"){
		echo "SUKSES - $no\n";
		sleep(5);
	}else{
		echo "GAGAL - $no\n";
		sleep(1);
	}
}
?>
