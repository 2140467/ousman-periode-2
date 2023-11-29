<?php

class Database{
public $pdo;
public function __construct($db = "telefoonwinkel" , $user = "root", $pwd="", $host="localhost:3306") {
try {
    $this->pdo = new PDO("mysql:host=$host;dbname=$db" , $user, $pwd);
    $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
} catch (PDOException$e){
    echo "connection failed: " . $e->getMessage();
    }

   }
   public function insertuser ($merk, $model , $opslag, $prijs){
   
   $sql = "INSERT INTO telefoons VALUES (Null,:merk, :model , :opslag, :prijs) ";
   $stmt = $this->pdo->prepare($sql);
   $stmt->execute([':merk'=> $merk, ':model'=>$model, ':opslag'=>$opslag,'prijs'=>$prijs]);
   
   }

   
   }

?>
