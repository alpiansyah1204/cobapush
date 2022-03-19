
<?php 
//index.php
$connect = mysqli_connect("localhost", "root", "", "dblatihan1");
$query = "SELECT * FROM fitness WHERE `id_user` = '$_SESSION[user_id]' ";
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
  

  <br /><br />
  <div class="col-md-12 col-sm-6">
    <div class="statistic-block block">
    <a href="python/python1.py" style="color:black;width: 100%;">
  <button   type="button" class="btn btn-light" style="width: 100%;-ms-transform: translate(40%, 40%);transform: translate(0%, -10%);">Kalkulasi</button></a>
</div>
  </div>


  <div class="col-md-9 col-sm-6">
  	  <div class="statistic-block block">
  	  	<div class="title"><strong>Grafik perkembangan fitness</strong></div>
     <div id="line-chart"></div>
 </div>
  </div>

  <div class="col-md-3 col-sm-6">
      <div class="statistic-block block" style="height: 418px;">
        <div class="title"><strong style="text-align: center;"><h3>Hasil Fitness</h3></strong></div>
<br><br>       <?php  
            $tampil = mysqli_query($connect, "SELECT * from hasil WHERE  `id_user` = '$_SESSION[user_id]' ");
            while($data = mysqli_fetch_array($tampil)):
          ?>
        <h4 style="text-align: center;">Fitness Terbaik</h4>
        <h2 style="text-align: center;"><?=$data['value']?></h2>
        <br> <br> 
        <h4 style="text-align: center;">Total Kwh terpakai</h4>
        <h2 style="text-align: center;"><?=$data['kwh']?> Kwh</h2>
      <?php endwhile;?>
      </div>
    </div>

<div class="col-md-12 col-sm-6">
  <div class="block margin-bottom-sm">
    
  <div class="block">
    <div class="title"><strong>Rekomendasi penggunaan device</strong></div>
    <div class="table-responsive"  style="height: 480px;"> 
      <table class="table table-striped" >
        <thead>
          <tr style="position: -webkit-sticky; position: sticky;top: 0; ">
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
  </div>




<script>
Morris.Line({
 element : 'line-chart',
 pointSize: 0,
 data:[<?php echo $chart_data; ?>],
 xkey:'id',
 ykeys:['best_fitness',  'mean_fitness'],
 labels:['best_fitness','mean_fitness'],
 hideHover:['auto'],
 parseTime: false,
 stacked: false

});
</script>
