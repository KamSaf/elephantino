<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/src/utils/Database.php';


/**
 * Model class representing cars table in the database
 */
class Car
{
    const TABLE_NAME = 'cars';
    private PDO $_conn;
    private int $_id;
    private string $_make;
    private string $_model;
    private string $_color;
    private string $_createDate;

    public function getId(): int
    {
        return $this->_id;
    }

    public function setId(int $id)
    {
        $this->_id = $id;
    }

    public function getMake(): string
    {
        return $this->_make;
    }

    public function setMake(string $make)
    {
        $this->_make = $make;
    }

    public function getModel(): string
    {
        return $this->_model;
    }

    public function setModel(string $model)
    {
        $this->_model = $model;
    }

    public function getColor(): string
    {
        return $this->_color;
    }

    public function setColor(string $color)
    {
        $this->_color = $color;
    }

    public function getCreateDate(): Datetime
    {
        $datetime = new DateTime(datetime: $this->_createDate);
        return $datetime;
    }


    /**
     * Constructor, where database connection of an object is created
     */
    public function __construct()
    {
        $this->_conn = Database::connect();
    }

    /**
     * Function closing objects database connection
     */
    public function closeConn()
    {
        $this->_conn = null;
    }

    /**
     * Function returning objects data as associative array
     */
    public function getData(): array
    {
        return array();
    }

    /**
     * Work in progress
     */
    public static function getAll(): array
    {
        $conn = Database::connect();
        $tableName = Car::TABLE_NAME;
        $query = "SELECT * FROM {$tableName};";

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
