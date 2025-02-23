<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader (if using Composer)
require 'vendor/autoload.php';

// Load environment variables
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

function sendContactEmail($name, $email, $subject, $message) {
    $mail = new PHPMailer(true);

    try {
        // Server settings
        $mail->isSMTP();
        $mail->Host = $_ENV['MAILTRAP_HOST']; // Mailtrap SMTP host
        $mail->SMTPAuth = true;
        $mail->Username = $_ENV['MAILTRAP_USERNAME']; // Mailtrap username
        $mail->Password = $_ENV['MAILTRAP_PASSWORD']; // Mailtrap password
        $mail->SMTPSecure = 'tls'; // Enable TLS encryption
        $mail->Port = $_ENV['MAILTRAP_PORT']; // Mailtrap SMTP port

        // Recipients
        $mail->setFrom($_ENV['MAILTRAP_FROM_EMAIL'], $_ENV['MAILTRAP_FROM_NAME']);
        $mail->addAddress($email, $name); // Send to the form submitter's email
        $mail->addReplyTo($_ENV['MAILTRAP_FROM_EMAIL'], $_ENV['MAILTRAP_FROM_NAME']); // Reply-to address

        // Content
        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body = $message;
        $mail->AltBody = strip_tags($message);

        $mail->send();
        return true;
    } catch (Exception $e) {
        error_log("Mailer Error: " . $mail->ErrorInfo);
        throw new Exception("Message could not be sent. Mailer Error: {$mail->ErrorInfo}");
    }
}
?>