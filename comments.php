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
$comment = $_POST['comment'];

$sql = "INSERT INTO comments (name, comment) VALUES (?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $name, $comment);
$stmt->execute();

echo "Comment submitted successfully!";

$stmt->close();
$conn->close();
?>
