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

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Get the email from the form
  $email = $_POST["email"];

  // Prepare a statement to select the user with the specified email
  $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
  $stmt->bind_param("s", $email);
  $stmt->execute();
  $result = $stmt->get_result();

  // If the user exists, generate a password reset token and send an email with a link to reset the password
  if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $user_id = $row["id"];
    $token = bin2hex(random_bytes(32));

    // Insert the token into the database
    $stmt = $conn->prepare("INSERT INTO password_reset_tokens (user_id, token) VALUES (?, ?)");
    $stmt->bind_param("is", $user_id, $token);
    $stmt->execute();

    // Send an email with a link to reset the password
    $reset_link = "https://example.com/reset_password.php?token=" . $token;
    $to = $email;
    $subject = "Password Reset Request";
    $message = "Click the following link to reset your password: " . $reset_link;
    $headers = "From: webmaster@example.com" . "\r\n" . "Reply-To: webmaster@example.com" . "\r\n" . "X-Mailer: PHP/" . phpversion();
    mail($to, $subject, $message, $headers);

    // Display a success message
    echo "An email has been sent to your email address with instructions on how to reset your password.";
  } else {
    // Display an error message if the user doesn't exist
    echo "No user with that email address was found.";
  }
}
?>

<!-- HTML code for the forgot password form -->
<form action="forgot_password.php" method="post">
  <label for="email">Email:</label>
  <input type="email" id="email" name="email" required>

  <button type="submit">Reset Password</button>
</form>