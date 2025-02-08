<?php
include("connection.php");
//session untuk memulai atau melanjutkan sesi yang sedang berlangsung
session_start();
$id = $_GET['id'];
try{
  $query = $db->query("DELETE FROM goods WHERE id = $id");
  $_SESSION['delete'] = "<strong>Berhasil</strong> hapus data!!";
  header("location:goods_list.php");
}catch(Exception $e){
  echo "Gagal :" . $e->getMessage();
}
?>