<?php
    session_start();

    $inGame = false;

    if ( isset($_POST['inGame']) ) {
        $inGame = true;
    }

    if ( !$inGame ) {
        if ( isset($_SESSION['username']) ) {
            $message = "Login Failed: you are already logged in to an account";
            header("Location: signUp.php?message=$message&msgColor=red");
            die();
        }
    }

    require 'dbconnect.php';
    $db = get_db();

    $name = htmlspecialchars($_POST['name']);
    $pass = htmlspecialchars($_POST['pass']);

    if ( !isset($name) || $name == ""
        || !isset($pass) || $pass == "" ) 
    {
        $message = "Login failed";
        
        if ( !$inGame ) {
            header("Location: signIn.php?message=$message&msgColor=red");
        } else {
            echo $message;
        }

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
            
            if ( !$inGame ) {
                $_SESSION['username'] = $name;
                header("Location: signIn.php?message=$message&msgColor=purple");
            } else {
                echo "LOGIN_SUCCESSFUL|$name";
            }

            die();
        } else {
            $message = "Login failed: Check your password or username.";
            if ( !$inGame ) {
                header("Location: signIn.php?message=$message&msgColor=red");
            } else {
                echo $message;
            }

            die();  
        }
    } else {
        $message = "Login failed";
        
        if ( !$inGame ) {
            header("Location: signIn.php?message=$message&msgColor=red");
        } else {
            echo $message;
        }

        die();  
    }
?>