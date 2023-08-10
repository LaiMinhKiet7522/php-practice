<?php
// ----------MySQLi----------
// $servername = "localhost";
// $usrename = "root";
// $password = "";
// $dbname = "php_practice";

// //Create new connection
// $conn = new mysqli($servername, $usrename, $password, $dbname);
// //Check connection
// if($conn->connect_error){
//     die("Connect Failed: ".$conn->connect_error);
// }
// echo "Connected Successfully!";



// ----------PDO (PHP DATA OBJECT)----------
$servername = "localhost";
$usrename = "root";
$password = "";
$dbname = "php_practice";

// //Create new connection
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $usrename, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo 'Connected Successfully!';
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
$conn = null;
// echo "Connected Successfully!";