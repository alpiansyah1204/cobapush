<?php
$server = "localhost";
$user = "root";
$pass = "";
$database = "dblatihan1";
$koneksi = mysqli_connect($server, $user, $pass, $database)or die(mysqli_error($koneksi));
ob_start();
session_start();

if ( !isset($_SESSION['username'])  ) {
    

    header('location:login.php');
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
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
  </head>
  <body >

    <header class="header">   
      <nav class="navbar navbar-expand-lg">
        <div class="search-panel">
          <div class="search-inner d-flex align-items-center justify-content-center">
            <div class="close-btn">Close <i class="fa fa-close"></i></div>
            <form id="searchForm" action="#">
              <div class="form-group">
                <input type="search" name="search" placeholder="What are you searching for...">
                <button type="submit" class="submit">Search</button>
              </div>
            </form>
          </div>
        </div>
        <div class="container-fluid d-flex align-items-center justify-content-between">
          <div class="navbar-header">
            <!-- Navbar Header--><a href="index.php" class="navbar-brand">
              <div class="brand-text brand-big visible text-uppercase"><strong class="text-primary">Calculator </strong><strong>Listrik</strong></div>
              <div class="brand-text brand-sm"><strong class="text-primary">C</strong><strong>L</strong></div></a>
            <!-- Sidebar Toggle Btn-->
            <button class="sidebar-toggle"><i class="fa fa-long-arrow-left"></i></button>
          </div>
          <div class="right-menu list-inline no-margin-bottom">    
            <div class="list-inline-item">
            </div>
            

            
            <!-- Tasks end-->

            
            <!-- Log out               -->

            <div class="list-inline-item logout" >                   
            
              <a id="logout" href="login.php" class="nav-link" name="blogout"> <span  class="d-none d-sm-inline">

              Logout </span><i class="icon-logout" ></i></a>
            </div>





          </div>
        </div>
      </nav>
    </header>
    <div class="d-flex align-items-stretch">
      <!-- Sidebar Navigation-->
      <nav id="sidebar" >
        <!-- Sidebar Header-->
        <div class="sidebar-header d-flex align-items-center">
          <div class="avatar" >
            <i class="fa fa-user  fa-4x" aria-hidden="true"></i>
            
          </div>
          <div class="title">
            <h1 class="h5">
              <?php
            echo $_SESSION['username'];
              ?></h1>
            <p></p>
          </div>
        </div>  
        <!-- Sidebar Navidation Menus--><span class="heading">Main</span>
        <ul class="list-unstyled">
          <li class=""><a href="?page=Dashboard"> <i class="icon-home"></i>Home </a></li>
          <li class="<?=@$aktif2?>" ></script><a href="?page=Device"> <i class="fa fa-laptop"></i>Device </a></li>
          <li class="<?=@$aktif2?>" ></script><a href="?page=Pasca"> <i class="fa fa-money"></i>Data pasca bayar </a></li>
          <li class="<?=@$aktif2?>" ></script><a href="?page=Hasil"> <i class="fa fa-database"></i>Hasil </a></li>

          
            
          
        </ul>
      </nav>
      <!-- Sidebar Navigation end-->
      <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">
            <h2 class="h5 no-margin-bottom">
              
            </h2>
          </div>
        </div>
        <section class="no-padding-top no-padding-bottom">
          <div class="container-fluid">
            <div class="row">
              
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
              ?>
            </div>

    <!-- JavaScript files-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/popper.js/umd/popper.min.js"> </script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="vendor/jquery.cookie/jquery.cookie.js"> </script>
    <script src="vendor/chart.js/Chart.min.js"></script>
    <script src="vendor/jquery-validation/jquery.validate.min.js"></script>
    <script src="js/charts-home.js"></script>
    <script src="js/front.js"></script>
  </body>
