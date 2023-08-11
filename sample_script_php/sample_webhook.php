<?php

require 'maxchat.php';

// capture data yang dilempar oleh maxchat
$result = webhookCapture();
$data = $result->data;

// var_dump($result);

// balas pengirim dg teksnya sendiri, khusus jenis pesan teks
if ($result->event == "new" && $result->type == "message" && $data->type == "text") {
	sendText($data->sender, $data->text);
}

?>