<?php
    if ( !isset($currentUser) ) {
        echo "<div id='logBar'>
                <ul>
                    <li><a href='highscores.php'>Bench Press Ben</a></li>
                    <li><a href='signIn.php'>Login</a></li>
                    <li><a href='signUp.php'>Sign Up</a></li>
                </ul>
            </div>";
    } else {
        echo "<div id='logBar'>
                <ul>
                    <li><a href='highscores.php'>logged in as $currentUser</a></li>
                    <li><a href='logout_user.php'>Sign out</a></li>
                </ul>
            </div>";
    }
    
    echo "<br>
            <h1><img id='header' src='bpbHeader.png' alt='Bench Press Ben Header'></h1>
        <br>

        <div id='navBar'>
            <ul>
                <li><a href='highscores.php'>Highscores</a></li>
                <li><a href='achievements.php'>Achievements</a></li>
                <li><a href='feedback.php'>Feedback</a></li>
            </ul>
        </div>";
?>