<?php
session_start();
$_SESSION['role'] = [];
// $_SESSION['role'] = "Anda berhasil Logout!!";
header("location:login.php")
?>