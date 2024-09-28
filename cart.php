
<?php include 'database_connection.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="style.css">
</head>


<body>
<!--// start the database connection-->

<header>

</header>
<ul>
    <li><a href="index.php">Home</a></li>
    <li><a href="products.php">Products</a></li>
    <li><a class="active"  href="cart.php">

            <?php
            session_start();
            if (isset($_SESSION['cart'])) {
                $count = count($_SESSION['cart']);
                echo "Cart ($count)";
            } else {
                echo "Cart";
            }
            ?>
        </a></li>
    <li><a href="contact.php">Contact</a></li>
    <li><a  href="about.php">About</a></li>
    <!--        // add logo to the header-->
    <li style="float: right; height: 20px; font-weight: bold; vertical-align:center; padding: 2px; color: #ff9a00; font-family: Helvetica;
         padding-right: 16px; font-size: 36px;">WoShop</li>

</ul>

<div class="bgImagediv" style="padding-top: 60px">
<!--    <div class="centeredGrid">-->

<!--        // view the cart items in list view-->
        <?php
        if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0){
            $total = 0;
            echo "<div class='centeredGrid'>";
            foreach ($_SESSION['cart'] as $key => $value) {
                $total = $total + $value['price'] * $value['quantity'];
                echo "<div class='cartItem'>";
                echo "<img src='assets/products/$value[image]' width='400px' height='400px' style='object-fit: cover;'>";
                echo "<p>$value[name]</p>";
                echo "<p>Quantity: $value[quantity]</p>";
                echo "<p>Price: $value[price] | Total: ".$value['price'] * $value['quantity']."</p>";
                echo "<a href='remove_from_cart.php?id=$value[id]'>Remove</a>";
                echo "</div>";
            }
            echo "</div>";
            echo "<hr>";
            echo "<div class='cartItem'>";
            echo "<p>Total: $total</p>";
            echo "<button onclick='toCheckout()' style='background-color: #ff9a00; color: white; padding: 10px 20px; text-align: center; text-decoration: none; display: inline-block; font-size: 16px; margin: 4px 2px; cursor: pointer;'>Checkout</a>";
            echo "</div>";
        } else {
            echo "<p>No items in cart</p>";
        }
        ?>


<!--    </div>-->

</div>

</body>

<script>
    function toCheckout() {
        window.location.href = 'checkout.php';
    }
</script>

</html>



