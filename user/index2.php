<?php
session_start();

$con = mysqli_connect('localhost', 'root', '', 'estore');

// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

// Function to fetch products based on category
function fetchProducts($category, $con) {
    $sql = "SELECT * FROM tblproduct WHERE PCategory='$category'";
    $result = $con->query($sql);
    $products = [];
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $products[] = $row;
        }
    }
    return $products;
}

$category = '';
$products = [];

// Handle button click and fetch data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['category'])) {
        $category = $_POST['category'];
        $products = fetchProducts($category, $con);
    }
}

$con->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>E-commerce Products</title>
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
            <li class="navbar-item"><a href="cart.php" class="navbar-links">Cart</a></li>
        </ul>
    </div>
</nav>
<script>
    document.getElementById('mobile-menu').addEventListener('click', function () {
        const menu = document.querySelector('.navbar-menu');
        menu.classList.toggle('active');
    });
</script>

<div class="container">
    <h1>Welcome to Our E-commerce Store</h1>
    <div class="buttons">
        <form method="post" action="index2.php">
            <button type="submit" name="category" value="laptop">Laptops</button>
            <button type="submit" name="category" value="mobile">Mobiles</button>
            <button type="submit" name="category" value="bag">Bags</button>
        </form>
    </div>
    <h2>Category: <?php echo ucfirst($category); ?></h2>
    <div class="products">
        <?php if (!empty($products)) { ?>
            <ul>
                <?php foreach ($products as $product) { ?>
                    <li>
                        <h3><?php echo $product['PName']; ?></h3>
                        <img src="<?php echo '../Images/' . $product['PImage']; ?>" alt="<?php echo $product['PName']; ?>">
                        <p class="price">Price: $<?php echo $product['PPrice']; ?></p>
                        <div class="product-buttons">
                            <form action="add_to_cart.php" method="post">
                                <input type="hidden" name="id" value="<?php echo $product['Id']; ?>">
                                <button type="submit" class="add-to-cart">Add to Cart</button>
                            </form>
                            <a href=""><button class="view-details">View Details</button></a>
                        </div>
                    </li>
                <?php } ?>
            </ul>
        <?php } else { ?>
            <p>No products available in this category.</p>
        <?php } ?>
    </div>
</div>
</body>
</html>
