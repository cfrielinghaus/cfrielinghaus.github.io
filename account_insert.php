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
$stmt = $conn->prepare("INSERT INTO users (username, password, email) VALUES (?, ?, ?)");

// Bind parameters
$stmt->bind_param("sss", $username, $password, $email);

// Set parameters
$username = "john_doe";
$password = "password123";
$email = "john_doe@example.com";

// Execute the statement
$stmt->execute();

// Check for errors
if ($stmt->errno) {
  echo "Error: " . $stmt->error;
} else {
  echo "Data inserted successfully";
}