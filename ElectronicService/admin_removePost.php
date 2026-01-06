<?php
	include("php/db_conn.php");
	$ID=$_GET['remove_post'];
	$qu="delete from post where oid='$ID'";
	$result=mysqli_query($conn,$qu);
	echo "<script>alert('Delete Successfully!');</script>";
	if ($qu==true) {
		header('Location:admin_post.php');
	}
	else{
		die('Error');
	}
?>