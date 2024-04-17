<?php

class Car
{
    private PDO $_conn;
    private string $_tableName = 'cars';

    public int $id;
    public string $make;
    public string $model;
    public string $color;
    public string $createDate;

    public function __construct(PDO $conn)
    {
        $this->_conn = $conn;
    }

    public function readAll()
    {
        string:
        $query = "SELECT * FROM {$this->_tableName};";

        $stmt = $this->_conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }
}
