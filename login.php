
<?php
    require_once("./db/Read.php");
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        $username = htmlspecialchars($_POST['username']);
        $passowrd = $_POST['password'];

        $db = getUser($username);
        
        if($db['username'] == $username && verifyPassword($passowrd,$db['password'])){
            echo "Allowed";
            setcookie('username',$username);
            header("Location:./index.php");
        }else{
            echo 'Not allowed';
        }
        
    }

    function verifyPassword($password,$hashedPass):bool{
        if(password_verify($password,$hashedPass)){
            return true;
        }
        return false;
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="./css/login.css">
</head>
<body>
    <div class="container">
        <form action="" method="post">
            <h1>Login</h1>
            <div>
                <label for="username">username</label>
                <input type="text" id="username" name="username">
            </div>
            <div>
                <label for="username">password</label>
                <input type="password" id="password" name="password">
            </div>
            <div>
                <input type="submit" value="login">
            </div>
            <p>or</p>
            <a href="./register.php">Register</a>
        </form>
    </div>
</body>
</html>