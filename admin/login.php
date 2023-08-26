<?php include "layout/top_all.php"; ?>

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

        $q = $pdo->prepare("SELECT * FROM admins WHERE email=?");
        $q->execute([$_POST['email']]);
        $total = $q->rowCount();
        if (!$total) {
            throw new Exception("Email is not found");
        } else {
            $result = $q->fetchAll(PDO::FETCH_ASSOC);
            foreach ($result as $row) {
                $password = $row['password'];
                if (!password_verify($_POST['password'], $password)) {
                    throw new Exception("Password does not match");
                }
            }
        }

        $_SESSION['admin'] = $row;

        header('location: ' . ADMIN_URL . 'index.php');
    } catch (Exception $e) {
        $error_message = $e->getMessage();
    }
}
?>

<div class="container-login">
    <main class="form-signin w-100 m-auto">
        <h1 class="text-center">Admin Login</h1>
        <?php
        if (isset($error_message)) {
            echo '<div class="error" style =" padding: 10px;
                background: #f7acac;
                color: #ae1717;
                font-weight: 700;
                margin-bottom: 15px;">';
            echo $error_message;
            echo '</div>';
        }
        if (isset($_REQUEST['msg'])) {
            if($_REQUEST['msg'] == 'success'){
                echo '<div class="success" style="padding: 20px;
                background: #c5f8c5;
                color: #115e15;
                font-weight: 700;
                margin-bottom: 15px;">';
                            echo 'Password reset is successful. You can now login with your new password';
                            echo '</div>';
            }
        }
        ?>
        <form action="" method="post">
            <div class="form-floating">
                <input type="text" name="email" class="form-control" id="floatingInput" placeholder="name@example.com" autocomplete="off">
                <label for="floatingInput">Email address</label>
            </div>
            <div class="form-floating">
                <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password" autocomplete="off">
                <label for="floatingPassword">Password</label>
            </div>
            <button class="w-100 btn btn-lg btn-primary" type="submit" name="form1">Login</button>
        </form>
        <div class="login-forget-password">
            <a href="<?php echo ADMIN_URL; ?>forget-password.php">Forget Password</a>
        </div>
    </main>
</div>

<?php include "layout/footer.php"; ?>