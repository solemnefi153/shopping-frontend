<?php require '../php/session.php';?>
<!DOCTYPE html>
<html>
    <head>
        <title>Make Payment</title>
        
        <link rel="stylesheet" type="text/css" href="../styles/general_styles.css" />
        <link rel="stylesheet" type="text/css" href="../styles/nav_styles.css" />
        <link rel="stylesheet" type="text/css" href="../styles/items_in_cart_styles.css" />
        <link rel="stylesheet" type="text/css" href="../styles/cart_styles.css" />
        <link rel="stylesheet" type="text/css" href="../styles/payment_styles.css" />
        <link href="https://fonts.googleapis.com/css2?family=Balsamiq+Sans:wght@400;700&display=swap" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script type='module' src='../scripts/payment.js' defer></script>
    </head>
    <body>
        <div class="content-wrap">
            <?php include '../php/load_nav_bar.php';?> 
            <?php
            if(sizeof($_SESSION['cart']) > 0){

                echo "
                <h2>Complete your purchase</h2>
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
                </div>
                <form class='payment_form'  id='payment_form' action='../webpages/payment_confirmation.php' method='POST'>
                    <div class='label'>
                    <label for='street'>Street Address</label>
                    <spam class='required'>*</spam>
                    </div>
                    <input type='text' name='street' id='street' minlength='5' maxlength = '30' required>
                    <spam class='error_message' id='street_error'></spam>
            
                    <div class='label'>
                    <label for='suite'>Suite or Appratment Number</label>
                    </div>
                    <input type='text' name='suite' id='suite' maxlength = '10'>
                    <spam class='error_message' id='suite_error'></spam>
            
                    <div class='label'>
                    <label for='state'>State</label>
                    <spam class='required'>*</spam>
                    </div>
                    <input type='text' name='state' id='state' minlength='2' maxlength = '10' required>
                    <spam class='error_message' id='state_error'></spam>
            
                    <div class='label'>
                    <label for='zipcode'>Zipcode</label>
                    <spam class='required'>*</spam>
                    </div>
                    <input type='text' name='zipcode' id='zipcode' minlength='5' maxlength = '10' required>
                    <spam class='error_message' id='zipcode_error'></spam>
                    <spam class='total' >Total: $" . $_SESSION['cart_total'] . "</spam>
                    <input class='make_payment_btn clickable' type='submit' value='Process Payment'>
                </form>
                </div>";
            }
            else
            {
            //Notify the user that there are not items in the cart 
            echo "
            <div class='no_products_on_cart'>
            <h2>There are no items in the cart to be purchased</h2>
            <h3>Please go to the browser page to add items</h2>
            <a  class='go_to_page_btn' href='../webpages/browse.php'>Browse Items</a>
            </div>";
            }
            ?>
        </div>
        <?php include '../php/footer.php';?>
    </body>
</html>