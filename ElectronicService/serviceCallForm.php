<!DOCTYPE html>
<?php
    session_start();
    include_once('php/db_conn.php');
    if(!$_SESSION['uid']){
        header('location:loginform.php');  
    }

    $sid = $_GET['sid'];
    $query = "SELECT * FROM staff_info WHERE sid='$sid';";
    $result = mysqli_query($conn,$query);
    $row = mysqli_fetch_assoc($result);
    $team = $row['team'];

    if(isset($_POST['call'])){
        $user = $_SESSION['uid'];
        $sid = $_POST['sid'];

        $query = "SELECT * FROM staff_info WHERE sid='$sid';";
        $result = mysqli_query($conn,$query);
        $col = mysqli_fetch_assoc($result);
        $team = $col['team'];

        $query1 = "UPDATE staff_info SET status='busy' WHERE sid='$sid';";
        mysqli_query($conn,$query1);

        $name = $_POST['name'];
        $phno = $_POST['phone'];
        $region = $_POST['region'];
        $state = $_POST['state'];
        $street = $_POST['street'];
        $address= $street.", ".$state.", ".$region;
        $today = date('Y-m-d');

        $que = "INSERT INTO `service_hisory`(`uid`, `sid`, `name`, `phno`, `address`, `date`, `status`) VALUES ('$user','$sid','$name','$phno','$address','$today','uncomfirm');";
        $res = mysqli_query($conn,$que);
        echo "<script>alert('Service Call Successfully!');</script>";
        if($res){
            header("location: serviceCall.php?team=".$team);
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
                        <a href="serviceCall.php?team=<?=$team?>" style="position: absolute;left: 10%;text-decoration: none;color: black;"><span class="material-icons-outlined">arrow_back</span></a>
                        <img src="images/<?= $row['staff_img']?>" alt="" class=" w-50">
                        <h3 class=" fw-bold mt-3"><?= $row['staff_name']?></h3>
                        <h4 class=" fw-bold"><?= $row['phno']?></h4>
                        <p style="margin-top: 1%;">✨စက်ပြုပြင်ခြင်တဲ့လူကြီးမင်းများအတွက်တော့
အိမ်မှာအရင်စစ်ဆေးပြီးမှ ဈေးနှုန်းချိုသာစွာနဲ့ပြုပြင်ပေးနေပါတယ်ခင်ဗျ🥰 ပြင်ဖြစ်ရင်တော့ ကားခနဲ့ စစ်ဆေးခက Free ဖြစ်ပြီး မပြင်ဖြစ်ရင်တော့ ကားခနဲ့ စစ်ဆေးခ 10,000 ကျပ်ကောက်ခံပါတယ်ခင်ဗျ 🙏</p>
                    </div>
                </div>

            </div>

            <div class="col-6">

                <div class="card bg-light">
                    <div class="card-body">
                        <div class=" pt-2">

                            <!-- Profile Edit Form -->
                            <form action="" method="post" enctype="multipart/form-data">
                                <input type="text" name="sid" value="<?= $row['sid'] ?>" style="display: none;">
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
                                        <input type="checkbox" required style="margin-right:10%;">agree terms & policy
                                    </label>
                                </div>

                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary" name="call">ServiceCall</button>
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