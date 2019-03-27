<?php
$nomor = file_get_contents("nomor.txt");
$pisah = explode("\n", $nomor);

foreach($pisah as $no){
	$pesan = "TESTIS DARI TWILLO API - IANSANGAJI";

	$cpt = curl_init("https://api.twilio.com/2010-04-01/Accounts/youruserapi/Messages.json");
	curl_setopt_array($cpt, [
    	CURLOPT_RETURNTRANSFER => 1,
    	CURLOPT_USERPWD => 'youruserapi:youruserapi_key',
    	CURLOPT_POSTFIELDS => 'Format=json&AccountSid=youruserapi&To=%2B'.$no.'&From=%2B12028166325&Body='.$pesan.'&Method=post&Location=%2F2010-04-01%2FAccounts%2Fyouruserapi%2FMessages.json&__referrer=sms-mms',
	]);
	$result = curl_exec($cpt);
	$a = json_decode($result);
	$b = $a->status;
	if($b == "queued"){
		echo "SUKSES\n";
	}else{
		echo "GAGAL\n";
	}
}
?>
