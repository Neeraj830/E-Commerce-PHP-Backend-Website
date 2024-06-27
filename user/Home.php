<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accessories Store</title>
    <link rel="stylesheet" href="Homestyle.css">
</head>
<body>
    <div class="container">
        <div class="navbar">
            <div class="logo">
                <a href="#"><img src="../Images/logo.png" alt="Logo"></a>
            </div>
            <div>
                <a href="#">Home</a>
                <a href="index.php">Products</a>
                <a href="#">Best Deals</a>
                <a href="#">Offers</a>
                <a href="#">About Us</a>
                <a href="#">Contact</a>
            </div>
            <div class="auth-buttons">
                <a href="form/register.php">Sign Up</a>
                <a href="form/login.php">Log in</a>
            </div>
        </div>

        <div class="hero">
            <div class="hero-content">
                <h1>START YOUR JOURNEY <br>WITH OUR ACCESSORIES</h1>
                <a href="form/login.php"><button>Shop Now</button></a>
            </div>
            <div class="hero-images">
                <img src="../Images/Bag2.jpeg" alt="Bag">
                <img src="../Images/Laptop2.jpeg" alt="Laptop">
                <img src="../Images/Phone2.jpeg" alt="Phone">
            </div>
        </div>

        <div class="features">
            <div class="feature">
                <img src="../Images/shipping.png" alt="Free Shipping">
                <h3>FREE SHIPPING</h3>
                <p>We're delighted to offer you the added convenience of Free Shipping on all your purchases.</p>
            </div>
            <div class="feature">
                <img src="../Images/payment.png" alt="Safe Payment">
                <h3>SAFE PAYMENT</h3>
                <p>Your security and peace of mind are our top priorities. That's why we offer a range of safe and secure options.</p>
            </div>
            <div class="feature">
                <img src="../Images/suport.png" alt="Support">
                <h3>SUPPORT</h3>
                <p>Customer satisfaction is at the core of our values. We understand that exceptional support is paramount to a positive experience.</p>
            </div>
        </div>
        <?php include 'footer.php'; ?>
    </div>

</body>
</html>
