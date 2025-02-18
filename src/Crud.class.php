<?php


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
    public function getById(int $id): array|bool
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
        return $stmt->rowCount() > 0;
    }
    public function create(String $name, float $price, int $instock): int|bool
    {
        $sql = "INSERT INTO " . $this->tableName . " (name, price, instock) VALUES (:name, :price, :instock)";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([
            'name' => $name,
            'price' => $price,
            'instock' => $instock
        ]);


        return $this->db->lastInsertId();
    }
}
