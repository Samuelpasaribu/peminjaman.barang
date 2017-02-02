<?php
    include'config/koneksi.php';
$id_peminjaman = $_POST ['id'];
$id_brg = $_POST ['nama_barang'];
$id_peminjam = $_POST ['nama_peminjam'];
$tgl_pinjam = $_POST ['tgl_pinjam'];


        $query = mysql_query ("INSERT INTO peminjaman(id_peminjaman, id_brg, id_peminjam, tgl_pinjam) values ('$id_peminjaman', '$id_brg', '$id_peminjam','$tgl_pinjam')");



        
        if ($query) {
    header("location:peminjaman.php");
} else {
    echo "gagal menambah data";
  }
    
?>
