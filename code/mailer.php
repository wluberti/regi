<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once 'env.php';
require 'vendor/autoload.php';

function sendMail($to, $token) {
    global $env;

    $siteDomain = $env['SITE_DOMAIN'];
    $smtpHost = $env['SMTP_HOST'];
    $smtpUser = $env['SMTP_USERNAME'];
    $smtpPass = $env['SMTP_PASSWORD'];
    $subject = "Your login link";
    $link = "http://$siteDomain/authenticate.php?token=$token";
    $message = "Click to login: $link";

    if (isset($env['DEBUG']) && filter_var($env['DEBUG'], FILTER_VALIDATE_BOOLEAN)) {
        $logEntry = "[" . date('Y-m-d H:i:s') . "] To: $to | Subject: $subject | Message: $message\n";
        file_put_contents(__DIR__ . '/' . $env['EMAIL_LOG'], $logEntry, FILE_APPEND);
    }

    $mail = new PHPMailer(true);
    try {
        $mail->isSMTP();
        $mail->Host = $smtpHost;
        $mail->SMTPAuth = true;
        $mail->Username = $smtpUser;
        $mail->Password = $smtpPass;
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        $mail->setFrom($smtpUser);
        $mail->addAddress($to);
        $mail->Subject = $subject;
        $mail->Body    = $message;

        $mail->send();
    } catch (Exception $e) {
        error_log("Mailer Error: {$mail->ErrorInfo}");
    }
}
?>
