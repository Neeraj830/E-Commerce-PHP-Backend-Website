<?php

$con = mysqli_connect('localhost','root','','estore');

$A_username = $_POST['username'];
$A_password = $_POST['password'];

$result = mysqli_query($con, "SELECT * FROM `admin` WHERE username ='$A_username' AND password ='$A_password'");

session_start();


if($result){

    $_SESSION['admin'] = $A_username;
    echo "
    <script>
    alert('login successfull');
    window.location.href='../mystore.php';
    </script>
    ";
}
else{
    echo "
    <script>
    alert('login fail or invalid username/password');
    window.location.href='login.php';
    </script>
    ";
}



?>