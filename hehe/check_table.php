<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "login";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

echo "<style>
    body { font-family: Arial, sans-serif; padding: 20px; }
    table { border-collapse: collapse; width: 100%; margin-bottom: 30px; }
    th, td { padding: 12px; text-align: left; border: 1px solid #ddd; }
    th { background-color: #f5f5f5; }
    tr:nth-child(even) { background-color: #f9f9f9; }
    h2 { color: #333; margin-top: 30px; }
</style>";

// Show table structure
echo "<h2>Table Structure:</h2>";
$sql = "DESCRIBE hehe";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table>";
    echo "<tr>
            <th>Field</th>
            <th>Type</th>
            <th>Null</th>
            <th>Key</th>
            <th>Default</th>
            <th>Extra</th>
          </tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        foreach($row as $value) {
            echo "<td>" . htmlspecialchars($value ?? 'NULL') . "</td>";
        }
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "No table structure found";
}

// Show all data in the table
echo "<h2>User Data:</h2>";
$sql = "SELECT Sr, username, Password, email FROM hehe";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table>";
    echo "<tr>
            <th>Sr.</th>
            <th>Username</th>
            <th>Password</th>
            <th>Email</th>
          </tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($row['Sr']) . "</td>";
        echo "<td>" . htmlspecialchars($row['username']) . "</td>";
        echo "<td>" . htmlspecialchars($row['Password']) . "</td>";
        echo "<td>" . htmlspecialchars($row['email'] ?? 'NULL') . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "No users found";
}

// Show password reset tokens
echo "<h2>Password Reset Tokens:</h2>";
$sql = "SELECT * FROM password_resets ORDER BY created_at DESC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table>";
    echo "<tr>
            <th>Username</th>
            <th>Token</th>
            <th>Expiry</th>
            <th>Used</th>
            <th>Created At</th>
          </tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($row['username']) . "</td>";
        echo "<td>" . htmlspecialchars($row['token']) . "</td>";
        echo "<td>" . htmlspecialchars($row['expiry']) . "</td>";
        echo "<td>" . ($row['used'] ? 'Yes' : 'No') . "</td>";
        echo "<td>" . htmlspecialchars($row['created_at']) . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "No reset tokens found";
}

$conn->close();
?> 