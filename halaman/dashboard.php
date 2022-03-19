
<?php 


 $server = "localhost";
 $user = "root";
 $pass = "";
 $database = "dblatihan1";
 $koneksi = mysqli_connect($server, $user, $pass, $database)or die(mysqli_error($koneksi));
  
error_reporting(0);
?>



<link rel="stylesheet" type="text/css" href="css/style5.css">

<div class="awal_dashboard">
	<div class="device_table_b">
		<div class="title" style="font-size: 30px;">&ensp; Device</div><br>
		<div class="view">
			<a href="?page=Device">
				<font color="#ffffff">view all</font>
			</a>
		</div>
		<div class="table-responsive table_d_d"  > 
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
			
          			</tr>
        		<?php endwhile; ?>
        		</tbody>
      		</table>
    	</div>	
	</div>



	<div class="pasca_table_b" >
			<div class="title" style="font-size: 30px;">&ensp; Pasca bayar</div>
			<a href="?page=Pasca">
				<font class="view">view all</font>
		    </a>
		    <div class="table-responsive"  > 
      			<table class="table table-striped" >
        			<thead>
        			  	<tr style="background-color:#162632;color:  #ffffff ">
        			    	<th>Jumlah</th>
        			    	<th>Kwatt</th>
        			    	<th>Hari</th>
        			    	
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
  					
          				</tr>
        			<?php endwhile; ?>
        			</tbody>
      			</table>
    		</div>
	</div>	



	
</div>







<?php 
//index.php
$connect = mysqli_connect("localhost", "root", "", "dblatihan1");


$query = "SELECT * FROM fitness WHERE `id_user` = '$_SESSION[user_id]' ";  



$yatas = mysqli_query($connect, "SELECT MAX(best_fitness) FROM fitness WHERE id_user = '$_SESSION[user_id]'  ");
$ybawah= mysqli_query($connect, "SELECT MIN(mean_fitness) FROM fitness WHERE id_user = '$_SESSION[user_id]'  ");


$ymax =  mysqli_fetch_array($yatas);
$ymin = mysqli_fetch_array($ybawah);

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

  <br /><br />
<div class="box_hasil">





  <div class="grafik_table_d_d">
    <div class="grafik_table_d">
      <div class="title" style="font-size: 31px;">&ensp;Grafik perkembangan fitness</div>
      <div id="line-chart" style="height: 90%; color: #ffffff;"></div>
   </div>
  </div>
  
   <div class="hasil_d_d">
    <div class="#" >
      <div class="title">

          <br><br>
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
        <font style="text-align: center;">Total Kwh terpakai</font><br>
        <font style="text-align: center;"><?=$data['kwh']?> Kwh</font>
      <?php endwhile;?>
    </div>
  </div>


  <div class="hasil_table_b">
    <div class="title" style="font-size: 30px; position: absolute;top: 10px;">&ensp;&ensp;Rekomendasi penggunaan device</div>
      <div class="table-responsive table_r_d " > 
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
