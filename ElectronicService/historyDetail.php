<!DOCTYPE html>
<?php
include_once('header.php');
include "php/db_conn.php";
	$user_id = $_SESSION['uid'];
	$hid = $_GET['hid'];
	$query = "SELECT * FROM history WHERE uid='$user_id' AND hid='$hid';";
	$result = mysqli_query($conn,$query);
  $row = mysqli_fetch_assoc($result);

    $hid = $row['hid'];
    $uid = $row['uid'];
    $pid = $row['pid'];
    $eid = $row['eid'];
    $name = $row['name'];
    $phone = $row['phno'];
    $address = $row['address'];
    $date = $row['date'];
    $cprice =0;
    $nid ="";

    $query1="SELECT * FROM user_info where uid='$user_id';";
    $result1=mysqli_query($conn,$query1);
    $acc=mysqli_fetch_assoc($result1);
    $user_img = $acc['img'];

    $query1="SELECT * FROM acc_info where uid='$user_id';";
    $result1=mysqli_query($conn,$query1);
    $acc=mysqli_fetch_assoc($result1);
    $acc_name = $acc['email'];

    $query2="SELECT * FROM product where pid='$pid';";
    $result2=mysqli_query($conn,$query2);
    $product=mysqli_fetch_assoc($result2);
    $img = $product['product_img'];
    $brand = $product['product_brand'];
    $category = $product['product_category'];
    $type = $product['product_type'];
    $price = $product['product_price'];

    if ($eid!=0) {
      $query = "SELECT * FROM notification WHERE uid='$user_id' AND eid='$eid';";
      $result = mysqli_query($conn,$query);
      $row = mysqli_fetch_assoc($result);
      $nid = $row['nid'];
      $cprice = $row['comfirm_price'];
    }
    $price-=$cprice;
?>
<html lang="en">
<head>
<meta charset="utf-8">


<title>profile with data and skills</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">
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
  box-shadow: 4px 5px 5px 3px rgba(0,0,0,0.2);
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
							<img src="images/<?=$user_img?>" style="border-radius: 50%;" alt="Admin" width="150" height="150">
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
						<div class="detail-main-card">
							<h2><a href="history.php"><span class="material-icons-outlined">arrow_back</span></a></h2>
						<div class="detail-card" style="background: #;">
              <div style="border-bottom: 1px solid black;">
                <p align="center"><span class="material-icons-outlined">price_check</span><br><br><span style="color: green;">Successfully!</span><p>
              </div>
               
              <div class="detail-card-inner">
                <p>Date</p>
                <p><?=$date?></p>
              </div>
              <div class="detail-card-inner">
                <p>Acc_name</p>
                <p><?=$acc_name?></p>
              </div>
              <div class="detail-card-inner">
                <p>Product_name</p>
                <p><?=$brand?>, <?=$category?>, <?=$type?></p>
              </div>
            <?php if($eid==0){ ?>
              <div class="detail-card-inner">
                <p>Process</p>
                <p>Buy</p>
              </div>
            <?php }else{ ?>
              <div class="detail-card-inner">
                <p>Process</p>
                <p>Exchange</p>
              </div>
              <div class="detail-card-inner">
                <p>Exchange_item</p>
                <p><a href="notiDetail.php? nid=<?=$nid?>">click</a></p>
              </div>
            <?php } ?>
              <div class="detail-card-inner">
                <p>User_name</p>
                <p><?=$name?></p>
              </div>
              <div class="detail-card-inner">
                <p>Phone Number</p>
                <p><?=$phone?></p>
              </div>
              <div class="detail-card-inner">
                <p>Address</p>
                <p><?=$address?></p>
              </div>
              <div class="detail-card-inner">
                <p>Price</p>
                <p><?=$price?> Kyats</p>
              </div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</body>
</html>