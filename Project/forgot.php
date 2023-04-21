<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; // Make sure to include the PHPMailer autoload file

// Create a new PHPMailer instance
$mail = new \PHPMailer\PHPMailer\PHPMailer(true);


try {
    //Server settings
   $phpmailer = new PHPMailer();
$phpmailer->isSMTP();
$phpmailer->Host = 'sandbox.smtp.mailtrap.io';
$phpmailer->SMTPAuth = true;
$phpmailer->Port = 2525;
$phpmailer->Username = 'ef5296705bc4c3';
$phpmailer->Password = '27e624e937b64e';

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Reset Password';
    $mail->Body    = "Hello " . $user["name"] . ",<br><br>You have requested to reset your password. Please click on the following link to reset your password:<br><br><a href='http://example.com/reset_password.php?email=" . urlencode($email) . "&reset_token=" . urlencode($token) . "'>Reset Password</a><br><br>If you did not request this reset, please ignore this email.<br><br>Thank you,<br>Your Perfume StockX";
    $mail->AltBody = "Hello " . $user["name"] . ",\r\n\r\nYou have requested to reset your password. Please copy and paste the following link in your browser to reset your password:\r\n\r\nhttp://example.com/reset_password.php?email=" . urlencode($email) . "&reset_token=" . urlencode($token) . "\r\n\r\nIf you did not request this reset, please ignore this email.\r\n\r\nThank you,\r\nYour Perfume StockX";

    $mail->send();
    $_SESSION["forgot_password_success"] = "An email with instructions to reset your password has been sent to your email address.";
} catch (Exception $e) {
    $_SESSION["forgot_password_error"] = "Error sending email. Please try again later.";
}
?>