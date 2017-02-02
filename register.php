<?php include "templates/header.php";

session_start();

?>

<div class="row">
    <div class="col-md-8 col-md-offset-2">
          <h2 class="page-header">Pendaftaran Anggota</h2>

          <div class="panel panel-primary">
            <div class="panel panel-heading"> 
                Form Pendaftaran
            </div> 
            <div class="panel-body">  
                <form action="prosesregister.php" method="post">  
                     <div class ="form-group">
                          <label for="exampleInputPassword1">Nama Lengkap</label>
                          <input type="text"   name="nama" 
                          class="form-control" placeholder="Nama Lengkap..." required>
                    </div>
                   <div class ="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password"   name="password" 
                        class="form-control" placeholder="Password..." required>
                    </div>
                    <label for=" ">Kelas</label>
                     <div class="row">  
                        <div class="col-md-3">
                       <select name="kelas" class="form-control">
                         <option value="" disabled selected>- Pilih Kelas -</option>
                         <option value="10">10</option>
                         <option value="11">11</option>
                         <option value="12">12</option>
                       </select>
                     </div>
                     <div class="col-md-3">
                       <select name="jurusan" class="form-control">
                         <option value="" disabled selected>- Pilih Jurusan -</option>
                         <option value="RPL">Rekayasa Perangkat Lunak</option>
                         <option value="MM">MultiMedia</option>
                         <option value="ANM">Animasi</option>
                         <option value="TKJ">Teknik Komputer Jaringan</option>
                         <option value="JB">Jasa Boga</option>
                         <option value="APH">Akomodasi Perhotelan</option>
                       </select>
                     </div>
                     <div class="col-md-3">
                       <select name="no_kelas" class="form-control">
                         <option value="" disabled selected>- Pilih Nomer -</option>
                         <option value="1">1</option>
                         <option value="2">2</option>
                         <option value="3">3</option>
                       </select>
                     </div>
                     </div>
                    

              <div class="row" style="margin-top: 15px; margin-left: 5px">
                <button type="submit" class="btn btn-danger">Tambah Data</button>
              <a href="barang.php" class="btn btn-danger">Back</a>
              </div>
        </form>
            </div>
          </div>
    </div>
</div>
<?php include "templates/footer.php"; ?>