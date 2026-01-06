<!DOCTYPE html>
<?php
  session_start();
  include_once('php/db_conn.php');
  if(isset($_GET['buy'])){
    $buy = $_GET['buy'];
    echo "<script>alert('$buy');</script>";
  }
  if(isset($_GET['exchange'])){
    $buy = $_GET['exchange'];
    echo "<script>alert('$buy');</script>";
  }
?>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

	<!-- fontawesome -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
  <nav class="navbar navbar-expand-lg text-white mb-3 d-flex justify-content-between" style="background: #05445E; font-family: 'FugazOne-Regular';font-size: 1.3em;">
        <div class="me-5 col-5 p-3">
            <a class=" fs-1 p-3 mx-5 fw-bolder text-white text-decoration-none" id="logo" href="#">Electronic Service</a>
        </div>
        <div class=" col-6" id="navbarNav">
            <ul class="navbar-nav accordion-button">
                <li class="nav-item me-5">
                    <a class="nav-link btn btn-primary text-white px-3" href="index.php">Home</a>
                </li>
                <li class="nav-item me-5">
                    <a class="nav-link btn btn-primary text-white px-3" href="service_productPage.php">Services & Product</a>
                </li>
                <li class="nav-item me-5">
                    <a class="nav-link btn btn-primary text-white px-3" href="aboutPage.php">About</a>
                </li>
                <li class="nav-item me-5">
                    <a class="nav-link btn btn-primary text-white px-3" href="contactpage.php">Contact</a>
                </li>

                <li class="nav-item d-flex">
<?php
    if($_SESSION['uid']){
?>
                    <a class="nav-link btn btn-primary text-white px-3" href="profile.php">Profile</a>
<?php
    }
    else{
?>
                    <a class="nav-link btn btn-primary text-white px-3" href="loginform.php">Login</a>
<?php
    }
?>
                </li>
            </ul>

        </div>   
  </nav>
  <div>
      <div class="container">
          <div class="section-header text-center mx-auto mb-5 wow fadeInUp" style="max-width: 500px;">
              <h1 class="display-5 mb-3 fw-bolder">Our Services</h1>
          </div>
          <div class="row g-4" style="border-bottom: 1px solid black;padding-bottom: 20px;">
<?php
  $que="SELECT product_category FROM product group by product_category;";
  $res=mysqli_query($conn,$que);
  while($row=mysqli_fetch_assoc($res)){
  $category=$row['product_category'];
?>
              <div class="col-lg-3 col-md-6">
                  <div class=" card bg-white text-center h-100 p-4 p-xl-5">
                      <i class="fa-solid fa-truck mb-4 fs-1"></i>
                      <h4 class="mb-3"><?=$category?> Service</h4>
                      <p class="mb-4"></p>
                      <a class="btn btn-outline-primary border-2 py-2 px-4 rounded-pill" href="serviceCall.php? team=<?=$category?>">Read More</a>
                  </div>
              </div>
<?php } ?>
          </div>
      </div>
    </div>
<?php
  $query="SELECT product_category FROM product group by product_category;";
  $result=mysqli_query($conn,$query);
?>
	<div style="margin-top: 40px;padding: 16px;height: 1500px;"><!-- main-->
    <div class="section-header text-center mx-auto mb-5 wow fadeInUp" style="max-width: 500px;">
      <h1 class="display-5 mb-3 fw-bolder">Our Product</h1>
    </div>
<?php
  while($row=mysqli_fetch_assoc($result)){
    $category=$row['product_category'];
?>
      <h1 class=" fw-bolder text-center"><i class="fa-solid fa-fan"></i> <?=$category ?></h1>
          <div class="container mt-5" id="<?=$category ?>"><!-- group -->
  <?php
    $qu="SELECT product_type FROM product WHERE product_category='$category' group by product_type;;";
    $re=mysqli_query($conn,$qu);
    while($ptype=mysqli_fetch_assoc($re)){
      $type = $ptype['product_type'];
  ?>
            <h3 class=" fw-bolder"><i class="fa-solid fa-fan"></i> <?=$type ?></h3>
            <div class="row row-cols-1 row-cols-md-4 g-4 m-3" style="overflow-x: auto;">
    <?php
      $que="SELECT * FROM product WHERE product_category='$category' AND product_type='$type' order by product_brand asc;";
      $res=mysqli_query($conn,$que);
      while($col=mysqli_fetch_assoc($res)){
        $pid = $col['pid'];
    ?>
              <!-- item start -->
              <div class="col" id="<?=$pid?>">
                <div class="card p-2 text-center">
                  <div class="text-center">
                  <img src="images/<?=$col['product_img']?>" width="200px" height="200px" class="w-50" alt=""/>
                  </div>
                  <div class="card-body">
                    <h5 class="card-title"><?=$col['product_brand']?></h5>
                    <p class="card-text"><?=$col['product_price']?> <span>Kyats</span></p>
                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                      <label class="btn btn-success">
                        <a href="buynowpage.php? pid=<?=$pid?>" class="text-decoration-none text-white">Buy Now</a>
                      </label>
                      <label class="btn btn-primary">
                        <a href="exchange_orderPage.php? pid=<?=$pid?>" class="text-decoration-none text-white">Exchange</a>
                      </label>
                      <label class="btn btn-danger">
                        <a href="sendPage.php? img=<?=$col['product_img']?>" class=" text-decoration-none text-white">Send</a>
                      </label>
                    </div>
                  </div>
                </div>
              </div>
              <!-- end -->
    <?php } ?>

            </div>
  <?php } ?>
        </div><!--group end-->
<?php } ?>
      </div>
    </div><!-- main end-->
</body>
<!-- bootstrap js -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</html>