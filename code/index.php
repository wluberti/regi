<?php require_once 'db.php'; ?>
<!DOCTYPE html>
<html>
<head><title>Register/Login</title></head>
<body>
<h2>Register or Login</h2>
<form method="POST" action="login.php">
    Name: <input name="name"><br>
    Team: <input name="team"><br>
    Email: <input name="email" type="email" required><br>
    <button type="submit">Submit</button>
</form>
</body>
</html>
