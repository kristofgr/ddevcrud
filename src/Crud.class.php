<?php
require_once('DB.class.php');

class Crud
{
    use DB;

    public $tableName;
    private $db;

    public function __construct($tableName)
    {
        $this->tableName = $tableName;
        $this->db = $this->connectToDB();
    }

    public function getAll(): array
    {
        $sql = "SELECT * FROM " . $this->tableName;
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getByID(int $id): bool|array
    {
        $sql = "SELECT * FROM " . $this->tableName . " WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function delete(int $id): bool
    {
        $sql = "DELETE FROM " . $this->tableName . " WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(['id' => $id]);
        // return true or false whether the record was deleted
        return $stmt->rowCount() > 0;
    }

    public function insert(array $data): int|bool
    {
        // $tableInfo = $this->getInfo($this->tableName);



        // print '<pre>';
        // print_r($tableInfo);
        // print_r($data);

        // exit;



        $sql = "INSERT INTO " . $this->tableName . " (name, price, instock) VALUES (:name, :price, :instock)";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([
            'name' => $data['name'],
            'price' => $data['price'],
            'instock' => $data['instock']
        ]);
        return TRUE; // $this->pdo->lastInsertId();
    }
}
