<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $productId = $_POST['product_id'];
    $productName = $_POST['product_name'];
    $productPrice = $_POST['product_price'];
    $productQuantity = $_POST['quantity'];

    $cartItem = [
        'id' => $productId,
        'name' => $productName,
        'price' => $productPrice,
        'quantity' => $productQuantity
    ];

    // Check if cart session exists
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    // Check if the product is already in the cart
    $found = false;
    foreach ($_SESSION['cart'] as &$item) {
        if ($item['id'] == $productId) {
            $item['quantity'] += $productQuantity;
            $found = true;
            break;
        }
    }

    // If the product is not in the cart, add it
    if (!$found) {
        $_SESSION['cart'][] = $cartItem;
    }

    // Redirect to cart page or another page
    header("Location: cart.php");
}
?>
