<!DOCTYPE html>
<html lang="en">
<head>
    <script src="https://kit.fontawesome.com/6e9db139fc.js" crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/profile.css">
    <title>My Profile</title>
    
</head>
<body>
    <header>
        <h1>My Profile</h1>
    </header>
    <div class="container">
       <a href="home.html"> <i class="fa-solid fa-right-from-bracket fa-flip-horizontal fa-2xl"></i></a>
        <div class="profile-pic">
            <img src="images\profile.png" alt="Profile Picture">
        </div>
        <div class="about-me">
          <center> <a href="form.html"> <i class="fa-solid fa-pen-to-square fa-2xl"></i></a></center>
           
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
            </div>
        </div>
        <div class="icons">
            <a href="">
                <i class="fa-solid fa-award fa-2xl" style="color:  #79ebc0; "></i>
            </a>
            <a href="https://github.com/yourusername">
                <i class="fa-brands fa-github fa-2xl" style="color:  #79ebc0;"></i>
            </a>
        </div>
    </div>
    <script>
        const sliderContent = document.querySelector(".slider-content");
        let slideIndex = 0;

        function showSlide(n) {
            if (n < 0) {
                slideIndex = 2;
            } else if (n > 2) {
                slideIndex = 0;
            }

            sliderContent.style.transform = `translateX(-${slideIndex * 100}%)`;
        }

        setInterval(() => {
            slideIndex++;
            showSlide(slideIndex);
        }, 3000);
    </script>
</body>
</html>

