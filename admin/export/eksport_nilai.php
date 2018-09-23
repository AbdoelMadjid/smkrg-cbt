<?php
session_start();
include "../../library/config.php";

// Fungsi header dengan mengirimkan raw data excel
header("Content-type: application/vnd-ms-excel");
 
// Mendefinisikan nama file ekspor "hasil-export.xls"
header("Content-Disposition: attachment; filename=nilai-export.xls");

if($_GET['action'] == "table_data1"){
   $query = mysqli_query($mysqli, "SELECT * FROM siswa WHERE id_kelas='$_GET[kelas]'");
   $data = array();
   $no = 1;
   while($r = mysqli_fetch_array($query)){
      $n = mysqli_fetch_array(mysqli_query($mysqli, "SELECT * FROM nilai WHERE nis='$r[nis]' AND id_ujian='$_GET[ujian]'"));
        
      $row = array();
      $row[] = $no;
      $row[] = $r['nis'];
      $row[] = $r['nama'];
      $row[] = $n['jml_benar'];     
      $nilai[] = $n['nilai'];
      $data[] = $row;
      $no++;
      
   }
   $output = array("data" => $nilai);
   echo json_encode($output);
}
?>
