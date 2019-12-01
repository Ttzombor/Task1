<?php
class User extends Model{
    public $db;
    public function __construct($database)
    {
        $this->db = $database;
    }
    public function getAll(){
        $statement = "
            SELECT 
                id, surname, firstname, phone, address
            FROM
                user;
                ";
        try{
            $statement = $this->db->query($statement);
            $result = $statement->fetchAll(\PDO::FETCH_ASSOC);
            return $result;
        }catch (\PDOException $e) {
            exit($e->getMessage());
        }
    }
    public function getById($id){
        $statement = "
            SELECT 
                id, firstname, lastname, firstparent_id, secondparent_id
            FROM
                user
            WHERE id = ?;
                ";
        try{
            $statement = $this->db->prepare($statement);
            $statement->execute($id);
            $result = $statement->fetchAll(\PDO::FETCH_ASSOC);
            return $result;
        }catch (\PDOException $e) {
            exit($e->getMessage());
        }
    }
    public function delete($id){
        $statement = "
            DELETE
            FROM
                user
            WHERE id = :id;
                ";
        try{
            $statement = $this->db->prepare($statement);
            $statement->execute($id);
            $result = $statement->fetchAll(\PDO::FETCH_ASSOC);
            return $result;
        }catch (\PDOException $e) {
            exit($e->getMessage());
        }
    }
}