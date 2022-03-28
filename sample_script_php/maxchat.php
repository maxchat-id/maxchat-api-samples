<?php

// ganti dg url api dan token sesuai di admin panel
$GLOBALS["API_URL"] = "https://demo.maxchat.id/demo1/api";
$GLOBALS["TOKEN"] = "LMg62sM7uwNG9yCtJK2LAr";

function webhookCapture() {
    $webhookContent = '';

    $webhook = fopen('php://input' , 'rb');
    
    while (!feof($webhook)) {
        $webhookContent .= fread($webhook, 4096);
    }

    fclose($webhook);

	error_log($webhookContent);

    return json_decode($webhookContent);
}

function sendText($to, $text) {
	// kirim pesan ke kontak yang sudah disimpan
	$url = $GLOBALS["API_URL"] . "/messages";

	$data = array(
	  "to" => $to, 
	  "text" => $text
	);

	postCurl($url, $data);
}

function pushText($to, $text) {
	// kirim pesan ke kontak yang tidak dikenali
	$url = $GLOBALS["API_URL"] . "/messages/push";
	
	$data = array(
	  "to" => $to, 
	  "text" => $text
	);

	postCurl($url, $data);
}

function sendImg($to, $url, $caption, $filename) {
	// jika kontak belum dikenali pakai "/api/messages/push/image"
	$url = $GLOBALS["API_URL"] . "/messages/image";
	
	$data = array(
	  "to" => $to, 
	  "url" => $url,
	  "filename" => $filename
	);

	postCurl($url, $data);
}

function sendFile($to, $url, $filename) {
	// jika kontak belum dikenali pakai "/api/messages/push/file"
	$url = $GLOBALS["API_URL"] . "/messages/file";
	
	$data = array(
	  "to" => $to, 
	  "url" => $url,
	  "filename" => $filename
	);

	postCurl($url, $data);
}

function sendLink($to, $text, $url) {
	// jika kontak belum dikenali pakai "/api/messages/push/link"
	$url = $GLOBALS["API_URL"] . "/messages/link";

	$data = array(
		"to" => $to, 
		"text" => $text,
		"url" => $url
	);

	postCurl($url, $data);
}

function postCurl($url, $data) {
	$curl = curl_init();

	curl_setopt_array($curl, array(
	  CURLOPT_URL => $url,
	  CURLOPT_SSL_VERIFYHOST => false,
	  CURLOPT_SSL_VERIFYPEER => false,
	  CURLOPT_RETURNTRANSFER => true,
	  CURLOPT_ENCODING => "",
	  CURLOPT_MAXREDIRS => 10,
	  CURLOPT_TIMEOUT => 30,
	  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	  CURLOPT_CUSTOMREQUEST => "POST",
	  CURLOPT_POSTFIELDS => json_encode($data),
	  CURLOPT_HTTPHEADER => array(
	    "Authorization: Bearer " . $GLOBALS["TOKEN"],
	    "Content-Type: application/json",
	    "cache-control: no-cache"
	  ),
	));

	$response = curl_exec($curl);
	$err = curl_error($curl);

	curl_close($curl);

	if ($err) {
	  echo "cURL Error #:" . $err;
	} else {
	  echo $response;
	}
}

?>