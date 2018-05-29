<?php
session_start();
if(!isset($_SESSION['admin'])) {
   header('location:login.php');
} else {
   $username = $_SESSION['admin'];
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
                <i class="fa fa-user fa-fw"></i>Admin <i class="fa fa-caret-down"></i>
              </a>
            <ul class="dropdown-menu dropdown-user">
             <li class="divider"></li>
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
            <li class=""><a href="dashboard.php"><i class="fa fa-dashboard">&nbsp;&nbsp;&nbsp;Dashboard</i></a></li>
            <li><a href="barang.php"><i class="fa fa-laptop">&nbsp;&nbsp;&nbsp;Barang</i></a></li>
            <li><a href="peminjam.php"><i class="fa fa-user">&nbsp;&nbsp;&nbsp;Anggota</i></a></li>
            <li><a href="peminjaman.php"><i class="fa fa-gear">&nbsp;&nbsp;&nbsp;Peminjaman</i></a></li>
            <li><a href="pengembalian.php"><i class="fa fa-book">&nbsp;&nbsp;&nbsp;Pengembalian</i></a></li>
          </ul>

        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
         <h2 class="page-header">Tambah Peminjaman</h2>

          <form role="form1" action="prosestambahpeminjaman.php" method="post">
             <table>
                 <div class = "box-body">

                    <div class ="form-group">
                    <label for="">Pilih Barang</label>
                   <select name="nama_barang" class="form-control">
                        <option value="" selected disabled>- Pilih Barang -</option>
                        <?php
                          $sql = "select * from barang";
                          $query = $mysqli->query($sql);
                          while ($data = mysqli_fetch_array($query)) {
                         ?>

                         <option value="<?php echo $data['id_brg'] ?>"><?php echo $data['nama_brg'] ?></option>
                         <?php } ?>
                      </select>
                   <div class ="form-group">
                   <label for="">Nama Peminjam</label>
                      <select name="nama_peminjam" class="form-control">
                        <option value="" selected disabled>- Nama Peminjam -</option>
                        <?php
                          $sql = "select * from anggota";
                          $query = $mysqli->query($sql);
                          while ($data = mysqli_fetch_array($query)) {
                         ?>

                         <option value="<?php echo $data['id_anggota'] ?>"><?php echo $data['nama'] ?></option>
                         <?php } ?>
                      </select>
                    </div>
                     <div class ="form-group">
                    <label for="exampleInputPassword1">Tanggal Pinjam</label>
                    <input type="date"   name="tgl_pinjam"
                    class="form-control datepicker" placeholder="Tanggal Pinjam..." required>
                    </div>

              <div class="box=footer">
            </div>
            <tr>
            <td><button type="submit" class="btn btn-danger">Tambah Data</button></td>
            <td><a href="barang.php" class="btn btn-danger">Back</td>
            </tr>
            </div>
        </div>
      </div>
    </div>

    <?php require_once "templates/footer.php" ?>