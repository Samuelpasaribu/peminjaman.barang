<?php
    include'config/koneksi.php';
    $namafolder="upload/"; //tempat menyimpan file
	$id_brg = $_POST ['id_brg'];
	$nama_brg = $_POST['nama_brg'];
	$jenis_brg = $_POST ['jenis_brg'];
	$stok_brg = $_POST ['stok_brg'];
	$foto = $_POST['foto'];

if (isset($_POST['tambah'])){
$dir = "images/";
$fileName = $dir.basename($_FILES['foto']['name']);
// var_dump($fileName);
// die();

// Simpan di Folder Gambar
move_uploaded_file($fileName);
 // $query = $mysqli->query("INSERT INTO barang values ('$id_brg', '$nama_brg','$jenis_brg','$stok_brg','$fileName')");

}



        if ($query) {
    header("location:barang.php");
} else {
    echo "gagal menambah data";
  }

?>
