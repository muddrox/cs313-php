<?php
    require 'dbconnect.php';
    $db = get_db();

    $name = htmlspecialchars($_POST['name']);
	$achievementId = htmlspecialchars($_POST['achievementId']);

	//get username id from the usernames table
    $stmt = $db->prepare('SELECT id FROM usernames WHERE name=:name');

    $stmt->bindValue(":name", $name, PDO::PARAM_STR);

	$stmt->execute();

	$row = $stmt->fetch();
	$userId = $row['id'];

	//Make sure we are not posting an achievement that is already there.
    $stmt = $db->prepare('SELECT * FROM userAchievements 
	WHERE userId = :userId AND achievementId = :achievementId');

    $stmt->bindValue(":userId", $userId, PDO::PARAM_INT);
	$stmt->bindValue(":achievementId", $achievementId, PDO::PARAM_INT);

	$stmt->execute();

	$row = $stmt->fetch();

	if ( !$row ) { //Nothing found, so post the achievement.
		$stmt = $db->prepare('INSERT INTO userAchievements (userId, achievementId) VALUES (:userId, :achievementId)');

		$stmt->bindValue(":userId", $userId, PDO::PARAM_INT);
		$stmt->bindValue(":achievementId", $achievementId, PDO::PARAM_INT);
	
		$stmt->execute();
	} else {  //If something was found, we don't want to post so die()
		die();
	}
?>