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
<<<<<<< HEAD
        <div class="profile-header">
            <div class="profile-pic">
                <img src="images/profile.png" alt="Profile Picture">
            </div>
            <div class="profile-info">
                <h1>Your Name</h1>
                <!-- <p>Headline / Occupation</p>
                <p>Location</p> -->
=======
        <h1>My Profile</h1>
    </header>
    <div class="container">
       <a href="home.php"> <i class="fa-solid fa-right-from-bracket fa-flip-horizontal fa-2xl"></i></a>
        <div class="profile-pic">
            <img src="images\profile.png" alt="Profile Picture">
        </div>
        <div class="about-me">
          <center> <a href="#"> <i class="fa-solid fa-pen-to-square fa-2xl"></i></a></center>
           
            <center><p style="color:#fff ;">This section will be populated with information from your form.</p></center>
        </div>
        <div class="skills">
          <center>  <h2>Skills</h2></center>
           <li>
            <ul></ul>
            <ul></ul>
           </li>
        </div>
        <div class="my-work">
          <center>  <h2>My Work</h2></center>
            <div class="slider-container">
                <div class="slider-content">
                    <div class="slide">
                        <div class="slide-content">
                           <a href="">Project1</a> 
                            <!-- <p>Project 1 Description</p> -->
                        </div>
                    </div>
                    <div class="slide">
                        <div class="slide-content">
                           <a href=""> Project2</a>
                            <!-- <p>Project 2 Description</p> -->
                        </div>
                    </div>
                    <div class="slide">
                        <div class="slide-content">
                            <a href=""> Project3</a>
                            <!-- <p>Project 3 Description</p> -->
                        </div>
                    </div>
                </div>
>>>>>>> 16a5d118fe2c037a481d0d0c58ff826bb95849a9
            </div>
        </div>
    </header>
    <section id="about">
        <div class="about-me">
            <h2>Bio</h2>
            <p>Your summary or description goes here.</p>
        </div>
<<<<<<< HEAD
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
                <li>Skill 1</li>
                <li>Skill 2</li>
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
=======
        <a href = "logout.php"><center><p style="color:#fff ;">LOGOUT</p></center></a>
>>>>>>> 16a5d118fe2c037a481d0d0c58ff826bb95849a9
    </div>
</body>
</html>


