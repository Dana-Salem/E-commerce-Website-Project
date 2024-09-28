<?php include 'database_connection.php'; ?>

<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

</head>
<body>
<header>

</header>
<ul>
    <li><a href="index.php">Home</a></li>
    <li><a class="active" href="products.html">Products</a></li>
    <li><a href="contact.php">Contact</a></li>
    <li><a  href="about.php">About</a></li>
    <!--        // add logo to the header-->
    <li style="float: right; height: 20px; font-weight: bold; vertical-align:center; padding: 2px; color: #ff9a00; font-family: Helvetica;
         padding-right: 16px; font-size: 36px;">WoShop</li>

</ul>

<h2 style="text-align: center; padding-top: 40px; color: white;">Product Details</h2>

<div class="centered" style="padding-top: 20px">
<?php
    $id = $_GET['id'];
    $sql = "SELECT * FROM products WHERE id = $id";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            echo "<div style='display: flex; margin: 10px; padding: 10px; background-color: #333333; border-radius: 10px;'>";
            echo "<div style='display: inline-block;'>";
            echo "<img src='assets/products/".$row['image']."' style='width: 500px; height: 500px; object-fit: cover;'>";
            echo "</div>";
            echo "<div style='display: inline-block; padding-left: 20px;'>";

            echo "<h3 style='color: #bfbaba;'>Product Name</h3>";


            echo "<h3 style='color: white;'>".$row['name']."</h3>";
            echo "<p style='color: white;'>".$row['description']."</p>";
            echo "<h1 style='color: white;'>$".$row['price']."</h1>";
            echo "<h3 style='color: #bfbaba;'>Quantity</h3>"; echo "<input type='number' id='quantity' name='quantity' value='1' min='1' style='width: 50px;'>";

            echo "<button onclick='addToCart()' style='background-color: #111111; color: white; padding: 10px 20px; text-align: center; text-decoration: none; display: inline-block; font-size: 16px; margin: 4px 2px; cursor: pointer;'>Add to Cart</a>";
            echo "</div>";
            echo "</div>";
        }
    } else {
        echo "0 results";

    }
?>

</div>

</body>

 <script>
        function addToCart() {

            var quantity = document.getElementById('quantity').value;

            $.ajax({
                url: 'add_to_cart.php',
                type: 'POST',
                data: {id: <?php echo $id; ?>,  quantity: quantity },
                success: function(response) {
                    alert(response); window.location.href = 'products.php';
                }
            });
            // show information message


        }
    </script>

</html>




