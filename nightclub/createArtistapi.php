<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (
        isset($_POST['name']) && !empty($_POST['name']) &&
        isset($_POST['biography']) && !empty($_POST['biography']) &&
        isset($_POST['image']) && !empty($_POST['image']) &&
        isset($_POST['twitter_username']) && !empty($_POST['twitter_username']) &&
        isset($_POST['instagram_username']) && !empty($_POST['instagram_username']) &&
        isset($_POST['facebook_username']) && !empty($_POST['facebook_username']) 
    ){
        require_once 'dbinfo.php';
        
        $conn = new mysqli($host, $user, $pass, $database);

        if ($conn->connect_error) {
            die($conn->connect_error);
        } // Missing closing brace here

        $Aname = $_POST['name'];
        $Abiography = $_POST['biography'];
        $Aimage = $_POST['image'];
        $Atwitter_username = $_POST['twitter_username'];
        $Ainstagram_username = $_POST['instagram_username'];
        $Afacebook_username= $_POST['facebook_username'];

        $stmt = $conn->prepare("INSERT INTO artists(`artist_name`, biography, facebook_username, twitter_username, instagram_username, pr_image_url) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssss", $Aname, $Abiography, $Afacebook_username, $Atwitter_username, $Ainstagram_username, $Aimage);
    
        if ($stmt->execute()) {
            echo json_encode(array("message" => "Event registered successfully."));
        } else {
            echo json_encode(array("message" => "Error:" . $stmt->error));
        }

        $stmt->close();
        $conn->close();
    }
} else {
    echo json_encode(array("message" => "Please fill in all the required fields."));
}
?>
