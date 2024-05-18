<?php
// Retrieve data from the POST request
$name = $_POST['name'];
$designation = $_POST['designation'];
$description = $_POST['description'];

// Read and encode profile picture
$profilePicture = file_get_contents($_FILES['profile_picture']['tmp_name']);
$profilePicture = base64_encode($profilePicture);

// Connect to your Azure SQL Database
$server = "sr-server-0302.database.windows.net";
$database = "sr";
$username = "SREHMAN0302";
$password = "P@ssw0rd123!";

$conn = new mysqli($server, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare a SQL statement
$sql = "INSERT INTO profiles (name, designation, description, profile_picture) VALUES (?, ?, ?, ?)";

// Bind parameters and execute the statement
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssss", $name, $designation, $description, $profilePicture);

if ($stmt->execute()) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close statement and connection
$stmt->close();
$conn->close();
?>
