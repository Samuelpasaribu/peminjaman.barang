<?php
session_start();
if(!isset($_SESSION['admin'])) {
   header('location:login.php'); 
} else { 
   $username = $_SESSION['admin']; 
   require_once 'config/koneksi.php';
}
?>
<?php
include "config/koneksi.php" ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Dashboard</title>

    <!-- Bootstrap core CSS -->
    <link href="bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <link href="bootstrap/dist/css/global.css" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="bootstrap/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  </head>


  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Peminjaman Alat</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown">
                <i class="fa fa-user fa-fw"></i><?php echo $_SESSION['admin']; ?> <i class="fa fa-caret-down"></i>
              </a>
            <ul class="dropdown-menu dropdown-user">
             <li class="divider"></li>
              <li><a href="logout.php"><i class="fa fa-sign-out"></i> Logout</a></li>
            </ul>
            
          </li>
          </ul>
        </div>
      </div>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li class="active"><a href="dashboard.php"><i class="fa fa-dashboard">&nbsp;&nbsp;&nbsp;Dashboard</i></a></li>
            <li><a href="barang.php"><i class="fa fa-laptop">&nbsp;&nbsp;&nbsp;Barang</i></a></li>
            <li><a href="peminjam.php"><i class="fa fa-user">&nbsp;&nbsp;&nbsp;Peminjam</i></a></li>
            <li><a href="peminjaman.php"><i class="fa fa-gear">&nbsp;&nbsp;&nbsp;Peminjaman</i></a></li>
            <li><a href="pengembalian.php"><i class="fa fa-book">&nbsp;&nbsp;&nbsp;Pengembalian</i></a></li>
          </ul>
          
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h2 class="page-header">Data Peminjam</h2>
           <a href="tambahpeminjam.php" class="btn btn-danger pull-right" style="margin-bottom: 20px;"><i class="fa fa-plus"></i> Tambah</a>
              <table id="tabelanggota" class="table table-bordered table-hover">
                     <thead>
                        <tr>
                          <th>No</th>
                          <th>Username</th>
                          <th>Kelas</th>
                          <th>Opsi</th>
                          <th>Hapus</th>
                        </tr>
                     </thead> 

                     <?php
                     $query = mysql_query("SELECT * FROM anggota");
                     $id_peminjam=1;
                     while ($lihat = mysql_fetch_array($query)){
                      ?>
                      <tbody>
                        <tr>
                          <td><?php echo $lihat['id_anggota']; ?></td>
                          <td><?php echo $lihat['nama'];?></td>
                          <td><?php echo $lihat['kelas'];?></td>    

                          <td style=""> 
                            <a href="buku_pinjam.php?id_anggota=<?php echo $lihat['id_anggota']; ?>" class="btn btn-danger">Lihat Barang <i class="fa fa-eye"></i></a>
                            <a href="editpeminjam.php?id_peminjam=<?php echo $lihat['id_anggota']; ?>" class="btn btn-danger">Edit</a>
                          </td>
                            <td>
                              <a href="hapuspeminjam.php?id=<?php echo $lihat['id_anggota']; ?>" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                            </td>


                        </tr>
                        <?php
                        } ?>

              </table>
              
        </div>
      </div>
    </div>

    <?php require_once "templates/footer.php" ?>