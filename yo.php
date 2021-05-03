<?php include('vtr_header.php');?>
<?php include('vtr_top_menu.php');?>
<?php include('vtr_side_nav.php');?>
<div class="container" id="sidePan" style="margin-top:30px; margin-bottom:30px; height: 100vh;overflow: scroll;color: #fff;">
	<div class="row">
		<div class="col-sm-8">
		  <?php
		  	$website = "http://localhost/";
		  	if(isset($_GET['dir'])){
				$dir = $_GET['dir'];
				$backButton= "<hr/><span style='cursor:pointer;' class='back'><span class='glyphicon glyphicon-menu-left'></span> <b>Back</b><br/></span>";
			}
			else{
				$dir = 'uploads/';
				$backButton="<hr/>";
			}

		  	$pages = explode("/", $dir);
		  	foreach ($pages as $key => $value) {
		  		echo '<span title="Double click to jump inside the folder" class="folder" path="'.$value.'">'.$value.'</span> ';
		  		
		  	}

		  		function filesize_formatted($path){
				    $size = filesize($path);
				    $units = array( 'Byte', 'KB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB');
				    $power = $size > 0 ? floor(log($size, 1024)) : 0;
				    return number_format($size / pow(1024, $power), 2, '.', ',') . ' ' . $units[$power];
				}

			
				function listFolderFiles($dir, $type){
				    $ffs = scandir($dir);

				    unset($ffs[array_search('.', $ffs, true)]);
				    unset($ffs[array_search('..', $ffs, true)]);

				    // prevent empty ordered elements
				    if (count($ffs) < 1)
				        return;

				    echo "<div class='row'>";
				    foreach($ffs as $ff){
				        
				        if($type=='Folders'){
					        if(is_dir($dir.'/'.$ff)) 
					        	{
					        		echo '<div class="col-sm-4 box "><div class="inner_box"><span style="cursor:pointer;" class="folder" path="'.$dir.'/'.$ff.'"><span class="glyphicon glyphicon-folder-close warning fa fa-folder" style="color:#ffa70f;"></span><br/><span title="Double click to jump inside the folder" >'.$ff." </span></span></div></div>";
					        		echo "<br/>";
					        	}
					    }

					    if($type=='Files'){
					    	if(!is_dir($dir.'/'.$ff)) 
					        	{
					        		$ext = strtolower((pathinfo($ff, PATHINFO_EXTENSION)));
									//echo "<h3>". basename($_GET['file'], '?' . $_GET['file'])."</h3><hr/>";	
									//$file = $_GET['file'];
									if($ext =="png" || $ext == "jpg"|| $ext == "jpeg" || $ext == "gif"|| $ext == "bmp"){
										//echo "<img src='".$file."' class='img-responsive trydata'/>";
										echo '<div class="col-sm-4 box"><div class="inner_box file" path="'.$dir.'/'.$ff.'" dir="'.$dir.'/""><span style="cursor:pointer;" ><span class="fa fa-file-image-o" style="color:#fff;"></span><br/><span title="'.filesize_formatted($dir.'/'.$ff).', Created on '.date('d-m-Y',strtotime(filectime($dir.'/'.$ff))).'"> '.$ff."</div></div><br/>";
									}else if($ext =="php" || $ext == "html"|| $ext == "htm" || $ext == "css"|| $ext == "js"){
										//echo highlight_file($file);
										echo '<div class="col-sm-4 box"><div class="inner_box file" path="'.$dir.'/'.$ff.'" dir="'.$dir.'/""><span style="cursor:pointer;"><span class="fa fa-file-code-o" style="color:#fff;"></span><br/><span title="'.filesize_formatted($dir.'/'.$ff).', Created on '.date('d-m-Y',strtotime(filectime($dir.'/'.$ff))).'"> '.$ff."</div></div><br/>";
									}else if($ext =="pdf"){
										//echo'<iframe src="'.$file.'" width="100%" height="350px"></iframe>';

										echo '<div class="col-sm-4 box"><div class="inner_box file" path="'.$dir.'/'.$ff.'" dir="'.$dir.'/"><span style="cursor:pointer;"><span class="fa fa-file-pdf-o" style="color:#fff;"></span><br/><span title="'.filesize_formatted($dir.'/'.$ff).', Created on '.date('d-m-Y',strtotime(filectime($dir.'/'.$ff))).'"> '.$ff."</div></div><br/>";
									}else if($ext =='ppt' || $ext =='pptx' || $ext =='doc' || $ext =='docx' || $ext =='xls' || $ext =='xlsx'){
										//echo "<iframe src='https://view.officeapps.live.com/op/embed.aspx?src=".$website.$file."'></iframe>";
										echo '<div class="col-sm-4 box"><div class="inner_box file" path="'.$dir.'/'.$ff.'" dir="'.$dir.'/"><span style="cursor:pointer;" ><span class="fa fa-file-text-o" style="color:#fff;"></span><br/><span title="'.filesize_formatted($dir.'/'.$ff).', Created on '.date('d-m-Y',strtotime(filectime($dir.'/'.$ff))).'"> '.$ff."</div></div><br/>";
									}
					        		//echo '<span style="cursor:pointer;" class="file" path="'.$dir.'/'.$ff.'" dir="'.$dir.'/"><span class="fa fa-file" style="color:#fff;"></span><span title="'.filesize_formatted($dir.'/'.$ff).', Created on '.date('d-m-Y',strtotime(filectime($dir.'/'.$ff))).'"> '.$ff."<br/>";
					        	}
					    }
				    }
				    echo "</div>";
				}
				echo $backButton;
				listFolderFiles($dir, 'Folders');
				listFolderFiles($dir, 'Files');
			?>
		</div>
		
		<div class="col-sm-4">
			<?php 

				if(isset($_GET['file'])){
					echo"<div style='border:1px dotted #808080; padding: 10px;overflow: scroll;background-color:#fff;color:#000;'>";
					$ext = strtolower((pathinfo($_GET['file'], PATHINFO_EXTENSION)));
					echo "<h3>". basename($_GET['file'], '?' . $_GET['file'])."</h3><hr/>";	
					$file = $_GET['file'];
					if($ext =="png" || $ext == "jpg"|| $ext == "jpeg" || $ext == "gif"|| $ext == "bmp"){
						echo "<img src='".$file."' class='img-responsive trydata'/>";
					}else if($ext =="php" || $ext == "html"|| $ext == "htm" || $ext == "css"|| $ext == "js"){
						echo highlight_file($file);
					}else if($ext =="pdf"){
						echo'<iframe src="'.$file.'" width="100%" height="350px"></iframe>';
					}else if($ext =='ppt' || $ext =='pptx' || $ext =='doc' || $ext =='docx' || $ext =='xls' || $ext =='xlsx'){
						echo "<iframe src='https://view.officeapps.live.com/op/embed.aspx?src=".$website.$file."'></iframe>";
					}
					echo "</div>";
				}
			?>
		</div>
	</div>
</div>
<script type="text/javascript">
	$(document).on('dblclick', '.folder', function(){
		var path = $(this).attr('path');
		var form= document.createElement('form');
        form.method= 'get';
        var input= document.createElement('input');
        input.type= 'hidden';
        input.name= 'dir';
        input.value= path;
        form.appendChild(input);
        document.body.appendChild(form);
        form.submit();
        return false;
	});

	$(document).on('click', '.file', function(){
		var path = $(this).attr('path');
		var dir = $(this).attr('dir');
		var form= document.createElement('form');
        form.method= 'get';
        var input= document.createElement('input');
        input.type= 'hidden';
        input.name= 'file';
        input.value= path;
        form.appendChild(input);
        var input2= document.createElement('input');
        input2.type= 'hidden';
        input2.name= 'dir';
        input2.value= dir;
        form.appendChild(input2);
        document.body.appendChild(form);
        form.submit();
        return false;
	});

	$(document).on('click','.back', function(){
		window.history.back();
	});
</script>
<?php include('vtr_footer.php');?>
