<?php
session_start();
$adminPassword = $env['ADMIN_PASSWORD'] ?? 'NoBueno42';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($_POST['password'] === $adminPassword) {
        $_SESSION['admin'] = true;
        header('Location: admin.php');
        exit;
    }
    $error = "Incorrect password.";
}
?>
<!DOCTYPE html>
<html>
<head><title>Admin Login</title></head>
<body>
<h2>Admin Login</h2>
<?php if (!empty($error)) echo "<p style='color:red;'>$error</p>"; ?>
<form method="POST">
    Password: <input type="password" name="password" required>
    <button type="submit">Login</button>
</form>
</body>
</html>
