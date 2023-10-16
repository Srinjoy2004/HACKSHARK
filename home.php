
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>hackbuddy</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap');
      </style>
<style>
    .prof{
        height: 50px;
        width: 50px;
    }
    *{
        margin: 0;
        padding: 0;
    }
body{
    background-color: rgb(0, 0, 33);
    color: white;
    font-family: 'poppins', sans-serif;
}
nav{
    display: flex;
    justify-content: space-around;
    align-items: center;
    height: 80px;
    background-color: rgb(19, 15, 102);
}

nav ul{
    display: flex;
    justify-content: center;
}

nav ul li{
    list-style: none;
    margin: 0 23px;
}
nav ul li:hover{
    color: aqua;
}
.left{
    font-size: 1.5rem;
}
  
input[type=search] {
            width: 160px;
            padding: 8px 20px 8px 45px;
            border:#fff solid 2px;
            font-size: 18px;
            border-radius: 25px;
            background-position: 2% 50%;
            background-repeat: no-repeat;
            background-size: 30px;
            background-image: url('search.svg');
            background-color: transparent;
            transition: 0.5s all ease-in-out;
            filter: brightness(170%);
        }

input[type=search]:focus,
        input[type=search]:not(:placeholder-shown) {
            width: 350px;
            background-color: #fff;
            filter: brightness(100%);
        }

</style>
</head>
<body>
    <header>
        <nav>
            <div class="left">HACKBUDDY</div>
            <div class="right">
                <ul>
                   <li>Home</li>
                   <li>My Buddy</li>
                   <li><form action="">
                    <input type="search" placeholder="Search..." />
                    
                </form>
            </li>
            <li>
            <a href="profile.php"><img  class ="prof"src="images\profile.png" alt=""></a>
            </li>
              
              
               
                </ul>

            </div>
        </nav>
    </header>

    <main>
    <script>
  // Show the alert when the page loads
  window.onload = function() {
    alert("WELCOME");
    
    // Wait for the user to click "OK" in the alert
    // and then redirect to another page
    // window.location.href = "form1.php"; // Replace with the URL you want to redirect to
  };
</script>
        <section></section>
    </main>
</body>
</html>