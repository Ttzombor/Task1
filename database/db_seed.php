<?php
require_once 'Database.php';

$statement = "
    CREATE TABLE IF NOT EXISTS user (
        id INT NOT NULL AUTO_INCREMENT,
        surname VARCHAR(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
        firstname VARCHAR(100)CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
        phone VARCHAR(100)CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
        address VARCHAR(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
        PRIMARY KEY (id)
    ) ENGINE=INNODB;

    INSERT INTO user

        (surname, firstname, phone, address)
    VALUES
        ( 'Tibor', 'Heroy', '+38066091202', 'address'),
        ( 'Tibor', 'Gero', '+38066000202', 'address_1'),
        ( 'Masha', 'Hristozova', '+38066000202', 'address'),
        ( 'Jane', 'Smith', '+38066091302', null),
        ( 'John', 'Smith', '+38066091303', null),
        ( 'Richard', 'Smith', '+38066091003', 'address_3'),
        ( 'Donna', 'Smith', '+38066091000', 'address_3'),
        ( 'Josh', 'Harrelson', '+38063091003', 'address_4'),
        ( 'Anna', 'Harrelson', '+38063091003', 'address_4');
";

try {
    $createTable = (new Database())->getConnection()->exec($statement);
    echo "Success!\n";
} catch (\PDOException $e) {
    exit($e->getMessage());
}