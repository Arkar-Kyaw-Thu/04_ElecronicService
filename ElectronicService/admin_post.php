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
<?php include "admin_header.php"; ?>
    <main class="main-container">
        <div class="main-title">
          <h2>Post</h2>
  <?php if($_SESSION['type']!="staff"){ ?>        
    <h2><a href="admin_addPost.php"><span class="material-icons-outlined" align="right">post_add</span></a></h2> 
  <?php } ?>
        </div>
        <div class="history-main-card">
  <?php
    $query="SELECT * FROM post order by date desc;";
    $result=mysqli_query($conn,$query);
    while ($row=mysqli_fetch_assoc($result)) {
  ?>
          <div class="history-card" style="width: 350px;">
            <div class="history-card-inner">
              <p></p>
              <p><?=$row['date']?></p>
            </div>
            <div class="history-card-inner">
              <img src="images/post/<?=$row['post_img']?>" style="width: 100%;height: 400px;">
            </div>
            <div class="history-card-inner">
              <p><?=$row['post_description']?></p>
            </div>
    <?php if($_SESSION['type']!="staff"){ ?>
            <div class="card-button">
              <a href="admin_editPost.php? edit_post=<?=$row['oid']?>">Edit</a>
              <a href="admin_removePost.php? remove_post=<?=$row['oid']?>">Remove</a>
            </div>
    <?php } ?>
          </div>
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