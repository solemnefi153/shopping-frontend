<?php require '../php/session.php';?>
<?php
//Check there are items in the cart session variabel 
if(sizeof($_SESSION['cart']) > 0)
{
    echo "<h2>These are the items you are purchasing today</h2>";
    echo "<div class='products_on_cart'>";
    
    //load every item that is in the cart session variabel 
    foreach($_SESSION['cart'] as $itemID => $values ){
        echo "<div class='item_on_cart'>";
        echo "<img src='../images/remove_icon.png'  name='remove_btn' id='" . $itemID . "' alt='' class='remove_icon clickable' >";
        echo "<img alt='" . $values['name'] . "' class='item_image' src='" . $values['image_address'] . "' >";
        echo "<spam>" . $values['name'] . "</spam>";
        echo "<spam>$" . number_format((float)$values['price'], 2) . "</spam>";
        echo "</div>";
    }
    echo "<h3>Total: $" . $_SESSION['cart_total'] . "</h3>";
    echo "<a  class='go_to_page_btn' href='../webpages/payment.php'>Make Payment</a>";
    echo "</div>";
}
else
{
    //Notify the user that there are not items in the cart 
    echo "<div class='no_products_on_cart'>";
    echo "<h2>There are no items in the cart</h2>";
    echo "<h3>Please go to the browser page to add items</h2>";
    echo "<a  class='go_to_page_btn' href='../webpages/browse.php'>Browse Items</a>";
    echo "</div>";
}

?>