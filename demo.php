<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $age = $_POST["age"];
    $email = $_POST["email"];
    $github = $_POST["github"];
    $about = $_POST["about"];


    // Database connection parameters
    $hostname = "localhost";
    $db_username = "root";
    $db_password = "";
    $database = "hackathon";

    // Replace with your database connection code.
    $conn = new mysqli("localhost", "root", "", "mydb");

    $sql = "INSERT INTO `form1`.`form1` (`name`,  `age`,`email`,`github`,`about`) VALUES ('$name',  '$age','$email','$github','$about');";
    if ($conn->query($sql) == true) {
        // Flag for successful insertion
        $insert = true;


        // Display a JavaScript alert
        echo '<script>
            alert("Profile successfully created");
            window.location.href = "home.php";
        </script>';

        exit;
    } else {
        echo "ERROR: $sql <br> " . $conn->error;
    }

    // Close the database connection
    $conn->close();

    // $mama="S"

}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="form.css">

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ProfileForm</title>
</head>

<body>
    <div class="container">
        <header>COMPLETE YOUR PROFILE</header>
        <form action="index.html">
            <div class="form">
                <div class="details personal">
                    <span class="title">Personal Details</span>

                    <div class="fields">
                        <div class="input-field">
                            <label for="">Full Name</label>
                            <input type="text" name="name" placeholder="Enter Your Name" required>
                        </div>
                        <!-- <div class="input-field">
                            <label for="">Username</label>
                            <input type="name"name="username" placeholder="" required>
                        </div> -->
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
                                <input type="url" placeholder="Drive Link Of Your Achievements">
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
                                            <input type="text" id="skil" name="skills[]" required>
                                        </div>
                                        <!-- <div class="form-group">
                                <label for="workLink">Link to Your Work:</label>
                                <input class="sponge" type="url" id="workLink" name="workLinks[]"  >
                            </div>  -->
                                        <div class="form-group">
                                            <label for="experience">Years of Experience:</label>
                                            <input class="sponge" type="number" id="experience" name="experiences[]"
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
        </form>
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


    </div>

</body>

</html>