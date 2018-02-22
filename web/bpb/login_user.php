<?php
    session_start();

    if ( isset($_SESSION['username']) ) {
        $message = "Login Failed: you are already logged in to an account";
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
        $message = "Login failed";
        header("Location: signIn.php?message=$message&msgColor=red");
        die();
    }

    $stmt = $db->prepare('SELECT password FROM usernames WHERE name=:name');
    
    $stmt->bindValue(":name", $name, PDO::PARAM_STR);
    
    $executed = $stmt->execute();

    if ( $executed ){
        $row = $stmt->fetch();
        $hashedPass = $row['password'];

        if ( password_verify($pass, $hashedPass) ) {
            $message = "You are now logged in as $name";

            $_SESSION['username'] = $name;

            header("Location: signIn.php?message=$message&msgColor=purple");
            die();
        } else {
            $message = "Login failed: Check your password or username.";
            header("Location: signIn.php?message=$message&msgColor=red");
            die();  
        }
    } else {
        $message = "Login failed";
        header("Location: signIn.php?message=$message&msgColor=red");
        die();  
    }
?>