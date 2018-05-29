<?php
    include'config/koneksi.php';
$username = $_POST ['nama'];
$password = $_POST ['password'];
$kelas = $_POST['kelas'] . '-' . $_POST['jurusan'] . '-' . $_POST['no'];
$query = $mysqli->query("INSERT INTO anggota(nama, password, kelas ) values ('$username','$password', '$kelas')");

        if ($query) {
    header("location:peminjam.php");
} else {
    echo "gagal menambah data";
  }

?>
