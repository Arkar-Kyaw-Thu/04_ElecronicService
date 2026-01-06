<?php
	session_start();
	include "php/db_conn.php";
    if($_SESSION['uid']){
    	$outgoing_id = $_SESSION['uid'];
    	$img = $_GET['img'];
    	$sql = mysqli_query($conn, "INSERT INTO `messages`(`incoming_msg_id`, `outgoing_msg_id`, `msg`, `mimg`, `status`) VALUES ('0','$outgoing_id','none','$img','unread');") or die();
    	if($sql){
    		header("location: contactpage.php");
    	}
    }
    else{
    	header("location: loginform.php");
    }
?>