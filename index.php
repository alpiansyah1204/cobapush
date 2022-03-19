<?php
$server = "localhost";
$user = "root";
$pass = "";
$database = "dblatihan1";
$koneksi = mysqli_connect($server, $user, $pass, $database)or die(mysqli_error($koneksi));
ob_start();
session_start();

if ( !isset($_SESSION['username'])  ) {
    
    header('location:home.php');
    exit();
} 
?>
<head>  
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Calculator Listrik</title>
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
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body>  

<div class="sis" style="position: fixed;">
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
  
    <div class="username_i">
      <font color="#fffff" class="username_i_t">
        <?php
            echo $_SESSION['username'];
              ?>
      </font>
    </div>
    <a href="logout.php">
      <div class="logout_l"> 
          <font color="#fffff">Logout</font>
          <i class="icon-logout" ></i>
      </div>
    </a>
    <div class="garis">
      
    </div>
  <div class="img_lis">
    <img src="photo/image 1.png" style="width: 540px;height: 600px;">
  </div>
  <div>
    <?php
                if(@$_GET['page'] == '' || @$_GET['page'] == 'Dashboard' ){
                  include "halaman/dashboard.php";
                }
                

                else if(@$_GET['page'] == 'Device' ){
                  include "halaman/Device.php";
                }

                else if(@$_GET['page'] == 'Hasil' ){
                  
                  $myfile = fopen("python/variable.txt", "w") or die("Unable to open file!");
                  $txt = $_SESSION['user_id'];
                  fwrite($myfile, $txt);
                  fclose($myfile);

                  include "halaman/hasil.php";
                }

                else if(@$_GET['page'] == 'Pasca' ){
                  include "halaman/pasca.php";
                }

                else if(@$_GET['page'] == 'Error' ){
                  include "halaman/error hasil.php";
                }
              ?>
  </div>
</body>