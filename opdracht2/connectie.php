<?php
include ("db.php");
$pdo = new Database();

try{
    $pdo->insertuser("iphon","h",22,1450);
    echo "succes";
}catch (PDOException $e) {
    echo  "error inserting". $e->getMessage();
}


