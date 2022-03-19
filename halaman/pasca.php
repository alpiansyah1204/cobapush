<?php
  $server = "localhost";
  $user = "root";
  $pass = "";
  $database = "dblatihan1";

  $koneksi = mysqli_connect($server, $user, $pass, $database)or die(mysqli_error($koneksi));
  if(isset($_POST['breset']))
  {
    $tampil = mysqli_query($koneksi, "SELECT * FROM `pasca` WHERE `id_user` = '$_SESSION[user_id]'");
      $data =  mysqli_fetch_array($tampil);
      if($data)
      {
        $vid = NULL;
        $vnama = NULL;
        $vdaya =    NULL;
        $vjumlah = NULL;
        $vjam =    NULL;
        $vprioritas =    NULL;

      }
  }

  if(isset($_POST['bsimpan']))
  {
    //Pengujian Apakah data akan diedit atau disimpan baru
    if($_GET['hal'] == "edit")
    {
      //Data akan di edit
      $edit = mysqli_query($koneksi, "UPDATE `pasca` SET 
                                `id`= 'NULL' ,
                                `jumlah`='$_POST[tjumlah]',
                                `kwatt`='$_POST[tkwatt]',
                                `hari`='$_POST[thari]',
                                `id_user` = '$_SESSION[user_id]' 

                                WHERE `id_user` = '$_SESSION[user_id]'
                       ");
      if($edit) //jika edit sukses
      {
        echo "<script>
            alert('Edit data suksess!');
            document.location='index.php?page=Pasca';
             </script>";
      }
      else
      {
        echo "<script>
            alert('Edit data GAGAL!!');
            document.location='index.php?page=Pasca';
             </script>";
      }
    }
    else
      {
    $simpan = mysqli_query($koneksi, "INSERT INTO `pasca` 
      (`id`, `jumlah`, `kwatt`, `hari`, `id_user`) VALUES ('NUll','$_POST[tjumlah]',
'$_POST[tkwatt]',
'$_POST[thari]',
'$_SESSION[user_id]' )
                       ");
    if($simpan) //jika simpan sukses
      {
        echo "<script>
            alert('Simpan data suksess!');
            document.location='index.php?page=Pasca';
             </script>";
      }
      else
      {
        echo "<script>
            alert('Simpan data GAGAL!!');
            document.location='index.php?page=Pasca';
             </script>";

      }

  }
  }

  if (isset($_GET['hal']))
  {
    if($_GET['hal']=="edit")
    {
      $tampil = mysqli_query($koneksi, "SELECT * FROM `pasca` WHERE `id_user` = '$_SESSION[user_id]' ");
      $data =  mysqli_fetch_array($tampil);
      if($data)
      {
        $vjumlah = $data['jumlah'];
        $vkwatt =    $data['kwatt'];
        $vhari = $data['hari'];

      }
    }
    else if ($_GET['hal'] == "hapus")
    {
      $hapus = mysqli_query($koneksi,"DELETE FROM `pasca` WHERE `id_user` = '$_SESSION[user_id]'");
      if($hapus){
        echo "<script>
            alert('Hapus data suksess!');
            document.location='index.php?page=Pasca';
             </script>";
    }
  }
}
?>



<link rel="stylesheet" type="text/css" href="css/style2.css">
<link rel="stylesheet" type="text/css" href="css/style3.css">

  <div class="masukan_data">
    <font>MASUKAN DATA DEVICE</font>
    <br>
    <font>silahkan isi informasi dibawah ini</font>
  </div>

      <form method="post" action="">

        <div class="form-group">

          <input type="text" name="tjumlah" value="<?=@$vjumlah?>" class="i_daya" placeholder="Input Jumlah nominal disini!" required>
        </div>

        <div class="form-group">
          <input type="text" name="tkwatt" value="<?=@$vkwatt?>" class="i_jumlah" placeholder="Input Kwatt anda disini!" required>
        </div>

        <div class="form-group">
          
          <input type="text" name="thari" value="<?=@$vhari?>" class="i_jam" placeholder="Input Hari anda disini!" required style="font-size: 20px;">
        </div>

        <button type="reset" class="btn btn-outline-warning b_simpan_p" name="breset">Kosongkan</button>
        <button type="submit" class="btn btn-outline-success b_reset_p" name="bsimpan">Simpan</button>


      </form>
<div class="data_d_p">
  <font color="#ffffff">DATA PASCA BAYAR</font>
</div>

<div class="col-md-7  table_device_p" >
  <div class="margin-bottom-sm box_p">
    <div class="table-responsive"  > 
      <table class="table table-striped" >
        <thead>
          <tr style="background-color:#162632;color:  #ffffff ">
            <th>Jumlah</th>
            <th>Kwatt</th>
            <th>Hari</th>
            <th>aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php  
            $tampil = $tampil = mysqli_query($koneksi, "SELECT * from pasca WHERE  `id_user` = '$_SESSION[user_id]' ");
          while($data = mysqli_fetch_array($tampil)) :
          ?>
          <tr>
            <td><?=$data['jumlah']?></td>
            <td><?=$data['kwatt']?></td>
            <td><?=$data['hari']?></td>
  
            <td>
              <a href="index.php?page=Pasca&hal=edit&id=1" class="btn btn-outline-info warna_a"> Edit </a>
              <a href="index.php?page=Pasca&hal=hapus&id=1" class="btn btn-outline-danger warna_a"> Hapus</a>
            </td>
          </tr>
        <?php endwhile; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
