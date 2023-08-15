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

// $statement = $pdo->prepare("SELECT * FROM students ORDER BY ID DESC LIMIT 2 OFFSET 2");
// $statement->execute();
// $result = $statement->fetchAll(PDO::FETCH_ASSOC);


// Offset: 3, Limit: 2
$statement = $pdo->prepare("SELECT * FROM students ORDER BY ID DESC LIMIT 3,2");
$statement->execute();
$result = $statement->fetchAll(PDO::FETCH_ASSOC);

echo '<pre>';
print_r ($result);
echo '</pre>';


