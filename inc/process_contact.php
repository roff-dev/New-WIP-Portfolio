<?php
require_once 'connection.php';

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['error' => 'Method not allowed']);
    exit;
}

try {
    // Get and sanitize form data
    $firstName = filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_STRING);
    $lastName = filter_input(INPUT_POST, 'lastname', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $subject = filter_input(INPUT_POST, 'subject', FILTER_SANITIZE_STRING);
    $message = filter_input(INPUT_POST, 'message', FILTER_SANITIZE_STRING);

    // Validate required fields
    if (empty($firstName) || empty($lastName) || empty($email) || empty($subject) || empty($message)) {
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
        INSERT INTO contact_submissions (firstname, lastname, email, subject, message)
        VALUES (:firstname, :lastname, :email, :subject, :message)
    ");

    $stmt->execute([
        'firstname' => $firstName,
        'lastname' => $lastName,
        'email' => $email,
        'subject' => $subject,
        'message' => $message,
        
    ]);

    echo json_encode(['success' => true, 'message' => 'Form submitted successfully']);

} catch (Exception $e) {
    http_response_code(400);
    echo json_encode(['error' => $e->getMessage()]);
}
