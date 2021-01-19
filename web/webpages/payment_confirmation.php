<?php require '../php/session.php';?>

<?php
$street = test_input($_POST["street"]);
$suite = test_input($_POST["suite"]);
$state = test_input($_POST["state"]);
$zipcode = test_input($_POST["zipcode"]);

function test_input($data) {
$data = trim($data);
$data = stripslashes($data);
$data = htmlspecialchars($data);
return $data;
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Make Payment</title>
        <link rel="stylesheet" type="text/css" href="../styles/general_styles.css" />
        <link rel="stylesheet" type="text/css" href="../styles/nav_styles.css" />
        <link rel="stylesheet" type="text/css" href="../styles/items_in_cart_styles.css" />
        <link rel="stylesheet" type="text/css" href="../styles/payment_styles.css" />
        <link href="https://fonts.googleapis.com/css2?family=Balsamiq+Sans:wght@400;700&display=swap" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <div class="content-wrap">
            <?php include '../php/load_nav_bar.php';?> 
            <script>
                //Show that the cart is empty
                var cart = document.getElementById('cart_image');
                cart.src = '../images/empty_cart.png';
            </script>
            <?php
            if(sizeof($_SESSION['cart']) > 0){

                echo "
                <h2>Congratulations! Your purchase has been completed</h2>
                <h3>Purchase Summary</h3>
                <div class='purchase_details'>
                <div class='products_on_cart'>";
                //Check the items items in the cart session variabel 
                foreach($_SESSION['cart'] as $itemID => $values ){
                    echo "<div class='item_on_cart'>
                        <img alt='' class='item_image' src='" . $values['image_address'] . "' >
                        <spam>" . $values['name'] . "</spam>
                        <spam>$" . number_format((float)$values['price'], 2) . "</spam>
                        </div>";
                }
            echo "
                </div >
                <div class='payment_infomratin'>
                    <spam>Street: " . $street . "</spam>";
                    if($suite)
                    {
                        echo "<spam>Suite/Appartment: " . $suite . "</spam>";
                    }
                    
            echo "       
                    <spam>State: " . $state . "</spam>
                    <spam>Zipcode: " . $zipcode . "</spam>
                    <spam class='total' >Total: $" . $_SESSION['cart_total'] . "</spam>
                </div>";
            }
            else
            {
                //Notify the user that there are not items in the cart 
                echo "
                <div class='no_products_on_cart'>
                <h2>There are no items in the cart to be purchased</h2>
                <h3>Please go to the browser page to add items</h3>
                <a  class='go_to_page_btn' href='../webpages/browse.php'>Browse Items</a>
                </div>";
            }
            //This is the end of the session path we will reset the session; 
            // remove all session variables
            session_unset();

            // destroy the session
            session_destroy();
            ?>  
        </div>
        <?php include '../php/footer.php';?>
    </body>
</html>