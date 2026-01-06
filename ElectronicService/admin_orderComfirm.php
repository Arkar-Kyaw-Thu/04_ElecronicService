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
  if(isset($_POST['comfirm'])){
      $eid = $_POST['eid'];
      $uid = $_POST['uid'];
      $comfirmPrice = $_POST['comfirmPrice'];
      $des = $_POST['description'];
      $ncomfirm = $_POST['ncomfirm'];

      $que = "INSERT INTO `notification`(`uid`, `eid`, `comfirm_price`, `description`,`comfirm`,`status`) VALUES ('$uid','$eid','$comfirmPrice','$des','$ncomfirm','notbuy')";
      mysqli_query($conn,$que);

      $que1 = "UPDATE exchange SET status='comfirm' WHERE eid='$eid'";
      mysqli_query($conn,$que1);
      echo "<script>alert('Comfirmed Successfully!');</script>";
  }
  $eid = $_GET['eid'];
  $query = "SELECT * FROM exchange WHERE eid='$eid';";
  $result = mysqli_query($conn,$query);
  $row = mysqli_fetch_assoc($result);
  $eid = $row['eid'];
  $uid = $row['uid'];
  $pid = $row['pid'];
  $user_product = $row['user_product'];
  $item_brand = $row['item_brand'];
  $year = $row['year'];
  $error = $row['error'];
  $date = $row['date'];
  $status = $row['status'];
  $comfirm = "";
  if($status=="comfirm"){
    $que2 = "SELECT * FROM notification WHERE eid='$eid';";
    $res2 = mysqli_query($conn,$que2);
    $col = mysqli_fetch_assoc($res2);
    $comfirm = $col['comfirm']; 
  }

    $query1="SELECT * FROM user_info where uid='$uid';";
    $result1=mysqli_query($conn,$query1);
    $acc=mysqli_fetch_assoc($result1);
    $acc_name = $acc['name'];

    $query2="SELECT * FROM product where pid='$pid';";
    $result2=mysqli_query($conn,$query2);
    $product=mysqli_fetch_assoc($result2);
    $img = $product['product_img'];
    $brand = $product['product_brand'];
    $category = $product['product_category'];
    $type = $product['product_type'];
    $price = $product['product_price'];

?>
	  <main class="main-container">
        <div class="main-title">
          <h2><a href="admin_orderpage.php"><span class="material-icons-outlined">arrow_back</span></a></h2>
        </div>
        <?php if($comfirm=="success"){ ?>
          <h2 align="center" style="color: green; margin-top: -50px;">SUCCESSFUL!</h2>
        <?php }else if($comfirm=="cancel"){ ?>
          <h2 align="center" style="color: red; margin-top: -50px;">CANCEL!</h2>
        <?php } ?>
        <div class="order-main-card">
            <div class="order-card" style="background: #;">
              <h1>Our_product</h1>
              <div class="order-card-inner">
                <h3></h3>
                <p><?=$date?></p>
              </div>
              <center><img src="images/<?=$img?>" height="200px"></center>
              <div class="order-card-inner">
                <h3><?=$brand?>, <?=$category?>, <?=$type?></h3>
                <p><?=$price?></p>
              </div>
            </div>

            <div class="order-card" style="background: #;">
              <h1>Customer_product</h1>
              <div class="order-card-inner">
                <h3></h3>
                <p>Acc_name: <?=$acc_name?></p>
              </div>
              <div class="order-card-inner">
                <img src="images/exchangeorder/<?=$user_product?>" height="200px">
                <h3>brand: <?=$item_brand?><br><br>year: <?=$year?><br><br>Error: <?=$error?></h3>
              </div>
              <center style="border-top: 1px solid black;margin-top: 20px;">
                <form action="" method="post">
                  <input type="text" name="eid" value="<?=$eid?>" style="display: none;">
                  <input type="text" name="uid" value="<?=$uid?>" style="display: none;">
                  <table>
                    <tr>
                      <td>Price:</td>
                      <td><input type="text" name="comfirmPrice" required></td>
                    </tr>
                    <tr>
                      <td>Description:</td>
                      <td>
                        <textarea name="description" required></textarea>
                      </td>
                    </tr>
                    <tr>
                      <td>Comfirm</td>
                      <td>
                        <input type="radio" name="ncomfirm" value="success" required>success<input type="radio" name="ncomfirm" value="cancel" required>cancel
                      </td>
                    </tr>
                  <?php if($status!="comfirm"){ ?>
                    <tr>
                      <td colspan="2"><input type="submit" name="comfirm" value="send"></td>
                    </tr>
                  <?php } ?>
                  </table>
                </form>
              </center>
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