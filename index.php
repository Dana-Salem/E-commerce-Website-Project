
<?php include 'database_connection.php'; ?>

<!DOCTYPE html>
<html lang="en">


<!--// create a home page for the website-->
<!--// create a navigation bar with links to the other pages of the website (home,products , about, contact)-->
<!--// create a footer with the company name and the year of establishment-->
<!--// create a header with the company name and a slogan-->
<!--// create a section with a welcome message and a brief description of the company above an image-->

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
    <li><a class="active" href="index.php">Home</a></li>
    <li><a href="products.php">Products</a></li>
    <li><a   href="cart.php">

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
    <li class="logo">WoShop</li>

</ul>

    <div class="bgImagediv">Ï
        <img src="assets/bg.jpg" alt="Company Name" class="bgImage">
        <div class="centered">
            <section>
            <h2>Welcome to WoShop</h2>
            <p>WoShop is a leading provider of high-quality products. We offer a wide range of products to meet your needs.</p>
<!--                // add a button to the section that links to the products page-->
                <a href="products.php" style="background-color: #111111; color: white; padding: 10px 20px; text-align: center; text-decoration: none; display: inline-block; font-size: 16px; margin: 4px 2px; cursor: pointer;">View Products</a>
            </section>
        </div>
        <div class="bottomCentered">
            <p>&copy; WoShop 2024</p>


    </div>
    </div>

</body>

<!-- create a style for the bg image to cover the whole section -->



</html>



