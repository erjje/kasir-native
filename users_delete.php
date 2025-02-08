<?php 
include("connection.php");
session_start();
$id = $_GET['id'];
try{
  $query = $db->query("DELETE FROM users WHERE id = $id");
  $_SESSION['delete'] = '<strong>Berhasil</strong> Hapus Data!!';
  header("location:users_list.php");
}catch(Exception $e){
  echo"Gagal :" . $e->getMessage();
}
?>