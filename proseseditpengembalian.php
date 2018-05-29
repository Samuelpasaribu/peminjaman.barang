<?php
include "config/koneksi.php";
$id = $_POST['id'];
$tgl_kembali = $_POST['tgl_kembali'];


$ganti = "update pengembalian set tgl_kembali='$tgl_kembali' where id='$id'";

$update = $mysqli->query($ganti);

if($update) {
	header("location:pengembalian.php");
}else{
	echo $ganti;
	echo "gagal mengubah data";
}
?>