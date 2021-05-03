<?php include('vtr_header.php');?>
<?php include('vtr_top_menu.php');?>
<?php include('vtr_side_nav.php');?>
<div class="container-fluid" style="overflow: scroll;" >
        <div class="row" style="margin-top: 5%;height:75vh;">
        	<div class="col-md-1"></div>
        	<form class="col-md-10 container-fluid" action="#" enctype="multipart/form-data" style="background: #fff; color:rgb(0,0,51); margin-bottom:100px; padding-bottom:15px;">
        		<div class="row" style="border-bottom: 2px solid rgb(0,0,51);">
        			<div class="col-md-3"><i class="fa fa-folder" aria-hidden="true"></i> &nbsp;<b>My Folder</b></div>
        			<div class="col-md-4"></div>
        			<div class="col-md-2">
        				<label><?php echo date('d-m-Y');?></label>
        			</div>
        			<div class="col-md-3">
                        <div id="time-cont"></div>
        				<!-- <label><?php echo date('H:i:s a');?></label>  -->  	
        			</div>		
        	    </div>
					<a href="#" data-toggle="modal" data-target="#upload_try">
						<input type="submit" name="upload" id="upfile" value="Add File" style="margin-top: 10px;" class="btn-xs btn-success pull-right"/>
					</a>
					<a href="#" data-toggle="modal" data-target="#uploadfolder_try">
						<input type="button" name="upload" id="upfolder" value="Add Folder" style="margin-top: 10px;" class="btn-xs btn-success pull-right"/>
					</a>
					<input type="hidden" name="user_id" id="user_id" value="<?php echo $_SESSION['user_id']; ?>"/>
	<h4 class="section-title">MY FILES & FOLDERS</h4>
		<div id="foldername">My Folders /</div>
		<div class="row">
			<div class="col-md-8">
				<?php
				
		  	$website = "http://localhost/";
		  	if(isset($_POST['dir']) && $_POST['dir']!='uploads/'.$_SESSION['user_id']){
				$dir = $_POST['dir'];
				$backButton= "<hr/><span style='cursor:pointer;' class='back'><span class='glyphicon glyphicon-menu-left'></span> <b>Back</b><br/></span>";
				echo $dir;
				$_SESSION['dir'] = $dir;
			}
			else{
				$dir = "uploads/".$_SESSION['user_id'];
				$backButton="<hr/>";
				echo $dir;
				$_SESSION['dir'] = $dir;
			}

		  	$pages = explode("/", $dir);
		  	//print_r($pages);
		  	foreach ($pages as $key => $value) {
		  		//echo '<span title="Double click to jump inside the folder" class="folder" path="'.$value.'">'.$value.'</span> ';
		  		
		  	}

		  		function filesize_formatted($path){
				    $size = filesize($path);
				    $units = array( 'Byte', 'KB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB');
				    $power = $size > 0 ? floor(log($size, 1024)) : 0;
				    return number_format($size / pow(1024, $power), 2, '.', ',') . ' ' . $units[$power];
				}

			
				function listFolderFiles($dir, $type){
					$idshow=1;
					$idshowit=1;
					//$dir = "uploads/".$_SESSION['user_id']."/".$dir;
					//echo $dir;
					
				    $ffs = scandir($dir);

				    unset($ffs[array_search('.', $ffs, true)]);
				    unset($ffs[array_search('..', $ffs, true)]);

				    // prevent empty ordered elements
				    if (count($ffs) < 1)
				        return;

				    echo "<div class='row'>";
				    foreach($ffs as $ff){
				        
				        if($type == 'Folders'){
					        if(is_dir($dir.'/'.$ff)){
					        	//echo $ff;
					        	$con = mysqli_connect("localhost","root","","task_management");
								$query = "SELECT * FROM users WHERE `folder_name` LIKE 'uploads/".$_SESSION['user_id']."/%' AND `trashed` ='0'";
								//echo $query;
								$result= mysqli_query($con,$query);
								if(mysqli_num_rows($result) > 0){
									$flag = 0;
								while($row = mysqli_fetch_array($result)){
									$flag++;
								}
								if($flag > 0){
						        	echo'<div class="col-sm-4 box " style="font-family:Times New Roman, Times, serif;"  data-element="'.$idshow.'">
										    <div class="inner_box">
										    <span style="float:right;">
										    	<div class="dropdown">
					    						<button class="btn  fa fa-ellipsis-v" type="button" data-toggle="dropdown"></button>
					 							<ul class="dropdown-menu">
					    						  <li><a class="dropdown-item" href="zip.php?dir='.$dir.'/'.$ff.'" target="_blank">Download</a></li>
					    						  <li><a class="dropdown-item shareto" data-type="folder" data-path="'.$ff.'" >Share To</a></li>
					    						  <li><a class="dropdown-item move_to_trash" data-path="'.$ff.'" data-type="folder" data-trash="1" data-element="'.$idshow.'">Move To Trash</a></li>			    				
					    						</ul>
					 						</div></span>
					 						<span style="cursor:pointer;" class="folder" path="'.$dir.'/'.$ff.'">
										    	<span class="glyphicon glyphicon-folder-close warning fa fa-folder" style="color:#ffa70f;"></span><br/>
										    	<span title="Double click to jump inside the folder">'.$ff.'
										    	</span>
										    </div>
										</div>';
						        	echo "<br/>";
					        	}
					        
					        	}

					        		//echo $dir.$ff;
					        }
					    }
					    if($type=='Files'){
					    	if(!is_dir($dir.'/'.$ff)){	

									$con = mysqli_connect("localhost","root","","task_management");
									$query = "SELECT * FROM `users` WHERE `image`='".$dir.'/'.$ff."' AND `trashed`='0' ";
									//echo $query;
									$result= mysqli_query($con,$query);
									if(mysqli_num_rows($result) > 0){


									$row = mysqli_fetch_array($result);

					        		$ext = strtolower(pathinfo($ff, PATHINFO_EXTENSION));
									//echo "<h3>". basename($_POST['file'], '?' . $_POST['file'])."</h3><hr/>";	
									//$file = $_POST['file'];
									if($ext =="png" || $ext == "jpg"|| $ext == "jpeg" || $ext == "gif"|| $ext == "bmp"){
										//echo "<img src='".$file."' class='img-responsive trydata'/>";						
										if($row['trashed']==0){
										echo '<div class="col-sm-4 box" style="font-family:Times New Roman, Times, serif;" data-element="'.$idshowit.'"><div class="inner_box"><span style="float:right;">
									    	<div class="dropdown">
				    						<button class="btn  fa fa-ellipsis-v" type="button" data-toggle="dropdown"></button>
				 							<ul class="dropdown-menu">
				    						  <li><a class="dropdown-item" href="'.$dir.'/'.$ff.'" target="_blank" download>Download</a></li>
				    						  <li><a class="dropdown-item shareto" data-path="'.$dir.'/'.$ff.'">Share To</a></li>
				    						  <li><a  class="dropdown-item move_to_trash" data-path="'.$dir.'/'.$ff.'" data-trash="1" data-element="'.$idshowit.'">Move To Trash</a></li>			    						  
				    						</ul>
				 						</div></span><span style="cursor:pointer;" class="file" path="'.$dir.'/'.$ff.'" dir="'.$dir.'"><span class="fa fa-file-image-o" style="color:#fff;"></span><br/><span title=" File Name - '.$ff.', ('.filesize_formatted($dir.'/'.$ff).'), Created on '.date('d-m-Y',strtotime(filectime($dir.'/'.$ff))).'"> '.substr($ff, 0, 10).'...</span></div></div><br/>';

				 						}
									}else if($ext =="php" || $ext == "html"|| $ext == "htm" || $ext == "css"|| $ext == "js"){
										//echo highlight_file($file);
										if($row['trashed']==0){
										echo '<div class="col-sm-4 box" style="font-family:Times New Roman, Times, serif;" data-element="'.$idshowit.'"><div class="inner_box"><span style="cursor:pointer;"> <span style="float:right;">
									    	<div class="dropdown">
				    						<button class="btn  fa fa-ellipsis-v" type="button" data-toggle="dropdown"></button>
				 							<ul class="dropdown-menu">
				    						  <li><a class="dropdown-item" href="'.$dir.'/'.$ff.'" target="_blank" download>Download</a></li>
				    						  <li><a class="dropdown-item shareto" data-path="'.$dir.'/'.$ff.'">Share To</a></li>
				    						  <li><a  class="dropdown-item move_to_trash" data-path="'.$dir.'/'.$ff.'" data-trash="1" data-element="'.$idshowit.'">Move To Trash</a></li>			    						  
				    						</ul>
				 						</div></span><span class="fa fa-file-code-o file" path="'.$dir.'/'.$ff.'" dir="'.$dir.'" style="color:#fff;"></span><br/><span title="File Name - '.$ff.',('.filesize_formatted($dir.'/'.$ff).'), Created on '.date('d-m-Y',strtotime(filectime($dir.'/'.$ff))).'"> '.substr($ff, 0, 10).'...</div></div><br/>';
				 						}
									}else if($ext =="pdf"){
										//echo'<iframe src="'.$file.'" width="100%" height="350px"></iframe>';
										if($row['trashed']==0){
										echo '<div class="col-sm-4 box" style="font-family:Times New Roman, Times, serif;" data-element="'.$idshowit.'"><div class="inner_box"><span style="cursor:pointer;"> <span style="float:right;">
									    	<div class="dropdown">
				    						<button class="btn  fa fa-ellipsis-v" type="button" data-toggle="dropdown"></button>
				 							<ul class="dropdown-menu">
				    						  <li><a class="dropdown-item" href="'.$dir.'/'.$ff.'" target="_blank" download>Download</a></li>
				    						  <li><a class="dropdown-item shareto" data-path="'.$dir.'/'.$ff.'">Share To</a></li>
				    						  <li><a  class="dropdown-item move_to_trash" data-path="'.$dir.'/'.$ff.'" data-trash="1" data-element="'.$idshowit.'">Move To Trash</a></li>			    						  
				    						</ul>
				 						</div></span><span class="fa fa-file-pdf-o file" path="'.$dir.'/'.$ff.'" dir="'.$dir.'" style="color:#fff;"></span><br/><span title="File Name - '.$ff.',('.filesize_formatted($dir.'/'.$ff).'), Created on '.date('d-m-Y',strtotime(filectime($dir.'/'.$ff))).'"> '.substr($ff, 0, 10).'...</div></div><br/>';
				 						}
									}else if($ext =='ppt' || $ext =='pptx' || $ext =='doc' || $ext =='docx' || $ext =='xls' || $ext =='xlsx'){
										//echo "<iframe src='https://view.officeapps.live.com/op/embed.aspx?src=".$website.$file."'></iframe>";
										if($row['trashed']==0){
										echo '<div class="col-sm-4 box" style="font-family:Times New Roman, Times, serif;" data-element="'.$idshowit.'"><div class="inner_box"> <span style="float:right;">
									    	<div class="dropdown">
				    						<button class="btn  fa fa-ellipsis-v" type="button" data-toggle="dropdown"></button>
				 							<ul class="dropdown-menu">
				    						  <li><a class="dropdown-item" href="'.$dir.'/'.$ff.'" target="_blank" download>Download</a></li>
				    						  <li><a class="dropdown-item shareto" data-path="'.$dir.'/'.$ff.'">Share To</a></li>
				    						  <li><a  class="dropdown-item move_to_trash" data-path="'.$dir.'/'.$ff.'" data-trash="1" data-element="'.$idshowit.'">Move To Trash</a></li>			    						  
				    						</ul>
				 						</div></span><span style="cursor:pointer;" ><span class="fa fa-file-text-o file" path="'.$dir.'/'.$ff.'" dir="'.$dir.'" style="color:#fff;"></span><br/><span title="File Name - '.$ff.',('.filesize_formatted($dir.'/'.$ff).'), Created on '.date('d-m-Y',strtotime(filectime($dir.'/'.$ff))).'"> '.substr($ff, 0, 10).'...</div></div><br/>';
				 						}
									}
									else if($ext =='mp3' || $ext == 'wav' || $ext == 'wma')
									{
										if($row['trashed']==0){
										echo '<div class="col-sm-4 box" style="font-family:Times New Roman, Times, serif;" data-element="'.$idshowit.'"><div class="inner_box "> <span style="float:right;">
									    	<div class="dropdown">
				    						<button class="btn  fa fa-ellipsis-v" type="button" data-toggle="dropdown"></button>
				 							<ul class="dropdown-menu">
				    						  <li><a class="dropdown-item" href="'.$dir.'/'.$ff.'" target="_blank" download>Download</a></li>
				    						  <li><a class="dropdown-item shareto" data-path="'.$dir.'/'.$ff.'">Share To</a></li>
				    						  <li><a  class="dropdown-item move_to_trash" data-path="'.$dir.'/'.$ff.'" data-trash="1" data-element="'.$idshowit.'">Move To Trash</a></li>			    						  
				    						</ul>
				 						</div>
				 						</span><span style="cursor:pointer;"><span class="fa fa-file-audio-o file" path="'.$dir.'/'.$ff.'" dir="'.$dir.'"  style="color:#fff;"></span><br/><span title="File Name - '.$ff.',('.filesize_formatted($dir.'/'.$ff).'), Created on '.date('d-m-Y',strtotime(filectime($dir.'/'.$ff))).'">'.substr($ff, 0, 10).'...</div></div><br/>';
				 						}
				 						//echo '<span style="cursor:pointer;" class="file" path="'.$dir.'/'.$ff.'" dir="'.$dir.'/"><span class="fa fa-file" style="color:#fff;"></span><span title="'.filesize_formatted($dir.'/'.$ff).', Created on '.date('d-m-Y',strtotime(filectime($dir.'/'.$ff))).'"> '.$ff."<br/>";
									}					        		
					        		else if ($ext == 'mp4' || $ext == '3gp' || $ext == 'ogg' || $ext == 'webm' || $ext == 'flv' || $ext  == 'avi')
					        		{
					        			if($row['trashed']==0){
					        			echo '<div class="col-sm-4 box" style="font-family:Times New Roman, Times, serif;" data-element="'.$idshowit.'"><div class="inner_box"><span style="float:right;">
									    	<div class="dropdown">
				    						<button class="btn  fa fa-ellipsis-v" type="button" data-toggle="dropdown"></button>
				 							<ul class="dropdown-menu">
				    						  <li><a class="dropdown-item" href="'.$dir.'/'.$ff.'" target="_blank" download>Download</a></li>
				    						  <li><a class="dropdown-item shareto" data-path="'.$dir.'/'.$ff.'">Share To</a></li>
				    						  <li><a  class="dropdown-item move_to_trash" data-path="'.$dir.'/'.$ff.'" data-trash="1" data-element="'.$idshowit.'">Move To Trash</a></li>			    						  
				    						</ul>
				 						</div></span><span style="cursor:pointer;" class="file" path="'.$dir.'/'.$ff.'" dir="'.$dir.'"><span class="fa fa-file-video-o" style="color:#fff;"></span><br/><span title="File Name - '.$ff.',('.filesize_formatted($dir.'/'.$ff).'), Created on '.date('d-m-Y',strtotime(filectime($dir.'/'.$ff))).'">'.substr($ff, 0, 10).'...</span></div></div><br/>';
				 						}
				 					}
				 				}
					        	}
					    }
				    }
				    echo "</div>";
				}
				echo $backButton;
				listFolderFiles($dir, 'Folders');
				listFolderFiles($dir, 'Files');?>
			</div>
			<div class="col-md-4" id="show_file">
				<?php
				if(isset($_POST['file'])){
					echo"<div style='border:1px solid #808080;padding:5px; box-shadow:10px 0px 20px 5px; border-radius:5px; background-color:#fff;color:#000;'>";
					$ext = strtolower((pathinfo($_POST['file'], PATHINFO_EXTENSION)));
					$filesize = filesize($_POST['file']);
					$filesize = round($filesize / 1024 / 1024 , 1);
					echo "<a href='uploadtry.php'><span class='pull-right' style='font-size:20px;padding:8px;'>&times;</span></a><h3 style='font-family:Times New Roman, Times, serif;text-align:center;' class='section-title'>".substr((basename($_POST['file'], '?' . $_POST['file'])),0,15)."...</h3><hr/>";	
					$file = $_POST['file'];
					if($ext =="png" || $ext == "jpg"|| $ext == "jpeg" || $ext == "gif"|| $ext == "bmp"){
						echo "<img src='".$file."' class='img-responsive trydata'/>";
						echo "File Type:";
						echo $ext;
						echo "<hr/>File Size:";
						echo $filesize."MB<hr/>";
						echo '<div class="row">
								<div class="col-sm-4"><a class="dropdown-item shareto" data-path="'.$file.'"><i class="material-icons" style="font-size:24px;padding-left:25px;">share</i></a></div>
								<div class="col-sm-4"><a  class="dropdown-item move_to_trash" data-path="'.$file.'"><i class="fa fa-trash" style="font-size:24px;padding-left:25px;"></i></a></div>
								<div class="col-sm-4"><a href="'.$file.'" target="_blank" download><i class="material-icons" style="font-size:30px;padding-left:25px;">file_download</i></a></div>
							</div>';
					}else if($ext =="php" || $ext == "html"|| $ext == "htm" || $ext == "css"|| $ext == "js"){
						echo highlight_file($file);
						echo "<br/>File Type:";
						echo $ext;
						echo "<hr/>File Size:";
						echo $filesize."MB";
						echo '<div class="row">
								<div class="col-sm-4"><a class="dropdown-item shareto" data-path="'.$file.'"><i class="material-icons" style="font-size:24px;padding-left:25px;">share</i></a></div>
								<div class="col-sm-4"><a  class="dropdown-item move_to_trash" data-path="'.$file.'"><i class="fa fa-trash" style="font-size:24px;padding-left:25px;"></i></a></div>
								<div class="col-sm-4"><a href="'.$file.'" target="_blank" download><i class="material-icons" style="font-size:28px;padding-left:25px;">file_download</i></a></div>
							</div>';
					}else if($ext =="pdf"){
						echo'<iframe src="'.$file.'" width="100%" height="300px"></iframe>';
						echo "<br/>File Type:";
						echo $ext;
						echo "<hr/>File Size:";
						echo $filesize."MB";
						echo '<div class="row">
								    <div class="col-sm-4"><a class="dropdown-item shareto" data-path="'.$file.'"><i class="material-icons" style="font-size:24px;padding-left:20px;">share</i></a></div>
								    <div class="col-sm-4"><a class="dropdown-item move_to_trash" data-path="'.$file.'"><i class="fa fa-trash" style="font-size:24px;padding-left:20px;"></i></a></div>
								    <div class="col-sm-4"><a href="'.$file.'" target="_blank" download><i class="material-icons" style="font-size:28px;padding-left:25px;margin-top:5px;">file_download</i></a></div>
								</div>';
					}else if($ext =='ppt' || $ext =='pptx' || $ext =='doc' || $ext =='docx' || $ext =='xls' || $ext =='xlsx'){
						echo "<iframe src='https://view.officeapps.live.com/op/embed.aspx?src=".$website.$file."'></iframe>";
						echo "<br/>File Type:";
						echo $ext;
						echo "<hr/>File Size:";
						echo $filesize."MB";
						echo '<div class="row">
								<div class="col-sm-4"><a class="dropdown-item shareto" data-path="'.$file.'"><i class="material-icons" style="font-size:24px;padding-left:25px;">share</i></a></div>
								<div class="col-sm-4"><a  class="dropdown-item move_to_trash" data-path="'.$file.'"><i class="fa fa-trash" style="font-size:24px;padding-left:25px;"></i></a></div>
								<div class="col-sm-4"><a href="'.$file.'" target="_blank" download><i class="material-icons" style="font-size:28px;padding-left:25px;">file_download</i></a></div>
							</div>';
					}
					else if($ext =='mp3' || $ext == 'wav' || $ext == 'wma')
					{
						echo "<audio style='width:100%;' src='".$file."' controls download></audio><br/><br/>";
						echo "File Type:";
						echo $ext;
						echo "<hr/>File Size:";
						echo $filesize."MB<hr/>";
						echo '<div class="row">
								<div class="col-sm-4"><a class="dropdown-item shareto" data-path="'.$file.'"><i class="material-icons" style="font-size:24px;padding-left:25px;">share</i></a></div>
								<div class="col-sm-4"><a class="dropdown-item move_to_trash" data-path="'.$file.'"><i class="fa fa-trash" style="font-size:24px;padding-left:25px;"></i></a></div>
								<div class="col-sm-4"><a href="'.$file.'" target="_blank" download><i class="material-icons" style="font-size:28px;padding-left:25px;">file_download</i></a></div>
							</div>';
					}
					else if ($ext == 'mp4' || $ext == '3gp' || $ext == 'ogg' || $ext == 'webm' || $ext == 'flv' || $ext  == 'avi') {
						echo '<video style="width:100%;" controls><source src="'.$file.'" type="video/mp4"></video>';
						echo "File Type:";
						echo $ext;
						echo "<hr/>File Size:";
						echo $filesize."MB<hr/>";
						echo '<div class="row">
								<div class="col-sm-4"><a class="dropdown-item shareto" data-path="'.$file.'"><i class="material-icons" style="font-size:24px;padding-left:25px;">share</i></a></div>
								<div class="col-sm-4"><a  class="dropdown-item move_to_trash" data-path="'.$file.'"><i class="fa fa-trash" style="font-size:24px;padding-left:25px;"></i></a></div>
								<div class="col-sm-4"><a href="'.$file.'" target="_blank" download><i class="material-icons" style="font-size:28px;padding-left:25px;">file_download</i></a></div>
							</div>';
					}   
					echo "</div>";
				}?>
			</div>
		</div>

    </form>
     <div class="col-md-1"></div>
      </div>
