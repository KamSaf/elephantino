<?php
class Database
{
    private string $_host = 'localhost';
    private string $_dbName = 'restApi';
    private string $_username = 'root';
    private string $_password = 'password';
    private PDO $_conn;

    public function connect(): PDO
    {
        $this->_conn = null;

        try {
            $this->_conn = new PDO(
                "mysql:host={$this->_host};dbname={$this->_dbName}",
                $this->_username,
                $this->_password
            );
            $this->_conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo 'Connection Error: ' . $e->getMessage();
        }

        return $this->_conn;
    }
}
