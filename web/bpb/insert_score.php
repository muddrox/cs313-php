<?php
    require 'dbconnect.php';
    $db = get_db();

    $name = htmlspecialchars($_POST['name']);
	$score = htmlspecialchars($_POST['score']);

	//get username id from the usernames table
	$stmt = $db->prepare('SELECT id FROM usernames WHERE name=:name');

	$stmt->bindValue(":name", $name, PDO::PARAM_STR);

	$stmt->execute();

	$row = $stmt->fetch();
	$userId = $row['id'];

	//store into highscores table
	$stmt = $db->prepare('INSERT INTO highscores (id, userId, score) VALUES (DEFAULT, :userId, :score)');

	$stmt->bindValue(":userId", $userId, PDO::PARAM_INT);
	$stmt->bindValue(":score", $score, PDO::PARAM_INT);

	$stmt->execute();
?>