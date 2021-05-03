<?php
									$con = mysqli_connect("localhost","root","","task_management");
									$query = "SELECT * FROM `users`";
									//echo $query;
									$pic=0;
									$doc=0;
									$pdf=0;
									$web=0;
									$mp3=0;
									$mp4=0;
									$result= mysqli_query($con,$query);
									if(mysqli_num_rows($result) > 0){

										while($row = mysqli_fetch_array($result))
										{
					        			$ext = strtolower(pathinfo($row['image'], PATHINFO_EXTENSION));
					        			if($ext =="png" || $ext == "jpg"|| $ext == "jpeg" || $ext == "gif"|| $ext == "bmp"){$pic++;}
					        			if($ext =="php" || $ext == "html"|| $ext == "htm" || $ext == "css"|| $ext == "js"){$doc++;}
					        			if($ext =="pdf"){$pdf++;}
					        			if($ext =='ppt' || $ext =='pptx' || $ext =='doc' || $ext =='docx' || $ext =='xls' || $ext =='xlsx'){$web++;}
										if($ext =='mp3' || $ext == 'wav' || $ext == 'wma'){$mp3++;}
										if ($ext == 'mp4' || $ext == '3gp' || $ext == 'ogg' || $ext == 'webm' || $ext == 'flv' || $ext  == 'avi'){$mp4++;}
										}
									echo $pic.'<br/>';
									echo $doc.'<br/>';
									echo $pdf.'<br/>';
									echo $web.'<br/>';
									echo $mp3.'<br/>';
									echo $mp4.'<br/>';
								}

?>
<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['File Type', 'Total Size / Count'],
          ['Pictures',   <?php echo $pic; ?>],
          ['Audio',<?php echo $mp3; ?>],
          ['Video',<?php echo $mp4; ?>],
          ['Documents',<?php echo $doc; ?>],
          ['PDF',<?php echo $pdf; ?>],
          ['Webpages',<?php echo $web; ?>]
        ]);

        var options = {
          title: 'My Daily Activities'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    <div id="piechart" style="width: 900px; height: 500px;"></div>
  </body>
</html>
