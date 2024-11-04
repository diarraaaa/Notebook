<!DOCTYPE html>
<html>
    <head>
        <meta charset='utf-8'>
        <meta http-equiv='X-UA-Compatible' content='IE=edge'>
        <title>Add a note</title>
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <link rel='stylesheet' type='text/css' media='screen' href='StyleAcceuil.css'>
    </head>
    <body  style="background-color:rgb(44, 88, 88);">
    <?php
        session_start(); 
    ?>  
    <form class="form" action="Ajoutnotebackend.php" method="post">
        <?php if(isset($_GET['titletaken']) && $_GET['titletaken']==2 ): ?>
            <p style="color: red;">This title is already taken</p>
        <?php endif; ?>
        <?php if(isset($_GET['notecreated']) && $_GET['notecreated']==1 ): ?>
            <p style="color: green;">The note has been successfully created</p>
        <?php endif; ?>
            <h1>Add a new note</h1><br>
            <label for="title">Title</label>
            <input type="text" name="title" required rows=""><br>
            <label for="note">Note</label>
            <textarea name="note" rows="10" cols="30" required></textarea><br>
            <input type="submit" value="Add a new note">
        </form>
    </body>
</html>
