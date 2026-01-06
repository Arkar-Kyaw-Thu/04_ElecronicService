<!DOCTYPE html>
<?php
    session_start();
    include "php/db_conn.php";
    if(isset($_POST['login'])){
        $email = $_POST['email'];
        $password = $_POST['password'];

        $sql = "SELECT * FROM admin WHERE email='$email' and password='$password';";
        $res = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($res);
        if(!$row){
            $error_message = 'incorrect email or password!';
        }
        else{
            $_SESSION['uid']='0';
            $_SESSION['type']=$row['type'];
            echo "<script>alert('Login Successfully!');</script>";
            header("Location: admin_dashboard.php");
        }
    }

?>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css/formdesign.css">
    <title>Login</title>
</head>
<body>
<div class="container">
    <div class="box form-box">
		<header>Admin Login</header>
<?php
    if(isset($error_message)){
        echo "<div align='center' style='color:red;'>".$error_message."</div>";
    }
?>
        <form action="" method="post">
            <div class="field input">
                <label for="email">Email</label>
                <input type="text" name="email" id="email" autocomplete="off" required>
            </div>

            <div class="field input">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" autocomplete="off" required>
            </div>

            <div class="field">        
                <input type="submit" class="btn" name="login" value="Login" required>
            </div>
        </form>
    </div>
</div>
</body>
</html>