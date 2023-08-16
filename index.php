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

//GROUP BY, HAVING
// $statement = $pdo->prepare("SELECT firstname, SUM(salary) as 'Total Paid'
//                             FROM studetns 
//                             GROUP BY name
//                             HAVING SUM(salary) > 100");


//GROUPBY WITH JOIN
// $statement = $pdo->prepare("SELECT emp.name, SUM(salary) as 'Total Paid', dep.department_name
//                             FROM employees emp
//                             INNER JOIN departments dep
//                             ON emp.department_id = dep.id
//                             GROUP BY emp.name, dep.department_name
//                             HAVING SUM(emp.salary) > 100
//                             ");
$statement->execute();
$result = $statement->fetchAll(PDO::FETCH_ASSOC);


echo '<pre>';
print_r ($result);
echo '</pre>';  


