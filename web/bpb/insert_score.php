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

    $name = htmlspecialchars($_POST['name']);
	$score = htmlspecialchars($_POST['score']);

    $stmt = $db->prepare('INSERT INTO highscores (id, player, score) VALUES (DEFAULT, :player, :score)');

    $stmt->bindValue(":player", $name, PDO::PARAM_STR);
	$stmt->bindValue(":score", $score, PDO::PARAM_INT);

	$stmt->execute();

	echo "connected!! <br>";

	$stmt = $db->prepare('SELECT player, score FROM highscores ORDER BY score DESC');
    $stmt->execute();

	$players = $stmt->fetchall(PDO::FETCH_ASSOC);
	$rank = 1;

	foreach ( $players as $player ) {
		$name = $player['player'];
		$score = $player['score'];

		echo $rank . " - " . $name . " - " . $score . "<br>";
		$rank++;
	}
?>