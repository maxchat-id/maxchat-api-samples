<?php

require 'maxchat.php';

// kirim ke nomor yg sudah ada di kontak
sendText("628123456789", "saya kenal kamu");

// push ke nomor yg tidak ada di kontak
pushText("628123456789", "kamu siapa ya?");

// kirim gambar dgn url
sendImage("628123456789", "https://www.google.com/images/branding/googlelogo/2x/googlelogo_color_92x30dp.png", "isi caption", "image.png");

// kirim file pdf dgn url
sendFile("628123456789", "https://training.it.ufl.edu/media/trainingitufledu/documents/uf-health/excel/Excel2016-Beginners.pdf", "image.png");

// kirim link dgn preview
sendLink("628123456789", "Ini text caption di preview link", "https://web.whatsapp.com/");

?>