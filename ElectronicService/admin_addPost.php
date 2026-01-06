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
<style type="text/css">
.history-card-inner input{
    height: 40px;
    width: 50%;
    margin: 3%;
    font-size: 16px;
    padding: 6px 6px;
    border-radius: 5px;
    border: 1px solid #ccc;
    outline: none;
}
.history-card-inner select{
    height: 40px;
    width: 53%;
    margin: 3%;
    font-size: 16px;
    padding: 6px 6px;
    border-radius: 5px;
    border: 1px solid #ccc;
    outline: none;
}
.history-card-inner textarea{
    height: 120px;
    width: 50%;
    margin: 3%;
    font-size: 16px;
    border-radius: 5px;
    border: 1px solid #ccc;
}
.btn{
    height: 35px;
    background: #05445E;
    border: 0;
    border-radius: 5px;
    color: #fff;
    font-size: 15px;
    cursor: pointer;
    transition: all .3s;
    margin-top: 10px;
    padding: 0px 10px;
}
.btn:hover{
    opacity: 0.82;
}
.submit{
    width: 100%;
}
</style>
  </head>
<body>
	<div class="grid-container">
<?php 
  include "admin_header.php";
  if(isset($_POST['post'])){
    $filename = $_FILES['uploadfile']['name'];
    $tempname = $_FILES['uploadfile']['tmp_name'];
    $folder = "images/post/".$filename;
    $description = $_POST['description'];
    $myDate = date('Y-m-d');

    $query="INSERT INTO `post`(`post_img`, `post_description`, `date`) VALUES ('$filename','$description','$myDate');";
    mysqli_query($conn,$query);
    echo "<script>alert('Add New Post Successfully!');</script>";
    if(move_uploaded_file($tempname , $folder)){
    }
    
  }
?>
	  <main class="main-container">
        <div class="main-title">
          <h2><a href="admin_post.php"><span class="material-icons-outlined">arrow_back</span></a></h2>
        </div>
        <form action="" method="post" enctype="multipart/form-data">
          <h1 align="center">Add Post</h1>
          <div class="detail-main-card" style="margin-top: 3%;height: 300px;">
            <div class="detail-card" style="background: #;">
              <div class="detail-card-inner" style="height: 20%;">
                <label for="image">Image</label>
                <input type="file" name="uploadfile" id="image" autocomplete="off" required>
              </div>
              <div class="detail-card-inner" style="height: 60%;">
                <label for="brand">Description</label>
                <textarea name="description" cols="50" rows="8"></textarea>
              </div>
              <div class="detail-card-inner" style="height: 20%;">
                <label for="image"></label>
                <input type="submit" name="post" id="image" value="POST" autocomplete="off" required>
              </div>
            </div>
          </div>
        </form>
    </main>
      <!-- End Main -->
	</div>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/3.35.5/apexcharts.min.js"></script>
    <!-- Custom JS -->
  <script src="javascript/scripts.js"></script>
</body>
</html>