<?php
session_start();
include "../../library/config.php";
header("Content-type: application/vnd-ms-excel");
 
// Mendefinisikan nama file ekspor "hasil-export.xls"
header("Content-Disposition: attachment; filename=tutorialpedia-export.xls");
 $query = mysqli_query($mysqli, "SELECT * FROM kelas WHERE id_kelas='$_GET[kelas]'");
   $rs = mysqli_fetch_array($query);
   $query1 = mysqli_query($mysqli, "SELECT * FROM ujian WHERE id_ujian='$_GET[ujian]'");
   $rs1 = mysqli_fetch_array($query1);
header("Content-type: application/vnd-ms-excel");
// Mendefinisikan nama file ekspor "hasil-export.xls"
header("Content-Disposition: attachment; filename=nilai-uts $rs[kelas].xls");
echo "<b><center>DAFTAR NILAI SISWA</center></b>";
echo "<b><center>ULANGAN TENGAH SEMESTER (UTS)</b></center>";
echo "<b><center>SMK NEGERI 1 KRAGILAN</b></center>";
echo "<b><center>BERBASIS CBT TAHUN 2018</center></b>";
echo "<table border=0>
 <tr>
 <th colspan='2'>KELAS : $rs[kelas]</th>
 <th>          </th>
 <th>          </th>
 <th>          </th>
 <th colspan='3'>MATA PELAJARAN : $rs1[nama_mapel]</th>
 </tr></br>";
echo "<table border=1>
 <tr>
 <th>NO</th>
 <th>NIS</th>
 <th>NAMA SISWA</th>
 <th>JUMLAH BENAR</th>
 <th>NILAI</th>
 <th>NILAI PENGETAHUAN</th>
 <th>NILAI KETERAMPILAN</th>
 <th>NILAI SIKAP</th>
 </tr>";

    $query = mysqli_query($mysqli, "SELECT * FROM siswa WHERE id_kelas='$_GET[kelas]'");
   $data = array();
   $no = 1;
   while($r = mysqli_fetch_array($query)){
      $n = mysqli_fetch_array(mysqli_query($mysqli, "SELECT * FROM nilai WHERE nis='$r[nis]' AND id_ujian='$_GET[ujian]'"));


echo "<table border=1>
<tr>
<td>$no</td>
<td>$r[nis]</td>
<td>$r[nama]</td>
<td><center>$n[jml_benar]</center></td>
<td><center>$n[nilai]</center></td>
<td><center></td>
<td><center></td>
<td><center></td>
</tr>
</table>";
$no++;

}
?>
