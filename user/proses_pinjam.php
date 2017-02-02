<?php 
    require_once("config.inc.php");
    if (!isset($_SESSION)) {
        session_start();
    }
    
 //    if(!isset($_SESSION['myusername']))
	// {
	// 	header("location:newlogin.php");
	// }

	// $username = $_SESSION['myusername'];
	// //query data user
	// $query = mysql_query("SELECT * FROM peminjam where username='$username'");
 //                  while ($qu = mysql_fetch_array($query))
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Proses Pinjam</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="style/style.css" rel="stylesheet" type="text/css">
    <link href="../bootstrap/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
</head>
<body>
  

		<div class="container">
			<div class="row" style="margin-top: 50px">
				<div class="col-md-6">
				<div class="panel panel-primary">
					<div class="panel-heading">
						<h4>Proses Pendataan</h4>
					</div>
					<div class="panel-body">
					<form action="proses_transaksi.php" method="post">
						<div class="form-group">
							<label for="">Nama</label>
							<input type="text" name="nama" class="form-control" value="<?php echo $_SESSION['anggota']; ?>">
						</div>
<?php 
$anggota = $_SESSION['anggota'];
$query = mysql_query("SELECT * FROM anggota WHERE nama = '$anggota'");
	while ($data = mysql_fetch_assoc($query)) {
?>


<input type="hidden" name="id_anggota" value="<?php echo $data['id_anggota']; ?>">
<label for="">Kelas</label>
        	<div class="form-group">
      		<input type="text" name="kelas" value="<?php echo $data['kelas']; ?>" disabled class="form-control">
      		<input type="hidden" name="kelas" value="<?php echo $data['kelas']; ?>" class="form-control">
        	</div>
	<?php	}
 ?>
        
						<div class="form-group">
						<?php 
						date_default_timezone_set('Asia/Jakarta');
						$date = date('d' . '-' . 'm' . '-' . 'Y');
						 ?>
							<label for="">Tgl Pinjam</label>
							<input type="text" disabled name="tgl_pinjam" class="datepicker form-control" value="<?php echo $date; ?>">
							<input type="hidden" name="tgl_pinjam" class="datepicker form-control" value="<?php echo $date; ?>">

						</div>
						
						<button type="submit" name="finish" class="btn btn-block btn-primary">Proses</button>
		<div id="footer" style="margin-top: 40px">
			<p id="footnote">
				© Peminjaman Alat SMKN 1 Dlanggu.
			</p>
		</div>
					</div>
				</div>
				</div>
				<div class="col-md-4 ">
					<h3>Barang yang Di Pinjam</h3>
					<?php
							 
							  if (isset($_SESSION['items'])) {
							        foreach ($_SESSION['items'] as $key => $val){
							            $query = mysql_query ("SELECT * FROM barang WHERE barang.id_brg = '$key'");
							            $rs = mysql_fetch_array ($query);
							  ?>
						<img src="../images/<?php echo $rs['foto']; ?>" class="thumbnail" width="250" height="100" alt="">
						<h3><?php echo $rs['nama_brg']; ?></h3>
						<input type="hidden" name="id_brg" value="<?php echo $val; ?>" class="form-control">
					<?php
					            mysql_free_result($query);
					        }
					 	 }
					  ?>
				</div>
					</form>
			</div>
	</div>
	 <script src="bootstrap/dist/js/jquery.js"></script>
    <script src="bootstrap/dist/js/bootstrap.min.js"></script>
</body>
</html>
