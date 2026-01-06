<!DOCTYPE html>
<?php
    session_start();
    include_once('php/db_conn.php');
    if(!$_SESSION['uid']){
        header('location:loginform.php');  
    }
    else{
        if(isset($_GET['pid'])){
            $item = $_GET['pid'];
            $query = "SELECT * FROM product WHERE pid='$item';";
            $result = mysqli_query($conn,$query);
            $row = mysqli_fetch_assoc($result);

        }
    }
    if(isset($_POST['comfirm'])){
        $user = $_SESSION['uid'];
        $our_product = $_POST['our_product'];
        $filename = $_FILES['uploadfile']['name'];
        $tempname = $_FILES['uploadfile']['tmp_name'];
        $folder = "images/exchangeOrder/".$filename;

        $brand = $_POST['brand'];
        $year = $_POST['year'];
        $error = $_POST['error'];
        $today = date('Y-m-d');

        $que = "INSERT INTO `exchange`(`uid`, `pid`, `user_product`, `item_brand`, `year`, `error`, `date`, `status`) VALUES ('$user','$our_product','$filename','$brand','$year','$error','$today','uncomfirm');";
        $res = mysqli_query($conn,$que);
        echo "<script>alert('Order Successfully!');</script>";
        if($res){
            move_uploaded_file($tempname , $folder);
            header('location: service_productPage.php?exchange=Order Successfully!');
        }
    }
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">
    <!-- bootstrap link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

</head>

<body>
    <div class="container">
        <div class="row mt-5">
            <div class="col-4">
                <div class="card">
                    <div class="card-body pt-4 d-flex flex-column align-items-center shadow bg-light">
                        <a href="service_productPage.php#<?=$row['pid']?>" style="position: absolute;left: 10%;text-decoration: none;color: black;"><span class="material-icons-outlined">arrow_back</span></a>
                        <img src="images/<?= $row['product_img']?>" alt="" class=" w-50">
                        <h3 class=" fw-bold mt-3"><?= $row['product_brand']?></h3>
                        <h4 class=" fw-bold"><?= $row['product_price']?> Kyats</h4>
                    </div>
                </div>

            </div>

            <div class="col-6">

                <div class="card bg-light">
                    <div class="card-body">
                        <div class=" pt-2">

                            <!-- Profile Edit Form -->
                            <form action="" method="post" enctype="multipart/form-data">
                                <input type="text" name="our_product" value="<?= $row['pid'] ?>" style="display: none;">
                                <div class="row mb-3">
                                    <h3>Form</h3>
                                </div>

                                <div class="row mb-3">
                                    <label for="img" class="col-md-4 col-lg-3 col-form-label fw-bold">Image</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input name="uploadfile" type="file" class="form-control" required>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="year" class="col-md-4 col-lg-3 col-form-label fw-bold">Product brand</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input name="brand" type="text" class="form-control" required>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="year" class="col-md-4 col-lg-3 col-form-label fw-bold">Year of Purchase</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input name="year" type="text" class="form-control" required>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="error" class="col-md-4 col-lg-3 col-form-label fw-bold">Description</label>
                                    <div class="col-md-8 col-lg-9">
                                        <textarea name="error" id="" cols="30" rows="10" class=" form-control" placeholder="Your items have an error?" required></textarea>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="" class="col-md-4 col-lg-6 col-form-label fw-bold">
                                        <input type="checkbox" required style="margin-right:10%;">agree terms & policy
                                    </label>
                                </div>

                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary" name="comfirm">Confirm</button>
                                </div>
                            </form>
                            <!-- End Profile Edit Form -->

                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
</body>
<!-- bootstrap js -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</html>