<html>
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

// Check if user is logged in
if (!isset($_SESSION['username'])) {
    header("Location: Connexion.php"); // Redirect to login if not logged in
    exit();
}
if ($_SERVER["REQUEST_METHOD"] === "POST") {
// Fetch notes for the logged-in user
    $user = $_SESSION["username"];
    $id = intval(trim($_POST["id"])); 
    $sql = "delete from notes where id='$id'";
    $resultat = $conn->query($sql); // Execute the query
    if($conn->affected_rows>0)
    {
        header("Location:Deletenote.php?notedeleted=1");
    }else{
        header("Location:Deletenote.php?notedeleted=0");
    }
}
?>
<head>
        <meta charset='utf-8'>
        <meta http-equiv='X-UA-Compatible' content='IE=edge'>
        <title>Add a note</title>
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <link rel='stylesheet' type='text/css' media='screen' href='StyleAcceuil.css'>
</head>
<body>
    <form class="form" action="Deletenote.php" method="post">
            <h1>Delete a note </h1><br>
            <?php if(isset($_GET['notedeleted']) && $_GET['notedeleted']==1 ): ?>
                <p style="color: green;">The note has been succesfully deleted</p>
            <?php endif; ?>
            <?php if(isset($_GET['notedeleted']) && $_GET['notedeleted']==0 ): ?>
                <p style="color: red;">Error deleting the note try again</p>
            <?php endif; ?>
            <label for="id">Note number</label><br>
            <input type="number" name="id"><br>
            <input type="submit" value="Delete">
        </form>
</body>
</html>