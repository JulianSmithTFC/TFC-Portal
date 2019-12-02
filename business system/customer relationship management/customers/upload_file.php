<?php
$servername = "localhost";
$username = "souther1_Help";
$password = "BatikBaasPreyedBull69";
$dbname = "souther1_tcfportal";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

$msg = "";
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the customer ID.
$customerId = $_POST['customerId'];
$image = $_FILES['image']['name'];
$image_text = mysqli_real_escape_string($conn, $_POST['image_text']);
$target = "images/" . basename($image);

// If form was submitted, update the customer.
if (isset($_POST['upload'])) {

    $sql = "UPDATE customers set image = '$image', image_text = '$image_text' 
             where customerID = '$customerId'";

    mysqli_query($conn, $sql) or die(mysqli_error($conn));

    $query = mysqli_query($conn, $sql);

    if (!$query){
        exit("file could not be moved");
    }

    if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
        echo  $msg = "Image uploaded successfully";
        exit();
    } else {
        echo $msg = "Failed to upload image";
    }
}

// Load the customer.
$result = $conn->query("SELECT * FROM customers WHERE customerID = {$customerId}") or die($conn->error);
$customer = $result->fetch_assoc();

$conn->close();
