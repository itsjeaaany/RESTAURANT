<?php
include "config.php";

$id = $_GET['id'];
$type = $_GET['type'];

// ================= UPDATE PROCESS =================
if(isset($_POST['update'])){

    if($_POST['type']=="customer"){
        $conn->query("UPDATE customers SET 
            first_name='{$_POST['first_name']}',
            last_name='{$_POST['last_name']}',
            phone='{$_POST['phone']}'
            WHERE id={$_POST['id']}");
        header("Location: customers.php");
    }

    if($_POST['type']=="menu"){
        $conn->query("UPDATE menu SET 
            dish='{$_POST['dish']}',
            category='{$_POST['category']}',
            price='{$_POST['price']}'
            WHERE id={$_POST['id']}");
        header("Location: menu.php");
    }

    if($_POST['type']=="order"){
        $price = $conn->query("SELECT price FROM menu WHERE id={$_POST['menu_id']}")->fetch_assoc();
        $total = $price['price'] * $_POST['quantity'];

        $conn->query("UPDATE orders SET 
            customer_id='{$_POST['customer_id']}',
            menu_id='{$_POST['menu_id']}',
            quantity='{$_POST['quantity']}',
            total='$total'
            WHERE id={$_POST['id']}");
        header("Location: orders.php");
    }
}

// ================= LOAD DATA =================
if($type=="customer"){
    $data = $conn->query("SELECT * FROM customers WHERE id=$id")->fetch_assoc();
}

if($type=="menu"){
    $data = $conn->query("SELECT * FROM menu WHERE id=$id")->fetch_assoc();
}

if($type=="order"){
    $data = $conn->query("SELECT * FROM orders WHERE id=$id")->fetch_assoc();
    $customers = $conn->query("SELECT * FROM customers");
    $menu = $conn->query("SELECT * FROM menu");
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Update</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
body{
    background: linear-gradient(135deg, #fff5f7 0%, #ffe0eb 100%);
    color:#333;
}
.card{
    background:#ffffff;
    border:2px solid #ffb6d9;
    box-shadow: 0 4px 6px rgba(255, 182, 217, 0.1);
}
h3{
    color:#ff6b9d;
}
.btn-info{
    background-color:#ff6b9d;
    border-color:#ff6b9d;
}
.btn-info:hover{
    background-color:#ff4081;
    border-color:#ff4081;
}
.form-control{
    border-color:#ffb6d9;
}
.form-control:focus{
    border-color:#ff6b9d;
    box-shadow: 0 0 0 0.2rem rgba(255, 107, 157, 0.25);
}
</style>
</style>
</head>
<body class="container py-5">

<div class="card p-4">

<h3 class="mb-4">Update <?= ucfirst($type) ?></h3>

<form method="POST">
<input type="hidden" name="id" value="<?= $id ?>">
<input type="hidden" name="type" value="<?= $type ?>">

<?php if($type=="customer"): ?>

<input type="text" name="first_name" class="form-control mb-3"
value="<?= $data['first_name'] ?>" required>

<input type="text" name="last_name" class="form-control mb-3"
value="<?= $data['last_name'] ?>" required>

<input type="text" name="phone" class="form-control mb-3"
value="<?= $data['phone'] ?>" required>

<?php endif; ?>


<?php if($type=="menu"): ?>

<input type="text" name="dish" class="form-control mb-3"
value="<?= $data['dish'] ?>" required>

<input type="text" name="category" class="form-control mb-3"
value="<?= $data['category'] ?>" required>

<input type="number" step="0.01" name="price" class="form-control mb-3"
value="<?= $data['price'] ?>" required>

<?php endif; ?>


<?php if($type=="order"): ?>

<select name="customer_id" class="form-control mb-3" required>
<?php while($c=$customers->fetch_assoc()): ?>
<option value="<?= $c['id'] ?>"
<?= $c['id']==$data['customer_id']?'selected':'' ?>>
<?= $c['first_name']." ".$c['last_name'] ?>
</option>
<?php endwhile; ?>
</select>

<select name="menu_id" class="form-control mb-3" required>
<?php while($m=$menu->fetch_assoc()): ?>
<option value="<?= $m['id'] ?>"
<?= $m['id']==$data['menu_id']?'selected':'' ?>>
<?= $m['dish'] ?> - ₱<?= $m['price'] ?>
</option>
<?php endwhile; ?>
</select>

<input type="number" name="quantity" class="form-control mb-3"
value="<?= $data['quantity'] ?>" required>

<?php endif; ?>

<button name="update" class="btn btn-info w-100">Update</button>

</form>

</div>

</body>
</html>
