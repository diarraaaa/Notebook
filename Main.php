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

// Fetch notes for the logged-in user
$user = $_SESSION["username"];
$sql = "SELECT * FROM notes WHERE usernote='$user'";
$resultat = $conn->query($sql); // Execute the query
?>
<head>
  <link rel='stylesheet' type='text/css' media='screen' href='Main.css'>
</head>
<body style="background-color:rgb(44, 88, 88);"> 
    <?php
        if (!isset($_SESSION['username'])) {
            header("Location: Connexion.php");  // Redirect to login if not logged in
            exit();
    }
    ?>
    <h2><a href="Profile.php" style="color:white;">My account</a></h2>
    <div class="greeting-header">
        <?php if(isset($_SESSION["username"])): ?>
            <p style="color: white;font-size: 50px;text-align:center;"> Hi <?php echo $_SESSION["username"] ?> </p><br>
        <?php endif; ?>
        <header>
            <a href="Ajoutnote.php" style="color:white;">Add a note</a>
            <a href="Deletenote.php" style="color:white;">Delete a note</a>

        </header>
    </div>
    <div class="notes-container">
        <?php
            if ($resultat && $resultat->num_rows > 0) {
                while ($row = $resultat->fetch_assoc()) {
                    echo "<div class='note-item'>";
                    echo "<h3>" . htmlspecialchars($row["id"]) ." ". htmlspecialchars($row["intitule"]) . "</h3>"; // Display title
                    echo "<p>" . htmlspecialchars($row["contenu"]) . "</p>"; // Display content
                    echo "</div>";
                }
            } else {
                echo "<p style='color: white;'>No notes found.</p>"; // Message if no notes exist
            }
        ?>
    </div>

</body>
</html>
