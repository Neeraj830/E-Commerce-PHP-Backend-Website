<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accessories Store</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #007BFF;
        }
        .container {
            min-width: 1480px;
            margin: 0 auto;
            background-color: #fff;
            padding: 0 20px;
        }
        .navbar {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            align-items: center;
            background-color: #fff;
            padding: 10px 20px;
        }
        .navbar a {
            color: #000;
            text-decoration: none;
            margin: 0 10px;
        }
        .navbar .logo {
            display: flex;
            align-items: center;
        }
        .navbar .logo img {
            height: 60px;
        }
        .navbar .auth-buttons a {
            background-color: #007BFF;
            color: #fff;
            padding: 5px 10px;
            border-radius: 5px;
            margin-left: 5px;
        }
        .hero {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            align-items: center;
            text-align: left;
            background-color: #1E2A38;
            color: #fff;
            padding: 50px 20px;
        }
        .hero-content {
            flex: 1;
            margin-right: 20px;
        }
        .hero h1 {
            margin-bottom: 20px;
        }
        .hero button {
            background-color: #007BFF;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }
        .hero-images {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative;
            max-width: 400px;
        }
        .hero-images img {
            position: absolute;
            width: 160px;
            height: 160px;
            border: 1px solid #ccc;
            border-radius: 50%;
            padding: 5px;
            box-sizing: border-box;
        }
        .hero-images img:nth-child(1) {
            top: 0;
            left: 50%;
            transform: translateX(-50%);
        }
        .hero-images img:nth-child(2) {
            bottom: 0;
            left: 0;
            transform: translateX(-50%);
        }
        .hero-images img:nth-child(3) {
            bottom: 0;
            right: 0;
            transform: translateX(50%);
        }
        .features {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
            padding: 20px 0;
            background-color: #f8f9fa;
        }
        .feature {
            text-align: center;
            max-width: 300px;
            flex: 1;
            margin: 10px;
        }
        .feature img {
            width: 100px;
            height: 100px;
        }
        @media (max-width: 1200px) {
            .container {
                min-width: 100%;
            }
        }
        @media (max-width: 768px) {
            .navbar {
                flex-direction: column;
                align-items: flex-start;
            }
            .navbar a {
                margin: 5px 0;
            }
            .navbar .auth-buttons {
                display: flex;
                flex-direction: column;
            }
            .navbar .auth-buttons a {
                margin: 5px 0;
            }
            .hero {
                flex-direction: column;
                text-align: center;
            } 
            .hero-content {
                margin: 0 0 20px 0;
            }
            .hero-images {
                max-width: 100%;
            }
            .features {
                flex-direction: column;
                align-items: center;
            }
            .feature {
                max-width: 90%;
            }
        }
    </style>
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
    </div>
</body>
</html>
