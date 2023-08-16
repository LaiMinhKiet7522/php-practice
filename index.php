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


$statement = $pdo->prepare("SELECT firstname, lastname
                            FROM students
                            WHERE lastname = ?
                            
                            UNION
                            
                            SELECT firstname, lastname
                            FROM students
                            WHERE lastname = ?");
$statement->execute(['Kiet','Phuc']);
$result = $statement->fetchAll(PDO::FETCH_ASSOC);


echo '<pre>';
print_r ($result);
echo '</pre>';  


