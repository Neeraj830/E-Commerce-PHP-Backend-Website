<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MyStore Dashboard</title>
    <style>
        html, body {
    overflow: hidden;
    height: 100%;
}

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }
        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 20px;
            background-color: #333;
            color: #fff;
        }
        .navbar .brand {
            font-size: 1.5em;
            font-weight: bold;
        }
        .navbar .nav-buttons {
            display: flex;
            gap: 10px;
        }
        .navbar .nav-buttons button {
            background-color: #555;
            color: white;
            border: none;
            padding: 10px 15px;
            cursor: pointer;
            font-size: 1em;
        }
        .navbar .nav-buttons button:hover {
            background-color: #777;
        }
        .dashboard {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: calc(100vh - 60px); /* Adjusting height for navbar */
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            border-radius: 10px;
        }
        .dashboard h1 {
            margin-bottom: 20px;
            color: #333;
        }
        .dashboard .buttons {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }
        .dashboard .buttons button {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 15px 20px;
            cursor: pointer;
            font-size: 1em;
            border-radius: 5px;
            width: 100%;
            max-width: 300px;
        }
        .dashboard .buttons button:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<?php
session_start();
if(!$_SESSION['admin']){
    header("Location:form/login.php");
}
?>
<body>

    <div class="navbar">
        <div class="brand">MyStore</div>
        <div class="nav-buttons">
            <a href=""><button>Admin Profile</button></a>            
            <a href="form/logout.php"><button>Logout</button></a>
            <a href=""><button>User Panel</button></a>
        </div>
    </div>

    <div class="dashboard">
        <h1>Dashboard</h1>
        <div class="buttons">
            <a href="product/index.php"><button>Add Post</button></a>
            <a href=""><button>Users</button></a>
        </div>
    </div>

</body>
</html>
