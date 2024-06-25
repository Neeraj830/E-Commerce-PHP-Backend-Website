<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive E-commerce Navbar</title>
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
                <li class="navbar-item"><a href="form/login.php" class="navbar-links">Login</a></li>
                <li class="navbar-item"><a href="form/register.php" class="navbar-links">Register</a></li>
<!-- 
                <li class="navbar-item"><a href="index2.php" class="navbar-links">Back to products</a></li>
                <li class="navbar-item"><a href="form/logout.php" class="navbar-links">Logout</a></li> -->
            </ul>
        </div>
    </nav>
    <script>
        document.getElementById('mobile-menu').addEventListener('click', function () {
    const menu = document.querySelector('.navbar-menu');
    menu.classList.toggle('active');
});

    </script>
</body>
</html>
