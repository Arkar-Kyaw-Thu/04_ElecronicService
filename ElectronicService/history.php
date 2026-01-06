<!DOCTYPE html>
<?php
include_once('header.php');
include "php/db_conn.php";
$user_id = $_SESSION['uid'];
$query = "SELECT * FROM history WHERE uid='$user_id' order by hid desc;";
$result = mysqli_query($conn,$query);

	$qu="SELECT * FROM user_info where uid='$user_id';";
  $re=mysqli_query($conn,$qu);
  $user=mysqli_fetch_assoc($re);
  $user_img = $user['img'];
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
							<h2>History</h2>
<?php 
  while ($row=mysqli_fetch_assoc($result)) {
    $hid = $row['hid'];
    $uid = $row['uid'];
    $pid = $row['pid'];
    $eid = $row['eid'];
    $date = $row['date'];

    $query1="SELECT * FROM user_info where uid='$uid';";
    $result1=mysqli_query($conn,$query1);
    $acc=mysqli_fetch_assoc($result1);
    $acc_name = $acc['name'];

    $query2="SELECT * FROM product where pid='$pid';";
    $result2=mysqli_query($conn,$query2);
    $product=mysqli_fetch_assoc($result2);
    $brand = $product['product_brand'];
    $price = $product['product_price'];
?>
						<a href="historyDetail.php? hid=<?=$hid?>">
							<div class="detail-card">
								<div class="detail-card-inner">
									<p>
                  	<?php if($eid==0){ ?>
                    	<span class="material-icons-outlined">local_atm</span>
                  	<?php }else{ ?>
                    	<span class="material-icons-outlined">currency_exchange</span>
                  	<?php } ?>
                  
                  	<span><?=$brand?></span>
                	</p>
                	<p><?=$date?><br><br><?=$price?> Kyats</p>
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