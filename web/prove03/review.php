<?php
    session_start();
    $cart = $_SESSION['cart'];
    $total = 0;
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Review Purchase</title>
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

        <h2 id="shopHeader">Review Purchase</h2>

        <form action="checkout.html" class="mainTextBox blueBack">
            You are now viewing your cart!  Remove anything you
            don't want.  Go back to browsing if you want to add more.
            Once you feel satisfied with your cart, proceed to checkout.

            <p id="itemReview">
                <?php
                    if ( count($cart) != 0 ) {
                        for ( $i = 0; $i < count($cart); $i++ ) {
                            echo "$" . $cart[$i][1] . " - " . $cart[$i][0];
                            echo "<input class='add' "
                                . " type='button' "
                                . " value='Remove' "
                                . ' onclick="removeItem('
                                . $i . ')"><br>';
                            $total += $cart[$i][1];
                        }

                        echo "<br>Total Price: $" . $total . "<br><br>";

                        echo "<input type='submit' value='Proceed to Checkout'>";
                    } else {
                        echo "Your cart is empty!";
                    }
                ?>
            </p>
        </form>
    </body>
</html>
