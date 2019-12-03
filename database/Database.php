<?php
class Database
{

    private $dbConnection = null;

    /**
     * Database constructor.
     */
    public function __construct()
    {
        $host = 'localhost';
        $port = 3306;
        $db = 'PhoneBook';
        $user = 'user';
        $pass = 12345;

        try {
            $this->dbConnection = new \PDO(
                "mysql:host=$host;port=$port;charset=utf8mb4;dbname=$db",
                $user,
                $pass
            );

        } catch (\PDOException $e) {
            exit($e->getMessage());
        }
    }

    /**
     *  Returning the connection with PDO
     * @return PDO|null
     */
    public function getConnection()
    {
        return $this->dbConnection;
    }

}