<?php
include_once('header.php');
?>

<?php
if (isset($_POST['form1'])) {
    try {
        if ($_POST['email'] == '') {
            throw new Exception("Email can not be empty");
        }
        if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            throw new Exception("Email is invalid");
        }
        if ($_POST['password'] == '') {
            throw new Exception("Password can not be empty");
        }
        $q = $pdo->prepare("SELECT * FROM users WHERE email=?");
        $q->execute([$_POST['email']]);
        $total = $q->rowCount();
        if (!$total) {
            throw new Exception('Email is not found');
        } else {
            $result = $q->fetchAll(PDO::FETCH_ASSOC);
            foreach ($result as $row) {
                $password = $row['password'];
                if (!password_verify($_POST['password'], $password)) {
                    throw new Exception('Password does not match');
                }
            }
        }
        $_SESSION['user'] = $row;
        header('location: ' . BASE_URL . 'dashboard.php');
    } catch (Exception $e) {
        $error_message = $e->getMessage();
    }
}
?>
<h2 class="mb_10">Login</h2>
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
            <td>Email</td>
            <td><input type="text" name="email" autocomplete="off"></td>
        </tr>
        <tr>
            <td>Password</td>
            <td><input type="password" name="password" autocomplete="off"></td>
        </tr>
        <tr>
            <td></td>
            <td>
                <input type="submit" value="Login" name="form1">
                <a href="forget-password.php" class="primary_color">Forget Password</a>
            </td>
        </tr>
    </table>
</form>
<?php
include_once('footer.php');
?>