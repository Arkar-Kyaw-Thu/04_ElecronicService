<?php
	include("php/db_conn.php");
	$ID=$_GET['remove_staff'];
	$qu="delete from staff_info where sid='$ID'";
	$result=mysqli_query($conn,$qu);
	echo "<script>alert('Delete Successfully!');</script>";
	if ($qu==true) {
		header('Location:admin_staff.php');
	}
	else{
		die('Error');
	}
?>