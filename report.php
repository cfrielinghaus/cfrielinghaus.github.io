<?php
// Database credentials
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "database_name";

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Get the crime information from the form
$crime_type = $_POST["crime-type"];
$description = $_POST["description"];
$time = $_POST["time"];
$location = $_POST["location"];

// Prepare a statement to insert the crime information into the database
$stmt = $conn->prepare("INSERT INTO crime_reports (crime_type, description, time, location) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssss", $crime_type, $description, $time, $location);
$stmt->execute();

// Display a success message
echo "Crime report submitted successfully.";

// Close the connection
$conn->close();
?>