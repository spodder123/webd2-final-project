<?php
// Start session
session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';
require_once 'connect.php';
$phpmailer = new PHPMailer();
$user = null;
$email = null;
$token = null;
$phpmailer->SMTPDebug = 4;
$phpmailer->Debugoutput = 'error_log';


// Check if form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST") {

    // Get email input
    $email = trim($_POST["email"]);

    // Check if email exists in database
    $stmt = $db->prepare("SELECT id, name, email FROM users WHERE email = :email");
    $stmt->bindParam(":email", $email, PDO::PARAM_STR);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    if($user === false) {
        $_SESSION["forgot_password_error"] = "Email not found in database.";
        header("location: forgot.php");
        exit();
    }
    $email = $user["email"];
    $token = bin2hex(random_bytes(32));

    // Set the token and expiry date in the database
    $sql = "UPDATE users SET reset_token=?, reset_token_expiry=DATE_ADD(NOW(), INTERVAL 1 HOUR) WHERE email=?";
    $query = $db->prepare($sql);
    $query->execute([$token, $email]);

    // Send email with reset link
    $phpmailer->isSMTP();
    $phpmailer->Host = 'sandbox.smtp.mailtrap.io';
    $phpmailer->SMTPAuth = true;
    $phpmailer->Port = 2525;
    $phpmailer->Username = 'ef5296705bc4c3';
    $phpmailer->Password = '27e624e937b64e';

    

$to = $email;
$subject = "Reset Password";
$message = "Hello " . $user["name"] . ",\r\n\r\n";
$message .= "You have requested to reset your password. Please click on the following link to reset your password:\r\n\r\n";
$message .= "http://example.com/reset_password.php?email=" . urlencode($email) . "&reset_token=" . urlencode($token) . "\r\n\r\n";
$message .= "If you did not request this reset, please ignore this email.\r\n\r\n";
$message .= "Thank you,\r\n";
$message .= "Your Perfume StockX";

$phpmailer->setFrom('noreply@example.com', 'Your Website');
$phpmailer->addAddress($to);
$phpmailer->Subject = $subject;
$phpmailer->Body = $message;
$phpmailer->AltBody = strip_tags($message); // plain text version of the email content

if($phpmailer->send()) {
    $_SESSION["forgot_password_success"] = "An email with instructions to reset your password has been sent to your email address.";
} else {
    $_SESSION["forgot_password_error"] = "Error sending email. Please try again later.";
}


  
    header("location: login.php");
    exit();

}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Forgot Password</title>
</head>
<body>
    <h1>Forgot Password</h1>
    <?php
    // Check for error/success message and display if exists
    if(isset($_SESSION["forgot_password_error"])) {
        echo '<p style="color: red;">' . $_SESSION["forgot_password_error"] . '</p>';
        unset($_SESSION["forgot_password_error"]);
    }
    if(isset($_SESSION["forgot_password_success"])) {
        echo '<p style="color: green;">' . $_SESSION["forgot_password_success"] . '</p>';
        unset($_SESSION["forgot_password_success"]);
    }
    ?>
    <form method="post" >
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required>
        <br><br>
        <input type="submit" value="Submit">
    </form>
</body>
</html>
