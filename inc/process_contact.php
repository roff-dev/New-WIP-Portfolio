<?php
require_once 'connection.php';
require_once 'mailer.php';

header('Content-Type: application/json');

// Debugging: Log incoming POST data
error_log(print_r($_POST, true));

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['error' => 'Method not allowed']);
    exit;
}

try {
    // Get and sanitize form data
    $name = filter_input(INPUT_POST, 'name', FILTER_UNSAFE_RAW);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $subject = filter_input(INPUT_POST, 'subject', FILTER_UNSAFE_RAW);
    $message = filter_input(INPUT_POST, 'message', FILTER_UNSAFE_RAW);

    // Debugging: Log sanitized data
    error_log("Sanitized Data - Name: $name, Email: $email, Subject: $subject, Message: $message");

    // Validate required fields
    if (empty($name) || empty($email) || empty($subject) || empty($message)) {
        throw new Exception('Required fields are missing');
    }

    // Validate email format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        throw new Exception('Invalid email format');
    }

    // Message Length
    if (strlen($message) < 5) {
        throw new Exception('Message must be at least 5 characters');
    }

    // Prepare and execute the SQL query
    $stmt = $pdo->prepare("
        INSERT INTO contact_submissions (name, email, subject, message)
        VALUES (:name, :email, :subject, :message)
    ");

    $stmt->execute([
        'name' => $name,
        'email' => $email,
        'subject' => $subject,
        'message' => $message,
    ]);

    // Debugging: Log database insertion
    error_log("Data inserted into database");

    // Send email
    try {
        sendContactEmail($name, $email, $subject, $message);
        error_log("Email sent successfully");
    } catch (Exception $e) {
        error_log("Email sending failed: " . $e->getMessage());
    }

    echo json_encode(['success' => true, 'message' => 'Form submitted successfully']);

} catch (Exception $e) {
    http_response_code(400);
    echo json_encode(['error' => $e->getMessage()]);
    error_log("Error: " . $e->getMessage());
}