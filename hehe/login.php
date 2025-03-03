<?php
session_start();

// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "login";

try {
    $conn = new mysqli($servername, $username, $password, $dbname);
    
    if ($conn->connect_error) {
        throw new Exception("Connection failed: " . $conn->connect_error);
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = trim($_POST['username']);
        $entered_password = trim($_POST['password']);
        
        $sql = "SELECT * FROM hehe WHERE username = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($result->num_rows === 1) {
            $user = $result->fetch_assoc();
            
            if ($entered_password === $user['Password']) {
                $_SESSION['username'] = $username;
                $_SESSION['logged_in'] = true;
                
                // Redirect to SmartScope's index.html
                header("Location: http://localhost/smartscope/index.html");
                exit();
            } else {
                throw new Exception("Invalid password");
            }
        } else {
            throw new Exception("Username not found");
        }
        
        $stmt->close();
    }
} catch (Exception $e) {
    $error = urlencode($e->getMessage());
    header("Location: login.html?error=" . $error);
    exit();
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>LOGIN</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background: linear-gradient(135deg, #D81B60, #E91E63);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .login-container {
            width: 100%;
            max-width: 400px;
            padding: 2rem;
        }

        h2 {
            color: #fff;
            text-align: center;
            font-size: 2rem;
            margin-bottom: 2rem;
            letter-spacing: 1px;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        label {
            display: block;
            color: rgba(255, 255, 255, 0.8);
            margin-bottom: 0.5rem;
            font-size: 0.9rem;
        }

        input {
            width: 100%;
            padding: 1rem;
            border: 2px solid rgba(255, 255, 255, 0.2);
            border-radius: 10px;
            background: rgba(255, 255, 255, 0.1);
            color: white;
            font-size: 1rem;
            transition: all 0.3s ease;
        }

        input:focus {
            outline: none;
            border-color: rgba(255, 255, 255, 0.5);
            background: rgba(255, 255, 255, 0.15);
        }

        input::placeholder {
            color: rgba(255, 255, 255, 0.6);
        }

        .login-btn {
            width: 100%;
            padding: 1rem;
            border: none;
            border-radius: 10px;
            background: #00BFA6;
            color: white;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-top: 1rem;
        }

        .login-btn:hover {
            background: #00A896;
            transform: translateY(-2px);
        }

        .create-account {
            display: block;
            text-align: center;
            color: white;
            text-decoration: none;
            margin-top: 1rem;
            font-size: 0.9rem;
            opacity: 0.8;
            transition: opacity 0.3s ease;
        }

        .create-account:hover {
            opacity: 1;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h2>LOGIN</h2>
        <form action="" method="post">
            <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" placeholder="Username" required>
            </div>

            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" placeholder="Password" required>
            </div>

            <button type="submit" class="login-btn">Login</button>
            <a href="register.html" class="create-account">Create an account</a>
        </form>
    </div>
</body>
</html>