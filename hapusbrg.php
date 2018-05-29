<?php
include 'config/koneksi.php';
$id_brg = $_GET['id'];
$hapus = $mysqli->query("DELETE FROM barang WHERE id_brg=$id_brg");
if($hapus){
	header("location:barang.php");
}else{
	echo"gagal menghapus data";
}
?>