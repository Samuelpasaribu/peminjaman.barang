<!DOCTYPE html>
<html>
        <meta charset="UTF-8">
        <title> Peminjaman Alat </title>

        <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="style.css">
   <head>
<body>
  <?php include "navbar.php" ?> </body>
 </head>
    <body>
    <div class="row">
  <div class="col-sm-6 col-md-4">
    <div class="thumbnail">
      
      <div class="caption">
        <h3>Gallery</h3>
        <p><img class="contoh" src="images/se.jpg" alt="..."></p>
        
        <p><a href="#" class="btn btn-primary" role="button">Read More</a></p>
      </div>
    </div>
  </div>


<div class="col-sm-6 col-md-4">
    <div class="thumbnail">
      <img class="gambar" src="images/lcd.jpg" alt="...">
      <div class="caption">
        <h3><b>Judul produk</b></h3>
        <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto saepe nesciunt, ipsam rerum minus blanditiis, excepturi consequuntur ratione. Nam culpa at similique quisquam unde nobis dolore dolores amet vitae fugit?
         </p>
        <p><a href="#" class="btn btn-primary" role="button">Read More</a></p>
      </div>
    </div>
  </div>

  <div class="col-md-4">
    <div class="thumbnail">
      <img class="gambar" src="images/12.jpg" alt="...">
      <div class="caption">
        <h3><b>Contact person</h3>
        <p>Waluyo : 085743766899 </p>
        <p>Dudung : 082132417538</p>
        <p><a href="#" class="btn btn-primary" role="button">Read More</a></p>
      </div>
    </div>
  </div>

</div>
  <?php require_once "templates/footer.php" ?>
        <script type="text/javascript">
        $('.carousel').carousel();
        </script>
  </body>
</html>