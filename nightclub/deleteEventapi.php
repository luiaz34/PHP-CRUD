<?php
if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
    require_once 'dbinfo.php'; 

    $conn = new mysqli($host, $user, $pass, $database);

    if ($conn->connect_error) {
        die($conn->connect_error);
    }

    parse_str(file_get_contents('php://input'), $_DELETE);
    $deleteId = $_DELETE['deleteId'];

    if (!empty($deleteId) && is_numeric($deleteId)) {
        $stmt = $conn->prepare("DELETE FROM events WHERE id = ?");
        $stmt->bind_param("i", $deleteId);

        if ($stmt->execute()) {
            echo json_encode("Delete Successfully!!");
        } else {
            echo json_encode(array("message" => "Error: " . $stmt->error));
        }

        $stmt->close();
    } else {
        echo json_encode(array("message" => "Invalid deleteId provided."));
    }

    $conn->close();
}

?>