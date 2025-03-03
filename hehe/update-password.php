<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "login";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $token = $_POST['token'];
    $new_password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    
    if (empty($token)) {
        die("Token is missing");
    }
    
    if ($new_password !== $confirm_password) {
        header("Location: reset-password-form.html?token=$token&error=" . urlencode("Passwords do not match"));
        exit();
    }
    
    // Get the username from token
    $sql = "SELECT username FROM password_resets WHERE token = ? AND expiry > NOW() AND used = 0";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $token);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $username = $row['username'];
        
        // Update using correct column name 'Password'
        $update_sql = "UPDATE hehe SET Password = ? WHERE username = ?";  // Note the capital P
        $update_stmt = $conn->prepare($update_sql);
        $update_stmt->bind_param("ss", $new_password, $username);
        
        if ($update_stmt->execute()) {
            // Mark token as used
            $mark_used_sql = "UPDATE password_resets SET used = 1 WHERE token = ?";
            $mark_used_stmt = $conn->prepare($mark_used_sql);
            $mark_used_stmt->bind_param("s", $token);
            $mark_used_stmt->execute();
            
            header("Location: login.html?success=" . urlencode("Password updated successfully"));
            exit();
        } else {
            header("Location: reset-password-form.html?token=$token&error=" . urlencode("Error updating password"));
            exit();
        }
    } else {
        header("Location: forgot-password.html?error=" . urlencode("Invalid or expired reset link"));
        exit();
    }
}

$conn->close();
?> 