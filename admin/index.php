<?php
include ("../database.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        nav{
            background-color: #333;
            padding: 20px 0;
        }
        nav ul{
            display: flex;
            align-items: center;
            justify-content: space-around;
            flex-direction: row;
        }
        nav ul li a{
            color: white;
            text-decoration: none;
        }
        nav ul li {
            list-style: none;
        }

    </style>
</head>
<body>
    <nav>
        <ul clasa="flex">
         
            <li><a href="">Home</a></li>
            <li><a href="login.php">log in</a></li>
            <?php

            ?>
            <li><a href="signup.php">Sign up</a></li>
        </ul>
    </nav>
    <div>
        <h1>wellcome
        page</h1>
    </div>
</body>
</html>