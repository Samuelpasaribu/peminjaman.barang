<?php
    include'config/koneksi.php';
$id_brg = $_POST ['nama_barang'];
$id_peminjam = $_POST ['nama_peminjam'];
$tgl_pinjam = $_POST ['tgl_pinjam'];


        $query = $mysqli->query ("INSERT INTO peminjaman( id_brg, id_anggota, tgl_pinjam) values ('$id_brg', '$id_peminjam','$tgl_pinjam')");




        if ($query) {
    header("location:peminjaman.php");
} else {
    echo "gagal menambah data";
  }

?>
