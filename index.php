<?php
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'php_practice';

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    //Single Data
    // $sql = "INSERT INTO students (firstname, lastname, email, phone) VALUES ('Lai','Kiet','laiminhkiet07052002@gmail.com','0376707091')";
    // $conn->exec($sql);

    //Multiple Data
    // $conn->beginTransaction();
    // $conn->exec("INSERT INTO students (firstname, lastname, email, phone) VALUES ('Le','Phuc','hoangphuc270502@gmail.com','0793442309')");
    // $conn->exec("INSERT INTO students (firstname, lastname, email, phone) VALUES ('Le','Tuan','hoangtuan051102@gmail.com','0996527728')");
    // $conn->exec("INSERT INTO students (firstname, lastname, email, phone) VALUES ('Ngo','Thong','ngovinhthong070802@gmail.com','0355218146')");
    // $conn->commit();

    $sql = "INSERT INTO students (firstname, lastname, email, phone) VALUES ('Test','Data', 'testdata@gmail.com','0996541234')";
    $conn->exec($sql);
    $last_id = $conn->lastInsertId();
    echo $last_id;
    echo '<br>';
    echo 'Database is Created Successfully!';
} catch (PDOException $e) {
    echo 'Connection failed ' . $e->getMessage();
}
