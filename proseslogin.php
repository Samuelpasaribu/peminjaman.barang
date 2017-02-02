<?php
   session_start();
   require_once("config/koneksi.php");
   $username = $_POST['username'];
   $password = $_POST['password'];

   $query = mysql_query("SELECT * FROM admin WHERE username='$username' AND password='$password'");
	if(mysql_num_rows($query) == 0){
		echo '<div class="alert alert-danger">Maaf Login gagal.</div>';
	}else{
		$row = mysql_fetch_assoc($query);
	
		if($row){
			$_SESSION['admin']=$username;
			header("Location: dashboard.php");				
		}
	}
?>