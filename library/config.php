<?php
// Membuat variabel, ubah sesuai dengan nama host dan database pada hosting
$host	= "192.168.10.100";
$user	= "usercbt";
$pass	= "123";
$db	= "dbcbt";

//Menggunakan objek mysqli untuk membuat koneksi dan menyimpanya dalam variabel $mysqli
$mysqli = new mysqli($host, $user, $pass, $db);

//Membuat variabel yang menyimpan url website dan folder website
$url_website = "http://localhost/cbt";
$folder_website = "/cbt";

//Menentukan timezone
date_default_timezone_set('Asia/Jakarta');
?>
