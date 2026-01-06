<?php
	$conn=mysqli_connect("localhost","root","","electronicservice")or die("cann't connect to database");

	if (!$conn){
		echo "connection failed!";
		exit();
	}
?>