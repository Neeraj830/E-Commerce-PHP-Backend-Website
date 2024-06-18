<?php
$con = mysqli_connect('localhost', 'root', '');

// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

// Select the database
mysqli_select_db($con, 'estore');
?>
