<?php
session_start();
$con = mysqli_connect('localhost', 'root', '', 'estore');

// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

$user_id = isset($_SESSION['loggedin']) ? $_SESSION['loggedin'] : '';

// Check if the user is logged in
// if (empty($user_id)) {
//     die("User not logged in.");
// }

// Fetch cart items for the logged-in user
$sql = "SELECT c.product_id, c.quantity, p.PName, p.PPrice 
        FROM carts c 
        JOIN tblproduct p ON c.product_id = p.Id 
        WHERE c.user_id = '$user_id'";
$result = mysqli_query($con, $sql);

$cartItems = [];
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $cartItems[] = $row;
    }
}

// Handle cart actions (increment, decrement, delete)
if (isset($_GET['action']) && isset($_GET['id'])) {
    $id = $_GET['id'];
    $action = $_GET['action'];

    switch ($action) {
        case 'increment':
            $sql = "UPDATE carts SET quantity = quantity + 1 WHERE user_id = '$user_id' AND product_id = '$id'";
            break;
        case 'decrement':
            $sql = "UPDATE carts SET quantity = quantity - 1 WHERE user_id = '$user_id' AND product_id = '$id' AND quantity > 1";
            break;
        case 'delete':
            $sql = "DELETE FROM carts WHERE user_id = '$user_id' AND product_id = '$id'";
            break;
        default:
            $sql = "";
            break;
    }

    if (!empty($sql)) {
        mysqli_query($con, $sql);
    }

    header("Location: cart.php");
    exit();
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
        h1{
            text-align: center;
            padding: 30px;
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
    
    <link rel="stylesheet" href="indexstyle.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<nav class="navbar">
    <div class="navbar-container">
        <div class="navbar-logo">
            <a href="#">E-Shop</a>
        </div>
        <div class="navbar-toggle" id="mobile-menu">
            <span class="bar"></span>
            <span class="bar"></span>
            <span class="bar"></span>
        </div>
        <ul class="navbar-menu">
            <li class="navbar-item"><a href="" class="navbar-links">User Profile</a></li>
            <li class="navbar-item"><a href="form/logout.php" class="navbar-links">Logout</a></li>
            <li class="navbar-item"><a href="index2.php" class="navbar-links">Products</a></li>
        </ul>
    </div>
</nav>
    <h1>Shopping Cart</h1>
    <?php if (!empty($cartItems)): ?>
        <table class="cart">
            <tr>
                <th>Product Name</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total</th>
                <th>Actions</th>
            </tr>
            <?php 
            $grandTotal = 0;
            foreach ($cartItems as $item): 
                $total = $item['PPrice'] * $item['quantity'];
                $grandTotal += $total;
            ?>
                <tr>
                    <td><?php echo $item['PName']; ?></td>
                    <td><?php echo $item['PPrice']; ?></td>
                    <td><?php echo $item['quantity']; ?></td>
                    <td><?php echo $total; ?></td>
                    <td class="actions">
                        <a href="cart.php?action=increment&id=<?php echo $item['product_id']; ?>">+</a>
                        <a href="cart.php?action=decrement&id=<?php echo $item['product_id']; ?>">-</a>
                        <a href="cart.php?action=delete&id=<?php echo $item['product_id']; ?>" class="delete">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
            <tr>
                <td colspan="3"><strong>Grand Total</strong></td>
                <td colspan="2"><strong><?php echo $grandTotal; ?></strong></td>
            </tr>
        </table>
    <?php else: ?>
        <p>Your cart is empty.</p>
    <?php endif; ?>
</body>
</html>
