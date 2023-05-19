<?php
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

// Query the database for the incident report data
$sql = "SELECT * FROM incident_reports";
$result = $conn->query($sql);

// Convert the result set to a JSON array
$incidentReports = array();
if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    $incidentReports[] = $row;
  }
}
$json = json_encode($incidentReports);

// Output the JSON array
header('Content-Type: application/json');
echo $json;

$conn->close();
?>