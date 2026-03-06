<?php include "config.php"; ?>
<?php $result = $conn->query("SELECT * FROM menu"); ?>
<?php include "restaurant.php"; ?>

<div class="row">
<div class="col-md-5">
<div class="card p-4 mb-4">
<h4>Add Menu Item</h4>
<form action="insert.php" method="POST" class="row g-3">
<input type="hidden" name="type" value="menu">
<div class="col-12">
<input type="text" name="dish" class="form-control" placeholder="Dish" required>
</div>
<div class="col-12">
<input type="text" name="category" class="form-control" placeholder="Category" required>
</div>
<div class="col-12">
<input type="number" step="0.01" name="price" class="form-control" placeholder="Price" required>
</div>
<div class="col-12">
<button class="btn btn-success w-100">Add</button>
</div>
</form>
</div>
</div>

<div class="col-md-7">
<div class="card p-4">
<h4>Menu Items</h4>
<table class="table table-dark table-striped">
<tr>
<th>ID</th><th>Dish</th><th>Category</th><th>Price</th><th>Action</th>
</tr>

<?php while($row=$result->fetch_assoc()): ?>
<tr>
<td><?= $row['id'] ?></td>
<td><?= $row['dish'] ?></td>
<td><?= $row['category'] ?></td>
<td>₱<?= $row['price'] ?></td>
<td>
<a href="update.php?id=<?= $row['id'] ?>&type=menu" class="btn btn-warning btn-sm">Edit</a>
<a href="delete.php?id=<?= $row['id'] ?>&type=menu" class="btn btn-danger btn-sm">Delete</a>
</td>
</tr>
<?php endwhile; ?>

</table>
</div>
</div>
</div>