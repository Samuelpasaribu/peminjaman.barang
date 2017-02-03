<?php
include 'config/koneksi.php';
$id_peminjam = $_GET['id'];
$hapus = mysql_query("DELETE FROM anggota WHERE id_anggota=$id_peminjam");
if($hapus){
	header("location:peminjam.php");
}else{
	echo"gagal menghapus data";
}
?>