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

// Prepare a statement
$stmt = $conn->prepare("UPDATE users SET password = ? WHERE username = ?");

// Bind parameters
$stmt->bind_param("ss", $password, $username);

// Set parameters
$password = "new_password";
$username = "john_doe";

// Execute the statement
$stmt->execute();

// Check for errors
if ($stmt->errno) {
  echo "Error: " . $stmt->error;
} else {
  echo "Data updated successfully";
}