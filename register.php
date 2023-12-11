<?php
require_once("./db/Read.php");
require_once("./db/Post.php");



$db = getUsers();
// print_r($db);


if($_SERVER["REQUEST_METHOD"]=="POST"){
    $username = htmlspecialchars($_POST['username']);
    $email = $_POST['email'];
    $password = $_POST['password'];
    $comPass = $_POST['comPass'];
    $message = null;


    if(empty($username)){
        $message = "username cannot be empty";
    }else{
        if(empty($email)){
            $message = "email cannot be empty";
        }else{
            if(empty($password)){
                $message = "Password cannot be empty";
            }else{
                if(empty($comPass)){
                    $message = "Comfirm pass cannot be empty";
                }else{
                    if(!checkPass($password,$comPass)){
                        $message = "Passwords do not match";
                      }else{
                            $user = getUser($username);
                            if(empty($user)){
                                $connect = createUser($username,$email,password_hash($password,PASSWORD_BCRYPT));
                            }else{
                                $message = "Usename already taken";
                            }
                      }
                }
            }
        }
    }



    

    
}

function checkPass($password,$comfirmPass):bool{
    if($password != $comfirmPass){
        return false;
    }
    return true;
}

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
        <form action="" method="post">
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
            <?php
                global $message;
                if(!is_null($message)){
                    echo '
                    <p style="text-align: left;color:red;">
                    '.$message.'
                    </p>
                    ';
                }
            ?>
            <div>
                <input type="submit" value="sign up" name="create">
            </div>
            <p>or</p>
            <a href="./login.php">Login</a>
        </form>
    </div>
</body>
</html>