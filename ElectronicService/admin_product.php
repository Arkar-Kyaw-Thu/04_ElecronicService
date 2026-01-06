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
  if(isset($_POST['search'])){
    $item=$_POST['item'];
    $query="SELECT * FROM product WHERE product_brand like '%$item%' or product_category='$item';";
    $result=mysqli_query($conn,$query);
  }
  else{
    $query="SELECT * FROM product order by product_category asc;";
    $result=mysqli_query($conn,$query);
  }
?>
	  <main class="main-container">
        <div class="main-title">
          <h2>PRODUCT DETAIL</h2>
          <h2>
            <form method="post">
              <a href="admin_addProduct.php"><span class="material-icons-outlined" align="right">post_add</span></a>
              <input type="text" name="item" class="item" placeholder="Search item......">
              <button type="submit" name="search" class="search"><span class="material-icons-outlined" align="right">search</span></button>
            </form>
          </h2>
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
<?php $i++; }?>
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