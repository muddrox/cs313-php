<?php
    session_start();
    
    if ( isset($_SESSION['username']) ) {
        $message = "Account creation failed: you are already logged in to an account";
        header("Location: signUp.php?message=$message&msgColor=red");
        die();
    }

    require 'dbconnect.php';
    $db = get_db();

    $name = htmlspecialchars($_POST['name']);
    $pass = htmlspecialchars($_POST['pass']);

    if ( !isset($name) || $name == ""
        || !isset($pass) || $pass == "" ) 
    {
        $message = "Account creation failed.";
        header("Location: signUp.php?message=$message&msgColor=red");
        die();
    }

    $passHash = password_hash($pass, PASSWORD_DEFAULT);

    $stmt = $db->prepare('INSERT INTO usernames (id, name, password) VALUES (DEFAULT, :name, :pass)');
    
    $stmt->bindValue(":name", $name, PDO::PARAM_STR);
	$stmt->bindValue(":pass", $passHash, PDO::PARAM_STR);
    
    $stmt->execute();

    $message = "Account created!  Log in below";

	header("Location: signIn.php?message=$message&msgColor=purple");
	die();
?>