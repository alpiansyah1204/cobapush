<?php
  $server = "localhost";
  $user = "root";
  $pass = "";
  $database = "dblatihan1";

  $koneksi = mysqli_connect($server, $user, $pass, $database)or die(mysqli_error($koneksi));


  if(isset($_POST['bsimpan']))
  {
    $username = $_POST['tnama'];
    $password = $_POST['tjumlah'];
    
    $simpan = mysqli_query($koneksi, "INSERT INTO `users`(`id_user`, `username`, `password`)
      VALUES ('NULL','$username',md5('$password'))");
    if($simpan) //jika simpan sukses
      {
        echo "<script>
            alert('Simpan data suksess!');
            document.location='login.php';
             </script>";
      }
      else
      {
        
        echo "<script>
            alert('Simpan data Gagal!');
            document.location='reg.php';
             </script>";
            



      }

  }

  
?>
 
  <head>

    <link rel="stylesheet" type="text/css" href="css/style.css">

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
       
        <div>
        <div >
            <em class="glyphicon glyphicon-user"></em>
        </div>
            <form action="check-login.php"  method="post">
              <div class="isian">
    <div class="signup_s">
      <font color="#fffff">SIGN UP</font>
    </div>
    <div class="silahkan">
      <font color="#fffff">Silakan isi informasi di bawah ini:</font>
    </div>


    

            </form>
        </div>
    <br>


        <form method="post" action="">
        
        <div class="form-group">
          
          <input type="text" name="tnama" value="<?=@$vnama?>" class="form-control i_user" placeholder="Input Email anda disini!" required>
        </div>


        <div class="form-group">
          
          <input type="password" name="tjumlah" value="<?=@$vjumlah?>" class="form-control i_pass" placeholder="Input Password anda disini!" required>
        </div>


        <button type="submit" class="btn btn-primary login_s" name="bsimpan">Simpan</button>

    <div class="donot">
      <small style="color:  #808080;">sudah punya akun? </small>
      <a href="login.php" class="signup">Login</a>
    </div>
        
      </form>
 
                  

    <!-- JavaScript files-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/popper.js/umd/popper.min.js"> </script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="vendor/jquery.cookie/jquery.cookie.js"> </script>
    <script src="vendor/chart.js/Chart.min.js"></script>
    <script src="vendor/jquery-validation/jquery.validate.min.js"></script>
    <script src="js/front.js"></script>
  </body>


