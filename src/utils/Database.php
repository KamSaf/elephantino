<?php
namespace Src\Utils;

use PDO;
use PDOException;

class Database
{
    const HOST = '172.17.0.4';
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
            echo 'Connection Error: ' . $e->getMessage();
        }

        return $conn;
    }
}
