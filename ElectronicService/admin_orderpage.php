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
  $query = "SELECT * FROM exchange order by eid desc;";
  $result = mysqli_query($conn,$query);
?>
    <main class="main-container">
        <div class="main-title">
          <h2>EXCHANGE ORDER</h2>
          
        </div>

        <div class="history-main-card">
<?php 
  while ($row=mysqli_fetch_assoc($result)) {
    $eid = $row['eid'];
    $uid = $row['uid'];
    $pid = $row['pid'];
    $date = $row['date'];
    $status = $row['status'];

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
          <a href="admin_orderComfirm.php? eid=<?=$eid?>">
            <div class="history-card" <?php if ($status=="comfirm") { ?> style="color: grey;<?php } ?>">
              <div class="history-card-inner">
                <h3><?=$acc_name?></h3>
                <p><?=$date?></p>
              </div>
              <div class="history-card-inner">
                <p>
                  <span class="material-icons-outlined">
                    currency_exchange
                  </span>
                  
                  <span><?=$brand?></span>
                </p>
                <p><?=$price?></p>
              </div>
            </div>
          </a>
<?php } ?>
        </div>
      </main>
      <!-- End Main -->
  </div>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/3.35.5/apexcharts.min.js"></script>
    <!-- Custom JS -->
  <script src="javascript/scripts.js"></script>
</body>
</html>