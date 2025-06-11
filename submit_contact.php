<?php
$host = "localhost";
$user = "root";
$password = "";
$dbname = "portfolio_db";

$conn = new mysqli($host, $user, $password, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$name = $_POST['name'];
$email = $_POST['email'];
$contact = $_POST['contact'];
$message = $_POST['message'];

$sql = "INSERT INTO contact_form (name, email, contact, message) VALUES (?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssss", $name, $email, $contact, $message);
$stmt->execute();

echo "Contact message submitted successfully!";

$stmt->close();
$conn->close();
?>
