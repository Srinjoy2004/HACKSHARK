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
    <link rel="stylesheet" href="css\form.css">

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ProfileForm</title>
</head>

<body>
    <div class="container">
        <header>COMPLETE YOUR PROFILE</header>
        <form action="form3.php" method="POST">
            <div class="form">
                <div class="details personal">
                    <span class="title">Personal Details</span>
                    <div class="details personal">
                        <span class="title">Achievements</span>

                        <div class="fields">
                            <div class="input-field">
                                <!-- <label for="">Achievements</label> -->
                                <input type="url" placeholder="Drive Link Of Your Achievements" name="link">
                            </div>
                        </div>
                        <!-- <button class="nextBtn">
                                         <a href="page2.html">  <span class="btnText">Next</span></a> 
                                            <i class="uil uil-navigator"></i>
                                        </button> -->


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