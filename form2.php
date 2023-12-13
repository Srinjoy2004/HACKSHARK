<?php
include 'connection.php';

$userid = $_SESSION['id'];
$details = "SELECT * FROM `user_skills` WHERE `user_id` = $userid";
$present = mysqli_query($conn, $details);
if ($present->num_rows < 1) {
    // if (isset($_SESSION['form1'])) {
    //     echo  "<script>alert('Please complete your profile page');</script>";
    // }
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
} else {
    $_SESSION['form2'] = true;
    header("location: form3.php");
}
?>
 <!DOCTYPE html>
 <html lang="en">
 
  
<head>
    <link rel="stylesheet" href="css/f2.css">

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
                            <!-- <button type="button" class="remove-skill-btn" onclick="removeSkill(this)">Remove</button> -->
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

   skillLabel.style.marginBottom = '10px';
   experienceLabel.style.marginBottom = '10px';
   workLinkLabel.style.marginBottom = '10px';

   // Append the skill input group to the skills container
   skillsContainer.appendChild(skillInputGroup);
}

   </script>
</body>

</html>