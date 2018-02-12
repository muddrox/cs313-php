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
