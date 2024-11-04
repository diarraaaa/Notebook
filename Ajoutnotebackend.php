<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "Notebook";
 session_start(); 
// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
if($_SERVER["REQUEST_METHOD"]=="POST"){
    $title=trim($_POST["title"]);
    $content=trim($_POST["note"]);
    $usernote=$_SESSION["username"];
    $request="select * from notes where intitule='$title'";
    $result=$conn->query($request);
    if($result->num_rows>0){
        header("Location:Ajoutnote.php?titletaken=2");
    }else{
        $request="insert into notes (usernote,intitule,contenu) values('$usernote','$title','$content')";
        $resultat=$conn->query($request);
        if($conn->affected_rows>0)
        {
            header("Location:Ajoutnote.php?notecreated=1");
        }
    }
}
?>
