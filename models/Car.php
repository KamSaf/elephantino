<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/config/Database.php';

class Car
{
    const TABLE_NAME = 'cars';
    private PDO $_conn;

    public int $id;
    public string $make;
    public string $model;
    public string $color;
    public string $createDate;

    public function __construct(PDO $conn)
    {
        $this->_conn = $conn;
    }

    public static function getAll(): array
    {
        $conn = Database::connect();
        $tbName = Car::TABLE_NAME;
        $query = "SELECT * FROM {$tbName};";

        $stmt = $conn->prepare($query);
        $stmt->execute();
        $objArr = [];

        if ($stmt->rowCount() > 0) {
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                array_push($objArr, $row);
            }
        }
        $stmt = null;
        $conn = null;

        return $objArr;
    }
}
