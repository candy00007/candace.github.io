<?php
$host = "web.aeonfree.com";
$user = "icei_39409980";
$pass = "Nehemiah1";
$db   = "icei_39409980_albrosco";

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) die("Database connection failed");

$query = isset($_POST['query']) ? $conn->real_escape_string($_POST['query']) : '';
$sql = "SELECT name, price FROM products WHERE name LIKE '%$query%' LIMIT 10";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    echo "<div class='product'><strong>" . $row['name'] . "</strong> — $" . $row['price'] . "</div>";
  }
} else {
  echo "<p>No products found.</p>";
}

$conn->close();
?>
