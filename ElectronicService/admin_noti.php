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
  $i=1;
    $query="SELECT * FROM product WHERE product_qty<=2 ;";
    $result=mysqli_query($conn,$query);

    $que1 = "SELECT * FROM history WHERE status='uncomfirm' order by hid desc;";
    $res1 = mysqli_query($conn,$que1);
?>
	  <main class="main-container">

        <div class="main-title">
          <h2>TO DELIVERY PRODUCT</h2>
        </div>
        <div class="history-main-card">
<?php 
  while ($row=mysqli_fetch_assoc($res1)) {
    $hid = $row['hid'];
    $uid = $row['uid'];
    $pid = $row['pid'];
    $eid = $row['eid'];
    $date = $row['date'];

    $query1="SELECT * FROM acc_info where uid='$uid';";
    $result1=mysqli_query($conn,$query1);
    $acc=mysqli_fetch_assoc($result1);
    $acc_name = $acc['email'];

    $query2="SELECT * FROM product where pid='$pid';";
    $result2=mysqli_query($conn,$query2);
    $product=mysqli_fetch_assoc($result2);
    $brand = $product['product_brand'];
    $price = $product['product_price'];

?>
          <a href="admin_notiDetail.php? hid=<?=$hid?>">
            <div class="history-card" style="background: #;">
              <div class="history-card-inner">
                <h3><?=$acc_name?></h3>
                <p><?=$date?></p>
              </div>
              <div class="history-card-inner">
                <p>
                  <?php if($eid==0){ ?>
                    <span class="material-icons-outlined">local_atm</span>
                  <?php }else{ ?>
                    <span class="material-icons-outlined">currency_exchange</span>
                  <?php } ?>
                  
                  <span><?=$brand?></span>
                </p>
                <p><?=$price?></p>
              </div>
            </div>
          </a>
<?php } ?>
        </div>
<?php if(mysqli_num_rows($res1)==0){
?>
  <h2 align="center"> Not Need To Delivery</h2>
<?php } ?>
<hr>
        <div class="main-title">
          <h2>TO RESTOCK PRODUCT</h2>
        </div>
        <div class="card-table">
          <center>
            <table  align="center">
              <tr>
                <td>NO</td>
                <td>Image</td>
                <td>Brand</td>
                <td>Category</td>
                <td>Type</td>
                <td>Qty</td>
                <td>Price</td>
                <td>Operation</td>
              </tr>
<?php while ($row=mysqli_fetch_assoc($result)) { ?>
              <tr>
                <td><?=$i?></td>
                <td><img src="images/<?=$row['product_img']?>" width="60px" height="60px"></td>
                <td><?=$row['product_brand']?></td>
                <td><?=$row['product_category']?></td>
                <td><?=$row['product_type']?></td>
                <td><?=$row['product_qty']?></td>
                <td><?=$row['product_price']?></td>
                <td>
                  <a href="admin_updateProduct.php? pid=<?=$row['pid']?>" style="text-decoration: none;"><button style="padding: 10px;">Edit</button></a>
                  <a href="admin_deleteProduct.php? pid=<?=$row['pid']?>" style="text-decoration: none;"><button style="padding: 10px;text-decoration: none;">Delete</button></a>
                </td>
              </tr>
<?php $i++; }
  if(mysqli_num_rows($result)==0){
?>
  <tr><td colspan="8"><h1 align="center">No Need To Add Your Product</h1></td></tr>
<?php
  }
?>
            </table>
          </center>
        </div>
    </main>
      <!-- End Main -->
	</div>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/3.35.5/apexcharts.min.js"></script>
    <!-- Custom JS -->
  <script src="javascript/scripts.js"></script>
</body>
</html>