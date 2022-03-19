<?php
  $server = "localhost";
  $user = "root";
  $pass = "";
  $database = "dblatihan1";

  $koneksi = mysqli_connect($server, $user, $pass, $database)or die(mysqli_error($koneksi));


  if(isset($_POST['bsimpan']))
  {

    $simpan = mysqli_query($koneksi, "INSERT INTO `users`(`id_user`, `username`, `password`)
      VALUES ('NULL',
              '$_POST[tjam]',
              '$_POST[tprioritas]' 
            )");
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
            alert('Simpan data GAGAL!!');
            document.location='login.php';
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
    <div class="login-page">
      <div class="container d-flex align-items-center">
        <div class="form-holder has-shadow">
          <div class="row">
            <!-- Logo & Information Panel-->
            <div class="col-lg-6">
              <div class="info d-flex align-items-center">
                <div class="content">
                  <div class="logo">
                    <h1>Dashboard</h1>
                  </div>
                  
                </div>
              </div>
            </div>
            <!-- Form Panel    -->
            <div class="col-lg-6 bg-white">
              <div class="form d-flex align-items-center">
                <div class="content">
                  <form class="text-left form-validate">
        <div class="form-group">
          <label>jam</label>
          <input type="text" name="tjam" value="<?=@$vjam?>" class="form-control" placeholder="Input Nim anda disini!" required>
        </div>

        <div class="form-group">
          <label>prioritas</label>
          <input type="text" name="tprioritas" value="<?=@$vprioritas?>" class="form-control" placeholder="Input Nim anda disini!" required>
        </div>

        <button type="submit" class="btn btn-outline-success" name="bsimpan">Simpan</button>

                  </form><small>Already have an account? </small><a href="login.php" class="signup">Login</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="copyrights text-center">
        <p>Design by <a href="https://bootstrapious.com" class="external">Bootstrapious</a></p>
        <!-- Please do not remove the backlink to us unless you support further theme's development at https://bootstrapious.com/donate. It is part of the license conditions. Thank you for understanding :)-->
      </div>
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
<?php  
mysql_close($koneksi);
ob_end_flush();
?>