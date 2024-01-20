<?php
$host = 'localhost';
$database = 'userdatabase';
$user = 'root';
$pass = 'abc123!@#';

$conn = new mysqli($host, $user, $pass, $database);

if ($conn->connect_error) {
    die($conn->connect_error);
}

class LoginRegister {
    private $conn;                           //constructor metod

    public function __construct($conn) {
        $this->conn = $conn; 
    }

    //LOGIN 
    public function login($iemail, $ipassword) { 
        $Lemail = htmlspecialchars($iemail);
        $Lpassword = htmlspecialchars($ipassword);

        $stmt = $this->conn->prepare("SELECT * FROM usersinfo WHERE email = ? AND password = ?");
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


    //REGISTER
    public function register($qname, $qemail, $qpassword) {
        if (empty($qname) || empty($qemail) || empty($qpassword)) {                                
            $response = array("message" => "All fields must be filled out.");
            echo json_encode($response);
            return; 
        }
        
        if (!filter_var($qemail, FILTER_VALIDATE_EMAIL)) {
            $response = array("message" => "Invalid email format.@ must be contained.");
            echo json_encode($response);
            return; 
        }
        
        if (strlen($qpassword) < 8) {
            $response = array("message" => "Password must be at least 8 characters.");
            echo json_encode($response);
            return; 
        }
        $Wname = htmlspecialchars($qname);
        $Wemail = htmlspecialchars($qemail);
        $Wpassword = htmlspecialchars($qpassword);

        $stmt = $this->conn->prepare("INSERT INTO usersinfo (username, email, password) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $Wname, $Wemail, $Wpassword);

        if ($stmt->execute()) {
            $response = array("message" => "Signup successful.");
            
        } else {
            $response = array("message" => "Fail to signup.");
        }

        echo json_encode($response);

        $stmt->close();
    }
}

$loginRegister = new LoginRegister($conn);
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['iemail'], $_POST['ipassword'])) {
        $loginRegister->login($_POST['iemail'], $_POST['ipassword']);
    } elseif (isset($_POST['qname'], $_POST['qemail'], $_POST['qpassword'])) {
        $loginRegister->register($_POST['qname'], $_POST['qemail'], $_POST['qpassword']);
    } else {
        echo json_encode(array("message" => "Invalid request."));
    }
}

/* close connection */
$conn->close();
?>
