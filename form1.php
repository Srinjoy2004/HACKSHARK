<?php
include 'connection.php';

$username = $_SESSION['username'];
$userid = $_SESSION['id'];



$username = $_SESSION['username'];
$userid = $_SESSION['id'];
// $res = "";
if (isset($_POST['name'])) {
    $name = $_POST["name"];
    $age = $_POST["age"];
    $email = $_POST["email"];
    $github = $_POST["github"];
    $about = $_POST["about"];

    $sql1 = "INSERT INTO `form1` (`userid`,`name`,`age`,`email`,`github`,`about`) VALUES ('$userid','$name','$age','$email','$github','$about')";
    $insertdata = mysqli_query($conn, $sql1);

    if (!empty($insertdata)) {
        header("location: form1.php");

    }

    // Close the database connection
    $conn->close();
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="css\form.css">

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ProfileForm</title>
</head>

<body>
    <div class="container">
        <header>COMPLETE YOUR PROFILE</header>
        <form action="form2.php" method="POST">
            <div class="form">
                <div class="details personal">
                    <span class="title">Personal Details</span>

                    <div class="fields">
                        <div class="input-field">
                            <label for="">Full Name</label>
                            <input type="text" name="name" placeholder="Enter Your Name" required>
                        </div>
                        <div class="input-field">
                            <label for="">Username</label>
                            <!-- <input type="name"name="username" placeholder="" required> -->
                            <?php print($username) ?>
                        </div>
                        <div class="input-field">
                            <label for="">Age</label>
                            <input type="number" name="age" placeholder="" required>
                        </div>

                        <div class="input-field">
                            <label for="">Email</label>
                            <input type="email" name="email" placeholder="" required>
                        </div>
                        <div class="input-field">
                            <label for="">GitHub Profile</label>
                            <input type="url" name="github" placeholder="" required>
                        </div>
                        <div class="input-field">
                            <label for="">About User</label>
                            <input type="text" name="about" placeholder="" maxlength="30">
                        </div>

                    </div>
                </div>

                <div class="sub">
                    <button type="submit" class="nextBtn"> SUBMIT </button>
                </div>

            </div>


        </form>
        <i>Want to logout?<a href="logout.php">Logout</a></i>


    </div>

</body>

</html>