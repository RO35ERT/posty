<?php

class MyConnection{
    private $servername = "localhost";
    private $username = "root";
    private $password = "tumbwerobert";
    private $dbname = "posty";


    public function connect() {

        $conn = new mysqli(
            $this->servername,
            $this->username,
            $this->password,
            $this->dbname
        );
        if($conn ->connect_error){
            die("Connection error ".$conn->connect_error);
        }

        return $conn; 
    }
}
?>