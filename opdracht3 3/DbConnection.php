<?php

class db
{
    private $host = "localhost:3306";
    private $dbname = "telefoonwinkel";
    private $username = "root";
    private $password = "";
    private $pdo;

    public function __construct() {
        try {
            $this->pdo = new PDO("mysql:host={$this->host};dbname={$this->dbname}", $this->username, $this->password);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Connection failed: " . $e->getMessage());
        }
    }


    public function fetchData($id = null) {
        $stmt = $this->pdo->query("SELECT * FROM telefoons");
        $telefoons = $stmt->fetchAll();
        return $telefoons; 
    }

    public function insertData($id, $merk, $model, $opsalg, $prijs) {
        try {
            $query = "INSERT INTO telefoons VALUES (:id, :merk, :model, :opsalg, :prijs)";
            $stmt = $this->pdo->prepare($query);
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':merk', $merk);
            $stmt->bindParam(':model', $model);
            $stmt->bindParam(':opsalg', $opsalg);
            $stmt->bindParam(':prijs', $prijs);

            $stmt->execute();
            echo "Data inserted successfully.";
        } catch (PDOException $e) {
            echo "Error inserting data: " . $e->getMessage();
        }
    }
}

?>
