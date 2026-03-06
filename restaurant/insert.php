<?php
include "config.php";

$type = $_POST['type'];

if($type=="customer"){
    $conn->query("INSERT INTO customers(first_name,last_name,phone)
    VALUES('{$_POST['first_name']}','{$_POST['last_name']}','{$_POST['phone']}')");
    header("Location: customers.php");
}

if($type=="menu"){
    $conn->query("INSERT INTO menu(dish,category,price)
    VALUES('{$_POST['dish']}','{$_POST['category']}','{$_POST['price']}')");
    header("Location: menu.php");
}

if($type=="order"){
    $menu = $conn->query("SELECT price FROM menu WHERE id={$_POST['menu_id']}")->fetch_assoc();
    $total = $menu['price'] * $_POST['quantity'];

    $conn->query("INSERT INTO orders(customer_id,menu_id,quantity,total)
    VALUES('{$_POST['customer_id']}','{$_POST['menu_id']}','{$_POST['quantity']}','$total')");
    header("Location: orders.php");
}
?>