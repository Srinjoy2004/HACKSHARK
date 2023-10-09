<?php
$insert = false;
include 'connection.php';
// Check if the form is submitted
if (isset($_POST['username'])) {
    // Set connection variables
    // $server = "localhost";
    // $username = "root";
    // $password = "";
    // $database = "hackathon";

    // Create a database connection
    // $conn = new mysqli($server, $username, $password, $database);

    // Check for connection success
    if (!$conn) {
        die("Connection to this database failed due to " . mysqli_connect_error());
    }

    // Collect post variables
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Check if the username or email already exists in the database
    $checkQuery = "SELECT * FROM `login` WHERE `username` = '$username' OR `email` = '$email'";
    $checkResult = $conn->query($checkQuery);

    if ($checkResult->num_rows > 0) {
        // User already exists, display a message or redirect to the login page
        echo '<script>
            alert("User with the same username or email already exists. Please log in instead.");
            window.location.href = "login.php";
        </script>';
        exit;
    }

    // Insert data into the database
    $sql = "INSERT INTO `login` (`username`, `email`, `password`) VALUES ('$username', '$email', '$password');";

    if ($conn->query($sql) == true) {
        // Flag for successful insertion
        $insert = true;

        // Display a JavaScript alert
        echo '<script>
            alert("You are signed up.");
            window.location.href = "home.php";
        </script>';

        exit;
    } else {
        echo "ERROR: $sql <br> " . $conn->error;
    }

    // Close the database connection
    $conn->close();
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="css\style.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <script src="https://kit.fontawesome.com/6e9db139fc.js" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container" style='background-image: url("images/back1.jpg");'>
        <div class="form-box">
            <h1 id="title">SIGN UP</h1>
            <!-- Add the action attribute to the form to specify where to send the form data -->
            <form action="signup.php" method="POST">
                <div class="input-group">
                    <div class="input-field">
                        <i class="fa-solid fa-user"></i>
                        <input type="text" name="username" id="username" placeholder="Username*" required>
                    </div>
                    <div class="input-field" id="nameField">
                        <i class="fa-solid fa-envelope"></i>
                        <input type="email" name="email" id="email" placeholder="Email*" required>
                    </div>
                    <div class="input-field">
                        <i class="fa-solid fa-lock"></i>
                        <input type="password" name="password" id="password" placeholder="Password*" required>
                    </div>
                    <pre>    <a href="#">Forget Password</a></pre>
                </div>
                <div class="btn-field">
                    <button type="submit" id="signupBtn" class="disable"><b> SIGN UP</b></button>

                    <!-- <script>
        let signupBtn = document.getElementById("signupBtn");

        signupBtn.onclick = function() {
            // Redirect to index.html
            window.location.href = "login.php";
        };
    </script>    -->

                </div>
            </form>
        </div>
    </div>
    <script>
        let signupBtn = document.getElementById("signupBtn");
        let signinBtn = document.getElementById("signinBtn");
        let nameField = document.getElementById("nameField");
        let title = document.getElementById("title");

        signinBtn.onclick = function () {
            nameField.style.maxHeight = "0";
            title.innerHTML = "SIGN IN";
            signupBtn.classList.add("disable");
            signinBtn.classList.remove("disable");
        }
        signupBtn.onclick = function () {
            nameField.style.maxHeight = "60px";
            title.innerHTML = "SIGN UP";
            signupBtn.classList.remove("disable");
            signinBtn.classList.add("disable");
        }


    </script>

</body>

</html>