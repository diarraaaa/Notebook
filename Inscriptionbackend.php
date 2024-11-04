<?php
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
    $newusername=trim($_POST["Signusername"]);
    $newpassword=trim($_POST["Signpassword"]);
    $request="select * from users where username='$newusername'";
    $result=$conn->query($request);
    if($result->num_rows>0){
        header("Location:Inscription.php?usertaken=2");
    }else{
        $request="insert into users (username,password) values('$newusername','$newpassword')";
        $resultat=$conn->query($request);
        if($conn->affected_rows>0)
        {
            header("Location:Inscription.php?accountcreated=1");
        }
    }
}
?>
