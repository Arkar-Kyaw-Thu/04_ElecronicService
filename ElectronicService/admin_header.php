<?php 
  session_start();
  include "php/db_conn.php";
  if(!isset($_SESSION['uid'])){
    header("location: admin_loginform.php");
  }
  $que = "SELECT * FROM product WHERE product_qty<=2";
  $res = mysqli_query($conn,$que);
  $num1 = mysqli_num_rows($res);

  $que1 = "SELECT * FROM history WHERE status='uncomfirm';";
  $res1 = mysqli_query($conn,$que1);
  $num2 = mysqli_num_rows($res1);

  $num = $num1+$num2;
?>
<style type="text/css">
.noti {
  position: relative;
  display: inline-block;
  border-radius: 2px;
}
.noti .badge {
  font-size: 13px;
  position: absolute;
  top: -10px;
  right: -10px;
  padding: 5px 8px;
  border-radius: 100%;
  background: red;
  color: white;
}
</style>
<header class="header">
  <div class="menu-icon" onclick="openSidebar()">
    <span class="material-icons-outlined">menu</span>
  </div>
  <div class="header-left">
    <span></span>
  </div>
  <div class="header-right">
    <a href="admin_noti.php" class="noti">
      <span class="material-icons-outlined">circle_notifications</span>
      <?php  if($num>0){ ?><span class="badge"><?=$num?></span><?php } ?>
    </a>&nbsp;&nbsp;&nbsp;
    <a href="admin_chat.php"><span class="material-icons-outlined">sms</span></a>&nbsp;&nbsp;&nbsp;
    <a href="admin_logout.php"><span class="material-icons-outlined">exit_to_app</span></a>
  </div>
  </header>
<!-- End Header -->

<!-- Sidebar -->
<aside id="sidebar">
  <div class="sidebar-title">
    <div class="sidebar-brand">
      <span class="material-icons-outlined">engineering</span> ADMIN
    </div>
      <span class="material-icons-outlined" onclick="closeSidebar()">close</span>
  </div>

  <ul class="sidebar-list">
    <li class="sidebar-list-item">
      <a href="admin_dashboard.php">
        <span class="material-icons-outlined">dashboard</span> Dashboard
      </a>
    </li>
    <li class="sidebar-list-item">
      <a href="admin_post.php">
        <span class="material-icons-outlined">pages</span> Post
      </a>
    </li>
    <li class="sidebar-list-item">
      <a href="admin_staff.php">
        <span class="material-icons-outlined">contact_mail</span> Staff
     </a>
    </li>
    <li class="sidebar-list-item">
      <a href="admin_product.php">
        <span class="material-icons-outlined">inventory_2</span> Products
      </a>
    </li>
    <li class="sidebar-list-item">
      <a href="admin_orderpage.php">
        <span class="material-icons-outlined">work_history</span> Order
      </a>
    </li>
    <li class="sidebar-list-item">
      <a href="admin_service.php">
        <span class="material-icons-outlined">directions_car</span> Service_history
      </a>
    </li>
    <li class="sidebar-list-item">
      <a href="admin_history.php">
        <span class="material-icons-outlined">shopping_cart</span> Sale_History
      </a>
    </li>
  </ul>
</aside>