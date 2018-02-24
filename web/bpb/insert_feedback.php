<?php
    session_start();

    if ( !isset($_SESSION['username']) ) {
        $message = "Failed to post feedback: you must be logged in!";
        header("Location: signIn.php?message=$message&msgColor=red");
        die();
	}
	
    require 'dbconnect.php';
    $db = get_db();

	$name = $_SESSION['username'];
	$content = htmlspecialchars($_POST['content']);

	//get username id from the usernames table
    $stmt = $db->prepare('SELECT id FROM usernames WHERE name=:name');

    $stmt->bindValue(":name", $name, PDO::PARAM_STR);

	$stmt->execute();

	$row = $stmt->fetch();
	$userId = $row['id'];

	//store into feedback table
    $stmt = $db->prepare('INSERT INTO feedback (userId, content) VALUES (:userId, :content)');

    $stmt->bindValue(":userId", $userId, PDO::PARAM_INT);
	$stmt->bindValue(":content", $content, PDO::PARAM_STR);

	$stmt->execute();

	//redirect back to feedback.php
	header("Location: feedback.php");
	die();
?>