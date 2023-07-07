<!-- prabhath 0769788402 |7/7/2023 curd project -->
<?php
include("db_connect.php");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Details Table</title>
    <!-- Add Bootstrap CSS link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.2/css/bootstrap.min.css">
    <style>
        .capitalize{
            text-transform:capitalize;

        }
    </style>
</head>
<body>
    <div class="container">
         <a class='btn btn-success' href='add_user.php'>Add contact</a>
         <a class='btn btn-success' href='delete_all.php'>Delete all</a>
        <?php
        // Fetch data from the table
        $sql = "SELECT * FROM details";
        $result = $conn->query($sql);
  
        if ($result->num_rows > 0) {
            echo "<table class='table table-striped'>";
            echo "<tr><th>Name</th><th>Phone</th><th>Action</th></tr>";
            echo"<h4 class='text-primary'>MY CONTACTS</h4>
            ";
            

            // Output data of each row
            while ($row = $result->fetch_assoc()) {
                echo "<tr class='capitalize'>";
                // echo "<td>" . $row["id"] . "</td>";
                echo "<td>" . $row["name"] . "</td>";
                echo "<td>" . $row["phone"] . "</td>";
                echo "<td><a class='btn btn-primary' href='update.php?id=" . $row["id"] . "'>Update</a>  <a class='btn btn-danger' href='delete.php?id=" . $row["id"] . "'>Delete</a> </td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "0 results";
        }
        $conn->close();
        ?>
    </div>

    <!-- Add Bootstrap JS scripts (required for some functionality) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.2/js/bootstrap.bundle.min.js"></script>
</body>
</html>
