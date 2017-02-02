<!DOCTYPE html>
<html>
        <meta charset="UTF-8">
        <title> Peminjaman Alat </title>

        <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="style.css">
   <head>

 </head>
<?php 

$alat = mysql_query("SELECT * FROM barang") or die(mysql_error());
?>
		<div id="contents3">
			<center>
				<div id="items">
					<h1>Peminjaman Alat</h1>
				<div class="row">
					<?php
					while ($row_alat = mysql_fetch_array($alat))
					    {
					  ?>
						<img src="images/lcd.jpg" width="200px" height="150px" alt="">
						<ul>
							<li><a href="">Nama : <?php echo $row_alat['nama_brg']; ?></a></li>
							<li><a href="">Stok : <?php echo $row_alat['stok_brg']; ?></li>
							<li> <a href="" class="btn btn-danger">Pinjam</a></li>
						</ul>
					<?php
						 }
					?>
				</div>
					</ul>
				</div>
				</center>
		</div>
		<<?php require_once "templates/footer.php" ?>