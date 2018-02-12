<?php
    try {
        $servername = 'localhost';
        $username = 'bpb_user';
        $password = 'benchit';

        $db = new PDO("pgsql:host=$servername;dbname=bpb_db", $username, $password);
    } catch ( PDOException $ex ) {
        echo "Failed to establish connection: ". $ex . "<br>";
        die();
    }

    $stmt = $db->prepare('SELECT player, title, info FROM highscores h 
            JOIN playerAchievements pa ON h.id = pa.nameId
            JOIN achievements a ON a.id = pa.achievementId');

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
        <br>
            <h1><img id="header" src="bpbHeader.png" alt="Bench Press Ben Header"></h1>
        <br>

        <div id="navBar">
            <ul>
                <li><a href="highscores.php">Highscores</a></li>
                <li><a href="achievements.php">Achievements</a></li>
                <li><a href="feedback.php">Feedback</a></li>
            </ul>
        </div>

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

                $name = $achievement['player'];
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
