<?php
// Get the form data
$location = $_POST['location'];
$incident = $_POST['incident'];
$description = $_POST['description'];
$time = $_POST['time'];

// Sanitize the form data
$location = filter_var($location, FILTER_SANITIZE_STRING);
$incident = filter_var($incident, FILTER_SANITIZE_STRING);
$description = filter_var($description, FILTER_SANITIZE_STRING);
$time = filter_var($time, FILTER_SANITIZE_STRING);

// Connect to the database
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "myDB";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Insert the form data into the database
$sql = "INSERT INTO incident_reports (location, incident, description, time)
        VALUES ('$location', '$incident', '$description', '$time')";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>