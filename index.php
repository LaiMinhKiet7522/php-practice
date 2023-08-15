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


$statement = $pdo->prepare("SELECT s.firstname, c.city_name
                            FROM students s
                            INNER JOIN cities c
                            ON s.city_id = c.city_id
                            WHERE c.city_name = ?");
$statement->execute(['HCM']);
$result = $statement->fetchAll(PDO::FETCH_ASSOC);


//LEFT JOIN
// $statement = $conn->prepare("SELECT
//                             s.id as sid,
//                             s.department_id,
//                             s.firstname,
//                             s.lastname,
//                             s.email,
//                             s.age,
//                             s.city,
//                             d.id as did,
//                             d.name as dname
//                             FROM students s
//                             LEFT JOIN departments d
//                             ON s.department_id = d.id");

// $statement->execute();
// $result = $statement->fetchAll(PDO::FETCH_ASSOC);



//RIGHT JOIN
// $statement = $conn->prepare("SELECT
//                             s.id as sid,
//                             s.department_id,
//                             s.firstname,
//                             s.lastname,
//                             s.email,
//                             s.age,
//                             s.city,
//                             d.id as did,
//                             d.name as dname
//                             FROM students s
//                             RIGHT JOIN departments d
//                             ON s.department_id = d.id");

// $statement->execute();
// $result = $statement->fetchAll(PDO::FETCH_ASSOC);



//FULL JOIN
// $statement = $conn->prepare("SELECT
//                             s.id as sid,
//                             s.department_id,
//                             s.firstname,
//                             s.lastname,
//                             s.email,
//                             s.age,
//                             s.city,
//                             d.id as did,
//                             d.name as dname
//                             FROM students s
//                             LEFT JOIN departments d
//                             ON s.department_id = d.id
                            
//                             UNION

//                             SELECT
//                             s.id as sid,
//                             s.department_id,
//                             s.firstname,
//                             s.lastname,
//                             s.email,
//                             s.age,
//                             s.city,
//                             d.id as did,
//                             d.name as dname
//                             FROM students s
//                             RIGHT JOIN departments d
//                             ON s.department_id = d.id
//                             ");

// $statement->execute();
// $result = $statement->fetchAll(PDO::FETCH_ASSOC);



echo '<pre>';
print_r ($result);
echo '</pre>';  


