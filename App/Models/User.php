<?php
class User extends Model
{
    public $db;

    /**
     * User's gateway to Database.
     * Should use this gateway as addition file called Repository.
     * User constructor.
     * @param $database
     */
    public function __construct($database)
    {
        $this->db = $database;
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    }

    /**
     * Get all data from Database
     * @return mixed
     */

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

    /**
     * Get One Array from Database
     * @param $id
     * @return mixed
     */
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

    /**
     * Creating User with $request data's
     * @param $request
     */
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

    /**
     * Updating edited user.
     * @param $request
     * @param $id
     * @return mixed
     */
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
    /**
     * Deleting User from Database
     * @param $id
     */
    public function delete($id){
        $statement = "
            DELETE
            FROM
                user
            WHERE id = :id
                ";
        try{
            $statement = $this->db->prepare($statement);
            $statement->execute(array('id' => $id));
        }catch (\PDOException $e) {
            exit($e->getMessage());
        }
    }

    /**
     * Ordering By ASC
     *
     * @param $request
     * @return mixed
     */
    public function orderBy($request){
        $statement = "
            SELECT 
                id, surname, firstname, phone, address
            FROM
                user
            ORDER BY ".$request['orderBy']." ASC
                ";
        try{
            $statement = $this->db->prepare($statement);
            $statement->execute();
            $result = $statement->fetchAll(\PDO::FETCH_ASSOC);
            return $result;
        }catch (\PDOException $e) {
            exit($e->getMessage());
        }
    }

    /**
     * Searching for request in database
     * @param $request
     * @return mixed
     */
    public function find($request)
    {
        $statement = "SELECT 
                id, surname, firstname, phone, address
            FROM
                user 
            WHERE    surname LIKE :query OR
                     firstname LIKE :query OR
                     phone LIKE :query OR
                     address LIKE :query
    ";

             $statement = $this->db->prepare($statement);
             $statement->execute(array('query' => $request['name']));

             if (!$statement->rowCount() == 0) {
                 $results = $statement->fetchAll(\PDO::FETCH_ASSOC);
                 return $results;

             }
             else {
                 echo "<script type=\"text/javascript\">
              alert(\"Nothing found.\");
              window.location = \"/\"
              </script>";
             }
         }


    /**
     * Importing File to Database
     * @param $request
     */
    public function saveFile($request)
    {
        $filename = $request["file"]["tmp_name"];
        $temp = explode('.', $request['file']['name']);
        $extn = strtolower(end($temp));

        if (($extn == "csv") || ($extn == "xlsx")) {
            if ($request["file"]["size"] > 0) {
                $file = fopen($filename, "r");
                while (($getData = fgetcsv($file, 10000, ",")) !== FALSE) {
                    $statement = "INSERT INTO user
                 (surname, firstname, phone, address)
                 VALUES
                (:surname, :firstname, :phone, :address)";

                    $statement = $this->db->prepare($statement);
                    $statement->execute(array(
                        'surname' => $getData[0],
                        'firstname' => $getData[1],
                        'phone' => $getData[2] ?? null,
                        'address' => $getData[3] ?? null,
                    ));
                }
                echo "<script type=\"text/javascript\">
                alert(\"CSV File has been successfully Imported.\");
                window.location = \"filemanager\"
                 </script>";

                fclose($file);
            }
        }
        else {
                echo "<script type=\"text/javascript\">
              alert(\"Invalid File:Please Upload CSV or Excel File.\");
              window.location = \"filemanager\"
              </script>";
            }
        }

    /**
     * Exporting CSV type file of Database
     */
    public function exportFile()
    {
        header('Content-Type: text/csv; charset=utf-8');
        header('Content-Disposition: attachment; filename=data.csv');
        $output = fopen("php://output", "w");
        fputcsv($output, array('ID', 'Surname', 'First Name', 'Phone', 'Address'));

        $statement = "
            SELECT 
                id, surname, firstname, phone, address
            FROM
                user;
                ";
        $result = $this->db->prepare($statement);
        $result->execute();

        while($row = $result->fetch(PDO::FETCH_ASSOC)){
            fputcsv($output, $row);
        }

        fclose($output);
    }



}