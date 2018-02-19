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
	$password = 'pass';

	$content = htmlspecialchars($_POST['content']);

	//insert name into usernames
    $stmt = $db->prepare('INSERT INTO usernames (id, name, password) VALUES (DEFAULT, :name, :password)');

    $stmt->bindValue(":name", $name, PDO::PARAM_STR);
	$stmt->bindValue(":password", $password, PDO::PARAM_STR);

	$stmt->execute();

	$userId = $db->lastInsertId(); //get last id inserted to store in feedback table.

	//store into feedback table
    $stmt = $db->prepare('INSERT INTO feedback (userId, content) VALUES (:userId, :content)');

    $stmt->bindValue(":userId", $userId, PDO::PARAM_INT);
	$stmt->bindValue(":content", $content, PDO::PARAM_STR);

	$stmt->execute();

	//redirect back to feedback.php
	header("Location: feedback.php");
	die();
?>