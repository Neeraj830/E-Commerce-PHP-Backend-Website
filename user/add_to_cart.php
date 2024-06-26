<?php
session_start();
$con = mysqli_connect('localhost', 'root', '', 'estore');

// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_SESSION['loggedin'];
    $product_id = $_POST['product_id'];
    $product_quantity = $_POST['quantity'];

    // Sanitize input
    $user_id = mysqli_real_escape_string($con, $user_id);
    $product_id = mysqli_real_escape_string($con, $product_id);
    $product_quantity = mysqli_real_escape_string($con, $product_quantity);

    // Check if the product is already in the cart
    $sql = "SELECT * FROM carts WHERE user_id = '$user_id' AND product_id = '$product_id'";
    $result = mysqli_query($con, $sql);

    if (mysqli_num_rows($result) > 0) {
        // Update the quantity if the product is already in the cart
        $sql = "UPDATE carts SET quantity = quantity + $product_quantity WHERE user_id = '$user_id' AND product_id = '$product_id'";
    } else {
        // Insert the product into the cart
        $sql = "INSERT INTO carts (user_id, product_id, quantity) VALUES ('$user_id', '$product_id', '$product_quantity')";
    }

    if (mysqli_query($con, $sql)) {
        // Redirect to cart page
        header("Location: cart.php");
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($con);
    }
}
?>
