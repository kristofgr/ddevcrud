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
}
