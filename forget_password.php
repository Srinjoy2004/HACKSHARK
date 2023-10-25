<?php
include "connection.php";
if(isset($_POST['checkMail'])){
    $email = $_POST['checkEmail'];
    $query = "SELECT `email` FROM `users` WHERE `email` = '$email'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
    $_SESSION['checkMail'] = $email;
    header("Location: new_password.php");
    }else{
        echo '<script>alert("Email not registered. Try signing up.");</script>';
        header("Location: signup.php");
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="css/style.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="https://kit.fontawesome.com/6e9db139fc.js" crossorigin="anonymous"></script>
</head>

<body>

    <div class="container" id='bgimg' style='background-image: url("images/back1.jpg");'>
        <div class="form-box">
            <h1 id="title">FORGOT PASSWORD</h1>
            <form action="forget_password.php" method="POST">
                <div class="input-group">
                    <div class="input-field">
                        <i class="fa-solid fa-user"></i>
                        <input type="text" name="checkEmail" placeholder="Enter your email here " required>
                    </div>                  
                    
                </div>
                <div class="btn-field">
                    <button type="submit" id="signupBtn"><b>GET OTP</b></button>
                </div>

            </form>

        </div>
    </div>