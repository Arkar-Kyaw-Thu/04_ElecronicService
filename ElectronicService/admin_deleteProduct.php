<?php
include "php/db_conn.php";
	$pid = $_GET['pid'];
	$qu="delete from product where pid='$pid'";
	$result=mysqli_query($conn,$qu);
	if ($qu==true) {
		echo "<script>alert('Delete Successfully!');</script>";
		header('Location:admin_product.php');
	}
	else{
		die('Error');
	}
?>