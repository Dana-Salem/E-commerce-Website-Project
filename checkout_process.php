<?php
session_start();
require_once('database_connection.php');
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$address = $_POST['address'];



// create a new user
$sql = "INSERT INTO users (name, email, phone, address) VALUES ('$name', '$email', '$phone', '$address')";

$result = mysqli_query($conn, $sql);



// get the user id
$sql = "SELECT * FROM users WHERE email = '$email'";
$result = mysqli_query($conn, $sql);
$user = mysqli_fetch_assoc($result);
$user_id = $user['id'];


// create a new order
$sql = "INSERT INTO orders (user_id) VALUES ('$user_id')";
$result = mysqli_query($conn, $sql);

// get the order id
$sql = "SELECT * FROM orders WHERE user_id = '$user_id'";
$result = mysqli_query($conn, $sql);
$order = mysqli_fetch_assoc($result);
$order_id = $order['id'];

// add the items in the cart to the order_items table
foreach ($_SESSION['cart'] as $key => $value) {
    $product_id = $value['id'];
    $quantity = $value['quantity'];
    $sql = "INSERT INTO order_items (order_id, product_id, quantity) VALUES ('$order_id', '$product_id', '$quantity')";
    $result = mysqli_query($conn, $sql);
}

// clear the cart
unset($_SESSION['cart']);
echo "Order placed successfully";
die();




