<!DOCTYPE html>
<html>
    <head>
        <!--Import materialize.css-->
        <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>

        <!--Let browser know website is optimized for mobile-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
        <link href="bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="login.css">
    </head>

    <body style="background: #DD5E89;
background: -webkit-linear-gradient(to left, #DD5E89 , #F7BB97);
background: linear-gradient(to left, #DD5E89 , #F7BB97);">

  
             <?php 
                if(!isset($_session['username'])){
                    $_session['username']="";
                }
                echo $_session['username']; ?>
       <div class="container">
        <div class="login-container">
                <div id="output"></div>
                <div class="avatar">
                    <p style="margin-top: 40px">Admin</p>
                </div>
                <div class="form-box">
                    <form action="proseslogin.php" method="post">
                        <input name="username" type="text" placeholder="username">
                        <input type="password" name="password" placeholder="password">
                    <button class="btn btn-info btn-block login" type="submit">Login</button>
                    <a href="user/login_anggota.php" class="btn btn-info btn-block">Login Sebagai Anggota</a>
                    </form>
                </div>
         </div>  
    </div>
       
      
    
        <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
        <script type="text/javascript" src="js/materialize.min.js"></script>
    </body>
</html>