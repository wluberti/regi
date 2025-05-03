<?php
require_once 'db.php';
$token = $_GET['token'] ?? '';

$row = $db->querySingle("SELECT * FROM users WHERE token = '$token' AND token_expires > " . time(), true);
if ($row && $row['approved']) {
    setcookie("user", json_encode(['name' => $row['name'], 'team' => $row['team']]), time() + 31536000);
    echo "Logged in. Welcome, {$row['name']} from team {$row['team']}.";
} else {
    echo "Invalid or expired token.";
}
?>
