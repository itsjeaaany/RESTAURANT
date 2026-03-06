<?php
include "config.php";

$id = $_GET['id'];
$type = $_GET['type'];

if($type=="customer"){
    $conn->query("DELETE FROM customers WHERE id=$id");
    header("Location: customers.php");
}

if($type=="menu"){
    $conn->query("DELETE FROM menu WHERE id=$id");
    header("Location: menu.php");
}

if($type=="order"){
    $conn->query("DELETE FROM orders WHERE id=$id");
    header("Location: orders.php");
}
?>