<?php
require_once 'env.php';

$dbPath = __DIR__ . '/users.db';
$db = new SQLite3($dbPath);

// Create table only if it doesn't exist
$result = $db->querySingle("SELECT name FROM sqlite_master WHERE type='table' AND name='users'");
if (!$result) {
    if (!$db->exec("CREATE TABLE users (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        name TEXT,
        team TEXT,
        email TEXT UNIQUE,
        approved INTEGER DEFAULT 0,
        token TEXT,
        token_expires INTEGER
    )")) {
        die("Failed to create users table: " . $db->lastErrorMsg());
    }
}
?>
