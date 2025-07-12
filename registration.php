<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

 <form action="register.php" method="POST">
  <input id="id" />
  <input name="name" />
  <input address="address" />
  <input sex="sex" />
  <input country="country" />
  <input email="email" />
  <input password = password_hash($_POST['password'], PASSWORD_DEFAULT);
</form>

// Optional: Save to a database
$host = "web.aeonfree.com";
$user = " icei_39409980";
$pass = "Nehemiah1";
$db = "icei_39409980_albrosco";

$conn = new mysqli($host, $user,$pass, $db);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$stmt = $conn->prepare("INSERT INTO users (name, address, sex, country, email, password) VALUES (?, ?, ?)");
$stmt->bind_param("id", $name, $address, $sex, $country, $email, $password);
$stmt->execute();
$stmt->close();
$conn->close();

echo "Successful Registration!";
?>