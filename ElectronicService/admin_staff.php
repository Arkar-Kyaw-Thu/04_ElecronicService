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
          <h2>STAFF INFORMATION</h2>
  <?php if($_SESSION['type']!="staff"){ ?>        
    <h2><a href="admin_addStaff.php"><span class="material-icons-outlined" align="right">person_add</span></a></h2> 
  <?php } ?>
        </div>
<?php
  $sql="SELECT team FROM staff_info group by team;";
  $res=mysqli_query($conn,$sql);
  while ($group=mysqli_fetch_assoc($res)) {
    $team=$group['team']
?>
        <div class="card-title">
          <h3><?=$team?> Service</h3>
        </div>
        <div class="main-cards" style="overflow-x: auto;">
  <?php
    $query="SELECT * FROM staff_info where team='$team';";
    $result=mysqli_query($conn,$query);
    while ($row=mysqli_fetch_assoc($result)) {
  ?>
          <div class="card" style="width: 350px;">
            <div class="card-header">
              <a href="adminn_staffDetail.php? edit_staff=<?=$row['sid']?>"><span class="material-icons-outlined" align="right">info</span></a>
            </div>
            <div class="card-inner">
              <img src="images/<?=$row['staff_img']?>" width="100px" height="130px" style="border-radius: 50%;">
              <span>
                <table>
                  <tr>
                    <td>Name:</td>
                    <td><?=$row['staff_name']?></td>
                  </tr>
                  <tr>
                    <td>Position:</td>
                    <td><?=$row['position']?></td>
                  </tr>
                  <tr>
                    <td>PhNO:</td>
                    <td><?=$row['phno']?></td>
                  </tr>
                  <tr>
                    <td>Status:</td>
                    <td><?=$row['status']?></td>
                  </tr>
                </table>
              </span>
            </div>
    <?php if($_SESSION['type']!="staff"){ ?>
            <div class="card-button">
              <a href="admin_editStaff.php? edit_staff=<?=$row['sid']?>">Edit</a>
              <a href="admin_removeStaff.php? remove_staff=<?=$row['sid']?>">Remove</a>
            </div>
    <?php } ?>
          </div>
  <?php } ?>
        </div>
<?php } ?>
    </main>
      <!-- End Main -->
	</div>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/3.35.5/apexcharts.min.js"></script>
    <!-- Custom JS -->
  <script src="javascript/scripts.js"></script>
</body>
</html>