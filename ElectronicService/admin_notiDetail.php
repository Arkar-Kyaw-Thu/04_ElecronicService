<!DOCTYPE html>
<html>
	<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>Product Page</title>

    <!-- Montserrat Font -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/admin.css">
  </head>
<body>
	<div class="grid-container">
<?php 
  include "admin_header.php";
  $hid = $_GET['hid'];
  if(isset($_POST['delivery'])){
    $hid = $_POST['hid'];
    $query = "UPDATE history SET status='comfirm' WHERE hid='$hid';";
    mysqli_query($conn,$query);
    echo "<script>alert('Delivery To This Order!');</script>";
  }
  $query = "SELECT * FROM history WHERE hid='$hid';";
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
    $status = $row['status'];
    $cprice =0;
    $nid ="";

    $query1="SELECT * FROM acc_info where uid='$uid';";
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
      $query = "SELECT * FROM notification WHERE uid='$uid' AND eid='$eid';";
      $result = mysqli_query($conn,$query);
      $row = mysqli_fetch_assoc($result);
      $nid = $row['nid'];
      $cprice = $row['comfirm_price'];
    }
    $price-=$cprice;
?>
	  <main class="main-container">
        <div class="main-title">
          <h2><a href="admin_noti.php"><span class="material-icons-outlined">arrow_back</span></a></h2>
        </div>
        <div class="detail-main-card">

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
                <p><a href="admin_orderComfirm.php? eid=<?=$eid?>">click</a></p>
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
                <p><?=$price?></p>
              </div>
            <?php if($status=="uncomfirm"){ ?>
              <div class="detail-card-inner">
                <p></p>
                <form action="" method="post">
                  <input type="text" name="hid" value="<?=$hid?>" style="display: none;">
                  <button name="delivery">Delivery</button>
                </form>
              </div>
            <?php } ?>
            </div>

        </div>
      </main>
      <!-- End Main -->
	</div>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/3.35.5/apexcharts.min.js"></script>
    <!-- Custom JS -->
  <script src="javascript/scripts.js"></script>
</body>
</html>