<?php
session_start();
$_SESSION['cart'] = [];
header("location:cashier.php");
?>