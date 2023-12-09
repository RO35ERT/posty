<?php
require_once("./db/Read.php");



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
    <link rel="stylesheet" href="./css/login.css">
</head>
<body>
    <div class="container">
        <form action="">
            <h1>Sign Up</h1>
            <div>
                <label for="username">username</label>
                <input type="text" id="username" name="username">
            </div>
            <div>
                <label for="email">email</label>
                <input type="email" id="email" name="email">
            </div>
            <div>
                <label for="password">password</label>
                <input type="password" id="password" name="password">
            </div>
            <div>
                <label for="comPass">comfirm</label>
                <input type="password" id="comPass" name="comPass">
            </div>
            <div>
                <input type="submit" value="sign up">
            </div>
            <p>or</p>
            <a href="./login.php">Login</a>
        </form>
    </div>
</body>
</html>