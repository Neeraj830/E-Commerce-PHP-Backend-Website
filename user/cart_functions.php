<?php
session_start();
include 'config.php';

// Add item to cart
function addToCart($userId, $productId, $quantity, $con) {
    $sql = "SELECT * FROM carts WHERE user_id = ? AND product_id = ?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("ii", $userId, $productId);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        $sql = "UPDATE carts SET quantity = quantity + ? WHERE user_id = ? AND product_id = ?";
        $stmt = $con->prepare($sql);
        $stmt->bind_param("iii", $quantity, $userId, $productId);
    } else {
        $sql = "INSERT INTO carts (user_id, product_id, quantity) VALUES (?, ?, ?)";
        $stmt = $con->prepare($sql);
        $stmt->bind_param("iii", $userId, $productId, $quantity);
    }
    $stmt->execute();
    $stmt->close();
}

// Get cart items
function getCartItems($userId, $con) {
    $sql = "SELECT p.id, p.name, p.price, p.image, c.quantity FROM products p JOIN carts c ON p.id = c.product_id WHERE c.user_id = ?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("i", $userId);
    $stmt->execute();
    $result = $stmt->get_result();
    
    $cartItems = [];
    while ($row = $result->fetch_assoc()) {
        $cartItems[] = $row;
    }
    $stmt->close();
    return $cartItems;
}

// Remove item from cart
function removeFromCart($userId, $productId, $con) {
    $sql = "DELETE FROM carts WHERE user_id = ? AND product_id = ?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("ii", $userId, $productId);
    $stmt->execute();
    $stmt->close();
}

// Update item quantity
function updateCartQuantity($userId, $productId, $quantity, $con) {
    $sql = "UPDATE carts SET quantity = ? WHERE user_id = ? AND product_id = ?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("iii", $quantity, $userId, $productId);
    $stmt->execute();
    $stmt->close();
}
?>
