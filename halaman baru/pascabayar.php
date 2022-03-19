
<?php 
//index.php
$connect = mysqli_connect("localhost", "root", "", "dblatihan1");
$query = "SELECT * FROM fitness WHERE `id_user` = '$_SESSION[user_id]'";
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

<!DOCTYPE html>
<html>
 <head>

  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
  
 </head>
 <body>
  <?php
            echo $_SESSION['user_id'];
              ?>
  <br /><br />
  <div class="container" style="width:2000px; height: 1000px;">
   <div id="line-chart"></div>
  </div>
 </body>
</html>

<script>
Morris.Line({
 element : 'line-chart',
 pointSize: 0,
 data:[<?php echo $chart_data; ?>],
 xkey:'id',
 ykeys:['best_fitness',  'mean_fitness'],
 labels:['best_fitness',  'mean_fitness'],
 hideHover:'auto',
 stacked:true

});
</script>
