<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: prac20.html");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Welcome</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f0f2f5;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }
        .logout-btn {
            background-color: #dc3545;
            color: white;
            padding: 8px 16px;
            border: none;
            border-radius: 4px;
            text-decoration: none;
        }
        .logout-btn:hover {
            background-color: #c82333;
        }
        .welcome-message {
            color: #333;
        }
        .time-info {
            margin-top: 20px;
            color: #666;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1 class="welcome-message">Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h1>
            <a href="logout.php" class="logout-btn">Logout</a>
        </div>
        <div class="time-info">
            <p>Login Time: <?php echo date('Y-m-d H:i:s'); ?></p>
            <p>Your IP Address: <?php echo $_SERVER['REMOTE_ADDR']; ?></p>
        </div>
    </div>
</body>
</html> 