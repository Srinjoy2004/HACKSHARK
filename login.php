<?php
include 'connection.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $_SESSION['username'] = $username;
    // $sql = "INSERT INTO `login`.`login` (`username`,  `password`) VALUES ('$username',  '$password');";

    // if ($conn->connect_error) {
    //     die("Connection failed: " . $conn->connect_error);
    // }
    // $sql = "INSERT INTO login (username, email, password) VALUES ('$username', '$email', '$password')";

    // Replace with your authentication logic (e.g., querying the database).
    // For this example, we'll assume a user with the provided email and password exists.
    $sql = "SELECT * FROM `login` WHERE `username` = '$username' AND `password` = '$password'";
    $result = $conn->query($sql);

    //$sql1 = "SELECT username FROM login";
//$result1 = $conn->query($sql1);




    if ($result->num_rows == 1) {
        //Authentication successful, redirect to a welcome page.
        $rowUser = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $_SESSION['id'] = $rowUser['id'];
        // $_SESSION['username'] = $rowUser['username'];
        
        
        header("Location: form1.php");
        exit();
    } else {
        // Authentication failed, show an error message.
        echo '<script>alert("Invalid email or password. Please try again.");</script>';
        //   header("Location: pfp/profile.html");// Redirect to the login page
    }


}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="https://kit.fontawesome.com/6e9db139fc.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css\style.css">
</head>

<body>

    <div class="container" id='bgimg'>
        <div class="form-box">
            <h1 id="title">LOG IN</h1>
            <form action="login.php" method="POST">
                <div class="input-group">
                    <div class="input-field">
                        <i class="fa-solid fa-user"></i>
                        <input type="text" name="username" placeholder="Username*" required>
                    </div>
                    <div class="input-field">
                        <i class="fa-solid fa-lock"></i>
                        <input type="password" name="password" placeholder="Password*" required>
                    </div>
                    <pre>    <a href="forget_password.php">Forget Password</a> </pre>
                </div>
                <div class="btn-field">
                    <button type="submit" id="signupBtn"><b> LOG IN</b></button>
                    <button type="submit" id="signinBtn" class="disable"><b>SIGN UP</b></button>
                    <script>
                        let signinBtn = document.getElementById("signinBtn");

                        signinBtn.onclick = function () {
                            // Redirect to index.html
                            window.location.href = "signup.php";
                        };
                    </script>
                </div>

            </form>





        </div>
    </div>
    <!-- <script>
        let signupBtn=document.getElementById("signupBtn");
        let signinBtn=document.getElementById("signinBtn");
        let nameField=document.getElementById("nameField");
        let title=document.getElementById("title");

        signinBtn.onclick= function() {
            nameField.style.maxHeight ="0";
            title.innerHTML = "SIGN IN";
            signupBtn.classList.add("disable");
            signinBtn.classList.remove("disable");
        }
        signupBtn.onclick= function() {
            nameField.style.maxHeight ="60px";
            title.innerHTML = "SIGN UP";
            signupBtn.classList.remove("disable");
            signinBtn.classList.add("disable");
        }


    </script> -->

</body>

</html>