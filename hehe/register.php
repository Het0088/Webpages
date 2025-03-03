<?php
// Enable error reporting at the top of the file
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
include 'config.php';

// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "login";

// Create connection with error handling
try {
    $conn = new mysqli($servername, $username, $password, $dbname);
    
    // Check connection
    if ($conn->connect_error) {
        throw new Exception("Connection failed: " . $conn->connect_error);
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Debug: Print POST data
        echo "Received POST data:<br>";
        print_r($_POST);
        
        // Sanitize inputs
        $username = filter_var(trim($_POST['username']), FILTER_SANITIZE_STRING);
        $password = trim($_POST['password']);
        $confirm_password = trim($_POST['confirm_password']);
        
        // Debug: Print sanitized data
        echo "<br>Sanitized data:<br>";
        echo "Username: " . $username . "<br>";
        
        // Validate inputs
        if (empty($username) || empty($password) || empty($confirm_password)) {
            throw new Exception("All fields are required");
        }
        
        if ($password !== $confirm_password) {
            throw new Exception("Passwords do not match");
        }
        
        // Check if username already exists
        $check_sql = "SELECT * FROM hehe WHERE username = ?";
        $check_stmt = $conn->prepare($check_sql);
        if (!$check_stmt) {
            throw new Exception("Prepare failed: " . $conn->error);
        }
        
        $check_stmt->bind_param("s", $username);
        if (!$check_stmt->execute()) {
            throw new Exception("Execute failed: " . $check_stmt->error);
        }
        
        $result = $check_stmt->get_result();
        
        if ($result->num_rows > 0) {
            throw new Exception("Username already exists");
        }
        
        // Insert new user
        $insert_sql = "INSERT INTO hehe (username, password) VALUES (?, ?)";
        $insert_stmt = $conn->prepare($insert_sql);
        if (!$insert_stmt) {
            throw new Exception("Prepare insert failed: " . $conn->error);
        }
        
        $insert_stmt->bind_param("ss", $username, $password);
        
        if ($insert_stmt->execute()) {
            echo "Registration successful! Redirecting...";
            $_SESSION['success'] = "Registration successful! Please login.";
            header("Location: login.html");
            exit();
        } else {
            throw new Exception("Registration failed: " . $insert_stmt->error);
        }
        
        $check_stmt->close();
        $insert_stmt->close();
    } else {
        echo "Please submit the form. Direct access to this page will show this message.";
    }
} catch (Exception $e) {
    $error = urlencode($e->getMessage());
    header("Location: register.html?error=" . $error);
    exit();
}

$conn->close();
?> 