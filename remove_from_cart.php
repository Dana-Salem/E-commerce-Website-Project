<?php


    // remove from session cart
    session_start();
    $id = $_GET['id'];
    foreach ($_SESSION['cart'] as $key => $value) {
        if ($value['id'] == $id) {
            unset($_SESSION['cart'][$key]);
            echo "Removed from cart";
        }
    }

    // redirect to cart page
    header('Location: cart.php');
    exit();




