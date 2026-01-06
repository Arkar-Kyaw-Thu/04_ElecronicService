<!DOCTYPE html>
<?php
include_once('header.php');
include "php/db_conn.php";
  $user_id = $_SESSION['uid'];

    if(isset($_POST['buy'])){
        $our_product = $_POST['our_product'];
        $nid = $_POST['nid'];
        $eid = $_POST['eid'];
        
        $query1 = "SELECT * FROM product WHERE pid='$our_product';";
        $result1 = mysqli_query($conn,$query1);
        $row1 = mysqli_fetch_assoc($result1);
        $qty = $row1['product_qty'];
        $qty--;
        $query2 = "UPDATE product SET product_qty='$qty' WHERE pid='$our_product';";
        mysqli_query($conn,$query2);
        $query3 = "UPDATE notification SET status='buy' WHERE nid='$nid';";
        mysqli_query($conn,$query3);

        $name = $_POST['name'];
        $phno = $_POST['phone'];
        $region = $_POST['region'];
        $state = $_POST['state'];
        $street = $_POST['street'];
        $address= $street.", ".$state.", ".$region;

        $today = date('Y-m-d');

        $que = "INSERT INTO `history`(`uid`, `pid`, `eid`, `name`, `phno`, `address`, `date` , `status`) VALUES ('$user_id','$our_product','$eid','$name','$phno','$address','$today','uncomfirm')";
        $res = mysqli_query($conn,$que);
        echo "<script>alert('Purchased Successfully!');</script>";
    }

  $que="SELECT * FROM user_info where uid='$user_id';";
  $res=mysqli_query($conn,$que);
  $acc=mysqli_fetch_assoc($res);
  $user_img = $acc['img'];
  $acc_name = $acc['name'];

  $nid = $_GET['nid'];
  $query = "SELECT * FROM notification WHERE uid='$user_id' AND nid='$nid';";
  $result = mysqli_query($conn,$query);
  $row = mysqli_fetch_assoc($result);

    $nid = $row['nid'];
    $uid = $row['uid'];
    $eid = $row['eid'];
    $cprice = $row['comfirm_price'];
    $description = $row['description'];
    $comfirm = $row['comfirm'];
    $status = $row['status'];

    $query1="SELECT * FROM exchange where uid='$user_id' and eid='$eid';";
    $result1=mysqli_query($conn,$query1);
    $exchange=mysqli_fetch_assoc($result1);
    $pid = $exchange['pid'];
    $eimg = $exchange['user_product'];
    $ebrand = $exchange['item_brand'];

    $query2="SELECT * FROM product where pid='$pid';";
    $result2=mysqli_query($conn,$query2);
    $product=mysqli_fetch_assoc($result2);
    $img = $product['product_img'];
    $brand = $product['product_brand'];
    $category = $product['product_category'];
    $type = $product['product_type'];
    $price = $product['product_price'];

    $tpice = $price-$cprice;

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
              <h2><a href="profile.php"><span class="material-icons-outlined">arrow_back</span></a></h2>
            <div class="detail-card" style="background: #;">
              <div class="detail-card-inner">
                <p>
                  Our product<br><br>
                  <img src="images/<?=$img?>" width="100px" height="120px" style="border: none;border-radius: 5%;"><br><br>
                  <?=$brand?>, <?=$category?>, <?=$type?><br><br>
                  <?=$price?> Kyats
                </p>
                <p>
                  Your product<br><br>
                  <img src="images/<?=$eimg?>" width="100px" height="120px" style="border:none;border-radius: 5%;"><br><br>
                  <?=$ebrand?><br><br>
                  <?=$cprice?> Kyats
                </p>
              </div>
              <div class="detail-card-inner" style="margin: 5%;border-top: 1px solid black;">
                <p style="margin:5% auto 0 auto;">Deficit :<?=$tpice?> Kyats</p>

              </div>
              <div class="detail-card-inner">
                <p style="margin:auto;"><?=$description?></p>
                
              </div>
            <?php 
              if($comfirm == "cancel"){
            ?>
                <div class="detail-card-inner" style="margin: 5% 0;">
                  <p style="margin: auto;color: red;">Your item can't exchange</p>
                </div>
            <?php 
              }else if($status == "buy"){
            ?>
                <div class="detail-card-inner" style="margin: 5% 0;">
                  <p style="margin: auto;color: green;">You have purchased this product.</p>
                </div>
            <?php
              }else{
            ?>
              <form action="" method="post">
                <input type="text" name="our_product" value="<?= $pid ?>" style="display: none;">
                <input type="text" name="nid" value="<?= $nid ?>" style="display: none;">
                <input type="text" name="eid" value="<?= $eid ?>" style="display: none;">
                <div class="detail-card-inner" style="padding: 10px 10px;">
                  <p>Name:</p>
                  <p><input type="text" name="name" required></p>
                </div>
                <div class="detail-card-inner"  style="padding: 10px 10px;">
                  <p>phone number:</p>
                  <p><input type="text" name="phone" required></p>
                </div>
                <div class="detail-card-inner"  style="padding: 10px 10px;">
                  <p>Region:</p>
                  <p><input type="text" name="region" required></p>
                </div>
                <div class="detail-card-inner"  style="padding: 10px 10px;">
                  <p>City:</p>
                  <p><input type="text" name="state" required></p>
                </div>
                <div class="detail-card-inner"  style="padding: 10px 10px;">
                  <p>Street:</p>
                  <p><input type="text" name="street" required></p>
                </div>
                <div class="detail-card-inner"  style="padding: 10px 10px;">
                  <p><input type="checkbox" required>အိမ်ရောက်ငွေချေစနစ်ဖစ်ပါသည်။</p>
                </div>
                <div class="detail-card-inner"  style="padding: 10px 10px;">
                  <p style="margin: auto;"><input type="submit" name="buy" value="Exchange" required style="height: 30px;"></p>
                </div>
              </form>
            <?php } ?>
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