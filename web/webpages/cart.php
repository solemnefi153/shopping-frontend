<?php require '../php/session.php';?>
<!DOCTYPE html>
<html>
    <head>
        <title>Cart</title>
        <link rel="stylesheet" type="text/css" href="../styles/general_styles.css" />
        <link rel="stylesheet" type="text/css" href="../styles/nav_styles.css" />
        <link rel="stylesheet" type="text/css" href="../styles/cart_styles.css" />
        <link rel="stylesheet" type="text/css" href="../styles/items_in_cart_styles.css" />
        <link href="https://fonts.googleapis.com/css2?family=Balsamiq+Sans:wght@400;700&display=swap" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script type='module' src='../scripts/cart.js' defer></script>
    </head>
    <body>
        <div class="content-wrap">
            <!-- Load the Nav Bar -->
            <?php include '../php/load_nav_bar.php';?>
            <!-- Load the items that are in the cart -->
            <div id='content'>
                <?php include '../php/load_items_in_cart.php' ; ?>
            </div>
        </div>
        <?php include '../php/footer.php';?>
    </body>
</html>