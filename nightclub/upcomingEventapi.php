<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require_once 'dbinfo.php'; 

    $conn = new mysqli($host, $user, $pass, $database);

    if ($conn->connect_error) {
        die($conn->connect_error);
    }

    $stmt = $conn->prepare("SELECT *
    FROM artists
    INNER JOIN events ON artists.id = events.artist_id
    WHERE 
        events.event_date BETWEEN '2023-08-01' AND DATE_ADD('2023-08-01', INTERVAL 7 MONTH);");
    
    if ($stmt->execute()) {
        $result = $stmt->get_result();
        
        $events = array();
        
        while ($row = $result->fetch_assoc()) {
            $events[] = $row;
        }
        
        
        echo json_encode($events);
    } else {
        echo json_encode(array("message" => "Error: " . $stmt->error));
    }

    $stmt->close();
    $conn->close();
}
?>