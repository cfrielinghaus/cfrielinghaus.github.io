<?php
// Connect to the MySQL database
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "myDB";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Retrieve the location data from the MySQL database
$sql = "SELECT crime_type, description, latitude, longitude FROM crimes";
$result = $conn->query($sql);

// Convert the location data to a JSON object
$data = array();
if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    $data[] = $row;
  }
}
echo json_encode($data);

// Close the MySQL connection
$conn->close();
?>