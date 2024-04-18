<?php

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

    public static function getAll(PDO $conn): array
    {
        $query = "SELECT * FROM {Car::TABLE_NAME};";

        $stmt = $conn->prepare($query);
        $stmt->execute();

        $objArr = [];

        if ($stmt->rowCount() > 0) {
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                array_push($objArr, $row);
            }
        }

        return array();
    }
}


// $query = 'SELECT * FROM cars';

// $stmt = $conn->prepare($query);
// $stmt->execute();

// if ($stmt->rowCount() > 0) {
//     while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
//         var_dump($row);
//     }
// } else {
//     echo 'no record to display';
// }
