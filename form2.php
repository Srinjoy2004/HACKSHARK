<?php
include 'connection.php';


$userid = $_SESSION['id'];
$details = "SELECT * FROM `user_skills` WHERE `user_id` = $userid";
$present = mysqli_query($conn, $details);
if ($present->num_rows < 1) {
    if($_SESSION['form1'] == true){
    echo  "<script>alert('Please complete your profile page');</script>";
    }
if (isset($_POST['skills'])) {
    // $userid = 1;
    $count = count($_POST["skills"]);
    echo "COUNT: " . $count . "<br>";
    // $conn = mysqli_connect('localhost', 'root', '123', 'arrayExample');


    $qry = "INSERT INTO `user_skills` (`user_id`,`skill`,`link`,`years_work`) VALUES ";

    //Now create loop for input fields

    for ($i = 0; $i < $count; $i++) {
        $qry .= "(" . $userid . ",'" . $_POST["skills"][$i] . "','" . $_POST["workLinks"][$i] . "'," . $_POST["experiences"][$i] . "),";
    }

    $finalQuery = rtrim($qry, ',');
    // print($qry);
//Now excute query

    $insertdata = mysqli_query($conn, $finalQuery);

    if (!empty($insertdata)) {
        header("location: form3.php");

    }
}
}else{
    $_SESSION['form2'] = true;
    header("location: form3.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="f2.css">

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
                    <!-- <span class="title">Personal Details</span> -->
                    <div class="skills-container">
                        <div class="skill-input-group">
                            <div class="form-group">
                                <label for="skill">Skill:</label>
                                <input type="text" class="sponge" id="skill" name="skills[]" required>
                            </div>
                            <div class="form-group">
                                <label for="experience">Years of Experience:</label>
                                <input class="sponge" type="number" id="experience" name="experiences[]" required>
                            </div>
                            <div class="form-group">
                                <label for="workLink">Link to Your Work:</label>
                                <input class="sponge" type="url" id="workLink" name="workLinks[]" required>
                            </div>
                            <button type="button" class="remove-skill-btn" onclick="removeSkill(this)">Remove</button>
                        </div>
                    </div>
                    <button type="button" class="add-skill-btn" onclick="addSkill()">Add Skill</button>
                </div>
                <button type="submit" class="sub">Submit</button>
            </div>
        </form>
    </div>
    <script>
        function addSkill() {
            const skillsContainer = document.querySelector('.skills-container');
            const skillInputGroup = skillsContainer.querySelector('.skill-input-group');
            const clonedInputGroup = skillInputGroup.cloneNode(true);

            // Clear input values
            clonedInputGroup.querySelectorAll('input[type="text"], input[type="url"], input[type="number"], textarea').forEach(input => {
                input.value = '';
            });

            // Append the cloned skill input group
            skillsContainer.appendChild(clonedInputGroup);
        }

        function removeSkill(button) {
            const skillsContainer = document.querySelector('.skills-container');
            const skillInputGroup = button.parentElement;
            skillsContainer.removeChild(skillInputGroup);
        }
        function addSkil() {
            const skillsContain = document.querySelector('.skillsncontainer');
            const skillInput = skillsContain.querySelector('.skillinputngroup');
            const clonedInput = skillInput.cloneNode(true);

            // Clear input values
            clonedInput.querySelectorAll('input[type="text"], input[type="url"], input[type="number"], textarea').forEach(input => {
                input.value = '';
            });

            // Append the cloned skill input group
            skillsContain.appendChild(clonedInput);
        }

        function removeSkil(button) {
            const skillsContain = document.querySelector('.skillsncontainer');
            const skillInput = button.parentElement;
            skillsContain.removeChild(skillInput);
        }

    </script>
</body>

</html>