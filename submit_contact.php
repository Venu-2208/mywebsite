<?php
$host = "localhost";
$username = "root";
$password = "";
$dbname = "business_website_db";

// Create DB connection
$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Escape inputs to prevent SQL injection
$name = $conn->real_escape_string($_POST['name']);
$contact = $conn->real_escape_string($_POST['contact']);
$email = $conn->real_escape_string($_POST['email']);
$desire = $conn->real_escape_string($_POST['desire']);
$date = $conn->real_escape_string($_POST['date']);

// Insert into table
$sql = "INSERT INTO contact_submissions (name, contact, email, desire, date) 
        VALUES ('$name', '$contact', '$email', '$desire', '$date')";

if ($conn->query($sql) === TRUE) {
  echo "Thank you! Your message has been submitted.";
} else {
  echo "Error: " . $conn->error;
}

$conn->close();
?>
