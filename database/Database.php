<?php
class Database
{

    private $dbConnection = null;

    public function __construct()
    {
        $host = 'localhost';
        $port = 3306;
        $db = 'PhoneBook';
        $user = 'root';
        $pass = 12345;

        try {
            $this->dbConnection = new \PDO(
                "mysql:host=$host;port=$port;charset=utf8mb4;dbname=$db",
                $user,
                $pass
            );

            echo "\n Connectede!";
        } catch (\PDOException $e) {
            exit($e->getMessage());
        }
    }

    public function getConnection()
    {
        return $this->dbConnection;
    }

}