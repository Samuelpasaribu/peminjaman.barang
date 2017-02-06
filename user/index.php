<?php
session_start(); 
include("config.inc.php"); 
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

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Peminjaman Alat</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="index.php">Home</a>
                    </li>
                </ul>
                 <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown">
                <i class="fa fa-user fa-fw"></i><?php   echo $_SESSION['anggota'] ?><i class="fa fa-caret-down"></i>
              </a>
            <ul class="dropdown-menu dropdown-user">
              <li><a href="logout.php"><i class="fa fa-sign-out"></i> Logout</a></li>
            </ul>
            
          </li>
          </ul>
				

            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
			
    </nav>
            <h3 style="text-align:center;">Daftar Alat</h3>

<?php
//List produk dari database
$alat = mysql_query("SELECT * FROM barang") or die(mysql_error());
?>
        <div id="container">
                    <?php
                    while ($row_alat = mysql_fetch_array($alat))
                        {
                            $foto = $row_alat['foto'];
                      ?>
                        <div class="col-md-4" style="padding: 50px">
                            <img src="../images/<?php echo $foto; ?>" width="200" height="150" alt="">
                            <h4><?php  echo $row_alat['nama_brg']; ?></h4>
                            <p>Stok : <?php echo $row_alat['stok_brg']; ?></p>
                            <a href="cartfunction.php?act=add&amp;id_product=<?php echo $row_alat['id_brg']; ?>&amp;id_pembeli=<?php echo $_SESSION['id_anggota']; ?>&amp;ref=view_cart.php" class="btn btn-danger" ><font color="white">Pinjam Barang</font></a>
                        </div>

                    <?php
                         }
                    ?>
                    </ul>
       

    </div>
    <!-- /.container -->

    <div class="container">

        <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; Etika Rs</p>
                </div>
            </div>
        </footer>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
   <script type="text/javascript" src="js/jquery-1.11.2.min.js"></script>
<script>
$(document).ready(function(){	
		$(".form-item").submit(function(e){
			var form_data = $(this).serialize();
			var button_content = $(this).find('button[type=submit]');
			button_content.html('Adding...'); //Loading button text 

			$.ajax({ //request ajax ke cart_process.php
				url: "cart_process.php",
				type: "POST",
				dataType:"json", 
				data: form_data
			}).done(function(data){ //Jika Ajax berhasil
				$("#cart-info").html(data.items); //total items di cart-info element
				button_content.html('BELI'); //
				alert("Item telah dimasukan ke keranjang belanja anda"); 
				if($(".shopping-cart-box").css("display") == "block"){
					$(".cart-box").trigger( "click" ); 
				}
			})
			e.preventDefault();
		});

	//menampilkan item ke keranjang belanja
	$( ".cart-box").click(function(e) { 
		e.preventDefault(); 
		$(".shopping-cart-box").fadeIn(); 
		$("#shopping-cart-results").html('<img src="images/ajax-loader.gif">'); //menampilkan loading gambar
		$("#shopping-cart-results" ).load( "cart_process.php", {"load_cart":"1"}); //membuat permintaan ajax menggunakan dengan jQuery Load() & update
	});
	
	//keluar keranjang belanja
	$( ".close-shopping-cart-box").click(function(e){ //fungsi klik pengguna pada keranjang belanja
		e.preventDefault(); 
		$(".shopping-cart-box").fadeOut(); //keluar keranjang belanka
	});
	
	//Menghapus item dari keranjang
	$("#shopping-cart-results").on('click', 'a.remove-item', function(e) {
		e.preventDefault(); 
		var pcode = $(this).attr("data-code"); //mendapatkan get produk
		$(this).parent().fadeOut(); //menghapus elemen item dari kotak
		$.getJSON( "cart_process.php", {"remove_code":pcode} , function(data){ //mendapatkan Harga Barang dari Server
			$("#cart-info").html(data.items); //update Menjullahkan item pada cart-info
			$(".cart-box").trigger( "click" ); //trigger click on cart-box to untuk memperbarui daftar item
		});
	});

});
</script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
