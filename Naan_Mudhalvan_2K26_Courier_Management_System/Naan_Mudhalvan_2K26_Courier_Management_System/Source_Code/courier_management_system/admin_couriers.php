<?php
require 'config.php'; require_login();
if (!in_array($_SESSION['user']['role'],['admin','staff'])) die('Access denied.');
if(isset($_POST['id'],$_POST['status'])) {
    $stmt=$pdo->prepare("UPDATE couriers SET status=? WHERE id=?");
    $stmt->execute([$_POST['status'],(int)$_POST['id']]);
    $h=$pdo->prepare("INSERT INTO status_history(courier_id,status,remarks,updated_by) VALUES(?,?,?,?)");
    $h->execute([(int)$_POST['id'],$_POST['status'],'Status updated',$_SESSION['user']['id']]);
}
$rows=$pdo->query("SELECT * FROM couriers ORDER BY created_at DESC")->fetchAll();
?>
<!doctype html><html><head><title>Manage Couriers</title><link rel="stylesheet" href="style.css"></head>
<body><div class="container"><h2>Manage Couriers</h2><table><tr><th>Tracking</th><th>Receiver</th><th>Amount</th><th>Status</th><th>Update</th></tr>
<?php foreach($rows as $r): ?><tr><td><?=e($r['tracking_number'])?></td><td><?=e($r['receiver_name'])?></td><td>₹<?=e($r['amount'])?></td><td><?=e($r['status'])?></td>
<td><form method="post"><input type="hidden" name="id" value="<?=$r['id']?>"><select name="status">
<?php foreach(['Booked','Picked Up','In Transit','Out for Delivery','Delivered'] as $s): ?><option <?=$r['status']===$s?'selected':''?>><?=$s?></option><?php endforeach; ?></select><button>Update</button></form></td></tr><?php endforeach; ?>
</table><p><a href="dashboard.php">Back</a></p></div></body></html>
