<?php
		if(isset($_POST['upload']))
		{
			//echo "pressed";
			$file_name = $_FILES['file']['name'];
			$file_type = $_FILES['file']['type'];
			$file_size = $_FILES['file']['size'];
			$file_temp_loc = $_FILES['file']['tmp_name'];
			$file_store="../upload/".$file_name;
			//print_r($file);
			if(move_uploaded_file($file_temp_loc,$file_store))
			{
				echo "uploaded Sucessfully";
			}
			else
			{
				echo "uploading Failed";
			}
		}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Uploade Files</title>
	</head>
	<body>
		<div>
			<form action="?" method="POST" enctype="multipart/form-data">
				<label>Uploading Files</label>
				<p><input type="file" name="file"/></p>
				<p><input type="submit" name="upload" value="Upload Files"/>
			</form>
		</div>
	</body>
</html>