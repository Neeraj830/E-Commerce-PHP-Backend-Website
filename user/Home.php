
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple E-commerce Homepage</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .navbar {
            background-color: #333;
            overflow: hidden;
        }
        .navbar a {
            float: left;
            display: block;
            color: #f2f2f2;
            text-align: center;
            padding: 14px 20px;
            text-decoration: none;
        }
        .navbar a:hover {
            background-color: #ddd;
            color: black;
        }
        .container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px;
            min-height: 80vh;
        }
        .content {
            max-width: 60%;
        }
        .images {
            position: relative;
            width: 200px;
            height: 300px;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .images img {
            position: absolute;
            width: 160px;
            height: 160px;
            border: 1px solid #ccc;
            border-radius: 50%;
            padding: 5px;
            box-sizing: border-box;
        }

        .images img:nth-child(1) {
            top: 0;
            left: 50%;
            transform: translateX(-50%);
        }
        .images img:nth-child(2) {
            bottom: 0;
            left: 0;
            transform: translateX(-50%);
        }
        .images img:nth-child(3) {
            bottom: 0;
            right: 0;
            transform: translateX(50%);
        }
        h1 {
            color: #333;
        }
        p {
            font-size: 1.2em;
            color: #666;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="content">
            <h1>NNN E-commerce Store</h1>
            <p>Welcome to My NNN Store! We offer a wide range of products to suit all your needs. Browse through our collection of bags, laptops, and phones. Enjoy your shopping experience!</p>
        </div>
        <div class="images">
        <img src="../Images/Bag4.jpeg" alt="Bag">
            <img src="../Images/Laptop2.jpeg" alt="Laptop">
            <img src="../Images/Phone2.jpeg" alt="Phone">
        </div>
    </div>
</body>
</html>

