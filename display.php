
<?php
include 'connection.php';
$userid = $_SESSION['id'];
$details = "SELECT * FROM `form1` WHERE `userid` = '$userid'";
$result = $conn->query($details);
$rowUser = mysqli_fetch_array($result, MYSQLI_ASSOC);
$git = $rowUser['github'];
print_r($git);
// include 'connection.php';
// // print_r("Post : ".$_POST);
// $userid = $_SESSION['id'];
// $details = "SELECT * FROM `form1` WHERE `userid` = $userid";
// $present = $conn->query($details);
// if($present->num_rows>=1){
//     echo "Sorted";
// }else{
//     echo "Not Sorted";
// }
?>



<!-- // //let's start.

// // print_r($_POST);

// //Now count one input field 8
// $userid = 1;
// $count = count($_POST["skills1"]);
// // echo "COUNT: " . $count . "<br>";
// // $conn = mysqli_connect('localhost', 'root', '123', 'arrayExample');


// $qry = "INSERT INTO `team_req` (`user_id`,`skill`,`exp_year`) VALUES ";

// //Now create loop for input fields

// for($i=0; $i<$count; $i++){
//     $qry.="(".$userid.",'".$_POST["skills1"][$i]."','".$_POST["experiences1"][$i]."'),";
// }

// $finalQuery = rtrim($qry,',');
// // print($qry);
// //Now excute query

// $insertdata = mysqli_query($conn, $finalQuery);

// if(!empty($insertdata)){ 
//     header("location: login.php");

// }  -->