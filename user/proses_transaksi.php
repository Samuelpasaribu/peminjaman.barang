<?php 
require_once "../config/koneksi.php";
session_start(); 
?>

<!DOCTYPE html>
<html>
<head>
	<title> Selesai </title>
	<link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/bootstrap-responsive.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">
</head>
<body>
<!--start: Wrapper-->
	<div id="wrapper">
				
		<!-- start: Container -->
		<div class="container">
			<!-- start: Table -->
                 <div class="table-responsive">
                 <div class="title"><h3>Peminjaman Selesai</h3></div>
                 <div class="hero-unit"><h3>Selamat Anda telah berhasil checkout</h3></div>
                 <div class="hero-unit">
    <?php
			if(isset($_POST['finish']))	{
				echo '<h4>Terima kasih Anda sudah meminjam alat di SMK Negeri 1 Dlanggu.</h4>';
				echo '<p>Nama  : '.$_POST['nama'].'<br>';
				echo '<p>Kelas : '.$_POST['kelas'].'<br>';
				echo '<p>Tanggal Pinjam : '.$_POST['tgl_pinjam'].'<br>';

				$d = mysql_query("INSERT INTO peminjaman(id_brg, id_anggota, tgl_pinjam) VALUES (
											'$_POST[id_brg]',
											'$_POST[id_anggota]',
											'$_POST[tgl_pinjam]'
											)") or die(mysql_error());
				session_destroy();
			}
				echo '<a href="javascript:window.print()"><h3>Cetak</h3></a></font>';
				echo "<a href='logout.php'>Logout</a>";

	?>

                   </div>
				
			<!-- end: Table -->

		</div>
		<!-- end: Container -->
				
	</div>
	<!-- end: Wrapper  -->			
</body>
</html>