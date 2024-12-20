<?php
require 'mailer.php';

// Test SMTP connection
echo "Testing SMTP connection...\n";
testEmailConnection();

// Test sending an email
echo "\nTesting email sending...\n";
try {
    sendContactEmail(
        'Test',
        'User',
        'test@example.com',
        'Test Subject',
        'This is a test message.'
    );
    echo "Test email sent successfully!\n";
} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
}