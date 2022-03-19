<?php  
  session_start();
  $_SESSION['user_login'] = 0;
  $_SESSION['user_id'] = 0;
  $_SESSION['nama'] = 0;
  $_SESSION['username'] = 0;
  unset($_SESSION['user_login']);
  unset($_SESSION['user_id']);
  unset($_SESSION['nama']);
  unset($_SESSION['username']);
  session_unset();
  session_destroy();

?>
  <head>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="vendor/font-awesome/css/font-awesome.min.css">
    <!-- Custom Font Icons CSS-->
    <link rel="stylesheet" href="css/font.css">
    <!-- Google fonts - Muli-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Muli:300,400,700">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="css/style.default.css" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="css/custom.css">
    <!-- Favicon-->
    <link rel="shortcut icon" href="img/favicon.ico">

    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
  </head>
  <body>
<div class="sis">
    <font color="#fffff" class="font_awal">SISTEM KALKULATOR LISTRIK</font>
  </div>
  <div class="home">
    <a href="?page=Dashboard">
      <font color="#fffff">HOME</font>
    </a>
  </div>
  <div class="device">
    <a href="?page=Device">
      <font color="#fffff">DEVICE</font>
    </a>
  </div>
  <div class="pasca">
    <a href="?page=Pasca">
      <font color="#fffff">PASCA BAYAR</font>
    </a>
  </div>
  <div class="hasil">
    <a href="?page=Hasil">
      <font color="#fffff">HASIL</font>
    </a>
  </div>
  <div class="gar"></div>
  <a href="login.php">
    <div class="login">
      <font color="#fffff" class=" login_t">LOGIN</font>
    </div>
  </a>
  <div class="img_lis">
    <img src="photo/image 1.png" style="width: 540px;height: 600px;">
  </div>


    <?php
    /* handle error */
    if (isset($_GET['error'])) : ?>
        <div class="alert alert-warning alert-dismissible" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <strong>Warning!</strong> <?=base64_decode($_GET['error']);?>
        </div>
    <?php endif;?>

       
        <div>
        <div >
            <em class="glyphicon glyphicon-user"></em>
        </div>
            <form action="check-login.php"  method="post">
            	<div class="isian">
    <div class="login_m">
      <font color="#fffff">LOGIN</font>
    </div>
    <div class="tolong">
      <font color="#fffff">Tolong! masukkan e-mail dan password anda</font>
    </div>

    <div >
      <input type="text" class="i_user" name="username" placeholder="Email">
    </div>

    <div >
      <input type="password" class="i_pass" name="password" placeholder="Password">
    </div >
      <button type="submit" class="btn btn-dark login_s" value="LOGIN">Login</button>
    
            </form>
        </div>
		<br>
		<div class="donot">
			<small >tidak punya akun? </small>
			<a href="reg.php" class="signup">Signup</a>
		</div>
 
                  

    <!-- JavaScript files-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/popper.js/umd/popper.min.js"> </script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="vendor/jquery.cookie/jquery.cookie.js"> </script>
    <script src="vendor/chart.js/Chart.min.js"></script>
    <script src="vendor/jquery-validation/jquery.validate.min.js"></script>
    <script src="js/front.js"></script>
  </body>


