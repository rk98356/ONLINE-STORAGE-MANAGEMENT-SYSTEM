<!--<?php include('vtr_header.php');?>
<?php include('vtr_top_menu.php');?>
<?php include('vtr_side_nav.php');?>
<div class="container-fluid" style="overflow: scroll;" >
        <div class="row" style="margin-top: 5%; height: 60vh;">
        	<div class="col-md-2"></div>
        	<form class="col-md-8 container" style="background: #fff; color:rgb(0,0,51); min-height:70vh;">
        		<div class="row" style="border-bottom: 2px solid rgb(0,0,51);">
        			<div class="col-md-3"><i class="fa fa-folder" aria-hidden="true"></i> &nbsp;<b>My Folder</b></div>
        			<div class="col-md-4"></div>
        			<div class="col-md-2">
        				<label><?php echo date('d-m-Y');?></label>
        			</div>
        			<div class="col-md-3">
                        <div id="time-cont"></div>
        				<label><?php echo date('H:i:s a');?></label> 	
        			</div>		
        	    </div>
					<a href="#" data-toggle="modal" data-target="#upload_folder">
						<input type="submit" name="upload_folder" value="Upload" style="margin-top: 10px;" class="btn-xs btn-success pull-right"/>
					</a>
	<br/><h4 class="section-title">MY FILES & FOLDERS</h4>
		<div class="table-responsive">
			<table class="table-condensed table-striped table table-bordered dataTable">
				<thead>
					<tr>
					<th>S No.</th>
					<th>Name</th>
					<th>Shared By</th>
					<th></th>
					</tr>
				</thead>
				<tbody>
				<tr>
					<td>1.</td>
					<td>My Folder</td>
					<td>abc@gmail.com</td>
					<td>
						<center>
						<div class="dropdown">
    						<button class="btn dropdown-toggle" type="button" data-toggle="dropdown">More</button>
 							<ul class="dropdown-menu">
    						  <li><a class="dropdown-item" href="#">Download</a></li>
    						  <li><a class="dropdown-item" href="#" data-toggle="modal" data-target="#share_to">Share To</a></li>
    						  <li><a  class="dropdown-item" href="#" data-toggle="modal" data-target="#trash1">Move To Trash</a></li>
    						  
    						  
    						</ul>
 						</div>
						</center>
					</td>
				</tr>
				<tr>
					<td>2.</td>
					<td>Hello.html</td>
					<td>xyz@gmail.com</td>
					<td>
						<center>
						<div class="dropdown">
    						<button class="btn dropdown-toggle" type="button" data-toggle="dropdown">More</button>
    						<ul class="dropdown-menu">
    						  <li><a class="dropdown-item" href="#">Rename</a></li>
    						  <li><a class="dropdown-item" href="#" data-toggle="modal" data-target="#share_to">Share To</a></li>
    						  <li><a  class="dropdown-item" href="#" data-toggle="modal" data-target="#trash1">Move To Trash</a></li>
    						  
    						</ul>
 						</div>
						</center>
					</td>
				</tr>
				<tr>
					<td>3.</td>
					<td>Song.mp3</td>
					<td>jkl@gmail.com</td>
					<td>
						<center>
						<div class="dropdown">
    						<button class="btn dropdown-toggle" type="button" data-toggle="dropdown">More</button>
    						<ul class="dropdown-menu">
    						  <li ><a class="dropdown-item" href="#">Rename</a></li>
    						  <li><a class="dropdown-item" href="#" data-toggle="modal" data-target="#share_to">Share To</a></li>
    						  <li><a  class="dropdown-item" href="#" data-toggle="modal" data-target="#trash1">Move To Trash</a></li>
    						</ul>
 						</div>
						</center>
					</td>
				</tr>
				</tbody>
			</table>
		</div>
    </form>
     <div class="col-md-2"></div>
      </div>
</div>
<?php include('vtr_footer.php');?>-->