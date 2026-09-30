<?php
require 'config.php'; require_login();
if ($_SESSION['user']['role'] !== 'customer') die('Customer access only.');
$message='';
if ($_SERVER['REQUEST_METHOD']==='POST') {
    $tracking = 'CR'.date('ymdHis').rand(10,99);
    $weight = (float)$_POST['weight'];
    $amount = max(50, $weight * 80);
    $stmt=$pdo->prepare("INSERT INTO couriers
    (tracking_number,sender_name,sender_phone,sender_address,receiver_name,receiver_phone,receiver_address,parcel_type,weight,amount)
    VALUES (?,?,?,?,?,?,?,?,?,?)");
    $stmt->execute([$tracking,$_POST['sender_name'],$_POST['sender_phone'],$_POST['sender_address'],
    $_POST['receiver_name'],$_POST['receiver_phone'],$_POST['receiver_address'],$_POST['parcel_type'],$weight,$amount]);
    $message="Courier booked successfully. Tracking Number: $tracking";
}
?>
<!doctype html><html><head><title>Book Courier</title><link rel="stylesheet" href="style.css"></head>
<body><div class="container card"><h2>Book Courier</h2>
<?php if($message): ?><p class="success"><?=e($message)?></p><?php endif; ?>
<form method="post">
<input name="sender_name" placeholder="Sender Name" required><input name="sender_phone" placeholder="Sender Phone" required>
<textarea name="sender_address" placeholder="Sender Address" required></textarea>
<input name="receiver_name" placeholder="Receiver Name" required><input name="receiver_phone" placeholder="Receiver Phone" required>
<textarea name="receiver_address" placeholder="Receiver Address" required></textarea>
<input name="parcel_type" placeholder="Parcel Type" required><input name="weight" type="number" step="0.01" min="0.1" placeholder="Weight (kg)" required>
<button class="btn">Book Courier</button></form><a href="dashboard.php">Back</a></div></body></html>
