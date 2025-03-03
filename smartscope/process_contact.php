<?php
// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Database connection
$db_host = 'localhost';
$db_user = 'root';
$db_pass = '';
$db_name = 'login';

try {
    $conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

    if ($conn->connect_error) {
        throw new Exception("Connection failed: " . $conn->connect_error);
    }

    // Check if form was submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Validate required fields
        if (empty($_POST['name']) || empty($_POST['email']) || empty($_POST['subject']) || empty($_POST['message'])) {
            throw new Exception("All fields are required");
        }

        // Get and sanitize form data
        $name = $conn->real_escape_string($_POST['name']);
        $email = $conn->real_escape_string($_POST['email']);
        $subject = $conn->real_escape_string($_POST['subject']);
        $message = $conn->real_escape_string($_POST['message']);

        // Validate email
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new Exception("Invalid email format");
        }

        // Insert into database
        $sql = "INSERT INTO contact_messages (name, email, subject, message) 
                VALUES ('$name', '$email', '$subject', '$message')";

        if ($conn->query($sql) === TRUE) {
            echo "Message sent successfully! Thank you for contacting us.";
        } else {
            throw new Exception("Database Error: " . $conn->error);
        }
    } else {
        throw new Exception("Invalid request method");
    }

} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
} finally {
    if (isset($conn)) {
        $conn->close();
    }
}
?> 