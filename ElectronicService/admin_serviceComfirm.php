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

  if(isset($_POST['paid'])){
    $shid = $_POST['shid'];
    $sid = $_POST['sid'];
    $cprice = $_POST['cprice'];

    $que1 = "UPDATE staff_info SET status='free' WHERE sid='$sid';";
    mysqli_query($conn,$que1);

    $que2 = "UPDATE service_hisory SET price='$cprice', status='comfirm' WHERE shid='$shid';";
    mysqli_query($conn,$que2);
    echo "<script>alert('Paid Successfully!');</script>";
  }

  $shid = $_GET['shid'];
  $query = "SELECT * FROM service_hisory WHERE shid='$shid';";
  $result = mysqli_query($conn,$query);
  $row = mysqli_fetch_assoc($result);

    $shid = $row['shid'];
    $uid = $row['uid'];
    $sid = $row['sid'];
    $name = $row['name'];
    $phone = $row['phno'];
    $address = $row['address'];
    $date = $row['date'];
    $price = $row['price'];
    $status = $row['status'];

    $query1="SELECT * FROM acc_info where uid='$uid';";
    $result1=mysqli_query($conn,$query1);
    $acc=mysqli_fetch_assoc($result1);
    $acc_email = $acc['email'];

    $query2="SELECT * FROM staff_info where sid='$sid';";
    $result2=mysqli_query($conn,$query2);
    $staff=mysqli_fetch_assoc($result2);
    $staff_name = $staff['staff_name'];

?>
	  <main class="main-container">
        <div class="main-title">
          <h2><a href="admin_history.php"><span class="material-icons-outlined">arrow_back</span></a></h2>
        </div>
        <div class="detail-main-card">

            <div class="detail-card" style="background: #;">
              <div style="border-bottom: 1px solid black;">
              <?php if($status=="comfirm"){ ?>
                <p align="center"><span class="material-icons-outlined">price_check</span><br><br><span style="color: green;">Successfully!</span><p>
              <?php }else{ ?>
                <p align="center"><span class="material-icons-outlined">price_check</span><br><br><span style="color: red;">Unpaid!</span><p>
              <?php } ?>
              </div>
               
              <div class="detail-card-inner">
                <p>StaffName</p>
                <p><?=$staff_name?></p>
              </div>
              <div class="detail-card-inner">
                <p>Date</p>
                <p><?=$date?></p>
              </div>
              <div class="detail-card-inner">
                <p>Acc_name</p>
                <p><?=$acc_email?></p>
              </div>
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

            <?php if($status=="comfirm"){ ?>
              <div class="detail-card-inner">
                <p>Price</p>
                <p><?=$price?></p>
              </div>
            <?php }else{ ?>
              <div class="detail-card-inner" style="border-top: 1px solid black; padding-top: 10px;">
                  <p>Price</p>
                    <form action="" method="post" style="text-align: right;">
                      <input type="type" name="shid" value="<?=$shid?>" style="display:none;">
                      <input type="type" name="sid" value="<?=$sid?>" style="display:none;">
                      <input type="type" name="cprice" required><br><br>
                      <button type="submit" name="paid" style="padding: 10px;">Paid</button>
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