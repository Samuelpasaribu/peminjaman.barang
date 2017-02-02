<?php
session_start();
if(!isset($_SESSION['username'])) {
   header('location:login.php'); 
} else { 
   $username = $_SESSION['username']; 
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
                <i class="fa fa-user fa-fw"></i>Etika Rs. <i class="fa fa-caret-down"></i>
              </a>
            <ul class="dropdown-menu dropdown-user">
              <li><a href="logout.php"><i class="fa fa-sign-out"></i> Logout</a></li>
            </ul>
            
          </li>
          </ul>
          <form class="navbar-form navbar-right">
            <input type="text" class="form-control" placeholder="Search...">
          </form>
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
          <h2 class="page-header">Peminjaman</h2>
          <div class="row">
            <a href="tambahpeminjaman.php" class="btn btn-danger pull-right"><i class="fa fa-plus"></i> Tambah</a>
          </div>
              <table id="tabelpeminjaman" class="table table-striped table-hover">
                     <thead>
                        <tr>
                          <th>ID</th>
                          <th>ID Barang</th>
                          <th>Nama Barang</th>
                          <th>Nama Peminjam</th>
                          <th>Tanggal Pinjam</th>
                          <th>  </th> 
                        </tr>
                     </thead>
                     <?php
                     $sql = "select barang.id_brg, peminjaman.id_peminjaman,tgl_pinjam, barang.nama_brg, peminjam.nama from peminjaman join barang
                      on barang.id_brg=peminjaman.id_brg join peminjam on peminjam.id_peminjam=peminjaman.id_peminjam";
                     $query = mysql_query($sql);
                     while ($lihat=mysql_fetch_array($query)){
                      ?>
                      <tbody>
                        <tr>
                         <td><?php echo $lihat['id_peminjaman'] ?></td>
                          <td><?php echo $lihat['id_brg'] ?></td>
                          <td><?php echo $lihat ['nama_brg']; ?></td>
                          <td><?php echo $lihat ['nama'];?></td>
                          <td><?php echo $lihat ['tgl_pinjam']; ?></td>          
                          <td> <a href="editpeminjaman.php?id_peminjaman=<?php echo $lihat['id_brg']; ?>" class="btn btn-danger">Edit</a>
                          <a href="hapuspeminjaman.php?id=<?php echo $lihat['id_brg']; ?>" class="btn btn-danger">Hapus</a></td>


                        </tr>
                        <?php
                        } ?>
                        </tbody>
              </table>
        </div>
      </div>
    </div>

    <?php require_once "templates/footer.php" ?>