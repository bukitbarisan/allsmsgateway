<?php
$nomor = file_get_contents("nomor.txt");
$pisah = explode("\n", $nomor);

foreach ($pisah as $no) {
    $pesan = "TESTING";

    $cpt = curl_init("http://api.nusasms.com/api/v3/sendsms/plain");
    curl_setopt_array($cpt, [
        CURLOPT_RETURNTRANSFER => 1,
        CURLOPT_POST => true,
        CURLOPT_POSTFIELDS => array(
            'user' => 'your_api_usernam',
            'password' => 'your_api_password',
            'SMSText' => $pesan,
            'GSM' => $no,
            'output' => 'json')
    ]);
    $result = curl_exec($cpt);
    $a = json_decode($result);
    $b = $a->results[0];
    if($b->status == "0"){
        echo "SUKSES SEND KE = $b->destination\n";
        sleep(3);
    }else{
        echo "GAGAL SEND KE = $b->destination\n";
        sleep(2);
    }
}
?>
