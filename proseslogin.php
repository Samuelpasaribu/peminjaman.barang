<?php
   session_start();
   require_once("config/koneksi.php");
   $username = $_POST['username'];
   $password = $_POST['password'];

   $query = $mysqli->query("SELECT * FROM admin WHERE username='$username' AND password='$password'");
   print_r($query);
	if(mysqli_num_rows($query) == 0){
		echo '<div class="alert alert-danger">Maaf Login gagal.</div>';
	}else{
		$row = mysqli_fetch_assoc($query);

		if($row){
			$_SESSION['admin']=$username;
			header("Location: dashboard.php");
		}
	}
?>