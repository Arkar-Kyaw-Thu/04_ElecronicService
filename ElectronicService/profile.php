<!DOCTYPE html>
<?php
include_once('header.php');
include "php/db_conn.php";
	$user_id = $_SESSION['uid'];
	$query = "SELECT * FROM acc_info WHERE uid='$user_id';";
	$result = mysqli_query($conn,$query);
  $row = mysqli_fetch_assoc($result);
  $email = $row['email'];
	$query1="SELECT * FROM user_info where uid='$user_id';";
  $result1=mysqli_query($conn,$query1);
  $acc=mysqli_fetch_assoc($result1);
  $img = $acc['img'];
  $acc_name = $acc['name'];
  $address = $acc['address'];
  $phno = $acc['phno'];
  //Profile

  $que = "SELECT * FROM notification WHERE uid='$user_id' order by nid desc;";
  $res = mysqli_query($conn,$que);
  //noti

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
	margin: 5% 0;
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
						<div class="detail-main-card">
							<h2>Profile</h2>
						<div class="detail-card" style="background: #;">
              <div class="detail-card-inner">
                <p>Name:</p>
                <p><?=$acc_name?></p>
              </div>
              <div class="detail-card-inner">
                <p>Email</p>
                <p><?=$email?></p>
              </div>
              <div class="detail-card-inner">
                <p>Address</p>
                <p><?=$address?></p>
              </div>
              <div class="detail-card-inner">
                <p>Phone Number</p>
                <p><?=$phno?></p>
              </div>
						</div>
					</div>

					<div class="card-body" style="margin-top:10%;">
						<div class="detail-main-card" style="border-top: 1px solid black;">
							<br><h2>Notification</h2>
<?php 
  while ($row1=mysqli_fetch_assoc($res)) {
    $nid = $row1['nid'];
    $uid = $row1['uid'];
    $eid = $row1['eid'];
    $cprice = $row1['comfirm_price'];
    $description = $row1['description'];
    $comfirm = $row1['comfirm'];
    $status = $row1['status'];

    $que1 = "SELECT * FROM exchange WHERE eid='$eid' AND uid='$uid';";
    $res1 = mysqli_query($conn,$que1);
    $exchange = mysqli_fetch_assoc($res1);
    $pid = $exchange['pid'];

    $que2 = "SELECT * FROM product where pid='$pid';";
    $res2 = mysqli_query($conn,$que2);
    $product = mysqli_fetch_assoc($res2);
    $img = $product['product_img'];
    $brand = $product['product_brand'];
    $price = $product['product_price'];

    $tprice = $price-$cprice;
?>
							<a href="notiDetail.php? nid=<?=$nid?>">
								<div class="detail-card">
									<div class="detail-card-inner">
										<p>
                    		<img src="images/<?=$img?>" width="50px" height="50px" style="border-radius: 50%;"><br>
                  			<span><?=$brand?></span>
                		</p>
								<?php if ($comfirm == "cancel") { ?>
										<p>
                    		<span style="color: red;">Can't Exange!</span>
                		</p>
								<?php }else{
										if($status=="buy"){ ?>
										<p>
                    		<span style="color: green;">Purchased!</span>
                		</p>
                		<?php }else{ ?>
										<p>
                    		<span style="color: green;">Can Exange!</span>
                		</p>
                		<?php } ?>
								<?php } ?>
									</div>
								</div>
							</a>
<?php } ?>
						</div>
					</div>

				</div>
			</div>
		</div>
	</div>
</div>
</body>
</html>