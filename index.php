<?php
ob_start();
session_start();
if (isset($_POST['form1'])) {
    // $valid = 1;
    // if ($_REQUEST['name'] == '') {
    //     $valid = 0;
    //     echo 'Name can not empty<br>';
    // }
    // if ($_REQUEST['email'] == '') {
    //     $valid = 0;
    //     echo 'Email can not empty<br>';
    // } else {
    //     if (!filter_var($_REQUEST['email'], FILTER_VALIDATE_EMAIL)) {
    //         $valid = 0;
    //         echo 'Email must be valid';
    //     }
    // }
    // if($valid == 1){
    //    echo 'Successful';
    // }

    try {
        if ($_REQUEST['name'] == '') {
            throw new Exception("Name can not be empty");
        }
        if ($_REQUEST['email'] == '') {
            throw new Exception("Email can not be empty");
        }
        if (!filter_var($_REQUEST['email'], FILTER_VALIDATE_EMAIL)) {
            throw new Exception("Email must be valid");
        }

        $_SESSION['success_message'] = 'Successful';

        // unset($_REQUEST['name']);
        // unset($_REQUEST['email']);

        header('location: index.php');
        exit;

    } catch (Exception $e) {
        $error_message = $e->getMessage();
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    // if (isset($success_message)) {
    //     echo '<div style="color: green;">' . $success_message . '</div>';
    // }
    if (isset($error_message)) {
        echo '<div style="color: red;">' . $error_message . '</div>';
    }
    if(isset($_SESSION['success_message'])){
        echo '<div style="color: green;">' . $_SESSION['success_message'] . '</div>';
        unset($_SESSION['success_message']);
    }
    ?>
    <form action="" method="post">
        <table>
            <tr>
                <td>Name: </td>
                <td><input type="text" name="name" autocomplete="off" value="<?php if (isset($_REQUEST['name'])) echo $_REQUEST['name']; ?>"></td>
            </tr>
            <tr>
                <td>Email: </td>
                <td><input type="text" name="email" autocomplete="off" value="<?php if (isset($_REQUEST['email'])) echo $_REQUEST['email']; ?>"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="Submit" name="form1"></td>
            </tr>
        </table>
    </form>
</body>

</html>