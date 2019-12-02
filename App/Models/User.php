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
                 id, surname, firstname, phone, address
            FROM
                user
            WHERE id = ?;
                ";
        try{
            $statement = $this->db->prepare($statement);
            $statement->execute(array($id));
            $result = $statement->fetchAll(\PDO::FETCH_ASSOC);
            /*print_r($result);*/
            return $result;
        }catch (\PDOException $e) {
            exit($e->getMessage());
        }
    }

    public function create($request){
        $statement = "
            INSERT INTO user
                 (surname, firstname, phone, address)
                 VALUES
                (:surname, :firstname, :phone, :address)
        ";

        try {
            $statement = $this->db->prepare($statement);
            $statement->execute(array(
                'surname' => $request['surname'],
                'firstname' => $request['firstname'],
                'phone' => $request['phone'] ?? null,
                'address' => $request['address'] ?? null,
            ));
            echo "Succsesfuly saved";
        } catch (\PDOException $e) {
            exit($e->getMessage());
        }
    }

    public function update($request, $id){
        $statement = "
            UPDATE user
                SET
                    surname = :surname,
                    firstname = :firstname, 
                    phone = :phone, 
                    address = :address
                WHERE id = :id;
                ";
        try{
            $statement = $this->db->prepare($statement);
            $statement->execute(array(
                'id' => (int) $id,
                'surname' => $request['surname'],
                'firstname' => $request['firstname'],
                'phone' => $request['phone'] ?? null,
                'address' => $request['address'] ?? null,

            ));
            print_r($statement->rowCount());
            return $statement->rowCount();
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
            $statement->execute(array('id' => $id));
            $result = $statement->fetchAll(\PDO::FETCH_ASSOC);
            return $result;
        }catch (\PDOException $e) {
            exit($e->getMessage());
        }
    }
}