<!DOCTYPE html>
<?php 
	session_start();
include "../../library/config.php";
	
?>	
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title> Export Mysql Database ke Excel Menggunakan PHP - www.kodekidi.com</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="Import Excel File To MySql Database Using php">

		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" href="css/bootstrap-responsive.min.css">
		<link rel="stylesheet" href="css/bootstrap-custom.css">


	</head>
	<body>    

	<!-- Navbar
    ================================================== -->

	<div class="navbar navbar-inverse navbar-fixed-top">
		<div class="navbar-inner">
			<div class="container"> 
				<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</a>
				<a class="brand" href="#">Export Mysql Database ke Excel Menggunakan PHP</a>
				
			</div>
		</div>
	</div>

	<div id="wrap">
	<div class="container">
		<div class="row">
			
			<div class="span6" id="form-login">
				
			</div>
			<div class="span3 hidden-phone"></div>

			
		</div>
		<form action="export.php" method="post" name="export_excel">

			<div class="control-group">
				<div class="controls">
					<button type="submit" id="export" name="export" class="btn btn-primary button-loading" data-loading-text="Loading...">Export MySQL Data ke CSV/Excel File</button>
				</div>
			</div>
		</form>	

		<table class="table table-bordered">
			<thead>
				  	<tr>
				  		<th>Nis</th>
				  		<th>Nama</th>
				  		<th>Password</th>
				  		<th>Id Kelas</th>
				  		
				 		
				 
				  	</tr>	
				  </thead>
			<?php
			 $n = mysqli_fetch_array(mysqli_query($mysqli, "SELECT * FROM nilai WHERE nis='$r[nis]' AND id_ujian='$_GET[ujian]'"));
				$result_set =  mysql_query($n);
				while($row = mysql_fetch_array($result_set))
				{
				?>
			
					<tr>
						<td><?php echo $row['nis']; ?></td>
						<td><?php echo $row['nama']; ?></td>
						<td><?php echo $row['password']; ?></td>
						<td><?php echo $row['id_kelas']; ?></td>
						
					</tr>
				<?php
				}
			?>
		</table>
	</div>

	</div>

	</body>
</html>