<?php

class Database
{
    const HOST = '172.17.0.2';
    const DATABASE_NAME = 'rest_api';
    const USERNAME = 'php';
    const PASSWORD = 'password';

    public static function connect(): PDO | null
    {
        $conn = null;

        try {
            $host = Database::HOST;
            $dbName = Database::DATABASE_NAME;
            $conn = new PDO(
                "mysql:host={$host};dbname={$dbName}",
                Database::USERNAME,
                Database::PASSWORD,
            );
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            throw new Exception(message: "Cannot connect to database", code: 500);
        }

        return $conn;
    }
}
