<!DOCTYPE html>
<?php
	include "php/db_conn.php";
	include "header.php";
?>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<link rel="stylesheet" href="css/design.css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">
	<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all">
	<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
  
  <style type="text/css">
.main-container {
  grid-area: main;
  overflow-y: auto;
  color: black;
}
.main-title {
  display: flex;
  justify-content: space-between;
}
.main-cards {
  width: 100%;
}
.main-cards a{
  text-decoration: none;
}
.card {
  display: inline-block;
  padding: 25px;
  border: 1px solid transparent;
  border-radius: 5px;
}
.card-inner {
  display: flex;
  align-items: center;
  justify-content: space-between;
}
	</style>
</head>
<body>
<?php if($_SESSION['uid']){ ?>
  <div style="display: flex;align-items: center;justify-content: center;min-height: 75vh; margin-top: 1%;">
	<div class="wrapper chating">
    	<section class="chat-area">
    		<header>
    			<img src="images/default-avatar.png" alt="">
        	<div class="details">
          	<span>Service Center</span>
        	</div>
    		</header>
    		<div class="chat-box">
      		</div>
      		<form action="#" class="typing-area" enctype="multipart/form-data">
        		<input type="text" class="incoming_id" name="incoming_id" value="0" hidden>
            <label for="images-field" style="width: 45px;height: 45px;border: 1px solid black;padding: 10px 9px;border-radius: 50%;margin-right: 3%;"><span class="material-icons-outlined" style="color: black;">photo_camera</span></label>
            <input type="file" name="uploadfile" class="images-field" id="images-field" style="display:none;">
        		<input type="text" name="message" class="input-field" placeholder="Type a message here..." autocomplete="off">
        	<button><i class="fab fa-telegram-plane"></i></button>
      		</form>
      	</section>
      </div>
  </div>
      <script src="javascript/chat.js"></script>
<?php }else{ ?>
	<div class="main-container">
      <div class="main-cards">
            <div class="card" style="background: #;width: 30%;">
              <div style="position:absolute;top: 20%;left: 10%;">
                <h1>Contact Us</h1>
                <br>
                <p>
                  <ul style="list-style: none; font-size: 20px;line-height: 30px; ">
                  <li><a href="#">electronic@gmail.com</a></li>
                  <li><a href="#">09683969002</a></li>
                  <li><a href="#">UCSPyay</a></li>
                </ul>
                </p>
                <br>
                <!--<a href="index.php" style="color: white;text-decoration: none;"><button style="padding:10px;background: #05445E;">Learn more</button></a>-->
              </div>
            </div>
            <div class="card" style="width: 69.5%;">
              <img src="images/contact.jpg" style="width:50%;position: absolute;left: 45%;">
            </div>
        </div>
  </div>
	<?php include_once('footer.php');?>
<?php } ?>
</body>
</html>