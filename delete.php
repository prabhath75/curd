<!-- prabhath 0769788402 |7/7/2023 curd project -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<body>
<?php
include("db_connect.php");
// Check if the ID is provided
if (isset($_GET["id"])) {
    $id = $_GET["id"];

    // Delete the row from the database
    $sql = "DELETE FROM details WHERE id=$id";
    if ($conn->query($sql) === TRUE) {

        
        echo'<script>
        swal("Number Deleted");
    </script>';
    
        
        echo '<script>
    
    setTimeout(function() {
        window.location.href = "index.php";
    }, 1000); // Redirect after  xxx (adjust the delay as needed)
</script>';
        
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}
$conn->close();
?>

</body>
</html>
