<?php
    session_start();

    $load = false;

    if ( !isset($_SESSION['cart']) ) {
        $_SESSION['cart'] = array();
    } else {
        $cart = $_SESSION['cart'];
        $load = true;
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Ben's Shopping Plaza</title>
        <script type="text/javascript" src="ajax.js"></script>
        <link rel="stylesheet" href="style.css"/>
    </head>
    
    <body>
        <br>
            <h1><img id="header" src="bpbHeader.png" alt="Bench Press Ben Header"></h1>
        <br>

        <div id="navBar">
            <ul>
                <li><a href="browse.php">Browse</a></li>
                <li><a href="review.php">View Cart</a></li>
            </ul>
        </div>

        <h2 id="shopHeader">Ben's Shopping Plaza</h2>

        <p class="mainTextBox orangeBack">
            Has Bench Press Ben made a super fan out of you?  So much so, that you
            have decided that your life isn't complete without mugs, t-shirts, and other
            merchandise themed after the game itself?  Well friend, you are in luck!
            A myriad of Bench Press Ben speciality items are listed below for the taking!
        </p>

        <form action="review.php" class="mainTextBox blueBack">

            <p id="cartInfo" class="displayItems orangeBack">
                <?php
                    if ( $load ){
                        for ( $i = 0; $i < count($cart); $i++ ) {
                            echo "+ $" . $cart[$i][1] . " - " . $cart[$i][0] . "<br>";
                            $total += $cart[$i][1];
                        }
                        
                        echo "<br>Total Price: $" . $total;
                    }
                ?>
            </p>
            
            <p class="browseItems purpBack">
                What items do you desire to purchase? <br><br>
                $15 - T-Shirt <input class="add" type="button" value="Add to Cart" onclick="addToCart('T-Shirt', 15)"><br>
                $05 - Mug <input class="add" type="button" value="Add to Cart" onclick="addToCart('Mug',5)"><br>
                $50 - Dumbbell <input class="add" type="button" value="Add to Cart" onclick="addToCart('Dumbbell', 50)"><br>
                $45 - Plush Toy <input class="add" type="button" value="Add to Cart" onclick="addToCart('Plush Toy', 45)"><br>
                $60 - PreWorkout <input class="add" type="button" value="Add to Cart" onclick="addToCart('PreWorkout', 60)"><br>
                $90 - Gym Membership <input class="add" type="button" value="Add to Cart" onclick="addToCart('Gym Membership', 90)"><br>
                $10 - Key Chain <input class="add" type="button" value="Add to Cart" onclick="addToCart('Key Chain', 10)"><br><br>

                <input type="submit" value="Proceed to View Cart">
            </p>
        </form>
    </body>
</html>
