<?php
$con = mysqli_connect('localhost', 'root', '');

// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

// Select the database
mysqli_select_db($con, 'estore');


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
    <title>E-commerce Homepage</title>
    <link rel="stylesheet" href="indexstyle.css">
    <?php include 'nav.php'; ?>
</head>
<body>
    <div class="container">
        <h1>Welcome to Our E-commerce Store</h1>
        <div class="buttons">
            <form method="post" action="index.php">
                <button type="submit" name="category" value="laptop">Laptops</button>
                <button type="submit" name="category" value="mobile">Mobiles</button>
                <button type="submit" name="category" value="bag">Bags</button>
            </form>
        </div>
        <h2>Category: <?php echo ucfirst($category); ?></h2>
        <<div class="products">
    <?php if (!empty($products)) { ?>
        <ul>
            <?php foreach ($products as $product) { ?>
                <li>
                    <h3><?php echo $product['PName']; ?></h3>
                    <img src="<?php echo '../Images/' . $product['PImage']; ?>" alt="<?php echo $product['PName']; ?>">
                    <p class="price">Price: $<?php echo $product['PPrice']; ?></p>
                    <div class="product-buttons">
                        <button class="add-to-cart">Add to Cart</button>
                        <button class="view-details">View Details</button>
                    </div>
                </li>
            <?php } ?>
        </ul>
    <?php } else { ?>
        <p>No products available in this category.</p>
    <?php } ?>
</div>

</body>
</html>

