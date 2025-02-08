<?php
include("connection.php");
session_start();
try{
  $id = $_GET['id'];
  $query = $db->query("DELETE FROM roles  WHERE id = $id");
  $_SESSION['delete'] = '<strong>Berhasil</strong> hapus data!!';
  header("location:role_list.php");
}catch(Exception $e){
  echo"Gagal :" . $e->getMessage();
}
?>