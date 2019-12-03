# Creating a PhoneBook.
Created PhoneBook by myself including MVC structure and Databases.
Hope this is not the way you create the MVC projects, but it's works and it's cool!
## Configure the application 
Create database and user.
```
mysql -uroot -p
CREATE DATABASE PhoneBook CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
CREATE USER 'user'@'localhost' identified by '12345';
GRANT ALL on PhoneBook.* to 'user'@'localhost';
quit
```
Run db_seeder to fill the database:
```
cd database
php db_seed.php
```
Start the PHP server:
```
php -S localhost:8000
```
## Help
Please post any questions as comments on Git. Or you also can email to ttzombor@gmail.com.
