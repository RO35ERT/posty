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

    if($result ->num_rows>0){
        while($row = $result->fetch_assoc()){
            return $row;
        }
    }
}
?>