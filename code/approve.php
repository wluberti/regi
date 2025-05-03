<?php
require_once 'db.php';
$id = $_GET['id'] ?? 0;
$db->exec("UPDATE users SET approved = 1 WHERE id = $id");
header("Location: admin.php");
?>
