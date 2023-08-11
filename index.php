<?php
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'php_practice';

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // //Way 1
    // $statement = $conn->prepare("INSERT INTO students (firstname, lastname, email, phone) VALUES (:firstname,:lastname, :email, :phone)");
    // $statement->bindParam(':firstname', $firstname);
    // $statement->bindParam(':lastname', $lastname);
    // $statement->bindParam(':email', $email);
    // $statement->bindParam(':phone', $phone);

    // $firstname = 'John';
    // $lastname = 'Smith';
    // $email = 'johnsmith@gmail.com';
    // $phone = '123-456-789';
    // $statement->execute();
    // echo 'Database is Created Successfully!';


    //Way 2
    $statement = $conn->prepare("INSERT INTO students (firstname, lastname, email, phone) VALUES (?,?,?,?)");
    $statement->execute(['Firstname1','Lastname1','name1@gmail.com','999-8787-123']);
    echo 'Database is Created Successfully!';
} catch (PDOException $e) {
    echo 'Connection failed ' . $e->getMessage();
}
