<?PHP
    include 'connection.php';
    $userid = $_SESSION['id'];

    $details = "SELECT * FROM `form1` WHERE `userid` = '$userid'";
    $achievement_details = "SELECT * FROM `achievements` WHERE `user_id` = '$userid'";
    $userskills_details = "SELECT * FROM `user_skills` WHERE `user_id` = '$userid'";
    $team_details = "SELECT * FROM `team_req` WHERE `user_id` = '$userid'";
    
    $result = $conn->query($details);
    $achievement_result = $conn->query($achievement_details);
    $userskills_result = $conn->query($userskills_details);
    $team_result = $conn->query($team_details);

    $rowUser = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $achievement_rowUser = mysqli_fetch_array($achievement_result, MYSQLI_ASSOC);
    
    
    
    $git = $rowUser['github'];
    $name = $rowUser['name'];
    $bio = $rowUser['about'];
    
    $achievements = $achievement_rowUser['link'];
    
    $name = $rowUser['name'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <script src="https://kit.fontawesome.com/6e9db139fc.js" crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="linkedin-profile.css">
    <title>Your LinkedIn Profile</title>
</head>
<body>
    <header>
        <div class="profile-header">
            <div class="profile-pic">
                <img src="images/profile.png" alt="Profile Picture">
            </div>
           

        
            <div class="profile-info">
                <h1><?php echo $name ?></h1>
                <!-- <p>Headline / Occupation</p>
                <p>Location</p> -->
            </div>
        </div>
    </header>
    <div class="profile-container">
    <section id="about">
        <div class="about-me">
            <h2>Bio</h2>
            <p><?php echo $bio ?></p>
        </div>
    </section>
    <!-- <section id="experience">
        <div class="experience">
            <h2>Experience</h2>
            < Experience entries go here 
        </div> -->
    <!-- </section>
    <section id="education">
        <div class="education">
            <h2>Education</h2> -->
            <!-- Education entries go here -->
        <!-- </div> -->
    </section>
    <section id="skills">
        <div class="skills">
            <h2>Skills</h2>
            <ul>
                
                <?php
                    while ($userskills_rowUser = mysqli_fetch_array($userskills_result, MYSQLI_ASSOC)) {
                        echo "<li><a href=".$userskills_rowUser['link'].">" . $userskills_rowUser['skill'] .  "(" . $userskills_rowUser['years_work'] .  " years)</li></a>";
                    }
                ?>
                
                
                <!-- Add more skills -->
            </ul>
        </div>
    </section>
    <!-- <section id="contact">
        <div class="contact-info">
            <h2>Contact Information</h2>
            <p>Email: your.email@example.com</p>
            <p>Phone: (123) 456-7890</p>
            <p>LinkedIn: linkedin.com/in/yourprofile</p>
        </div> -->
    <!-- </section>
    <section id="recommendations">
        <div class="recommendations">
            <h2>Recommendations</h2>
             Recommendation entries go here 
        </div> -->
    </section>
    <section id="skills">
        <div class="skills">
            <h2>Skills You Look for</h2>
            <ul>
                <?php
                    while ($team_rowUser = mysqli_fetch_array($team_result, MYSQLI_ASSOC)) {
                        echo "<li>" . $team_rowUser['skill'] .  "(" . $team_rowUser['exp_year'] .  " years)</li>";
                    }
                ?>
            </ul>
        </div>
    </section>
    <div class="icons">
        <a href="<?php echo $achievements ?>">
            <i class="fa-solid fa-award fa-2xl" style="color:  #f9b17a; "></i>
        </a>
        <a href="<?php echo $git ?>">
            <i class="fa-brands fa-github fa-2xl" style="color:   #f9b17a;"></i>
            </a>
    </div>
</div>
</body>
</html>
