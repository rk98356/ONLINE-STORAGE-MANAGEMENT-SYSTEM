<?php
session_start();
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
	if($nm!=$_SESSION['username'])
	{
	if($folder_path=='folder'){
		//$query = "UPDATE `users` SET `share_with` ='".$nm."',`share_date`='".date('Y-m-d H:m:s')."' WHERE `folder_name`='uploads/".$_SESSION['user_id']."/".$file_path."'";
		//echo $query;
		$query="INSERT INTO `users`(`image`, `share_with`, `share_date`, `created_by`) VALUES ('uploads/".$_SESSION['user_id']."/".$file_path."','".$nm."','".date('Y-m-d H:m:s')."','".$_SESSION['username']."')";

	}
	else{
		//$query = "UPDATE `users` SET `share_with` ='".$nm."',`share_date`='".date('Y-m-d H:m:s')."' WHERE `image`='".$file_path."'";
		$query="INSERT INTO `users`(`image`, `share_with`, `share_date`, `created_by`) VALUES ('".$file_path."','".$nm."','".date('Y-m-d H:m:s')."','".$_SESSION['username']."')";
		
	}
	$result= mysqli_query($con,$query);
	}
	else
	{
		echo 'same';
	}


}?>
