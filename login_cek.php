<?php
session_start();
include "library/config.php";
include "library/function_antiinjection.php";

$username = antiinjeksi($_POST['username']);
$password = antiinjeksi(md5($_POST['password']));

$cekuser = mysqli_query($mysqli, "SELECT * FROM siswa WHERE nis='$username' AND password='$password'");
$jmluser = mysqli_num_rows($cekuser);
$data = mysqli_fetch_array($cekuser);
if($jmluser > 0){
   if($data['status'] == "off"){
     $_SESSION['username']     = $data['nis'];
     $_SESSION['namalengkap']  = $data['nama'];
     $_SESSION['password']     = $data['password'];
     $_SESSION['nis']          = $data['nis'];
     $_SESSION['kelas']        = $data['id_kelas'];

     mysqli_query($mysqli, "UPDATE siswa SET status='login' WHERE nis='$data[nis]'");
     echo "ok";
   }else{
      echo "Siswa sedang <b>Login</b>. Hubungi operator untuk mereset login!";
   }
}else{
   echo "<b>Username</b> atau <b>password</b> tidak terdaftar!";
}
?>