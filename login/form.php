<?php
include 'connection.php';
// $hostname = "localhost";
// $db_username = "root";
// $db_password = "";
// $database = "hackathon";

// $conn =  mysqli_connect($hostname, $db_username, $db_password);
// $db_conn = mysqli_select_db($conn, $database);
$mama="SELECT `login`.`username`,`login`.`id` from `login` join `form1` where `login`.`id`=`form1`.`userid`";
$res = $conn->query($mama);
$rowUser = mysqli_fetch_array($res, MYSQLI_ASSOC);
$username = $rowUser['username'];
$userid = $rowUser['id'];
    $res = "";
if (isset($_POST['name'])) {
    $name = $_POST["name"];
    $age = $_POST["age"];
    $email = $_POST["email"];
    $github = $_POST["github"];
    $about = $_POST["about"];
    // $userid=1;

     // Database connection parameters

    // Replace with your database connection code.

    $sql = "INSERT INTO `form1` (`userid`,`name`,`age`,`email`,`github`,`about`) VALUES ('$userid','$name','$age','$email','$github','$about')";
    if ($conn->query($sql) == true) {
        // Flag for successful insertion
        echo"<script>alert('Dekh to ei alert ta dekhache ki na?');</script>";
        $insert = true;
    

        // Display a JavaScript alert
        echo '<script>
            alert("Profile successfully created");
          
            </script>';
        exit;
    } else {
        echo "ERROR: $sql <br> " . $conn->error;
    }

    // Close the database connection
    // $conn->close();

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
        <form action="form.php" method="POST">
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
                            <?php print($username)?>
                        </div>
                        <div class="input-field">
                            <label for="">Age</label>
                            <input type="number"name="age" placeholder="" required>
                        </div>

                        <div class="input-field">
                            <label for="">Email</label>
                            <input type="email"name="email" placeholder="" required>
                        </div>
                        <div class="input-field">
                            <label for="">GitHub Profile</label>
                            <input type="url"name="github" placeholder="" required>
                        </div>
                        <div class="input-field">
                            <label for="">About User</label>
                            <input type="text"name="about" placeholder="" maxlength="30">
                        </div>

                    </div>
                </div>

                
                                <div class="sub">
                                    <button type="submit" class="nextBtn"> SUBMIT </button>

                                </div>
                            </div>
                        </div>
                    </div>
        </form>
       


    </div>

</body>

</html>