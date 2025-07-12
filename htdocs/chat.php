<?php
session_start();
$db = new PDO('mysql:host=localhost;dbname=chatdb', 'user', 'pass');

if ($_POST['action'] === 'user_msg') {
  $msg = $_POST['message'];
  $db->prepare("INSERT INTO messages (sender, content) VALUES ('user', ?)")->execute([$msg]);
}

if ($_GET['action'] === 'check_response') {
  $stmt = $db->query("SELECT content FROM messages WHERE sender = 'admin' ORDER BY id DESC LIMIT 1");
  echo $stmt->fetchColumn();
}
?>