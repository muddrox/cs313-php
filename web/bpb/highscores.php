<?php
    session_start();
    $currentUser = $_SESSION['username'];

    require 'dbconnect.php';
    $db = get_db();

    $stmt = $db->prepare('SELECT player, score FROM highscores ORDER BY score DESC');
    $stmt->execute();

    $players = $stmt->fetchall(PDO::FETCH_ASSOC);
    $rank = 1;
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Ben's Top Ten</title>
        <link rel="stylesheet" href="style.css"/>
    </head>
    
    <body>
        <?php require 'navBar.php';?>

        <h2 id="shopHeader">Top 10 Scores!</h2>

        <p class="mainTextBox orangeBack">
            Players gonna play!  If you are like Ben, you love competition.  Here are
            the top ten best scores achieved by players for you to compete against!
        </p>

        <p class="mainTextBox purpBack">
            <?php
                foreach ( $players as $player ) {
                    $name = $player['player'];
                    $score = $player['score'];

                    echo $rank . " - " . $name . " - " . $score . "<br>";
                    $rank++;
                }
            ?>
        </p>
    </body>
</html>
