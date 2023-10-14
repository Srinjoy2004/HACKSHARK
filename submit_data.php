<?php
include 'connection.php';
// $hostname = "localhost";
// $db_username = "root";
// $db_password = "";
// $database = "hackathon";

// $conn =  mysqli_connect($hostname, $db_username, $db_password);
// $db_conn = mysqli_select_db($conn, $database);
// $mama = "SELECT * FROM (SELECT `login`.`username`, `login`.`id` FROM `login` JOIN `form1` ON `form1`.`userid` = `login`.`id`) AS `subquery`
// -- WHERE `subquery`.`id` = " . $_SESSION['id'];

// $res = $conn->query($mama);
// $rowUser = mysqli_fetch_array($res, MYSQLI_ASSOC);
$username = $_SESSION['username'];
$userid = $_SESSION['id'];
// $res = "";
if (isset($_POST['name'])) {
    $name = $_POST["name"];
    $age = $_POST["age"];
    $email = $_POST["email"];
    $github = $_POST["github"];
    $about = $_POST["about"];


    // $skill = $_POST["skills"];
    // $links = $_POST["workLinks"];
    // $years_work = $_POST["experiences"];


    // $link = $_POST["link"];


    // $skill1 = $_POST["skills1"];
    // $exp1 = $_POST["experiences1"];

    // $userid=1;

    // Database connection parameters

    // Replace with your database connection code.


    // $sql3 = "INSERT INTO `achievements` (`user_id`,`link`) VALUES ('$userid','$link')";
    // $sql4 = "INSERT INTO `team_req` (`user_id`,`skill`,`exp_year`) VALUES ('$userid','$skill1','$exp1')";
    // $query1->query($sql1);
    // $query2->query($sql2);
    //$query3->query($sql3);
    // $query4->query($sql4);

    // Flag for successful insertion
    // echo "<script>alert('DONE');</script>";
    // $id1 = $query1->insert_id;
    //$id2 = $query2->insert_id;
    //$id4 = $query4->insert_id;

    $sql1 = "INSERT INTO `form1` (`userid`,`name`,`age`,`email`,`github`,`about`) VALUES ('$userid','$name','$age','$email','$github','$about')";
    if (($query1) == true) {
        if (isset($_POST["skills"]) && is_array($_POST["skills"])) {
            foreach ($_POST["skills"] as $index => $skills) {
                $work_link = $_POST["workLinks"][$index];
                // $experience = $_POST["experiences"][$index];
                // $work_link = mysqli_real_escape_string(["workLinks"][$index]);
                $experience = ["experiences"][$index];
                // Insert the skill data into a skills table (modify as needed).
                $sql2 = "INSERT INTO `user_skills` (`user_id`,`skills`,`links`,`years_work`) VALUES ('$userid','$skills','$links','$years_work')";

            }
            foreach ($_POST["skill"] as $index => $skill) {
                $exp1 = $_POST["workLinks"][$index];
                // $experience = $_POST["experiences"][$index];

                // Insert the skill data into a skills table (modify as needed).
                $sql4 = "INSERT INTO `team_req` (`user_id`,`skill`,`exp_year`) VALUES ('$userid','$skill','$exp1')";

            }

            // Display a JavaScript alert
            echo '<script>
            alert("Profile successfully created");
          
            </script>';
            exit;
        } else {
            echo "ERROR: $sql <br> " . $conn->error;
            include 'logout.php';
        }

        // Close the database connection
        // $conn->close();


    }


}
?>