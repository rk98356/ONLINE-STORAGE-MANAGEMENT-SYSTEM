<?php
session_start();

function custom_copy($src, $dst) {  
  
    // open the source directory 
    $dir = opendir($src);  
  echo $dst;
    // Make the destination directory if not exist 
    @mkdir($dst);  
  
    // Loop through the files in source directory 
    while( $file = readdir($dir) ) {  
  
        if (( $file != '.' ) && ( $file != '..' )) {  
            if ( is_dir($src . '/' . $file) )  
            {  
  
                // Recursively calling custom copy function 
                // for sub directory  
                custom_copy($src . '/' . $file, $dst . '/' . $file);  
  
            }  
            else {  
                copy($src . '/' . $file, $dst . '/' . $file);  
            }  
        }  
    }  
  
    closedir($dir); 
}  



if(isset($_POST['key']) && $_POST['key']=='delete'){
	$con = mysqli_connect("localhost","root","","task_management");
	$delete_path=$_POST['delete_path'];
	$type_path=$_POST['type_path'];
	$trash=$_POST['trash'];

	if($type_path=='folder'){
		$query = "UPDATE  `users` SET `trashed` ='".$trash."', `trashed_date`='".date('Y-m-d H:m:s')."' WHERE `folder_name`='uploads/".$_SESSION['user_id']."/".$delete_path."' ";
	}
	else{
		$query = "UPDATE `users` SET `trashed`='".$trash."', `trashed_date`='".date('Y-m-d H:m:s')."' WHERE `image`='".$delete_path."' ";
	}
	$result= mysqli_query($con,$query);
	if ($result) {
		//echo $query;
		if ($trash==0) {
			echo "Restore Successfully";
		}
		if ($trash==1) {
			echo "Remove Successfully";
		}
	}
	else
		echo $query;
}  

if(isset($_POST['key']) && $_POST['key']=='share'){
	$con = mysqli_connect("localhost","root","","task_management");
	$file_path=$_POST['file_path'];
	$folder_path=$_POST['folder_path'];
	$nm=$_POST['nm'];
	$fold_path="";
	$target='uploads/TECH456share';
	//echo $target;
	if($folder_path=='folder'){
		//$query = "UPDATE `users` SET `share_with` ='".$nm."',`share_date`='".date('Y-m-d H:m:s')."' WHERE `folder_name`='uploads/".$_SESSION['user_id']."/".$file_path."'";
		//echo $query;
		$query="INSERT INTO `users`(`image`, `share_with`, `share_date`, `created_by`) VALUES ('uploads/".$_SESSION['user_id']."/".$file_path."','".$nm."','".date('Y-m-d H:m:s')."','".$_SESSION['username']."')";
			$fold_path='uploads/'.$_SESSION['user_id'].'/'.$file_path;
			echo $fold_path;


					//move_uploaded_file($file_path,$target); 
  

  
//$src = "C:/xampp/htdocs/geeks"; 
  
//$dst = "C:/xampp/htdocs/gfg"; 
  
custom_copy($fold_path, $target); 
	}
	else{
		//$query = "UPDATE `users` SET `share_with` ='".$nm."',`share_date`='".date('Y-m-d H:m:s')."' WHERE `image`='".$file_path."'";
		$query="INSERT INTO `users`(`image`, `share_with`, `share_date`, `created_by`) VALUES ('".$file_path."','".$nm."','".date('Y-m-d H:m:s')."','".$_SESSION['username']."')";
				//boolcopy($file_path,$target);
				//shell_exec("cp -r $file_path $target");
			move_uploaded_file($file_path,$target);

		
	}
	$result= mysqli_query($con,$query);


}?>
