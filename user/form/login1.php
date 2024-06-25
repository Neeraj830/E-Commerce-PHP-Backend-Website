<?php

$con = mysqli_connect('localhost','root','','estore');

$A_username = $_POST['username'];
$A_password = $_POST['password'];

$result = mysqli_query($con, "SELECT * FROM `users` WHERE Username ='$A_username' AND Password ='$A_password'");
$user_id = mysqli_fetch_assoc($result)['Id'];


session_start();


if($result){

    $_SESSION['loggedin'] = $user_id;
    echo "
    <script>
    alert('login successfull');
    window.location.href='../index2.php';
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