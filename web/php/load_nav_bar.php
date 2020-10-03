<?php require '../php/session.php';?>
<?php
echo "<nav class='nav_bar'>";
echo "  <img  id='logo' src='../images/logo.png' alt=''>";
echo "  <div id='nav_links'>";
echo "    <a class='nav_item' href='../webpages/home.php' target='_self'>Home</a>";
echo "    <a class='nav_item' href='../webpages/browse.php' target='_self'>Browse</a>";
echo "  </div>";
echo "  <a class='shopping_cart nav_item' href='../webpages/cart.php' target='_self'>";

//Check if the cart is empty to load the right cart image
if (sizeof($_SESSION['cart']) > 0)
{
   echo "<img  id='cart_image'  src='../images/full_cart.png'; alt=''>";
}
else
{
   echo "<img  id='cart_image'  src='../images/empty_cart.png'; alt=''>";
}

echo "  </a>";
echo "</nav>";
   
?>