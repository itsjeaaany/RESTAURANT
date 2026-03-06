<?php include "config.php"; ?>
<!DOCTYPE html>
<html>
<head>
<title>Restaurant</title>
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
.nav-btn{
    margin:5px;
    background-color:#ff6b9d;
    border-color:#ff6b9d;
    color:white;
}
.nav-btn:hover{
    background-color:#ff4081;
    border-color:#ff4081;
}
h1, h4{
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
table th{
    color:#ff6b9d;
    border-color:#ffb6d9;
}
.btn-success{
    background-color:#ff6b9d;
    border-color:#ff6b9d;
}
.btn-success:hover{
    background-color:#ff4081;
    border-color:#ff4081;
}
.btn-warning{
    background-color:#ffa500;
    border-color:#ffa500;
    color:white;
}
.btn-warning:hover{
    background-color:#ff8c00;
    border-color:#ff8c00;
}
.btn-danger{
    background-color:#ff6b9d;
    border-color:#ff6b9d;
}
.btn-danger:hover{
    background-color:#ff4081;
    border-color:#ff4081;
}
.table-dark{
    background-color:#fffbfd;
    color:#333;
}
.table-dark th{
    background-color:#ffb6d9;
    border-color:#ffb6d9;
    color:#fff;
}
.table-dark td{
    border-color:#ffb6d9;
}
.table-striped tbody tr:nth-of-type(odd){
    background-color:#fff5f9;
}
.table-striped tbody tr:nth-of-type(even){
    background-color:#fffbfd;
}
</style>
</head>
<body class="container py-5">

<h1 class="text-center mb-5">RESTAURANT</h1>

<div class="text-left mb-5">
    <a href="customers.php" class="btn btn-info nav-btn">Customers</a>
    <a href="menu.php" class="btn btn-info nav-btn">Menu Items</a>
    <a href="orders.php" class="btn btn-info nav-btn">Orders</a>
</div>

</body>
</html>