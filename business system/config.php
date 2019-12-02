<?php
$servername = "localhost";
$username = "souther1_Help";
$password = "BatikBaasPreyedBull69";
$dbname = "souther1_tcfportal";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>