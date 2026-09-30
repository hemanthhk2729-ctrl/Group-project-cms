<?php
session_start();
if (isset($_SESSION['user'])) {
    header('Location: dashboard.php');
    exit;
}
?>
<!doctype html>
<html>
<head><title>Courier Management System</title><link rel="stylesheet" href="style.css"></head>
<body>
<div class="container hero">
<h1>Courier Management System</h1>
<p>Book, manage and track courier parcels.</p>
<a class="btn" href="login.php">Login</a>
<a class="btn secondary" href="register.php">Register</a>
</div>
</body>
</html>
