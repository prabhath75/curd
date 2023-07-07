<!-- developed by prabhath 0769788402 |7/7/2023 curd project -->
<?php 
include("db_connect.php");
// Insert data into the database

if(isset($_POST['btn_submit'])){
    $name=$_POST['name'];
    $phone=$_POST['phone'];

    $sql = "INSERT INTO details ( name, phone) VALUES ('$name', '$phone')";

if (mysqli_query($conn, $sql)) {
    
    echo "<script>alert('New record added successfully!');</script>";
    header("Location: index.php");
} else {
    echo "Error: " . mysqli_error($conn);
}
    
}



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>

<form class="container" action="add_user.php"method="post">
<nav class="navbar bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Add user</a>
  </div>
</nav>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Name</label>
    <input name="name" type="text" class="form-control" id="" >
    
  </div>

  <!-- <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Phone</label>
    <input name="phone" type="text" class="form-control" id="exampleInputEmail1" >
    
  </div> -->
  <!-- <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Phone</label>
    <input name="phone" type="text" class="form-control" id="exampleInputEmail1">
    <small id="phoneError" class="form-text text-danger"></small>
</div> -->
<div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Phone</label>
    <input name="phone" type="text" class="form-control" id="exampleInputEmail1" onblur="validatePhoneNumber()">
    <small id="phoneError" class="form-text text-danger"></small>
</div>


<script>
    const phoneInput = document.querySelector('#exampleInputEmail1');
    const phoneError = document.querySelector('#phoneError');
    const form = document.querySelector('form'); // Update this selector to match your form element

    form.addEventListener('submit', function(event) {
        const phoneNumber = phoneInput.value;
        if (!/^\d{10}$/.test(phoneNumber)) {
            phoneError.textContent = 'Phone number should have exactly 10 digits.';
            event.preventDefault(); // Prevent form submission
        }
    });

    phoneInput.addEventListener('input', function() {
        phoneError.textContent = ''; // Clear error message on input change
    });
</script>

  
  
  <button name="btn_submit" type="submit" class="btn btn-primary">Add</button>
  <script>
    function validatePhoneNumber() {
    var input = document.getElementById("exampleInputEmail1");
    var error = document.getElementById("phoneError");

    // Make an asynchronous request to the server
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "validatePhoneNumber.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            var response = JSON.parse(xhr.responseText);
            if (response.exists) {
                error.textContent = "Phone number must be unique.";
            } else {
                error.textContent = ""; // Clear the error message if the phone number is unique
            }
        }
    };
    xhr.send("phone=" + encodeURIComponent(input.value));
}

  </script>
</form>
</body>
</html>