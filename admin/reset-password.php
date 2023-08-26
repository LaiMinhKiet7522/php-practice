<?php
include_once("layout/top_all.php");
?>
<?php
$statement = $pdo->prepare("SELECT * FROM admins WHERE email=? AND token=?");
$statement->execute([$_REQUEST['email'], $_REQUEST['token']]);
$total = $statement->rowCount();
if (!$total) {
    header('location: ' . ADMIN_URL.'login.php');   
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

        $q = $pdo->prepare("UPDATE admins SET token=?,password=? WHERE email=? AND token=?");
        $q->execute(['', $password, $_REQUEST['email'], $_REQUEST['token']]);

        header('location: ' . ADMIN_URL . 'login.php?msg=success');
    } catch (Exception $e) {
        $error_message = $e->getMessage();
    }
}
?>
<div class="container-login">
    <main class="form-signin w-100 m-auto">
        <form action="" method="post">
            <h1 class="text-center">Reset Password</h1>
            <?php
            if (isset($error_message)) {
                echo '<div class="error" style =" padding: 10px;
    background: #f7acac;
    color: #ae1717;
    font-weight: 700;
    margin-bottom: 10px;">';
                echo $error_message;
                echo '</div>';
            }
            ?>
            <div class="form-floating">
                <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password" autocomplete="off">
                <label for="floatingPassword">Password</label>
            </div>
            <div class="form-floating">
                <input type="password" name="retype_password" class="form-control" id="floatingPassword" placeholder="Retype Password" autocomplete="off">
                <label for="floatingPassword">Retype Password</label>
            </div>

            <button class="w-100 btn btn-lg btn-primary" type="submit" name="form1">Submit</button>
        </form>
    </main>
</div>

<?php
include_once("layout/footer.php");
?>