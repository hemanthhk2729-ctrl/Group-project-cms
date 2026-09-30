<?php
require 'config.php'; require_login();
$user = $_SESSION['user'];
$total = (int)$pdo->query("SELECT COUNT(*) FROM couriers")->fetchColumn();
$delivered = (int)$pdo->query("SELECT COUNT(*) FROM couriers WHERE status='Delivered'")->fetchColumn();
?>
<!doctype html><html><head><title>Dashboard</title><link rel="stylesheet" href="style.css"></head>
<body><nav><b>Courier Management</b><span><?=e($user['name'])?> (<?=e($user['role'])?>) | <a href="logout.php">Logout</a></span></nav>
<div class="container"><h1>Dashboard</h1>
<div class="stats"><div class="card"><b>Total Couriers</b><strong><?=$total?></strong></div><div class="card"><b>Delivered</b><strong><?=$delivered?></strong></div></div>
<div class="card">
<?php if($user['role']==='customer'): ?>
<a class="btn" href="book_courier.php">Book Courier</a>
<a class="btn secondary" href="track.php">Track Courier</a>
<?php else: ?>
<a class="btn" href="admin_couriers.php">Manage Couriers</a>
<?php endif; ?>
</div></div></body></html>
