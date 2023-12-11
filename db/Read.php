<?php
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(E_ALL);
require_once("./db/MyConnection.php");
$db = new MyConnection();

$connect = $db->connect();

function getUsers(){
    global $connect;
    $readUsers = "SELECT * FROM users";

    $result = $connect->query($readUsers);

    if($result->num_rows>0){
        while($row = $result->fetch_all()){
            return $row;
        }
    }
}

function getUser($username):array{
    global $connect;

    $query = "SELECT * FROM users WHERE username = '".$username."'";
    $result = $connect->query($query);
    
    if($result ->num_rows>0){
        while($row= $result->fetch_array()){
            return $row;
        }
    }
    return "";
}

function getPosts(){
    global $connect;

    $query = "SELECT u.username,p.post,p.posted,p.post_id FROM posts p JOIN users u ON u.user_id=p.user_id ORDER BY p.posted DESC";

    $result = $connect->query($query);

    if($result-> num_rows>0){
        while($rows = $result->fetch_all()){
            return $rows;
        }
    }

}


?> 