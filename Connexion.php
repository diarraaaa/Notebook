<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Acceuil</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='StyleAcceuil.css'>

</head>
<body>
    <form class="form" action="Acceuil.php" method="post">
        <h1>Sign-in</h1> <br>
        <?php if(isset($_GET['error']) && $_GET['error']==1 ): ?>
            <p style="color: red;">Your informations are incorrect</p>
        <?php endif; ?>
        <label for="username">Username</label>
        <input type="text" name="username"><br>
        <label for="password">Password</label>
        <input type="text" name="password"><br>
        <input type="submit" value="Sign-in">
        <a href="Inscription.php">S'inscrire </a>
    </form> 
</body>
</html>