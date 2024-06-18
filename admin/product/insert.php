<?php

if(isset($_POST['submit'])){

    include 'config.php';

    $product_name = $_POST['Pname'];
    $product_price = $_POST['Pprice'];
    $product_image = $_FILES['Pimage'];
    $image_location = $_FILES['Pimage']['tmp_name'];
    $image_name = $_FILES['Pimage']['name'];
    $image_des = "Uploadedimage/".$image_name;
    move_uploaded_file($image_location, $image_des);
    $product_category = $_POST['Pages'];

    // SQL query for adding product
    $query = "INSERT INTO tblproduct (PName, PPrice, PImage, PCategory) VALUES ('$product_name', '$product_price', '$image_des', '$product_category')";

    // Execute the query
    if (mysqli_query($con, $query)) {
        header("Location: index.php");
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($con);
    }
}

?>
