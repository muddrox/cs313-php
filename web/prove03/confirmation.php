<?php
    session_start();
    $cart = $_SESSION['cart'];
    $address = htmlspecialchars($_POST['address']);
    $total = 0;
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Confirmation</title>
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

        <h2 id="shopHeader">Confirmation</h2>

        <form action="browse.php" class="mainTextBox blueBack">
            <p id="itemReview">
                Congrats!  Your purchase has been made!
                We will ship your items to <?php echo $address . ".<br><br>"; ?>
                
                Items Purchased:<br><br>
                <?php
                    for ( $i = 0; $i < count($cart); $i++ ) {
                        echo "+ $" . $cart[$i][1] . " - " . $cart[$i][0] . "<br>";
                        $total += $cart[$i][1];
                    }

                    echo "<br>Total Price: $" . $total . "<br><br>";

                    session_unset();
                    session_destroy();
                ?>

                <input type="submit" value="Back to browsing">
            </p>
        </form>
    </body>
</html>
