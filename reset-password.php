<?php
include_once('header.php');
?>
<?php
$statement = $pdo->prepare("SELECT * FROM users WHERE email=? AND token=?");
$statement->execute([$_REQUEST['email'], $_REQUEST['token']]);
$total = $statement->rowCount();
if (!$total) {
    header('location: ' . BASE_URL);
    exit;
}
?>
<?php
if (isset($_POST['form1'])) {
    try {
        if (isset($_POST['password']) == '' || isset($_POST['retype_password']) == '') {
            throw new Exception('Password can not be empty');
        }
        if (isset($_POST['password']) != isset($_POST['retype_password'])) {
            throw new Exception('Passwords must match');
        }
        $password = password_hash($_REQUEST['password'], PASSWORD_DEFAULT);

        $q = $pdo->prepare("UPDATE users SET token=?,password=? WHERE email=? AND token=?");
        $q->execute(['', $password, $_REQUEST['email'], $_REQUEST['token']]);

        header('location: ' . BASE_URL . 'login.php');
    } catch (Exception $e) {
        $error_message = $e->getMessage();
    }
}
?>
<h2 class="mb_10">Forget Password</h2>
<?php
if (isset($error_message)) {
    echo '<div class="error" style =" padding: 10px;
    background: #f7acac;
    color: #ae1717;
    font-weight: 700;">';
    echo $error_message;
    echo '</div>';
}
if (isset($success_message)) {
    echo '<div class="success" style="padding: 20px;
    background: #c5f8c5;
    color: #115e15;
    font-weight: 700;">';
    echo $success_message;
    echo '</div>';
}
?>
<form action="" method="post">
    <table class="t2">
        <tr>
            <td>New Password</td>
            <td><input type="password" name="password" autocomplete="off"></td>
        </tr>
        <tr>
            <td>Retype Password</td>
            <td><input type="password" name="retype_password" autocomplete="off"></td>
        </tr>
        <tr>
            <td></td>
            <td>
                <input type="submit" value="Submit" name="form1">
            </td>
        </tr>
    </table>
</form>
<?php
include_once('footer.php');
?>