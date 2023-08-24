<?php 
$servername = 'localhost';
$dbname = 'admin_panel_php';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host={$servername};dbname={$dbname}",$username,$password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Connection error: '.$e->getMessage();
}
define("BASE_URL","http://localhost/php_practice/");
define("ADMIN_URL",BASE_URL."admin/");