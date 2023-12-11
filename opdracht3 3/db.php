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


    public function selectAll($id = null) {
        $stmt = $this->pdo->query("SELECT * FROM telefoons");
        $telefoons = $stmt->fetchAll();
        return $telefoons; 
    }

    public function insertData($merk, $model, $opsalg, $prijs) {
        try {
            $query = "INSERT INTO telefoons VALUES (null, :merk, :model, :opsalg, :prijs)";
            $stmt = $this->pdo->prepare($query);
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
    
    public function select($id= null){
        if($id){
            $stmt = $this->pdo->prepare("SELECT * FROM user WHERE is =?");
            $stmt->execute([$id]);
            $reseult = $stmt->fetch();
            return $reseult;
        }
        $stmt = $this->pdo->query("SELECT * FROM user");
        $reseult = $stmt->fetchAll();
        return $reseult;
    }
    
    public function editUser($merk, $model, $opslag, $prijs, $id ){
        $stmt = $this->pdo->prepare(" UPDATE telefoons Set merk = ?, model =?, opslag = ?, prijs= ? WHERE id = ?");
        $stmt->execute([$merk, $model, $opslag, $prijs, $id ]);
    }
    public function deleteTelefoon($id){
        $stmt = $this->pdo->prepare("DELETE from telefoons WHERE id = ?");
        $stmt->execute([$id]);

    }


}

?>
