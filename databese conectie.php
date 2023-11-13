<?php

class Database{
public $pdo;
public function __construct($db = "test" , $user = "root", $pwd="", $host="localhost") {
try {
    $this->pdo = new PDO("musql:host=$host;dbname=$db" , $user, $pwd);
    $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    echo"connected to database $db";
} catch (PDOException$e){
    echo "connection failed: " . $e->getMessage();
    }

   }
}


?>