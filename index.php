<?php
$servername = 'localhost';
$dbname = 'php_practice';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection Error " . $e->getMessage();
}


// $statement = $pdo->prepare("ALTER TABLE students
//                             ADD age INT NULL");


// DROP COLUMN
// $statement = $pdo->prepare("ALTER TABLE students
//                             DROP COLUMN age");


// RENAME COLUMN
// $statement = $pdo->prepare("ALTER TABLE students 
//                             RENAME COLUMN firstname to first_name");



// MODIFY COLUMN
// $statement = $pdo->prepare("ALTER TABLE students 
//                             MODIFY COLUMN city_id text");


$statement->execute();
$result = $statement->fetchAll(PDO::FETCH_ASSOC);


echo '<pre>';
print_r ($result);
echo '</pre>';  


