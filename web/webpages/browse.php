<?php require '../php/session.php';?>
<!DOCTYPE html>
<html>
    <head>
        <title>Browse Items</title>
        <link rel="stylesheet" type="text/css" href="../styles/general_styles.css" />
        <link rel="stylesheet" type="text/css" href="../styles/nav_styles.css" />
        <link rel="stylesheet" type="text/css" href="../styles/browse_styles.css" />
        <link href="https://fonts.googleapis.com/css2?family=Balsamiq+Sans:wght@400;700&display=swap" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script type='module' src="../scripts/browse.js" defer ></script>
    </head>
    <body>
        <div class="content-wrap">
            <?php include '../php/load_nav_bar.php';?>
            <h2>Please select from the following items</h2>
            <div id='products_flex'>
            <?php
            //load items from database
            $products = file_get_contents("../data/products.json");
            $products_object = json_decode($products, true);
            foreach($products_object as $itemID=>$values){
                echo "<div class='shopping_item'> ";
                echo "<img class='item' alt='" . $values['name'] . "' src='" . $values['image_address'] . "' >";
                echo "<span class='item_name'>" . $values['name'] . "</span>";
                echo "<span class='item_price'>Price: $" . $values['price'] . "</span>";
            
                //Check if the button should prompt to add or remove item
                if ($_SESSION['cart'][$itemID])
                {
                    echo "<button class='remove_from_cart_btn' name='add_remove_btn' id='". $itemID . "'>Remove from Cart</button>";
                } 
                else
                {
                    echo "<button class='add_to_cart_btn'  name='add_remove_btn' id='". $itemID . "'>Add to Cart</button>";
                }
                echo"</div>";
            }
            ?>
            </div>
        </div>
        <?php include '../php/footer.php';?>
    </body>
</html>