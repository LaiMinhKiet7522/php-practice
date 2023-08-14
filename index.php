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

$statement = $pdo->prepare("UPDATE students SET email = ? WHERE firstname = ?");
$statement->execute(['haha@gmail.com','Firstname1']);
