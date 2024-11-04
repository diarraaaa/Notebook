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
    $user=trim($_POST["username"]);
    $password=trim($_POST["password"]);
    $sql="select * from users where username='$user'and password='$password'";
    $result=$conn->query($sql);
    if($result->num_rows>0){
        $_SESSION["username"]=$user;
        $sessuser=$_SESSION["username"];
        header("Location:Main.php?user=$sessuser");
        exit();
    }else {
        header("Location:Connexion.php?error=1");
    }

}
?>
