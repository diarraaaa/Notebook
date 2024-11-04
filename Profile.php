<html>
<head>
    <link rel="stylesheet" type="text/css" media="screen" href="Profilesheet.css">
</head>
<body >
    <?php
     session_start(); ?>
   <?php  
        if (!isset($_SESSION['username'])) {
            header("Location: Connexion.php");  // Redirect to login if not logged in
            exit();
        }
 ?>
    <p>Hi <?php echo $_SESSION["username"]; ?></p>

    <form class="form" action="Profilebackend.php?user=<?php echo $_SESSION["username"]; ?>" method="post">
        <h1>Change your informations</h1>

        <label for="newusername" >New username</label><br>
        <input type="text" name="newusername" id="newusername" required><br><br>

        <label for="newpassword" >New password</label><br>
        <input type="password" name="newpassword" id="newpassword" required><br><br>

        <?php if (isset($_GET['usertaken']) && $_GET['usertaken'] == 1): ?>
            <p style="color: red; font-size: 15px; text-align: center;">This username is already taken, try another one.</p>
        <?php endif; ?>

        <input type="submit" value="Submit" >
    </form>
    <form class="formdisconnect" action="Disconnect.php" method="post">
    <input type="submit" value="Disconnect" >

    </form>
</body>
</html>
