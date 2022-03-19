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
<link rel="stylesheet" type="text/css" href="style.css">
<div class="col-md-3 col-sm-6"  >
  <div class="statistic-block block">
        <div class="title"><strong>FORM</strong></div>
      <form method="post" action="">


        <div class="form-group">
          <label>Nama</label>
          <input type="text" name="tnama" value="<?=@$vnama?>" class="form-control" placeholder="Input Nama anda disini!" required>
        </div>

        <div class="form-group">
          <label>Daya(watt)</label>
          <input type="text" name="tdaya" value="<?=@$vdaya?>" class="form-control" placeholder="Input Daya anda disini!" required>
        </div>

        <div class="form-group">
          <label>Jumlah</label>
          <input type="text" name="tjumlah" value="<?=@$vjumlah?>" class="form-control" placeholder="Input Jumlah anda disini!" required>
        </div>

        <div class="form-group">
          <label>Jam(Auto  atau 1-24 jam)</label>
          <input type="text" name="tjam" value="<?=@$vjam?>" class="form-control" placeholder="Input Jam anda disini!" required>
        </div>

        <div class="form-group">
          <label>Prioritas(1-9)</label>
          <input type="text" name="tprioritas" value="<?=@$vprioritas?>" class="form-control" placeholder="Input Prioritas anda disini!" required>
        </div>
        <div class="form-group">
          <label>Jam mulai perangkat digunakan</label>

          <select style="width: 70px;"  class="selectpicker" data-live-search="true" data-size="1" name="tH" value="<?=@$vH?>"  >
            <option value=>jam</option>
            <option value=00>00</option>
            <option value=01>01</option>
            <option value=02>02</option>
            <option value=03>03 </option>
            <option value=04>04</option>
            <option value=05>05 </option>
            <option value=06>06 </option>
            <option value=07>07 </option>
            <option value=08>08 </option>
            <option value=09>09 </option>
            <option value=1>10</option>
            <option value=11>11</option>
            <option value=12>12</option>
            <option value=13>13 </option>
            <option value=14>14</option>
            <option value=15>15 </option>
            <option value=16>16 </option>
            <option value=17>17 </option>
            <option value=18>18 </option>
            <option value=19>19 </option>
            <option value=20>20 </option>
            <option value=21>21</option>
            <option value=22>22</option>
            <option value=23>23 </option>
            <option value=24>24</option>
          </select>
          <p style="-ms-transform: translate(40%, 40%);transform: translate(37%, -100%);">:</p>
          <select style="width: 70px;-ms-transform: translate(40%, 40%);transform: translate(150%, -280%);"  class="selectpicker" data-live-search="true" data-size="1" name="tM" value="<?=@$vM?>"  >
            <option value=>Menit</option>
            <option value=00>00</option>
            <option value=01>01</option>
            <option value=02>02</option>
            <option value=03>03 </option>
            <option value=04>04</option>
            <option value=05>05 </option>
            <option value=06>06 </option>
            <option value=07>07 </option>
            <option value=08>08 </option>
            <option value=09>09 </option>
            <option value=10>10</option>
            <option value=11>11</option>
            <option value=12>12</option>
            <option value=13>13 </option>
            <option value=14>14</option>
            <option value=15>15 </option>
            <option value=16>16 </option>
            <option value=17>17 </option>
            <option value=18>18 </option>
            <option value=19>19 </option>
            <option value=20>20 </option>
            <option value=21>21</option>
            <option value=22>22</option>
            <option value=23>23 </option>
            <option value=24>24</option>
            <option value=25>25 </option>
            <option value=26>26 </option>
            <option value=27>27 </option>
            <option value=28>28 </option>
            <option value=29>29 </option>
            <option value=30>30 </option>
            <option value=31>31</option>
            <option value=32>32</option>
            <option value=33>33 </option>
            <option value=34>34</option>
            <option value=35>35 </option>
            <option value=36>36 </option>
            <option value=37>37 </option>
            <option value=38>38 </option>
            <option value=39>39 </option>
            <option value=40>40</option>
            <option value=41>41</option>
            <option value=42>42</option>
            <option value=43>43 </option>
            <option value=44>44</option>
            <option value=45>45 </option>
            <option value=46>46 </option>
            <option value=47>47 </option>
            <option value=48>48 </option>
            <option value=49>49 </option>
            <option value=50>50</option>
            <option value=51>51</option>
            <option value=52>52</option>
            <option value=53>53 </option>
            <option value=54>54</option>
            <option value=55>55 </option>
            <option value=56>56 </option>
            <option value=57>57 </option>
            <option value=58>58 </option>
            <option value=59>59 </option>
            <option value=60>60</option>
          </select>




        </div>
        
        <button type="reset" class="btn btn-outline-warning" name="breset" style="-ms-transform: translate(40%, 40%);transform: translate(0%, -120%);" >Kosongkan</button>
        <button type="submit" class="btn btn-outline-success" name="bsimpan" style="-ms-transform: translate(40%, 40%);transform: translate(0%, -120%);" >Simpan</button>


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
            <th>Jam digunakan</th>
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