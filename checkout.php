
<?php include 'database_connection.php';

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

<div class="bgImagediv" style="padding-top: 60px">

    <!--// show checkout form in -->

    <div class="centered" >
<!--        <form action="checkout_process.php" method="post">-->
            <label for="name">Name:</label><br>
            <input class="formTextField" type="text" id="name" name="name" required><br>
            <label for="email">Email:</label><br>
            <input class="formTextField" type="email" id="email" name="email" required><br>
            <label   for="phone">Phone:</label><br>
            <input class="formTextField" type="text" id="phone" name="phone" required><br>
            <label   for="address">Address:</label><br>
            <input class="formTextField" type="text" id="address" name="address" required><br>
            <button onclick="checkout()" class="formButton" type="submit">Checkout</button>
<!--        </form>-->







</div>


</body>


<script>
    function checkout() {
        var name = document.getElementById('name').value;
        var email = document.getElementById('email').value;
        var phone = document.getElementById('phone').value;
        var address = document.getElementById('address').value;

        console.log(name, email, phone, address);



        $.ajax({
            type: 'POST',
            url: 'checkout_process.php',
            data: {
                name: name,
                email: email,
                phone: phone,
                address: address
            },
            success: function(response) {
                console.log(response);
                alert('Order placed successfully');
                window.location.href = 'index.php';
            }
        });
    }
</script>


</html>







