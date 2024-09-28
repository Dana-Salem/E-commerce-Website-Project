
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
    <li><a class="active" href="products.php">Products</a></li>
    <li><a href="cart.php">

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

<div class="bgImagediv" style="padding-top: 20px">Ï
<div class="centeredGrid">

<!--    // get products from the database and display them in a grid-->
<?php
    $sql = "SELECT * FROM products";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            echo "<a href='products_details.php?id=".$row['id']."'> <div style='display: inline-block; margin: 10px; padding: 10px; background-color: #333333; border-radius: 10px;'>";
            echo "<img src='assets/products/".$row['image']."' class='product'>";
            echo "<h3 style='color: white;'>".$row['name']."</h3>";
            echo "<p style='color: white;'>".$row['description']."</p>";
            echo "<p style='color: white;'>$".$row['price']."</p>";
            echo "</div></a>";
        }
    } else {
        echo "0 results";

    }
?>
</div>

</div>

</body>

</html>



