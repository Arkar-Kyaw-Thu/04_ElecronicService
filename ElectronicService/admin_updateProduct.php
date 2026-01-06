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
    <link rel="stylesheet" href="css/formdesign.css">
  </head>
<body>
	<div class="grid-container">
<?php 
  include "admin_header.php";
  if(isset($_POST['update'])){
    $filename = $_FILES['uploadfile']['name'];
    $tempname = $_FILES['uploadfile']['tmp_name'];
    $folder = "images/".$filename;

    $pid = $_POST['pid'];
    $brand=$_POST['brand'];
    $category=$_POST['category'];
    $type=$_POST['type'];
    $qty=$_POST['qty'];
    $price=$_POST['price'];
    $query="UPDATE `product` SET `product_img`='$filename',`product_brand`='$brand',`product_category`='$category',`product_type`='$type',`product_qty`='$qty',`product_price`='$price' WHERE pid='$pid';";
    mysqli_query($conn,$query);
    echo "<script>alert('Update Successfully!');</script>";
    if(!file_exists($folder)){
      move_uploaded_file($tempname , $folder);
    }
  }
  $pid = $_GET['pid'];
  $que = "SELECT * FROM product WHERE pid='$pid'";
  $res = mysqli_query($conn,$que);
  $cols = mysqli_fetch_assoc($res);
?>
	  <main class="main-container">
        <div class="main-title">
          <!--<h2><a href="admin_addProduct.php"><span class="material-icons-outlined" align="right">person_add</span></a></h2>-->
        </div>
        <div class="container">
          <div class="box form-box">
            <header>EDIT PRODUCT</header>
            <form action="" method="post" enctype="multipart/form-data">
              <input type="text" name="pid" id="image" value="<?=$cols['pid']?>" autocomplete="off" required style="display: none;">
              <div class="field input">
                <label for="image">Image</label>
                <input type="file" name="uploadfile" id="image" autocomplete="off" required>
              </div>              

              <div class="field input">
                <label for="brand">Brand</label>
                <input type="text" name="brand" id="brand" value="<?=$cols['product_brand']?>" autocomplete="off" required>
              </div>

              <div class="field input">
                <label for="category">Type</label>
                <select name="category" onchange="isSelect(this.form.category.selectedIndex)" required>
                  <option value="Aircon">Aircon</option>
                  <option value="Tv">Tv</option>
                  <option value="Refrigerator">Refrigerator</option>
                  <option value="WashingMachine">WashingMachine</option>
                </select>
              </div>

              <div class="field input">
                <label for="type">Type</label>
                <select name="type" required>
                  <option>Split</option>
                  <option>Window</option>
                  <option>Portable</option>
                  <option></option>
                </select>
              </div>

              <div class="field input">
                <label for="qty">Qty</label>
                <input type="text" name="qty" id="qty" value="<?=$cols['product_qty']?>" autocomplete="off" required>
              </div>

              <div class="field input">
                <label for="price">Price</label>
                <input type="text" name="price" id="price" value="<?=$cols['product_price']?>" autocomplete="off" required>
              </div>

              <div class="field">        
                <input type="submit" class="btn" name="update" value="Uploads" required>
              </div>
            </form>
          </div>
        </div>
    </main>
      <!-- End Main -->
	</div>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/3.35.5/apexcharts.min.js"></script>
    <!-- Custom JS -->
  <script src="javascript/scripts.js"></script>
  <script type="text/javascript">
    const fileInput = document.querySelector('input[type="file"]');  const myFile = new File(['Hello World!'], '<?=$cols['product_img']?>', { type: 'images', lastModified: new Date(), });
    const dataTransfer = new DataTransfer(); 
    dataTransfer.items.add(myFile); 
    fileInput.files = dataTransfer.files;
    var category=document.forms[0].elements["category"];
    var type=document.forms[0].elements["type"];
    function isSelect(index){
      if(category.options[index].value=="Aircon"){
        type.options[0].innerHTML="Split";
        type.options[1].innerHTML="Window";
        type.options[2].innerHTML="Portable";
        type.options[3].innerHTML=" ";
      }
      else if(category.options[index].value=="Tv"){
        type.options[0].innerHTML="32 inches";
        type.options[1].innerHTML="43 inches";
        type.options[2].innerHTML="48 inches";
        type.options[3].innerHTML="55 inches";
      }
      else if(category.options[index].value=="Refrigerator"){
        type.options[0].innerHTML="bottom freezer";
        type.options[1].innerHTML="chest freezer";
        type.options[2].innerHTML="Beverage cooler";
        type.options[3].innerHTML=" ";
      }
      else if(category.options[index].value=="WashingMachine"){
        type.options[0].innerHTML="Twin tub(washing & dryer)";
        type.options[1].innerHTML="Automatic washing machine";
        type.options[2].innerHTML=" ";
        type.options[3].innerHTML=" ";
      }
      else{
        alert("Please choose product type");
      }
    }
  </script>
</body>
</html>