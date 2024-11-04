<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$database = "Notebook";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
if($_SERVER["REQUEST_METHOD"]=="POST"){
    $user=$_SESSION["username"];
    $newusername=trim($_POST["newusername"]);
    $newpassword=trim($_POST["newpassword"]);
    $request="select * from users where username='$newusername'";
    $result=$conn->query($request);
    if($result->num_rows>0){
        header("Location:Profile.php?usertaken=1?user=$user");
    }else{
        $changerequest="Update users set username='$newusername' , password='$newpassword' where username='$user'";
        $result=$conn->query($changerequest);
        if($conn->affected_rows>0 ) {
            $_SESSION["username"]=$newusername;
            header("Location:Main.php");
        }
}
}

?>