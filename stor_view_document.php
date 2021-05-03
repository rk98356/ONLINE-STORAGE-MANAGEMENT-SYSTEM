<?php 
				echo '<a href="uploadtry.php"><input type="button" value="Go Back"/></a>';

				if(isset($_GET['file'])){
					echo"<div style='border:1px dotted #808080; padding: 10px;overflow-x: scroll;'>";
					$ext = strtolower((pathinfo($_GET['file'], PATHINFO_EXTENSION)));
					echo "<h3>". basename($_GET['file'], '?' . $_GET['file'])."</h3><hr/>";	
					$file = $_GET['file'];
					if($ext =="png" || $ext == "jpg"|| $ext == "jpeg" || $ext == "gif"|| $ext == "bmp"){
						echo "<img src='".$file."' class='img-responsive'/>";
					}else if($ext =="php" || $ext == "html"|| $ext == "htm" || $ext == "css"|| $ext == "js"){
						echo highlight_file($file);
					}else if($ext =="pdf"){
						echo'<iframe src="'.$file.'" width="100%" height="600px"></iframe>';
					}else if($ext =='ppt' || $ext =='pptx' || $ext =='doc' || $ext =='docx' || $ext =='xls' || $ext =='xlsx'){
						echo "<iframe src='https://view.officeapps.live.com/op/embed.aspx?src=".$website.$file."'></iframe>";
					}
					echo "</div>";
				}
			?>