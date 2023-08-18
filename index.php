<?php
$servername = 'localhost';
$dbname = 'php_practice';
$username = 'root';
$password = '';
try {
    $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Connecion Error ' . $e->getMessage();
}


//POST INJECTION
// if (isset($_POST['form1'])) {
//     $firstname = addslashes($_POST['firstname']);
//     $lastname = addslashes($_POST['lastname']);
//     $result = $pdo->prepare("SELECT * FROM students WHERE firstname='$firstname' AND lastname='$lastname'")->fetchAll(PDO::FETCH_ASSOC);
//     if ($result) {
//         echo $result[0]['firstname'] . '<br>';
//         echo $result[0]['lastname'] . '<br>';
//         echo 'Success! You are logged in!';
//     } else {
//         echo 'Error!';
//     }
// }

// <form action="" method="post">
//     <div>
//         <input type="text" name="firstname" placeholder="First name">
//     </div>
//     <div>
//         <input type="last name" name="lastname" placeholder="Last name">
//     </div>
//     <button type="submit" name="form1">Login</button>
// </form>


// GET INJECTION
    $id = (int)$_GET['id'];
    
    $result = $pdo->prepare("SELECT * FROM students WHERE id='$id' LIMIT 1")->fetchAll(PDO::FETCH_ASSOC);

    echo '<pre>';
    print_r($result);
    echo '</pre>';
    // if ($result) {
    //     echo $result[0]['firstname'] . '<br>';
    //     echo $result[0]['lastname'] . '<br>';
    // } else {
    //     echo 'Error!';
    // }

?>
