<?php
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(E_ALL);
require_once("./db/MyConnection.php");
require_once("./db/Read.php");
$db = new MyConnection();

$connect = $db->connect();


function createUser($username, $email, $password){
    global $connect;
    $query = "insert into users(username,email,password) values(?,?,?)";
    $stmt = $connect->prepare($query);
    $stmt->bind_param('sss',$username,$email,$password);
    $stmt->execute();
}

function createPost($post,$username){
    global $connect;
    $user = getUser($username);
    $query = "insert into posts(post,posted,user_id) values(?,?,?)";
    $stmt = $connect->prepare($query);
    $now = date('Y-m-d H-i:s');
    $stmt->bind_param('ssi',$post,$now,$user[0]);
    $stmt->execute();
}


?>