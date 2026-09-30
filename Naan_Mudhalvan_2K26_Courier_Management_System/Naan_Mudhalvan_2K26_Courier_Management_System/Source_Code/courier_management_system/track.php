<?php
require 'config.php';
$courier=null; $message='';
if(isset($_GET['tracking'])) {
    $stmt=$pdo->prepare("SELECT * FROM couriers WHERE tracking_number=?");
    $stmt->execute([trim($_GET['tracking'])]);
    $courier=$stmt->fetch();
    if(!$courier) $message='Tracking number not found.';
}
?>
<!doctype html><html><head><title>Track Courier</title><link rel="stylesheet" href="style.css"></head>
<body><div class="container card"><h2>Track Courier</h2>
<form method="get"><input name="tracking" placeholder="Enter Tracking Number" required><button class="btn">Track</button></form>
<?php if($message): ?><p class="error"><?=e($message)?></p><?php endif; ?>
<?php if($courier): ?><div class="result"><p><b>Tracking:</b> <?=e($courier['tracking_number'])?></p><p><b>Status:</b> <?=e($courier['status'])?></p><p><b>Receiver:</b> <?=e($courier['receiver_name'])?></p><p><b>Amount:</b> ₹<?=e($courier['amount'])?></p></div><?php endif; ?>
</div></body></html>
