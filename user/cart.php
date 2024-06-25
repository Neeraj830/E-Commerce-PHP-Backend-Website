<?php
session_start();

if (isset($_GET['action'])) {
    $id = $_GET['id'];

    foreach ($_SESSION['cart'] as $key => $item) {
        if ($item['id'] == $id) {
            if ($_GET['action'] == 'increment') {
                $_SESSION['cart'][$key]['quantity']++;
            } elseif ($_GET['action'] == 'decrement') {
                if ($_SESSION['cart'][$key]['quantity'] > 1) {
                    $_SESSION['cart'][$key]['quantity']--;
                }
            } elseif ($_GET['action'] == 'delete') {
                unset($_SESSION['cart'][$key]);
            }
            break;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .cart {
            width: 50%;
            margin: 0 auto;
            border-collapse: collapse;
        }
        .cart th, .cart td {
            border: 1px solid #ddd;
            padding: 8px;
        }
        .cart th {
            background-color: #f2f2f2;
        }
        .cart td {
            text-align: center;
        }
        .actions a {
            margin: 0 5px;
            text-decoration: none;
            padding: 5px 10px;
            background-color: #007BFF;
            color: white;
            border-radius: 3px;
        }
        .actions a.delete {
            background-color: #dc3545;
        }
    </style>
</head>
<body>
    <h1>Shopping Cart</h1>
    <?php if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0): ?>
        <table class="cart">
            <tr>
                <th>Product Name</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total</th>
                <th>Actions</th>
            </tr>
            <?php foreach ($_SESSION['cart'] as $item): ?>
                <tr>
                    <td><?php echo $item['name']; ?></td>
                    <td><?php echo $item['price']; ?></td>
                    <td><?php echo $item['quantity']; ?></td>
                    <td><?php echo $item['price'] * $item['quantity']; ?></td>
                    <td class="actions">
                        <a href="cart.php?action=increment&id=<?php echo $item['id']; ?>">+</a>
                        <a href="cart.php?action=decrement&id=<?php echo $item['id']; ?>">-</a>
                        <a href="cart.php?action=delete&id=<?php echo $item['id']; ?>" class="delete">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php else: ?>
        <p>Your cart is empty.</p>
    <?php endif; ?>
</body>
</html>
