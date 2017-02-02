<?php
include 'config/koneksi.php';
$id_peminjaman = $_GET['id'];
$hapus = mysql_query("DELETE FROM peminjaman WHERE id_peminjaman=$id_peminjaman");
if($hapus){
	header("location:peminjaman.php");
}else{
	echo"gagal menghapus data";
}
?>