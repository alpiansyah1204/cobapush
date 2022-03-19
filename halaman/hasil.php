
<?php 
//index.php
$connect = mysqli_connect("localhost", "root", "", "dblatihan1");
$query = "SELECT * FROM fitness WHERE `id_user` = '$_SESSION[user_id]' ";


$yatas = mysqli_query($connect, "SELECT MAX(best_fitness) FROM fitness WHERE id_user = '$_SESSION[user_id]'  ");
$ybawah= mysqli_query($connect, "SELECT MIN(mean_fitness) FROM fitness WHERE id_user = '$_SESSION[user_id]'  ");


$ymax =  mysqli_fetch_array($yatas);
$ymin = mysqli_fetch_array($ybawah);
error_reporting(0);
if (array_values(array_flip(array_flip($ymax)))){
  $ymax = array_values(array_flip(array_flip($ymax)));
  $ymin = array_values(array_flip(array_flip($ymin)));  
}
  



$ymax = $ymax[0] + $ymax[0]/10000; 
$ymin = $ymin[0] ; 
$ymin = round($ymin);
$result = mysqli_query($connect, $query);
$chart_data = '';
$i = 0;
$id = 0;

while($row = mysqli_fetch_array($result))

{
 $chart_data .= "{ 
  id:".$id++.", 
  best_fitness:".$row["best_fitness"].",  
  mean_fitness:".$row["mean_fitness"].
  "}, ";


}



?>

<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
<link rel="stylesheet" type="text/css" href="css/style3.css">  
<link rel="stylesheet" type="text/css" href="css/style4.css">
  <br /><br />
<div class="box_hasil">
  <div class="#">
    <a href="python/python2.py" style="color:black;width: 100%;">
      <button   type="button" class="btn btn-light kalkulasi" >KALKULASI</button>
    </a>
  </div>

    <div class="col-md-3 col-sm-6 info_pasca">
    <div class="#" >
      <div class="title">

          <br>
          <font style="font-size: 30px;">Hasil Fitness</font>

      </div>
      <br>     
      <?php  
        $tampil = mysqli_query($connect, "SELECT * from hasil WHERE  `id_user` = '$_SESSION[user_id]' ");
        while($data = mysqli_fetch_array($tampil)):
        ?>
        <font style="text-align: center;">Fitness Terbaik</font><br>
        <font style="text-align: center;"><?=$data['value']?></font>
        <br> <br> 
        <font style="text-align: center;">Total Kwh terpakai</font>
        <font style="text-align: center;"><?=$data['kwh']?> Kwh</font>
      <?php endwhile;?>
    </div>
  </div>


  <div class="grafik_border">
    <div class="">
      <div class="title" style="font-size: 31px;">Grafik perkembangan fitness</div>
      <div id="line-chart" style="height: 90%;"></div>
   </div>
  </div>
  

  <div class="rekomendasi_fit"><br>
    <div class="title" style="font-size: 30px;">Rekomendasi penggunaan device</div><br>
      <div class="table-responsive table_r " style="height: 480px;"> 
        <table class="table table-striped " >
          <thead style="position: sticky;">
            <tr style="position: -webkit-sticky; position: sticky;top: 0; color: #ffffff; background-color: #203849;">
              <th>No.</th>
              <th>Nama</th>
              <th>Daya(Watt)</th>
              <th>Jam</th>
              <th>Prioritas</th>
              <th>Rekomendasi</th>
              <th>Jam pemakaian</th>

            </tr>
          </thead>
          <tbody>
            <?php
              $no = 1;  
              $tampil = $tampil = mysqli_query($connect, "SELECT * from h_device WHERE  `id_user` = '$_SESSION[user_id]' ");
            while($data = mysqli_fetch_array($tampil)) :

            ?>
            <tr>
              <td><?=$no++;?></td>
              <td><?=$data['Nama']?></td>
              <td><?=$data['Daya(Watt)']?></td>
              <td><?=$data['Jam']?></td>
              <td><?=$data['Prioritas']?></td>
              <td><?=$data['Rekomendasi']?></td>
              <td><?=$data['H1']?> : <?=$data['M1']?> -  <?=$data['H2']?> : <?=$data['M2']?>  </td>

            </tr>
          <?php endwhile; ?>
          </tbody>
        </table>
      </div>
    </div>






</div>


<script>
Morris.Line({
 element : 'line-chart',
 pointSize: 0,
 data:[<?php echo $chart_data; ?>],
 xkey:'id',
 ykeys:['best_fitness', 'mean_fitness'],
 ymin: 'auto',
 labels:['best_fitness','mean_fitness'],



 hideHover:['auto'],
 parseTime: false,
 stacked: false,


});
</script>
