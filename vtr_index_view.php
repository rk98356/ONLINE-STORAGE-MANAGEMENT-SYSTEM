<?php include('vtr_header.php');?>
<?php include('vtr_top_menu.php');?>
<?php include('vtr_side_nav.php');?>
<!--<img src="img/cloud.jpg" style="height:750px;width:100%;padding: 120px;margin-top: -80px;" alt="No Image Found">-->
	<?php      
					$size=0;
          $e="";
					$query ="SELECT * FROM `users` where `created_by` ='".$_SESSION['username']."'";
           			$con = mysqli_connect('localhost','root','','task_management');
           			$result =  mysqli_query($con,$query);
           			while ($row = mysqli_fetch_array($result)) 
           			{
      					$size=$size+$row['size'];
      				}
              if($size>8589934592)
              {
      				$fsize=round($size / 1024 / 1024 / 1024 , 2);
              $e=$fsize.'GB';
      				//echo $fsize.'GB';
              }
              else
              {
               $fsize=round($size / 1024 / 1024 , 1);
              $e=$fsize.'MB';
              //echo $fsize.'MB'; 
              }

					$size=0;
          $rsize=0;
          $ec="";
					$query ="SELECT * FROM `users` where `created_by` ='".$_SESSION['username']."'";
           			$con = mysqli_connect('localhost','root','','task_management');
           			$result =  mysqli_query($con,$query);
           			while ($row = mysqli_fetch_array($result)) 
           			{
      					$size = $size + $row['size'];
      					$rsize = 16106127360 - $size;
      				}
              if($rsize>8589934592)
              {
              $f1size=round($rsize / 1024 / 1024 / 1024 , 2);
              $ec=$f1size.'GB';
              //echo $f1size.'GB';
              }
              else
              {
               $f1size=round($rsize / 1024 / 1024 , 1);
                $ec=$f1size.'MB';
              //echo $f1size.'MB'; 
              }

                  $con = mysqli_connect("localhost","root","","task_management");
                  $query ="SELECT * FROM `users` where `created_by` ='".$_SESSION['username']."'";
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
                  /*echo $pic.'<br/>';
                  echo $doc.'<br/>';
                  echo $pdf.'<br/>';
                  echo $web.'<br/>';
                  echo $mp3.'<br/>';
                  echo $mp4.'<br/>';*/
                }

?>
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
          title: 'File Uploaded'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>      
        <div class="container-fluid" style="margin-top: 2%;width: 1200px;">
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8" style="background:white; min-height: 450px; border:2px solid green; border-radius:0px 10px 10px 0;">
                    <h5>Storage Reports</h5><br/>
                      <div class="row"  style="background:white; min-height: 450px; ">
                        <div id="piechart" class="col-md-8"></div>    
                        <div class="col-md-4"><br/><br/><br/><br/><br/><br/>Total Storage Used:<?php echo $e; ?><br/><br/>Total Remaining Space:<?php echo $ec; ?></div>    
                      </div>
                   </div>
                <div class="col-md-2"></div>
            </div>
        </div>
    </div>
<?php include('vtr_footer.php');?>
<?php 
 
?>