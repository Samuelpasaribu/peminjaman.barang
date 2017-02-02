<?php
include 'config/koneksi.php';
$id_peminjam = $_GET['id'];
$hapus = mysql_query("DELETE FROM peminjam WHERE id_peminjam=$id_peminjam");
if($hapus){
	header("location:peminjam.php");
}else{
	echo"gagal menghapus data";
}
?>