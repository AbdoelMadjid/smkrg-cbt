<?php
session_start();
ob_start();
?>
<html>
<head>
   <style type="text/css">
      .box{
         border: 1px solid #000;
      }
      .header td{
         border-bottom: 1px solid #000;
      }
      .box td{
         padding: 5px 10px;
      }
   </style>
</head>
<body>

<?php
   
include "../../library/config.php";
	
$query = mysqli_query($mysqli, "select * from siswa where id_kelas='$_GET[kelas]'");
$no = 1;
echo "<table width='100%' cellspacing='20'><tr>";
while($r = mysqli_fetch_array($query)){
   $password = substr(md5($r['nis']), 0, 5);
   $kls = mysqli_fetch_array(mysqli_query($mysqli, "select * from kelas where id_kelas='$r[id_kelas]'"));
		
   echo"<td class='box' width='335'>

<table width='100%' style='width: 330px height:300px' cellspacing='0'>
   
<tr class='header'>
   <td>
    <img src='../../images/logo.png' width='80' height='70'>
   </td>
   <td width='180' style='padding: 3px 20px;'>
   <p>
   ULANGAN TENGAH SEMESTER 
   SMK NEGERI 1 KRAGILAN CBT18                                         
   Jl. Raya Serang - Jakarta Km.13</p>
   
   </td>

</tr>
				
<tr><td>Nama</td><td>: $r[nama]</td></tr>
<tr><td>Kelas</td><td>: $kls[kelas]</td></tr>
<tr><td>Username</td><td>: <b>$r[nis]</b></td></tr>
<tr><td>Password</td><td>: <b>$password</b></td></tr>

</table>

</td>";

  if($no%2==0) echo "</tr><tr>";
  $no++;

}
echo "</tr></table>";
?>
</body>
</html>

<?php
require_once('../../assets/html2pdf/html2pdf.class.php');
$content = ob_get_clean();
$html2pdf = new HTML2PDF('P','A4','en');
$html2pdf->WriteHTML($content);
$html2pdf->Output('Kartu Peserta.pdf');
?>
