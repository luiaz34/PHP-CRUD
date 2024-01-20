<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if all form fields are filled
    if (
        isset($_POST['Name']) && !empty($_POST['Name']) &&
        isset($_POST['event_Date']) && !empty($_POST['event_Date']) &&
        isset($_POST['start_Time']) && !empty($_POST['start_Time']) &&
        isset($_POST['end_Time']) && !empty($_POST['end_Time']) &&
        isset($_POST['event_Category']) && !empty($_POST['event_Category']) &&
        isset($_POST['Fees']) && !empty($_POST['Fees']) &&
        isset($_POST['maximum_Capacity']) && !empty($_POST['maximum_Capacity']) &&
        isset($_POST['performance_Detail'])&&
        isset($_POST['artistid']) && !empty($_POST['artistid'])
    ) {
        require_once 'dbinfo.php';
        
        $conn = new mysqli($host, $user, $pass, $database);

        if ($conn->connect_error) {
            die($conn->connect_error);
        }
        
        $Ename = $_POST['Name'];
        $Edate = date('Y-m-d', strtotime($_POST['event_Date']));
        $Estart_time = $_POST['start_Time'];
        $Eend_time = $_POST['end_Time'];
        $Eevent_category = $_POST['event_Category'];
        $Efees = $_POST['Fees'];
        $Emaximum_capacity = $_POST['maximum_Capacity'];
        $Eperformance_detail = $_POST['performance_Detail'];
        $Eartistid = $_POST['artistid'];

        $stmt = $conn->prepare("INSERT INTO events (`name`, event_date, start_time, end_time, event_category, fees, maximum_capacity, performance_detail, artist_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?,?)");
        $stmt->bind_param("ssssssisi", $Ename, $Edate, $Estart_time, $Eend_time, $Eevent_category, $Efees, $Emaximum_capacity, $Eperformance_detail,$Eartistid);
        
        if ($stmt->execute()) {
            echo json_encode(array("message" => "Event registered successfully."));
        } else {
            echo json_encode(array("message" => "Error:" . $stmt->error));
        }

        $stmt->close();
        $conn->close();
    } 
}else {
    echo json_encode(array("message" => "Please fill in all the required fields."));
}
?>
