<?php
    session_start();
    $currentUser = $_SESSION['username'];
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Sign Up!</title>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    
    <body>     
        <?php require 'navBar.php';?>

        <h2 id="shopHeader">Sign Up!</h2>

        <div class="mainTextBox orangeBack">
            <form action="create_user.php" method="post">
                <?php 
                    if ( isset($_GET['message']) ) {
                        $message = $_GET['message'];
                        $msgColor = $_GET['msgColor'];
                        
                        echo "<span style='color:$msgColor'>$message</span><br><br>";
                    }
                ?>
                -Creating an account will allow for your highscores to be shared online. <br>
                -Your achievements may also be posted. <br><br>

                Name: <br>
                <input name="name" size="20" type="text"><br><br>
                Password: <br>
                <input name="pass" size="20" type="password"><br><br>
                <input type="submit" value="Create Account!"> <br><br>
        </div>
    </body>
</html>