<?php
// Establish a database connection (replace with your database credentials)
include("db_connect.php");



// Prepare and execute the query
$phone = $_POST['phone'];
$query = "SELECT COUNT(*) AS count FROM details WHERE phone = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("s", $phone);
$stmt->execute();
$stmt->bind_result($count);
$stmt->fetch();
$stmt->close();

// Send the response as JSON
$response = array("exists" => $count > 0);
header("Content-Type: application/json");
echo json_encode($response);

// Close the database connection

?>
