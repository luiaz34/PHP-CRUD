<?php
require_once 'dbinfo.php';

$conn = new mysqli($host, $user, $pass, $database);

if ($conn->connect_error)
    die($conn->connect_error);
else
    $query = "SELECT * FROM artists";

$result = $conn->query($query);

$all_rows = mysqli_fetch_all($result, MYSQLI_ASSOC);

$json_string = json_encode($all_rows, JSON_UNESCAPED_UNICODE);

echo $json_string;

$conn->close();
?>
