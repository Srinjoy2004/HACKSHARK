<?php
include 'connection.php';

$userid = $_SESSION['id'];
$details = "SELECT * FROM `form1` WHERE `userid` = $userid";
$present = $conn->query($details);
if ($present->num_rows < 1) {

    echo  "<script>alert('Please complete your profile page');</script>";
    $username = $_SESSION['username'];
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
            header("location: form2.php");
        }

        // Close the database connection
        $conn->close();
    }
} else {
    $_SESSION['form1'] = true;
    header("location: form2.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ProfileForm</title>
    <link rel="stylesheet" href="css/f3.css">
    
</head>

<body>
    <div class="container">
        <h1>COMPLETE YOUR PROFILE</h1>
        <form action="form1.php" method="POST">
            <div class="row">
                <div class="column">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" placeholder="Your Name Here">
                </div>
                <div class="column">
                    <label for="email">Email</label>
                    <input type=" email" id="email" placeholder="Your Email Here">
                </div>
            </div>
            <div class="row">
                <div class="column">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username">
                    <?php print($username) ?> 

                </div>
                <div class="column">
                <label for="github">GitHub</label>
                <input type="url" id="github" name="github">
            </div>
            </div>

              <div class="row"> 
                <div class="column">
                    <label for="age">Bio</label>
                    <textarea name="bio" id="bio"  rows="3"></textarea>
                </div>
                </div>
                <div class="button">
                    <button>Submit</button>
                </div>
                 
        
        </form>


    <!-- </div>
    
        <i>Want to logout?<a href="logout.php">Logout</a></i>


    </div> -->

</body>

</html>