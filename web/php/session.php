<?php
// Start the session
session_start();

//Check if the cart array variable has been initialized
if(!isset($_SESSION["cart"]))
{ 
    $cart_array = array();
    $_SESSION["cart"] = $cart_array;
}
if(!isset($_SESSION['cart_total']))
{
    $_SESSION['cart_total'] = 0.00;
}

?>