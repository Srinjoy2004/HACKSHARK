<?php
// Database connection parameters
     $hostname = "localhost";
     $db_username = "root";
     $db_password = "";
     $database = "hackathon";

    // Replace with your database connection code.
    $conn =  mysqli_connect($hostname, $db_username, $db_password,$database);
    // $db_conn = mysqli_select_db($conn, $database);

    //Session start
    session_start();
?>