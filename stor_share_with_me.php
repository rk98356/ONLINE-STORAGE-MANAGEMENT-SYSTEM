<?php include('vtr_header.php');?>
<?php include('vtr_top_menu.php');?>
<?php include('vtr_side_nav.php');?>
<div class="container" >
        <div class="row" style="margin-top: 5%; height: 60vh;">
        	<div class="col-md-1"></div>
        	<form class="col-md-10 container" style="background: #fff; color:rgb(0,0,51); padding-top:5px;min-height:70vh;overflow: scroll;">
        		<div class="row" style="border-bottom: 2px solid rgb(0,0,51);">
        			<div class="col-md-3"><i class="fa fa-share-alt-square" aria-hidden="true"></i> &nbsp;<b>Shared</b></div>
        			<div class="col-md-4"></div>
        			<div class="col-md-2">
        				<label><?php echo date('d-m-Y');?></label>
        			</div>
        			<div class="col-md-3">
                        <div id="time-cont"></div>
        				<!-- <label><?php echo date('H:i:s a');?></label>  -->  	
        			</div>		
        	    </div>
	<h4 class="section-title">SHARED WITH ME</h4>
		<div class="table-responsive">
			<table class="table table-condensed table-striped table-bordered dataTable">
				<thead>
					<tr>
					<th>S No.</th>
					<th>Name</th>
					<th>Shared By</th>
					<th>Shared Date</th>
					</tr>
				</thead>
				<tbody>
				<?php      
					$query ="SELECT * FROM `users` where `share_with` ='".$_SESSION['username']."'";
           			$con = mysqli_connect('localhost','root','','task_management');
           			$result =  mysqli_query($con,$query);
           			$s_no=1;
           			while ($row = mysqli_fetch_array($result)) {
      			echo'<tr>
                	<td>'.$s_no.'</td>
               		<!--<td><a href="zip.php?dir='.$row["image"].'" download>'.substr($row["image"],0,20).'...</a></td>-->
                  <td><a href="'.$row["image"].'" target="_blank">'.substr($row["image"],0,20).'...</a></td>
                	<td>'.$row["created_by"].'</td>
                	<td>'.$row["share_date"].'</td>
            		</tr>';
            $s_no++;}

			?>
				</tbody>
			</table>
		</div>
    </form>
     <div class="col-md-1"></div>
      </div>
</div>
<?php include('vtr_footer.php');?>