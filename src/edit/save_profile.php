<?php
// Retrieve data from the POST request
$name = $_POST['name'];
$designation = $_POST['designation'];
$description = $_POST['description'];

// Connect to your Azure SQL Database
$server = " sr-server-0302.database.windows.net";
$database = "sr-server-0302";
$username = "SREHMAN0302";
$password = "P@ssw0rd123!";

$conn = new mysqli($server, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Insert data into the database
$sql = "INSERT INTO profiles (name, designation, description) VALUES ('$name', '$designation', '$description')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
