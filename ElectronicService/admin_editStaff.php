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
    outline: none;
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

  if(isset($_POST['edit'])){
    $filename = $_FILES['uploadfile']['name'];
    $tempname = $_FILES['uploadfile']['tmp_name'];
    $folder = "images/".$filename;

    $sid = $_POST['sid'];
    $name = $_POST['name'];
    $work_experience = $_POST['work_experience'];
    $position = $_POST['position'];
    $team = $_POST['team'];
    $address = $_POST['address'];
    $phno = $_POST['phno'];
    $salary = $_POST['salary'];
    $about = $_POST['about'];
    $query="UPDATE `staff_info` SET `staff_img`='$filename',`staff_name`='$name',`position`='$position',`work_experience`='$work_experience',`team`='$team',`address`='$address',`phno`='$phno',`about`='$about', `salary`='$salary' WHERE sid='$sid';";
    mysqli_query($conn,$query);
    echo "<script>alert('Update Successfully!');</script>";
    if(!file_exists($folder)){
      move_uploaded_file($tempname , $folder);
    }
    
  }

  $sid = $_GET['edit_staff'];
  $query="SELECT * FROM staff_info where sid='$sid';";
  $result=mysqli_query($conn,$query);
  $row=mysqli_fetch_assoc($result);
?>
    <main class="main-container">
        <div class="main-title">
          <h2><a href="admin_staff.php"><span class="material-icons-outlined">arrow_back</span></a></h2>
        </div>
        <form action="" method="post" enctype="multipart/form-data">
          <h1 align="center">Edit Staff Information</h1>
          <input type="text" name="sid" id="name" value="<?=$row['sid']?>" autocomplete="off" style="display: none;">
          <div class="history-main-card">
            <div class="history-card" style="background: #;">
              <div class="history-card-inner">
                <label for="image">Image</label>
                <input type="file" name="uploadfile" id="image" autocomplete="off" required>
              </div>
              <div class="history-card-inner">
                <label for="brand">Name</label>
                <input type="text" name="name" id="name" value="<?=$row['staff_name']?>" autocomplete="off" required>
              </div>
              <div class="history-card-inner">
                <label for="position">Position</label>
                <input type="text" name="position" id="name" value="<?=$row['position']?>" autocomplete="off" required>
              </div>
              <div class="history-card-inner">
                <label for="work_experience">Work Experience</label>
                <input type="text" name="work_experience" id="work_experience" value="<?=$row['work_experience']?>" autocomplete="off" required>
              </div>
              <div class="history-card-inner">
                <label for="team">Team</label>
                <input type="text" name="team" id="name" value="<?=$row['team']?>" autocomplete="off" required>
              </div>
            </div>
            <div class="history-card" style="background: #;">
              <div class="history-card-inner">
                <label for="work_experience">Address</label>
                <input type="text" name="address" id="work_experience" value="<?=$row['address']?>" autocomplete="off" required>
              </div>
              <div class="history-card-inner">
                <label for="work_experience">Phone Number</label>
                <input type="text" name="phno" id="work_experience" value="<?=$row['phno']?>" autocomplete="off" required>
              </div>
              <div class="history-card-inner">
                <label for="work_experience">Salary</label>
                <input type="text" name="salary" id="work_experience" value="<?=$row['salary']?>" autocomplete="off" required>
              </div>
              <div class="history-card-inner">
                <label for="work_experience">Degree</label>
                <textarea name="about"><?=$row['about']?></textarea>
              </div>
              <div class="history-card-inner">
                <input type="submit" class="btn" name="edit" value="Uploads" required style="margin: auto;">
              </div>
            </div>
          </div>
        </form>
    </main>
      <!-- End Main -->
  </div>
  <script>  
    const fileInput = document.querySelector('input[type="file"]');  const myFile = new File(['Hello World!'], '<?=$row['staff_img']?>', { type: 'images', lastModified: new Date(), });
    const dataTransfer = new DataTransfer(); 
    dataTransfer.items.add(myFile); 
    fileInput.files = dataTransfer.files;
 </script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/3.35.5/apexcharts.min.js"></script>
    <!-- Custom JS -->
  <script src="javascript/scripts.js"></script>
</body>
</html>