<!-- prabhath 0769788402 |7/7/2023 curd project -->
<?php
include("db_connect.php");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update Form</title>
    <!-- Add Bootstrap CSS link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <?php
        // Check if the form is submitted
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Get the updated values from the form
            $id = $_POST["id"];
            $name = $_POST["name"];
            $phone = $_POST["phone"];

            // Update the row in the database
            $sql = "UPDATE details SET name='$name', phone='$phone' WHERE id=$id";
            if ($conn->query($sql) === TRUE) {
                echo "Record updated successfully";
                header("Location: index.php");
            } else {
                echo "Error updating record: " . $conn->error;
            }
        }

        // Display the update form
        if (isset($_GET["id"])) {
            $id = $_GET["id"];

            // Fetch the row data based on the ID
            $sql = "SELECT * FROM details WHERE id=$id";
            $result = $conn->query($sql);

            if ($result->num_rows == 1) {
                $row = $result->fetch_assoc();

                // Display the update form
                echo "<form class='mt-5' method='post' action='update.php'>";
                echo "<div class='mb-3'>";
                echo "<label for='name' class='form-label'>Name:</label>";
                echo "<input type='text' class='form-control' name='name' value='" . $row["name"] . "'>";
                echo "</div>";
                echo "<div class='mb-3'>";
                echo "<label for='phone' class='form-label'>Phone:</label>";
                echo "<input type='text' class='form-control' name='phone' value='" . $row["phone"] . "'>";
                echo "</div>";
                echo "<input type='hidden' name='id' value='" . $row["id"] . "'>";
                echo "<input type='submit' class='btn btn-primary' value='Update'>";
                echo "</form>";
            } else {
                echo "No matching records found";
            }
        }
        $conn->close();
        ?>
    </div>

    <!-- Add Bootstrap JS scripts (required for some functionality) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.2/js/bootstrap.bundle.min.js"></script>
</body>
</html>
