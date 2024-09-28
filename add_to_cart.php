<?php
if(isset($_POST['id'])) {
    require_once('database_connection.php');
    $id = $_POST['id'];
    $sql = "SELECT * FROM products WHERE id = $id";
    $result = mysqli_query($conn, $sql);

    $quantity = $_POST['quantity'];

    // add to session cart
    session_start();
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = array();
    }

    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            $cartItem = array(
                'id' => $row['id'],
                'name' => $row['name'],
                'price' => $row['price'],
                'image' => $row['image'],
                'quantity' => $quantity
            );
            $_SESSION['cart'][] = $cartItem;


            echo "Added to cart";

        }

    }
    else {
        echo "0 results";
    }
}