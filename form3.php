




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
        <form action="display.php" method="POST">
            <div class="form">
                <div class="details personal">
                    <span class="title">Personal Details</span>
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


                    </div>

                    <div class="sub">
                        <button type="submit" class="nextBtn"> SUBMIT </button>
                    </div>

                </div>


        </form>
        <i>Want to logout?<a href="logout.php">Logout</a></i>


    </div>

</body>

</html>