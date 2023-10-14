<?php
$servername = "localhost";
$username = "root";
$password = ""; // if you have set a password for the 'root' user, replace the empty string with your password
$database = "elphp_espanol"; // replace 'your_database_name' with the name of your database

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

echo "Connected successfully";
?>