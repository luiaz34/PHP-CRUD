<?php
if ($_SERVER['REQUEST_METHOD'] === 'PUT') {
    require_once 'dbinfo.php';
    $conn = new mysqli($host, $user, $pass, $database);

    if ($conn->connect_error) {
        die($conn->connect_error);
    }

    parse_str(file_get_contents('php://input'), $_PUT);
    $EeditId = isset($_PUT['EditId']) ? $_PUT['EditId'] : '';

    // Prepare the SET clause for the SQL query
    $setClause = "";
    $values = array();

    if (!empty($_PUT['Name'])) {
        $Ename = $_PUT['Name'];
        $setClause .= "`artist_name` = ?, ";
        $values[] = $Ename;
    }

    if (!empty($_PUT['event_Date'])) {
        $Edate = date('Y-m-d', strtotime($_PUT['event_Date']));
        $setClause .= "facebook_username = ?, ";
        $values[] = $Edate;
    }

    if (!empty($_PUT['start_Time'])) {
        $Estart_time = $_PUT['start_Time'];
        $setClause .= "twitter_username = ?, ";
        $values[] = $Estart_time;
    }

    if (!empty($_PUT['end_Time'])) {
        $Eend_time = $_PUT['end_Time'];
        $setClause .= "instagram_username = ?, ";
        $values[] = $Eend_time;
    }

    if (!empty($_PUT['event_Category'])) {
        $Eevent_category = $_PUT['event_Category'];
        $setClause .= "biography = ?, ";
        $values[] = $Eevent_category;
    }

    if (!empty($_PUT['Fees'])) {
        $Efees = $_PUT['Fees'];
        $setClause .= "pr_image_url = ?, ";
        $values[] = $Efees;
    }

   
    

   

    if (!empty($setClause)) {
        // Remove trailing comma and space from the set clause
        $setClause = rtrim($setClause, ', ');

        $sql = "UPDATE artists SET $setClause WHERE id = ?";
        $stmt = $conn->prepare($sql);

        if ($stmt) {
            // Bind the parameters dynamically
            $bindTypes = str_repeat('s', count($values)) . 'i';
            array_push($values, $EeditId); // Add the id parameter
            $stmt->bind_param($bindTypes, ...$values);

            if ($stmt->execute()) {
                echo json_encode(array("message" => "Updated successfully!!"));
            } else {
                echo json_encode(array("message" => "Update failed!!") . $stmt->error);
            }
            $stmt->close();
        } else {
            echo json_encode(array("message" => "Statement preparation failed"));
        }
    } else {
        echo json_encode(array("message" => "No fields to update"));
    }

    $conn->close();
}
?>
