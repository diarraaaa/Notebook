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
    <form class="form" action="Inscriptionbackend.php" method="post">
            <h1>Sign-up </h1><br>
            <?php if(isset($_GET['usertaken']) && $_GET['usertaken']==2 ): ?>
                <p style="color: red;">The username is already taken</p>
            <?php endif; ?>
            <?php if(isset($_GET['accountcreated']) && $_GET['accountcreated']==1 ): ?>
                <p style="color: green;">The account is succefully created</p>
            <?php endif; ?>
            <label for="username">Username</label>
            <input type="text" name="Signusername"><br>
            <label for="password">Password</label>
            <input type="text" name="Signpassword"><br>
            <input type="submit" value="Sign-up">
            <a href="Connexion.php">Se connecter</a>
        </form>
    </body>
</html>
