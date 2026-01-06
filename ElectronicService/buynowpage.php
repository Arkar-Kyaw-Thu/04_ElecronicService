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
    if(isset($_POST['buy'])){
        $user = $_SESSION['uid'];
        $our_product = $_POST['our_product'];
        
        $query1 = "SELECT * FROM product WHERE pid='$our_product';";
        $result1 = mysqli_query($conn,$query1);
        $row1 = mysqli_fetch_assoc($result1);
        $qty = $row1['product_qty'];
        $qty--;
        $query2 = "UPDATE product SET product_qty='$qty' WHERE pid='$our_product';";
        mysqli_query($conn,$query2);

        $name = $_POST['name'];
        $phno = $_POST['phone'];
        $region = $_POST['region'];
        $state = $_POST['state'];
        $street = $_POST['street'];
        $address= $street.", ".$state.", ".$region;

        $today = date('Y-m-d');

        $que = "INSERT INTO `history`(`uid`, `pid`, `name`, `phno`, `address`, `date` ,`status`) VALUES ('$user','$our_product','$name','$phno','$address','$today','uncomfirm')";
        $res = mysqli_query($conn,$que);
        echo "<script>alert('Purchased Successfully!');</script>";
        if($res){
            header('location: service_productPage.php? buy=Purchased Successfully!');
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
                                    <label for="name" class="col-md-4 col-lg-3 col-form-label fw-bold">Name</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input name="name" type="text" class="form-control" required>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="phone" class="col-md-4 col-lg-3 col-form-label fw-bold">phone number</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input name="phone" type="text" class="form-control" required>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="region" class="col-md-4 col-lg-3 col-form-label fw-bold">Region</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input name="region" type="text" class="form-control" require>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="state" class="col-md-4 col-lg-3 col-form-label fw-bold">City</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input name="state" type="text" class="form-control" required>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="street" class="col-md-4 col-lg-3 col-form-label fw-bold">Street</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input name="street" type="text" class="form-control" required>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="" class="col-md-4 col-lg-6 col-form-label fw-bold">
                                        <input type="checkbox" required style="margin-right:10%;">အိမ်ရောက်ငွေချေစနစ်ဖစ်ပါသည်။
                                    </label>
                                </div>

                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary" name="buy">Buy</button>
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