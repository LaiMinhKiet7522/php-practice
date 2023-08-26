<?php
include_once("layout/top_all.php");
?>
<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
?>
<?php
if (isset($_POST['form1'])) {
    try {
        if ($_POST['email'] == '') {
            throw new Exception('Email can not be empty');
        }
        if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            throw new Exception('Email is in valid');
        }
        $q = $pdo->prepare("SELECT * FROM admins WHERE email=?");
        $q->execute([$_POST['email']]);
        $total = $q->rowCount();
        if (!$total) {
            throw new Exception('Email is not found');
        }
        $token = time();

        $statement = $pdo->prepare("UPDATE admins SET token=? WHERE email=?");
        $statement->execute([$token, $_POST['email']]);

        $link = ADMIN_URL . 'reset-password.php?email=' . $_POST['email'] . '&token=' . $token;
        $email_message = 'Please click on this link to reset your password: <br>';
        $email_message .= '<a href="' . $link . '">';
        $email_message .= 'Click Here';
        $email_message .= '</a>';

        $mail = new PHPMailer(true);
        try {
            $mail->isSMTP();
            $mail->Host = 'smtp.mailtrap.io';
            $mail->SMTPAuth = true;
            $mail->Username = '2838dfb11cf478';
            $mail->Password = '6ff83a6c6e0a83';
            $mail->SMTPSecure = 'tls';
            $mail->Port = 2525;

            $mail->setFrom('contact@example.com');
            $mail->addAddress($_POST['email']);
            $mail->addReplyTo('contact@example.com');
            $mail->isHTML(true);
            $mail->Subject = 'Reset Password';
            $mail->Body = $email_message;
            $mail->send();

            $success_message = 'Please check you email and follow the steps';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    } catch (Exception $e) {
        $error_message = $e->getMessage();
    }
}
?>
<div class="container-login">
    <main class="form-signin w-100 m-auto">
        <form action="" method="post">
            <h1 class="text-center">Forget Password</h1>
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
            if (isset($success_message)) {
                echo '<div class="success" style="padding: 20px;
    background: #c5f8c5;
    color: #115e15;
    font-weight: 700;
    margin-bottom: 10px;">';
                echo $success_message;
                echo '</div>';
            }
            ?>
            <div class="form-floating">
                <input type="text" class="form-control" id="floatingInput" placeholder="name@example.com" name="email" autocomplete="off">
                <label for="floatingInput">Email address</label>
            </div>

            <button class="w-100 btn btn-lg btn-primary" type="submit" name="form1">Submit</button>
        </form>
        <div class="login-forget-password">
            <a href="<?php echo ADMIN_URL; ?>login.php">Back to Login Page</a>
        </div>
    </main>
</div>

<?php
include_once("layout/footer.php");
?>