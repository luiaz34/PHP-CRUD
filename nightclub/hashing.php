<?php
$host = 'localhost';
$database = 'userdatabase';
$user = 'root';
$pass = 'abc123!@#';

$conn = new mysqli($host, $user, $pass, $database);

if ($conn->connect_error) {
    die($conn->connect_error);
}

// Retrieve existing admin records
$query = "SELECT * FROM usersinfo";
$result = $conn->query($query);

while ($row = $result->fetch_assoc()) {
    $username = $row['username'];
    $password = $row['password'];
    
    // Generate a random salt
    $salt = password_hash(random_bytes(16), PASSWORD_BCRYPT);
    
    // Combine the salt and password
    $salted_pass = $salt . $password;
    
    // Hash the salted password
    $hashedPassword = password_hash($salted_pass, PASSWORD_DEFAULT);
    
    // Update the row with hashed password and salt
    $updateQuery = "UPDATE usersinfo SET hashed_password = '$hashedPassword', salt = '$salt' WHERE username = '$username'";
    $conn->query($updateQuery);
}

$conn->close();
?>
