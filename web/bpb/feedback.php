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

    $stmt = $db->prepare('SELECT name, content FROM usernames u JOIN feedback f ON f.userid = u.id');
    $stmt->execute();

    $users = $stmt->fetchall(PDO::FETCH_ASSOC);
    $change = 1;
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Feedback for Ben</title>
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

        <h2 id="shopHeader">Feedback for Ben!</h2>

        <form action="insert_feedback.php" class="mainTextBox orangeBack" method='post'> 
            Ben is not impervious to self improvement.  He faces his blemishes head on
            and crushes them with his determination to become his best self.  ben's game, 
            Bench Press Ben, is in development which means it has a long ways to go before
            it is published.  As the game's creator, I welcome all feedback aimed toward
            improving the game.  Please add your feedback to the comments below. <br><br>

            Name: <br>
            <input name="name" size="20" type="text"><br><br>
            Feedback: <br>
            <textarea name="content"></textarea><br><br>
            <input type="submit" value="Submit Feedback">
        </form>

        <?php
            foreach ( $users as $user ) {
                if ( $change % 2 == 0 )
                    echo "<p class='mainTextBox purpBack'>";
                else
                    echo "<p class='mainTextBox blueBack'>";

                $name = $user['name'];
                $feedback = $user['content'];
                
                echo $name . ":<br>";
                echo $feedback . "<br>";

                echo "</p>";

                $change++;
            }
        ?>
    </body>
</html>
