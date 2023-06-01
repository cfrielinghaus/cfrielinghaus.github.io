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
$stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");

// Bind parameters
$stmt->bind_param("s", $username);

// Set parameters
$username = "john_doe";

// Execute the statement
$stmt->execute();

// Get the result set
$result = $stmt->get_result();

// Process the result set
if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    // Do something with the row data
  }
}
?>
<!-- HTML code for the account login form -->
<form action="forgot_password.php" method="post">
  <label for="email">Email:</label>
  <input type="email" id="email" name="email" required>

  <button type="submit">Reset Password</button>
</form>