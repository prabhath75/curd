<!-- prabhath 0769788402 |7/7/2023 curd project -->
<?php
include("db_connect.php");
// Check if the ID is provided


    // Delete the row from the database
    $sql = "DELETE FROM details";
    if ($conn->query($sql) === TRUE) {
        echo "all Record deleted successfully";
        header("Location: index.php");
    } else {
        echo "Error deleting record: " . $conn->error;
    }

$conn->close();
?>
