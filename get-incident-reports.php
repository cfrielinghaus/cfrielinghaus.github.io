<?php
// Connect to MySQL database
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "myDB";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Retrieve crime reports from database
$sql = "SELECT * FROM crime_reports";
$result = $conn->query($sql);

$crimeReports = array();

if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    $crimeReport = array(
      'id' => $row['id'],
      'latitude' => $row['latitude'],
      'longitude' => $row['longitude'],
      'crimeType' => $row['crime_type'],
      'description' => $row['description'],
      'time' => $row['time'],
      'location' => $row['location']
    );
    array_push($crimeReports, $crimeReport);
  }
}

// Return crime reports as JSON-encoded array
header('Content-Type: application/json');
echo json_encode($crimeReports);

$conn->close();
?>