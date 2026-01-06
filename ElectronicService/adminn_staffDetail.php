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
    border: 1px solid transparent;
    outline: none;
}

.history-card-inner textarea{
    height: 120px;
    width: 50%;
    margin: 3%;
    font-size: 16px;
    border-radius: 5px;
    border: 1px solid transparent;
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
          <h1 align="center">Staff Information</h1>
          <input type="text" name="sid" id="name" value="<?=$row['sid']?>" autocomplete="off" style="display: none;">
          <div class="history-main-card">
            <div class="history-card" style="background: #;">
              <div class="history-card-inner">
                <label for="brand">Name</label>
                <input type="text" name="name" id="name" value="<?=$row['staff_name']?>" autocomplete="off" required>
              </div>
              <div class="history-card-inner">
                <label for="position">Position</label>
                <input type="text" name="name" id="name" value="<?=$row['position']?>" autocomplete="off" readonly>
              </div>
              <div class="history-card-inner">
                <label for="work_experience">Work Experience</label>
                <input type="text" name="work_experience" id="work_experience" value="<?=$row['work_experience']?>" autocomplete="off" required>
              </div>
              <div class="history-card-inner">
                <label for="team">Team</label>
                <input type="text" name="name" id="name" value="<?=$row['team']?>" autocomplete="off" readonly>
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
                <input type="text" name="phno" id="work_experience" value="<?=$row['salary']?>" autocomplete="off" required>
              </div>
              <div class="history-card-inner">
                <label for="work_experience">Degree</label>
                <textarea name="about">
                  <?=$row['about']?>
                </textarea>
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