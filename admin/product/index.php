<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            display: flex;
            flex-direction: column;
            align-items: center;
            margin: 0;
            padding: 20px;
        }

        .form-container {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
            margin-bottom: 20px;
        }

        .form-container h2 {
            margin-bottom: 20px;
            color: #333;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            color: #555;
        }

        .form-group input,
        .form-group select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .form-group button {
            width: 100%;
            padding: 10px;
            background-color: #007BFF;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        .form-group button:hover {
            background-color: #0056b3;
        }

        .product-display {
            width: 100%;
            max-width: 800px;
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .product-display h2 {
            margin-bottom: 20px;
            color: #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 10px;
            border: 1px solid #ddd;
            text-align: center;
        }

        th {
            background-color: #f7f7f7;
            color: #333;
        }

        td img {
            max-width: 100px;
            height: auto;
            border-radius: 8px;
        }

        .update-btn, .delete-btn {
            padding: 5px 10px;
            margin: 2px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 14px;
            text-decoration: none;
        }

        .update-btn {
            background-color: #28a745;
            color: white;
        }

        .update-btn:hover {
            background-color: #218838;
        }

        .delete-btn {
            background-color: #dc3545;
            color: white;
        }

        .delete-btn:hover {
            background-color: #c82333;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h2>Add New Product</h2>
        <form action="insert.php" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="productName">Product Name:</label>
                <input type="text" id="productName" name="Pname" required>
            </div>
            <div class="form-group">
                <label for="price">Price:</label>
                <input type="number" id="price" name="Pprice" required>
            </div>
            <div class="form-group">
                <label for="image">Product Image:</label>
                <input type="file" id="image" name="Pimage" accept="image/*" required>
            </div>
            <div class="form-group">
                <label for="category">Category:</label>
                <select id="category" name="Pages" required>
                    <option value="Bag">Bag</option>
                    <option value="Laptop">Laptop</option>
                    <option value="Phone">Phone</option>
                </select>
            </div>
            <div class="form-group">
                <button name="submit" type="submit">Upload</button>
            </div>
        </form> 
    </div>

    <!-- fetch data -->

    <div class="product-display" id="productDisplay">
        <h2>Product Details</h2>
        <table id="productTable">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Product Image</th>
                    <th>Product Name</th>
                    <th>Price</th>
                    <th>Category</th>
                    <th>Action</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody id="productDetails">
                <?php
                include 'config.php';

                $Record = mysqli_query($con, "SELECT * FROM `tblproduct`");

                while($row = mysqli_fetch_array($Record)) {
                    echo "
                    <tr>
                        <td>{$row['Id']}</td>
                        <td><img src='{$row['PImage']}' alt='Product Image'></td>
                        <td>{$row['PName']}</td>
                        <td>{$row['PPrice']}</td>
                        <td>{$row['PCategory']}</td>
                        <td>
                            <a href='index.php?delete={$row['Id']}' class='delete-btn'>Delete</a>
                        </td>
                        <td>
                        <a href='update.php?id={$row['Id']}' class='update-btn'>Update</a>
                        </td>
                    </tr>
                    ";
                }
                ?>
            </tbody>
        </table> 
    </div>
</body>
</html>
