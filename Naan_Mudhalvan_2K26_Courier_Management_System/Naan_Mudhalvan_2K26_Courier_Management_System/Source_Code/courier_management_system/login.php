<?php
require 'config.php';
$message = isset($_GET['registered']) ? 'Registration successful. Please login.' : '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $stmt = $pdo->prepare("SELECT * FROM users WHERE email=? LIMIT 1");
    $stmt->execute([trim($_POST['email'])]);
    $user = $stmt->fetch();
    if ($user && password_verify($_POST['password'], $user['password'])) {
        $_SESSION['user'] = ['id'=>$user['id'],'name'=>$user['name'],'role'=>$user['role']];
        header('Location: dashboard.php'); exit;
    }
    $message = 'Invalid email or password.';
}
?>
<!doctype html><html><head><title>Login</title><link rel="stylesheet" href="style.css"></head>
<body><div class="container card"><h2>Login</h2>
<?php if($message): ?><p class="notice"><?=e($message)?></p><?php endif; ?>
<form method="post">
<input name="email" type="email" placeholder="Email" required>
<input name="password" type="password" placeholder="Password" required>
<button class="btn">Login</button>
</form><p><a href="register.php">Create account</a></p></div></body></html>
