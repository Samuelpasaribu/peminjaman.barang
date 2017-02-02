<?php
session_start();
    include'config/koneksi.php';
$nama = $_POST ['nama'];
$password = $_POST ['password'];
$kelas = $_POST['kelas'] . '-' . $_POST['jurusan'] . '-' . $_POST['no_kelas'];


        $query = mysql_query("INSERT INTO anggota(nama, password, kelas) values('$nama', '$password', '$kelas')") or die(mysql_error());

if($query){
	
  	header('Location:login.php'); 

} else {
    echo "gagal menambah data";
  }
    
?>
