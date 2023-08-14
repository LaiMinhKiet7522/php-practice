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

$statement = $pdo->prepare("SELECT * FROM students WHERE firstname = ?");
$statement->execute(['Firstname1']);
$result = $statement->fetchAll(PDO::FETCH_ASSOC);
echo '<pre>';
print_r($result);
echo '</pre>';



$statement = $pdo->prepare("SELECT * FROM students WHERE lastname LIKE ?");
$statement->execute(['%name%']);
$result = $statement->fetchAll(PDO::FETCH_ASSOC);
echo '<pre>';
print_r($result);
echo '</pre>';



$statement = $pdo->prepare("SELECT * FROM students WHERE lastname IN (?,?)");
$statement->execute(['Lastname1','Kiet']);
$result = $statement->fetchAll(PDO::FETCH_ASSOC);
echo '<pre>';
print_r($result);
echo '</pre>';



// $statement = $pdo->prepare("SELECT firstname, email, city FROM students WHERE city IN ( SELECT institute_city FROM institutes)");
// $statement->execute();
// $result = $statement->fetchAll(PDO::FETCH_ASSOC);
// echo '<pre>';
// print_r($result);
// echo '</pre>';