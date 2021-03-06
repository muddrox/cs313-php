<?php
    session_start();
    $currentUser = $_SESSION['username'];
    
    require 'dbconnect.php';
    $db = get_db();

    $stmt = $db->prepare('SELECT name, title, info FROM usernames u 
            JOIN userAchievements ua ON u.id = ua.userId
            JOIN achievements a ON a.id = ua.achievementId');

    $stmt->execute();

    $achievements = $stmt->fetchall(PDO::FETCH_ASSOC);
    $change = 1;
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Player Achievements</title>
        <link rel="stylesheet" href="style.css"/>
    </head>
    
    <body>
        <?php require 'navBar.php';?>

        <h2 id="shopHeader">Player Achievements</h2>

        <p class="mainTextBox orangeBack">
            The top scoring players aren't without their achievements.  Listed below are
            the achievements from Bench Press Ben's most highest scoring gamers.
        </p>

        <?php
            foreach ( $achievements as $achievement ) {
                if ( $change % 2 == 0 )
                    echo "<p class='mainTextBox purpBack'>";
                else
                    echo "<p class='mainTextBox blueBack'>";

                $name = $achievement['name'];
                $title = $achievement['title'];
                $info = $achievement['info'];
                
                echo $name . " - " . $title . "<br>";
                echo $info . "<br>";

                echo "</p>";

                $change++;
            }
        ?>
    </body>
</html>
