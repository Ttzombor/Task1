<?php
require_once 'Database.php';

$statement = <<<EOS
    CREATE TABLE IF NOT EXISTS user (
        id INT NOT NULL AUTO_INCREMENT,
        surname VARCHAR(100) NOT NULL,
        firstname VARCHAR(100) NOT NULL,
        phone INT NOT NULL,
        address VARCHAR(100) NULL,
        PRIMARY KEY (id)
    ) ENGINE=INNODB;

    INSERT INTO user

        (surname, firstname, phone, address)
    VALUES
        ( 'Krasimir', 'Hristozov', 1, null),
        ( 'Maria', 'Hristozova', 2, null),
        ( 'Masha', 'Hristozova', 3, 'address'),
        ( 'Jane', 'Smith', 2, null),
        ( 'John', 'Smith', 3, null),
        ( 'Richard', 'Smith', 4, 'address'),
        ( 'Donna', 'Smith', 4, 'address'),
        ( 'Josh', 'Harrelson', 3, null),
        ( 'Anna', 'Harrelson', 7, 'address');
EOS;

try {
    $createTable = (new Database())->getConnection()->exec($statement);
    echo "Success!\n";
} catch (\PDOException $e) {
    exit($e->getMessage());
}