<?php include "config.php"; ?>

<?php
$customers = $conn->query("SELECT * FROM customers");
$menu = $conn->query("SELECT * FROM menu");

$orders = $conn->query("
SELECT o.*, c.first_name, c.last_name, c.phone,
m.dish, m.category
FROM orders o
JOIN customers c ON o.customer_id=c.id
JOIN menu m ON o.menu_id=m.id
ORDER BY o.id DESC
");
?>

<?php include "restaurant.php"; ?>

<div class="row">
<div class="col-md-5">
<div class="card p-4 mb-4">
<h4>Place Order</h4>
<form action="insert.php" method="POST" class="row g-3">
<input type="hidden" name="type" value="order">

<div class="col-12">
<select name="customer_id" class="form-control" required>
<option value="">Select Customer</option>
<?php while($c=$customers->fetch_assoc()): ?>
<option value="<?= $c['id'] ?>">
<?= $c['first_name']." ".$c['last_name'] ?>
</option>
<?php endwhile; ?>
</select>
</div>

<div class="col-12">
<select name="menu_id" class="form-control" required>
<option value="">Select Dish</option>
<?php while($m=$menu->fetch_assoc()): ?>
<option value="<?= $m['id'] ?>">
<?= $m['dish'] ?> - ₱<?= $m['price'] ?>
</option>
<?php endwhile; ?>
</select>
</div>

<div class="col-12">
<input type="number" name="quantity" value="1" class="form-control" required>
</div>

<div class="col-12">
<button class="btn btn-info w-100">Place</button>
</div>

</form>
</div>
</div>

<div class="col-md-7">
<div class="card p-4">
<h4>Orders</h4>
<table class="table table-dark table-striped">
<tr>
<th>ID</th><th>Customer</th><th>Phone</th>
<th>Dish</th><th>Category</th>
<th>Qty</th><th>Total</th><th>Date</th><th>Action</th>
</tr>

<?php while($o=$orders->fetch_assoc()): ?>
<tr>
<td><?= $o['id'] ?></td>
<td><?= $o['first_name']." ".$o['last_name'] ?></td>
<td><?= $o['phone'] ?></td>
<td><?= $o['dish'] ?></td>
<td><?= $o['category'] ?></td>
<td><?= $o['quantity'] ?></td>
<td>₱<?= $o['total'] ?></td>
<td><?= $o['order_date'] ?></td>
<td>
<a href="update.php?id=<?= $o['id'] ?>&type=order" class="btn btn-warning btn-sm">Edit</a>
<a href="delete.php?id=<?= $o['id'] ?>&type=order" class="btn btn-danger btn-sm">Delete</a>
</td>
</tr>
<?php endwhile; ?>

</table>
</div>
</div>
</div>