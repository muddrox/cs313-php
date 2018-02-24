<?php
    session_start();
    $currentUser = $_SESSION['username'];
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Sign In!</title>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    
    <body>     
        <?php require 'navBar.php';?>

        <h2 id="shopHeader">Sign In!</h2>

        <div class="mainTextBox blueBack">
            <form action="login_user.php" method="post">
                <?php 
                    if ( isset($_GET['message']) ) {
                        $message = $_GET['message'];
                        $msgColor = $_GET['msgColor'];
                        
                        echo "<span style='color:$msgColor'>$message</span><br><br>";
                    }
                ?>
                If you have already created an account, you can sign in here.<br><br>

                Name: <br>
                <input name="name" size="20" type="text"><br><br>
                Password: <br>
                <input name="pass" size="20" type="password"><br><br>
                <input type="submit" value="Sign in!"> <br><br>
        </div>
    </body>
</html>