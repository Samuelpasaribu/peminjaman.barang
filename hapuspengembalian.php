<?php
include 'config/koneksi.php';
$id = $_GET['id'];
$hapus = $mysqli->query("DELETE FROM pengembalian WHERE id=$id");
if($hapus){
	header("location:pengembalian.php");
}else{
	echo"gagal menghapus data";
}
?>