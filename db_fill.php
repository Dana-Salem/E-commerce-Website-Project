<?php
require_once('database_connection.php');
// create a new table in the database
// user table with the following fields (id, name, email, address, phone) if it does not exist
$sql = "CREATE TABLE IF NOT EXISTS users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(30) NOT NULL,
    email VARCHAR(50) NOT NULL,
    address VARCHAR(50) NOT NULL,
    phone VARCHAR(50) NOT NULL
    )";

mysqli_query($conn, $sql);

// create a new table in the database
// products table with the following fields (id, name, description, price, image) if it does not exist
$sql = "CREATE TABLE IF NOT EXISTS products (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(30) NOT NULL,
    description VARCHAR(50) NOT NULL,
    price DECIMAL(10,2) NOT NULL,
    image VARCHAR(50) NOT NULL
    )";

mysqli_query($conn, $sql);

// create a new table in the database
// orders table with the following fields (id, user_id) if it does not exist user_id is a foreign key to the users table
$sql = "CREATE TABLE IF NOT EXISTS orders (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id INT(6) NOT NULL,
    FOREIGN KEY (user_id) REFERENCES users(id)
    )";

mysqli_query($conn, $sql);

// create a new table in the database
// order_items table with the following fields (id, order_id, product_id, quantity) if it does not exist order_id is a foreign key to the orders table and product_id is a foreign key to the products table
$sql = "CREATE TABLE IF NOT EXISTS order_items (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    order_id INT(6) UNSIGNED NOT NULL,
    product_id INT(6) UNSIGNED NOT NULL,
    quantity INT(6) UNSIGNED NOT NULL,
    FOREIGN KEY (order_id) REFERENCES orders(id),
    FOREIGN KEY (product_id) REFERENCES products(id)
)";

mysqli_query($conn, $sql);

// insert some data into the products table if it is empty
$sql = "SELECT * FROM products";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) == 0) {
    $sql = "INSERT INTO products (name, description, price, image) VALUES
    ('Perfume', 'Description 1', 10.00, 'image1.jpg'),
    ('Makeup remover', 'Description 2', 20.00, 'image2.jpg'),
    ('Face moisturizer cream', 'Description 3', 30.00, 'image3.jpg'),
    ('Brush', 'Description 4', 40.00, 'image4.jpg'),
    ('Eye Shadow', 'Description 5', 50.00, 'image5.jpg')";
    mysqli_query($conn, $sql);
}

// insert some data into the users table if it is empty
$sql = "SELECT * FROM users";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) == 0) {
   $sql = "INSERT INTO users (name, email, address, phone) VALUES
    ('John Doe', 's@as.com', '123 Main St', '555-1234'),
    ('Jane Smith', 'js@gami.com', '456 Elm St', '555-5678'),
    ('Bob Brown', 'bb@dasd.com', '789 Oak St', '555-9012')";
    mysqli_query($conn, $sql);
}

// insert some data into the orders table if it is empty
$sql = "SELECT * FROM orders";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) == 0) {
    $sql = "INSERT INTO orders (user_id) VALUES
    (1),
    (2),
    (3)";
    mysqli_query($conn, $sql);
}

// insert some data into the order_items table if it is empty
$sql = "SELECT * FROM order_items";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) == 0) {
    $sql = "INSERT INTO order_items (order_id, product_id, quantity) VALUES
    (1, 1, 1),
    (1, 2, 2),
    (2, 3, 3),
    (2, 4, 4),
    (3, 5, 5)";
    mysqli_query($conn, $sql);
}




