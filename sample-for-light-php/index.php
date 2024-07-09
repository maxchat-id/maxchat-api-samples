<?php
require __DIR__ . '/vendor/autoload.php';

$client = new \GuzzleHttp\Client();
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->safeLoad();

$baseUrl = $_ENV['API_URL'] . '/api';
$token = $_ENV['TOKEN'];

$options = [
  'headers' => [
    'Authorization' => 'Bearer ' . $token,
    'Content-Type' => 'application/json',
    'accept' => 'application/json',
  ]
];

function info($client, $baseUrl, $options) {
  $response = $client->request('GET', $baseUrl . '/ping', $options);
  return $response->getBody(); // '{"id": 1420053, "name": "guzzle", ...}'
}

function sendMessage($text, $client, $baseUrl, $options) {

  $data = [
    'json' => [
      'to' => '6285649186459',
      'type' => 'text',
      'text' => $text,
      'useTyping' => false,
    ]
  ];
  $payload = array_merge($options, $data);
  $response = $client->request('POST', $baseUrl . '/messages', $payload);
  return $response->getBody(); // '{"id": 1420053, "name": "guzzle", ...}'
}

function checkBusy($client, $baseUrl, $options) {
  $response = $client->request('GET', $baseUrl . '/system/busy', $options);
  return $response->getBody(); // '{"id": 1420053, "name": "guzzle", ...}'
}

function run($client, $baseUrl, $options) {
  $busy = checkBusy($client, $baseUrl, $options);
  $busyObj = json_decode($busy);

  if ($busyObj->busy == true) {
    sleep(0.5);
    run($client, $baseUrl, $options);
  }

  echo sendMessage('Artikel ini adalah bagian pertama dari seri tutorial yang memperkenalkan beberapa fitur fundamental dari bahasa Go. Jika Anda baru saja memulai belajar Go, pastikan membaca Tutorial: Go dari awal terlebih dahulu, yang secara singkat mengenalkan perintah go, modul Go, dan kode Go.\n\nDalam tutorial ini kita akan membuat dua modul. Modul yang pertama adalah sebuah pustaka yang mana nanti akan di-impor oleh pustaka atau aplikasi yang lain. Modul yang kedua adalah aplikasi yang akan menggunakan modul yang pertama.\n\nSeri tutorial ini mengikutkan tujuh topik yang tiap-tiapnya memaparkan bagian berbeda dari bahasa Go.\n\nMembuat sebuah modul — Menulis sebuah modul yang fungsi-fungsinya dapat dipanggil dari modul lain.\n\nMemanggil kode dari modul lain  — Impor dan gunakan modul yang baru.\n\nMengembalikan dan menangani eror  — Menambahkan penanganan eror sederhana.\n\nMengembalikan salam acak  — Penanganan data dalam slice (array dengan ukuran dinamis pada Go).\n\nMengembalikan salam untuk beberapa orang  — Menyimpan pasangan kunci-nilai dalam sebuah map.\n\nMembuat sebuah tes  — Penggunaan fitur unit tes Go untuk menguji kode kita.\n\nMengompilasi dan memasang aplikasi  — Mengompilasi dan memasang kode kita secara lokal.\n\nNOTE\nUntuk tutorial lainnya, lihat Tutorial.\nKebutuhan\nPengalaman memrogram kode. Kode yang dicontohkan di sini cukup sederhana, namun akan lebih membantu bila pembaca paham tentang fungsi, pengulangan, dan array.\n\nAlat untuk menyunting kode. Penyunting teks apa pun dapat digunakan. Kebanyakan penyunting teks memiliki dukungan untuk Go. Yang paling terkenal yaitu VSCode (gratis), GoLand (berbayar), dan Vim (gratis).\n\nTerminal. Go bekerja dengan baik menggunakan terminal apa pun di Linux dan Mac, dan PowerShell atau cmd di Windows.\n\nMembuat modul yang bisa digunakan orang lain\nMemulai dengan membuat sebuah Go modul. Dalam sebuah modul, kita mengumpulkan satu atau lebih paket untuk sekumpulan fungsi yang diskret dan berguna. Contohnya, kita bisa membuat sebuah modul untuk paket-paket yang memiliki fungsi-fungsi yang melakukan analisis finansial sehingga orang lain yang membuat aplikasi finansial dapat menggunakan karya kita. Untuk informasi lebih lanjut tentang pengembangan dengan modul, lihat Membangun dan menerbitkan modul.\n\nKode Go dikelompokkan ke dalam paket-paket, dan paket-paket dikelompokkan ke dalam modul. Modul menspesifikasikan dependensi yang dibutuhkan untuk menjalankan semua kode dalam paket-paket, termasuk versi Go dan sekumpulan modul lain yang dibutuhkan.\n\nSaat kita menambahkan atau memperbaiki fungsionalitas dalam modul, kita menerbitkan versi terbaru dari modul. Pengembang lain yang memanggil fungsi dalam modul kita dapat meng-impor paket-paket yang diperbarui dari modul kita dan mengujinya dengan versi yang terbaru sebelum menggunakan untuk production.', $client, $baseUrl, $options);
}

// echo sendMessage('ini test', $client, $baseUrl, $options);
run($client, $baseUrl, $options);
