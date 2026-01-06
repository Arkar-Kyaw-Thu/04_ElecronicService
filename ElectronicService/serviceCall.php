<!DOCTYPE html>
<?php
session_start();
include_once('php/db_conn.php');
if(!$_SESSION['uid']){
    header('location:loginform.php');  
}
$team = $_GET['team'];
$query="SELECT * FROM staff_info where team='$team';";
$result=mysqli_query($conn,$query);

?>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <!-- fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
  <div style="margin: 20px;padding: 20px;">
    <h3><a href="service_productPage.php" style="color: black;text-decoration: none;"><span class="material-icons-outlined">arrow_back</span></a><span style="margin-left: 10%;"><?=$team?></span> Services</h3>
    <div style="margin-top: 40px;padding: 16px;"><!-- main-->
      <h1 class=" fw-bolder text-center"><i class="fa-solid fa-fan"></i> Choose staff</h1>
          <div class="container mt-5"><!-- group -->
            <div class="row row-cols-1 row-cols-md-4 g-4 m-3" style="overflow-x: auto;">
    <?php
      while($col=mysqli_fetch_assoc($result)){
        $sid = $col['sid'];
        $status = $col['status'];
    ?>
              <!-- item start -->
              <div class="col">
                <div class="card p-2 text-center">
                  <div class="text-center">
                  <img src="images/<?=$col['staff_img']?>" width="200px" height="200px" class="w-50" alt=""/>
                  </div>
                  <div class="card-body">
                    <h5 class="card-title"><?=$col['staff_name']?></h5>
                    <p class="card-text"><span></span></p>
                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                    <?php if($status=="free"){?>
                      <label class="btn btn-success">
                        <a href="serviceCallForm.php? sid=<?=$col['sid']?>" class=" text-decoration-none text-white">call</a>
                      </label>
                    <?php }else if($status =="busy"){ ?>
                      <h6 style="color: red;">This person is busy right now!</h6>
                    <?php } ?>
                    </div>
                  </div>
                </div>
              </div>
              <!-- end -->
    <?php } ?>
            </div>
        </div><!--group end-->
      </div>
    </div><!-- main end-->
</body>
<!-- bootstrap js -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</html>