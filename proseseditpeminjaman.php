<?php
include "config/koneksi.php";
$id = $_POST['id'];
$id_brg = $_POST['nama_barang'];
$id_peminjam = $_POST['nama_peminjam'];
$tgl_pinjam = $_POST['tgl_pinjam'];


$ganti = "update barang set id='$id', id_brg='$nama_barang', id_peminjam='$nama_peminjam', tgl_pinjam='$tgl_pinjam' where id='$id'";
$update = mysql_query($ganti);

if($update) {
	header("location:barang.php");
}else{
	echo $ganti;
	echo "gagal mengubah data";
}
?>