<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require '../vendor/autoload.php';

function sendContactEmail($firstName, $lastName, $email, $subject, $message) {
    $mail = new PHPMailer(true);

    try {
        // Server settings
        $mail->isSMTP();
        $mail->Host = 'smtp-mail.outlook.com';
        $mail->SMTPAuth = true;
        $mail->Username = $_ENV['EMAIL_USERNAME'];
        $mail->Password = $_ENV['EMAIL_PASSWORD'];
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        // Recipients
        $mail->setFrom($_ENV['EMAIL_USERNAME'], "$firstName $lastName");
        $mail->addAddress($_ENV['EMAIL_USERNAME']);
        $mail->addReplyTo($email, "$firstName $lastName");

        // Content
        $mail->isHTML(true);
        $mail->Subject = "Contact Form: $subject";
        
        // Create HTML message
        $htmlMessage = "
            <h2>New Contact Form Submission</h2>
            <p><strong>From:</strong> $firstName $lastName</p>
            <p><strong>Email:</strong> $email</p>
            <p><strong>Subject:</strong> $subject</p>
            <p><strong>Message:</strong></p>
            <p>" . nl2br(htmlspecialchars($message)) . "</p>
        ";
        
        $mail->Body = $htmlMessage;
        $mail->AltBody = strip_tags($htmlMessage);

        $mail->send();
        return true;
    } catch (Exception $e) {
        throw new Exception("Message could not be sent. Mailer Error: {$mail->ErrorInfo}");
    }
}
