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
            document.location='register.php';
             </script>";
      }
      else
      {
        echo("Error description: " . $koneksi -> error);
        echo "<script>
            
            
             </script>";


      }
  }

  
?>

<div class="col-md-3 col-sm-6">
  <div class="statistic-block block">
        <div class="title"><strong>FORM</strong></div>
      <form method="post" action="">

        <div class="form-group">
          <label>nama</label>
          <input type="text" name="tnama" value="<?=@$vnama?>" class="form-control" placeholder="Input Nim anda disini!" required>
        </div>


        <div class="form-group">
          <label>jumlah</label>
          <input type="text" name="tjumlah" value="<?=@$vjumlah?>" class="form-control" placeholder="Input Nim anda disini!" required>
        </div>

        <button type="reset" class="btn btn-outline-warning" name="breset">Kosongkan</button>
        <button type="submit" class="btn btn-outline-success" name="bsimpan">Simpan</button>


      </form>

  </div>
</div>

<div class="col-md-9 col-sm-6">
  <div class="block margin-bottom-sm">
    
  <div class="block">
    <div class="title"><strong>Data Device</strong></div>
    <div class="table-responsive"  style="height: 480px;"> 
      <table class="table table-striped" >
        <thead>
          <tr>
            <th>Id</th>
            <th>Nama</th>
            <th>Daya(Watt)</th>
            <th>Jumlah</th>
            <th>Jam</th>
            <th>Prioritas</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php  
            $tampil = $tampil = mysqli_query($koneksi, "SELECT * from device WHERE  `id_user` = '1' ");
          while($data = mysqli_fetch_array($tampil)) :

          ?>
          <tr>
            <td><?=$data['id']?></td>
            <td><?=$data['Nama']?></td>
            <td><?=$data['Daya(Watt)']?></td>
            <td><?=$data['Jumlah']?></td>
            <td><?=$data['Jam']?></td>
            <td><?=$data['Prioritas']?></td>
            <td>
              <a href="index.php?page=Device&hal=edit&id=<?=$data['id']?>" class="btn btn-outline-info"> Edit </a>
              <a href="index.php?page=Device&hal=hapus&id=<?=$data['id']?>" class="btn btn-outline-danger">Hapus</a>
            </td>
          </tr>
        <?php endwhile; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
  </div>
</div>