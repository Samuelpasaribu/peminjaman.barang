<?php
include 'config/koneksi.php';
$id_brg = $_GET['id'];
$hapus = mysql_query("DELETE FROM barang WHERE id_brg=$id_brg");
if($hapus){
	header("location:barang.php");
}else{
	echo"gagal menghapus data";
}
?>