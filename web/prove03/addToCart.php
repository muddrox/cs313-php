<?php
session_start();

$cart = $_SESSION['cart'];
$overload = false;
$total = 0;

if ( count($cart) >= 9 ){
    $overload = true;
}

if ( $overload == false) {
    array_push($cart, array($_REQUEST['item'],$_REQUEST['price']));
}

$_SESSION['cart'] = $cart;

for ( $i = 0; $i < count($cart); $i++ ) {
    echo "+ $" . $cart[$i][1] . " - " . $cart[$i][0] . "<br>";
    $total += $cart[$i][1];
}

echo "<br>Total Price: $" . $total;

if ( $overload ) {
    echo " - Cart limit reached";
}
?>
