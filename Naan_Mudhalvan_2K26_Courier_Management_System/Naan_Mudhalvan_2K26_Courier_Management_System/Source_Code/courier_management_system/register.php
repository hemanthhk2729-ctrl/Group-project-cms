<?php
require 'config.php';
$message = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];
    $phone = trim($_POST['phone']);
    $address = trim($_POST['address']);

    if (!$name || !$email || !$password) {
        $message = 'Please fill all required fields.';
    } else {
        try {
            $stmt = $pdo->prepare("INSERT INTO users (name,email,password,phone,address) VALUES (?,?,?,?,?)");
            $stmt->execute([$name,$email,password_hash($password,PASSWORD_DEFAULT),$phone,$address]);
            header('Location: login.php?registered=1');
            exit;
        } catch (PDOException $e) {
            $message = 'Email already exists or registration failed.';
        }
    }
}
?>
<!doctype html><html><head><title>Register</title><link rel="stylesheet" href="style.css"></head>
<body><div class="container card"><h2>Create Account</h2>
<?php if($message): ?><p class="error"><?=e($message)?></p><?php endif; ?>
<form method="post">
<input name="name" placeholder="Full Name" required>
<input name="email" type="email" placeholder="Email" required>
<input name="password" type="password" placeholder="Password" required>
<input name="phone" placeholder="Phone">
<textarea name="address" placeholder="Address"></textarea>
<button class="btn">Register</button>
</form><p><a href="login.php">Already have an account?</a></p></div></body></html>
