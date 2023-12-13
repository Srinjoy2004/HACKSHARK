<?php
include 'connection.php';

$userid = $_SESSION['id'];
$details = "SELECT * FROM `team_req` WHERE `user_id` = $userid";
$present = mysqli_query($conn, $details);
if ($present->num_rows < 1) {
    if(isset($_SESSION['form3'])){
        // echo  "<script>alert('Please complete your profile page');</script>";
        }
if (isset($_POST['skills1'])) {
    // $userid = 1;
    $count = count($_POST["skills1"]);
    // echo "COUNT: " . $count . "<br>";
// $conn = mysqli_connect('localhost', 'root', '123', 'arrayExample');


    $qry = "INSERT INTO `team_req` (`user_id`,`skill`,`exp_year`) VALUES ";

    //Now create loop for input fields

    for ($i = 0; $i < $count; $i++) {
        $qry .= "(" . $userid . ",'" . $_POST["skills1"][$i] . "','" . $_POST["experiences1"][$i] . "'),";
    }

    $finalQuery = rtrim($qry, ',');
    // print($qry);
//Now excute query

    $insertdata = mysqli_query($conn, $finalQuery);

    if (!empty($insertdata)) {
        header("location:  Hackbuddy\index.html");

    }
}
}else{
    header("location:  Hackbuddy\index.html");
}
?><!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="css/f4.css">

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ProfileForm</title>
</head>

<body>
    <div class="container">
        <header>COMPLETE YOUR PROFILE</header>
        <form action="form4.php" method="POST">
            <div class="form">
                <div class="details personal">
                    <div class="form second">
                        <div class="Needs">
                            <span class="ques">What skills are you looking in you teammates?</span>
                            <div class="skillsncontainer">
                                <div class="skillinputngroup">
                                    <div class="form-group">
                                        <label for="skill">Skill:</label>
                                        <input type="text" class="skl"id="skil" name="skills1[]" required>
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


        </form>
        <!-- <i>Want to logout?<a href="logout.php">Logout</a></i> -->


    </div>
    <script>
        function addSkill() {
   const skillsContainer = document.querySelector('.skills-container');
   const skillInputGroup = document.createElement('div');
   skillInputGroup.classList.add('skill-input-group');

    
   const skillInput = document.createElement('input');
   skillInput.type = 'text';
   skillInput.classList.add('sponge');
   skillInput.name = 'skills[]';
   skillInput.required = true;
   skillInput.style.width = '100%';  

   const experienceInput = document.createElement('input');
   experienceInput.type = 'number';
   experienceInput.classList.add('sponge');
   experienceInput.name = 'experiences[]';
   experienceInput.required = true;
   experienceInput.style.width = '100%';  

   const workLinkInput = document.createElement('input');
   workLinkInput.type = 'url';
   workLinkInput.classList.add('sponge');
   workLinkInput.name = 'workLinks[]';
   workLinkInput.required = true;
   workLinkInput.style.width = '100%';  

   // Create headings for each field
   const skillLabel = document.createElement('label');
   skillLabel.textContent = 'Skill:';
   skillLabel.style.display = 'block';  
   skillLabel.style.marginBottom = '10px'; 
   

   const experienceLabel = document.createElement('label');
   experienceLabel.textContent = 'Years of Experience:';
   experienceLabel.style.display = 'block';  
   experienceLabel.style.marginBottom = '10px'; 
   

   const workLinkLabel = document.createElement('label');
   workLinkLabel.textContent = 'Link to Your Work:';
   workLinkLabel.style.display = 'block';  
   workLinkLabel.style.marginBottom = '10px'; 
   

   // Create a "Remove Skill" button
   const removeButton = document.createElement('button');
   removeButton.type = 'button';
   removeButton.classList.add('remove-skill-btn');
   removeButton.textContent = 'Remove';
   removeButton.addEventListener('click', function () {
       skillsContainer.removeChild(skillInputGroup);
   });

   // Append headings and input fields to the skill input group
   skillInputGroup.appendChild(skillLabel);
   skillInputGroup.appendChild(skillInput);
   skillInputGroup.appendChild(experienceLabel);
   skillInputGroup.appendChild(experienceInput);
   skillInputGroup.appendChild(workLinkLabel);
   skillInputGroup.appendChild(workLinkInput);
   skillInputGroup.appendChild(removeButton);

   
   skillLabel.style.display = 'block';
   experienceLabel.style.display = 'block';
   workLinkLabel.style.display = 'block';

   // Increase the space between fields
   skillLabel.style.marginBottom = '10px';
   experienceLabel.style.marginBottom = '10px';
   workLinkLabel.style.marginBottom = '10px';

   // Append the skill input group to the skills container
   skillsContainer.appendChild(skillInputGroup);
}

   </script>
</body>
</html>