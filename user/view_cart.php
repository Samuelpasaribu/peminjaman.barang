<?php require_once "config.inc.php";
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Peminjaman Alat</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="style/style.css" rel="stylesheet" type="text/css">
    <link href="../bootstrap/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">


    <!-- Custom CSS -->
    <link href="css/shop-homepage.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
<div class="container">

<h3>Keranjang Peminjam</h3>
                <form action="index.php" method="post" id="cart">
                    <a href="proses_pinjam.php?id_anggota=<?php echo $_SESSION['id_anggota']; ?>" class="btn btn-primary pull-right">Proses Pinjam</a><br><br>
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>Id Barang</th>
                          <th>Nama Barang</th>
                          <th>Foto</th>
                          <th>Hapus</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                      if (isset($_SESSION['items'])) {
                            foreach ($_SESSION['items'] as $key => $val){
                                $query = $mysqli->query("SELECT barang.id_brg, barang.nama_brg, barang.foto FROM barang WHERE barang.id_brg = '$key'");
                                $rs = mysqli_fetch_array($query);

                      ?>
                      <tr>
                        <td><?php echo $rs['id_brg']; ?></td>
                        <td><?php echo $rs['nama_brg']; ?></td>
                        <td><img src="../images/<?php echo $rs['foto']; ?>" width="50" height="25" alt=""></td>
                        <td><a href="cartfunction.php?act=del&amp;id_product=<?php echo $key; ?>&amp;ref=view_cart.php"><i class="fa fa-trash"></i></a></td>
                      </tr>
                      <?php
                                mysqli_free_result($query);
                            }
                      }
                      ?>
                      <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td><a href="cartfunction.php?act=clear&amp;ref=index.php">Hapus Semua</a></td>
                      </tr>
                      </tbody>
                    </table>
                    <button type="submit" class="btn btn-primary">Kembali</button>
                  </form>
            </div>

<!-- Placed at the end of the document so the pages load faster -->
    <script src="bootstrap/dist/js/jquery.js"></script>
    <script src="bootstrap/dist/js/bootstrap.min.js"></script>
  </body>
</html>