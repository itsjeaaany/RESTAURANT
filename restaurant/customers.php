<?php include "config.php"; ?>
<?php $result = $conn->query("SELECT * FROM customers"); ?>

<?php include "restaurant.php"; ?>

<div class="row">
<div class="col-md-5">
<div class="card p-4 mb-4">
<h4>Add Customer</h4>
<form action="insert.php" method="POST" class="row g-3">
    <input type="hidden" name="type" value="customer">
    <div class="col-12">
        <input type="text" name="first_name" class="form-control" placeholder="First Name" required>
    </div>
    <div class="col-12">
        <input type="text" name="last_name" class="form-control" placeholder="Last Name" required>
    </div>
    <div class="col-12">
        <input type="text" name="phone" class="form-control" placeholder="Phone" required>
    </div>
    <div class="col-12">
        <button class="btn btn-success w-100">Add</button>
    </div>
</form>
</div>
</div>

<div class="col-md-7">
<div class="card p-4">
<h4>Customers</h4>
<table class="table table-dark table-striped">
<tr>
<th>ID</th><th>Name</th><th>Phone</th><th>Action</th>
</tr>

<?php while($row=$result->fetch_assoc()): ?>
<tr>
<td><?= $row['id'] ?></td>
<td><?= $row['first_name']." ".$row['last_name'] ?></td>
<td><?= $row['phone'] ?></td>
<td>
<a href="update.php?id=<?= $row['id'] ?>&type=customer" class="btn btn-warning btn-sm">Edit</a>
<a href="delete.php?id=<?= $row['id'] ?>&type=customer" class="btn btn-danger btn-sm">Delete</a>
</td>
</tr>
<?php endwhile; ?>

</table>
</div>
</div>
</div>