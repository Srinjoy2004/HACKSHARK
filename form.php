<?php
include 'connection.php';
// $hostname = "localhost";
// $db_username = "root";
// $db_password = "";
// $database = "hackathon";

// $conn =  mysqli_connect($hostname, $db_username, $db_password);
// $db_conn = mysqli_select_db($conn, $database);
$mama = "SELECT * FROM (SELECT `login`.`username`, `login`.`id` FROM `login` JOIN `form1` ON `form1`.`userid` = `login`.`id`) AS `subquery`
WHERE `subquery`.`id` = " . $_SESSION['id'];

$res = $conn->query($mama);
$rowUser = mysqli_fetch_array($res, MYSQLI_ASSOC);
$username = $rowUser['username'];
$userid = $rowUser['id'];
// $res = "";
if (isset($_POST['name'])) {
    $name = $_POST["name"];
    $age = $_POST["age"];
    $email = $_POST["email"];
    $github = $_POST["github"];
    $about = $_POST["about"];


    $skill = $_POST["skills"];
    $links = $_POST["workLinks"];
    $years_work = $_POST["experiences"];


    $link = $_POST["link"];


    $skill1 = $_POST["skills1"];
    $exp1 = $_POST["experiences1"];






    // $userid=1;

    // Database connection parameters

    // Replace with your database connection code.

    $sql1 = "INSERT INTO `form1` (`userid`,`name`,`age`,`email`,`github`,`about`) VALUES ('$userid','$name','$age','$email','$github','$about')";

    // $sql3 = "INSERT INTO `achievements` (`user_id`,`link`) VALUES ('$userid','$link')";
    // $sql4 = "INSERT INTO `team_req` (`user_id`,`skill`,`exp_year`) VALUES ('$userid','$skill1','$exp1')";
    $query1->query($sql1);
    // $query2->query($sql2);
    // $query3->query($sql3);
    // $query4->query($sql4);
    if (($query1) == true) {
        // Flag for successful insertion
        // echo "<script>alert('DONE');</script>";
        $id1 = $query1->insert_id;
        //$id2 = $query2->insert_id;
        //$id4 = $query4->insert_id;
        if (isset($_POST["skills"]) && is_array($_POST["skills"])) {
            foreach ($_POST["skills"] as $index => $skill) {
                $work_link = $_POST["workLinks"][$index];
                $experience = $_POST["experiences"][$index];

                // Insert the skill data into a skills table (modify as needed).
                $sql2 = "INSERT INTO `user_skills` (`user_id`,`skills`,`links`,`years_work`) VALUES ('$userid','$skill','$links','$years_work')";

            }

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
                <div class="details personal">
                    <span class="title">Skills</span>

                    <div class="skills-container">
                        <div class="skill-input-group">
                            <div class="form-group">
                                <label for="skill">Skill:</label>
                                <input type="text" id="skill" name="skills[]" required>
                            </div>
                            <div class="form-group">
                                <label for="workLink">Link to Your Work:</label>
                                <input class="sponge" type="url" id="workLink" name="workLinks[]" required>
                            </div>
                            <div class="form-group">
                                <label for="experience">Years of Experience:</label>
                                <input class="sponge" type="number" id="experience" name="experiences[]" required>
                            </div>
                            <!-- <div class="form-group">
                        <label for="achievements">Achievements:</label>
                        <textarea id="achievements" name="achievements[]" rows="2"></textarea>
                    </div>-->
                            <button type="button" class="remove-skill-btn" onclick="removeSkill(this)">Remove</button>
                        </div>
                    </div>
                    <button type="button" class="add-skill-btn" onclick="addSkill()">Add Skill</button>
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

                        <div class="form second">
                            <div class="Needs">
                                <span class="ques">What skills are you looking in you teammates?</span>
                                <div class="skillsncontainer">
                                    <div class="skillinputngroup">
                                        <div class="form-group">
                                            <label for="skill">Skill:</label>
                                            <input type="text" id="skil" name="skills1[]" required>
                                        </div>
                                        <!-- <div class="form-group">
                                <label for="workLink">Link to Your Work:</label>
                                <input class="sponge" type="url" id="workLink" name="workLinks[]"  >
                            </div>  -->
                                        <div class="form-group">
                                            <label for="experience">Years of Experience:</label>
                                            <input class="sponge" type="number" id="experience" name="experiences1[]"
                                                required>
                                        </div>
                                        <!-- <div class="form-group">
                                <label for="achievements">Achievements:</label>
                                <textarea id="achievements" name="achievements[]" rows="2"></textarea>
                            </div> -->
                                        <button type="button" class="remove-skill-btn"
                                            onclick="removeSkil(this)">Remove</button>
                                    </div>
                                </div>
                                <button type="button" class="add-skill-btn" onclick="addSkil()">Add Skill</button>

                                <!-- <div class="buttons">
                        <div class="backBtn">
                            <span class="btnText">Back</span>
                            <i class="uil uil-navigator"></i>
                        </div>  -->
                                <div class="sub">
                                    <button type="submit" class="nextBtn"> SUBMIT </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>

    </form>
    <i>Want to logout?<a href="logout.php">Logout</a></i>


    </div>

</body>

</html>