</div>



<?php
	if(isset($_POST['upload']))
	{
		$ext = strtolower(pathinfo($_FILES['image']['name'],PATHINFO_EXTENSION));
		//echo "<script>alert('".$ext."');</script>";
		if(!empty($_FILES['image']['name']) && $_FILES['image']['size'] < 16106127360){
			if($ext =="png" || $ext == "jpg"|| $ext == "jpeg" || $ext == "gif"|| $ext == "bmp" || $ext =="php" || $ext == "html"|| $ext == "htm" || $ext == "css"|| $ext == "js" || $ext =='ppt' || $ext =='pptx' || $ext =='doc' || $ext =='docx' || $ext =='xls' || $ext =='xlsx' || $ext =='mp3' || $ext == 'wav' || $ext == 'wma'|| $ext == 'mp4' || $ext == '3gp' || $ext == 'ogg' || $ext == 'webm' || $ext == 'flv' || $ext  == 'avi' || $ext =="pdf")
			{
		if(is_dir('uploads/'.$_SESSION['user_id']))
			{
				//mkdir('uploads/'.$_SESSION['user_id']);
				$target = 'uploads/'.$_SESSION['user_id'].'/'.basename($_FILES['image']['name']);

			}
			else{
				mkdir('uploads/'.$_SESSION['user_id']);
				//mkdir('uploads/'.$_SESSION['user_id'].'/'.$foldername);
				$target = 'uploads/'.$_SESSION['user_id'].'/'.basename($_FILES['image']['name']);

			}
			$path_file='uploads/'.$_SESSION['user_id'].'/';

		if (move_uploaded_file($_FILES['image']['tmp_name'],$target)) 
		{
			$db = mysqli_connect("localhost","root","","task_management");
			//$image =  $_FILES ['image']['name'];
			$sql = "INSERT INTO `users`(`image`,`folder_name`,`created_by`,`creation_date`,`trashed`) VALUES ('".$target."','".$path_file."','".$_SESSION['username']."','".date("Y-m-d H:i:s")."','0')";
			//echo $sql;	
			mysqli_query($db,$sql);	
			echo "<script>alert('Uploaded Successfully'); window.location.href='uploadtry.php';</script>";

		}
		else
		{
				//swal("Uploading Failed!");';
		}
		}
		else
		{
			echo "<script>alert('This File Format Is Not Allow....!');</script>";	
		}
	}
	else{
		echo "<script>alert('Please select valid file');</script>";
	}
	}
