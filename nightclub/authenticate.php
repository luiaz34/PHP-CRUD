<?php
$host = 'localhost';
$database = 'nightclub';
$user = 'root';
$pass = 'abc123!@#';

$conn = new mysqli($host, $user, $pass, $database);

if ($conn->connect_error) {
    die($conn->connect_error);
}

session_start(); // Start the session

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['iemail'], $_POST['ipassword'])) {
        login($conn, $_POST['iemail'], $_POST['ipassword']);
    } else {
        echo json_encode(array("message" => "Invalid request."));
    }
}

$conn->close(); // Close the database connection

function login($conn, $iemail, $ipassword) {
    
    $Lemail = htmlspecialchars($iemail);
    $Lpassword = htmlspecialchars($ipassword);


    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ? AND password = ?");
    $stmt->bind_param("ss", $Lemail, $Lpassword);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $response = array("message" => "Login successful.");
        $_SESSION['user_id'] = $Lemail; 
    } else {
        $response = array("message" => "Invalid email or password.");
    }

    echo json_encode($response);

    $stmt->close();
}
?>
