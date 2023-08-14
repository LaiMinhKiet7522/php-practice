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

$statement = $pdo->prepare("DELETE FROM students WHERE email = ?");
$statement->execute(['haha@gmail.com']);


//DELETE TABLE
// $statement = $pdo->prepare("DROP TABLE students");
// $statement->execute();


//DELETE ALL DATA
// $statement = $pdo->prepare("TRUNCATE TABLE students");
// $statement->execute();

// $statement = $pdo->prepare("DELETE FROM students");
// $statement->execute();


