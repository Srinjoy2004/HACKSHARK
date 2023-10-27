<?PHP
    include 'connection.php';
    $userid = $_SESSION['id'];
    $details = "SELECT * FROM `form1` WHERE `userid` = '$userid'";
    $result = $conn->query($details);
    $rowUser = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $git = $rowUser['github'];
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
                <h1>Your Name</h1>
                <!-- <p>Headline / Occupation</p>
                <p>Location</p> -->
            </div>
        </div>
    </header>
    <section id="about">
        <div class="about-me">
            <h2>Bio</h2>
            <p>Your summary or description goes here.</p>
        </div>
    <!-- </section> -->
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
    <!-- </section> -->
    <!-- <section id="skills"> -->
        <div class="skills">
            <h2>Skills</h2>
            <ul>
                <li>Skill 1</li>
                <li>Skill 2</li>
                <!-- Add more skills -->
            </ul>
        </div>
    <!-- </section> -->
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
    <!-- </section>
    <section id="skills"> -->
        <div class="skills">
            <h2>Skills You Look for</h2>
            <ul>
                <li>Skill 1</li>
                <li>Skill 2</li>
                <!-- Add more skills -->
            </ul>
        </div>
    </section> 
    <div class="icons">
        <a href="">
            <i class="fa-solid fa-award fa-2xl" style="color:  #f9b17a; "></i>
        </a>
        <a href="<?php echo $git ?>">
            <i class="fa-brands fa-github fa-2xl" style="color:   #f9b17a;"></i>
            </a>
    </div>
</body>
</html>
