<?php
session_start();

$conn = new mysqli("localhost", "root", "", "albrosco");

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$email = $_POST['email'];
$password = $_POST['password'];

$stmt = $conn->prepare("SELECT password FROM users WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows > 0) {
  $stmt->bind_result($hashed_password);
  $stmt->fetch();

  if (password_verify($password, $hashed_password)) {
    $_SESSION['email'] = $email;
    header("Location: welcome.php");
    exit;
  } else {
    echo "Incorrect data found.";
  }
} else {
  echo "User not found.";
}

$stmt->close();
$conn->close();
?>