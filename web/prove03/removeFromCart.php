<?php
session_start();

$cart = $_SESSION['cart'];
$empty = false;
$total = 0;

array_splice($cart, $_REQUEST['index'], 1);

if ( count($cart) == 0 ) {
    $empty = true;
}

$_SESSION['cart'] = $cart;

if ( !$empty ) {
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
