<?php  
  $server = "localhost";
  $user = "root";
  $pass = "";
  $database = "dblatihan1";

  $koneksi = mysqli_connect($server, $user, $pass, $database)or die(mysqli_error($koneksi));
  
  if(isset($_POST['breset']))
  {
    $id = $_GET['id'];
    $tampil = mysqli_query($koneksi, "SELECT * FROM `device` WHERE id =
        '$id' AND `id_user` = '$_SESSION[user_id]' ");
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
      $id = $_GET['id'];
      
      //Data akan di edit
      $edit = mysqli_query($koneksi, "UPDATE `device` SET 
                                `id`= '$id',
                                `Nama`='$_POST[tnama]',
                                `Daya(Watt)`='$_POST[tdaya]',
                                `Jumlah`='$_POST[tjumlah]',
                                `Jam`='$_POST[tjam]',
                                `Prioritas`='$_POST[tprioritas]' ,
                                `id_user`='$_SESSION[user_id]',
                                `H`='$_POST[tH]' ,
                                `M`='$_POST[tM]' 


                                WHERE  `id`='$id'
                       ");
      if($edit) //jika edit sukses
      {
        
        echo "<script>
            alert('Edit data suksess!');
            document.location='index.php?page=Device';
             </script>";
      }
      else
      {
        
        echo "<script>
            alert('Edit data GAGAL!!');
            document.location='index.php?page=Device';
             </script>";

      }
    }
    else
      {
    $simpan = mysqli_query($koneksi, "INSERT INTO `device`(`id`, `Nama`, `Daya(Watt)`, `Jumlah`, `Jam`, `Prioritas`,`id_user`, `H`, `M`)   
      VALUES ('NULL',
              '$_POST[tnama]',
              '$_POST[tdaya]',
              '$_POST[tjumlah]',
              '$_POST[tjam]',
              '$_POST[tprioritas]','$_SESSION[user_id]', '$_POST[tH]','$_POST[tM]' 
            )");
    if($simpan) //jika simpan sukses
      {
        echo "<script>
            alert('Simpan data suksess!');
            document.location='index.php?page=Device';
             </script>";
      }
      else
      {
        echo "<script>
            alert('Simpan data GAGAL!!');
            document.location='index.php?page=Device';
             </script>";

      }

  }
  }

  if (isset($_GET['hal']))
  {
    if($_GET['hal']=="edit")
    {
      $tampil = mysqli_query($koneksi, "SELECT * FROM `device` WHERE id =
        '$_GET[id]' ");
      $data =  mysqli_fetch_array($tampil);
      if($data)
      {
        $vid = $data['id'];
        $vnama = $data['Nama'];
        $vdaya =    $data['Daya(Watt)'];
        $vjumlah = $data['Jumlah'];
        $vjam =    $data['Jam'];
        $vprioritas =    $data['Prioritas'];
        $vH =    $data['H'];
        $vM =    $data['M'];

      }
    }
    else if ($_GET['hal'] == "hapus")
    {
      $id = $_GET['id'];
      $hapus = mysqli_query($koneksi,"DELETE FROM `device` WHERE id = '$id' ");
      if($hapus){
        echo "<script>
            alert('Hapus Data Suksess!!');
            document.location='index.php?page=Device';
             </script>";
           }
    }
  }
?>

<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet" type="text/css" href="css/style_style.css">
  <div class="masukan_data">
    <font>MASUKAN DATA DEVICE</font>
    <br>
    <font>silahkan isi informasi dibawah ini</font>
  </div>
  



        <form method="post" action="">


       <div class="form-group">
          <input type="text" name="tnama" value="<?=@$vnama?>" class="i_nama" placeholder="Input Nama Device disini!" required>
        </div>
        <div class="form-group">
          <input type="text" name="tdaya" value="<?=@$vdaya?>" class="i_daya" placeholder="Input Daya disini!" required>
        </div>
        <div class="form-group">

          <input type="text" name="tjumlah" value="<?=@$vjumlah?>" class="i_jumlah" placeholder="Input Jumlah  disini!" required>
        </div>

        <div class="form-group" style="font-size: 15px;" >

          
          <select type="text" name="tjam" value="<?=@$vjam?>" class="i_jam_p"  placeholder="Input Jam mulai digunakan " required>
            <option name="tjam" value="<?=@$vjam?>" class="i_jam_p" >--pilih lama jam digunakan--</option>
            <?php
              $no = 1;
              $tampil = mysqli_query($koneksi, "SELECT * FROM `jam` ");
              while($data = mysqli_fetch_array($tampil)) {
                echo '<option value="'.$data['value'].'">'.$data['value'].'</option>';
              }
            ?>
          </select>
        </div>

        <div class="form-group">
          
          
          <select name="tprioritas" value="<?=@$vprioritas?>" class="i_prioritas">
            <option name="tprioritas" value="<?=@$vprioritas?>" class="i_prioritas"><i style="text-align: center;">       --Pilih Prioritas--</i></option>
            <?php
                      $no = 1;
                      $tampil = mysqli_query($koneksi, "SELECT * FROM `prioritas` order by id ");
                      while($data = mysqli_fetch_array($tampil)) {
                        echo '<option value="'.$data['id'].'">'.$data['id'].'</option>';
                      }
                      ?>
          </select>
        </div>

        <div class="form-group">
          <select class="i_jam_m" data-live-search="true" data-size="1" name="tH" value="<?=@$vH?>"  >
            <option class="i_jam_m" data-live-search="true" data-size="1" name="tH" value="<?=@$vH?>" >Jam</option>
            <?php 
            for ($x = 0; $x <= 24; $x++) {
              if($x<10){

                echo '<option value="'."0".$x.'">'."0".$x.'</option>';
              }
              else {
                echo '<option value="'.$x.'">'.$x.'</option>';
              }
            }
              ?>
          </select>
          <div class="titikdua">
            <font color="#fffff">:</font>
          </div>
          

          <select  class="i_menit_m" data-live-search="true" data-size="1" name="tM" value="<?=@$vM?>"  >
            <option  class="i_menit_m" data-live-search="true" data-size="1" name="tM" value="<?=@$vM?>" >Menit</option>
            <?php 
            for ($y = 0; $y <= 60; $y++) {
              if($y<10){

                echo '<option value="'."0".$y.'">'."0".$y.'</option>';
              }
              else {
                echo '<option value="'.$y.'">'.$y.'</option>';
              }
            }
              ?>
          </select>



        </div>
        
    <button type="submit" class="btn btn-outline-success b_simpan" name="bsimpan"  >Simpan</button>
    <button type="reset" class="btn btn-outline-warning b_reset" name="breset"  >Kosongkan</button>


      </form>
      


    <div class="data_d">
      <font color="#fffff"> DATA DEVICE</font>
    </div>

    <div class="col-md-7  table_device">
  <div class="margin-bottom-sm box" >
    <div class="table-responsive"  style="height: 480px; "> 
      <table class="table table-striped ">
        <thead>
          <tr style="position: -webkit-sticky; position: sticky;top: 0; color: #ffffff; background-color: #203849;">
            <th>Id</th>
            <th>Nama</th>
            <th>Daya(Watt)</th>
            <th>Jumlah</th>
            <th>Jam</th>
            <th>Prioritas</th>
            <th>Jam digunakan</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php
            $no = 1;
            $tampil = $tampil = mysqli_query($koneksi, "SELECT * from device WHERE  `id_user` = '$_SESSION[user_id]' ");
          while($data = mysqli_fetch_array($tampil)) :

          ?>
          <tr>
            <td><?=$no++;?></td>
            <td><?=$data['Nama']?></td>
            <td><?=$data['Daya(Watt)']?></td>
            <td><?=$data['Jumlah']?></td>
            <td><?=$data['Jam']?></td>
            <td><?=$data['Prioritas']?></td>

            <td><?=$data['H']?> : <?=$data['M']?></td>
            <td>
              <a href="index.php?page=Device&hal=edit&id=<?=$data['id']?>" class="btn btn-outline-info warna_a"> Edit </a>
              
              <a href="index.php?page=Device&hal=hapus&id=<?=$data['id']?>" class="btn btn-outline-danger warna_a">Hapus</a>
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