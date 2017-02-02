<?php
include "config/koneksi.php";
$id_peminjam = $_POST ['id_peminjam'];
$username = $_POST ['username'];
$password = $_POST ['password'];
$nama = $_POST ['nama'];
$status = $_POST ['status'];

$ganti = "update peminjam set id_peminjam='$id_peminjam',username='$username',password='$password', nama='$nama', status='$status' where id_peminjam='$id_peminjam'";
$update = mysql_query($ganti);

if($update) {
	header("location:peminjam.php");
}else{
	echo $ganti;
	echo "gagal mengubah data";
}
?>