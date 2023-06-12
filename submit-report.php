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

// Handle the form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $crime_type = $_POST["crime-type"];
  $description = $_POST["description"];
  $time = $_POST["time"];
  $location = $_POST["location"];

  // Insert the data into the MySQL database
  $sql = "INSERT INTO crimes (crime_type, description, time, location)
  VALUES ('$crime_type', '$description', '$time', '$location')";

  if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}

// Close the MySQL connection
$conn->close();
?>