<!DOCTYPE html>
<?php
include_once('header.php');
include "php/db_conn.php";
$user_id = $_SESSION['uid'];

if(isset($_POST['edit'])){
	$filename = $_FILES['uploadfile']['name'];
  $tempname = $_FILES['uploadfile']['tmp_name'];
  $folder = "images/".$filename;

	$uname = $_POST['name'];
	$uemail = $_POST['email'];
	$uaddress = $_POST['address'];
	$uphno = $_POST['phno'];
	$upassword = $_POST['password'];

	$que = "UPDATE  acc_info SET email='$uemail', password='$upassword' WHERE uid='$user_id';";
	mysqli_query($conn,$que);

	$que1 = "UPDATE  user_info SET name='$uname', img='$filename' ,address='$uaddress', phno='$uphno' WHERE uid='$user_id';";
	mysqli_query($conn,$que1);
	echo "<script>alert('Update Successfully!');</script>";
  if(!file_exists($folder)){
      move_uploaded_file($tempname , $folder);
  }
}

	$query = "SELECT * FROM acc_info WHERE uid='$user_id';";
	$result = mysqli_query($conn,$query);
  	$row = mysqli_fetch_assoc($result);
    $email = $row['email'];
    $password = $row['password'];

    $query1="SELECT * FROM user_info where uid='$user_id';";
    $result1=mysqli_query($conn,$query1);
    $acc=mysqli_fetch_assoc($result1);
    $img = $acc['img'];
    $acc_name = $acc['name'];
    $address = $acc['address'];
    $phno = $acc['phno'];

?>
<html lang="en">
<head>
<meta charset="utf-8">


<title>profile with data and skills</title>
<meta name="viewport" content="width=device-width, initial-scale=1">

<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all">
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />

<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<script src="javascript/bootstrap.js"></script>

<style type="text/css">
    body{
    	color: #1a202c;
    	text-align: left;
    	background-color: #e2e8f0;    
	}
	.main-body {
    	padding: 15px;

	}
	.card {
    	position: relative;
    	display: flex;
    	flex-direction: column;
    	min-width: 0;
    	max-height: 400px;
    	word-wrap: break-word;
    	background-color: #fff;
    	background-clip: border-box;
    	border: 0 solid rgba(0,0,0,.125);
    	border-radius: .25rem;
    	box-shadow: 0 1px 3px 0 rgba(0,0,0,.1), 0 1px 2px 0 rgba(0,0,0,.06);
	}

	.card-body {
    	flex: 1 1 auto;
    	min-height: 1px;
    	padding: 1rem;
    	font-size: 20px;
	}
.menu-link{
	display: block;
}
.menu-link button{
	width: 100%;
	height: 50px;
	margin-top: 1%;
}

.detail-main-card{
  display: grid;
  grid-template-columns: 1fr;
  gap: 20px;
  margin: -30px auto;
  width: 80%;
}
.detail-card {
  display: flex;
  flex-direction: column;
  justify-content: space-around;
  padding: 20px 40px;
  border: 1px solid grey;
  border-radius: 20px;
  box-shadow: 4px 4px 4px 3px rgba(0,0,0,0.2);
}
.detail-card-inner {
	margin: 2% 0;
  display: flex;
  align-items: center;
  justify-content: space-between;
}
.detail-card:hover{
	text-decoration: none;
	color: black;
}
</style>
</head>
<body>
<div class="container">
	<div class="main-body">
		<div class="row gutters-sm">
			<div class="col-md-4 mb-3">
				<div class="card">
					<div class="card-body">
						<div class="d-flex flex-column align-items-center text-center">
							<img src="images/<?=$img?>" style="border-radius: 50%;" alt="Admin" width="150" height="150">
							<div class="mt-3" style="margin-top:20%;">
								<a href="profile.php" class="menu-link"><button class="btn btn-outline-primary">Profile</button></a>
								<a href="history.php" class="menu-link"><button class="btn btn-outline-primary">History</button></a>
								<a href="profileEdit.php" class="menu-link"><button class="btn btn-outline-primary">Edit</button></a>
								<a href="logout.php" class="menu-link"><button class="btn btn-outline-primary">Logout</button></a>
							</div>
						</div>
					</div>
				</div>

			</div>
			<div class="col-md-8">
				<div class="card mb-3"  style=" overflow-y: auto;">
					<div class="card-body">
						<form action="" method="post" enctype="multipart/form-data">
						<div class="detail-main-card">
							<h2>Profile Edit</h2>
						<div class="detail-card" style="background: #;">
							<div class="detail-card-inner">
                <p>Img:</p>
                <p><input type="file" name="uploadfile" style="width: 250px;"></p>
              </div>
              <div class="detail-card-inner">
                <p>Name:</p>
                <p><input type="text" name="name" value="<?=$acc_name?>"></p>
              </div>
              <div class="detail-card-inner">
                <p>Email</p>
                <p><input type="text" name="email" value="<?=$email?>"></p>
              </div>
              <div class="detail-card-inner">
                <p>Address</p>
                <p><input type="text" name="address" value="<?=$address?>"></p>
              </div>
              <div class="detail-card-inner">
                <p>Phone Number</p>
                <p><input type="text" name="phno" value="<?=$phno?>"></p>
              </div>
              <div class="detail-card-inner">
                <p>Password</p>
                <p><input type="password" name="password" value="<?=$password?>"></p>
              </div>
              <div class="detail-card-inner">
                <p></p>
                <p><input type="submit" name="edit" value="Uploads" style="height: 40px;"></p>
              </div>
              </form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script>  
    const fileInput = document.querySelector('input[type="file"]');  const myFile = new File(['Hello World!'], '<?=$img?>', { type: 'images', lastModified: new Date(), });
    const dataTransfer = new DataTransfer(); 
    dataTransfer.items.add(myFile); 
    fileInput.files = dataTransfer.files;
 </script>
</body>
</html>