<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;
use Dotenv\Dotenv;

require __DIR__ . '/../vendor/autoload.php';

// Load environment variables
$dotenv = Dotenv::createImmutable(__DIR__ . '/..');
$dotenv->load();

// Required environment variables
$dotenv->required(['EMAIL_USERNAME', 'EMAIL_PASSWORD'])->notEmpty();

function sendContactEmail($firstName, $lastName, $email, $subject, $message) {
    $mail = new PHPMailer(true);
    
    try {
        // Server settings
        $mail->isSMTP(); //POTENTIALLY CAUSING ISSUES ON CPANEL
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = $_ENV['EMAIL_USERNAME'];
        $mail->Password = $_ENV['EMAIL_PASSWORD']; // Use your Gmail App Password here
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 2525;

        // For debugging - comment out in production
        // $mail->SMTPDebug = SMTP::DEBUG_SERVER;
        
        // Recipients
        $mail->setFrom($_ENV['EMAIL_USERNAME'], "$firstName $lastName");
        $mail->addAddress($_ENV['EMAIL_USERNAME']);
        $mail->addReplyTo($email, "$firstName $lastName");
        
        // Content
        $mail->isHTML(true);
        $mail->Subject = "Contact Form: $subject";
        
        // Create HTML message with better formatting
        $htmlMessage = "
            <div style='font-family: Arial, sans-serif; max-width: 600px; margin: 0 auto;'>
                <h2 style='color: #333; border-bottom: 1px solid #ccc; padding-bottom: 10px;'>
                    New Contact Form Submission
                </h2>
                <table style='width: 100%; border-collapse: collapse;'>
                    <tr>
                        <td style='padding: 10px; border: 1px solid #ddd;'><strong>From:</strong></td>
                        <td style='padding: 10px; border: 1px solid #ddd;'>" . 
                            htmlspecialchars($firstName) . " " . htmlspecialchars($lastName) . 
                        "</td>
                    </tr>
                    <tr>
                        <td style='padding: 10px; border: 1px solid #ddd;'><strong>Email:</strong></td>
                        <td style='padding: 10px; border: 1px solid #ddd;'>" . 
                            htmlspecialchars($email) . 
                        "</td>
                    </tr>
                    <tr>
                        <td style='padding: 10px; border: 1px solid #ddd;'><strong>Subject:</strong></td>
                        <td style='padding: 10px; border: 1px solid #ddd;'>" . 
                            htmlspecialchars($subject) . 
                        "</td>
                    </tr>
                    <tr>
                        <td style='padding: 10px; border: 1px solid #ddd;' colspan='2'>
                            <strong>Message:</strong><br><br>" . 
                            nl2br(htmlspecialchars($message)) . 
                        "</td>
                    </tr>
                </table>
            </div>
        ";
        
        $mail->Body = $htmlMessage;
        $mail->AltBody = strip_tags($htmlMessage);
        
        $mail->send();
        return true;
    } catch (Exception $e) {
        throw new Exception("Message could not be sent. Mailer Error: {$mail->ErrorInfo}");
    }
}
// Test function
function testEmailConnection() {
    try {
        $mail = new PHPMailer(true);
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = $_ENV['EMAIL_USERNAME'];
        $mail->Password = $_ENV['EMAIL_PASSWORD']; // Use your Gmail App Password here
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        // Just test the connection without sending
        if ($mail->smtpConnect()) {
            echo "SMTP connection successful!\n";
            return true;
        } else {
            echo "SMTP connection failed!\n";
            return false;
        }
    } catch (Exception $e) {
        echo "Connection test failed: " . $e->getMessage() . "\n";
        return false;
    }
}
