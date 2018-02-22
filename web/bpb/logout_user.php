<?php
    session_start();

    session_unset(); 
    session_destroy();
    
    $message = "You are now logged out.";

	header("Location: signIn.php?message=$message&msgColor=purple");
	die();
?>