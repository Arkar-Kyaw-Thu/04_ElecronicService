<!DOCTYPE html>
<?php  
    include "php/db_conn.php";
    if(isset($_POST['register'])){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $address = $_POST['address'];
        $phno = $_POST['phno'];
        $today=date('Y-m-d');

        $sql = "SELECT * FROM acc_info WHERE email='$email';";
        $res = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($res);
        if($row){
            $error_message = 'This email is already register!';
        }
        else{
            $query = "INSERT INTO `acc_info`(`email`, `password`, `date`) VALUES ('$email','$password','$today')";
            mysqli_query($conn, $query);
            $query1 = "INSERT INTO `user_info`(`name`, `img`, `address`, `phno`) VALUES ('$name','default-avatar.png','$address','$phno')";
            mysqli_query($conn, $query1);
            $sql1 = "SELECT * FROM acc_info WHERE email='$email' and password='$password';";
            $res1 = mysqli_query($conn, $sql1);
            $row1 = mysqli_fetch_array($res1);
            $id = $row1['uid'];
            echo "<script>alert('Register Successfully!');</script>";
            header("Location: index.php? uid=$id");
        }
    }

?>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css/formdesign.css">
    <title>Register</title>
</head>
<body>
	<div class="container">
    	<div class="box form-box">
			<header>Sign Up</header>
<?php
    if(isset($error_message)){
        echo "<div align='center' style='color:red;'>".$error_message."</div>";
    }
?>
            <form action="" method="post">
                <div class="field input">
                    <label for="username">Username</label>
                    <input type="text" name="name" id="username" autocomplete="off" required>
                </div>

                <div class="field input">
                    <label for="email">Email</label>
                    <input type="text" name="email" id="email" autocomplete="off" required>
                </div>

                <div class="field input">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" autocomplete="off" required>
                </div>

                <div class="field input">
                    <label for="username">Address</label>
                    <input type="text" name="address" id="address" autocomplete="off" required>
                </div>

                <div class="field input">
                    <label for="username">Phone Number</label>
                    <input type="text" name="phno" id="phno" autocomplete="off" required>
                </div>

                <div class="field">
                    <input type="submit" class="btn" name="register" value="Register" required>
                </div>
                <div class="links">
                    Already a member? <a href="loginform.php">Sign In</a>
                </div>
            </form>
        </div>
		</div>
	</div>
</body>
</html>