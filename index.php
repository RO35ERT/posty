
<?php 
require_once('./db/Post.php');
if(isset($_COOKIE['username'])){
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $post = $_POST['post'];
        
        createPost($post,$_COOKIE['username']);
        
    }
}else{
    header("Location:./login.php");
}

function getPostedTime($posted):string{

    $timePosted = strtotime($posted);
    $timeNow = time();
    $difference = $timeNow - $timePosted;
    $differenceInSeconds = floor(($difference %(60*60))/60);
    return $difference." seconds ago ";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Posty</title>
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    <div class="container">
        <nav>
            <header>
                <div class="logo">
                    <a href="./index.php">Home</a>
                </div>
                <div class="profile">
                    <?php
                        if(isset($_COOKIE['username'])){
                            echo "<p>".$_COOKIE['username']."</p>";
                            echo '<a href="./login.php">Logout</a>';
                        }else{
                            echo '<a href="./login.php">Login</a>';
                        }
                    ?>
                </div>
            </header>
        </nav>
        <main>
            <div class="create-post">
                <form action="" method="post">
                    <textarea name="post" id="post" placeholder="What is on your mind" ></textarea>
                    <input type="submit" value="post">
                </form>
            </div>
            <div class="posts">
                <?php 
                    $db= getPosts();
                ?>

                <?php 
                foreach($db as $single): 
                ?>
                <div class="post">
                    <div class="post-details">
                        <h3><?php echo $single[0] ?></h3>
                        <p><?php echo getPostedTime($single[2]) ?></p>
                    </div>
                    <div class="a-post">
                        <p>
                            <?php echo $single[1]?>
                        </p>
                    </div>
                    <div class="reactions">
                        <a href="">Delete</a>
                        <a href="">Edit</a>
                        <a href="">Like</a>
                        <p>2k likes</p>
                    </div>
                </div>

                <?php endforeach ?>
            </div>
        </main>
        <footer>
            <p>&copy; 2024 Your Website Name. All rights reserved.</p>
            <p>Terms of Service | Privacy Policy | Contact Us</p>
        </footer>

    </div>
</body>
</html>