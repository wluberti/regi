<?php
require_once 'db.php';
require_once 'mailer.php';

$name = $_POST['name'] ?? '';
$team = $_POST['team'] ?? '';
$email = $_POST['email'] ?? '';

$user = $db->querySingle("SELECT * FROM users WHERE email = '$email'", true);
$token = bin2hex(openssl_random_pseudo_bytes(16));
$expires = time() + 3600;

if ($user) {
    if ($user['approved']) {
        $db->exec("UPDATE users SET token = '$token', token_expires = $expires WHERE email = '$email'");
        sendMail($email, $token);
        echo "Login link sent to your email.";
    } else {
        echo "Pending approval by admin.";
    }
} else {
    $stmt = $db->prepare("INSERT OR IGNORE INTO users (name, team, email) VALUES (?, ?, ?)");
    if (!$stmt) {
        die("DB prepare failed: " . $db->lastErrorMsg());
    }
    $stmt->bindValue(1, $name);
    $stmt->bindValue(2, $team);
    $stmt->bindValue(3, $email);
    $stmt->execute();
    echo "Submitted for approval.";
}
?>
