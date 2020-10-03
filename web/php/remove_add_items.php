<?php require '../php/session.php';?>

<?php 

$_itemid = test_input($_GET["itemID"]);
$_name  = test_input($_GET["name"]);
$_price = test_input($_GET["price"]);
$_category = test_input($_GET["category"]);
$_image_address = test_input($_GET["image_address"]);

function test_input($data) {
$data = trim($data);
$data = stripslashes($data);
$data = htmlspecialchars($data);
return $data;
}

if($_itemid)
{

    if($_SESSION['cart'][$_itemid]){
        $substrac_price = $_SESSION['cart'][$_itemid]['price'];
        $_SESSION['cart_total'] -= (float)$substrac_price;
        unset($_SESSION['cart'][$_itemid]);
    } 
    else{
        $_SESSION['cart'][$_itemid]['name'] = $_name;
        $_SESSION['cart'][$_itemid]['price'] = $_price;
        $_SESSION['cart'][$_itemid]['category'] = $_category;
        $_SESSION['cart'][$_itemid]['image_address'] = $_image_address;
        $_SESSION['cart_total'] += (float)$_price;
    }
}
echo sizeof($_SESSION['cart']);

?>