?>
<?php
	if (isset($_POST['upload1']))
	{
		if($_POST['foldername'] != "")
		{
			$foldername=$_POST['foldername'];
			$path_folder=$_SESSION['dir'].'/'.$foldername;
			$db = mysqli_connect("localhost","root","","task_management");
			echo "<script>alert('".$_SESSION['dir']."');</script>";
			if(is_dir('uploads/'.$_SESSION['user_id']))
			{
				mkdir($_SESSION['dir'].'/'.$foldername);
			}
			else{
				//mkdir('uploads/'.$_SESSION['user_id']);
				mkdir($_SESSION['dir'].'/'.$foldername.'/');
			}
				
			$counter=0;
			foreach ($_FILES['files']['name'] as $i=>$name)
			{
				if(strlen($_FILES['files']['name'][$i])>1)
				{
					$target =$_SESSION['dir'].'/'.$foldername.'/'.$name;
					//echo "<script>alert('Uploaded Successfully');window.location.href='uploadtry.php?dir=".$target."';</script>";
					$ext = strtolower(pathinfo($_FILES['files']['name'][$i],PATHINFO_EXTENSION));
					//echo "<script>alert('".$ext."');</script>";
					if($ext!='exe')
					{
					move_uploaded_file($_FILES['files']['tmp_name'][$i],$target);
					$sizeofFile = $_FILES['files']['size'][$i];
					$image =  $_FILES ['files']['name'];
					$sql = "INSERT INTO `users`(`image`,`folder_name`,`created_by`,`creation_date`,`trashed`,`size`) VALUES ('".$target."','".$path_folder."','".$_SESSION['username']."','".date("Y-m-d H:i:s")."','0','".$sizeofFile."')";	
					mysqli_query($db,$sql);
					$counter++;
					}
					else
					{
					echo "<script>alert('Your Folder Contains Undefined Format!!!!');</script>";	
					}

				}
			}
			if($counter > 0)
			{
				echo "<script>alert('Uploaded Successfully');window.location.href='uploadtry.php?dir=".$_SESSION['dir']."';</script>";
			}
		}
		else
		{
			echo "<script>alert('Uploading Failed!');</script>";
		}
	}
if (isset($_GET['dir'])) {
		echo "<script>
			$(document).ready(function(){
		        var path = '".$_GET['dir']."';
		        var form= document.createElement('form');
		        form.method= 'post';
		        var input= document.createElement('input');
		        input.type= 'hidden';
		        input.name= 'dir';
		        input.value= path;
		        form.appendChild(input);
		        document.body.appendChild(form);
		        form.submit();
		      //  $('#upfile').css('display','none');
		       // $('#upfolder').css('display','none');
		        return false;
		    });
		</script>";
	}

?>
<?php include('vtr_footer.php');?>