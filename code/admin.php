<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header('Location: admin_login.php');
    exit;
}

require_once 'db.php';
echo "<h2>Approve Users</h2>";

$results = $db->query("SELECT * FROM users WHERE approved = 0");
while ($row = $results->fetchArray(SQLITE3_ASSOC)) {
    echo "{$row['name']} ({$row['email']}) from {$row['team']} - <a href='approve.php?id={$row['id']}'>Approve</a><br>";
}
?>
