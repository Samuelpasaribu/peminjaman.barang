<?php
    include'config/koneksi.php';
$id_peminjam = $_POST ['id_peminjam'];
$username = $_POST ['username'];
$password = $_POST ['password'];
$nama = $_POST ['nama'];
$status = $_POST ['status'];

        $query = mysql_query ("INSERT INTO peminjam values ('$id_peminjam', '$username','$password',
        	'$nama', '$status')");
        
        if ($query) {
    header("location:peminjam.php");
} else {
    echo "gagal menambah data";
  }
    
?>
