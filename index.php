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

// $q = $pdo->prepare("SELECT * FROM students");
// $q = $pdo->prepare("SELECT email,firstname,lastname FROM students");
// $q->execute();
// $result = $q->fetchAll(PDO::FETCH_ASSOC);
// $result = $q->fetchAll(PDO::FETCH_NUM);
// $result = $q->fetchAll(PDO::FETCH_COLUMN);
// $result = $q->fetchAll(PDO::FETCH_GROUP);
// $result = $q->fetchAll(PDO::FETCH_GROUP|PDO::FETCH_COLUMN);
// $result = $q->fetchAll(PDO::FETCH_BOTH);
// echo '<pre>';
// print_r($result);
// echo '</pre>';

// echo '<table>';
// echo '<tr><th>ID</th> <th>First name</th> <th>Last name</th> <th>Email</th> <th>Phone</th></th></tr>';
// foreach ($result as $row) {
//     echo '<tr>';
//     echo '<td>' . $row['id'] . '</td>';
//     echo '<td>' . $row['firstname'] . '</td>';
//     echo '<td>' . $row['lastname'] . '</td>';
//     echo '<td>' . $row['email'] . '</td>';
//     echo '<td>' . $row['phone'] . '</td>';
//     echo '</tr>';
// }
// echo '</table>';


echo '-----------------------------DISTINCT-----------------------------';
$statement = $pdo->prepare("SELECT distinct(firstname) FROM students");
$statement->execute();
$result = $statement->fetchAll(PDO::FETCH_ASSOC);
echo '<pre>';
print_r($result);
echo '</pre>';



echo '-----------------------------MAX-----------------------------';
$statement = $pdo->prepare("SELECT max(id) as 'Id Max' FROM students");
$statement->execute();
$result = $statement->fetchAll(PDO::FETCH_ASSOC);
echo '<pre>';
print_r($result);
echo '</pre>';



echo '-----------------------------COUNT-----------------------------';
$statement = $pdo->prepare("SELECT count(id) as 'Total' FROM students");
$statement->execute();
$result = $statement->fetchAll(PDO::FETCH_ASSOC);
echo '<pre>';
print_r($result);
echo '</pre>';



echo '-----------------------------SUM-----------------------------';
$statement = $pdo->prepare("SELECT sum(id) as 'Sum' FROM students");
$statement->execute();
$result = $statement->fetchAll(PDO::FETCH_ASSOC);
echo '<pre>';
print_r($result);
echo '</pre>';



echo '-----------------------------AVERAGE-----------------------------';
$statement = $pdo->prepare("SELECT avg(id) as 'Average' FROM students WHERE firstname = ?");
$statement->execute(['Firstname1']);
$result = $statement->fetchAll(PDO::FETCH_ASSOC);
echo '<pre>';
print_r($result);
echo '</pre>';