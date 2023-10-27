<?php
include 'connection.php';

$userid = $_SESSION['id'];
$details = "SELECT * FROM `achievements` WHERE `user_id` = $userid";
$present = mysqli_query($conn, $details);
if ($present->num_rows < 1) {

if (isset($_POST['link'])) {
    if(isset($_SESSION['form2'])){
    echo  "<script>alert('Please complete your profile page');</script>";
    }

    // Check for connection success
    if (!$conn) {
        die("Connection to this database failed due to " . mysqli_connect_error());
    }

    // Collect post variables
    $link = $_POST['link'];
    // $userid = 1;


    // Insert data into the database
    $sql = "INSERT INTO `achievements` (`user_id`,`link`) VALUES ($userid,'$link');";
    $insertdata = mysqli_query($conn, $sql);

    if (!empty($insertdata)) {
        header("location: form4.php");

    }

    // Close the database connection
    $conn->close();
}
}else{
    $_SESSION['form3'] = true;
    header("location: form4.php");
}
?>




<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="css/ffp.css">
    

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ProfileForm</title>
</head>

<body>
    
    <div class="container">
        <h1>COMPLETE YOUR PROFILE</h1>
        <form action="form3.php" method="POST">
            <div class="row">
                <div class="column">
                    <label for="name">Link Your Achievements</label>
                    <input type="link" name="link" id="name" placeholder="">
                </div>
                </div>
                <!-- <div class="column">
                    <label for="email">Email</label>
                    <input type=" email" name="email" id="email" placeholder="Your Email Here">
                </div>
            </div>
            <div class="row">
                <div class="column">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username">

                </div>
                <div class="column">
                    <label for="github">GitHub</label>
                    <input type="url" id="github" name="github">
                </div>
            </div>

            <div class="row">
                <div class="column">
                    <label for="age">Bio</label>
                    <textarea name="bio" id="bio" rows="3"></textarea>
                </div>
            </div> -->
            <div class="button">
                <button>Submit</button>
            </div>


        </form>


    </div>

    <!-- <i>Want to logout?<a href="logout.php">Logout</a></i> -->


    </div>


</body>

</html>