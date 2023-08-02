<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

$mail = new PHPMailer(true);

try {	
    $mail->isSMTP();
    $mail->Host = 'sandbox.smtp.mailtrap.io';
    $mail->SMTPAuth = true;
    $mail->Username = '2838dfb11cf478';
    $mail->Password = '6ff83a6c6e0a83';
    $mail->SMTPSecure = 'tls';
    $mail->Port = 2525;

    $mail->setFrom('contact@example.com');
    $mail->addAddress('laiminhkiet07052002@gmail.com');
    $mail->addReplyTo('contact@example.com');
    $mail->addCC('cc@example.com');
    $mail->addBCC('bcc@example.com');
    
    $mail->addAttachment('uploads/person.jpg', 'person.jpg');

    $mail->isHTML(true);
    $mail->Subject = 'TEST SUBJECT';
    $mail->Body = 'TEST BODY FOR EMAIL';

    $mail->send();

	echo 'Message has been sent';
} catch (Exception $e) {
	echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

