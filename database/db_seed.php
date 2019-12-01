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

        (id, surname, firstname, phone, address)
    VALUES
        (1, 'Krasimir', 'Hristozov', 1, null),
        (2, 'Maria', 'Hristozova', 2, null),
        (3, 'Masha', 'Hristozova', 3, 'address'),
        (4, 'Jane', 'Smith', 2, null),
        (5, 'John', 'Smith', 3, null),
        (6, 'Richard', 'Smith', 4, 'address'),
        (7, 'Donna', 'Smith', 4, 'address'),
        (8, 'Josh', 'Harrelson', 3, null),
        (9, 'Anna', 'Harrelson', 7, 'address');
EOS;

try {
    $createTable = (new Database())->getConnection()->exec($statement);
    echo "Success!\n";
} catch (\PDOException $e) {
    exit($e->getMessage());
}