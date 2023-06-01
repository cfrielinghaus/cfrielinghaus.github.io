<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Get the form data
  $firstName = $_POST['firstName'];
  $lastName = $_POST['lastName'];
  $username = $_POST['username'];
  $password = $_POST['password'];

  // Generate a unique user ID
  $userId = uniqid();

  // Validate the form data
  $errors = array();
  if (empty($firstName)) {
    $errors[] = 'First name is required';
  }
  if (empty($lastName)) {
    $errors[] = 'Last name is required';
  }
  if (empty($username)) {
    $errors[] = 'Username is required';
  }
  if (empty($password)) {
    $errors[] = 'Password is required';
  }

  // If there are errors, display them to the user
  if (count($errors) > 0) {
    foreach ($errors as $error) {
      echo '<p>' . $error . '</p>';
    }
  } else {
    // If there are no errors, create the account
    // ... (code to create account goes here)
    echo '<p>Account created successfully!</p>';
    echo '<p>Your user ID is: ' . $userId . '</p>';
  }
}
?>